<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop men | @yeild('title')</title>
    @include('layouts.home.layouts.css')
</head>
<body>
    @include('layouts.home.layouts.header')
    
    @yield('slide')
    @yield('content')
    
    <!-- end info shop men -->

    <!-- footer -->
    @include('layouts.home.layouts.footer')
    <!-- end footer -->
    @include('layouts.home.layouts.js')
</body>
</html>