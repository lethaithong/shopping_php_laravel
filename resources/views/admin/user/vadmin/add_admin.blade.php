@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thêm Quản Trị</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Thêm Quản Trị</li>
            </ol>
            <a href="{{url('admin/user/vadmin')}}"><button type="button" class="btn btn-info">Trở Về Trang Chủ</button></a>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{url('admin/user/vadmin/add_admin')}}" method="post" enctype="multipart/form-data">
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
                            <p>Tên Người Dùng:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Username" value="{{old('Username')}}">
                                <label for="email">Tên</label>
                              </div>
                              <p>Mật Khẩu:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Password" value="{{old('Password')}}">
                                <label for="email">Mật Khẩu</label>
                              </div>
                              <p>Email:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Email" value="{{old('Email')}}">
                                <label for="email">Email</label>
                              </div>
                              <p>Địa Chỉ:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Address" value="{{old('Address')}}">
                                <label for="email">Địa Chỉ</label>
                              </div>
                              <p>Số Điện Thoại:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Phone" value="{{old('Phone')}}">
                                <label for="email">Số Điện Thoại</label>
                              </div>
                              {{-- <p>Image Admin:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="input" placeholder="Enter category" name="Image" value="{{old('Username')}}">
                              </div> --}}
                              <p>Trạng Thái:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Status">
                                  <option value="0">Hiện</option>
                                  <option value="1">Ẩn</option>
                                </select>
                                <label for="sel1" class="form-label">Chọn:</label>
                              </div>
                              <p>Cấp Bậc:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Level">
                                  <option value="0">Quản Lý</option>
                                  <option value="1">Nhân Viên</option>
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