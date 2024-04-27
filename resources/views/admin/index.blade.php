@extends('layout.layoutadmin')

@section('content')
   
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thống Kê Doanh Thu</h1>
            
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Sản Phẩm: {{$product}}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Đơn Hàng: {{$order}}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Doanh Thu: {{number_format($total)}} VND</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Thành Viên: {{$user}}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Xem chi tiết</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               
                    <form action="" autocomplete="off">
                        @csrf
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Thống Kê Doanh Thu
                        </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p>Từ Ngày: <input type="text" id="datepicker" class="form-control"></p>
                        </div>

                        <div class="col-md-3">
                            <p>Đến Ngày: <input type="text" id="datepicker2" class="form-control"></p>
                        </div>

                        <div class="col-md-3">
                            <p>Lọc Theo: <br>
                                <select class="dashboard_filter form-control">
                                    <option>--Chọn--</option>
                                    <option value="7ngayqua">7 Ngày Qua</option>
                                    <option value="thangnay">Tháng Này</option>
                                    <option value="365ngayqua">365 Ngày Qua</option>
                                </select>
                            </p>
                        </div>

                        <div class="col-md-3">
                            <br><input type="button" id="app_button" class="btn btn-primary" value="Lọc Kết Quả">
                        </div>

                        <div class="col-md-12">
                            <div id="chart" style="height: 250px;"></div>
                        </div>
                    </div>    
                    </form>
            </div>
        </div>
    </main>
    
@endsection
