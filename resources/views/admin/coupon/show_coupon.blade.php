@extends('layout.layoutadmin')

@section('content')


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Khuyến Mãi</h1>
            <a href="{{url('admin/coupon/add_coupon')}}"><button type="button" class="btn btn-info mt-2 mb-4">Thêm Khuyến Mãi</button></a>
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{Session::get('message');}}</strong>
              </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Khuyến Mãi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Mã</th>
                                <th>Số Lượng</th>
                                <th>Dạng Khuyến Mãi</th>
                                <th>Mô tả</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
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
                                
                            <td><div class="container text-center box">
                                <form action="{{url('admin/coupon/delete_coupon')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value= "DELETE">
                                    <input type="hidden" name="Coupon_id" value="{{$item->Coupon_id}}">
                                    <button class="btn border-0" onclick="return confirm('Bạn có muốn xóa?')"><i class="fas fa-trash mr-3 text-danger fs-4"></i></button>
                                </form>
                                <br>
                                <a href="{{url('admin/coupon/edit_coupon',[$item->Coupon_id])}}" class=""><button class="border-0" ><i class="fa-solid fa-pen-to-square text-warning fs-4"></i></button></a>
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