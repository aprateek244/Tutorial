<?php
session_start();
	$FullName=$_SESSION["FullName"];
$RegDateTime=$_SESSION["RegDateTime"];
$Phone=$_SESSION["Phone"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tutorial | Keyword</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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
		$(document).ready(function()
					   {
		  ShowAllRecord();
getCategory()
		});
		
		function getCategory()
		{
			$.ajax({
				type:"POST",
				url:'../0phplibrary/1core/getcategorygw.php',
				dataType:"JSON",
				success:function(data)
				{
				console.log(data);
				var items;
				for(var i=0;i<data.length;i++)
					{
						var ID=data[i].Row.ID;
						var CategoryName=data[i].Row.CategoryName;
						//console.log(ID);
						//console.log(CategoryName);
						items=items+"<option value="+ID+">"+CategoryName+"</option>";
						
					}
				$('#ddlCategory').append(items);
				},
				error:function(err)
				{
				
			}
			});
		}
	function Check()
	{
		var FormHasError=false;
		var Keywords=$('#txtKeywords').val();
		if(Keywords.length==0)
			{
				console.log("hello");
				FormHasError=true;
				$('#hlpKeywords').addClass('form-group has-error');
			}
		else
			{
				$('#hlpKeywords').removeClass();
				$('#hlpKeywords').addClass('form-group');
			}
		var Category=$('#ddlCategory option:selected').val();
		if(Category.length==0)
			{
				FormHasError=true;
				$('#hlpCategory').addClass('form-group has-error');
			}
		else
			{
				$('#hlpCategory').removeClass();
				$('#hlpCategory').addClass('form-group');
			}
		var StatusID=0;
		if(FormHasError==false)
			{
				$.ajax({
					type:"POST",
					url:"../0phplibrary/1core/keywordgw.php",
					data:{Keywords:Keywords,Category:Category,StatusID:StatusID},
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
						  $("#txtKeywords").val("");
						  $("#ddlCategory").val("");
						  ShowAllRecord()
					  	  
					  },
					  error:function(err)
					  {
					  console.log(err)
					  	  $("#Res").html(data[0].Message);
						  $("#Res").addClass("alert alert-danger");
						  $("#Res").fadeOut(0);
				  }
				});
			}
		
	}
		function ShowAllRecord()
	  {
		  $.ajax({
			  type:"POST",
			  url:"../0phplibrary/1core/keywordtablegw.php",
			  success:function(data)
			  {
				  console.log(data);
				  $('#tblKeywords').html(data);
			  },
			  error:function(err)
			  {
			  console.log(err);
		  }
		  
		  });
	  }
		function Active(ID)
	  {
		  console.log("active");
	  $.ajax({
		 type:'POST',
		  url:'../0phplibrary/1core/keywordactivegw.php',
		  data:{ID:ID},
		  dataType:"JSON",
		  success:function(data)
		  {
			  console.log(data);
			  ShowAllRecord()
		  },
		  error:function(err)
		  {
		  	  console.log(err);		
	  	  }
	  });
	  }
	  function InActive(ID)
	  {
		  console.log("InActive");
		  $.ajax({
		 type:'POST',
		  url:'../0phplibrary/1core/keywordinactivegw.php',
		  data:{ID:ID},
		  dataType:"JSON",
		  success:function(data)
		  {
			  console.log(data);
			  ShowAllRecord()
		  },
		  error:function(err)
		  {
		  	  console.log(err);		
	  	  }
	  });
	  }
	  function Edit()
	  {
		  console.log("Edit");
	  }
	  function Delete(ID)
	  {
		  console.log("Delete");
		  $.ajax({
			  type:'POST',
		  url:'../0phplibrary/1core/keyworddeletegw.php',
		  data:{ID:ID},
		  dataType:"JSON",
		  success:function(data)
			  {
				  console.log(data)
				  ShowAllRecord()
			  },
			  error:function(err)
			  {
			  console.log(err)
		  }
			  
		  })
	  }
</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
	
  <?php
	include("../1dashboard/header.php");
	?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php
	include("../1dashboard/sidebar.php");
	?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Keyword
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li><li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     	<div class="row">
          	<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Keywords</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group" id="hlpKeywords">
                  <label for="txtKeywords" class="col-sm-2 control-label">Keywords</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtKeywords" placeholder="Keywords">
                  </div>
                </div>
                <div class="form-group" id="hlpCategory">
                  <label for="ddlCategory" class="col-sm-2 control-label">Category</label>

                  <div class="col-sm-10">
                    <select  class="form-control" id="ddlCategory">
                    	<option value="">Category</option>
                    	
                    </select>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input id="btnCancel" type="reset" class="btn btn-default" value="Cancel">
                <input id="btnSave" type="button" class="btn btn-info pull-right" value="Save" onClick="Check()">
              </div>
              <div id="Res"></div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
         
          <!-- /.box -->
        </div>
        </div>
        
        <div class="row">
        	<div class="col-md-12">
         <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Keyword List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sno</th>
                  <th>Keyword</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="tblKeywords">
                	
                </tbody>
                <tfoot>
                <tr>
                  <th>Sno</th>
                  <th>Keyword</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
     	</div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
	include("../1dashboard/footer.php");
	?>
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
