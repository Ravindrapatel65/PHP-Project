<?php
	session_start();
	include('conn.php');
	$cid=$_REQUEST['id'];
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
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	function getCity(stateId) {		
		var strURL="findCity.php?state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>

<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getcar(carId) {		
		
		var strURL="findcar.php?car="+carId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('cardiv').innerHTML=req.responseText;
						document.getElementById('verdiv').innerHTML='<select name="ver"  id="dd">'+
						'<option>Select Version</option>'+
				        '</select>';						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getver(carId,verId) {		
		var strURL="findver.php?car="+carId+"&ver="+verId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('verdiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>


</head>
<body>
<div id="container" align="center">
<div id="he" class="heading_bg">
		<h2>Update Car Information</h2>
  </div>
<form action="#" method="post" enctype="multipart/form-data">
  <!-- tab panes --> 
      <!-- tab panes --><table align="center" >
      <?php
	//  echo $cid;
	  		$q="select * from use_car where uc_id='$cid'";
			$rcar=mysql_query($q);
			while($row=mysql_fetch_array($rcar))
			{
      ?>
   <tr>
    <td>Uploade Image:</td>
    <td><input type="file" name="carimage" style="border-radius:5px">
    <?php $path=$row[5];  ?>
    <img src="<?php echo $path; ?>" height="70px" width="90px" >
        <?php
	//echo $path;
	$img=$path;
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
	}	 ?>
    </td>
    
  </tr>
  <tr>
    <td>Car Detail:</td>
    <td  width="150"><div id="dr"> <select name="company" id="dd" onChange="getcar(this.value)">
	 <?php
	 			$com=$row[1];
				
				$query="select * from car_company";
				$result=mysql_query($query);
				while($r=mysql_fetch_array($result))
				{
					$co=$r[2];
					if($co==$com)
					{
					$comid=$r[0];	
                    ?>
                    <option selected="true" value="<?php echo $r[0]; ?>"><?php echo $r[2]; ?></option> <?php
					}
					 ?>
                    <option  value="<?php echo $r[0]; ?>"><?php echo $r[2]; ?></option> <?php
				}
				?>
	</select>
   
    <div id="cardiv">
    <?php /*?><?php echo $comid; ?><?php */?>    
		<select name="car" id="dd">
    <?php
	 			$car=$row[2];
				
				$query1="select * from car where com_id='$comid'";
				$result1=mysql_query($query1);
				while($r1=mysql_fetch_array($result1))
				{
					$car1=$r1[2];
					 ?>
                    <option  value="<?php echo $r1[0]; ?>"><?php echo $r1[2]; ?></option> <?php
					if($car==$car1)
					{
						$carid=$r1[0];
                    ?>
                    <option selected="true" value="<?php echo $r1[0]; ?>"><?php echo $r1[2]; ?></option> <?php
					}
					
				}
				?>
	 
	</select>
    </div>
       
        </div></td>
  </tr>
    <tr>
    <td>Model Year:</td>
    <td><input type="text" name="txtyear" style="border:ridge" value="<?php echo $row[3]; ?>">
    </td>
  </tr>
  <tr>
    <td>Driven km:</td>
    <td><input type="text" name="txtdrivenkm" style="border:ridge" value="<?php echo $row[4]; ?>"></td>
  </tr>
  <tr>
    <td>Fuel:</td>
    <td><select name="fuel" id="dd">
   		 <?php 
				$f=$row[6];
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
    <td width="158">City : </td>
    <td  width="402">
   <?php /*?><?php echo $row[8]; ?><?php */?>
    <select name="state" id="dd" onchange="getCity(this.value)">
		<option>Select State</option>
		<?php 
			$st=$row[7];
			$q="select * from state";
			$result=mysql_query($q);
			while ($row1=mysql_fetch_array($result)) 
			{ 
				$s=$row1[1];
            	if($s==$st)
				{
				?>
				<option selected value=<?php echo $row1['id']?>><?php echo $row1['statename']?></option>
		<?php } ?>
        	<option value=<?php echo $row1['id']?>><?php echo $row1['statename']?></option>
            <?php  } ?>
	</select>
        &nbsp;&nbsp;
        <?php /*?><?php  echo $row[9]; ?><?php */?>
        <select name="city" id="citydiv" class="dd">
	<option>Select City</option>
    <?php 
			$ct=$row[8];
			$q="select * from city";
			$result=mysql_query($q);
			while ($row2=mysql_fetch_array($result)) 
			{ 
				$c=$row2[1];
            	if($c==$ct)
				{
				?>
				<option selected value=<?php echo $row2[0]?>><?php echo $row2[1]?></option>
		<?php } ?>
        	<option value=<?php echo $row2[0]?>><?php echo $row2[1]?></option>
            <?php  } ?>
        </select></td>
  </tr>
   <tr>
    <td>RTO No:</td>
    <td><input type="text" name="txtrtono" style="border:ridge" value="<?php echo $row[9]; ?>"></td>
  </tr>
   <tr>
    <td>RTO Office:</td>
    <td><input type="text" name="txtrtooffice" style="border:ridge" value="<?php echo $row[10]; ?>"></td>
  </tr>
   <tr>
    <td>Insurance:</td>
    <td>
    <?php 
		$in=$row[11];
		if($in=="yes")
		{
	 ?>
    <input type="radio" checked name="insurance" value="yes" />Yes
    <input type="radio" name="insurance" value="no" />No
    <?php } else{ ?>
    <input type="radio" name="insurance" value="yes" />Yes
    <input type="radio" checked name="insurance" value="no" />No
    <?php  } ?>
    </td>
  </tr>
   <tr>
    <td>Discription:</td>
    <td><textarea name="txtdis" id="txtdis" style="border:ridge"><?php echo $row[12]; ?></textarea></td>
  </tr>
   <tr>
    <td>Expected Price:</td>
    <td><input type="text" name="txtexprice" style="border:ridge" value="<?php echo $row[13]; ?>"></td>
  </tr>
  <?php  } ?>
  <tr>
    <td colspan="2"><center><input type="submit" name="Update" value="Update" style="border-radius:5px" id="button"></center></td>
  </tr>
</table>
<?php
	if(isset($_POST['Update']))
	{
		$c=$_POST['company'];
		echo $img;
		
		$q1="select * from car_company where com_id='$c'";
		$r1=mysql_query($q1);
		while($row1=mysql_fetch_array($r1))
		{
			$com1=$row1[2];	
		}
		echo $com1;
		
		$q2="select * from car where com_id='$c'";
		$r2=mysql_query($q2);
		while($row2=mysql_fetch_array($r2))
		{
			$car1=$row2[2];
		}
		//echo "<br><br>".$car1;

		$year=$_POST['txtyear'];
		$km=$_POST['txtdrivenkm'];
		$carimg=$img;
		$fuel=$_POST['fuel'];
		
		//echo "<br>".$year."<br>".$km."<br>".$carimg."<br>".$fuel;
		
		$state=$_POST['state'];
		

		$q3="select * from state where id='$state'";
		$r3=mysql_query($q3);
		while($row3=mysql_fetch_array($r3))
		{
			$s1=$row3[1];	
		}
		echo "<br>".$s1;
		
		$city=$_POST['city'];
		$q4="select city from city where id='$city'";
		$r4=mysql_query($q4) or die("srthdrthdrthdr");
		while($row4=mysql_fetch_array($r4))
		{
			$c1=$row4[0];	
		}
		echo "<br>".$c1;
		
		$rtono=$_POST['txtrtono'];
		$rtooff=$_POST['txtrtooffice'];
		$ins=$_POST['insurance'];
		$dis=$_POST['txtdis'];
		$exprice=$_POST['txtexprice'];
		echo "<br>".$rtono."<br>".$rtooff."<br>".$ins."<br>".$dis."<br>".$exprice;
		
		$q="update use_car set uc_comp='$com1',uc_car='$car1',uc_year='$year',km_driven='$km',uc_photo='$carimg',fuel='$fuel',state='$s1',city='$c1',RTO_no='$rtono',RTO_office='$rtooff',inssurance='$ins',discription='$dis',expected_price='$exprice' where uc_id='$cid'";
		$result=mysql_query($q) or die("query proble");
		//echo $com_id.$carimg;
		
		if($result==true)
		{
			echo "Updated Successfully..";
			echo "<script language='javascript'>window.location.href='viewcar.php'</script>";
		}
		else
					echo "Try Again....";
		
	}
?>
</form></div>
 <!-- END prod wrapper -->

  <div style="clear:both"></div>
  <div style="clear:both; height: 40px"></div>

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
