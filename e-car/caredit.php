<?php
	session_start();
	include('conn.php');
	$nm="";
	if(isset($_SESSION['uname']))
	{
		$nm=$_SESSION['uname'];
	}
?>

<!DOCTYPE HTML>
<head>
<title>E-car</title>
<meta charset="utf-8">
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">
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
						/*document.getElementById('verdiv').innerHTML='<select name="ver"  id="dd">'+
						'<option>Select Version</option>'+
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
<div class="header">
  <div id="site_title"><a href="index.html"><img src="carlogo/e-car.png" alt=""></a></div>
  <!-- Main Menu -->
  <ol id="menu">
    <li class="active_menu_item"><a href="index.php">Home</a>
      <!-- sub menu -->
     
    </li>
    <!-- END sub menu -->
    <li><a href="#">Used_Car</a>
    
      <!-- sub menu -->
      <ol>
      
        <li><a href="buycar.php">Buy Car</a></li>
        <li><?php 
		if(!$nm)
		 {?>
        <a href="login.php">Sell Car</a>
        <?php } 
		else{ ?>
        	 <a href="sellcar.php">Sell Car</a>
        <?php } ?></li>
        <li><?php 
		if(!$nm)
		 {?>
        <a href="login.php">Uploaded car</a>
        <?php } 
		else{ ?>
        	 <a href="viewcar.php">Uploaded car</a>
        <?php } ?></li>
        
      </ol>
    </li>
    <!-- END sub menu -->
    <li><a href="upcomingcar.php">upcoming_car</a></li>
    <li> 
        	 <a href="feedback.php">feedback</a>
      <!-- sub menu -->
    </li>
    <!-- END sub menu -->
    <li><a href="contact.php">Contact_us</a></li>
  </ol>
  <?php
		if(!$nm)
		{	
	?>  <div id="sort">
        <a href="login.php">Login</a>&nbsp;&nbsp;&nbsp;<a href="registration.php">Registration</a>
		 </div>
	<?php
		}
		else{?>
        <div id="sort1"><?php
        		echo "Well come  :  ".$nm; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
	
        		<a href="logout.php">Logout</a>
		</div>
		<?php } ?>
</div>
<!-- END header -->
<div id="container" align="center">
<div id="he" class="heading_bg">
		<h2>Sell Car</h2>
  </div>
<form action="#" method="post" enctype="multipart/form-data">
  <!-- tab panes --> 
      <!-- tab panes --><table align="center">
   <tr>
    <td>Uploade Image:</td>
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
    <td>Car Detail:</td>
    <td  width="150"><div id="dr"><select name="company" id="dd" onChange="getcar(this.value)">
	<option value="">Select Company</option>
	<?php
	 $query="SELECT * FROM car_company";
	 $result=mysql_query($query);
	 while ($row=mysql_fetch_array($result)) { ?>
	<option value=<?php echo $row[0]?>><?php echo $row[2]?></option>
	<?php } ?>
	</select>
    <div id="cardiv">
    <select name="car"  id="dd">
	<option>Select Car</option>
        </select></div>
       </div></td>
  </tr>
    <tr>
    <td>Model Year:</td>
    <td><input type="text" name="txtyear" style="border:ridge" placeholder="Model Year">
    </td>
  </tr>
  <tr>
    <td>Driven km:</td>
    <td><input type="text" name="txtdrivenkm" style="border:ridge" placeholder="Driven km"></td>
  </tr>
  <tr>
    <td>Fuel:</td>
    <td><select name="fuel" id="dd">
    		<option>--Select Fuel--</option>
            <option>Petrol</option>
            <option>Diesel</option>
            <option>CNG</option>
            </select></td>
  </tr>
    <tr>
    <td width="158">City : </td>
    <td  width="402">
   
    <select name="state" id="dd" onchange="getCity(this.value)">
		<option>Select State</option>
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
	<option>Select City</option>
        </select></td>
  </tr>
   <tr>
    <td>RTO No:</td>
    <td><input type="text" name="txtrtono" style="border:ridge" placeholder="RTO Number"></td>
  </tr>
   <tr>
    <td>RTO Office:</td>
    <td><input type="text" name="txtrtooffice" style="border:ridge" placeholder="RTO Office"></td>
  </tr>
   <tr>
    <td>Insurance:</td>
    <td><input type="radio" name="insurance" value="yes" />Yes
    <input type="radio" name="insurance" value="no" />No</td>
  </tr>
   <tr>
    <td>Discription:</td>
    <td><textarea name="txtdis" id="txtdis" style="border:ridge"></textarea></td>
  </tr>
   <tr>
    <td>Expected Price:</td>
    <td><input type="text" name="txtexprice" style="border:ridge" placeholder="Expecyted Price"></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="uploadcar" value="Upload" style="border-radius:5px" id="button"></center></td>
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
		
		$q2="select * from car where com_id='$c'";
		$r2=mysql_query($q2);
		while($row2=mysql_fetch_array($r2))
		{
			$car1=$row2[2];
			$_SESSION['car']=$car1;
		
			$ver1=$row2[3];
			$_SESSION['ver']=$ver1;
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
	
		echo $path."<br>comp".$com1."<br>car".$car1."<br>ver".$ver1."<br>state".$s1."<br>city".$c1;
		
		
		echo "<script language='javascript'>window.location.href='payment.php'</script>";
	}
	?>