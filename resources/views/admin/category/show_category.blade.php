@extends('layout.layoutadmin')

@section('content')


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh Mục Sản Phẩm</h1>
            <a href="{{url('admin/category/add_category')}}"><button type="button" class="btn btn-info mt-2 mb-4">Thêm Danh Mục</button></a>
            
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{Session::get('message');}}</strong>
              </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dữ Liệu Danh Mục Sản Phẩm
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="text-center">
                        <thead>
                            <tr class="text-center">
                                <th>Tên</th>
                                <th>Danh Mục Cha</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày Cập Nhật</th>
                                <th>Action</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                
                                <td>{{$item->Cat_name}}</td>

                                        @if($item->Cat_parent == 0)
                                            <td>
                                                Root
                                            </td>
                                        @elseif($item->Cat_parent != 0)
                                            @foreach ($data as $key => $value)
                                                @if($item->Cat_parent == $value->Cat_id)
                                                    <td>
                                                        {{$value->Cat_name}}
                                                    </td>
                                                @endif
                                            @endforeach
                                        @endif
                                    
                                
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td><div class="container text-center box">
                                            <form action="{{url('admin/category/delete_category')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value= "DELETE">
                                                <input type="hidden" name="Cat_id" value="{{$item->Cat_id}}">
                                                <button class="btn border-0" onclick="return confirm('Bạn có muốn xóa?')"><i class="fas fa-trash mr-3 text-danger fs-4"></i></button>
                                            </form>
                                            <br>
                                            <a href="{{url('admin/category/edit_category',[$item->Cat_id])}}" class=""><button class="btn border-0" ><i class="fas fa-edit text-warning fs-4"></i></button></a>
                                    </div>
                                </td>

                                <td>@if ($item->Cat_status==0)
                                    <a href="{{url('admin/category/active_category',[$item->Cat_id])}}"><i class="fa fa-toggle-on fs-4 text-info"></i></a>
                                @elseif($item->Cat_status==1)
                                    <a href="{{url('admin/category/active_category',[$item->Cat_id])}}"><i class="fa fa-toggle-off fs-4 text-danger"></i></a>
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