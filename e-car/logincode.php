<?php
	session_start();
	include('conn.php');

	if(isset($_POST['login']))
	{
		$name=$_POST['txtname'];
		$pass=$_POST['txtpass'];
		$c=0;
		$query="select * from user where user_name='$name' and password='$pass'";
		$result=mysql_query($query);
		$c=mysql_num_rows($result);
		if(!$c)
			header("Location:login.php");
		else{
			$_SESSION['uname']=$name;
			header("Location:index.php");		
		}
	}
?>