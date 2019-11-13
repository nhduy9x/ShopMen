@extends('layouts.admin.main')    
@section('title','users')
@section('page','users')
@section('content')
 <div class="row">
        <div class="col-xs-12">
        
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="30px">STT</th>
                  <th>Name</th>
                  <th>birthday</th>
                  <th>image</th>
                  <th>active</th>
                  <th><a href="{{route('add.user')}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-plus-square" ></i>Add New</a></th>
                </tr>
                </thead>
                <tbody>
                   @foreach($users as $all)
                  
                    <tr>
                      <td>{{$all->id}}</td>
                      <td>{{$all->name}}</td>
                      <td>{{$all->birthday}}</td>
                      <td><img src="{{ asset(isset($all->avatar)?$all->avatar:'img/avatar.jpg')}}" width="50px"></td>
                      <td>
                       @if($all->is_active>=1)
                          
                          <span class="btn-primary">da active</span>
                       @else
                          <span class="btn-danger">chua active</span>
                        @endif
                      </td>
                      <td><a href="{{route('up.user',$all->id)}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a> <a onclick="return confirmDel()" href="" class="btn btn-app"><i class="fa fa-trash-o" style="font-size: 20px; text-align: center;"></i>Delete</a>
                      <a href="" class="btn btn-app"><i class="fa fa-trash-o" ></i>acvite and cancel</a>
                      </td>
                    </tr>
                
                  @endforeach 

                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection
@section('js')
<script>
                function confirmDel() {
                    return confirm("Bạn có chắc xóa không");
                }

            </script>
@endsection