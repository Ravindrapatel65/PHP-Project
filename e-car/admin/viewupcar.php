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
  <div id="new2" align="center">
    <div id="he" class="heading_bg1">
		<h2>View Car Info.</h2>
    </div>
    
      <!-- tab panes -->
  <div class="portfolio-container" id="columns">
    <ul>
    <?php 
		$q="select * from upcoming_car";
			$result=mysql_query($q);
			while($row=mysql_fetch_array($result))
			{  
		?>
      <li class="one-fourth web">
        <p> <a title="Caption Text" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="<?php echo $row[1]; ?>" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><?php echo $row[2]; ?></h4>
        <p> <?php echo $row[3]; ?></p>
        <p><a href="upcaredit.php?id=<?php echo $row[0]; ?>">Edit</a>&nbsp;&nbsp;<a href="upcardel.php?id=<?php echo $row[0]; ?>">Delete</a></p>
      </li>
      <?php  } ?>
      </ul>
      </div>
      
  <!--<div id="prod_wrapper">
	<div id="prod_nav_1">
      <ul>
     <?php /*?><?php
	 		$q="select * from upcoming_car";
			$result=mysql_query($q);
			while($row=mysql_fetch_array($result))
			{ 
				
	 	?>
     
        <li><img src="<?php echo $row[1]; ?>" width="120" height="100" alt=""><?php   echo "<br>"  .ucwords($row[2]). "<br>"  . $row[3]; ?>
        <br><a href="upcaredit.php?id=<?php echo $row[0]; ?>">Edit</a>&nbsp;&nbsp;<a href="upcardel.php?id=<?php echo $row[0]; ?>">Delete</a>
        <br></li>
		<?php } ?><?php */?>
        
      </ul>
    </div></div>-->
 <?php /*?><?php
  	
	$r=mysql_query($q);
	while($row=mysql_fetch_array($r))
	{
		?>
        
     <td><img src="<?php echo $row[1]; ?>" width="100" height="80"><?php echo $row[2]; ?><?php echo $row[11]; ?></td>
   
    <td><a href="upcaredit.php?id=<?php echo $row[0]; ?>">Edit</a>&nbsp;&nbsp;<a href="upcardel.php?id=<?php echo $row[0]; ?>">Delete</a>
    </td>
    <?php
    }
	?><?php */?>
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