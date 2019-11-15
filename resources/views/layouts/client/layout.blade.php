<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/client/owl/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/client/fonts/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/client/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/client/fonts/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/client/css.css')}}">
</head>
<body>
@include('layouts.client.header')
    <!-- end header -->
    @yield('slide')
    @yield('content')

    <!-- footer -->
   @include('layouts.client.footer')
        
    <!-- end footer -->
    <script src="{{asset('/client/jquery.min.js')}}"></script>
    <script src="{{asset('/client/owl/dist/owl.carousel.min.js')}}"></script>
    @yield('script')
</body>
</html>