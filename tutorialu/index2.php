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
		getpost();
		getpost2();
	});
	function getCategory()
		{
			$.ajax({
				type:"POST",
				url:'getcategorygw.php',
				dataType:"JSON",
				success:function(data)
				{
				console.log(data);
				var items="";
				for(var i=0;i<data.length;i++)
					{
						var CID=data[i].Row.ID;
						var CategoryName=data[i].Row.CategoryName;
						//$("#liCategory").addClass("main-nav nav navbar-nav");
						$("#liCategory").css({'color':'white',
											 'fontSize':'20px',
											 })
						//console.log(ID);
						//console.log(CategoryName);
		items=items+"<li value="+CID+"><a href='#' onClick='getpost("+CID+")'>"+CategoryName+"</a></li>";
					}
				$('#liCategory').append(items);
					console.log(items);
				},
				error:function(err)
				{	
				
			}
			});
		}
	  function getpost(CID)
	  {
		  //console.log("hello");
		   $.ajax(
			{
				type:"POST",
				url:'getpostgw.php',
				data:{CID:CID},
				success:function(data)
				{
				console.log("hellohiiii");	
					$('#ShowPost').html(data);
				},
				error:function(err)
				{
					console.log("hellohi");
					console.log(err);
				}
			});
	  }
	  function getpost2()
	  {
		   $.ajax(
			{
				type:"POST",
				url:'getpost2gw.php',
				success:function(data)
				{
					//console.log("hello");
					$('#ShowPost2').html(data);
				},
				error:function(err)
				{
					console.log("hello");
					console.log(err);
				}
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
<ul>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-instagram"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
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
<ul id="liCategory" class="main-nav nav navbar-nav">
<li class="active" id="navbar1"><a href="index2.php">Home</a></li>


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
















<div class="section">

<div class="container">

<div class="row">

<div class="col-md-8">

<div id="ShowPost"></div>


<!--
	<article class="article row-article">
	<div class="article-img">
	<a href="#">
	<img src="img/img-md-1.jpg" alt="">
	</a>
	</div>
	<div class="article-body">
	<ul class="article-info">
	<li class="article-category"><a href="#">News</a></li>
	<li class="article-type"><i class="fa fa-file-text"></i></li>
	</ul>
	<h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
	<ul class="article-meta">
	<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
	<li><i class="fa fa-comments"></i> 33</li>
	</ul>
	<p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui.</p>
	</div>
	</article>
-->





<!--<article class="article row-article">
<div class="article-img">
<a href="#">
<img src="img/img-md-3.jpg" alt="">
</a>
</div>
<div class="article-body">
<ul class="article-info">
<li class="article-category"><a href="#">News</a></li>
<li class="article-type"><i class="fa fa-file-text"></i></li>
</ul>
<h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
<ul class="article-meta">
<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
<li><i class="fa fa-comments"></i> 33</li>
</ul>
<p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui.</p>
</div>
</article>-->


<!--<article class="article row-article">
<div class="article-img">
<a href="#">
<img src="img/img-md-4.jpg" alt="">
</a>
</div>
<div class="article-body">
<ul class="article-info">
<li class="article-category"><a href="#">News</a></li>
<li class="article-type"><i class="fa fa-file-text"></i></li>
</ul>
<h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
<ul class="article-meta">
<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
<li><i class="fa fa-comments"></i> 33</li>
</ul>
<p>Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui.</p>
</div>
</article>-->


<div class="article-pagination">
<ul>
<li class="active"><a href="#" class="active">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
</ul>
</div>

</div>



</div>

</div>

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
<h2 class="title">Subscribe to Newsletter</h2>
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

<div id="ShowPost2"></div>







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

