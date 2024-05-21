@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sản Phẩm</h1>
            
            <a href="{{url('admin/product/add_product')}}"><button type="button" class="btn btn-info mt-2 mb-4">Thêm Sản Phẩm</button></a>
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{Session::get('message');}}</strong>
              </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Sản Phẩm
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Danh mục</th>
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
                                <td>{{$item->Pro_name}}</td>
                                <td>{{$item->category->Cat_name}}</td>
                                <td>{{number_format($item->Pro_price)}} VND</td>
                                <td><img src='{{url('image')}}/{{$item->Pro_image}}' alt="" width="90px" height="90px"></td>
                                {{-- <td>{!!$item->Pro_des!!}</td> --}}
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                
                                <td><div class="container text-center box">
                                    <form action="{{url('admin/product/delete_product')}}" method="post">
                                        @csrf
                                            <input type="hidden" name="_method" value= "DELETE">
                                            <input type="hidden" name="Pro_id" value="{{$item->Pro_id}}">
                                        <button class="btn border-0" onclick="return confirm('Bạn có muốn xóa?')"><i class="fas fa-trash mr-3 text-danger fs-4"></i></button>
                                    </form>
                                    <br>
                                    <a href="{{url('admin/product/edit_product',[$item->Pro_id])}}" class=""><button class="btn border-0" ><i class="fas fa-edit text-warning fs-4"></i></button></a>
                                </div>
                                </td>

                                    <td>@if ($item->Pro_status==0)
                                        <a href="{{url('admin/product/active_product',[$item->Pro_id])}}"><i class="fa fa-toggle-on fs-4 text-info"></i></a>
                                    @elseif($item->Pro_status==1)
                                        <a href="{{url('admin/product/active_product',[$item->Pro_id])}}"><i class="fa fa-toggle-off fs-4 text-danger"></i></a>
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