
<?php
require_once("connection.php");

$SQ="select * from post where statusID=1";

$Table=mysqli_query($CN,$SQ);

while($Row=mysqli_fetch_array($Table))
{
	$Thumbnail="../../../upload/".$Row['Thumbnail'];
	$Category=$Row['Category'];
	$PostTitle=$Row['PostTitle'];
	$PostDate=$Row['PostDate'];
	$PostDescription=$Row['PostDescription'];

?>
	<article class="article row-article">
		<div class="article-img">
		<a href="#">
		<img src="<?php echo($Thumbnail)?>" alt="">
		</a>
		</div>
		<div class="article-body">
		<ul class="article-info">
		<li class="article-category"><a href="#">News</a></li>
		<li class="article-type"><i class="fa fa-file-text"></i></li>
		</ul>
		
		<h3 class="article-title"><a href="#"><?php echo($PostTitle)?></a></h3>
		<ul class="article-meta">
		<li><i class="fa fa-clock-o"></i><?php echo($PostTitle) ?></li>
		<li><i class="fa fa-comments"></i> 33</li>
		</ul>
		<p><?php echo($PostDescription)?></p>
		</div>
		</article>
<?php		
}
?>