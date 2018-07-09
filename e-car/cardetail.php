<?php
	session_start();
	include('conn.php');
	$nm="";
	$carid=$_REQUEST['id'];
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
		<h2>Buy Car Detail</h2>
  </div>

  <!-- tab panes -->
  <div class="portfolio-container" id="columns">
   <?php  //echo $carid;
   		$q="select * from use_car where uc_id='$carid'";
		$r=mysql_query($q);
		while($row=mysql_fetch_array($r))
		{
    ?>
    <div  id="td1">
    	<img src="<?php echo $row[5]; ?>" height="250px" width="400px" >
        <br><br><br><br>
        <table >
        	<tr>
            	<td colspan="2"><center><font color="#004A00"  style="font-style:italic; font-weight:bold;text-shadow:#306 2px 2px 2px;" size="+2">Car owner Information</font></center></td>
            </tr>
            <?php
			$uname=$row[14];
			//echo $uname;
				$qu="select * from user where user_name='$uname'";
				$result1=mysql_query($qu);
				while($r1=mysql_fetch_array($result1))
				{
			?>
            <tr>
            	<td id="m">Name :</td>
                <td id="m1"><?php echo $r1[0]; ?></td>
            </tr>
            <tr>
            	<td id="m">Email id :</td>
                <td id="m1"><?php echo $r1[4]; ?></td>
            </tr>
            <tr>
            	<td id="m">Contact No. :</td>
                <td id="m1"><?php echo $r1[5]; ?></td>
            </tr>
            <?php  } ?>
           </table>
        </div>
        <div id="td"><table >
       		 <tr>
            	<td colspan="2"><center><font color="#004A00"  style="font-style:italic; font-weight:bold;text-shadow:#306 2px 2px 2px;" size="+2">Car Information</font></center></td>
                
            </tr>
        	<tr>
            	<td id="m">Company Name :</td>
                <td id="m1"><?php echo $row[1]; ?></td>
            </tr>
            <tr>
            	<td id="m">Car Name :</td>
                <td id="m1"><?php echo $row[2]; ?></td>
            </tr>
            <tr>
            	<td id="m">Model Year :</td>
                <td id="m1"><?php echo $row[3]; ?></td>
            </tr>
            <tr>
            	<td id="m">km Driven :</td>
                <td id="m1"><?php echo $row[4]; ?></td>
            </tr>
            <tr>
            	<td id="m">Fuel :</td>
                <td id="m1"><?php echo $row[6]; ?></td>
            </tr>
            <tr>
            	<td id="m">State :</td>
                <td id="m1"><?php echo $row[7]; ?></td>
            </tr>
            <tr>
            	<td id="m">City :</td>
                <td id="m1"><?php echo $row[8]; ?></td>
            </tr>
            <tr>
            	<td id="m">RTO No. :</td>
                <td id="m1"><?php echo $row[9]; ?></td>
            </tr>
            <tr>
            	<td id="m">RTO Office :</td>
                <td id="m1"><?php echo $row[10]; ?></td>
            </tr>
            <tr>
            	<td id="m">Insurance :</td>
                <td id="m1"><?php echo $row[11]; ?></td>
            </tr>
            <tr>
            	<td id="m">Discription :</td>
                <td width="70px" id="m1"><?php echo $row[12]; ?></td>
            </tr>
            <tr>
            	<td id="m">Amount :</td>
                <td id="m1"><?php echo $row[13]; ?></td>
            </tr>
            
        </table></div>
        <?php  } ?>
        
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
     <a href="#"><img src="img/icon_fb.png" alt=""></a> <a href="#"><img src="img/icon_twitter.png" alt=""></a><a href="#"> <img src="img/icon_in.png" alt=""></a> 
</div>
</div>
<!-- END footer -->
</body>
</html>