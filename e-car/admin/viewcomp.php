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
  <div id="new2" class="one-half" align="center">
    <div id="he4" class="heading_bg">
		<h2>View Company Info.</h2>
    </div>
    <div class="portfolio-container1" id="columns">
    <ul>
    <?php 
		$q="select * from car_company";
			$result=mysql_query($q);
			while($r=mysql_fetch_array($result))
			{
		?>
      <li class="one-fourth1 web">
        <p> <img src="<?php echo $r[1]; ?>" alt="" width="100" height="90" class="portfolio-img pretty-box"></p>
        <h4><?php echo $r[2]; ?></h4>
       
        <p><a href="compedit.php?id=<?php echo $r[0]; ?>">Edit</a>&nbsp;&nbsp;<a href="compdel.php?id=<?php echo $r[0]; ?>">Delete</a></p>
      </li>
      <?php  } ?>
      </ul>
      </div>
   
</div>
 <!-- END prod wrapper -->

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