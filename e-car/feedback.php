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

<link rel="stylesheet" type="text/css" href="css/gridNavigation.css">
<!--JS FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.gridnav.js"></script>
<script src="js/easing/jquery.easing.1.3.js"></script>
<script language="javascript" src="validation/validation.js"></script>
<script>
$(function () {
    $('#tj_container').gridnav({
        type: {
            mode: 'seqfade', // use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
            speed: 500, // for fade, seqfade, updown, sequpdown, showhide, disperse, rows
            easing: '', // for fade, seqfade, updown, sequpdown, showhide, disperse, rows	
            factor: 100, // for seqfade, sequpdown, rows
            reverse: '' // for sequpdown
        }
    });
});
</script>
</head>
<body>
<div id="container" align="center">
<div id="he2" class="heading_bg2">
		<h2>Feedback</h2>
  </div>
<form method="post" name="feedback">
<table align="center">
<tr>
<td id="m">Name :</td>
<td>  <input type="text" name="txtnm" placeholder="Enter Your Name"></td>
</tr>
<tr>
<td id="m">Contact No. : </td> <td>  <input type="text" name="txtcont" placeholder="Enter Your Contact no" onkeypress="return Isnum(event);"></td>
</tr>
<tr>
<td id="m">Email_id :</td> <td>  <input type="text" name="txtemail" placeholder="Enter Your Emailid"></td>
</tr>
<tr>
 <td id="m"> Description :</td> <td>
  <textarea name="fback" rows="5" placeholder="Enter your comments...."></textarea></td>
  </tr>
  <tr>
  <td id="m"></td>
 <td><center><input type="submit" name="post" value="Post" id="button" onClick="return feedback_validation();"></center></td>
 </tr>
 </table>
 </form>
      <!-- END prod wrapper -->
  </p>
  <div style="clear:both"></div>
  <div style="clear:both"></div>
  <div style="clear:both; height: 40px"></div>
</div>
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
	if(isset($_POST['post']))
	{
		$name=$_POST['txtnm'];
		$cont=$_POST['txtcont'];
		$email=$_POST['txtemail'];
		$des=$_POST['fback'];
		$q="insert into feedback(contactno,emailid,comment,user_name)values($cont,'$email','$des','$name')";
		$r=mysql_query($q);
		if($r)
		{
			echo "<script language='javascript'>alert('Post Successfull');</script>";
		}
		else{
			echo "Try Again";
		}
	}
?>