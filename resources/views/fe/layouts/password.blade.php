@extends('fe.master')
@section('main')

<!-- Font Icon -->
<link rel="stylesheet" href="{{url('assets')}}/login/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="{{url('assets')}}/login/css/style.css">

<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase text-center">Đổi mật khẩu</h3>
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
                    <form method="POST" class="register-form" id="register-form" action="{{route('home.passwordEdit')}}">
                        @csrf

                        <div class="form-group pass_input">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password_old" id="pass" value="" placeholder="Mật khẩu hiện tại"/>
                            <span class="pass_eye"><i class="zmdi zmdi-eye-off" value="off" name="password_old"></i></span>
                            @error('password_old')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror

                            @if(isset($err))
                            <p class="help-block" style="color:red">{{$err}}</p>
                            @endif
                        </div>

                        <div class="form-group pass_input">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" value="" placeholder="Mật khẩu mới"/>
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

                        <div class="form-group form-button">
                            <button type="submit" name="signup" id="signup" class="form-submit" style="border:none">
                            Cập nhật mật khẩu
                        </div>

                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{url('assets')}}/login/images/signup-image.jpg" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>

</div>

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

<!-- JS -->
<script src="{{url('assets')}}/login/vendor/jquery/jquery.min.js"></script>
<script src="{{url('assets')}}/login/js/main.js"></script>



</div>
@stop