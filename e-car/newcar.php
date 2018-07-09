<?php     
	session_start();
	include('conn.php');
	$com=$_REQUEST['id'];
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
<div id="container">
 <div id="he" class="heading_bg" align="center">
		<h2>New Car Detail</h2>
  </div>

  <!-- tab panes -->
  <div id="prod_wrapper">
    <div id="panes">
    <?php 
		$q="select * from car where com_id='$com'";
		$r=mysql_query($q);
			
		while($row=mysql_fetch_array($r))
		{
			
			$img="admin/".$row[1];
	?>
      <div> <img src="<?php echo $img; ?>" height="350" width="500" alt="">
        <table><tr><td colspan="2"><center><font style="font-style:italic" size="+2"><?php echo $row[2]; ?></font></center></td></tr>
        <tr>
       <td> <?php echo "Cc     		  :  ". $row[3]; ?></td>
        <td><?php echo "Fuel    		  :  ". $row[4]; ?></td></tr>
        <tr><td><?php echo "Seating Capacity :  ". $row[5]; ?></td>
        <td><?php echo "Air-Conditioner  :  ". $row[6]; ?></td></tr>
        <tr><td><?php echo "Alloy Wheel      :  ". $row[7]; ?></td>
        <td><?php echo "Tubeless Tyre    :  ". $row[8]; ?></td></tr>
       <tr> <td><?php echo "Avrege km        :  ". $row[9]; ?></td>
        <td><?php echo "Amount           :  ". $row[10]; ?></td></tr></table>
        
      </div>
      <?php } ?>
    </div>
    <!-- END tab panes -->
    <br clear="all">
    <!-- navigator -->
    <div id="prod_nav">
    <ul>
	<?php 
		$q="select * from car where com_id='$com'";
		$r=mysql_query($q);
		while($row=mysql_fetch_array($r))
		{
			$img="admin/".$row[1];
	?>
      
        <li><a href=""><img src="<?php echo $img; ?>" width="160" height="120" alt=""><strong><?php echo $row[2];?></strong><?php echo $row[10]; ?></a></li>
        <?php  } ?>
      </ul>
    </div>
    <!-- END navigator -->
  </div>
  <!-- END prod wrapper -->
  <div style="clear:both"></div>
  <div style="clear:both"></div>
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