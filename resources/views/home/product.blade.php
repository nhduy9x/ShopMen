@extends('layouts.home.main')    
@section('title','danh muc')
@section('content')
    <!-- end header -->

     <!--  breadcrum -->
    <section id="breadcrumb">
        <div class="container-fluid bg-light">
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline list-breadcrumb">
                        <li class="list-inline-item">
                            <a href="">Trang chủ</a>
                            <span class="span-brc">>></span>
                        </li>
                        <li class="list-inline-item">
                            <a href="">Category</a>
                            <span class="span-brc">>></span>
                        </li>
                        <li class="list-inline-item">
                            <a href="">Title product</a>
                        </li>
                    </ul>                    
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrum -->

    <!-- products shop -->
    <section id="products-shop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="category-title">
                                Áo nam
                            </h5>
                        </div>
                        <div class="col-4 p-rl">
                            <div class="float-right iac">
                                <i class="fa fa-th-large iactive"></i>
                                <i class="fa fa-th-list"></i>
                            </div>
                        </div>
                    </div>
                    <p class="filter">
                        Lọc sản phẩm :
                    </p>
                    <ul class="ul-filter list-inline">
                        <li class="list-inline-item">
                            <i class="far fa-dot-circle"></i>
                            <a href="">Áo sơ mi nam</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="far fa-dot-circle"></i>
                            <a href="">Áo thun nam</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="far fa-dot-circle"></i>
                            <a href="">Áo khoác nam</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="far fa-dot-circle"></i>
                            <a href="">Áo vest nam</a>
                        </li>
                        <li class="list-inline-item">
                            <i class="far fa-dot-circle"></i>
                            <a href="">Áo len nam</a>
                        </li>
                    </ul>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-6 col-md-4 product-item text-center">
                            <div class="item-thumb">
                                <img src="{{asset(isset($product->img)?$product->img:'default.jpg')}}" alt="">
                                <a href=""><i class="fas fa-shopping-cart product-item-cart"></i></a>
                            </div>
                            <div class="change-list">
                                <h4 class="product-title"><a href="#" title="Áo Khoác Kaki Rêu AK260">{{$product->name}}</a></h4>
                                <span class="product-price"> 425.000 </span>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12">
                            <hr>
                            <ul class="pagination-product list-inline float-right">
                                <li class="list-inline-item active"><a class="page-link" href="#">1</a></li>
                                <li class="list-inline-item"><a class="page-link" href="#">2</a></li>
                                <li class="list-inline-item"><a class="page-link" href="#">3</a></li>
                                <li class="list-inline-item"><a class="page-link" href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <p class="p-dut">
                        <span>TÌM KIẾM</span>
                    </p>
                    <p>Sản phẩm tại ShopMen</p>
                    <form action="" class="form-serach-keyword">
                        <input type="text" placeholder="Từ khóa tìm kiếm">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                    <div id="scroll-fixed">
                        <p class="p-dut">
                            <span>SẢN PHẨM HOT</span>
                        </p>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-4 col-p-0">
                                    <img class="img-fluid" src="{{asset('home/img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg')}}" alt="">
                                </div>
                                <div class="col-8">
                                    <a href="#" class="span-product-title">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                    <a href="#"
                                    class="span-product-price">
                                        350.000
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-4 col-p-0">
                                    <img class="img-fluid" src="{{asset('home/img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg')}}" alt="">
                                </div>
                                <div class="col-8">
                                    <a href="#" class="span-product-title">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                    <a href="#"
                                    class="span-product-price">
                                        350.000
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-4 col-p-0">
                                    <img class="img-fluid" src="{{asset('home/img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg')}}" alt="">
                                </div>
                                <div class="col-8">
                                    <a href="#" class="span-product-title">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                    <a href="#"
                                    class="span-product-price">
                                        350.000
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-4 col-p-0">
                                    <img class="img-fluid" src="{{asset('home/img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg')}}" alt="">
                                </div>
                                <div class="col-8">
                                    <a href="#" class="span-product-title">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                    <a href="#"
                                    class="span-product-price">
                                        350.000
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </section>
    <!-- end products shop -->
@endsection
   