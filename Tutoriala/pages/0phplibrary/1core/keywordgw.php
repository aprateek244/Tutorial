<?php
	require_once("connection.php");
	$Keywords=$_POST["Keywords"];
	$Category=$_POST["Category"];
$StatusID=$_POST["StatusID"];
$IQ="Insert into keywords(Keywords,Category,StatusID)values('$Keywords','$Category','$StatusID')";
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
