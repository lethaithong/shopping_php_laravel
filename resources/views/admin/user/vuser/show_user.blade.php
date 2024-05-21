@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Khách Hàng</h1>
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{Session::get('message');}}</strong>
              </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Khách Hàng
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
                                <td>{{$item->Address}}</td>
                                
                                    @if ($item->Level == 5)
                                        <td>Login</td>
                                    @elseif ($item->Level == 6)
                                    <td>Vãng Lai</td>
                                    @endif
                                
                                @if ($item->Status==0)
                                    <td><a href="{{url('admin/user/vuser/active_user',[$item->User_id])}}"><i class="fa fa-toggle-on fs-4 text-info"></i></a></td>
                                @else
                                    <td><a href="{{url('admin/user/vuser/active_user',[$item->User_id])}}"><i class="fa fa-toggle-off fs-4 text-danger"></i></a></td>
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