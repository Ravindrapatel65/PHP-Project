<?php
	session_start();
	include('conn.php');
	//$q=$_SESSION['q'];
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
<link rel="stylesheet" type="text/css" media="screen" href="admin/css/style.css">
<!-- Contact Form -->
<link href="admin/contact-form/css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="admin/contact-form/css/uniform.css" media="screen" rel="stylesheet" type="text/css">
<!-- JS Files -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="admin/js/jquery.tools.min.js"></script>
<script language="javascript" src="validation/validation.js"></script>

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
function MakePayment(st) {		
		
		var strURL="ajax1.php?cid="+st;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('pay').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
</script>
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

function addDate()
{
date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var year = date.getFullYear();

document.getElementById('date').value = day + '-' + month + '-' + year;
}
</script>

</head>
<body onload="addDate()">
<div id="container" align="center">

<form method="post" name="pay">
  <table border="2" align="center">
  <tr>
    <td id="m"><center>Amount :</center></td>
    <td id="m"><label>500</label></td>
  </tr>
    <tr>
    <td id="m"><center>Payment Type :</center></td>
    <td id="m"><select onChange="MakePayment(this.value)" style="width:155px;" name="payment" id="payment">
    <option value=0>--Select--</option>
		<option value="Credit Card">Credit Card</option>
		<option value="Net Banking">Net Banking</option>
		<option value="Debit Card">Debit Card</option>
</select>
			
    </td>
    
  </tr>
  <tr>
  <div id="pay">
  
  </div>
 
  </tr>
   
  <tr>
    <td colspan="2" id="m"><center><input type="submit" value="Pay Now" name="pay" style="border-radius:5px" id="button" onClick="return payment_validation();"></center></td>
  </tr>
 
</table>
<input type="hidden" name="date" id="date" />
<?php
	
	
	if(isset($_POST['pay']))
	{
		$img=$_SESSION['img'];
		$comp=$_SESSION['comp'];
		$car=$_SESSION['car'];
		//$ver=$_SESSION['ver'];
		$year=$_SESSION['year'];
		$km=$_SESSION['km'];
		$fuel=$_SESSION['fuel'];
		$state=$_SESSION['state'];
		$city=$_SESSION['city'];
		$rtono=$_SESSION['rtono'];
		$rtooffi=$_SESSION['rtooffi'];
		$ins=$_SESSION['ins'];
		$dis=$_SESSION['dis'];
		$amt=$_SESSION['amt'];
		
		$q="INSERT INTO use_car (`uc_comp`, `uc_car`, uc_year, km_driven, `uc_photo`, `fuel`, `state`, `city`, RTO_no, `RTO_office`, `inssurance`, `discription`, expected_price, `user_name`) VALUES ('$comp', '$car', $year, $km, '$img', '$fuel', '$state', '$city', $rtono, '$rtooffi', '$ins', '$dis',$amt, '$nm')";

		$r=mysql_query($q);
		
	/*	echo "img".$img;
		echo "<br>comp".$comp;
		echo "<br>car".$car;
		echo "<br>ver".$ver;
		echo "<br>state".$state;
		echo "<br>city".$city;
		*/
		if(!$r)
			echo "try again for uploade the car info..";
		else
			echo "successfull uploaded car ";
		
		$str="1234567890";
	$rstr=str_shuffle($str);
		
		$d=$_POST['date'];
		$p=$_POST['payment'];
		$query="INSERT INTO payment(`pay_date`, pay_amount, `pay_type`, `user_name`,`ref_no`) VALUES ('$d', '500', '$p', '$nm',$rstr)";
		$result=mysql_query($query);
		if(!$result)
			echo "try again for payment..";
		else
		{
			echo "  and payment....  "."      "."Please Collect the reference number.....<br><br>";
		//echo "<script language='javascript'>window.location.href='payment.php'
		}
		
		
	echo "Payment No.  : ".$rstr;
	}
?>

</form>

 </div>
 <!-- END prod wrapper -->

  <div style="clear:both"></div>
  <div style="clear:both; height: 40px"></div>

<!-- END container -->
<div id="footer" align="right">
  <!-- First Column --><!-- Second Column --><!-- Third Column --><!-- Fourth Column -->
  
    <h3>Socialize</h3>
     <img src="admin/img/icon_fb.png" alt=""> <img src="admin/img/icon_twitter.png" alt=""> <img src="admin/img/icon_in.png" alt=""> 
</div>
</div>
<!-- END footer -->
</body>
</html>