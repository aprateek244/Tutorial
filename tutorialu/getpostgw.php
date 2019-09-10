
<?php
require_once("connection.php");
$Category=0;

//print_r($_POST);

if(isset($_POST['CID']))
{
	$Category=$_POST['CID'];
	$SQ="select * from post where statusID=1 and Category=$Category";

	}
else
{
		
	$SQ="select * from post where statusID=1 limit 4";

}

//echo $SQ;
$Table=mysqli_query($CN,$SQ);

while($Row=mysqli_fetch_array($Table))
{
	$Thumbnail="../Tutoriala/upload/".$Row['Thumbnail'];
	$Category=$Row['Category'];
	$PostTitle=$Row['PostTitle'];
	$ID=$Row['ID'];
	$PostDate=$Row['PostDate'];
	$PostDescription=$Row['PostDescription'];
	$PostDescription= strip_tags($PostDescription);
if (strlen($PostDescription) > 25) {

    // truncate string
    $stringCut = substr($PostDescription, 0, 200);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $PostDescription = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $PostDescription .= "... <a href='postdetails.php?ID=$ID'>Read More</a>";
}
	//read more code will come here

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
		<li><i class="fa fa-clock-o"></i><?php echo($PostDate) ?></li>
		<li><i class="fa fa-comments"></i> 33</li>
		</ul>
		<p><?php echo($PostDescription)?></p>
		</div>
		</article>
<?php		
}
?>