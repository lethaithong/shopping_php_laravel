@extends('layout.layoutadmin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Customer</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Home page</a></li>
                <li class="breadcrumb-item active">Add Customer</li>
            </ol>
            <a href="{{url('admin/user/vuser')}}"><button type="button" class="btn btn-info">Back Customer Home</button></a>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{url('admin/user/vuser/add_user')}}" method="post" enctype="multipart/form-data">
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
                      <p>User Name:</p>
                      <div class="form-floating mb-3 mt-3">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="Username" value="{{old('Username')}}">
                          <label for="email">Name</label>
                        </div>
                        <p>Password:</p>
                        <div class="form-floating mb-3 mt-3">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="Password" value="{{old('Password')}}">
                          <label for="email">Password</label>
                        </div>
                        <p>Email:</p>
                        <div class="form-floating mb-3 mt-3">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="Email" value="{{old('Email')}}">
                          <label for="email">Email</label>
                        </div>
                        <p>Address:</p>
                        <div class="form-floating mb-3 mt-3">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="Address" value="{{old('Address')}}">
                          <label for="email">Address</label>
                        </div>
                        <p>Phone Number:</p>
                        <div class="form-floating mb-3 mt-3">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="Phone" value="{{old('Phone')}}">
                          <label for="email">Phone Number</label>
                        </div>
                        <p>Image Admin:</p>
                      <div class="form-floating mb-3 mt-3">
                          <input type="text" class="form-control" id="input" placeholder="Enter category" name="Image" value="{{old('Image')}}">
                        </div>
                              <p>Status:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Status">
                                  <option value="0">Hiện</option>
                                  <option value="1">Ẩn</option>
                                </select>
                                <label for="sel1" class="form-label">Select list (select one):</label>
                              </div>
                              <p>Level:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Level">
                                  <option value="0">Admin</option>
                                  <option value="1">Customer</option>
                                </select>
                                <label for="sel1" class="form-label">Select list (select one):</label>
                              </div>
                              <input type="submit" class="btn btn-primary" value="Add">
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