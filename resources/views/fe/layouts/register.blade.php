@extends('fe.master')
@section('main')

<!-- Font Icon -->
<link rel="stylesheet" href="{{url('assets')}}/login/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="{{url('assets')}}/login/css/style.css">

<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase text-center">Đăng ký tài khoản</h3>
    </div>
</div>

{{-- content --}}
<div class="container mt-3 mb-5">
    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="login">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Đăng ký</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{route('home.registerAdd')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Tên tài khoản"/>
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
                        </div>
                        <div class="form-group pass_input">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" value="{{old('password')}}" placeholder="Mật khẩu"/>
                            <span class="pass_eye"><i class="zmdi zmdi-eye-off" value="off" name="password"></i></span>
                            @error('password')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group pass_input">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_password" id="re_pass" placeholder="Nhập lại mật khẩu"/>
                            <span class="pass_eye"><i class="zmdi zmdi-eye-off" value="off" name="re_password"></i></span>
                            @error('re_password')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với các <a href="{{route('home.chinhSach')}}" class="term-service" style="color: #076bd6">điều khoản sử dụng</a></label>
                            @error('agree-term')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{url('assets')}}/login/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="{{route('home.login')}}" class="signup-image-link" style="color: #076bd6">Chuyển đến trang đăng nhập</a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->

<script>
    $('.pass_eye').click(function(){
        
        if($(this).children().attr('value')=='off'){
            name = $(this).children().attr('name');
            $(`input[name=${name}]`).attr('type','text');
            $(this).children().attr('class','zmdi zmdi-eye');
            $(this).children().attr('class','zmdi zmdi-eye');
            $(this).children().attr('value','on');
        }else{
            $(`input[name=${name}]`).attr('type','password');
            $(this).children().attr('class','zmdi zmdi-eye-off');
            $(this).children().attr('value','off')
        }
    });
</script>

<script src="{{url('assets')}}/login/vendor/jquery/jquery.min.js"></script>
<script src="{{url('assets')}}/login/js/main.js"></script>

</div>
@stop