@extends('layouts.admin.main')    
@section('title','Category')
@section('page','List Category')
@section('content')
<div class="row">
  <div class="box">

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="30px">STT</th>
                  <th>Name</th>
                  <th>Parent</th>
                  
                  <th><a href="{{route('add.cate')}}" class="btn btn-app">
                <i class="fa fa-plus-square"></i> Them moi danh muc
              </a></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($cates as $all)
                        <tr>
                          <td>{{$all->id}}</td>
                          <td>{{$all->name}}</td>
                          
                          <td>{{isset($all->cateparent->name)?$all->cateparent->name:'null'}}</td> 
                          
                          <td><a href="{{route('up.cate',$all->id)}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                          <a href="{{route('delete.cate',$all->id)}}" class="btn btn-app" class="btn btn-success" onclick="return confirmDel()"><i class="fa fa-trash-o"></i>Xoa</a> </td>
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