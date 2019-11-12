@extends('layouts.admin.main')
@php
	$title  = "Thêm Sản color mới" ;
@endphp
@section('title', $title)
@section('page',$title)

@section('content')
<link rel="stylesheet" href="{{asset('home/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css.css')}}">
<form onsubmit="return validateForm()" action="{{route('color')}}" method="post" enctype= "multipart/form-data" >
        @csrf
        <input type="hidden"  value ="{{$id}}" name="product_id">
        <label for="">Màu</label>
        <input id="InColor" type="text"  name="color" placeholder="Màu">
        <br>
        <label for="">Tiền</label>
        <input id="InPrice" type="number" name="price" placeholder="Tiền">
        <br>
        <label for="">Gỉam giá</label>
        <input id="InSale" type="number" name="sale_percent"  placeholder="Phần trăm giảm giá">
        <br>
        <label for="">Size và số lượng</label>
        <div class ="size-quan">
            <input class="InSize" type="text" name="size[]" placeholder="size">
            <input class="InQuan" type="number" name="qty[]"  placeholder="Số lượng">
        </div>
        <p><a id="thea" href="javascript:void(0)">Thêm size và số lượng</a></p>
        <label for="">Chọn ảnh</label>
        <input type="file" id="fileInput" name="uploadImg" >
        <input type="hidden"  name="img" id="fileUpload" >
        <img id="blah" style="width:100px;height:100px;display:none" >
        <p id="alet-tb" class="text-danger">Bạn chưa chọn ảnh</p>
        <br>
        <button>Thêm</button>
    </form>
    <table>
        <thead>
            <th>Color</th>
            <th>Price</th>
            <th>Sale</th>
            <th>size</th>
            <th>quantity</th>
            <th>img</th>
            <th>Action</th>
        </thead>
        <tbody>
           @foreach($data as $color)
                <tr>
                    <th>{{$color->color}}</th>
                    <th>{{$color->price}}ấ</th>
                    <th>{{$color->sale_percent}}</th>
                    <th>
                       @foreach($color->attributesizes as $size)
                        {{$size->size}}
                           
                        {{$size->qty}}
                         
                        {{$size->sale_percent}}

                        <br>
                       @endforeach 
                    </th>
                    
                    <th><img style="width:100px;height:100px" src="{{asset($color->img) }}" alt=""></th>
                    <th>
                        <a href="">Update</a>
                        <a href="">Delete</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
{{-- <form enctype="multipart/form-data" action="{{ route('save.product') }}" method="post">
		@csrf
		<div class="container-fluid">
    		<div class="row">                    
    			<div class="col-lg-12">
    				<div class="card">
    					<div class="card-body">
    						<h4 class="card-title">Add color</h4>
    						<div class="basic-form">

    							<div class="form-group row">
                                    
                                    <div class="col-sm-6" style="margin-left: 0px;">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <div style="width: 100%;">
                                            <label class="col-form-label">Color</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="color" type="text" value="{{$product->name}}">
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('color')}}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">image</label>
                                            <input type="hidden" name="anh" >
                                            <div class="col-form">
                                                
                                                <input type="file" name="image" id="asgnmnt_file" class="form-control" onchange="fileSelected(this)" >
                                                @if(session('image'))
                                                    <span class="text-danger">{{session('image')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">price</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid"  id="stocks" name="price" type="type" >
                                                @if(count($errors)>0)
                                                            <span class="text-danger">{{$errors->first('price')}}</span>
                                                        @endif
                                            </div>
                                        </div>
                                        <div style="width: 100%;">
                                            <label class="col-form-label">stocks</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="stocks " type="text" >
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('stocks')}}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div style="width: 100%;">
                                            <input type="hidden" name="$product->id">
                                            <label class="col-form-label">sale_percent</label>
                                            <div class="col-form">
                                                <input class="form-control is-valid" id="name" name="sale_percent " type="text" >
                                                @if(count($errors)>0)
                                                    <span class="text-danger">{{$errors->first('sale_percent')}}</span>
                                                @endif
                                            </div>
                                             
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <div style="width: 100%;">
                                            
                                            <div class="col-form">
                                                <img id="asgnmnt_file_img" src="
                                                        {{asset('img/default.jpg')}}" width="355px" height="235px"  
                                            >
                                                
                                            </div>
                                        </div>
                                      
                                        
                                    </div>

    								
    							</div>
    							<div class="form-group row">
    								<label class="col-sm-2 col-form-label"></label>
    								<div class="col-sm-12">
    									<button type="submit" class="btn mb-1 btn-success" name="submit">Save<span class="btn-icon-right">
    										
    									</span>
    								</button><a href="" class="btn btn-danger">Cancel</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>                
    	</div>
    </div>
</form> --}}
@endsection

@section('js')
    <script type="text/javascript">
    
        document.getElementById('alet-tb').style.display='none';
        function validateForm() {
            const color = document.getElementById('InColor');
            const price = document.getElementById('InPrice');
            const sale = document.getElementById('InSale');
            const file = document.getElementById('fileUpload');
            const size = document.querySelectorAll('.InSize');
            const quan = document.querySelectorAll('.InQuan');
            let error =0;
            if(color.value == ''){
                color.classList.add('boreder-red');
                error += 1;
            }else{
                color.classList.remove('boreder-red');
            }

            if(price.value == ''){
                price.classList.add('boreder-red');
                error += 1;
            }else if(Number(price.value) < 0){
                price.classList.add('boreder-red');
                error += 1;
            }else{
                price.classList.remove('boreder-red');
            }
            
            if(Number(sale.value) <0 ){
                sale.classList.add('boreder-red');
                error += 1;
            }else{
                sale.classList.remove('boreder-red');
            }

            if(file.value  == ''){
                document.getElementById('alet-tb').style.display='block';
                error += 1;
            }else{
                document.getElementById('alet-tb').style.display='none';
            }

            for(let i=0; i<size.length; i++){
                if(size[i].value ==''){
                    size[i].classList.add('boreder-red');
                    error += 1;
                }else{
                    size[i].classList.remove('boreder-red');
                }
            }

            for(let i=0; i<quan.length; i++){
                if(quan[i].value ==''){
                    quan[i].classList.add('boreder-red');
                    error += 1;
                }else if(Number(quan[i].value) <0){
                    quan[i].classList.add('boreder-red');
                    error += 1;
                }
                else{
                    quan[i].classList.remove('boreder-red');
                }
            }
            if(error == 0){
                return true;
            }else{
                return false;
            }
            
        }
        let sizequan = document.querySelector('.size-quan');
        let thea =document.getElementById('thea');
        function xoa(event){
            event.target.parentElement.remove();
        }
        document.getElementById('fileInput').onchange = function () {
            document.getElementById('fileUpload').value= this.value.slice(12);
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('blah').style.display = 'inline-block';
                    document.getElementById('blah').src = e.target.result;
                };

                reader.readAsDataURL(this.files[0]);
            }

        };
        thea.addEventListener('click',function(){
            let div = document.createElement("div");
            div.innerHTML =`<div class ="size-quan">
                <input type="text" class="InSize" name="size[]" placeholder="size">
                <input type="number" class="InQuan" name="qty[]"  placeholder="quantity">
                <a onclick="xoa(event)" href="javascript:void(0)">Xóa</a>
            </div>` ; 
            sizequan.append(div);
        })
    </script>

   
@endsection



