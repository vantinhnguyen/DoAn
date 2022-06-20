@extends('fe.master')
@section('main')
<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase ">Sản phẩm của chúng tôi</h3>
    </div>
</div>

<div class="container product">
    @foreach($cate as $item)
        <!-- title -->
        <div class="row title pt-3 pb-3">
            <div class="gachTrai col-lg-4"></div>
            <div class="text  col-lg-4">
                <h2 class="text-uppercase text-center">{{$item->name}}</h2>
            </div>
            <div class="gachPhai col-lg-4"></div>
        </div>

        <!-- sản phẩm -->
        <div class="row pt-4">
            @foreach($pro as $value)
                @if($value->category_id == $item->id)
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
                @endif
            @endforeach
        </div>
    @endforeach

</div>
@stop