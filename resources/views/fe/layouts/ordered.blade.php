@extends('fe.master')
@section('main')

<link rel="stylesheet" href="{{url('assets')}}/fe-css/cart.css">
<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase ">Đơn hàng của bạn</h3>
    </div>
</div>

<!-- content -->
<div class="container cart_content">

    <div class="title pt-4 pb-3 mb-3">
        <h4 class="text-uppercase text-left">Đơn hàng của bạn</h4>
    </div>

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th class=" text-center font-weight-normal">Mã đơn hàng</th>
                    <th class=" text-center font-weight-normal">Tổng giá trị</th>
                    <th class=" text-center font-weight-normal">Thời gian đặt hàng</th>
                    <th class=" text-center font-weight-normal">Trạng thái đơn hàng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $value)
                <tr>
                    <th class="font-weight-bold">
                        <p class="font-weight-bold text-center pro-name">{{$value->id}}</p>
                    </th>

                    <td class="font-weight-normal">
                        <p class="font-weight-bold text-center pro-name">{{number_format($value->total_price,0, ',', '.')}}đ</p>
                    </td>

                    <td class=" text-center font-weight-normal">
                        <p class="font-weight-bold text-center pro-name">{{$value->created_at}}</p>
                    </td>
                    <td class="text-center font-weight-normal">
                        @if($value->status==1)
                            <p class="font-weight-bold text-center pro-name">Đang chờ xác nhận</p>
                        @elseif($value->status==2)
                            <p class="font-weight-bold text-center pro-name">Đang vận chuyển</p>
                        @elseif($value->status==3)
                            <p class="font-weight-bold text-center pro-name">Đã hoàn thành</p>
                        @elseif($value->status==4)
                            <p class="font-weight-bold text-center pro-name">Đơn hàng đã hủy</p>
                        @endif
                    </td>
                    <td class=" text-center font-weight-normal text-danger">
                        @if ($value->status==1)
                            <form action="{{route('cart.orderedDel')}}" method="post">
                                @csrf
                                <input type="hidden" name="id_order" value="{{$value->id}}">
                                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                                <button type="submit" class="huy-don">
                                    Hủy đơn hàng
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@stop