@extends('fe.master')
@section('main')
    <script src="{{url('assets')}}/sweetalert2.all.min.js"></script>
    @if(Session::has('ss'))
        <script>
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
                title: '{{Session::get('ss')}}'
            })
        </script>
    @endif
    @if(Session::has('er'))
        <script>
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
                icon: 'error',
                title: '{{Session::get('er')}}'
            })
        </script>
    @endif
<!-- Font Icon -->
<link rel="stylesheet" href="{{url('assets')}}/login/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="{{url('assets')}}/login/css/style.css">

<!-- banner -->
<div class="banner">
    <div class="sub-banner">
        <h3 class="text-uppercase text-center">Đăng nhập tài khoản</h3>
    </div>
</div>

{{-- content --}}
<div class="container mt-3 mb-5">

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="login ">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{url('assets')}}/login/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="{{route('home.register')}}" class="signup-image-link" style="color: #076bd6">Tạo tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Đăng nhập</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{route('home.loginAdd')}}">
                        @csrf
                        @if(isset($page))
                        <input type="hidden" name="page" value="{{$page}}">
                        @endif
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="your_name" value="{{old('email')}}" placeholder="Your Name"/>
                            @error('email')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group pass_input">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            <span class="pass_eye"><i class="zmdi zmdi-eye-off" value="off" name="password"></i></span>
                            @error('password')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <!-- {{-- <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div> --}} -->
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                        </div>
                    </form>
                    <!-- <div class="social-login">
                        <span class="social-label">Đăng nhập với</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div> -->
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