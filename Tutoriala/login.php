<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
		function Check()
		{
			Phone=$('#txtPhone').val();
			Password=$('#txtPassword').val();
			var FormHasError=false;
			
		  	var Phone=$('#txtPhone').val();
		  	if(Phone.length==0)
			{
				console.log("hello");
				$('#hlpPhone').addClass('form-group has-error');
				FormHasError=true;
			}
		  	else
			{
				  $('#hlpPhone').removeClass();
				  $('#hlpPhone').addClass('form-group');
			}
	  
	
	  
		  	var Password=$('#txtPassword').val();
		  	if(Password.length==0)
			{
				  $('#hlpPassword').addClass('form-group has-error');
				  FormHasError=true;
			}
		  	else
			{
				  $('#hlpPassword').removeClass();
				  $('#hlpPassword').addClass('form-group');
			}
			if(FormHasError==false)
				{
					$.ajax({
						type:"POST",
						url:"pages/0phplibrary/1core/logingw.php",
						data:{Phone:Phone,Password:Password},
						dataType:"JSON",
						beforeSend:function()
						{
						$("#Res").fadeIn(0);		
						},
						success:function(data)
						{
							var S=data[0].Status;
							if(S==1)
						{
						window.location.replace("pages/1dashboard/dashboard.php")
					}
						   else
						{
							$("#Res").html("Please Check User Name or Password");
							$("#Res").addClass("alert alert-danger");
							$("#Res").fadeOut(3000);
						}
					},
					error:function(err)
					{
						//console.log(err);
						$("#Res").html(data[0].Message);
						$("#Res").addClass("alert alert-danger");
						$("#Res").fadeOut(0);
					}
				
							
												
					});
				}
		}
						   
	</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="pages/1dashboard/dashboard.php"><b>Prateek</b>Tutorials</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form  method="post">
      <div class="form-group has-feedback" id="hlpPhone">
        <input type="text" class="form-control" id="txtPhone" placeholder="UserName">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" id="hlpPassword">
        <input type="password" class="form-control" id="txtPassword" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="button" class="btn btn-primary btn-block btn-flat" id="btnLogin" value="Login" onClick="Check()">
        </div>
        <!-- /.col -->
      </div>
      <div id="Res"></div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="pages/examples/register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
