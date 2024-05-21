@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Hồ Sơ</h1>
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{Session::get('message');}}</strong>
              </div>
            @endif
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif
                        <form action="{{route('update_profile_ad')}}" method="post">
                              @csrf
                              <input type="hidden" name="_method" value="PUT" >
                              <input type="hidden" name="User_id" value="{{Auth::user()->User_id}}">
                            <p>Tên:</p>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Username" value="{{Auth::user()->Username}}">
                                <label for="email">Tên</label>
                              </div>
                              <p>Email:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="Email" value="{{Auth::user()->Email}}">
                                <label for="email">Email</label>
                              </div>
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