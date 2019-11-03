@extends('layouts.admin.main')    
@section('title','post')
@section('page','post')
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
                    <th>Author</th>
                    <th>image</th>
                    <th>
                     <a href="{{route('add.post')}}" class="btn btn-app">
                      <i class="fa fa-plus-square"></i> Them moi danh muc</a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($post as $all)
                  	
  		                <tr>
  		                  <td>{{$all->id}}</td>
  		                  <td>{{$all->title}}</td>
  		                  <td>{{$all->author}}</td>
  		                  <td><img src="{{asset($all->image)}}" width="50px"></td>
  		                  <td>
                          <a href="{{route('up.post',$all->id)}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                          <a href="{{route('delete.post',$all->id)}}" class="btn btn-app" class="btn btn-success" onclick="return confirmDel()"><i class="fa fa-trash-o"></i>Xoa</a> 
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