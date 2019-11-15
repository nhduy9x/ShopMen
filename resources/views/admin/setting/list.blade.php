@extends('layouts.admin.main')    
@section('title','cai đặt giao diện')
@section('page','cai đặt giao diện')
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
                     
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  	
                  	
  		                <tr>
  		                  <td>{{$setting->id}}</td>
  		                  <td>{{$setting->logo_text}}</td>
  		                  <td>{!!Str::limit($setting->address,20,'...')!!}</td>
  		                  <td><img src="{{asset(isset($setting->logo_img)?$setting->logo_img:'img/default.jpg')}}" width="50px"></td>
  		                  <td>
                          <a href="{{route('up.setting',$setting->id)}}" class="btn btn-app" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                          <a href="{{route('delete.setting',$setting->id)}}" class="btn btn-app" class="btn btn-success" onclick="return confirmDel()"><i class="fa fa-trash-o"></i>Xoa</a> 
                          </td>
  		                </tr>
  		            
                  	

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