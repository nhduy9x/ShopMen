@extends('layouts.admin.main')
@php
    $title = $page->id == null ? "Thêm slide show" : "Sửa slide show";
@endphp
@section('title', $title)
@section('page',$title)
@section('content')
<form enctype="multipart/form-data" action="{{ route('save.slide') }}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">                    
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add page</h4>
                            <div class="basic-form">

                                <div class="form-group row">
                                    
                                    <div class="col-sm-12" style="margin-left: 0px;">
                                        <input type="hidden" name="id" value="{{$page->id}}">
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Tiêu đề</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="title" type="text" value="{{$page->title}}">
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">url</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="url" name="url" type="text" value="{{$page->url}}">
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('url')}}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">image</label>
                                            <input type="hidden" name="anh" value="">
                                            <div class="col-form">
                                                
                                                <input type="file" name="images" id="asgnmnt_file" class="form-control" onchange="fileSelected(this)" >
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('images')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        

                                    </div>
                                  
                                    
                                </div>
                                <div class="form-group rows">
                                    <div class="col-sm-12">
                                        <div class="col-form" id="img" >
                                                <img id="asgnmnt_file_img" src="{{asset(isset($page->image)?$page->image:'img/default.jpg')}}" width="100%" >
                                             </div>

                                    </div>
                                    
                                </div>
                              
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn mb-1 btn-success" name="submit">Save<span class="btn-icon-right">
                                            
                                        </span>

                                    </button> <a href="" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</form>
@endsection

@section('js')
    <script type="text/javascript">
    function passFileUrl(){
    document.getElementById('asgnmnt_file').click();
    }

    function fileSelected(inputData){
    document.getElementById("img").style.display = "block";
    document.getElementById('asgnmnt_file_img').src = window.URL.createObjectURL(inputData.files[0])
    }
    </script>
@endsection



