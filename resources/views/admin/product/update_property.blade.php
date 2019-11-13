@extends('layouts.admin.main')

@section('content')
    <form onsubmit="return validateForm()" action="/shop-men/admin/product/update-property/{{$property['id']}}" method="post" enctype= "multipart/form-data">
        @csrf
        <label for="">Màu</label>
        <input id="InColor" type="text" name="color" value ="{{$property['color']}}">
        <br>
        <label for="">Giá tiền</label>
        <input id="InPrice" type="number" name="price" value ="{{$property['price']}}">
        <br>
        <label for="">Phần trăm sale</label>
        <input id="InSale" type="number" name="sale_percent" value ="{{$property['sale_percent']}}">
        <br>
        @foreach ($sizequan as $item)
            <div class ="size-quan">
                <label for="">Size</label>
                <input class="Insize" type="text" name="size[]" value="{{$item['size']}}" >
                <label for="">Số lượng</label>
                <input class="InQuan" type="number" name="quantity[]" value="{{$item['quantity']}}">
                <a  href="javascript:void(0)" onclick="xoa(event)">Xóa</a>
            </div>
        @endforeach
        <p><a id="thea" href="javascript:void(0)">Thêm sizequan</a></p>
        <input type="file" id="fileInput" name="uploadImg" >
        <input type="hidden" value="{{$property->img}}" name="img" id="fileUpload" >
        <img id="blah" style="width:100px;height:100px" src="{{asset('/uploads/' .$property->img) }}">
        <br>
        <br>
        <button>Update</button>
    </form>
@endsection('content')  

@section('script')
    <script>
        window.addEventListener('DOMContentLoaded',function () {
            const f= document.querySelector('form');
            f.addEventListener('submit',function (evt) {
                const color = document.getElementById('InColor');
                const price = document.getElementById('InPrice');
                const sale = document.getElementById('InSale');
                const file = document.getElementById('fileUpload');
                const size = document.querySelectorAll('.InSize');
                const quan = document.querySelectorAll('.InQuan');
                let error =0;
                if(color.value == ''){
                    color.style.border ="1px solid red";
                    error += 1;
                }else{
                    color.removeAttribute("style");
                }

                if(price.value == ''){
                    price.style.border ="1px solid red";
                    error += 1;
                }else if(Number(price.value) < 0){
                    price.style.border ="1px solid red";
                    error += 1;
                }else{
                    price.removeAttribute("style");
                }
                
                if(Number(sale.value) <0 ){
                    sale.style.border ="1px solid red";
                    error += 1;
                }else{
                    sale.removeAttribute("style");
                }
                
                for(let i=0; i<size.length; i++){
                    if(size[i].value ==''){
                        size[i].style.border ="1px solid red";
                        error += 1;
                    }else{
                        size[i].removeAttribute("style");
                    }
                }

                for(let i=0; i<quan.length; i++){
                    if(quan[i].value ==''){
                        quan[i].style.border ="1px solid red";
                        error += 1;
                    }else if(Number(quan[i].value) <0){
                        quan[i].style.border ="1px solid red";
                        error += 1;
                    }
                    else{
                        quan[i].removeAttribute("style");
                    }
                }
                if(error != 0){
                    evt.preventDefault();
                }
            })
            
            let sizequan = document.querySelector('.size-quan');
            let thea =document.getElementById('thea');
            
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
                    <input type="number" class="InQuan" name="quantity[]"  placeholder="quantity">
                    <a onclick="xoa(event)" href="javascript:void(0)">Xóa</a>
                </div>` ; 
                sizequan.append(div);
            })
        });
        function xoa(event){
                event.target.parentElement.remove();
            }
    </script>
@endsection