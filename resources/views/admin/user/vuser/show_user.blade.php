@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Khách Hàng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Khách Hàng</li>
            </ol>
            {{-- <a href="{{url('admin/user/vuser/add_user')}}"><button type="button" class="btn btn-info">Thêm Khách Hàng</button></a> --}}
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Khách Hàng
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên Người Dùng</th>
                                <th>Email</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Cấp Bậc</th>
                                <th>Trạng Thái</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Số Thứ Tự</th>
                                <th>Tên Người Dùng</th>
                                <th>Email</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Cấp Bậc</th>
                                <th>Trạng Thái</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>     
                                <td>{{$key + 1}}</td>
                                <td>{{$item->Username}}</td>
                                {{-- <td><img src="{{($item->Image)}}" alt="" width="90px" height="120px"></td> --}}
                                <td>{{$item->Email}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->Phone}}</td>
                                <td>{{$item->Address}}</td>
                                
                                    @if ($item->Level == 5)
                                        <td>Khách Hàng Đăng Nhập</td>
                                    @elseif ($item->Level == 6)
                                    <td>Khách Hàng Vãng Lai</td>
                                    @endif
                                
                                @if ($item->Status==0)
                                    <td><a href="{{url('admin/user/vuser/active_user',[$item->User_id])}}"><i class="fa-solid fa-toggle-on fs-4"></i></a></td>
                                @else
                                    <td><a href="{{url('admin/user/vuser/active_user',[$item->User_id])}}"><i class="fa-solid fa-toggle-off fs-4"></i></a></td>
                                @endif
                            
                        
                        {{-- <th><div class="container text-center">
                            <form action="{{url('admin/user/vuser/delete_user')}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value= "DELETE">
                                <input type="hidden" name="User_id" value="{{$item->User_id}}">
                                <button class="border-0" onclick="return confirm('Ban co muon xoa')"><i class="fa-solid fa-trash text-danger fs-4"></i></button>
                            </form><br>
                             <a href="{{url('admin/user/vuser/edit_user',[$item->User_id])}}" class=""><button class="border-0" ><i class="fa-solid fa-pen-to-square text-warning fs-4"></i></button></a> 
                            </div>
                        </th> --}}

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection