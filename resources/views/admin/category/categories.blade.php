@extends('layouts.admin.main')

@section('content')
<table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Danh mục cha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="col">{{$category->id}}</th>
                    <th scope="col">{{$category->name}}</th>
                    @if(isset($category->parent_name))
                        <th scope="col">{{$category->parent_name}}</th>
                    @else
                        <th scope="col">Không</th>
                    @endif
                    <th scope="col">
                        <a href="{{route('up.cate.product',$category->id)}}" class="btn btn-primary" >Sửa</a>
                        <a href="{{route('delete.cate.product',$category->id)}}" onclick="return confirmDel()" class="btn btn-danger">Xóa</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>  
@endsection
@section('script')
        <script>
            function confirmDel() {
                return confirm("Bạn có chắc xóa không");
            }
        </script>
@endsection
