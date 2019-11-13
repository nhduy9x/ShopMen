@extends('layouts.admin.main')    
@section('title','danh mục sản phẩm')
@section('page','danh mục sản phẩm')
@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="box">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Tạo danh mục</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">tên danh mục</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="danh mục">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>   
            
    </div>
  </div>
  <div class="col-lg-6">
    <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>name</th>
                  <th>parent_id</th>
                  
                  <th><a href="{{route('get.cate.product')}}">thêm danh mục</a></th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($cates as $cate)  
                <tr>
                  <td>{{$cate->id}}</td>
                  <td>{{$cate->name}}</td>
                  <td>{{isset($cate->parent->name)?$cate->parent->name:'null'}}</td>
                  <td><a href="{{route('up.cate.product',$cate->id)}}">sửa</a></td>
                </tr>
                @endforeach

                </tfoot>
              </table>
            </div>
            <div>{{$cates->links()}}</div>
            <!-- /.box-body -->
          </div>
  </div>
</div>
 
@endsection
@section('js')
<script>
                function confirmDel() {
                    return confirm("Bạn có chắc xóa không");
                }

            </script>
@endsection