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
<script language="javascript" src="validation/validation.js"></script>

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
						/*document.getElementById('verdiv').innerHTML='<select name="ver"  id="dd">'+
						'<option>Select Car Version</option>'+
				        '</select>';*/						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	/*function getver(carId,verId) {		
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
				
	}*/
</script>


</head>
<body>
<div id="container" align="center">
<div id="he" class="heading_bg">
		<h2>Sell Car</h2>
  </div>
<form action="#" method="post" enctype="multipart/form-data" name="sell">
  <!-- tab panes --> 
      <!-- tab panes --><table align="center">
   <tr>
    <td id="m">Uploade Image:</td>
    <td><input type="file" name="carimg" style="border-radius:5px">
    <?php
	if(isset($_FILES['carimg']))
	{
		$folder="cars/";
		$logo=$_FILES['carimg']['name'];
		$logotmp=$_FILES['carimg']['tmp_name'];
		$path=$folder.$logo;
		if(move_uploaded_file($logotmp,'cars/'.$logo))
		{
		$_SESSION['img']=$path;
		?>
            <img src="<?php echo $path ?>" height="70px" width="90px" >
            <?php
		}
	}?>
    </td>
    
  </tr>
  <tr>
    <td id="m">Car Detail:</td>
    <td><div id="dr"><select name="company" id="dd" onChange="getcar(this.value)">
	<option value=0>Select Car Company</option>
	<?php
	 $query="SELECT * FROM car_company";
	 $result=mysql_query($query);
	 while ($row=mysql_fetch_array($result)) { ?>
	<option value=<?php echo $row[0]?>><?php echo $row[2]?></option>
	<?php } ?>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
    <select name="car" id="cardiv"  class="dd">
	<option value=0>Select Car Model</option>
        </select>
       </div></td>
  </tr>
    <tr>
    <td id="m">Model Year:</td>
    <td><input type="text" name="txtyear" style="border:ridge" placeholder="Model Year">
    </td>
  </tr>
  <tr>
    <td id="m">Driven km:</td>
    <td><input type="text" name="txtdrivenkm" style="border:ridge" placeholder="Driven km"></td>
  </tr>
  <tr>
    <td id="m">Fuel:</td>
    <td><select name="fuel" id="dd">
    		<option value=0>--Select Fuel--</option>
            <option>Petrol</option>
            <option>Diesel</option>
            <option>CNG</option>
            </select></td>
  </tr>
    <tr>
    <td id="m" width="174">City : </td>
    <td  width="345">
   
    <select name="state" id="dd" onchange="getCity(this.value)">
		<option value=0>Select State</option>
		<?php 
			$q="select * from state";
			$result=mysql_query($q);
			while ($row=mysql_fetch_array($result)) 
			{ ?>
				<option value=<?php echo $row['id']?>><?php echo $row['statename']?></option>
		<?php } ?>
	</select>
        &nbsp;&nbsp;
        <select name="city" id="citydiv" class="dd">
	<option value=>Select City</option>
        </select></td>
  </tr>
   <tr>
    <td id="m">RTO No:</td>
    <td><input type="text" name="txtrtono" style="border:ridge" placeholder="RTO Number"></td>
  </tr>
   <tr>
    <td id="m">RTO Office:</td>
    <td><input type="text" name="txtrtooffice" style="border:ridge" placeholder="RTO Office"></td>
  </tr>
   <tr>
    <td id="m">Insurance:</td>
    <td><input type="radio" name="insurance" value="yes" />Yes
    <input type="radio" name="insurance" value="no" checked />No</td>
  </tr>
   <tr>
    <td id="m">Discription:</td>
    <td><textarea name="txtdis" id="txtdis" style="border:ridge"></textarea></td>
  </tr>
   <tr>
    <td id="m">Expected Price:</td>
    <td><input type="text" name="txtexprice" style="border:ridge" placeholder="Expected Price"></td>
  </tr>
  <tr>
  <td id="m"></td>
    <td><center><input type="submit" name="uploadcar" value="Upload" style="border-radius:5px" id="button" onClick="return sell_car();"></center></td>
  </tr>
  
</table></form></div>
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
<?php
if(isset($_POST['uploadcar']))
	{
		
		$c=$_POST['company'];
		$q1="select * from car_company where com_id='$c'";
		$r1=mysql_query($q1);
		while($row1=mysql_fetch_array($r1))
		{
			$com1=$row1[2];	
			$_SESSION['comp']=$com1;
		}
		$cv=$_POST['car'];
		echo $cv;
		$q2="select car_model from car where car_id='$cv'";
		$r2=mysql_query($q2);
		
		while($row2=mysql_fetch_array($r2))
		{
			$car1=$row2['car_model'];
			$_SESSION['car']=$car1;
		
			/*$ver1=$row2[3];
			$_SESSION['ver']=$ver1;*/
		}
		
		$_SESSION['year']=$_POST['txtyear'];
		$_SESSION['km']=$_POST['txtdrivenkm'];
		$_SESSION['fuel']=$_POST['fuel'];
		
		$state=$_POST['state'];
		$q3="select * from state where id='$state'";
		$r3=mysql_query($q3);
		while($row3=mysql_fetch_array($r3))
		{
			$s1=$row3[1];	
			$_SESSION['state']=$row3[1];
		}
		
		$city=$_POST['city'];
		$q4="select city from city where id='$city'";
		$r4=mysql_query($q4) or die("srthdrthdrthdr");
		while($row4=mysql_fetch_array($r4))
		{
			$c1=$row4[0];	
			$_SESSION['city']=$c1;
		}
		
		$_SESSION['rtono']=$_POST['txtrtono'];
		$_SESSION['rtooffi']=$_POST['txtrtooffice'];
		$_SESSION['ins']=$_POST['insurance'];
		$_SESSION['dis']=$_POST['txtdis'];
		$_SESSION['amt']=$_POST['txtexprice'];
	
		echo $path."<br>comp".$com1."<br>car".$cv."<br>state".$s1."<br>city".$c1;
		
		
		echo "<script language='javascript'>window.location.href='payment.php'</script>";
	}
	?>