@extends('layout.layoutadmin')

@section('content')
{{-- {{dd($data)}} --}}
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cập Nhật Khuyến Mãi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active">Cập Nhật Khuyến Mãi</li>
            </ol>
            <a href="{{url('admin/coupon/')}}"><button type="button" class="btn btn-info">Trở Về Trang Chủ</button></a>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <form action="{{url('admin/coupon/update_coupon')}}" method="post" enctype="multipart/form-data">
                            
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
                              <input type="hidden" name="Coupon_id" value="{{$data->Coupon_id}}">
                            <p>Tên Khuyến Mãi:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Enter Coupon" name="Coupon_name" value="{{$data->Coupon_name}}">
                                <label for="Category">Tên</label>
                              </div>
                              <p>Mã Khuyến Mãi:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Enter Coupon" name="Coupon_code" value="{{$data->Coupon_code}}">
                                <label for="Category">Mã</label>
                              </div>
                              <p>Số Lượng:</p>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Enter Quantity" name="Coupon_quantity" value="{{$data->Coupon_quantity}}">
                                <label for="email">Số Lượng</label>
                              </div>
                              <p>Tính Năng Mã:</p>
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" id="sel1" name="Coupon_condition"> 
                                  <option value="0">---Chon---</option>
                                  <option value="1">Giảm Theo %</option>
                                  <option value="2">Giảm Theo Tiền</option>
                                </select>
                                <label for="sel1" class="form-label">Chọn</label>
                              </div>
                              <p>Nhập Số % Hoặc Số Tiền Giảm:</p>
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Enter Quantity" name="Coupon_number" value="{{$data->Coupon_number}}">
                                  
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