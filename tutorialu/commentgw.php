<?php
	require_once("connection.php");
	$Name=$_POST["Name"];
	$Email=$_POST["Email"];
	$Message=$_POST["Message"];
	$StatusID=$_POST["StatusID"];
$IQ="Insert into comment(Name,Email,Message,StatusID)values('$Name','$Email','$Message','$StatusID')";
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