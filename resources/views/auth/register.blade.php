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
    <p class="login-box-msg">Register a new membership</p>
    <div class="login-box-msg"><img id="asgnmnt_file_img" src="{{asset('img/avatar.jpg')}}" style="width: 100px; border-radius: 50%;margin: 0 auto;"></div>
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Ho ten">
        <span class="glyphicon glyphicon-user form-control-feedback">
          
        </span>
      </div>
      @if(isset($errors))
            {{$errors->first('name')}}
      @endif
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback">
        </span>
      </div>

      @if(isset($errors))
            {{$errors->first('email')}}
      @endif
       @if (session('email'))                                       
             {{ session('email') }}                                      
      @endif
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      @if(isset($errors))
            {{$errors->first('pass')}}
            @endif</span>
      @if (session('password'))                                       
             {{ session('password') }}                                      
      @endif
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="cfpassword" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="date" id="datepicker" placeholder="ngay sinh">
                </div>
        
      </div>
      @if(isset($errors))
            {{$errors->first('date')}}
      @endif
      <div class="form-group has-feedback">
          <input type="file" class="form-control" name="image" id="asgnmnt_file" placeholder="image" onchange="fileSelected(this)">
          
          
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="active" value="1"> I agree to the <a href="#">terms</a>
            </label>
            <label>
              @if(isset($errors))
            {{$errors->first('active')}}
            @endif
            </label>
          </div>
        </div>
         
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{route('login')}}" class="btn btn-primary btn-block btn-flat">Login</a>
  </div>
  <!-- /.form-box -->
</div>

</body>

<!-- /.register-box -->

<!-- jQuery -->
@include('layouts.admin.layouts.js')
@section('js')
    <script type="text/javascript">
    function passFileUrl(){
    document.getElementById('asgnmnt_file').click();
    }

    function fileSelected(inputData){
    document.getElementById('asgnmnt_file_img').src = window.URL.createObjectURL(inputData.files[0])
    }
    </script>
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
