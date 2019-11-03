@extends('layouts.admin.main')
@php
    $title = $cate->id == null ? "Thêm cate" : "Sửa cate";
@endphp
@section('title', $title)
@section('page',$title)
@section('content')
    <form enctype="multipart/form-data"
            action="{{ route('save.cate') }}"
            method="post">
        @csrf
        <div class="container-fluid">
            <div class="row">                    
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add cate</h4>
                            <div class="basic-form">

                                <div class="form-group row">
                                    
                                    <div class="col-sm-6" style="margin-left: 0px;">
                                        <input type="hidden" name="id" value="{{$cate->id}}">
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Name</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="name" type="text" value="{{$cate->name}}">
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                     </div>                                     
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div style="width: 100%;">
                                        <label class="col-sm-2 col-form-label">Danh mục</label>
                                        
                                            
                                            <select name="parent_id" class="form-control">
                                                <option value="">--chon--</option>
                                    
                                                    @foreach ($cates as $item)
                                                        <option @if($item->id==$cate->parent_id)
                                                            selected 
                                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                            </select>
                                       </div>
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn mb-1 btn-success" name="submit">Save<span class="btn-icon-right">
                                            
                                        </span>
                                    </button><br><br>
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
    document.getElementById('asgnmnt_file_img').src = window.URL.createObjectURL(inputData.files[0])
    }
    </script>
@endsection



