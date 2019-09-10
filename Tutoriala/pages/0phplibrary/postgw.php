	<?php
	require_once("1core/connection.php");
	$Title=$_POST["PostTitle"];
	$Description=$_POST["PostDescription"];
	$Category=$_POST["Category"];
	$Keywords=$_POST["Keywords"];
	$PostDate=$_POST["PostDate"];
	$Thumbnail2=$_POST["Thumbnail2"];
	$StatusID=$_POST["StatusID"];
	$filename=$_FILES['F1']['name'];
	$tmp=$_FILES['F1']['tmp_name'];
	
	$IQ="Insert into post(PostTitle,PostDescription,Category,Keywords,PostDate,Thumbnail,StatusID)values('$Title','$Description','$Category','$Keywords','$PostDate','$Thumbnail2','$StatusID')";
	$R=mysqli_query($CN,$IQ);
	
	if($R)
	{
		
		$ID=mysqli_insert_id($CN);
		$ImgName=$ID.".jpg";
		
		$UQ="update post set Thumbnail='$ImgName' where ID=$ID";
		mysqli_query($CN,$UQ);
		$location="../../upload/".$ImgName;              

		move_uploaded_file($tmp,$location);
		$Message="Saved Successfully";
		
	}
	else
	{
	$Message="server error";
	}
	$Response[]=array("Message"=>$Message);
	echo json_encode($Response);
	?>
	
