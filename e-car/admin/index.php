<?php
	session_start();
	include('conn.php');
	$nm="";
	if(isset($_SESSION['name']))
	{
		$nm=$_SESSION['name'];
	}
?>

<!DOCTYPE HTML>
<head>
<title>E-car</title>
<meta charset="utf-8">
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">
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
<div class="header">
  <div id="site_title"><a href="index.php"><img src="../carlogo/e_car.png" alt=""width="168" height="65" ></a></div>
  <!-- Main Menu -->
</div>
<!-- END header -->

<div id="container" align="center">
<form action="logincode.php" method="post">
  <!-- tab panes --><table border="2" align="center">
  <tr>
    <td  id="m"><center>User Name :</center></td>
    <td  id="m"><input type="text" name="txtname" style="border:ridge" placeholder="User Name"></td>
  </tr>
    <tr>
    <td  id="m"><center>Password :</center></td>
    <td  id="m"><input type="password" name="txtpass" style="border:ridge" placeholder="Password"></td>
  </tr>
  <tr>
    <td  id="m" colspan="2"><center><input type="submit" name="login" value="Login" style="border-radius:5px" id="button"></center></td>
  </tr>
</table></form></div>
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