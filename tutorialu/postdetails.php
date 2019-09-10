<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/magnews/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jun 2019 09:31:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Magnews HTML Template</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

<link rel="stylesheet" href="css/font-awesome.min.css">

<link type="text/css" rel="stylesheet" href="css/style.css" />


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
			getCategory();
			//getSocialMedia();
			//getPost();
		});
	  	
		function getCategory()
		{
			$.ajax(
			{
				type:"POST",
				url:'getcategorygw.php',
				dataType:"JSON",
				success:function(data)
				{
					//console.log(data);
					var items="<li class='active' id='navbar1'><a href='#'>Home</a></li>";
					for(var i=0;i<data.length;i++)
					{
						var CID=data[i].Row.ID;
						var CategoryName=data[i].Row.CategoryName;
						
						items=items+"<li CID="+CID+" value="+CID+"><a href='#' onClick='getPost("+CID+")'>"+CategoryName+"</a></li>";
						//$('#'+ID).addClass(active);
						
					}
					$('#ShowCategory').append(items);
					//console.log(items);
				},
				error:function(err)
				{
					console.log(err);
				}
			});
		}
	  
	  
	  	function getPost(CID)
		{
			//alert(ID);
			
			$.ajax(
			{
				type:"POST",
				url:'../Tutoriala/pages/0phplibrary/1core/getpostgw.php',
				data:{CID:CID},
				//dataType:"JSON",
				success:function(data)
				{
			console.log("run");		
					$('#ShowPost').html(data);
					
				},
				error:function(err)
				{
					console.log(err);
				}
			});
		}
	  function Comment()
	  {
		  var Name=$('#txtName').val();
		  var Email=$('#txtEmail').val();
		  var Message=$('#txtMessage').val();
		  StatusID=0;
		  
		  $.ajax({
					  type:'POST',
					  url:'commentgw.php',
					  data:{Name:Name,Email:Email,Message:Message,StatusID:StatusID},
					  dataType:"JSON",
					  beforeSend: function()
					  {
						  $("#Res").fadeIn(0);
					  },
					  success:function(data)
					  {
						  console.log(JSON.stringify(data));
						 
						  $("#txtName").val("");
						  $("#txtEmail").val("");
						  $("#txtMessage").val("");
						  //ShowAllRecord();
					  },
					  error:function(err)
					  {
					  console.log(err)
					  	  $("#Res").html(err);
						  
						  $("#Res").fadeOut(0);
				  }
				  });
			  }
	  function ShowAllRecord()
	  {
		  $.ajax({
			 type:'POST',
			  url:''
		  });
	  }
	  
	</script>
	
</head>
<body>

<header id="header">

<div id="top-header">
<div class="container">
<div class="header-links">
<ul>
<li><a href="#">About us</a></li>
<li><a href="#">Contact</a></li>
<li><a href="#">Advertisement</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
</ul>
</div>
<div class="header-social">
<ul id="ShowSocialMedia">
<!--
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-instagram"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
-->
</ul>
</div>
</div>
</div>


<div id="center-header">
<div class="container">
<div class="header-logo">
<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
</div>
<div class="header-ads">
</div>
</div>
</div>


<div id="nav-header">
<div class="container">
<nav id="main-nav">
<div class="nav-logo">
<a href="#" class="logo"><img src="img/logo-alt.png" alt=""></a>
</div>
<ul id="ShowCategory" class="main-nav nav navbar-nav">


</ul>
</nav>
<div class="button-nav">
<button class="search-collapse-btn"><i class="fa fa-search"></i></button>
<button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
<div class="search-form">
<form>
<input class="input" type="text" name="search" placeholder="Search">
</form>
</div>
</div>
</div>
</div>

</header>


<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">

</div>


<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">

						<!-- breadcrumb -->
						
						<!-- /breadcrumb -->
						<?php
						require_once("connection.php");

						$ID=$_GET["ID"];

						$SQ="select * from post where StatusID=1 and ID=$ID";
						//echo($SQ);
						$Table=mysqli_query($CN,$SQ);

						$Row=mysqli_fetch_array($Table);

						$ID=$Row['ID'];

						$Thumbnail="../Tutoriala/upload/".$Row['Thumbnail'];
						$ID=$Row['ID'];
						$Category=$Row['Category'];
						$PostTitle=$Row['PostTitle'];
						$PostDate=$Row['PostDate'];

						$UserID=$Row['UserID'];


						$PostDescription=$Row['PostDescription'];	
					?>
		
						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-share">
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
							</div>
							<div class="article-main-img">
								<img src="<?php echo($Thumbnail);?>" alt="">
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#"><?php echo($Category);?></a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title"><?php echo($PostTitle);?></h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> <?php echo($PostDate);?></li>
									<li><i class="fa fa-comments"></i> 33</li>
									<li><i class="fa fa-user"></i> <?php echo($UserID);?></li>
								</ul>
								<p>
									<?php echo($PostDescription);?>
								</p>
							</div>
						</article>
						<!-- /ARTICLE POST -->
						
						<!-- widget tags -->
						
						<!-- /widget tags -->
						
						<!-- article comments -->
						<div class="article-comments">
							<div class="section-title">
								<h2 class="title">Comments</h2>
							</div>
								
							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img src="img/av-1.jpg" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
									</div>
									<p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec atqui paulo,</p>				
									<a href="#" class="reply-btn">Reply</a>
								</div>
								
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img src="img/av-2.jpg" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
										</div>
										<p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec atqui paulo,</p>				
										<a href="#" class="reply-btn">Reply</a>
									</div>
									
									<!-- comment -->
									<div class="media">
										<div class="media-left">
											<img src="img/av-1.jpg" alt="">
										</div>
										<div class="media-body">
											<div class="media-heading">
												<h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
											</div>
											<p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec atqui paulo,</p>				
											<a href="#" class="reply-btn">Reply</a>
										</div>
									</div>
									<!-- /comment -->
								</div>
								<!-- /comment -->
							</div>
							<!-- /comment -->
							
							<!-- comment -->
							<div class="media">
								<div class="media-left">
									<img src="img/av-2.jpg" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h5>John Doe <span class="reply-time">April 04, 2017 At 9:30 AM</span></h5>
									</div>
									<p>Eu usu aliquip vivendo. Impedit suscipit invidunt te vel, sale periculis id mea. Ne nec atqui paulo,</p>				
									<a href="#" class="reply-btn">Reply</a>
								</div>
							</div>
							<!-- /comment -->
						</div>
						<!-- /article comments -->
						
						<!-- reply form -->
						<div class="article-reply-form">
							<div class="section-title">
								<h2 class="title">Leave a reply</h2>
							</div>
								
							<form>
								<input class="input" placeholder="Name" type="text" id="txtName">
								<input class="input" placeholder="Email" type="email" id="txtEmail">
								<!--<input class="input" placeholder="Website" type="url">
								--><textarea class="input" placeholder="Message" id="txtMessage"></textarea>
								<input type="button" class="input-btn" id="btnSend" onClick="Comment()"  value="Send Message">
							<div id="Res"></div>
							</form>
						</div>
						<!-- /reply form -->
					</div>
					<!-- /Main Column -->
					
					<!-- Aside Column -->
					
					<!-- /Aside Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>


