<?php
	require_once("connection.php");
$SQ="Select * from post order by id desc";
$Table=mysqli_query($CN,$SQ);
$Sno=1;
while($Row=mysqli_fetch_array($Table))
{
	$Title=$Row['PostTitle'];
	$Description=$Row['PostDescription'];
	$Category=$Row['Category'];
	$Keywords=$Row['Keywords'];
	$PostDate=$Row['PostDate'];
	$Thumbnail=$Row['Thumbnail'];
	$StatusID=$Row['StatusID'];
	$ID=$Row['ID'];
	echo("<tr>");
	echo("<td>".$Sno."</td>");
	echo("<td>".$Title."</td>");
	echo("<td>".$Description."</td>");
	echo("<td>".$Category."</td>");
	echo("<td>".$Keywords."</td>");
	echo("<td>".$PostDate."</td>");
	echo("<td>".$Thumbnail."</td>");
	echo("<td>".$StatusID."</td>");
	echo("<td><a href='#' type='button' class='btn btn-info btn-flat' title='active' tooltip='Active' data-original-title='Active' onClick='Active($ID)'><i class='fa fa-check'></i></a>
	<a href='#' type='button' class='btn btn-danger btn-flat' title='Inactive' tooltip='InActive' data-original-title='InActive' onClick='InActive($ID)'><i class='fa fa-close'></i></a>
	<a href='#' type='button' class='btn btn-warning btn-flat' title='Edit' tooltip='Edit' data-original-title='Edit' onClick='Edit($ID)'><i class='fa fa-pencil'></i></a>
	<a href='#' type='button' class='btn btn-danger btn-flat' title='Delete' tooltip='Delete' data-original-title='Delete' onClick='Delete($ID)'><i class='fa fa-trash-o'></i></a></td>");
	echo("</tr>");
	$Sno++;
}
?>