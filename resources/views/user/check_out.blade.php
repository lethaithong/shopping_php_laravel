@extends('layout.layoutuser')

@section('title')
    
MultiShop-Check_out(BENULL)

@endsection

@section('content')

<!-- Checkout Start -->
<form action="{{route('checkout')}}" method="post">
@csrf
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
                    </tr>
                </thead>
                @foreach ($data as $item)
               
               
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle">{{$item->name}}</td>
                        <td class="align-middle"><img src="{{url('image')}}/{{$item->attributes['image']}}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{number_format($item->price)}}</td>
                        <td class="align-middle">{{$item->quantity}}</td>
                        <td class="align-middle">{{number_format($item->quantity * $item->price)}} VND</td>
                    </tr>
                </tbody>
           
                @endforeach

                @if(Auth::check())
                @if(Session::get('coupon'))
                    @foreach (Session::get('coupon') as $key => $value)
                        @if ($value['Coupon_condition'] == 1) 

                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Tổng tiền:</td>
                                    <td class="align-middle font-weight-bold">{{number_format(Cart::getSubtotal())}} VND</td>
                                </tr>
                            </tbody>

                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Mã giảm:</td>
                                    <td class="align-middle font-weight-bold">{{$value['Coupon_number']}} %</td>
                                </tr>
                            </tbody>

                            @php
                                $total_coupon = (Cart::gettotal() * $value['Coupon_number']) / 100;
                            @endphp
                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Tổng giảm:</td>
                                    <td class="align-middle font-weight-bold">{{number_format($total_coupon)}} VND</td>
                                </tr>
                            </tbody>

                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Thành tiền:</td>
                                    <td class="align-middle font-weight-bold">{{number_format(Cart::gettotal() - $total_coupon)}} VND</td>
                                    <input type="hidden" name="Total_coupon" value="{{Cart::gettotal() - $total_coupon}}">
                                    <input type="hidden" name="Total" value="{{Cart::gettotal()}}">
                                    <input type="hidden" name="Coupon_id" value="{{$value['Coupon_id']}}">
                                </tr>
                            </tbody>

                            @elseif ($value['Coupon_condition'] == 2) 

                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Tổng tiền:</td>
                                    <td class="align-middle font-weight-bold">{{number_format(Cart::getSubtotal())}} VND</td>
                                </tr>
                            </tbody>

                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Mã giảm:</td>
                                    <td class="align-middle font-weight-bold">{{number_format($value['Coupon_number'])}} VND</td>
                                </tr>
                            </tbody>

                            @php
                                $total_coupon = (Cart::gettotal() - $value['Coupon_number']);
                            @endphp
                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Tổng giảm:</td>
                                    <td class="align-middle font-weight-bold">{{number_format($value['Coupon_number'])}} VND</td>
                                </tr>
                            </tbody>

                            <tbody class="align-middle">
                                <tr>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle font-weight-bold">Thành tiền:</td>
                                    <td class="align-middle font-weight-bold">{{number_format($total_coupon)}} VND</td>
                                    <input type="hidden" name="Total_coupon" value="{{$total_coupon}}">
                                    <input type="hidden" name="Total" value="{{Cart::gettotal()}}">
                                    <input type="hidden" name="Coupon_id" value="{{$value['Coupon_id']}}">
                                </tr>
                            </tbody>

                        @endif
                    @endforeach
                    
                    @else

                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle font-weight-bold">Thành tiền:</td>
                            <td class="align-middle font-weight-bold">{{number_format(Cart::gettotal())}} VND</td>
                            <input type="hidden" name="Total" value="{{Cart::gettotal()}}">
                            
                        </tr>
                    </tbody>

                @endif
                @else
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Thành tiền:</td>
                        <td class="align-middle font-weight-bold">{{number_format(Cart::gettotal())}} VND</td>
                        <input type="hidden" name="Total" value="{{Cart::gettotal()}}">
                        
                    </tr>
                </tbody>
                @endif
            </table>
        </div>

        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương Thức Thanh Toán</span></h5>
                <div class="bg-light p-30">

                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" checked="checked">
                                <label class="custom-control-label" for="paypal">Thanh toán bằng tiền mặt</label>
                            </div>
                        </div>
                    

                    {{-- <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div> --}}
                    <input type="submit" name="btnSubmit" value="THANH TOÁN" class="btn btn-block btn-primary font-weight-bold py-3"><br>
                </div>
        </div>
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa Chỉ Giao Hàng</span></h5>
            @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                        @endif
                       
            @if(Auth::check())
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        
                        <div class="col-md-6 form-group">
                            <label>Tên người nhận</label>
                            <input class="form-control" type="text" placeholder="Tên" value="{{Auth::user()->Username}}" name="Username">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ Email</label>
                            <input class="form-control" type="text" placeholder="Email" value="{{Auth::user()->Email}}" name="Email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" type="text" placeholder="Điện thoại" value="{{Auth::user()->Phone}}" name="Phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ giao hàng</label>
                            <input class="form-control" type="text" placeholder="Địa chỉ" value="{{Auth::user()->Address}}" name="Address">
                        </div>
                        
                    </div>
                </div>
            @else
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Tên người nhận</label>
                            <input class="form-control" type="text" placeholder="Tên" value="{{old('Username')}}" name="Username">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ Email</label>
                            <input class="form-control" type="text" placeholder="Email" value="{{old('Email')}}" name="Email">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" type="text" placeholder="Điên thoại" value="{{old('Phone')}}" name="Phone">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ giao hàng</label>
                            <input class="form-control" type="text" placeholder="Địa chỉ" value="{{old('Address')}}" name="Address">
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <input type="hidden" name="Level" value="6">
                        </div>
                    </div>
                </div>
            @endif 
            
        </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
</div>
@endsection