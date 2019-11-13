@extends('layouts.admin.main')

@section('content')
    <form action="/shop-men/admin/product/add-property" method="post" enctype= "multipart/form-data" >
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
            <input class="InQuan" type="number" name="quantity[]"  placeholder="Số lượng">
        </div>
        <p><a id="thea" href="javascript:void(0)">Thêm size và số lượng</a></p>
        <label for="">Chọn ảnh</label>
        <input type="file" id="fileInput" name="uploadImg" >
        <input type="hidden"  name="img" id="fileUpload" >
        <img id="blah" style="width:100px;height:100px;display:none" >
        <p id="alet-tb" class="text-danger" style="display:none">Bạn chưa chọn ảnh</p>
        <br>
        <button>Thêm</button>
    </form>
    <table class="table table-dark">
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
            @for($i =0; $i<count($data);$i++ )
                <tr>
                    <th>{{$data[$i]['color']}}</th>
                    <th>{{$data[$i]['price']}}</th>
                    <th>{{$data[$i]['sale_percent']}}</th>
                    <th>
                        @for($j=0; $j<count($sizequan[$data[$i]['color']]); $j++)
                        {{$sizequan[$data[$i]['color']][$j]->size}}
                        <br>
                        @endfor
                    </th>
                    <th>
                        @for($j=0; $j<count($sizequan[$data[$i]['color']]); $j++)
                        {{$sizequan[$data[$i]['color']][$j]->quantity}}
                        <br>
                        @endfor
                    </th>
                    <th><img style="width:100px;height:100px" src="{{asset('/uploads/' .$data[$i]->img) }}" alt=""></th>
                    <th>
                        <a href="/shop-men/admin/product/update-property/{{$data[$i]['id']}}">Edit</a>
                        <a href="/shop-men/admin/product/delete-property/{{$data[$i]['id']}}">Delete</a>
                    </th>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection
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

                if(file.value  == ''){
                    document.getElementById('alet-tb').style.display='block';
                    error += 1;
                }else{
                    document.getElementById('alet-tb').style.display='none';
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
