@extends('layout.layoutuser')

@section('tiile')

MultiShop-Shopping_Cart(BENULL)

@endsection

@section('content')

<!-- Cart Start -->
@if(Cart::isEmpty() == false)
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                <form action="shopping_cart" method="post">
                @csrf
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle">{{$item->name}}</td>
                        <td class="align-middle"><img src="{{$item->attributes['image']}}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{number_format($item->price)}} VND</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 120px;">
                                <form action="shopping_cart" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center" name="quantity" value="{{$item->quantity}}">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="submit" class="btn btn-sm btn-primary" value="update"></i>
                                </form>
                            </div>
                        </td>
                        <td class="align-middle">{{number_format($item->quantity * $item->price)}} VND</td>
                        <td class="align-middle">
                            <form action="shopping_cart" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{$item->id}}">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Ban co muon xoa')"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </form>
                @endforeach
            </table>
            <div class="text-right">
                @if(Cart::isEmpty() == false)
                <a href="{{url('/shopping_cart_all')}}" class="btn btn-primary">Xóa tất cả</a>
                @endif

                @if(Auth::check())
                @if (Session::get('coupon'))
                    <a href="{{url('/delete_coupon')}}" class="btn btn-primary float-end">Xóa mã</a>
                @endif
                @endif
            </div>
            
        </div>
        <div class="col-lg-4">
            @if(Auth::check())
            @if(Session::has('message'))
                <div style="font-size: 18px;" class="alert alert-danger">{{Session::get('message')}}</div>
            @endif
            <form class="mb-30" method="POST" action="{{url('/check_coupon')}}">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code" name="coupon">
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-primary check_coupon" value="Apply Coupon" name="check_coupon">
                        {{-- <button class="btn btn-primary">Apply Coupon</button> --}}
                    </div>
                </div>
            </form>
            @endif

            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Hóa Đơn</span></h5>
            <form action="{{route('checkout')}}" method="get">
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    
                    @if(Auth::check())
                    @if(Session::get('coupon'))
                        @foreach (Session::get('coupon') as $key => $value)
                            @if ($value['Coupon_condition'] == 1) 

                            <div class="d-flex justify-content-between mb-3">
                                <h6>Thành Tiền:</h6>
                                <h6>{{number_format(Cart::getsubtotal())}} VND</h6>
                            </div>

                                <div class="d-flex justify-content-between mb-3">    
                                                <h6>Mã Giảm:</h6>  
                                                <h6>{{$value['Coupon_number']}}%</h6>          
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <h6>
                                        @php
                                            $total_coupon = (Cart::gettotal() * $value['Coupon_number']) / 100;
                                            echo 'Tổng giảm: ' 
                                        @endphp
                                    </h6>
                                    <h6> {{number_format($total_coupon)}} VND</h6>
                                </div>

                                <div class="pt-2">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5>Tổng Tiền</h5>
                                        <h5>{{number_format(Cart::gettotal() - $total_coupon)}} VND</h5>
                                    </div>
                                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán</button>
                                </div>
                                {{-- <div>{{$value['Coupon_id']}}%</div> --}}

                            @elseif($value['Coupon_condition'] == 2)

                            <div class="d-flex justify-content-between mb-3">
                                <h6>Thành Tiền:</h6>
                                <h6>{{number_format(Cart::getsubtotal())}} VND</h6>
                            </div>

                            <div class="d-flex justify-content-between mb-3">    
                                <h6>Mã Giảm:</h6>  
                                <h6>{{$value['Coupon_number']}} VND</h6>          
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <h6>
                                    @php
                                        $total_coupon = (Cart::gettotal() - $value['Coupon_number']);
                                        echo 'Tổng giảm: ' 
                                    @endphp
                                </h6>
                                <h6> {{number_format($value['Coupon_number'])}} VND</h6>
                            </div>

                            <div class="pt-2">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Tổng Tiền</h5>
                                    <h5>{{number_format($total_coupon)}} VND</h5>
                                </div>
                                <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán</button>
                            </div>


                            

                            @endif
                        @endforeach
                        @else
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Thành Tiền:</h6>
                            <h6>{{number_format(Cart::getsubtotal())}} VND</h6>
                        </div>
    
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h6>Tổng Tiền: </h6>
                                <h6>{{number_format(Cart::gettotal())}} VND</h6>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán</button>
                        </div>
                    @endif

                    @else
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Thành Tiền:</h6>
                        <h6>{{number_format(Cart::getsubtotal())}} VND</h6>
                    </div>

                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h6>Tổng Tiền: </h6>
                            <h6>{{number_format(Cart::gettotal())}} VND</h6>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán</button>
                    </div>
                    @endif
                    

            </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
          <div style="font-size: 18px;" class="alert alert-danger">Xin vui lòng thêm sản phẩm vào giỏ hàng!! </div>
          <div style="font-size: 18px;"><a href="{{route('home')}}">
            <i class="fas fa-arrow-left me-1"></i>
            Trang Chủ
          </a></div>
        </div>
    </div>
</div>
@endif
<!-- Cart End -->

@endsection