<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  @include('layouts.admin.layouts.css')

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    
    <div class="login-box-msg"><img id="asgnmnt_file_img" src="{{asset(isset($user->avatar)?$user->avatar:'img/avatar.jpg')}}" style="width: 100px; border-radius: 50%;margin: 0 auto;"></div>
    
      <div class="social-auth-links text-center">
        <h1 class="login-box-msg" style="font-size: 13px">{{isset($user->email)?$user->email:'???'}}</h1>
        <p class="login-box-msg">Thay doi tai khoan thanh cong</p>
      </div>
     
     

     
   
    <div class="social-auth-links text-center">
     @if(empty(Auth::user()))
        <a href="{{route('login')}}" class="btn btn-block btn-social btn-facebook btn-flat" style="text-align: center;"></i> Login</a>
     @endif
      
      <a href="/" class="btn btn-block btn-social btn-google btn-flat" style="text-align: center;"></i>trang chu</a>
    </div>

    
  </div>
  <!-- /.form-box -->
</div>

</body>

<!-- /.register-box -->

<!-- jQuery -->
@include('layouts.admin.layouts.js')

</body>
</html>
