<?php
	session_start();
	include('conn.php');
	$car=$_REQUEST['cid'];
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
  <div id="new2"  align="center">
    <div id="he1" class="heading_bg1">
		<h2>View Upcoming Car Info.</h2>
    </div>
     
      <!-- tab panes --><table border="0" align="center" width="250px">
   <tr id="m">
    <td>Car_Image</td>
    <td >Company</td>
    <td>Car Model</td>
    <!--<td>Cc</td>-->
    <td>Fuel</td>
    <td>Seating Capacity</td>
    <!--<td><font style="font-weight:bolder">Ac</font></td>-->
    <td>Alloy Wheel</td>
    <td>Tubeless Tyres</td>
    <td>Avg_km</td>
    <td>Amount</td>
  </tr>
  
  
<?php
	
		//echo "xfhxf".$h."=".$l;
		$q="select * from upcoming_car where ucar_id='$car'";
		$re=mysql_query($q);
		while($r=mysql_fetch_array($re))
		{
			$cimg="admin/".$r[1];
	 ?>
      <tr>  
     <td><img src="<?php echo $cimg; ?>" width="100" height="80"></td>
     <?php /*?><?php
	 	$c=$r[11];
	 	//$q1="select * from upcoming_car where com_id='$c'";
		$r1=mysql_query($q1);
		while($r2=mysql_fetch_array($r1))
		{
			$com=$r2[2];
			//echo $com;	
		}
	 ?><?php */?>
    
    <td><?php echo $r[2]; ?></td>
    <td><?php echo $r[3]; ?></td>
    <td><?php echo $r[5]; ?></td>
    <td><?php echo $r[7]; ?></td>
    <td><?php echo $r[8]; ?></td>
    <td><?php echo $r[9]; ?></td>
    <td><?php echo $r[10]; ?></td>
    <td><?php echo $r[11]; ?></td>
    <!--<td><a href="editupcar.php?id=<?php echo $row[0]; ?>">Edit</a>&nbsp;&nbsp;<a href="cardel.php?id=<?php echo $row[0]; ?>">Delete</a></td>--></tr>
    <?php
    }
	?>
  
</table>
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