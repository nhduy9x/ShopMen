@extends('layouts.client.layout')    
@section('title','check - out')
@section('content')
    <section id="breadcrumb">
        <div class="container-fluid bg-light">
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline list-breadcrumb">
                        <li class="list-inline-item">
                            <a href="{{route('home')}}">Trang chủ</a>
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

    <!-- Thanh toan -->
    <section id="thanhtoan">
        <form action="{{route('pay')}}"  method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <p class="title-hr">
                            Thông tin liên hệ giao hàng
                        </p>
                        <div class="form-group row ">
                            <label for="" class="col-12 col-md-4">
                                Họ và tên *
                            </label>
                            <div class="col-12 col-md-8"> 
                                <input type="text" placeholder="" name="name" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-md-4">
                                Email
                            </label>
                            <div class="col-12 col-md-8"> 
                                <input type="text" placeholder="Không bắt buộc" disabled="" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-md-4">
                                Số điện thoại *
                            </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="phone">
                            </div>
                        </div>
                        <p class="title-hr">
                            Thông tin liên hệ giao hàng
                        </p>
                        <div class="form-group row">
                            <label for="" class="col-12 col-md-4">
                                Địa chỉ nhận hàng *
                            </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-12 col-md-4">
                                Ghi chú *
                            </label>
                            <div class="col-12 col-md-8 b-l">
                                <textarea name="" id="" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="title-hr">
                            Giỏ hàng của bạn
                        </p>
                        <table class="table table-checkout">
                            <thead>
                                <tr>
                                <th scope="col">Hình</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    <th scope="row"><img src="{{asset(isset($cart->attributes['image'])?'/uploads/'.$cart->attributes['image']:'img/default.jpg')}}"></th>
                                    <td>{{$cart->name}}</td>
                                    <td class="change-soluong">
                                        <i class="fas fa-minus"></i>
                                        <span class="soluong">{{$cart->quantity}}</span>
                                        <i class="fas fa-plus"></i>
                                    </td>
                                    <td class="giasp">{{$cart->price}}</td>
                                    <td class="tong-tien-1sp">{{$cart->price*$cart->quantity}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                       
                        <div class="row">
                            <div class="col-12">
                                
                                
                            SubTotal:{{$SubTotal}}
                                
                            </div>
                            <div class="col-12">
                                Total: {{$cartTotal}}
                            </div>
                            
                            
                        </div>
                         
                        <div class="row">
                            <span>
                                @if(session('error'))
                                {{session('error')}}
                                @endif
                            </span>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-md-8 b-l  mb-5">
                                <input type="submit" value="submit">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                       
    </section>
    <div class="row">
                            <form action="{{route('ckeck.out')}}" method="get">
                                
                            <div class="col-8">
                                <input type="text" name="code" placeholder="mã giảm giá">
                            </div>
                            <div class="col-4">
                                <input type="submit" value="kiểm tra">
                            </div>
                            </form>
                            
                        </div>

@endsection
   