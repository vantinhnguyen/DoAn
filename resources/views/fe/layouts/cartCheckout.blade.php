@extends('fe.master')
@section('main')

<!-- Font Icon -->
<link rel="stylesheet" href="{{url('assets')}}/login/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="{{url('assets')}}/login/css/style.css">

<!-- checkout css -->
<link rel="stylesheet" href="{{url('assets')}}/fe-css/checkout.css">

<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase text-center">đặt hàng</h3>
    </div>
</div>

{{-- content --}}
<div class="container mt-3 mb-5">
    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="login">
            <div class="signup-content">
                <div class="signup-form">
                    <h3 class="form-title">Thông tin giao hàng</h3>
                    
                    @if(Auth::check())
                        <form method="POST" class="register-form" id="register-form" action="{{route('cart.checkoutAdd')}}">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Tên khách hàng"/>
                                @error('name')
                                    <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="Email"/>
                                @error('email')
                                    <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="email" value="{{old('phone')}}" placeholder="Số điện thoại"/>
                                @error('phone')
                                    <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div> -->
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-google-maps"></i></label>
                                <input type="text" name="address" id="pass" value="" placeholder="Địa chỉ giao hàng"/>
                                @error('address')
                                    <p class="help-block" style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-border-color"></i></label>
                                <input type="text" name="note" id="re_pass" placeholder="Ghi chú"/>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" id="signup" class="form-submit">Đặt hàng</button>
                            </div>
                        </form>
                    @else
                        <div class="">
                            <h6 class="text-danger">Bạn cần đăng nhập trước khi đặt hàng</h6>
                            <a href="{{route('home.login')}}?page=cart.checkout" class="signup-image-link" style="color: #076bd6">Chuyển đến trang đăng nhập</a>
                        </div>
                    @endif
                </div>
                <div class="signup-image">
                    <h3 class="form-title">Thông tin đơn hàng</h3>
                    <table>
                        @foreach($cart as $value)
                        <tr>
                            <td class="cart">
                                <h6 class="text-uppercase cart-name">{{$value['productDetail_quantity']}} X {{$value['productDetail_name']}}</h6>
                                <p class="text-primary">{{$value['color']}} - {{$value['productDetail_size']}} - {{number_format($value['productDetail_price'],0, ',', '.')}} đ</p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="pt-3 total_price">
                                <h5 class="text-danger">Tổng cộng: {{number_format($totalPrice,0, ',', '.')}} đ</h5>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{url('assets')}}/login/vendor/jquery/jquery.min.js"></script>
<script src="{{url('assets')}}/login/js/main.js"></script>

</div>
@stop