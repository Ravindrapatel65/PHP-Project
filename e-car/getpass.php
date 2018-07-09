<?php
	session_start();
	include('conn.php');
	$nm="";
	if(isset($_SESSION['uname']))
	{
		$nm=$_SESSION['uname'];
	}
	include('header.php');
?>

<!DOCTYPE HTML>
<head>
<title>E-car</title>
<meta charset="utf-8">
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<!-- Contact Form -->
<link href="contact-form/css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="contact-form/css/uniform.css" media="screen" rel="stylesheet" type="text/css">
<!-- JS Files -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="js/jquery.tools.min.js"></script>
<script>
$(function () {
    $("#prod_nav ul").tabs("#panes > div", {
        effect: 'fade',
        fadeOutSpeed: 400
    });
});
</script>
<script>
$(document).ready(function () {
    $(".pane-list li").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });
});
</script>
</head>
<body>
<div id="container" align="center">
<form method="post">
  <!-- tab panes --><table border="2" align="center">
  <tr>
    <td><center>Enter Password :</center></td>
    <td><input type="text" name="txtpass" style="border:ridge" placeholder="Enter New Password"></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" value="Click Here" name="pass" style="border-radius:5px" id="button"></center></td>
  </tr>
 <?php
 $unm=$_SESSION['username'];
		//echo $unm;
	if(isset($_POST['pass']))
	{
		
		$pass=$_POST['txtpass'];
		
		$c=0;
		$q="update user set password='$pass' where user_name='$unm'";
		$r=mysql_query($q);
		/*$c=mysql_num_rows($r);*/
		if(!$r)
		{
			//echo "sryr";
			echo "<script language='javascript'> alert('Enter valide User Name....');</script>";
			
		}
		else{
			header("location:login.php");
		}
	}
?>
</table>
</form></div>
 <!-- END prod wrapper -->

  <div style="clear:both"></div>
  <div style="clear:both; height: 40px"></div>

<!-- END container -->
<div id="footer" align="right">
  <!-- First Column --><!-- Second Column --><!-- Third Column --><!-- Fourth Column -->
  
    <h3>Socialize</h3>
     <img src="img/icon_fb.png" alt=""> <img src="img/icon_twitter.png" alt=""> <img src="img/icon_in.png" alt=""> 
</div>
</div>
<!-- END footer -->
</body>
</html>