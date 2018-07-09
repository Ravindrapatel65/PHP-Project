<?php
	include('conn.php');
	$carid=$_REQUEST['id'];
	//echo $carid;
	$q="delete from upcoming_car where ucar_id='$carid'";
	$result=mysql_query($q);
	if($result)
	{
		header("location:viewupcar.php");
	}
	else{
		header("location:viewupcar.php");
	}
?>