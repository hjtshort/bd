<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('/assets/js/vendors/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.bxslider.min.js') }}"></script>
    <link href="{{ asset('/assets/css/tabler.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/lightbox.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/jquery.bxslider.css') }}" rel="stylesheet" />
    <script src="{{ asset('/assets/owl.carousel.js') }}"></script>
    <script src="{{ asset('/assets/lightbox.js') }}"></script>
    <link href="{{ asset('/assets/owl.carousel.css')  }}" rel="stylesheet" />
    <link href="{{ asset('/assets/owl.theme.default.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/scss/main.css') }}" rel="stylesheet" />
    <script src="{{ asset('/assets/js/core.js') }}"></script>
</head>

<body class="">
<div class="page">
    <!-- Header -->
@include('module/header')
<!-- end: Header -->
    <!-- Content -->
@yield('content')
<!-- end: Content -->
    <!-- Footer -->
@include('module/footer')
<!-- end: Footer -->
</div>
</body>
@yield('script')

</html>
