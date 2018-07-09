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
<!--<center> </center>
-->  <!-- tab panes -->
<div id="he" class="heading_bg">
		<h2>Buy Cars</h2>
  </div>

  <div class="portfolio-container" id="columns">
    <ul>
    <?php 
		$q="select * from use_car";
		$r=mysql_query($q);
		while($row=mysql_fetch_array($r))
		{ 
		?>
      <li class="one-fourth web">
        <p> <a title="Caption Text" href="cardetail.php?id=<?php echo $row[0]; ?>" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="<?php echo $row[5]; ?>" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#"><?php echo "Car Model :  ".$row[2]; ?></a></h4>
        <p> <?php echo "Price  : ".$row[13]; ?></p>
      </li>
      <?php  } ?>
      </ul>
     <!-- <li class="one-fourth logos">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Logo Design</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth video">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Watch Video</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth web">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Wordpress Master</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth logos">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Endless Logo Design</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth web">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Worpdress Widgets</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth web">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Magento Development</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth web">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Joomla Shopping</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth branding">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">T-Shirts Designs</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth video">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Youtube Video</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth branding">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Brand Everything</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>
      <li class="one-fourth video">
        <p> <a title="" href="img/demo/slide_2.jpg" class="portfolio-item-preview" data-rel="prettyPhoto"><img src="img/portfolio/portfolio-img-01.jpg" alt="" width="210" height="145" class="portfolio-img pretty-box"></a></p>
        <h4><a href="#">Another Video</a></h4>
        <p> Lorem ipsum dolor sit amet, tollite fit manibus individuationis omnibus civitas ad quia. </p>
      </li>-->
    
    <!--END ul-->
  </div>
  <!-- END prod wrapper -->
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