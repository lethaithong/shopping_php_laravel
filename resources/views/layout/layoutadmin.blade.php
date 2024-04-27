<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{url('assets2/lumino/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('admin/')}}">Hello Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Tìm Kiếm..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->Username}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="{{url('/logout')}}">Đăng Xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('admin/')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                                Trang Chủ
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('admin/category')}}">Show Category</a>
                                    <a class="nav-link" href="{{url('admin/category/add_category')}}">Add Category</a>
                                    <a class="nav-link" href="{{url('admin/category/update_category')}}">Udate Category</a>
                                    <a class="nav-link" href="{{url('admin/category/delete_category')}}">Delete Category</a>
                                </nav>
                            </div> --}}
                            @if (Auth::user()->Level == 0)
                            <a class="nav-link" href="{{url('admin/category')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Danh Mục Sản Phẩm
                            </a>

                            <a class="nav-link" href="{{url('admin/product')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sản Phẩm
                            </a>
                            @endif
                            {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="a">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Product
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('admin/product')}}">Show Product</a>
                                    <a class="nav-link" href="{{url('admin/product/add_product')}}">Add Product</a>
                                    <a class="nav-link" href="{{url('admin/product/update_product')}}">Udate Product</a>
                                    <a class="nav-link" href="{{url('admin/product/delete_product')}}">Delete Product</a>
                                </nav>
                            </div> --}}

                            @if (Auth::user()->Level == 0)
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fa-regular fa-circle-user"></i></div>
                                    Thành Viên
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link collapsed" href="{{url('admin/user/vadmin')}}" >
                                            Quản Trị
                                        </a>
                                        <a class="nav-link collapsed" href="{{url('admin/user/vuser')}}" >
                                            Khách Hàng
                                        </a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="{{url('admin/coupon')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Khuyến Mãi
                                </a>
                            @endif
                            <a class="nav-link" href="{{url('admin/Order')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Đơn Hàng
                            </a>
                            <a class="nav-link" href="{{url('admin/user/vadmin/edit_profile')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></div>
                                Hồ Sơ
                            </a>
                            
                        </div>
                    </div>
                    {{-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> --}}
                </nav>
            </div>
        @yield('content')  
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('assets2/lumino/js/scripts.js')}}"></script>
        
        <script src="{{url('assets2/lumino/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{url('assets2/lumino/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{url('assets2/lumino/js/datatables-simple-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
        <script src="{{url('assets/ckfinder/ckfinder.js')}}" ></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

        <script>
            CKEDITOR.replace( 'Pro_des' );
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            chart30day();
            var chart = new Morris.Bar({
            element: 'chart',

            xkey: 'date_order',
            hideHover: 'auto',

            ykeys: ['Total'],
            
            labels: ['Daonh Thu']
            });     

            $('.dashboard_filter').change(function() {

                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();

                //alert(dashboard_value);
                $.ajax({
                    url:"{{url('/admin/change')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{dashboard_value:dashboard_value,_token:_token},

                    success:function(data){
                        chart.setData(data);
                    }
                });
                });

            $('#app_button').click(function() {
                var _token = $('input[name="_token"]').val();

                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();
        
                $.ajax({
                    url:"{{url('/admin/filter_by_date')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{from_date:from_date,to_date:to_date,_token:_token},

                    success:function(data){
                        chart.setData(data);
                    }
                });
            });

            function chart30day(){

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{url('/admin/refesh')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{_token:_token},

                    success:function(data){
                        chart.setData(data);
                    }
                });

            }

        });
        </script>

<script type="text/javascript">
    $( function() {
      $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
      });
    } );

    $( function() {
        $( "#datepicker2" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    } );

</script> 

    </body>
</html>
