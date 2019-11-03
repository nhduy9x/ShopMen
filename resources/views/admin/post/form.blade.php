@extends('layouts.admin.main')
@php
	$title = $post->id == null ? "Thêm bài viết" : "Sửa bài viết";
@endphp
@section('title', $title)
@section('page',$title)
@section('content')
<form enctype="multipart/form-data" action="{{ route('save.post') }}" method="post">
		@csrf
		<div class="container-fluid">
    		<div class="row">                    
    			<div class="col-lg-12">
    				<div class="card">
    					<div class="card-body">
    						<h4 class="card-title">Add post</h4>
    						<div class="basic-form">

    							<div class="form-group row">
                                    
                                    <div class="col-sm-8" style="margin-left: 0px;">
                                        <input type="hidden" name="id" value="{{$post->id}}">
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Tiêu đề</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="title" type="text" value="{{$post->title}}">
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('title')}}</span>
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
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Tác giả</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" name="author" type="type" value="{{$post->author}}">
                                                
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('author')}}</span>
                                                @endif 
                                            </div>
                                           
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Danh mục</label>
                                            <div class="col-form">
                                                <select name="cate_post_id" class="form-control">
                                                    <option value="">--chon--</option>
                                                        @foreach ($cates as $item)

                                                            <option 
                                                                @if($item->id == $post->cate_post_id)
                                                                selected
                                                                @endif
                                                                value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                </select> 
                                            </div>
                                           
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div style="width: 100%;">
                                            <div class="col-form">
                                                <img id="asgnmnt_file_img" src="{{asset(isset($post->images)?$post->images:'img/default.jpg')}}" width="355px" height="205px" >
                                             </div>
                                        </div>
                                    </div>
    								
    							</div>

    							<div class="form-group row">
    								<label class="col-sm-2 col-form-label">Nôi dung</label>
    								<div class="col-sm-12">
    								
    								<textarea id="editor1" class="form-control" rows="15" cols="80" name="content">{!! $post->content !!}</textarea>
						              @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('content')}}</span>
                                       @endif
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



