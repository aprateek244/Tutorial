<?php
	$CN=mysqli_connect("localhost","root","");
	if(!$CN)
	{
		echo("server error");
	}
	$DB=mysqli_select_db($CN,"tutorial");
if(!$DB)
{
	echo("server error");
}
?>
