@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Home page</a></li>
                <li class="breadcrumb-item active">Update Users</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{url('admin/user/vuser/update_user')}}" method="post" enctype="multipart/form-data">
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
                              <input type="hidden" name="User_id" value="{{$data->User_id}}">
                            <p>User Name:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="" placeholder="Enter email" name="Username" value="{{$data->Username}}">
                                <label for="email">Name</label>
                              </div>
                              <p>Password:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="" placeholder="Enter email" name="Password" value="{{$data->Password}}">
                                <label for="email">Password</label>
                              </div>
                              <p>Email:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="" placeholder="Enter email" name="Email" value="{{$data->Email}}">
                                <label for="email">Email</label>
                              </div>
                              <p>Image User:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="input" placeholder="Enter category" name="Image" value="{{$data->Image}}">
                              </div>
                              <p>Address:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="" placeholder="Enter email" name="Address" value="{{$data->Address}}">
                                <label for="email">Address</label>
                              </div>
                              <p>Phone Number:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="" placeholder="Enter email" name="Phone"value="{{$data->Phone}}">
                                <label for="email">Phone Number</label>
                              </div>
                              <p>Level:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Level">
                                  <option value="0">Admin</option>
                                  <option value="1">Customer</option>
                                </select>
                                <label for="sel1" class="form-label">Select list (select one):</label>
                              </div>
                              <p>Status:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Status">
                                  <option value="0">Hiện</option>
                                  <option value="1">Ẩn</option>
                                </select>
                                <label for="sel1" class="form-label">Select list (select one):</label>
                              </div>
                              <input type="submit" class="btn btn-primary" value="Update">
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