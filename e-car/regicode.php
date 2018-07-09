<?php
	include('conn.php');

	if(isset($_POST['regi']))
	{
		$name=$_POST['txtname'];
		$uname=$_POST['txtusername'];
		$pass=$_POST['txtpass'];
		$add=$_POST['txtadd'];
		$email=$_POST['txtemail'];
		$cont=$_POST['txtcontact'];
		
		$query="INSERT INTO user(`name`, `user_name`, `password`, `address`, `email_id`, `contact_no`) VALUES('$name', '$uname', '$pass', '$add', '$email', $cont)";
		
		//$c=0;
		$result=mysql_query($query);
		//$c=mysql_affected_rows($result) or die("count error");
		if($result==true)
			header("Location:login.php");
		else
			header("Location:registration.php");		
	}
?>