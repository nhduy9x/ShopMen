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
                        @foreach($pages as $page)
                            <li class="list-inline-item">
                            <a href="{{route('page',$page->slug)}}">{{$page->title}}</a>
                            </li>
                        @endforeach
                       
                        <li class="list-inline-item ">
                            <a href="#">Giới thiệu</a>
                        </li>
                        @if(!empty(Auth::user()))
                        <li class="list-inline-item ">
                            <a href="{{route('logout')}}">{{Auth::user()->name}}</a>
                        </li>
                        @else
                            <a href="{{route('login')}}">Login</a>
                        @endif
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
                                <a href="{{route('product')}}">ÁO NAM</a>
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
                                <a href="{{route('product')}}">QUẦN NAM</a>
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
                                <a href="{{route('product')}}">GIẦY DÉP</a>
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
                                <a href="{{route('product')}}">PHỤ KIỆN</a>
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
                                <a href="{{route('product')}}">KHUYẾN MẠI</a>
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
                        @if(!empty(Auth::user()))
                        <a href="{{route('ckeck.out')}}"><i class="fas fa-shopping-cart">({{count($carts)}})</i></a>
                        @else
                        <a href="{{route('ckeck.out')}}"><i class="fas fa-shopping-cart">(0)</i></a>
                        @endif
                        
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