<footer id="footer">

<div id="top-footer" class="section">

<div class="container">

<div class="row">

<div class="col-md-4">

<div class="footer-widget about-widget">
<div class="footer-logo">
<a href="#" class="logo"><img src="img/logo-alt.png" alt=""></a>
<p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui.</p>
</div>
</div>


<div class="footer-widget social-widget">
<div class="widget-title">
<h3 class="title">Follow Us</h3>
</div>
<ul>
<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
<li><a href="#" class="google"><i class="fa fa-google"></i></a></li>
<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
<li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
</ul>
</div>


<div class="footer-widget subscribe-widget">
<div class="widget-title">
<h2 class="title">Subscribe to Newslatter</h2>
</div>
<form>
<input class="input" type="email" placeholder="Enter Your Email">
<button class="input-btn">Subscribe</button>
</form>
</div>

</div>


<div class="col-md-4">

<div class="footer-widget">
<div class="widget-title">
<h2 class="title">Featured Posts</h2>
</div>

<article class="article widget-article">
<div class="article-img">
<a href="#">
<img src="img/img-widget-1.jpg" alt="">
</a>
</div>
<div class="article-body">
<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
<ul class="article-meta">
<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
<li><i class="fa fa-comments"></i> 33</li>
</ul>
</div>
</article>


<article class="article widget-article">
<div class="article-img">
<a href="#">
<img src="img/img-widget-2.jpg" alt="">
</a>
</div>
<div class="article-body">
<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
<ul class="article-meta">
<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
<li><i class="fa fa-comments"></i> 33</li>
</ul>
</div>
</article>


<article class="article widget-article">
<div class="article-img">
<a href="#">
<img src="img/img-widget-3.jpg" alt="">
</a>
</div>
<div class="article-body">
<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
<ul class="article-meta">
<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
<li><i class="fa fa-comments"></i> 33</li>
</ul>
</div>
</article>

</div>

</div>


<div class="col-md-4">

<div class="footer-widget galery-widget">
<div class="widget-title">
<h2 class="title">Flickr Photos</h2>
</div>
<ul>
<li><a href="#"><img src="img/img-widget-3.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-4.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-5.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-6.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-7.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-8.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-9.jpg" alt=""></a></li>
<li><a href="#"><img src="img/img-widget-10.jpg" alt=""></a></li>
</ul>
</div>


<div class="footer-widget tweets-widget">
<div class="widget-title">
<h2 class="title">Recent Tweets</h2>
</div>
<ul>
<li class="tweet">
<i class="fa fa-twitter"></i>
<div class="tweet-body">
<p><a href="#">@magnews</a> Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis <a href="#">https://t.co/DwsTbsmxTP</a></p>
</div>
</li>
</ul>
</div>

</div>

</div>

</div>

</div>


<div id="bottom-footer" class="section">

<div class="container">

<div class="row">

<div class="col-md-6 col-md-push-6">
<ul class="footer-links">
<li><a href="#">About us</a></li>
<li><a href="#">Contact</a></li>
<li><a href="#">Advertisement</a></li>
<li><a href="#">Privacy</a></li>
</ul>
</div>


<div class="col-md-6 col-md-pull-6">
<div class="footer-copyright">
<span>
Copyright &copy;<script type="43435c465975730981f9beb5-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
</span>
</div>
</div>

</div>

</div>

</div>

</footer>


<div id="back-to-top"></div>


<script src="js/jquery.min.js" type="43435c465975730981f9beb5-text/javascript"></script>
<script src="js/bootstrap.min.js" type="43435c465975730981f9beb5-text/javascript"></script>
<script src="js/owl.carousel.min.js" type="43435c465975730981f9beb5-text/javascript"></script>
<script src="js/main.js" type="43435c465975730981f9beb5-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="43435c465975730981f9beb5-text/javascript"></script>
<script type="43435c465975730981f9beb5-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="js/rocket-loader.min.js" data-cf-settings="43435c465975730981f9beb5-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com/preview/theme/magnews/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jun 2019 09:31:23 GMT -->
</html>

