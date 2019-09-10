<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
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

	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script>
	$(document).ready(function(){
       $('#btnRegister').prop('disabled',false);
    });
	function InsertRecord()
	{
		var FormHasError=false;
		  var FullName=$('#txtFullName').val();
		  if(FullName.length==0)
			{
				$('#hlpFullName').addClass('form-group has-error');
				FormHasError=true;
			}
		  else
			  {
				  $('#hlpFullName').removeClass();
				  $('#hlpFullName').addClass('form-group');
			  }
	  
	
	  
		  var Email=$('#txtEmail').val();
		  if(Email.length==0)
			  {
				  $('#hlpEmail').addClass('form-group has-error');
				  				FormHasError=true;

			  }
		  else
			  {
				  $('#hlpEmail').removeClass();
				  $('#hlpEmail').addClass('form-group');
			  }
		var Phone=$('#txtPhone').val();
		  if(Phone.length==0)
			  {
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
		var Password2=$('#txtPassword2').val();
		  if(Password2.length==0)
			  {
				  $('#hlpPassword2').addClass('form-group has-error');
				  				FormHasError=true;

			  }
		  else
			  {
				  $('#hlpPassword2').removeClass();
				  $('#hlpPassword2').addClass('form-group');
			  }
		
	
	  var StatusID=0;
	  if(FormHasError==false)
		  {
			   $.ajax({
					  type:'POST',
					  url:'pages/0phplibrary/1core/registrationgw.php',
					  data:{FullName:FullName,Email:Email,Phone:Phone,Password:Password,StatusID:StatusID},
					  dataType:"JSON",
					  beforeSend: function()
					  {
						  $("#Res").fadeIn(0);
					  },
					  success:function(data)
					  {
						  
						  console.log(JSON.stringify(data));
						  $("#Res").html(data[0].Message);
						  $("#Res").addClass("alert alert-success");
						  $("#Res").fadeOut(3000);
						  $("#txtFullName").val("");
						  $("#txtEmail").val("");
						  $("#txtPhone").val("");
						  $("#txtPassword").val("");
						  $("#txtPassword2").val("");
						  //ShowAllRecord();
					  },
					  error:function(err)
					  {
					  console.log(err)
					  	  $("#Res").html(err);
						  $("#Res").addClass("alert alert-danger");
						  $("#Res").fadeOut(0);
				  }
				  });
		  }
	}
	</script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="pages/1dashboard/dashboard.php"><b>Prateek</b>Tutorials</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form  method="post">
      <div class="form-group has-feedback" id="hlpFullName">
        <input type="text" class="form-control" placeholder="Full name" id="txtFullName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" id="hlpEmail">
        <input type="email" class="form-control" placeholder="Email" id="txtEmail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" id="hlpPhone">
        <input type="text" class="form-control" placeholder="Phone Number" id="txtPhone">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" id="hlpPassword">
        <input type="password" class="form-control" placeholder="Password" id="txtPassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" id="hlpPassword2">
        <input type="password" class="form-control" placeholder="Retype password" id="txtPassword2">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="chkRegistration" onChange="ToggleButton()"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="button" id="btnRegister" class="btn btn-primary btn-block btn-flat" value="Register" onClick="InsertRecord()">
        </div>
        <!-- /.col -->
      </div>
      <div id="Res"></div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="pages/examples/login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
      increaseArea: '20%', 
    });
  });
</script>
</body>
</html>
