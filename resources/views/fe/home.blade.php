@extends('fe.master')
@section('main')

    @if(Session::has('ss'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-center',
                showConfirmButton: false,
                timer: 3000,
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

<!-- ban ner 1 -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/web-banner-tu-tin-song-chat%20(1).png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/web%20ads%20-%20M139.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/bANNER%20WEB%20rOYAL.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
</div>

<!-- sự kiện nổi bật -->

<div class="sknb">
    <div class="container">
        <div class="row title">
            <div class="gachTrai col-lg-4"></div>
            <div class="text  col-lg-4">
                <h2 class="text-uppercase text-center">sự kiện nổi bật</h2>
            </div>
            <div class="gachPhai col-lg-4"></div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-6 p-2">
                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/song-chat-cung-m139.jpg" alt="">
            </div>
            <div class="col-lg-6 p-2">
                <img src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/tu-tin-song-chat.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!-- sản phầm bán chạy -->

<div class="spbc">
    <div class="container">
        <div class="row title">
            <div class="gachTrai col-lg-4"></div>
            <div class="text  col-lg-4">
                <h2 class="text-uppercase text-center">sản phẩm bán chạy</h2>
            </div>
            <div class="gachPhai col-lg-4"></div>
        </div>

        <div class="row pt-4">
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
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-6 m-0 p-0">
            <img class="w-100" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/banner%20link%20web%20royal%20-%202.png" alt="">
        </div>
        <div class="col-6 m-0 p-0">
            <img class="w-100 m-0 p-0" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/banner/banner%20link%20web%20royal%20-1.png" alt="">
        </div>
    </div>
</div>

<!-- chào mừng đến với -->

<div class="cmdv">
    <div class="container">
        <div class="title-cm text-center">
            <h3 class="cm1">CHÀO MỪNG ĐẾN VỚI</h3>
            <h3 class="cm2">ROYAL HELMET</h3>
        </div>
        <div class="row mt-5">
            <div class="col-6 mt-5">
                <h4 class="text-center tit-1">KÍNH GỬI: QUÝ KHÁCH HÀNG!</h4>
                <h4 class="text-center  tit-2">CTY TNHH SX TM MAFA VN</h4>
                <p class="text-center vb-1">--------***--------</p>
                <p class="text-justify vb-2">“Xây dựng thương hiệu từ những giá trị thật”, triết lý kinh doanh riêng có luôn được ROYAL kiên trì thực hiện. Dù thị trường biến động liên tục hay khách hàng có quá nhiều sản phẩm cùng loại để chọn lựa, nhưng ROYAL vẫn luôn đảm bảo quy
                    trình sản xuất nghiêm ngặt và lựa chọn kỹ càng nguyên vật liệu đầu vào để đảm bảo chất lượng an toàn tuyệt đối của sản phẩm, cũng như tiết kiệm tối đa chi phí sản xuất để cho ra dòng sản phẩm tốt với giá thành cạnh tranh.</p>
                <p class="text-justify vb-2">Một hành trình đã qua và chặng đường phía trước luôn rộng mở, những phần thưởng, danh hiệu chính và niềm tin của khách hàng, đối tác là tiền đề và động lực để ROYAL luôn sáng tạo, đoàn kết, bứt phá và thành công trên thương trường, tiếp
                    tục giữ vững vị trí là một trong những thương hiệu mạnh hàng đầu trong lĩnh vực sản xuất, kinh doanh mũ bảo hiểm Việt Nam và trên thới giới, một hành trình vươn ra biển lớn bắt đầu…./</p>
            </div>
            <div class="col-6 mt-5">
                <img class="w-100" src="https://royalhelmet.com.vn/images/193aa2d20309f957a018.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex">
            <div class="p-5 w-25">
                <img class="w-100  scase" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/logo/Logo2020-01.png" alt="">
            </div>
            <div class="p-5 w-25">
                <img class="w-100  scase" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/logo/Logo2020-02.png" alt="">
            </div>
            <div class="p-5 w-25">
                <img class="w-100  scase" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/logo/Logo2020-03.png" alt="">
            </div>
            <div class="p-5 w-25">
                <img class="w-100  scase" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/logo/Logo2020-05.png" alt="">
            </div>
        </div>
    </div>
</div>


<!-- bài viết -->
<div class="bai-viet p-5">
    <div class="row title pb-4">
        <div class="gachTrai col-lg-5"></div>
        <div class="text  col-lg-2">
            <h2 class="text-uppercase text-center">bài viết</h2>
        </div>
        <div class="gachPhai col-lg-5"></div>
    </div>


    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active nen-do"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1" class="nen-do"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2" class="nen-do"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card mb-6  no-boder">
                    <div class="row no-gutters">

                        <div class="col-md-3">
                            <img class="w-100 d-block img-bv" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/blogs/mu-bao-hiem-mua-dong-thumb.png" alt="...">
                        </div>
                        <div class="col-md-3">
                            <div class="card-body no-background">
                                <h5 class="card-title  text-uppercase">THỂ LỆ PHOTO CHALLENGE TỰ TIN SỐNG CHẤT</h5>
                                <p class="card-text">
                                    Các tỉnh phía Bắc chuẩn bị bước vào mùa thu đông với đặc trưng là thời tiết lạnh và khô. Kiểu thời tiết đặc thù này gây ra những trở ngại, khó khăn nhất định cho mọi người, đặc biệt ...
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <img class="w-100 img-bv" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/blogs/web%2022-9-06%20(1).jpg" alt="...">
                        </div>

                        <div class="col-md-3">
                            <div class="card-body no-background">
                                <h5 class="card-title text-uppercase">Top 5 mũ bảo hiểm phòng dịch tốt nhất hiện nay</h5>
                                <p class="card-text">
                                    Các tỉnh phía Bắc chuẩn bị bước vào mùa thu đông với đặc trưng là thời tiết lạnh và khô. Kiểu thời tiết đặc thù này gây ra những trở ngại, khó khăn nhất định cho mọi người, đặc biệ ...
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card mb-6  no-boder">
                    <div class="row no-gutters">

                        <div class="col-md-3">
                            <img class="w-100 d-block img-bv" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/blogs/mu-bao-hiem-tre-em.png" alt="...">
                        </div>
                        <div class="col-md-3">
                            <div class="card-body no-background">
                                <h5 class="card-title  text-uppercase">THỂ LỆ PHOTO CHALLENGE TỰ TIN SỐNG CHẤT</h5>
                                <p class="card-text">
                                    Các tỉnh phía Bắc chuẩn bị bước vào mùa thu đông với đặc trưng là thời tiết lạnh và khô. Kiểu thời tiết đặc thù này gây ra những trở ngại, khó khăn nhất định cho mọi người, đặc biệt ...
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <img class="w-100 img-bv" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/blogs/tu-tin-song-chat-cung-royal-helmet.png" alt="...">
                        </div>

                        <div class="col-md-3">
                            <div class="card-body no-background">
                                <h5 class="card-title text-uppercase">Top 5 mũ bảo hiểm phòng dịch tốt nhất hiện nay</h5>
                                <p class="card-text">
                                    Các tỉnh phía Bắc chuẩn bị bước vào mùa thu đông với đặc trưng là thời tiết lạnh và khô. Kiểu thời tiết đặc thù này gây ra những trở ngại, khó khăn nhất định cho mọi người, đặc biệ ...
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card mb-6  no-boder">
                    <div class="row no-gutters">

                        <div class="col-md-3">
                            <img class="w-100 d-block img-bv" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/blogs/mu-bao-hiem-mua-dong-thumb.png" alt="...">
                        </div>
                        <div class="col-md-3">
                            <div class="card-body no-background">
                                <h5 class="card-title  text-uppercase">THỂ LỆ PHOTO CHALLENGE TỰ TIN SỐNG CHẤT</h5>
                                <p class="card-text">
                                    Các tỉnh phía Bắc chuẩn bị bước vào mùa thu đông với đặc trưng là thời tiết lạnh và khô. Kiểu thời tiết đặc thù này gây ra những trở ngại, khó khăn nhất định cho mọi người, đặc biệt ...
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <img class="w-100 img-bv" src="https://royalhelmet.com.vn/ckfinder/userfiles/images/blogs/web%2022-9-06%20(1).jpg" alt="...">
                        </div>

                        <div class="col-md-3">
                            <div class="card-body no-background">
                                <h5 class="card-title text-uppercase">Top 5 mũ bảo hiểm phòng dịch tốt nhất hiện nay</h5>
                                <p class="card-text">
                                    Các tỉnh phía Bắc chuẩn bị bước vào mùa thu đông với đặc trưng là thời tiết lạnh và khô. Kiểu thời tiết đặc thù này gây ra những trở ngại, khó khăn nhất định cho mọi người, đặc biệ ...
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
          <span class="carousel-control-prev-icon nen-do" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
          <span class="carousel-control-next-icon nen-do" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
    </div>

</div>
@stop