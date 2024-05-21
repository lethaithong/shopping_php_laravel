@extends('layout.layoutadmin')

@section('content')
{{-- {{dd($data)}} --}}
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cập Nhật Danh Mục</h1>
            
            <a href="{{url('admin/category/')}}"><button type="button" class="btn btn-info mt-2 mb-4">Trở Về Trang Chủ</button></a>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                      
                        <form action="{{url('admin/category/update_category')}}" method="post" enctype="multipart/form-data">
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
                              <input type="hidden" name="_method" value="PUT">
                              <input type="hidden" name="Cat_id" value="{{$data->Cat_id}}">
                            <p>Tên Danh Mục:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="Category" placeholder="Enter category" name="Cat_name" value="{{$data->Cat_name}}">
                                <label for="Category">Tên Danh Mục</label>
                              </div>
                              
                              <p>Danh Mục Cha:</p>
                              
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Cat_parent" value="{{$data->Cat_parent}}">
                                  <option value="0">Danh Mục Cha</option>
                                  @foreach ($category as $item)
                                      @if($item->Cat_parent == 0)
                                            <option value="{{$item->Cat_id}}" @if($data->Cat_id == $item->Cat_id) selected @endif>-{{$item->Cat_name}}</option>
                                            {{-- @foreach ($category as $sub_item)
                                                @if($sub_item->Cat_parent != 0 && $sub_item->Cat_parent == $item->Cat_id)
                                                    <option style="color: red; font-size:15px" value="{{$sub_item->Cat_parent}}" @if($sub_item->Cat_id == $data->Cat_id) selected @endif>&nbsp; &nbsp;+{{$sub_item->Cat_name}}</option>
                                                @endif
                                            @endforeach --}}
                                      @endif
                                  @endforeach
                                </select>
                                <label for="sel1" class="form-label">Chọn</label>
                              </div>
                              <p>Trạng Thái:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Cat_status">
                                
                                  <option value="0">Hiện</option>
                                  <option value="1">Ẩn</option>
                                </select>
                                <label for="sel1" class="form-label">Chọn</label>
                              </div>
                              
                              <input type="submit" class="btn btn-primary" value="Cập Nhật">
                              
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