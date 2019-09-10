<?php
session_start();
require_once("connection.php");


	$Phone=$_POST["Phone"];
	$Password=$_POST["Password"];
	

	$LQ="select * from usermaster where Phone='$Phone' and Password='$Password' and StatusID=0";

	$Table=mysqli_query($CN,$LQ);

	if(mysqli_affected_rows($CN)>0)
	{
		$Status=1;
		$Row= mysqli_fetch_array($Table);
		$_SESSION["UserID"]=$Row['ID'];
		$_SESSION["FullName"]=$Row['FullName'];
		$_SESSION["RegDateTime"]=$Row['RegDateTime'];
		$_SESSION["Phone"]=$Row['Phone'];
		
		
	}
	else
	{
		$Status=0;
	}
	$Response[]=array("Status"=>$Status);
	echo(json_encode($Response));
?>