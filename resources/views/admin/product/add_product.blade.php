@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm Sản Phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
            </ol>
            <a href="{{url('admin/product/')}}"><button type="button" class="btn btn-info">Trở Về Trang Chủ</button></a>
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
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Pro_name" value="{{old('Pro_name')}}">
                                <label for="email">Tên Sản Phẩm</label>
                              </div>
                              <p>Giá:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Pro_price" value="{{old('Pro_price')}}">
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
                                <input type="text" class="form-control" id="input"  name="Pro_image" value="{{old('Pro_image')}}">
                              </div>
                              {{-- <p>Size:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Pro_size">
                                  <option value="S">S</option>
                                  <option value="M">M</option>
                                  <option value="L">L</option>
                                  <option value="XL">XL</option>
                                  <option value="XXL">XXL</option>
                                </select>
                                <label for="sel1" class="form-label">Select list (select one):</label>
                              </div> --}}
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
    <script>
      var button1 = document.getElementById( 'input' );
      var button2 = document.getElementById( 'ckfinder-popup-2' );
      
      button1.onclick = function() {
        selectFileWithCKFinder( 'input' );
      };
      button2.onclick = function() {
        selectFileWithCKFinder( 'ckfinder-input-2' );
      };
      
      function selectFileWithCKFinder( elementId ) {
        CKFinder.popup( {
          chooseFiles: true,
          width: 800,
          height: 600,
          onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
              var file = evt.data.files.first();
              var output = document.getElementById( 'input' );
              output.value = file.getUrl();
            } );
      
            finder.on( 'file:choose:resizedImage', function( evt ) {
              var output = document.getElementById( 'input' );
              output.value = evt.data.resizedUrl;
            } );
          }
        } );
      }
      </script>
@endsection