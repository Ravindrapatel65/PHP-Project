<?php
	include('conn.php');
	$cid=$_REQUEST['id'];
	//echo $carid;
	$q="delete from car_company where com_id='$cid'";
	$result=mysql_query($q);
	if($result)
	{
		header("location:viewcomp.php");
	}
	else{
		header("location:viewcomp.php");
	}
?>