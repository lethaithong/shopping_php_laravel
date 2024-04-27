@extends('layout.layoutuser')

@section('tiile')

MultiShop-Shopping_Cart(BENULL)

@endsection

@section('content')

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
                @foreach($data as $item)
                <tbody class="align-middle">
                    
                    <tr>
                        <td class="align-middle">{{$item->Pro_name}}</td>
                        <td class="align-middle"><img src="{{$item->image}}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{number_format($item->Price)}} VND</td>
                        <td class="align-middle">{{$item->Quantity}}</td>
                        <td class="align-middle">{{number_format($item->Quantity * $item->Price)}} VND</td>
                    </tr>
                    
                </tbody>
                @endforeach

                @if($datas->Coupon_id)
                @if($datas->coupon->Coupon_condition == 1)
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Tổng tiền:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->Total)}} VND</td>
                    </tr>
                </tbody>
                
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Mã Giảm:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->coupon->Coupon_number)}} %</td>
                    </tr>
                </tbody>

                @php
                    $t =($datas->Total * $datas->coupon->Coupon_number) / 100;
                @endphp
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Tổng Giảm:</td>
                        <td class="align-middle font-weight-bold">{{number_format($t)}} VND</td>
                    </tr>
                </tbody>

                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Thành Tiền:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->Total_coupon)}} VND</td>
                    </tr>
                </tbody>

                @elseif($datas->coupon->Coupon_condition == 2)

                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Tổng tiền:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->Total)}} VND</td>
                    </tr>
                </tbody>
                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Mã Giảm:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->coupon->Coupon_number)}} VND</td>
                    </tr>
                </tbody>

                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Tổng Giảm:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->coupon->Coupon_number)}} VND</td>
                    </tr>
                </tbody>

                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Thành Tiền:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->Total_coupon)}} VND</td>
                    </tr>
                </tbody>
                
                @endif
                @else

                <tbody class="align-middle">
                    <tr>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle font-weight-bold">Thành Tiền:</td>
                        <td class="align-middle font-weight-bold">{{number_format($datas->Total)}} VND</td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">Địa Chỉ</span>
                @php
                    $qrcode_url = url('order_detail/'.$datas->Order_id)
                @endphp
                <span class="bg-secondary pr-3">{{QrCode::size(50)->generate($qrcode_url)}}</span>
            </h5>
            <div class="bg-light p-30 mb-5">

                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tên người nhận</h6>
                        <h6>{{$datas->Full_name}}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Địa chỉ Giao</h6>
                        <h6>{{$datas->Address}}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Số điện thoại</h6>
                        <h6>{{$datas->Phone}}</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Ngày đặt</h6>
                        <h6>{{$datas->created_at}}</h6>
                    </div>
                </div>
                
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng Tiền</h5>
                        <h5>{{number_format($datas->Total_coupon)}} VND</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection