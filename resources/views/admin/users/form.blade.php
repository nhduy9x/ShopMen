@extends('layouts.admin.main')
@php
	$title = $user->id == null ? "Thêm người dùng mới" : "Update người dùng";
@endphp
@section('title', $title)
@section('page',$title)

@section('content')
<form action="{{route('save.user')}}" method="post" enctype="multipart/form-data">
      @csrf
       <input type="hidden" name="id" value="{{isset($user['id'])?$user['id']:''}}">
        <!-- /.col (left) -->
        <div class="col-md-10">
          <div class="box box-primary">
           
            <div class="">
              <div style="width: 20%; margin: auto; " >
                  <img id="asgnmnt_file_img" src="{{ asset(isset($user->avatar)?$user->avatar:'img/avatar.jpg')}}" style="width: 80%; margin-left: 5%; border-radius: 50%">
                </div>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                
                <div class="col-md-12" style="margin-left: 0">
                    <label>Họ và Tên:</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Họ và Tên">
                    <span class="text-danger">
                    @if(count($errors))
                    {{$errors->first('name')}}   
                    @endif               
                    </span>
                </div>
                <div class="col-md-12" style="margin-left: 0">
                    @if(Auth::user()->is_active==$user->is_active && Auth::user()->is_active>=2)
                    <label >Phân quyền</label>
                    <input type="text" class="form-control" value="Quản chi viên cao cấp" disabled>
                    @elseif(Auth::user()->is_active>1)
                    <label >Phân quyền</label>
                                    <div >
                                        <select name="category_id" class="form-control">
                                            <option value="">--chon--</option> 
                                            @for($i=0;$i<2;$i++)
                                             <option @if($i==$user->is_active)
                                                            selected 
                                                        @endif value="{{$i}}">{{$i==0?'thành viên':'Quản chi viên'}}</option>
                                             
                                            @endfor   
                                        </select>
                    @endif
                    

                    {{-- @if(Auth::user()->is_active==$user->is_active==2)
                    <input type="text" class="form-control" value="Quản chi viên cao cấp" disabled>
                    
                    @endif --}}
                </div>
              </div>
                
                
                <div class="col-md-12">
                    <label>Email</label>
                    @if(empty($user->id))
                    <input type="text" class="form-control" name="email"  placeholder="Email ...">
                      <span class="text-danger">
                          @if(count($errors))
                            {{$errors->first('email')}}   
                            @endif                              
                       </span>
                    @else
                    <input type="text" class="form-control" value="{{$user->email}}" disabled>
                    
                     
                    @endif
                    
                  
                    
                    
                </div>
                @if(!isset($user->password))
                 <div class="col-md-12">

                    <label>Mật khẩu</label>
                    <input type="hidden" name="presentPass" value="">
                    <input type="password" name="pass" class="form-control" placeholder="password ...">
                    <span class="text-danger">
                      @if(count($errors))
                    {{$errors->first('pass')}}   
                    @endif                           
                                            </span>
                </div>
                <div class="col-md-12">

                    <label>Nhập lại mật khẩu</label>
                    <input type="hidden" name="presentPass" value="">
                    <input type="password" name="cfpass" class="form-control" placeholder="password ...">
                    <span class="text-danger">
                    @if(session('cfpass'))
                      {{session('cfpass')}}   
                    @endif                           
                                            </span>
                </div>
              @endif
              <div class="col-md-12" style="display: flex;flex-wrap: wrap;">
                <div style="margin: 0; width: 100%" >
                  <label>avatar:</label>
                  <input type="hidden" name="anh" value="{{isset($user->avatar)?$user->avatar:''}}">
                 
                  <input type="file" name="image" id="asgnmnt_file" class="form-control" onchange="fileSelected(this)" >
                  <span class="text-danger">
                      @if(count($errors))
                    {{$errors->first('image')}}   
                    @endif
                    @if (session('image'))                                       
                             {{ session('image') }}                                      
                      @endif                          
                  </span>
                </div>
                
              </div>
                
                
                <div class="col-md-12">
                  <label>birthday:</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="{{isset($user->birthday)?$user->birthday:''}}" class="form-control pull-right" placeholder="yyyy-mm-dd" id="datepicker" name="date" />
                   
                    
                  </div>
                  <span class="text-danger">
                    @if(count($errors))
                    {{$errors->first('date')}}   
                    @endif                             
                                            </span>
                </div>
                
               
                <div class="col-md-12">
                   <label>
                   <input type="checkbox" name="active" value="1">Agree the terms and policy 
                   <span class="text-danger">
                         @if(count($errors))
                    {{$errors->first('active')}}   
                    @endif                    
                                            </span>
                   </label>
                </div>
                <div class="col-md-12">
                  <input type="submit" value="Save" class="btn btn-primary">
                  <a href="" class="btn btn-danger">Cancel</a>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- iCheck -->
          
          <!-- /.box -->
        </div>
        
</form>
@endsection

@section('js')
    <script type="text/javascript">
    function passFileUrl(){
    document.getElementById('asgnmnt_file').click();
    }

    function fileSelected(inputData){
    document.getElementById('asgnmnt_file_img').src = window.URL.createObjectURL(inputData.files[0])
    }

    </script>
@endsection



