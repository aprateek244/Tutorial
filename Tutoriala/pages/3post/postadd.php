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
  <title>Tutorial | Post</title>
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
getCategory()
getKeywords()
ShowAllRecord()
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
				$('#ddlPostCategory').append(items);
				},
				error:function(err)
				{
				
			}
			});
		}
		function getKeywords()
		{
			$.ajax({
				type:"POST",
				url:'../0phplibrary/1core/getkeywordgw.php',
				dataType:"JSON",
				success:function(data)
				{
				console.log(data);
				var items;
				for(var i=0;i<data.length;i++)
					{
						var ID=data[i].Row.ID;
						var Keywords=data[i].Row.Keywords;
						//console.log(ID);
						//console.log(CategoryName);
						items=items+"<option value="+ID+">"+Keywords+"</option>";
						
					}
				$('#ddlKeywords').append(items);
				},
				error:function(err)
				{
				
			}
			});
		}
		
	function InsertRecord2()
		{
						  var FormHasError=false;

				var PostTitle=$('#txtPostTitle').val();
			if(PostTitle.length==0)
				{
					$('#hlpPostTitle').addClass('form-group has-error');
					console.log("hello")
					FormHasError=true;
				}
			else
				{
					$('#hlpPostTitle').removeClass();
					$('#hlpPostTitle').addClass('form-group');
				}
			
			var PostDescription=CKEDITOR.instances.txtPostDescription.getData();
			if(PostDescription.length==0)
				{
					$('#hlpPostDescription').addClass('form-group has-error');
					console.log("hello")
					FormHasError=true;
				}
			else
				{
					$('#hlpPostDescription').removeClass();
					$('#hlpPostDescription').addClass('form-group');
				}
			
		var Category=$('#ddlPostCategory option:selected').val();
		if(Category.length==0)
			{
					$('#hlpPostCategory').addClass('form-group has-error');
					console.log("hello")
					FormHasError=true;
				}
			else
				{
					$('#hlpPostCategory').removeClass();
					$('#hlpPostCategory').addClass('form-group');
				}
		
			var Keywords=$('#ddlKeywords option:selected').val();
			if(Keywords.length==0)
			{
					$('#hlpPostKeywords').addClass('form-group has-error');
					console.log("hello")
					FormHasError=true;
				}
			else
				{
					$('#hlpPostKeywords').removeClass();
					$('#hlpPostKeywords').addClass('form-group');
				}
			var PostDate=$('#calPostDate').val();
			if(PostDate.length==0)
			{
					$('#hlpPostDate').addClass('form-group has-error');
					console.log("hello")
					FormHasError=true;
				}
			else
				{
					$('#hlpPostDate').removeClass();
					$('#hlpPostDate').addClass('form-group');
				}
			var Thumbnail=$('#filPostThumbnail')[0].files[0];
			var Thumbnail2=$('#filPostThumbnail').val();
			console.log(Thumbnail2);
			if(Thumbnail2.length==0)
			{
					$('#hlpPostThumbnail').addClass('form-group has-error');
					console.log(Thumbnail2)
					FormHasError=true;
				}
			else
				{
					$('#hlpPostThumbnail').removeClass();
					$('#hlpPostThumbnail').addClass('form-group');
				}
			var StatusID=0;
			if(FormHasError==false)
			{ 
				var FD= new FormData();
				FD.append('PostTitle',PostTitle);
				FD.append('PostDescription',PostDescription);
				FD.append('Category',Category);
				FD.append('Keywords',Keywords);
				FD.append('PostDate',PostDate);
				FD.append('Thumbnail2',Thumbnail2);
				FD.append('F1',Thumbnail);
				FD.append('StatusID',StatusID);
					$.ajax({
						type:"POST",
						url:"../0phplibrary/postgw.php",
						data:FD,
						contentType:false,
						processData:false,
						dataType:"JSON",
						   beforeSend:function()
					{
						$("#Res").fadeIn(0);
					},
					  success:function(data)
					  {
						  console.log(JSON.stringify(data));
						  $("#Res").html(data[0].Message);
						  $("#Res").addClass("alert alert-success");
						  $("#Res").fadeOut(3000);
						  $("#txtPostTitle").val("");
						  $("#txtPostDescription").val("");
						  $("#ddlPostCategory").val("");
						  $("#ddlKeywords").val("");
						  $("#calPostDate").val("");
						  $("#filPostThumbnail").val("");
						  ShowAllRecord()
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
		function ShowAllRecord()
	  {
		  $.ajax({
			  type:"POST",
			  url:"../0phplibrary/1core/posttablegw.php",
			  success:function(data)
			  {
				  console.log(data);
				  $('#tblPost').html(data);
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
		  url:'../0phplibrary/1core/postactivegw.php',
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
		  url:'../0phplibrary/1core/postinactivegw.php',
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
		function Delete(ID)
	  {
		  console.log("Delete");
		  $.ajax({
			  type:'POST',
		  url:'../0phplibrary/1core/postdeletegw.php',
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
        Post
        </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
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
              <h3 class="box-title">Add Post</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id="frmpostadd" class="form-horizontal">
              <div class="box-body">
                <div class="form-group" id="hlpPostTitle">
                  <label for="txtPostTitle" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="txtPostTitle" placeholder="Title">
                  </div>
                </div>
                <div class="form-group" id="hlpPostDescription">
                  <label for="txtPostDescription" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea  class="form-control" id="txtPostDescription" name="txtPostDescription" rows="10" cols="80" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="form-group" id="hlpPostCategory">
                  <label for="ddlPostCategory" class="col-sm-2 control-label">Category</label>

                  <div class="col-sm-10" id="hlpPostCategory">
                   <select id="ddlPostCategory" class="form-control">
                   	<option value="">Category</option>
                   </select>
                  </div>
                </div>
                <div class="form-group" id="hlpPostKeywords">
                  <label for="ddlKeywords" class="col-sm-2 control-label">Keywords</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="ddlKeywords" size="5" multiple>
                  <option value="">Keywords</option>
                  </select>
                  </div>
                </div>
                <div class="form-group" id="hlpPostDate">
                  <label for="calPostDate" class="col-sm-2 control-label">Post Date</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="calPostDate" placeholder="Post Date">
                  </div>
                </div>
                
                <div class="form-group" id="hlpPostThumbnail">
                  <label for="filPostThumbnail" class="col-sm-2 control-label">Thumbnail</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="filPostThumbnail" placeholder="Password">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input id="btnCancel" type="reset" class="btn btn-default" value="Cancel">
                <input id="btnSave" type="button" class="btn btn-info pull-right" value="Save"
                 onClick="InsertRecord2()">
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
              <h3 class="box-title">Post Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>SNo</th>
                  <th>Title</th>
					<th>Description</th>
                  <th>Category</th>
                  <th>Keywords</th>
                  <th>Post Date</th>
                  <th>Thumnail</th>
                  <th>StatusID</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id=tblPost>
                
                </tbody>
                <tfoot>
                <tr>
                 <th>SNo</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Keywords</th>
                  <th>Post Date</th>
                  <th>Thumbnail</th>
                  <th>StatusID</th>
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
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
<script>
	$(function(){
		CKEDITOR.replace('txtPostDescription');
		$(".textarea").wysihtml5();
	});
	</script>
</body>
</html>
