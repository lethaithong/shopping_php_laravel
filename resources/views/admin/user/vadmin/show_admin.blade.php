@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Quản Trị Viên</h1>
            <a href="{{url('admin/user/vadmin/add_admin')}}"><button type="button" class="btn btn-info mt-2 mb-4">Thêm Quản Trị</button></a>
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{Session::get('message');}}</strong>
              </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Quản Trị Viên
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
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
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>     
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
                            <td>@if ($item->Status==0)
                                <a href="{{url('admin/user/vadmin/active_admin',[$item->User_id])}}"><i class="fa fa-toggle-on fs-4 text-info"></i></a>
                            @elseif($item->Status==1)
                                <a href="{{url('admin/user/vadmin/active_admin',[$item->User_id])}}"><i class="fa fa-toggle-off fs-4 text-danger"></i></a>
                            @endif
                            </td>
                        
                        <th><div class="container text-center box">
                            <form action="{{url('admin/user/vadmin/delete_admin')}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value= "DELETE">
                                <input type="hidden" name="User_id" value="{{$item->User_id}}">
                                <button class="btn border-0" onclick="return confirm('Bạn có muốn xóa?')"><i class="fas fa-trash mr-3 text-danger fs-4"></i></button>
                            </form><br>
                            <a href="{{url('admin/user/vadmin/edit_admin',[$item->User_id])}}" class=""><button class="btn border-0" ><i class="fas fa-edit text-warning fs-4"></i></button></a>
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