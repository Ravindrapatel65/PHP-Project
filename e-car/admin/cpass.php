<?php
	session_start();
	include('conn.php');
	$nm="";
	if(isset($_SESSION['name']))
	{
		$nm=$_SESSION['name'];
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
<form  method="post">
  <!-- tab panes --><table align="center" style="border:1px solid #000; border-radius:5px">
    <tr><td id="m">Old Passsword </td><td id="m"><input type="text" name="op" value="" /></td></tr>
    <tr><td id="m">New Passsword </td><td id="m"><input type="text" name="np1" /></td></tr>
    <tr><td id="m">Confirm Passsword  </td><td id="m"><input type="text" name="np2" />
    <?php //if(isset($_REQUEST['err'])) { echo $err; } ?>
    </td></tr>
 </table>  
 <center> <input type="submit" name="cpass" id="button" value="Change Password" /> </center>
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
<?php
      if(isset($_POST['cpass']))
{
	$p1=$_POST['np1'];
	$p2=$_POST['np2'];
	  $pr = mysql_query("select * from admin where admin_id='$nm'");
			      $p = mysql_fetch_array($pr);
	
	
	if($_POST['op'] == "" || $_POST['np1'] == "" || $_POST['np2'] == "")
	{
	     echo "<script>window.alert('Please Enter all Required Values'); </script>";	
	}
	else if($_POST['op'] != $p['password'])
	{
		 echo "<script>window.alert('Enter Valid Password'); </script>";
	}
	else if($p1 != $p2)
	{
		
		echo "<script>window.alert('Password Dosen't match'); </script>";	
	}
	else
	{
	    $cp = mysql_query("update admin set password = '".$_POST['np1']."' where admin_id='$nm'");
		echo "<script>window.alert('Your Password has been successfully changed'); </script>";
		echo "<script>window.location.href='addnewcomp.php'; </script>";	
	}
           
}

?>