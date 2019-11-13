@extends('layouts.admin.main')


@section('content')

<form id="f" action="/shop-men/admin/product/add" method="post" enctype= "multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
        @endif
        <label for="">Tên sản phẩm</label>
        <input id="InName" type="text" name="name" placeholder="Mời nhập tên sản phẩm">
        <br>
        <label for="">Gía sản phẩm</label>
        <input id="InPrice" type="number" name="price" placeholder="Mời tiền">
        <br>
        <label for="">Nơi sản xuất</label>
        <input id="InMade" type="text" name="source" placeholder="Mời nhập nơi sản xuất">
        <br>
        <label for="">Ảnh đại diện sản phẩm</label>
        <input type="file" id="fileInput" name="uploadImg" >
        <input type="hidden"  name="img" id="fileUpload" >
        <img id="blah" style="width:100px;height:100px;display:none" >
        <p id="alet-tb" class="text-danger " style="display:none">Bạn chưa chọn ảnh</p>
        <br>
        <button>GỬI</button>
    </form>

@endsection


@section('script')
    <script>
    window.addEventListener('DOMContentLoaded',function () {
            const f= document.querySelector('form');
            f.addEventListener('submit',function (evt) {
                const name = document.getElementById('InName');
                const price = document.getElementById('InPrice');
                const file = document.getElementById('fileUpload');
                const made = document.getElementById('InMade');
                let error =0;
                if(name.value == ''){
                    name.style.border ="1px solid red";
                    error += 1;
                }else{
                    name.removeAttribute("style");
                }
                if(made.value == ''){
                    made.style.border ="1px solid red";
                    error += 1;
                }else{
                    made.removeAttribute("style");
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

                if(file.value  == ''){
                    document.getElementById('alet-tb').style.display='block';
                    error += 1;
                }else{
                    document.getElementById('alet-tb').style.display='none';
                }
                if(error != 0){
                    evt.preventDefault();
                }
            });

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
        });
    </script>
@endsection
