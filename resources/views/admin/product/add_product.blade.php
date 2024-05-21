@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm Sản Phẩm</h1>
            
            <a href="{{url('admin/product/')}}"><button type="button" class="btn btn-info mt-2 mb-4">Trở Về Trang Chủ</button></a>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{url('admin/product/add_product')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                            <p>Tên Sản Phẩm:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Pro_name" value="{{old('Pro_name')}}" required>
                                <label for="email">Tên Sản Phẩm</label>
                              </div>
                              <p>Giá:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Pro_price" value="{{old('Pro_price')}}" required pattern="[0-9]{1,6}" title="Giá tiền phải phải đúng định dạng và không quá 9 kí tự">
                                <label for="email">Giá</label>
                              </div>
                              <p>Thuộc Danh Mục:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Cat_id"> 
                                  @foreach ($category as $item)
                                      @if($item->Cat_parent == 0)
                                            <option value="{{$item->Cat_id}}">-{{$item->Cat_name}}</option>
                                            @foreach ($category as $sub_item)
                                                @if($sub_item->Cat_parent != 0 && $sub_item->Cat_parent == $item->Cat_id)
                                                    <option style="color: red; font-size:15px" value="{{$sub_item->Cat_id}}">&nbsp; &nbsp;+{{$sub_item->Cat_name}}</option>
                                                @endif
                                            @endforeach
                                      @endif
                                  @endforeach
                                </select>
                                </div>
                              <p>Hình Ảnh:</p>
                              <div class="form-floating mt-3 mb-3">
                                <input type="file" class="" name="Pro_image" value="{{old('Pro_image')}}" accept="image/*" required>
                              </div>
                              
                              <p>Mô Tả:</p>
                              <div class="form-floating mb-3 mt-3">
                                <textarea class="form-control" id="comment" name="Pro_des" placeholder="Comment goes here"></textarea>
                                
                              </div>
                              <p>Trạng Thái:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Pro_status">
                                  <option value="0">Hiện</option>
                                  <option value="1">Ẩn</option>
                                </select>
                                <label for="sel1" class="form-label">Chọn</label>
                              </div>
                              <input type="submit" class="btn btn-primary" value="Thêm">
                        </form>
                    </table>
                </div>
            </div>
            
        </div>
    </main>
@endsection