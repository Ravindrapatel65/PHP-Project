<?php
	include('conn.php');
	$carid=$_REQUEST['id'];
	//echo $carid;
	$q="delete from use_car where uc_id='$carid'";
	$result=mysql_query($q);
	if($result)
	{
		header("location:viewcar.php");
	}
	else{
		header("location:viewcar.php");
	}
?>