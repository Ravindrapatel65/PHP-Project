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
<script type="text/javascript" language="javascript" src="validation/validation.js"></script>

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
		<h2>Upload new Company</h2>
    </div>


   <form action="#" class="" method="post" enctype="multipart/form-data" name="comp_upload">
      <!-- tab panes --><table border="1" align="center">
   <tr>
    <td id="m">Uploade Logo:</td>
    <td><input type="file" name="complogo" style="border-radius:5px">
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
		//$path="admin/".$folder.$logo;
	}
	?>
    <?php
	if(isset($_POST['comp']))
	{
		//echo $path;
		$cname=$_POST['txtcomp'];
		$q="INSERT INTO car_company(`comp_logo`, `com_name`) VALUES ('$path','$cname')";
		$result=mysql_query($q);
		if($result==true)
		{
			echo "Company Inserted Successfully...";
			header("Location:addnewcomp.php");	
		}
		else
					echo "Try Again....";
	}
?>
	
    </td>
    
  </tr>
  <tr>
    <td id="m">Company_Name:</td>
    <td><input type="text" name="txtcomp" style="border:ridge" placeholder="Company Name"></td>
  </tr>
    
  <tr>
    <td  id="m"></td><td><center><input type="submit" value="Upload" style="border-radius:5px" name="comp" id="button" onClick=" return upload_comp();"></center></td>
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