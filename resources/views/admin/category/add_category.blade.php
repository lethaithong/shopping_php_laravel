@extends('layout.layoutadmin')

@section('content')
{{-- {{dd($data)}} --}}
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm Danh Mục</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Thêm Danh Mục</li>
            </ol>
            <a href="{{url('admin/category/')}}"><button type="button" class="btn btn-info">Trở Về Trang Chủ</button></a>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{url('admin/category/add_category')}}" method="post" enctype="multipart/form-data">
                            
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
                            <p>Tên Danh Mục:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="Category" placeholder="Enter category" name="Cat_name" value="{{old('Cat_name')}}">
                                <label for="Category">Tên Danh Mục</label>
                              </div>
                              <p>Hình Ảnh:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="input" placeholder="Enter category" name="Cat_image" value="{{old('Cat_image')}}">
                              </div>
                              <p>Danh Mục Cha:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Cat_parent"> 
                                  <option value="0">Danh Mục Cha</option>
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
                                <label for="sel1" class="form-label">Chọn:</label>
                              </div>
                              <p>Trạng Thái:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Cat_status">
                                
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
            <div style="height: 100vh"></div>
            <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
        </div>
    </main>
    <script>
      var button1 = document.getElementById( 'input' );
      
      
      button1.onclick = function() {
        selectFileWithCKFinder( 'input' );
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