@extends('layout.client.layout')

@section('title', 'Home')

@section('slide')
<section id="slide">
        <div class="container-fluid">
            <div class="row row-relative">
                <img src="{{asset('./client/img/banner-top-trang-chu-1-slide-19.png')}}" alt="">
                <img src="{{asset('./client/img/banner-top-trang-chu-2-slide-20.png')}}" alt="">
                <img src="{{asset('./client/img/banner-top-trang-chu-3-slide-21.png')}}" alt="">
                <i class="fas fa-angle-left"></i>
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
    </section>
@endsection

@section('content')
<section class="product_hot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-1 p-md-5 text-center">
                    <h5 class="h5-bold">THỜI TRANG HÓT NHẤT</h5>
                    <span class="span-bookmark"><i class="far fa-bookmark"></i></span>
                    <p class="product-hot-sub">Sản phảm thời trang nam được quan tâm nhiều nhất, trong bộ sưu tập thời trang tại shop 4MEN</p>
                </div>
                @foreach($products as $product)
                    <div class="col-6 col-md-3 product-item text-center">
                        <div class="item-thumb">
                            <a href="product-detail/{{$product->id}}">
                                <img src="{{asset('uploads/' .$product->img)}}" alt="">
                            </a>    
                            <a href="product-detail/{{$product->id}}"><i class="fas fa-shopping-cart product-item-cart"></i></a>
                        </div>
                        
                        <h4 class="product-title"><a href="#" title="Áo Khoác Kaki Rêu AK260">{{$product->name}}</a></h4>
                        <span class="product-price"> {{$product->price}} </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
<script src="{{asset('/client/main.js')}}"></script>
@endsection