@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Quản Trị Viên</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Quản Trị Viên</li>
            </ol>
            <a href="{{url('admin/user/vadmin/add_admin')}}"><button type="button" class="btn btn-info">Thêm Quản Trị</button></a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Quản Trị Viên
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Cấp Bậc</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Cấp Bậc</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>     
                                <td>{{$key + 1}}</td>
                                <td>{{$item->Username}}</td>
                                <td>{{$item->Email}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->Phone}}</td>
                                <th>{{$item->Address}}</th>
                                <th>
                                    @if ($item->Level == 0)
                                        <a>Quản Lý</a>
                                    @elseif($item->Level == 1)
                                        <a>Nhân Viên</a>
                                    @endif
                                </th>
                                {{-- <th>{{$item->Status}}</th> --}}
                                {{-- <th><div class="container ">
                                    <form action="{{url('admin/user/vadmin/delete_admin')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value= "DELETE">
                                        <input type="hidden" name="User_id" value="{{$item->User_id}}">
                                        <button><i class="fa-solid fa-trash text-danger "></i></button>
                                    </form>
                                    <a href="{{url('admin/user/vadmin/edit_admin',[$item->User_id])}}"><button><i class="fa-solid fa-pen-to-square text-warning"></i></button></a>
                                </div></th>  --}}

                                <th>@if ($item->Status==0)
                                    <a href="{{url('admin/user/vadmin/active_admin',[$item->User_id])}}"><i class="fa-solid fa-toggle-on fs-4"></i></a>
                                @else
                                    <a href="{{url('admin/user/vadmin/active_admin',[$item->User_id])}}"><i class="fa-solid fa-toggle-off fs-4"></i></a>
                                @endif
                            </th>
                        
                        <th><div class="container text-center">
                            <form action="{{url('admin/user/vadmin/delete_admin')}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value= "DELETE">
                                <input type="hidden" name="User_id" value="{{$item->User_id}}">
                                <button class="border-0" onclick="return confirm('Ban co muon xoa')"><i class="fa-solid fa-trash text-danger fs-4"></i></button>
                            </form><br>
                            <a href="{{url('admin/user/vadmin/edit_admin',[$item->User_id])}}" class=""><button class="border-0" ><i class="fa-solid fa-pen-to-square text-warning fs-4"></i></button></a>
                            </div>
                        </th>

                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection