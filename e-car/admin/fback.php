<?php
	include('conn.php');
	$id=$_REQUEST['id'];
	//echo $carid;
	$q="delete from feedback where feedback_id='$id'";
	$result=mysql_query($q);
	if($result)
	{
		header("location:viewfeedback.php");
	}
	else{
		header("location:viewfeedback.php");
	}
?>