@extends('layout.layoutadmin')

@section('content')


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh Mục Sản Phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh mục sản phẩm</li>
            </ol>
            <a href="{{url('admin/category/add_category')}}"><button type="button" class="btn btn-info">Thêm Danh Mục</button></a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Danh Mục Sản Phẩm
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Danh Mục Cha</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->Cat_name}}</td>
                                <td><img src="{{($item->Cat_image)}}" alt="" width="90px" height="90px" ></td>
                                <td>{{$item->Cat_parent}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><div class="container text-center none">
                                            <form action="{{url('admin/category/delete_category')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value= "DELETE">
                                                <input type="hidden" name="Cat_id" value="{{$item->Cat_id}}">
                                                <button class="border-0" onclick="return confirm('Ban co muon xoa')"><i class="fa-solid fa-trash text-danger fs-6"></i></button>
                                            </form>
                                            
                                            <a href="{{url('admin/category/edit_category',[$item->Cat_id])}}" class=""><button class="border-0" ><i class="fa-solid fa-pen-to-square text-warning fs-6"></i></button></a>
                                    </div>
                                </td>
                                <td>@if ($item->Cat_status==0)
                                    <a href="{{url('admin/category/active_category',[$item->Cat_id])}}"><i class="fa-solid fa-toggle-on fs-6"></i></a>
                                @else
                                    <a href="{{url('admin/category/active_category',[$item->Cat_id])}}"><i class="fa-solid fa-toggle-off fs-6"></i></a>
                                @endif
                                    
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