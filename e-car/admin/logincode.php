<?php
	session_start();
	include('conn.php');

	if(isset($_POST['login']))
	{
		$name=$_POST['txtname'];
		$pass=$_POST['txtpass'];
		$c=0;
		$query="select * from admin where admin_id='$name' and password='$pass'";
		$result=mysql_query($query);
		$c=mysql_num_rows($result);
		if(!$c)
			header("Location:index.php");
		else{
			$_SESSION['name']=$name;
			header("Location:addnewcomp.php");
		}
	}
?>