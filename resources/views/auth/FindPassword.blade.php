<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 @include('layouts.admin.layouts.css')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Find Password</p>

    <form action="{{route('findpass')}}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="nhap Email ">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
        <span class="login-box-msg" style="color: red">
         @if($errors->any())
         {{ $errors->first('error') }}
      @endif
      </span>
     
      
      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">search</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">
     
        <a href="{{route('login')}}" class="btn btn-block btn-social btn-facebook btn-flat" style="text-align: center;"></i> Login</a>
    
      
      <a href="/" class="btn btn-block btn-social btn-google btn-flat" style="text-align: center;"></i>trang chu</a>
    </div>
    <!-- /.social-auth-links -->

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
 @include('layouts.admin.layouts.js')
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
