@extends('layout.layoutadmin')

@section('content')


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Khuyến Mãi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Khuyến Mãi</li>
            </ol>
            <a href="{{url('admin/coupon/add_coupon')}}"><button type="button" class="btn btn-info">Thêm Khuyến Mãi</button></a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Khuyến Mãi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên Khuyến Mãi</th>
                                <th>Mã Khuyến Mãi</th>
                                <th>Số Lượng Khuyến Mãi</th>
                                <th>Dạng Khuyến Mãi</th>
                                <th>Số Khuyến Mãi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên Khuyến Mãi</th>
                                <th>Mã Khuyến Mãi</th>
                                <th>Số Lượng Khuyến Mãi</th>
                                <th>Dạng Khuyến Mãi</th>
                                <th>Số Khuyến Mãi</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->Coupon_name}}</td>
                                <td>{{$item->Coupon_code}}</td>
                                <td>{{$item->Coupon_quantity}}</td>

                                @if($item->Coupon_condition == 1)
                                    <td>Giảm Theo %</td>
                                @else
                                    <td>Giảm Theo Tiền</td>
                                @endif

                                @if($item->Coupon_condition == 1)
                                <td>Giảm {{$item->Coupon_number}} %</td>
                            @else
                                <td>Giảm {{$item->Coupon_number}} VND</td>
                            @endif
                                
                            <td><div class="container text-center">
                                <form action="{{url('admin/coupon/delete_coupon')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value= "DELETE">
                                    <input type="hidden" name="Coupon_id" value="{{$item->Coupon_id}}">
                                    <button class="border-0" onclick="return confirm('Ban co muon xoa')"><i class="fa-solid fa-trash text-danger fs-6"></i></button>
                                </form>
                                <br>
                                <a href="{{url('admin/coupon/edit_coupon',[$item->Coupon_id])}}" class=""><button class="border-0" ><i class="fa-solid fa-pen-to-square text-warning fs-6"></i></button></a>
                        </div>
                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection