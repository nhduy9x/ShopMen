@extends('layouts.admin.main')


@section('content')

<form id="f" action="{{route(isset($product) ? 'update.product' : 'post_product')}}" method="post" enctype= "multipart/form-data">
        @csrf
        @if(isset($product))
            <input type="hidden" name="id" value="{{$product->id}}">
            <h3>Sửa danh  sản phẩm</h3>
        @else
            <h3>Thêm  sản phẩm</h3>
        @endif
        <label for="">Tên sản phẩm</label>
        <input id="InName" value="{{isset($product) ? $product->name : ''}}" type="text" name="name" placeholder="Mời nhập tên sản phẩm">
        <br>
        <label for="">Gía sản phẩm</label>
        <input id="InPrice" value="{{isset($product) ? $product->price : ''}}" type="number" name="price" placeholder="Mời tiền">
        <br>
        <label for="">Nơi sản xuất</label>
        <input id="InMade" value="{{isset($product) ? $product->source : ''}}" type="text" name="source" placeholder="Mời nhập nơi sản xuất">
        <br>
        <label for="">Chọn danh mục</label>
        <br>
        <label for="">Danh mục cha</label>
        @if(isset($product))
            <select name="category_parent" id="category_parent">
                <option value="">Chọn</option>
                @foreach($categoriesParents as $categoriesParent)
                    @if($category->parent_id == $categoriesParent->id)
                        <option selected value="{{$categoriesParent->id}}">{{$categoriesParent->name}}</option>
                    @else
                        <option  value="{{$categoriesParent->id}}">{{$categoriesParent->name}}</option>
                    @endif
                @endforeach
            </select>
            <label for="">Danh mục con</label>
            <select  name="category_child" id="category_child" style="">
                <option value="">Chọn</option>
                @foreach($categoriesChilds as $categoriesChild)
                    @if($category->id == $categoriesChild->id )
                        <option selected data-parent ="{{$categoriesChild->parent_id}}" value="{{$categoriesChild->id}}">{{$categoriesChild->name}}</option>
                    @else
                        <option data-parent ="{{$categoriesChild->parent_id}}" value="{{$categoriesChild->id}}">{{$categoriesChild->name}}</option>
                    @endif
                @endforeach
            </select>
        @else
            <select name="category_parent" id="category_parent">
                <option value="">Chọn</option>
                @foreach($categoriesParents as $categoriesParent)
                    <option  value="{{$categoriesParent->id}}">{{$categoriesParent->name}}</option>
                @endforeach
            </select>
            <label for="">Danh mục con</label>
            <select disabled name="category_child" id="category_child" style="cursor:no-drop;color:#c3c3c3;border-color:#c3c3c3">
                <option value="">Chọn</option>
                @foreach($categoriesChilds as $categoriesChild)
                    <option data-parent ="{{$categoriesChild->parent_id}}" value="{{$categoriesChild->id}}">{{$categoriesChild->name}}</option>
                @endforeach
            </select>
        @endif
        <p id="alert-cateParent" class="text-danger" style="display:none">Danh mục cha không được để trống</p>
        <br>
        <label for="">Mô tả ngắn</label>
        <input id="" type="text" value="{{isset($product) ? $product->short_desc : ''}}" name="short_desc" placeholder="Mời nhập mô tả ngắn">
        <br>
        <label for="">Mô tả chi tiết</label>
        <input id="" value="{{isset($product) ? $product->description : ''}}"  type="text" name="description" placeholder="Mời nhập mô tả chi tiết">
        <br>
        <label for="">Ảnh đại diện sản phẩm</label>
        <input type="file" id="fileInput" name="uploadImg" >
        <input type="hidden" value="{{isset($product) ? $product->img : ''}}" name="img" id="fileUpload" >
        @if(isset($product))
            <img id="blah" src="{{asset('/uploads/' .$product->img)}}" style="width:100px;height:100px;display:block" >
        @else
            <img id="blah" style="width:100px;height:100px;display:none" >
        @endif
        <p id="alet-tb" class="text-danger " style="display:none">Bạn chưa chọn ảnh</p>
        <br>
        <button>GỬI</button>
    </form>

@endsection


@section('script')
    <script>
    window.addEventListener('DOMContentLoaded',function () {
            const f= document.querySelector('form');
            const categoriesParent = document.getElementById('category_parent');
            
            const categoriesChild = document.getElementById('category_child');
            const optionCategoriesChild = document.querySelectorAll('#category_child option');
            const alertCateParent = document.getElementById('alert-cateParent');
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

                if(categoriesParent.value == ''){
                    alertCateParent.style.display ='block';
                    error += 1;
                }else{
                    alertCateParent.style.display ='none';
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

            if(categoriesParent.value != ''){
                categoriesChild.disabled = false;
                categoriesChild.removeAttribute('style');
                let optionHTML = ``;
                for(let i=0; i<optionCategoriesChild.length; i++){
                    if(optionCategoriesChild[i].dataset.parent == categoriesParent.value){
                        let value = optionCategoriesChild[i].getAttribute('value');
                        let name = optionCategoriesChild[i].innerText;
                        optionHTML += `<option value="${value}" >  ${name}  </option>` ;
                    }
                }
                categoriesChild.innerHTML = optionHTML;
            }

            categoriesParent.addEventListener('change',function(){
                const id = this.value;
                if(id == ''){
                    categoriesChild.disabled = true;
                    categoriesChild.innerHTML = `<option value=''>Chọn</option>`;
                    categoriesChild.style.cursor = 'no-drop';
                    categoriesChild.style.color = '#c3c3c3';
                    categoriesChild.style.borderColor = '#c3c3c3';
                }else{
                    categoriesChild.disabled = false;
                    categoriesChild.removeAttribute('style');
                    let optionHTML = ``;
                    for(let i=0; i<optionCategoriesChild.length; i++){
                        if(optionCategoriesChild[i].dataset.parent == id){
                            let value = optionCategoriesChild[i].getAttribute('value');
                            let name = optionCategoriesChild[i].innerText;
                            optionHTML += `<option value="${value}" >  ${name}  </option>` ;
                        }
                    }
                    categoriesChild.innerHTML = optionHTML;
                }
            })


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
