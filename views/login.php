<!DOCTYPE html>
<html>
<head>
<?php include 'toster.php' ;?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ebilling SoftWare | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assest/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assest/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assest/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assest/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assest/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="assest/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assest/tosterjs/toster.min.css">
    <script type="text/javascript" src="assest/tosterjs/toster.min.js"></script>
    <script type="text/javascript" src="assest/tosterjs/tosterjquery.js"></script>

 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background: #193048;">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 22px;">
  <div class="login-logo">
    <a href="assest/index2.html"><b>Ebilling</b> Software</a>
  </div>

  <p class="login-box-msg pts16"><b>Please login into your account.</b></p>

    <form action="check_login" method="POST">
      <div class="form-group has-feedback logintext">
        <input type="email" class="form-control int" name="user_name" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback logintext">
        <input type="password" class="form-control int" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
          <div class="row loginbutton">
            <button type="submit" class=" login_button btn btn-primary btn-block btn-flat">Login</button>
          </div>
        </div>
       
      </div>
    </form>

    <div class="row">
        
    <div class="social-auth-links text-center">
      <a href="#" ><p class="pts16">Forgot Your Password </p></a>
      <div class="col-xs-12 click_act">
        <span>Dont't have an account </span>   <a href="#"><span class="cli_act_spn">Click Here</span></a>
        </div>
      <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a> -->
    </div>
      </div>

    
   
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assest/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assest/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assest/plugins/iCheck/icheck.min.js"></script>
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
