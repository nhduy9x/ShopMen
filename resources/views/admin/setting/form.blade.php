@extends('layouts.admin.main')
@php
	$title = $setting->id == null ? "Cài đặt giao diện" : "Cài đặt giao diện";
@endphp
@section('title', $title)
@section('page',$title)

@section('content')
<form action="{{route('save.setting')}}" method="post" enctype="multipart/form-data">
      @csrf
       <input type="hidden" name="id" value="{{isset($setting['id'])?$setting['id']:''}}">
        <!-- /.col (left) -->
        <div class="col-md-10">
          <div class="box box-primary">
           
            <div class="">
              <div style="width: 20%; margin: auto; " >
                  <img id="asgnmnt_file_img" src="{{ asset(isset($setting->logo_img)?$setting->logo_img:'img/avatar.jpg')}}" style="width: 80%; margin-left: 5%; border-radius: 50%">
                </div>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                
                <div class="col-md-12" style="margin-left: 0">
                    <label>Logo danh chữ</label>
                    <input type="text" name="logo_text" class="form-control" value="{{$setting->logo_text}}" placeholder="Họ và Tên" >
                    <span class="text-danger">
                    @if(count($errors))
                    {{$errors->first('logo_text')}}   
                    @endif               
                    </span>
                </div>
                <div class="col-md-12" style="display: flex;flex-wrap: wrap;">
                <div style="margin: 0; width: 100%" >
                  <label>Logo image:</label>
                  <input type="hidden" name="anh" value="{{isset($setting->logo_img)?$setting->logo_img:''}}">
                 
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
                <div class="col-md-12" style="margin-left: 0">
                    <label >Dạnh hiễn thị logo</label>
                                    <div >
                                        <select name="choose_logo" class="form-control">
                                            <option value="">--chon--</option>
                                            @for($i=1;$i<3;$i++)
                                             <option @if($i==$setting->choose_logo)
                                                            selected 
                                                        @endif value="{{$i}}">{{$i==1?'hiễn thị dạnh chữ':'hiễn thị dạnh image'}}</option>
                                             
                                            @endfor  
                                        </select>
                </div>
              </div>
                
                
                <div class="col-md-12">
                    <label>Email:</label>
                   
                    <input type="text" class="form-control" name="email" value="{{$setting->email}}"  placeholder="Email ...">
                      <span class="text-danger">
                          @if(count($errors))
                            {{$errors->first('email')}}   
                            @endif                              
                       </span>
                </div>
                <div class="col-md-12">
                    <label>Hotline:</label>
                    
                    <input type="text" class="form-control" name="hotline" value="{{$setting->hotline}}"  placeholder="hotline ...">
                      <span class="text-danger">
                          @if(count($errors))
                            {{$errors->first('hotline')}}   
                            @endif                              
                       </span>
                </div>
                <div class="col-md-12">
                  <label>address:</label>
                  <div style="margin-left: 0; width: 100%" >
                   
                    <textarea id="editor1" class="form-control" rows="15" cols="80"  name="address">{!!isset($setting->address)?$setting->address:''!!}</textarea>
                   
                    
                  </div>
                  <span class="text-danger">
                    @if(count($errors))
                    {{$errors->first('address')}}   
                    @endif                             
                                            </span>
                </div>
                
               
              
                <div class="col-md-12">
                  <input type="submit" value="Save" class="btn btn-primary">
                  <a href="{{route('list.setting')}}" class="btn btn-danger">Cancel</a>
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



