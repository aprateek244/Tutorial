<?php
require_once("connection.php");

$SQ="select * from post where statusID=1 limit 3";

$Table=mysqli_query($CN,$SQ);

while($Row=mysqli_fetch_array($Table))
{
	$Thumbnail="../Tutoriala/upload/".$Row['Thumbnail'];
	$Category=$Row['Category'];
	$PostTitle=$Row['PostTitle'];
	$PostDate=$Row['PostDate'];

?>
<article class="article widget-article">
<div class="article-img">
<a href="#">
<img src="<?php echo($Thumbnail)?>" alt="">
</a>
</div>
<div class="article-body">
<h4 class="article-title"><a href="#"><?php echo($PostTitle)?></a></h4>
<ul class="article-meta">
<li><i class="fa fa-clock-o"></i><?php echo($PostDate) ?></li>
<li><i class="fa fa-comments"></i> 33</li>
</ul>
</div>
</article>
<?php
}
?>