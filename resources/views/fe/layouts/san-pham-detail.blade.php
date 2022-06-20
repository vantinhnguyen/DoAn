@extends('fe.master')
@section('main')
<link rel="stylesheet" href="{{url('assets')}}/fe-css/product_detail.css">
<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase text-center">{{$pro->name}}</h3>
    </div>
</div>

<div class="container product_detail">
    <div class="row mt-5 mb-5">

        <div class="col-6 p-0 ">
            <img src="{{url('upload')}}/{{$pro_det_first->image}}" class="card-img-top sp-img w-100 proDetail-img" alt="{{$pro->name}}">
        </div>

        <div class="col-6 p-0">
            <div class="pro_detail_name">
                <h1 class="card-title pro_name text-uppercase d-block">{{$pro->name}}</h1>
            </div>

            <div class="pro_detail_price">
                <h3 class="sale_price">{{number_format($pro_det_first->sale_price,0, ',', '.')}} đ</h3>
                <h3 class="price">{{number_format($pro_det_first->price,0, ',', '.')}} đ</h3>
            </div>
            <div class=" my-4">
                <h5 class="desscription">
                    {!!$pro->description!!}
                </h5>
            </div>

            <!-- <form action="#" method="">
                @csrf -->

                <!-- màu và size sản phẩm -->
                <div class="">
                    <div class="my-3">
                        <p class="font-weight-bold p-0 m-0">Màu sắc & kích thước:</p>
                    </div>
                    
                    <div class="row">
                    @foreach($pro_det as $value)
                        <div class="d-inline d-flex justify-content-start align-items-center pro-detail-color color{{$value->id}}"  boder="{{$value->id}}" boder_acti="{{$pro_det_first->id}}">
                            <input type="radio" name="color_radio" id="" class="color_radio d-none" value="{{$value->id}}" {{($value->id == $pro_det_first->id) ? 'checked' : ''}}>
                            <img src="{{url('upload')}}/{{$value->image}}" alt="" class="image_color" price="{{$value->price}}" sale_price="{{$value->sale_price}}">
                            <span>{{$value->color->name}} - {{$value->size->name}}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
                
                <!-- số lượng -->
                <div class="my-3 ">
                    <p class="font-weight-bold p-0 m-0">Số lượng:</p>
                </div>

                <div class="">
                    <div class="wrapper d-flex order-1 d-block">
                        <button type="button" class="plusminus plusminus-left order-1 d-block">-</button>
                        <input type="number" class="num order-1 d-block" value="1" min="1" max="10" name="quantity">
                        <button type="button" class="plusminus plusminus-right order-1 d-block">+</button>
                    </div>

                    <div class="">
                        <button class="mua mt-3" type="">
                            MUA
                        </button>
                    </div>
                </div>

                <!-- Sự kiện thêm vào giỏ hàng -->
                <script>
                    $('.mua').click(function(){
                        var quantity = $('.num').val();
                        var pro_det_id = $('input[name="color_radio"]:checked').val();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "POST",
                            url: "{{route('cart.Add')}}",
                            data: {
                                quantity: quantity,
                                pro_det_id: pro_det_id
                            },
                            dataType: 'json',
                            success: function (response){
                                console.log(response);

                                //hiện thông tin giỏ hàng
                                $('.qty_menu').html(response['totalQty']);
                                 $('.total_price_menu').html(` -> ${response['totalPrice'].toLocaleString('vi-VN', {style: 'currency',currency: 'VND'})}`)

                                //hiện thông báo thành công
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-center',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Thêm vào giỏ hàng thành công'
                                })
                            }
                        });
                    })
                </script>

                <!-- Sự kiện chọn màu và size sản phẩm -->
                <script>
                    //active pro_first
                    var boder = $('.pro-detail-color').attr('boder');
                    var boder_acti = $('.pro-detail-color').attr('boder_acti');
                    if (boder == boder_acti) {
                        $(`.color${boder}`).css('border','2px solid #e8bd72');
                    }

                    //sự kiện click vào màu sản phẩm
                    $('.pro-detail-color').click(function(){
                        // cheked vào màu
                        $(this).children().prop('checked', true)

                        //đổi màu nút khi checked
                        $('.pro-detail-color').css('border','1px solid #ccc');
                        $(this).css('border','2px solid #e8bd72');

                        // đổi ảnh khi checked
                        var id_pro_det = $(this).children('.image_color').attr('src');
                        $('.proDetail-img').attr('src',id_pro_det);

                        // đổi giá tiền
                        var price = $(this).children('.image_color').attr('price');
                        var sale_price = $(this).children('.image_color').attr('sale_price');
                        $('.price').html(Number(price).toLocaleString('vi-VN', {style: 'currency',currency: 'VND'}));
                        $('.sale_price').html(Number(sale_price).toLocaleString('vi-VN', {style: 'currency',currency: 'VND'}));

                    });
                </script>

                <!-- sự kiện click vào nút tăng, giảm số lượng -->
                <script>
                    $('.plusminus-left').click(function(){
                        var num = $('.num').val();
                        if (num > 1) {
                            $('.num').attr('value', Number(num)-1);
                        } else {
                            $('.num').attr('value')=1;
                        }
                    });

                    $('.plusminus-right').click(function(){
                        var num = $('.num').val();
                        $('.num').attr('value',Number(num)+1);
                    });

                    $('.plusminus-left').mousedown(function(){
                        $(this).css('color','red');
                        $('.plusminus-right').css('color','black');
                    })

                    $('.plusminus-right').mousedown(function(){
                        $(this).css('color','red');
                        $('.plusminus-left').css('color','black');
                    })
                </script>
            <!-- </form> -->
        </div>
    </div>
</div>
@stop

