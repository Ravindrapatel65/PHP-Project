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
 <?php
  if(isset($_POST['compare']))
  {
  	$comp1=$_POST['company'];
	$car1=$_POST['car'];
	//$ver1=$_POST['ver'];
	$comp2=$_POST['company1'];
	$car2=$_POST['car1'];
	//echo $comp1."-".$comp2."-".$car1."-".$car2;
  
  	$q1="select * from car where car_id='$car1'";
	$result=mysql_query($q1);
	while($r1=mysql_fetch_array($result))
	{
  	$q2="select * from car where car_id='$car2'";
	$result1=mysql_query($q2);
	while($r2=mysql_fetch_array($result1))
	{
		
  ?>
		<h2>Car Comparision</h2>
  </div>
 
  <!-- tab panes --> 
  
      <!-- tab panes --><table align="center">
   <tr>
    <td id="m"><center>Car Image:</center></td>
     <td><img src="<?php echo "admin/".$r1[1]; ?>" height="100" width="130"></td> 
     <td><img src="<?php echo "admin/".$r2[1]; ?>" height="100" width="130"></td>
  </tr>
  <tr>
    <td id="m"><center>Car Model:</center></td>
    <td><center><?php echo $r1[2]; ?></center></td>
    <td><center><?php echo $r2[2]; ?></center></td>
  </tr>
    <tr>
    <td id="m"><center>Cc:</center></td>
    <td><center><?php echo $r1[3]; ?></center></td>
    <td><center><?php echo $r2[3]; ?></center></td>
  </tr>
  <tr>
    <td id="m"><center>Fuel:</center></td>
    <td><center><?php echo $r1[4]; ?></center></td>
    <td><center><?php echo $r2[4]; ?></center></td>
  </tr>
  <tr>
    <td id="m"><center>Seating capacity:</center></td>
    <td><center><?php echo $r1[5]; ?></center></td>
    <td><center><?php echo $r2[5]; ?></center></td>
  </tr>
    <tr>
    <td id="m"><center> Air Conditioner: </center></td>
    <td><center><?php echo $r1[6]; ?></center></td>
    <td><center><?php echo $r2[6]; ?></center></td>
  </tr>
   <tr>
    <td id="m"><center>Alloy Wheel:</center></td>
    <td><center><?php echo $r1[7]; ?></center></td>
    <td><center><?php echo $r2[7]; ?></center></td>
  </tr>
   <tr>
    <td id="m"><center>Tubeless Tyres:</center></td>
    <td><center><?php echo $r1[8]; ?></center></td>
    <td><center><?php echo $r2[8]; ?></center></td>
  </tr>
   <tr>
    <td id="m"><center>Avg km:</center></td>
    <td><center><?php echo $r1[9]; ?></center></td>
    <td><center><?php echo $r2[9]; ?></center></td>
  </tr>
   <tr>
    <td id="m"><center>Amount:</center></td>
    <td><center><?php echo $r1[10]; ?></center></td>
    <td><center><?php echo $r2[10]; ?></center></td>
  </tr>
    
</table>
<?php  } } } ?>
</div>
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