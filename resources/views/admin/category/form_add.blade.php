@extends('layouts.admin.main')

@section('content')
    <form onsubmit="return formValidation()" action="{{isset($category) ?'/shop-men/admin/category/update'  : '/shop-men/admin/category/add'}}" method="post" enctype= "multipart/form-data">
        @csrf
        @if(isset($category))
            <input type="hidden" name="id" value="{{$category->id}}">
            <h3>Sửa danh mục sản phẩm</h3>
        @else
            <h3>Thêm danh mục sản phẩm</h3>
        @endif
        <label for="">Tên danh mục</label>
        <input class="name_category" type="text" name="name" placeholder="Mời nhập tên " value="{{isset($category) ? $category->name : '' }}">
        <br>
        <label for="">Danh mục cha</label>
        <select name="parent_id" id=""> 
            <option value=''>
                Chọn
            </option>
            @foreach($categoriesParent as $categoryParent)
                @if(isset($category) && $category->parent_id == $categoryParent->id)
                    <option selected  value="{{$categoryParent->id}}">
                        {{$categoryParent->name}}
                    </option>
                @else
                    <option  value="{{$categoryParent->id}}">
                        {{$categoryParent->name}}
                    </option>  
                @endif
                
            @endforeach
        </select>
        <br>
        <button>GỬI</button>
    </form>
@endsection

@section('script')

<script>
        const nameCategory = document.querySelector('.name_category');
        function formValidation(){
            if(nameCategory.value == ''){
                nameCategory.style.border = '1px solid red';
                return false;
            }
            return true;
        }
    </script>

@endsection
