@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Đơn Hàng</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Đơn Hàng
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                {{-- <th>Total</th> --}}
                                <th>Ngày Đặt</th>
                                <th>Trạng Thái</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                {{-- <th>Total</th> --}}
                                <th>Ngày Đặt</th>
                                <th>Trạng Thái</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->Full_name}}</td>
                                <td>{{$item->Email}}</td>
                                <td>{{$item->Phone}}</td>
                                <td>{{$item->Address}}</td>
                                {{-- <td>{{$item->Total}}</td> --}}
                                <td>{{$item->created_at}}</td>
                                <td>
                                    @if ($item->Status==0)
                                        <a href="{{url('admin/active_Order',[$item->Order_id])}}">Đợi xác Nhận</a>
                                    @else
                                        <a>Đã Xác Nhận</i></a>
                                    @endif
                                </td>
                                <td><a href="{{url('admin/Order_detail_ad')}}/{{$item->Order_id}}">chi tiết</a></td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
 
@endsection