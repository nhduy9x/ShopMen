@extends ('layouts.admin.main')

@section('page','Tất cả sản phẩm')

@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Áp dụng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="col">{{$product->id}}</th>
                    <th scope="col">{{$product->name}}</th>
                    <th scope="col"><img style="width:100px;height:100px" src="{{asset('/uploads/' .$product->img)}}"></th>
                    <th scope="col">{{$product->price}}</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">
                        <a href="" class="btn btn-primary">Sửa</a>
                        <a href="" class="btn btn-danger">Xóa</a>
                        <a href="{{route('addcolor.product',$product->id)}}" class="btn btn-success">Thêm sửa xóa thuộc tính</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection