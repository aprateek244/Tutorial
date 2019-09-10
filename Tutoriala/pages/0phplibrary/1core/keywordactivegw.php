<?php
	require_once("connection.php");

$ID=$_POST['ID'];
$UpdateQuery="Update keywords set StatusID=1 where ID='$ID'";
$R=mysqli_query($CN,$UpdateQuery);
if($R)
{
	$Message="Activated";
}
else
{
	$Message="server error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response);
?>

