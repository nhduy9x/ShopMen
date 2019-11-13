@extends('layouts.home.main')    
@section('title','danh muc')
@section('content')    
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
    <!-- end breadcrumb -->

    <!-- summary-product -->
    <section id="summary-product">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="slide-top ">
                        @foreach($productProperties as $item)
                            <div class="product-img-item bg-light">
                                <img src="{{asset('/uploads/' .$item->img)}}" alt="">
                                
                            </div>
                        @endforeach
                        
                        <div class="owl-controls">
                            <i class="fa fa-chevron-left"></i>
                            <i class="fa fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="product-single-title">
                        {{$product->name}}
                    </h5>
                   
                    @foreach($productProperties as $item)
                        <p class="product-single-price">
                            <span class="span-underline">
                                Giá bán: 
                            </span>
                            <span class="span-price-red pricesubmit">
                                {{$item->price - $item->price*($item->sale_percent/100)}}
                            </span>
                            <span class="span-underline">
                                Giá gốc: 
                            </span>
                            <span class="span-price-red" >
                                <s>
                                    @if($item->sale_percent != 0)
                                    {{$item->price}}
                                    @endif
                                </s>
                            </span>
                        </p>
                    @endforeach

                    <p>
                        <span class="span-underline">
                            Màu sắc : 
                        </span>
                    </p>

                    <p class="product-single-color">
                        @for($i=0; $i<count($productProperties); $i++)
                            <button class="btn-color">{{$productProperties[$i]->color}}</button>
                            
                        @endfor    
                        
                    </p>

                    <p>
                        <span class="span-underline">
                            Size : 
                        </span>
                    </p>
                    @for($i=0; $i<count($productProperties); $i++)
                            <div class="size">
                                @for($j=0; $j<count($dataSizeQuan[$productProperties[$i]['color']]); $j++)
                                    <button class="btn-size">{{$dataSizeQuan[$productProperties[$i]['color']][$j]->size}}</button>
                                @endfor
                            </div>
                    @endfor
                    @for($i=0; $i<count($productProperties); $i++)
                        <div class="div-stock">
                        @for($j=0; $j<count($dataSizeQuan[$productProperties[$i]['color']]); $j++)
                                <p class="product-single-stock">
                                    <span class="span-underline">
                                        Tình trạng: 
                                    </span>
                                    @if($dataSizeQuan[$productProperties[$i]['color']][$j]->quantity > 0)
                                        <span >
                                            Còn hàng
                                        </span>
                                    @else
                                        <span>
                                            Hết hàng
                                        </span>
                                    @endif
                                </p>
                        @endfor
                        </div>
                    @endfor
                    
                    <p class="product-category">
                        <span class="span-underline">
                            Danh mục: 
                        </span>
                        <span class="span-category-red">
                            Áo Sơ Mi Nam
                        </span>
                    </p>
                    <p class="">
                        <span class="span-underline">
                            Mô tả ngắn 
                        </span>
                    </p>
                    <p class="product-short-description">
                        Áo Vest Cao Cấp Đen  thiết kế dạng vest cổ bẻ, tay dài, 1 nút gài, form áo ôm vừa tạo giúp tôn dáng quý ông. Áo màu đen mạnh mẽ, có một túi viền trắng trước ngực và 2 túi bên hông có nắp bẻ, tay áo được phối nút tạo cho chàng nét lịch thiệp, mạnh mẽ hơn trong mắt đồng nghiệp, đối tác.
                    </p>
                    <form action="">
                        <input type="hidden" id="fcolor">
                        <input type="hidden" id="fsize">
                        <input type="hidden" id="fprice">
                        <div class="row row-add-cart">
                            <div class="col-6 col-md-4">
                                <span>
                                    Số lượng *
                                </span>
                                <select name="" id="">
                                    <option value="">
                                        1
                                    </option>
                                    <option value="">
                                        2
                                    </option>
                                    <option value="">
                                        3
                                    </option>
                                    <option value="">
                                        4
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-submit">
                            <div class="col-12 border-ccc">
                                <hr>
                            </div>
                            <div class="col-12 col-md-3">
                                <button class="button-buy">
                                    <i class="fas fa-shopping-cart"></i>
                                    ĐĂNG KÝ MUA
                                </button>
                            </div>
                            <div class="col-12 col-md-9 position-relative">
                                <p class="position-absolute"> <a href="" id="addToCart">+ Thêm vào giỏ hàng </a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <!-- tabpanel -->
    <section id="product-tabpanel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <ul class="list-inline product-ul-tabpanel ">
                        <li class="list-inline-item product-li-tabpanel active">
                            <a href="javascript::void(0)">Mô tả sản phẩm</a>
                            
                        </li>
                        <li class="list-inline-item product-li-tabpanel">
                            <a href="javascript::void(0)">Đánh giá</a>
                            
                        </li>
                        <li class="list-inline-item product-li-tabpanel">
                            <a href="javascript::void(0)">Bình luận</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tabpanel-item active">
                            <span>Áo Vest Cao Cấp Đen AV1089</span>
                            <p>- Màu đen nam tính, kiểu áo một nút trẻ trung</p>
                            <p>- Kiểu áo vest nam mới nhất, thiết kế sang trọng, hiện đại</p>
                            <p>- Thiết kế theo form dáng Hàn Quốc ôm theo body cực đẹp, cổ áo ve nhỏ</p>
                            <p>- Áo có túi ngực viền trắng tạo điểm nhấn và hai túi nắp hai bên hông, tay áo phối hàng nút lịch lãm</p>
                            <p>- Chất liệu vải âu hai lớp cao cấp, bền đẹp, ít nhăn, dễ giặt ủi mà không sợ mất dáng</p>
                            <p>- Có đầy đủ các size cho bạn lựa chọn theo dáng người</p>
                        </div>
                        <div class="tabpanel-item text-center">
                            <form action="">
                                <p>Đánh giá của bạn</p>
                                <input type="radio" name="gender" value="male"> <i class="fas fa-star"></i><br>
                                <input type="radio" name="gender" value="female"> <i class="fas fa-star"></i><i class="fas fa-star"></i><br>
                                <input type="radio" name="gender" value="other"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><br>  
                                <input type="radio" name="gender" value="other"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><br>  
                                <input type="radio" name="gender" value="other"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><br>  
                                <button class="btn-danhgia">Gửi đánh giá</button>
                            </form>
                        </div>
                        <div class="tabpanel-item binhluan">

                        </div>
                    </div>
                    <p class="p-product-related">
                        <span>SẢN PHẨM CÙNG DANH MỤC</span>
                    </p>
                    <div id="carousel" class="owl-carousel">
                        <div class="item">
                            <div class="product-item text-center">
                                <div class="item-thumb">
                                    <img class=""  src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
                                    <a href="">
                                        <i class="fas fa-shopping-cart product-item-cart"></i>
                                    </a>
                                </div>
                                <h4 class="product-title">
                                    <a href="#" title="Áo Khoác Kaki Rêu AK260">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                </h4>
                                <span class="product-price"> 425.000 </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item text-center">
                                <div class="item-thumb">
                                    <img class=""  src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
                                    <a href="">
                                        <i class="fas fa-shopping-cart product-item-cart"></i>
                                    </a>
                                </div>
                                <h4 class="product-title">
                                    <a href="#" title="Áo Khoác Kaki Rêu AK260">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                </h4>
                                <span class="product-price"> 425.000 </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item text-center">
                                <div class="item-thumb">
                                    <img class=""  src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
                                    <a href="">
                                        <i class="fas fa-shopping-cart product-item-cart"></i>
                                    </a>
                                </div>
                                <h4 class="product-title">
                                    <a href="#" title="Áo Khoác Kaki Rêu AK260">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                </h4>
                                <span class="product-price"> 425.000 </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item text-center">
                                <div class="item-thumb">
                                    <img class=""  src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
                                    <a href="">
                                        <i class="fas fa-shopping-cart product-item-cart"></i>
                                    </a>
                                </div>
                                <h4 class="product-title">
                                    <a href="#" title="Áo Khoác Kaki Rêu AK260">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                </h4>
                                <span class="product-price"> 425.000 </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item text-center">
                                <div class="item-thumb">
                                    <img class=""  src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
                                    <a href="">
                                        <i class="fas fa-shopping-cart product-item-cart"></i>
                                    </a>
                                </div>
                                <h4 class="product-title">
                                    <a href="#" title="Áo Khoác Kaki Rêu AK260">
                                        Áo Khoác Kaki Rêu AK260
                                    </a>
                                </h4>
                                <span class="product-price"> 425.000 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <p class="p-dut">
                        <span>SẢN PHẨM HOT</span>
                    </p>
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-4 col-p-0">
                                <img class="img-fluid" src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
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
                                <img class="img-fluid" src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
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
                                <img class="img-fluid" src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
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
                                <img class="img-fluid" src="./img/ao-khoac-kaki-reu-ak260_2_small-10767-t.jpg" alt="">
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
    </section>  
@endsection