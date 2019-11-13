<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/client/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <form onsubmit="return formValidation()" action="{{isset($category) ?'/shop-men/admin/category/update'  : '/shop-men/admin/category/add'}}" method="post" enctype= "multipart/form-data">
        @csrf
        @if(isset($category))
            <input type="hidden" name="id" value="{{$category->id}}">
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
</body>
</html>