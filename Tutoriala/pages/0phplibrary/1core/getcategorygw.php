<?php
require_once("connection.php");
$SQ="select ID,CategoryName from category";
$table=mysqli_query($CN,$SQ);
while($Row=mysqli_fetch_array($table))
{
	$Res[]=array("Row"=>$Row);
}
echo(json_encode($Res));
?>