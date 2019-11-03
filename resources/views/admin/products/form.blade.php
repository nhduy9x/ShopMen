@extends('layouts.admin.main')
@php
	$title = $product->id == null ? "Thêm Sản phẩm mới" : "Sửa sản phẩm";
@endphp
@section('title', $title)
@section('page',$title)

@section('content')
<form enctype="multipart/form-data" action="{{ route('save.product') }}" method="post">
		@csrf
		<div class="container-fluid">
    		<div class="row">                    
    			<div class="col-lg-12">
    				<div class="card">
    					<div class="card-body">
    						<h4 class="card-title">Add Product</h4>
    						<div class="basic-form">

    							<div class="form-group row">
                                    
                                    <div class="col-sm-6" style="margin-left: 0px;">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Name</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="name" type="text" value="{{$product->name}}">
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">image</label>
                                            <input type="hidden" name="anh" value="{{$product->images}}">
                                            <div class="col-form">
                                                
                                                <input type="file" name="image[]" id="asgnmnt_file" class="form-control" onchange="fileSelected(this)" multiple/>

                                            

                                            
                                                @if($errors->any())
                                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Price</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="price" name="price" type="number" value="{{$product->price}}">
                                                
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('price')}}</span>
                                                @endif 
                                            </div>
                                           
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">sale_percent</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="sale_percent" name="sale_percent" type="number" value="{{$product->sale_percent}}">
                                                
                                                    
                                            </div>
                                            
                                        </div>
                                       
                                        
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <div style="width: 100%;">
                                            
                                            <div class="col-form">
                                                <img id="asgnmnt_file_img" src="@if($product->images == "") 
                                                        {{asset('img/default.jpg')}} 
                                                    @else 
                                                        {{asset($product->images)}} 
                                                    @endif" width="355px" height="235px"  
                                            >
                                                
                                            </div>
                                        </div>
                                      
                                        
                                    </div>
    								
    							</div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Danh mục</label>
                                    <div class="col-sm-12">
                                        <select name="category_id" class="form-control">
                                            <option value="">--chon--</option>
                                                @foreach ($cates as $item)

                                                    <option 
                                                        @if($item->id == $product->category_id)
                                                        selected
                                                        @endif
                                                        value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                        </select>
                                        @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('category_id')}}</span>
                                                @endif
                                    </div>
                                    
                                </div>
    							
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">số lượng</label>
                                    <div class="col-sm-12">
                                        <input class="form-control is-valid"  id="stocks" name="stocks" type="number" value="{{$product->stocks}}">
                                        @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('stocks')}}</span>
                                                @endif
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nguồn hàng</label>
                                    <div class="col-sm-12">
                                        <input class="form-control is-valid"  id="stocks" name="source" type="type" value="{{$product->source}}">
                                        @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('source')}}</span>
                                                @endif
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-2 col-form-label">Mô Tả ngắn</label>
                                  <div class="col-sm-12">
                                  <textarea class="form-control" rows="3" name="short_desc">{!! $product->short_desc !!}</textarea>
                                  </div>
                                </div>
    							<div class="form-group row">
    								<label class="col-sm-2 col-form-label">Nội dung</label>
    								<div class="col-sm-12">
    								
    								<textarea id="editor1" class="form-control" rows="10" cols="80" name="description">{!! $product->description !!}</textarea>
						              @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('description')}}</span>
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



