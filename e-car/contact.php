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
  <div id="new2" align="center">
    <div id="he2" class="heading_bg1" align="center">
		<h2>Contact us Info.</h2>
    </div>
     <div id="cont">
    
     	<font color="#9900FF" style="text-shadow:#009 2px 2px 2px; text-decoration:underline" size="+3">Balvant Patel </font>
     
     <font color="#660066">
     	<br><br>
        Contact No. &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; 9726068732<br>
        Mail	&nbsp;&nbsp;&nbsp;&nbsp;	:&nbsp;&nbsp;&nbsp; patelbalvant123@gmail.com</font>
		<br><br><br>
	<font color="#9900FF" style="text-shadow:#009 2px 2px 2px; text-decoration:underline" size="+3">Ravindra Patel </font>
     
     <font color="#660066">
     	<br><br>
        Contact No. &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; 9016431622<br>
        Mail	&nbsp;&nbsp;&nbsp;&nbsp;	:&nbsp;&nbsp;&nbsp; patelravi4455@gmail.com

     </font> </div>
     <div id="cont1">
      <marquee direction="up" scrollamount="4">
      <?php
	  	$q="select * from car";
		$r=mysql_query($q);
		while($row=mysql_fetch_array($r))
		{ ?>
			<img src="<?php echo $row[1]; ?>" height="270" width="450"><br>
		<?php }
      ?>
     </marquee></div>
    
      <!-- tab panes -->

 <!-- END prod wrapper -->
</div>
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