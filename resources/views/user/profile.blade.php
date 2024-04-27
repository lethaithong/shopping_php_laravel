
@extends('layout.layoutuser')

@section('title')
MultiShop-Product(BENULL)
@endsection

@section('content')
    
<div class="container-xl px-4 mt-4">
    
    
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Hình ảnh</div>
                
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" height="200px" width="180px" src="{{Auth::user()->Image}}" alt="">
                    <!-- Profile picture help block-->
                    
                    
                
                </div>
            
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Chi Tiết Tài Khoản</div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div style="font-size: 18px;" class="alert alert-danger">{{Session::get('success')}}</div>
                    @endif
                    <form action="{{route('update_profile')}}" method="post">
                        <input type="hidden" name="User_id" value="{{Auth::user()->User_id}}">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên Tài Khoản</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Username" value="{{Auth::user()->Username}}" name="Username">
                        </div>
                        <!-- Form Row-->

                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Hình Ảnh</label>
                            <input class="form-control" id="input" type="text" placeholder="Image" value="{{Auth::user()->Image}}" name="Image" >
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Email</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Email" value="{{Auth::user()->Email}}" name="Email">
                        </div>
                        <!-- Form Row        -->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Địa Chỉ</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Address" value="{{Auth::user()->Address}}" name="Address">
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Số Điện Thoại</label>
                            <input class="form-control" id="inputEmailAddress" type="text" placeholder="Phone" value="{{Auth::user()->Phone}}" name="Phone">
                        </div>
                        <!-- Form Row-->
                        <!-- Save changes button-->
                        <input type="submit" class="btn btn-primary" value="Cập Nhật">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
