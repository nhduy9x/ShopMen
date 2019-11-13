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
<header class="" >
        <div  id="top-bar" class="container-fluid" >
            <div class="row">
                <div class="col-6 top-bar-left">
                    <ul class="list-inline ">
                        <li class="">
                            <i class="fas fa-phone text-light"></i>
                            Hotline:
                            <a href="tel:0868676687">0868676687</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 top-bar-right ">
                    <ul class="list-inline  float-right">
                        <li class="list-inline-item">
                            <a href="#">Cách chọn Size</a>
                        </li>
                        <li class="list-inline-item ">
                            <a href="#">Giới thiệu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end top bar -->

        <div id="menu" class="container-fluid ">
            <div class="row">
                <div class="col-5 col-md-2 logo">
                    <a href="index.html"><img src="./img/logo.png" alt=""></a>
                </div>
                <div class="col-md-8 menu-shop">
                    <nav>
                        <ul class="list-inline ul-parent">
                            <li class="list-inline-item li-category-parent">
                                <a href="#">ÁO NAM</a>
                                <i class="fas fa-angle-down"></i>
                                <ul class="menu-ul-child">
                                    <li>
                                        <a href="">ÁO SƠ MI NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ THUN NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ KHOÁC NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ VEST NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ LEN NAM</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-inline-item li-category-parent">
                                <a href="#">QUẦN NAM</a>
                                <i class="fas fa-angle-down"></i>
                                <ul class="menu-ul-child">
                                    <li>
                                        <a href="">ÁO SƠ JEAN NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ KAKI NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ SHORT NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ VEST NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ TÂY NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ JOGGER NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO SƠ LÓT NAM</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-inline-item li-category-parent">
                                <a href="#">GIẦY DÉP</a>
                                <i class="fas fa-angle-down"></i>
                                <ul class="menu-ul-child">
                                    <li>
                                        <a href="">GIẦY MỌI</a>
                                    </li>
                                    <li>
                                        <a href="">GIẦY TÂY NAM</a>
                                    </li>
                                    <li>
                                        <a href="">GIẦY BOOT NAM</a>
                                    </li>
                                    <li>
                                        <a href="">ÁO THỜI TRANG</a>
                                    </li>
                                    <li>
                                        <a href="">GIẦY THỂ THAO</a>
                                    </li>
                                    <li>
                                        <a href="">GIẦY TĂNG CHIỀU CAO</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-inline-item li-category-parent">
                                <a href="#">PHỤ KIỆN</a>
                                <i class="fas fa-angle-down"></i>
                                <ul class="menu-ul-child">
                                    <li>
                                        <a href="">VÍ NAM</a>
                                    </li>
                                    <li>
                                        <a href="">MŨ NÁO</a>
                                    </li>
                                    <li>
                                        <a href="">TÚI SACH NAM</a>
                                    </li>
                                    <li>
                                        <a href="">BALO NAM</a>
                                    </li>
                                    <li>
                                        <a href="">THẮT LƯNG NAM</a>
                                    </li>
                                    <li>
                                        <a href="">CÀ VẠT & NƠ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-inline-item li-category-parent ">
                                <a href="#">KHUYẾN MẠI</a>
                                <i class="fas fa-angle-down"></i>
                                <span class="sale-hot">Hot</span>
                                <ul class="menu-ul-child">
                                    <li>
                                        <a href="">Saleoff 70%</a>
                                    </li>
                                    <li>
                                        <a href="">Saleoff 50%</a>
                                    </li>
                                    <li>
                                        <a href="">Saleoff 40%</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </nav>
                </div>
                <div class="col-7 col-md-2">
                    <div class="market-right float-right ">
                        <i class="fas fa-shopping-cart"></i>
                        <i class="fas fa-search"></i>
                        <i class="fas fa-bars"></i>
                        <form action="" class="form-search">
                            <input type="text" placeholder="Tìm kiếm">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    @yield('slide')
    @yield('content')

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 widget-footer">
                    <img src="./img/logo-footer.png" alt="">
                    <p>THƯƠNG HIỆU THỜI TRANG VIỆT NAM</p>
                    <ul class="list-footer-contact">
                        <li>
                            <i class="far fa-envelope"></i>
                            Email :
                            <a href="">son@gmail.com</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            Hotline :
                            <a href="">0868676687</a>
                        </li>
                    </ul>  
                    <a href="" class="contact-mail"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="contact-mail"><i class="fas fa-envelope"></i></a>
                </div>
                <div class="col-md-3 widget-footer">
                    <h5>TRỢ GIÚP & TƯ VẤN</h5>
                    <ul class="menu-footer">
                        <li class="">
                            <a href=""><i class="fas fa-angle-double-right"></i> Liên hệ</a>
                        </li>
                        <li class="">
                            <a href=""><i class="fas fa-angle-double-right"></i> Bản đồ</a>
                        </li>
                        <li class="">
                            <a href=""><i class="fas fa-angle-double-right"></i> Cách chọn size quần áo</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 widget-footer">
                    <h5>THƯ BÁO</h5>
                    <p>Đăng ký nhận email khuyến mãi</p>
                    <form action="">
                        <input type="text" placeholder="Email của bạn">
                        <button>ĐĂNG KÝ</button>
                    </form>
                </div>
                <div class="col-md-3 widget-footer">
                    <h5>FACEBOOK</h5>
                </div>
            </div>
        </div>
    </footer>
        
    <!-- end footer -->
    <script src="{{asset('/client/jquery.min.js')}}"></script>
    <script src="{{asset('/client/owl/dist/owl.carousel.min.js')}}"></script>
    @yield('script')
</body>
</html>