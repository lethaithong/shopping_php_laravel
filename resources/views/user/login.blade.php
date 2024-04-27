<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{url('assets3/login/login/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url(assets3/login/login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			{{-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #10</h2>
				</div>
			</div> --}}
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Đăng nhập tài khoản</h3>
		      	<form action="{{route('login')}}" class="signin-form" method="post">

					@if(Session::has('success'))
                        <div style="font-size: 18px;" class="alert alert-danger">{{Session::get('success')}}</div>
                    @endif

					@if(Session::has('error'))
                        <div style="font-size: 18px;" class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif

					@csrf
		      		<div class="form-group">
		      			<input type="email" class="form-control" placeholder="Nhập Email..."  name="Email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="text" class="form-control" placeholder="Nhập Mật khẩu..." name="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
				
				{{-- <img src="/upload/images/product/product_2/Quan-jeans-Aristino-AJNR04-11-x500x500x4.jpg" alt="" height="70px" width="70px"> --}}
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Đăng Nhập</button>
	            </div>
				<div class="form-group d-md-flex">
				<div class="w-50">
					<h5 style="color: #fff">Đã có tài khoản?</h5>
				</div>
				<div class="w-50 text-md-right">
					<h5><a href="{{url('register')}}" style="color: #fff">Đăng kí</a></h5>
				</div>
			</div>
				
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Giữ thông tin
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Quên mật khẩu</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Đăng kí với &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('assets3/login/login/js/jquery.min.js')}}"></script>
  <script src="{{url('assets3/login/login/js/popper.js')}}"></script>
  <script src="{{url('assets3/login/login/js/bootstrap.min.js')}}"></script>
  <script src="{{url('assets3/login/login/js/main.js')}}"></script>

	</body>
</html>

