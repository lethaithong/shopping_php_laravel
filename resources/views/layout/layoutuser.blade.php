<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('assets/oloi/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/oloi/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('assets/oloi/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Multi-Shop</a>
                    <a class="text-body mr-3" href="">Liên hệ</a>
                    <a class="text-body mr-3" href="">Trợ giúp</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">

                    @if(Auth::check())

                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">{{Auth::user()->Username}}</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('update_profile')}}" type="button" class="dropdown-item">Hồ Sơ</a>
                                <a href="{{url('/logout')}}" type="button" class="dropdown-item">Đăng xuất</a>
                            </div>
                    </div>
                    
                    @else
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài Khoản</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{url('/login')}}" type="button" class="dropdown-item">Đăng Nhập</a>
                        <a href="{{route('register')}}" type="button" class="dropdown-item">Đăng Kí</a>
                    </div>
                </div>
                    @endif
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Ngôn Ngữ</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Tiếng Anh</button>
                            <button class="dropdown-item" type="button">Tiếng Việt</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="{{url('/')}}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="{{url('search')}}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Chăm sóc khách hàng</p>
                <h5 class="m-0">0935753308</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Menu</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        @foreach ($category as $item)
                        @if ($item->Cat_parent == 0)
                                <div class="nav-item dropdown dropright">
                                    
                                    <a href="" class="nav-link " data-toggle="dropdown">{{$item->Cat_name}}<i class="fa fa-angle-right float-right mt-1"></i></a>
                                    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                        
                                        @foreach ($category as $sub_item)
                                            @if ($sub_item->Cat_parent != 0 && $sub_item->Cat_parent == $item->Cat_id)
                                                <a href="{{url('product_by_category')}}/{{$sub_item->Cat_id}}" class="dropdown-item">{{$sub_item->Cat_name}}</a>
                                            @endif  
                                        @endforeach

                                    </div>
                                   
                                </div>
                                @endif
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            
                            @foreach ($category as $item)
                            @if ($item->Cat_parent == 0 && $item->Cat_status == 0)
                            <div class="nav-item dropdown">

                                    <a href="" class="nav-link " data-toggle="dropdown">{{$item->Cat_name}}</a>
                                    <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                        @foreach ($category as $sub_item)
                                        @if ($sub_item->Cat_parent != 0 && $sub_item->Cat_parent == $item->Cat_id && $sub_item->Cat_status == 0)
                                        <a href="{{url('product_by_category')}}/{{$sub_item->Cat_id}}" class="dropdown-item">{{$sub_item->Cat_name}}</a>
                                        @endif  
                                        @endforeach
                                    </div>
                                    
                                
                            </div>
                            @endif
                            @endforeach
                            
                            {{--            
                            <a href="{{url('/product')}}" class="nav-item nav-link">Product</a>
                             --}}
                            @if (Auth::check()) 
                            <a href="{{url('/order')}}" class="nav-item nav-link">Đơn hàng</a>
                            @endif
                        
                        </div>

                        @if (auth::check())
                        
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="{{url('/shopping_cart')}}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{Cart::session(auth::id())->getContent()->count()}}</span>
                            </a>
                        </div>
                        
                        @else
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="{{url('/shopping_cart')}}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{Cart::getContent()->count()}}</span>
                            </a>
                        </div>

                        @endif
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    @yield('banner')
    <!-- Carousel End -->

    @yield('content')


<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Multi-Shop(BENULL)</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>180 Cao lỗ, Phường 4, Quận 8, TPHCM</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Admin@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0935753308 - 0905290863</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Trợ Giúp</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>FAQ</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Chính sách trả hàng</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Chính sách bảo mật</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Tiếp cận</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Tài Khoản</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Thông tin tài khoảng</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Đổi mật khẩu</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>lịch sử đặt hàng</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Đăng kí</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Đăng nhập</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Liên Hệ</h5>
                        <p>Nếu bạn cần giúp đỡ, vui lòng nhập Email vào form bên dưới.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Fanpages</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">Thái Thông</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{url('assets/oloi/img/payments.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('assets/oloi/lib/easing/easing.min.js')}}"></script>
    <script src="{{url('assets/oloi/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{url('assets/oloi/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{url('assets/oloi/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{url('assets/oloi/js/main.js')}}"></script>
    <script src="{{url('assets/ckfinder/ckfinder.js')}}" ></script>





</body>

</html>