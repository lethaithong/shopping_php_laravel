@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sản Phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Sản Phẩm</li>
            </ol>
            <a href="{{url('admin/product/add_product')}}"><button type="button" class="btn btn-info">Thêm Sản Phẩm</button></a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Sản Phẩm
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Hình</th>
                                
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                    
                            <tr>
                                <td>{{$item->Pro_id}}</td>
                                <td>{{$item->Pro_name}}</td>
                                <td>{{number_format($item->Pro_price)}} VND</td>
                                <td><img src="{{($item->Pro_image)}}" alt="" width="90px" height="120px"></td>
                                
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                
                                    <td>@if ($item->Pro_status==0)
                                            <a href="{{url('admin/product/active_product',[$item->Pro_id])}}"><i class="fa-solid fa-toggle-on fs-6"></i></a>
                                        @else
                                            <a href="{{url('admin/product/active_product',[$item->Pro_id])}}"><i class="fa-solid fa-toggle-off fs-6"></i></a>
                                        @endif
                                    </td>
                                
                                <td><div class="container text-center none">
                                    <form action="{{url('admin/product/delete_product')}}" method="post">
                                        @csrf
                                            <input type="hidden" name="_method" value= "DELETE">
                                            <input type="hidden" name="Pro_id" value="{{$item->Pro_id}}">
                                        <button class="border-0" onclick="return confirm('Ban co muon xoa')"
                                        ><i class="fa-solid fa-trash text-danger fs-6"></i></button>
                                    </form>
                                    
                                    <a href="{{url('admin/product/edit_product',[$item->Pro_id])}}" class=""><button class="border-0" ><i class="fa-solid fa-pen-to-square text-warning fs-6"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{$data->links()}}
            </div>
        </div>
    </main>

@endsection