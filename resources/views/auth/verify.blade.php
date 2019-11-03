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
    <form action="{{route('verify',$user->email)}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="form-group has-feedback">
        <h1 class="login-box-msg">Xac nhan tai khoan</h1>
        <p class="login-box-msg">{{isset($user->email)?$user->email:'???'}}</p>
        <p class="login-box-msg">Vui long nhap ma xac nhan da gui den email dang ky!</p>
      </div>
     
      <div class="form-group ">
        <input type="text" class="form-control" name="code" placeholder="Nhap ma xac nhan">
        
      </div>

      <div class="form-group">
        <p class="login-box-msg" style="color: red">
          @if (session('loi'))                                       
             {{ session('loi') }}                                      
          @endif
        </p>
        
      </div>
      <div class="social-auth-links text-center">
       
          <button type="submit" class="btn btn-block btn-primary" style="text-align: center;">Xac nhan tai khoan</button>
        
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat" style="text-align: center;"></i> Gui lai ma xac nhan</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat" style="text-align: center;"></i>trang chu</a>
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
