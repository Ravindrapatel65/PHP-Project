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
  <div id="new1"  align="center">
    <div id="he1" class="heading_bg1">
		<h2>View Car Info.</h2>
    </div>
     <form action="#"  method="post">
      <!-- tab panes --><table border="0" align="center">
   <tr id="m">
    <td>Car_Image</td>
    <td>Company</td>
    <td>Car_Model</td>
    <td>Car_Price</td>
    <td>Action</td>
  </tr>
  
  
  <?php
/*  if(isset($_POST['comp']))
  {
	   
*///  echo $comp;

  	$query="select * from use_car where user_name='$nm'";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		?>
      <tr>  
     <td><img src="<?php echo $row[5]; ?>" width="100" height="80"></td>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[13]; ?></td>
    <td><!--<a href="editupcar.php?id=">Edit</a>-->&nbsp;&nbsp;<a href="cardel.php?id=<?php echo $row[0]; ?>">Delete</a></td></tr>
    <?php
    }
// }
	?>
  
</table></form>
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