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
<img src="<?php echo $path ?>" height="70px" width="90px" >
<div id="container" align="center">
  <div id="new" class="one-half" align="center">
    <div class="heading_bg">
		<h2>Upload Upcoming Car</h2>
    </div>
 		<form action="#" class="TTWForm" method="post" enctype="multipart/form-data" name="car_upcoming">  
        Select Comapny : &nbsp;&nbsp;<select name="company">
       		<option value=0>--Select Company--</option>
         	 <?php
				$query="select * from car_company";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{
                    ?><option value="<?php echo $row['com_id']; ?>"><?php echo $row['com_name']; ?></option> <?php
				}
				?>
			</select>
      <!-- tab panes --><table border="1" align="center">
   <tr>
    <td id="m">Uploade Image:</td>
    <td><input type="file" name="carimage" style="border-radius:5px">
        <?php
	if(isset($_FILES['carimage']))
	{
		$folder="cars/";
		$logo=$_FILES['carimage']['name'];
		$logotmp=$_FILES['carimage']['tmp_name'];
		$path=$folder.$logo;
		if(move_uploaded_file($logotmp,'cars/'.$logo))
		{
			?>
        <?php
		}
	}
	if(isset($_POST['addcar']))
	{
		$carimg=$path;
		$c=$_POST['company'];
		
		$q1="select * from car_company where com_id='$c'";
		$r1=mysql_query($q1);
		while($row1=mysql_fetch_array($r1))
		{
			$c_name=$row1[2];	
		}
		//echo $c_name;	
		$model=$_POST['txtmodel'];
		$cc=$_POST['txtcc'];
		
		$fuel=$_POST['fuel'];
		$seating=$_POST['txtseating'];
		
		$ac=$_POST['ac'];
		$wheel=$_POST['wheel'];
		$tyre=$_POST['tyre'];
		$avkm=$_POST['txtavg'];
		$amount=$_POST['txtamount'];
		
		$com_id=$_POST['company'];
		
		$q="insert into upcoming_car(car_photo,com_name,car_model,cc,fuel,seating_capacity,air_conditioner,alloy_wheel,tubeless_tyres,avg_km,amount)values('$carimg','$c_name','$model',$cc,'$fuel',$seating,'$ac','$wheel','$tyre',$avkm,$amount)";
		
		
		$result=mysql_query($q) or die("query proble");
		//echo $com_id.$carimg;
		
		if($result==true)
		{
			echo "Uploade successfully ....";
			/*echo "<script language='javascript'>alert('Inserted Successfully..');</script>";*/
			//header("Location:addupcar.php");
		}
		else
					echo "Try Again....";
		
	}
?>
    </td>
    
  </tr>
  <tr>
    <td id="m">Car Detail:</td>
    <td><input type="text" name="txtmodel" style="border:ridge" placeholder="Car model"></td>
  </tr>
    <tr>
      <td id="m">Displacement(cc):</td>
      <td><input type="text" name="txtcc" style="border:ridge" placeholder="cc"></td>
    </tr>
  <tr>
    <td id="m">Fuel:</td>
    <td><select name="fuel">
    		<option>--Select Fuel--</option>
            <option>Petrol</option>
            <option>Diesel</option>
            <option>CNG</option>
            </select></td>
  </tr>
  <tr>
    <td id="m">Seating Capacity:</td>
    <td><input type="text" name="txtseating" style="border:ridge" placeholder="Seating Capacity"></td>
  </tr>
   <tr>
    <td id="m">Air_Conditioner:</td>
    <td><input type="radio" name="ac" value="Automatic climate control" />automatic climate control
    <input type="radio" name="ac" value="Manual" checked />Manual</td>
  </tr>
   <tr>
    <td id="m">Alloy Wheel:</td>
    <td><input type="radio" name="wheel" value="Yes" />Yes
    <input type="radio" name="wheel" value="No" checked />No</td>
  </tr>
   <tr>
    <td id="m">Tubeless Tyres:</td>
    <td><input type="radio" name="tyre" value="Yes" />Yes
    <input type="radio" name="tyre" value="No" checked />No</td>
  </tr>
   <tr>
    <td id="m">Average_km:</td>
    <td><input type="text" name="txtavg" style="border:ridge" placeholder="Average kilo meter"></td>
  </tr>
   <tr>
    <td id="m">Amount:</td>
    <td><input type="text" name="txtamount" style="border:ridge" placeholder="Amount"></td>
  </tr>
  <tr>
    <td  id="m"></td><td><center><input type="submit" name="addcar" value="Upload" style="border-radius:5px" id="button" onClick=" return upcoming_car();"></center></td>
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
