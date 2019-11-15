@extends('layouts.home.main') 
@php
    $title = $page->title ;
@endphp   
@section('title',$title)
@section('content')
    <!-- end header -->

     <!--  breadcrum -->
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
                            <a href="">page</a>
                            <span class="span-brc">>></span>
                        </li>
                        <li class="list-inline-item">
                            <a href="">{{$page->title}}</a>
                        </li>
                    </ul>                    
                </div>
            </div>
        </div>
    </section>
    <section id="products-shop">
        <div class="container-fluid">
            <p>{!!$page->content!!}</p>
        </div>
    </section>
    <!-- end breadcrum -->

    <!-- products shop -->
    
    <!-- end products shop -->
@endsection
   