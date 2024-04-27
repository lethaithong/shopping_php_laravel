@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Chi Tiết Đơn Hàng</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Chi Tiết Đơn Hàng
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </tfoot>
                        
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->Pro_name}}</td>
                                <td><img src="{{$item->image}}" alt="" style="width: 50px;"></td>
                                <td>{{number_format($item->Price)}} VND</td>
                                <td>{{$item->Quantity}}</td>
                                <td>{{number_format($item->Price * $item->Quantity)}} VND</td>
                            </tr>
                            @endforeach

                    </table>
            
                    @if($datas->Coupon_id)
    @if($datas->coupon->Coupon_condition == 1)
        <tr>
            
            <div class="align-middle font-weight-bold">Tổng tiền: {{number_format($datas->Total)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>

        <tr>
            
            <div class="align-middle font-weight-bold">Mã Giảm: {{number_format($datas->coupon->Coupon_number)}} %</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>

        <tr>
            
            <div class="align-middle font-weight-bold">Tổng Giảm: {{number_format($datas->Total - $datas->Total_coupon)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>

        <tr>
            
            <div class="align-middle font-weight-bold">Thành Tiền: {{number_format($datas->Total_coupon)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>

    @elseif($datas->coupon->Coupon_condition == 2)

        <tr>
            
            <div class="align-middle font-weight-bold">Tổng tiền: {{number_format($datas->Total)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>
    
        <tr>
            
            <div class="align-middle font-weight-bold">Mã Giảm: {{number_format($datas->coupon->Coupon_number)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>

        <tr>
            
            <div class="align-middle font-weight-bold">Tổng Giảm: {{number_format($datas->coupon->Coupon_number)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>

        <tr>
            
            <div class="align-middle font-weight-bold">Thành Tiền: {{number_format($datas->Total_coupon)}} VND</div>
            <div class="align-middle font-weight-bold"></div>
        </tr>
    
    @endif
    @else

        <tr>  
            <div class="float-left font-weight-bold">Thành Tiền: {{number_format($datas->Total)}} VND</div>
            <div class="float-left font-weight-bold"></div>
        </tr>
    @endif
                    
                </div>
            </div>
        </div>
    </main>

    

@endsection