<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Royal Helmel - Nón & mũ bảo hiển chính hãng</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="https://royalhelmet.com.vn/ckfinder/userfiles/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- link css -->
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/menu.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/footer.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/home.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/ve-chung-toi.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/dai-ly.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/blogs.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/tuyen-dung.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/lien-he.css">
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/product.css">

    <!-- link font -->
    <link rel="stylesheet" href="{{url('assets')}}/fe-css/themify-icons/themify-icons.css">
</head>

<script src="{{url('assets')}}/jquery-3.6.0.min.js"></script>
<script src="{{url('assets')}}/sweetalert2.all.min.js"></script>


<body>
<!-- menu -->
@include('fe/layouts/menu')

<!-- main content -->
<div class="main" style="margin-top: 100px;">
    @yield('main')
</div>

<!-- footer -->
@include('fe/layouts/footer')

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>