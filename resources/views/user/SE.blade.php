@extends('layout.layoutuser')

@section('tiile')

MultiShop-Shopping_Cart(BENULL)

@endsection
@section('content')
 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
          @if(Session::has('ok'))
          <div style="font-size: 18px;" class="alert alert-danger">{{Session::get('ok')}} </div>
          <div style="font-size: 18px;"><a href="{{route('home')}}">
            <i class="fas fa-arrow-left me-1"></i>
            Trang Chủ
          </a></div>
          @endif
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

@endsection