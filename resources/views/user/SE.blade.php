@extends('layout.layoutuser')

@section('tiile')

MultiShop-Shopping_Cart(BENULL)

@endsection
@section('content')
 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12 text-center">
          <h2><span class="px-2">MULTISHOP</span></h1>
            <h5 class="font-weight-bold my-auto"><span class="mt-2">ĐẶT HÀNG THÀNH CÔNG</span></h5>
            <p class="mt-2">Chúc mừng quý khách đẵ thanh toán thành công tại MULTISHOP</p>
            <a href="{{route('home')}}"><button type="button" class="btn btn-outline-dark mt-2 rounded">Tiếp tục mua sắm
            </button></a>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

@endsection