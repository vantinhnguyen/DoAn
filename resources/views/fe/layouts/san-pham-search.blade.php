@extends('fe.master')
@section('main')
<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase ">Tìm kiếm: {{$key}}</h3>
    </div>
</div>

<div class="container product">
    <!-- sản phẩm -->
    <div class="row pt-4">
        
        @if ($key)
            @if ($pro->count()!=0)
                @foreach($pro as $value)
                    <div class="col-4 mb-4">
                        <div class="card w-100" style="width: 18rem;">
                            <a href="{{route('home.product_detail',$value->id)}}">
                                <img src="{{url('upload')}}/{{$value->image}}" class="card-img-top sp-img" alt="{{$value->name}}">
                            </a>
                            <div class="card-body card-body_product">
                                <h5 class="card-title text-uppercase">{{$value->name}}</h5>
                                <!-- <p class="card-text">Giá</p> -->
                                <div class="row">
                                    <!-- <a href="#" class="btn d-block col-6 mau-nut">Mua</a> -->
                                    <!-- <a href="#" class="btn d-block  col-6 mau-nut">Chi tiết</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2 style="padding-bottom: 500px;">Không tìm thấy sản phẩm nào phù hợp!</h2>
            @endif
        @else
            <h2 style="padding-bottom: 500px;">Không tìm thấy sản phẩm nào phù hợp!</h2>
        @endif

    </div>
</div>
@stop