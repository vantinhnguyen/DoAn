<link rel="stylesheet" href="{{url('assets')}}/fe-css/themify-icons/themify-icons.css">
<!-- Phần menu cho desktop-->
<div class="nav-desktop" >
    <div class="container d-flex justify-content-center">
        <!-- Phần bên trái -->
        <div class="nav-left">
            <div class="nav-left-top">
                <ul class="d-flex p-0 m-0">
                    <li><a href="{{route('home.index')}}" class="p-3 text-uppercase">home</a></li>
                    <li><a href="{{route('home.veChungToi')}}" class="p-3 text-uppercase">về chúng tôi</a></li>
                    <li><a href="{{route('home.product')}}" class="p-3 text-uppercase">sản phẩm</a></li>
                    <li><a href="{{route('home.daiLy')}}" class="p-3 text-uppercase">đại lý</a></li>
                </ul>
            </div>
            <div class="nav-left-bottom d-flex justify-content-end">
                <div class="category">
                    <span class="category_tile">DANH MỤC SẢN PHẨM</span>
                    <ul class="category_list m-0">
                        <li>
                            <a href="{{route('home.productFilter','mu-bao-hiem-3-4-dau')}}">
                                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/icon/IMG_1391.png" alt="">
                                Mũ bảo hiểm 3/4 đầu
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home.productFilter','mu-bao-hiem-fullface')}}">
                                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/icon/PgETZCIMG_0547.png" alt="">
                                Mũ bảo hiểm Fullface
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home.productFilter','mu-bao-hiem-lat-cam')}}">
                                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/icon/IMG_1518.png" alt="">
                                Mũ bảo hiểm lật cằm
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home.productFilter','mu-bao-hiem-1-2-dau')}}">
                                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/icon/105-black.png" alt="">
                                Mũ bảo hiểm 1/2 đầu
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home.productFilter','kinh-mu-bao-hiem')}}">
                                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/icon/ij4zFGIMG_2928.png" alt="">
                                Kính mũ bảo hiểm
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home.productFilter','mu-bao-hiem-di-xe-dap')}}">
                                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/icon/jc-icon.png" alt="">
                                Mũ bảo hiểm đi xe đạp
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Phần trung tâm -->
        <div class="nav-center d-flex align-items-center">
            <a href="{{route('home.index')}}"><img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/logo.png" alt="Royal"></a>
        </div>

        <!-- Phần bên phải -->
        <div class="nav-right">
            <div class="nav-right-top">
                <ul class="d-flex p-0 m-0">
                    <li><a href="{{route('home.chinhSach')}}" class="p-3 text-uppercase">chính sách</a></li>
                    <li><a href="{{route('home.blogs')}}" class="p-3 text-uppercase">blogs</a></li>
                    <li><a href="{{route('home.tuyenDung')}}" class="p-3 text-uppercase">tuyển dụng</a></li>
                    <li><a href="{{route('home.lienHe')}}" class="p-3 text-uppercase">Liên hệ</a></li>
                </ul>
            </div>
            <div class="nav-right-bottom d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    
                    <div class="user mr-3">
                        <i class="ti-user"></i>
                        <ul class="user_option">
                            @if(Auth::check())
                                <li>
                                    <a href="{{route('home.info')}}" class="d-flex">
                                    <i class="ti-user"></i>
                                    {{Auth::user()->name}}
                                </a>
                                </li>
                            @endif

                            @if(Auth::check())
                                <li>
                                    <a href="{{route('home.password')}}" class="d-flex">
                                        <i class="ti-lock"></i>
                                        Đổi mật khẩu
                                    </a>
                                </li>
                            @endif

                            @if(Auth::check())
                                <li>
                                    <a href="{{route('cart.ordered')}}" class="d-flex">
                                        <i class="ti-shopping-cart"></i>
                                        Đơn hàng của bạn
                                    </a>
                                </li>
                            @endif


                            @if(!Auth::check())
                            <li>
                                <a href="{{route('home.login')}}" class="d-flex">
                                    <i class="ti-import"></i>
                                    Đăng nhập
                                </a>
                            </li>
                            @endif

                            @if(!Auth::check())

                            <li>
                                <a href="{{route('home.register')}}" class="d-flex">
                                    <i class="ti-marker-alt"></i>
                                    Đăng ký
                                </a>
                            </li>
                            @endif


                            @if(Auth::check())
                            <li>
                                <a href="{{route('home.logout')}}" class="d-flex">
                                    <i class="ti-export"></i>
                                    Đăng xuất
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div class="bag">
                        <a href="{{route('cart.Show')}}">
                            <i class="ti-bag"></i>
                        </a>
                        <span class="qty qty_menu">{{$totalQty}}</span>
                        <span class="total_price total_price_menu"><span class="ti-arrow-right" style="font-size:12px"></span> {{number_format($totalPrice,0, ',', '.')}} đ</span>
                    </div>
                </div>

                <div class="search">
                    <form action="">
                        <input type="text" name="keyword" id="" class="keyword_text" placeholder="Tìm kiếm">
                        <button tyle="submit" class="keyword_btn">
                            <i class="ti-search"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>