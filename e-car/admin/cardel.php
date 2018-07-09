<?php
	include('conn.php');
	$carid=$_REQUEST['id'];
	//echo $carid;
	$q="delete from car where car_id='$carid'";
	$result=mysql_query($q);
	if($result)
	{
		header("location:viewcar.php");
	}
	else{
		header("location:viewcar.php");
	}
?>