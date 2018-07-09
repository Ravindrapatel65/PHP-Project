<?php
	session_start();
	include('conn.php');
	$nm="";
	if(isset($_SESSION['name']))
	{
		$nm=$_SESSION['name'];
	}
	include('header.php');
	$car=$_REQUEST['id'];
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
		<h2>Update Car</h2>
    </div>
   
 		<form action="#" class="TTWForm" method="post" enctype="multipart/form-data">  
        <?php 
			//echo "car=".$car; 
			$q="select * from upcoming_car where ucar_id='$car'";
			$result=mysql_query($q);
			while($r=mysql_fetch_array($result))
			{
				//echo $r[2];
		?>
         Select Company : &nbsp;&nbsp;<select name="company">
     <?php
	 			$com=$r[2];
				//echo $com;
				$query="select * from car_company";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{
					$co=$row[2];
					 ?>
                    <option  value="<?php echo $row[0]; ?>"><?php echo $row[2]; ?></option> <?php
					if($co==$com)
					{
						
                    ?>
                    <option selected="true" value="<?php echo $row[0]; ?>"><?php echo $row[2]; ?></option> <?php
					}
					
				}
				?>
     </select>
      <!-- tab panes --><table border="1" align="center">
   <tr>
    <td id="m">Uploade Image:</td>
    <td><input type="file" name="carimage" style="border-radius:5px">
    <?php $path=$r[1]; $img=$path; ?>
    <img src="<?php echo $r[1]; ?>" height="70px" width="90px" >
        <?php
		
	//	echo $path;
	if(isset($_FILES['carimage']))
	{
		$folder="cars/";
		$logo=$_FILES['carimage']['name'];
		$logotmp=$_FILES['carimage']['tmp_name'];
		$path=$folder.$logo;
		if(move_uploaded_file($logotmp,'cars/'.$logo))
		{
			$img=$path;
			?>
            <img src="<?php echo $path ?>" height="70px" width="90px" >
            <?php
		}
	}
	if(isset($_POST['update']))
	{
		$carimg=$img;
		$c=$_POST['company'];
		$q1="select * from car_company where com_id='$c'";
		$r1=mysql_query($q1);
		while($row1=mysql_fetch_array($r1))
		{
			$c_name=$row1[2];	
		}
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
		
		$q="update upcoming_car set car_photo='$carimg',com_name='$c_name',car_model='$model',cc='$cc',fuel='$fuel',seating_capacity='$seating',air_conditioner='$ac',alloy_wheel='$wheel',tubeless_tyres='$tyre',avg_km='$avkm',amount='$amount' where ucar_id='$car'";
		$result=mysql_query($q) or die("query proble");
		//echo $com_id.$carimg;
		
		if($result==true)
		{
			echo "Updated Successfully..";
			header("Location:upcaredit.php?id=$car");
		}
		else
					echo "Try Again....";
		
	}
?>
    </td>
    
  </tr>
  <tr>
    <td id="m">Car Detail:</td>
    <td><input type="text" name="txtmodel" value="<?php echo $r[3]; ?>" style="border:ridge"></td>
  </tr>
    <tr>
      <td id="m">Displacement(cc):</td>
      <td><input type="text" name="txtcc" style="border:ridge" value="<?php echo $r[4]; ?>"></td>
    </tr>
  <tr>
    <td id="m">Fuel:</td>
    <td>
<?php /*?>    <?php echo $r[5]; ?>
<?php */?>		
		<select name="fuel">
   		 <?php 
				$f=$r[5];
				if($f=="Petrol")
				{ ?>
					 <option selected>Petrol</option>
                     <option>Diesel</option>
            		 <option>CNG</option>
               <?php } 
			    else if($f=="Diesel")
				{  ?>
                	<option selected>Diesel</option>
                    <option>Petrol</option>
                    <option>CNG</option
               ><?php } 
			   else{ ?>
                    <option selected>CNG</option>
                    <option>Petrol</option>
            		<option>Diesel</option>
              <?php  } ?>
            </select></td>
  </tr>
  <tr>
    <td id="m">Seating Capacity:</td>
    <td><input type="text" name="txtseating" style="border:ridge" value="<?php echo $r[6]; ?>"></td>
  </tr>
   <tr>
    <td id="m">Air_Conditioner:</td>
    <td>
    <?php 
	$a=$r[7];
	if($a=="Automatic clima")
	{?>
    	<input type="radio" name="ac" checked="true" value="Automatic climate control" />automatic climate control
        <input type="radio" name="ac"  value="Manual" />Manual
    <?php }
	else{
		?> 
        <input type="radio" name="ac" value="Automatic climate control" />automatic climate control
    <input type="radio" name="ac" checked="true" value="Manual" />Manual
    <?php } ?>
    </td>
  </tr>
   <tr>
    <td id="m">Alloy Wheel:</td>
    <td>
    <?php 
	$b=$r[8];
	if($b=="Yes")
	{?>
    	<input type="radio" name="wheel" checked="true" value="Yes" />Yes
    <input type="radio" name="wheel" value="No" />No
    <?php }
	else{
		?> 
       <input type="radio" name="wheel"  value="Yes" />Yes
    <input type="radio" name="wheel" checked="true" value="No" />No
    <?php } ?>
    </td>
  </tr>
   <tr>
    <td id="m">Tubeless Tyres:</td>
    <td>
     <?php 
	$c=$r[9];
	if($c=="Yes")
	{?>
    	<input type="radio" name="tyre" checked="true" value="Yes" />Yes
    <input type="radio" name="tyre" value="No" />No
    <?php }
	else{
		?> 
       <input type="radio" name="tyre"  value="Yes" />Yes
    <input type="radio" name="tyre" checked="true" value="No" />No
    <?php } ?>
    </td>
  </tr>
   <tr>
    <td id="m">Average_km:</td>
    <td><input type="text" name="txtavg" style="border:ridge" value="<?php echo $r[10]; ?>"></td>
  </tr>
   <tr>
    <td id="m">Amount:</td>
    <td><input type="text" name="txtamount" style="border:ridge"value="<?php echo $r[11]; ?>"></td>
  </tr>
  <?php  } ?>
  <tr>
    <td  id="m"></td><td><center><input type="submit" name="update" value="Update" style="border-radius:5px" id="button"></center></td>
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
