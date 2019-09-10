<?php
	require_once("connection.php");

$ID=$_POST['ID'];
$UpdateQuery="delete from post where ID=$ID";
$R=mysqli_query($CN,$UpdateQuery);
if($R)
{
	$Message="Deleted";
}
else
{
	$Message="server error";
}
$Response[]=array("Message"=>$Message);
echo json_encode($Response);
?>

