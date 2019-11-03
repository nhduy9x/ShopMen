@extends('layouts.admin.main')    
@section('title','product')
@section('page','product')
@section('content')
<div class="box">
            {{-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> --}}
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="30px">STT</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>image</th>
                  <th>Category</th>
                  <th><a href="{{route('add.product')}}" class="btn btn-app"><i class="fa fa-plus-square"></i>Add New</a></th>
                </tr>
                </thead>
                <tbody>
                	@foreach($products as $all)
                	
		                <tr>
		                  <td>{{$all->id}}</td>
		                  <td>{{$all->name}}</td>
		                  <td>{{$all->price}}</td>
		                  <td><img src="{{asset($all->images)}}" width="50px"></td>
		                  <td>{{isset($all->cate->name)?$all->cate->name:'null'}}</td> 
		                  <td><a href="{{route('up.product',$all->id)}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> <a onclick="return confirmDel()" href="{{route('delete.product',$all->id)}}" class="btn btn-app"><i class="fa fa-trash-o" ></i>Delete</a></td>
		                </tr>
		            
                	@endforeach

                </tbody>
               
              </table>
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