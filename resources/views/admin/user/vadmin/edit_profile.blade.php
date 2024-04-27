@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Hồ Sơ</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Hồ Sơ</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{route('update_profile_ad')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="_method" value="PUT" >
                              <input type="hidden" name="User_id" value="{{Auth::user()->User_id}}">
                              @if(Session::has('message'))
                              <div style="font-size: 18px;" class="alert alert-danger">{{Session::get('success')}}</div>
                              @endif
                            <p>Tên:</p>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Username" value="{{Auth::user()->Username}}">
                                <label for="email">Tên</label>
                              </div>
                              {{-- <p>Mật Khẩu:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{Auth::user()->password}}">
                                <label for="email">Mật Khẩu</label>
                              </div> --}}
                              <p>Email:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Email" value="{{Auth::user()->Email}}">
                                <label for="email">Email</label>
                              </div>
                              {{-- <p>Hình Ảnh:</p>
                              <div class="form-floating mt-3 mb-3">
                                <input type="text" class="form-control" id="input"  name="Image" value="{{Auth::user()->Image}}">
                                <label for="pwd"></label>
                              </div> --}}
                              <p>Địa Chỉ:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Address" value="{{Auth::user()->Address}}">
                                <label for="email">Địa Chỉ</label>
                              </div>
                              <p>Số Điện Thoại:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Phone" value="{{Auth::user()->Phone}}">
                                <label for="email">Số Điện Thoại</label>
                              </div>
                              <input type="submit" class="btn btn-primary" value="Cập Nhật">
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