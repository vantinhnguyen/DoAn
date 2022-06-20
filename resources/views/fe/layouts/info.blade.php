@extends('fe.master')
@section('main')

<!-- Font Icon -->
<link rel="stylesheet" href="{{url('assets')}}/login/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="{{url('assets')}}/login/css/style.css">

<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase text-center">Thông tin tài khoản của bạn</h3>
    </div>
</div>

{{-- content --}}
<div class="container mt-3 mb-5">
    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="login">
            <div class="signup-content">
                <div class="signup-form">
                    <!-- <h2 class="form-title"></h2> -->
                    <form method="POST" class="register-form" id="register-form" action="{{route('home.infoUpdate', Auth::user()->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" value="{{$user->name}}" placeholder="Tên tài khoản"/>
                            @error('name')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" value="{{$user->email}}" placeholder="Email"/>
                            @error('email')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" name="phone" id="email" value="{{$user->phone}}" placeholder="Số điện thoại"/>
                            @error('phone')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="text" name="password" id="pass" value="{{$user->password}}" placeholder="Mật khẩu"/>
                            @error('password')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_password" id="re_pass" placeholder="Nhập lại mật khẩu"/>
                            @error('re_password')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div> -->
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với các <a href="{{route('home.chinhSach')}}" class="term-service" style="color: #076bd6">điều khoản sử dụng</a></label>
                            @error('agree-term')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Cập nhật thông tin"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{url('assets')}}/login/images/signup-image.jpg" alt="sing up image"></figure>
                    <!-- <a href="{{route('home.login')}}" class="signup-image-link" style="color: #076bd6">Chuyển đến trang đăng nhập</a> -->
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