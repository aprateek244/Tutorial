<?php
	require_once("connection.php");
	$CategoryName=$_POST["CategoryName"];
	$CategoryDescription=$_POST["CategoryDescription"];
	$StatusID=$_POST["StatusID"];
$IQ="Insert into category(CategoryName,CategoryDescription,StatusID)values('$CategoryName','$CategoryDescription','$StatusID')";
$R=mysqli_query($CN,$IQ);
if($R)
{
	$Message="Saved Successfully";
}
else
{
	$Message="server error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response);
?>