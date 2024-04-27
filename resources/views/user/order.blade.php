@extends('layout.layoutuser')

@section('tiile')

MultiShop-Shopping_Cart(BENULL)

@endsection

@section('content')

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Số Thứ Tự</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($data as $k => $item)
                    <tr>
                        <td class="align-middle">Đơn Hàng {{$k+1}}</td>

                        <td class="align-middle">{{$item->created_at}}</td>
                        <td class="align-middle font-weight-bold">
                            @if ($item->Status == 0)
                                <a>Đang xử lý</a>
                            @else
                                <a>Đã xử lý</a>
                            @endif
                        </td>
                        <td class="align-middle font-weight-bold"><a href="{{url('order_detail')}}/{{$item->Order_id}}">Xem chi tiết</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection