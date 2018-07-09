<?php
	session_start();
	include('conn.php');
	$nm="";
	if(isset($_SESSION['name']))
	{
		$nm=$_SESSION['name'];
	}
	 $co=$_REQUEST['id']; 
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
  <div id="new" class="one-half" align="center">
    <div class="heading_bg">
		<h2>Update Company</h2>
    </div>


   <form action="#" class="TTWForm" method="post" enctype="multipart/form-data">
  <?php 
		$query="select * from car_company where com_id='$co'";
		$r=mysql_query($query);
		while($row=mysql_fetch_array($r))
		{
			?>
      <!-- tab panes --><table border="1" align="center">
   <tr>
    <td id="m">Upload Logo: </td>
    <td><input type="file" name="complogo" style="border-radius:5px">
    	<img src="<?php echo $row[1]; ?>" height="100px" width="100px" >
        <?php
	if(isset($_FILES['complogo']))
	{
		$folder="logo/";
		$logo=$_FILES['complogo']['name'];
		$logotmp=$_FILES['complogo']['tmp_name'];
		if(move_uploaded_file($logotmp,'logo/'.$logo))
		{
			$path=$folder.$logo;
			?>
            <img src="<?php echo $path ?>" height="100px" width="100px" >
            <?php
		}
	}
	?>
    <?php
	if(isset($_POST['update']))
	{
		$comid=$row[0];
		$cname=$_POST['txtcomp'];
		$q="update car_company set comp_logo='$path',com_name='$cname' where com_id='$comid'";
		$result=mysql_query($q) or die("rrrrr");
		if($result==true)
		{
			echo "Company Updated Successfully...";	
			header("Location:compedit.php?id=$co");
		}
		else
					echo "Try Again....";
	}
?>
	
    </td>
    
  </tr>
  <tr>
    <td id="m">Company_Name:</td>
    <td><input type="text" name="txtcomp" value="<?php echo $row[2]; ?>"></td>
  </tr>
    <?php  } ?>
  <tr>
    <td id="m"></td><td><center><input type="submit" value="Update" style="border-radius:5px" name="update" id="button"></center></td>
  </tr>
  
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
<?php
	
?>