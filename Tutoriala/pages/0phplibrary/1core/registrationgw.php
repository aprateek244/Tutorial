<?php
	require_once("connection.php");
	$FullName=$_POST["FullName"];
$Email=$_POST["Email"];
$Phone=$_POST["Phone"];

	$Password=$_POST["Password"];
	$StatusID=$_POST["StatusID"];
$IQ="Insert into usermaster(FullName,Email,Phone,Password,StatusID)values('$FullName','$Email','$Phone','$Password','$StatusID')";
$R=mysqli_query($CN,$IQ);
if($R)
{
	$Message="Registration Complete";
}
else
{
	$Message="server error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response);
?>