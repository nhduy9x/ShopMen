@extends('layouts.admin.main')    
@section('title','page')
@section('page','page')
@section('content')
<div class="row">
  

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
                    <th>Title</th>
                    <th>Nội dung</th>
                    <th>image</th>
                    <th>
                     <a href="{{route('add.page')}}" class="btn btn-app">
                      <i class="fa fa-plus-square"></i> Them moi danh muc</a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($pages as $all)
                  	
  		                <tr>
  		                  <td>{{$all->id}}</td>
  		                  <td>{{$all->title}}</td>
  		                  <td>{!!Str::limit($all->content,50,'...')!!}</td>
  		                  <td><img src="{{asset(isset($all->image)?$all->image:'img/default.jpg')}}" width="50px"></td>
  		                  <td>
                          <a href="{{route('up.page',$all->id)}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                          <a href="{{route('delete.page',$all->id)}}" class="btn btn-app" class="btn btn-success" onclick="return confirmDel()"><i class="fa fa-trash-o"></i>Xoa</a> 
                          </td>
  		                </tr>
  		            
                  	@endforeach

                  </tbody>
                 
                </table>
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