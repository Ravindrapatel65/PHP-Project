<?php
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Carworld</title>
<link href="car-style.css" rel="stylesheet" type="text/css" />
<link href="mainmenu.css" rel="stylesheet" type="text/css" />
<link href="other.css" rel="stylesheet" type="text/css" />
<link href="content-slide.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function getvalue()
{
var v1 = document.getElementById("value").value;
document.getElementById("hidn").value=v1;

}
function getyear()
{
var y = document.getElementById("year").value;
document.getElementById("hidnyear").value=y;

}

</script>


   <script>
	function stat(str)
	{
		var a;
		if(window.XMLHttpRequest)
		{
			a=new XMLHttpRequest;
		}
		else
		{
			a=new activexObject("microsoft.XMLHTTP");
			
		}
		
		a.open("GET","findModel.php?cid="+str,true);
		a.send();
		a.onreadystatechange= function()
		{
			if(a.readyState==4)
			{
				document.getElementById("model").innerHTML=a.responseText;
			}
		}
	}
	function car(str1)
	{
		var a;
		if(window.XMLHttpRequest)
		{
			a=new XMLHttpRequest;
		}
		else
		{
			a=new activexObject("microsoft.XMLHTTP");
			
		}
		
		a.open("GET","findCar.php?model="+str1,true);
		a.send();
		a.onreadystatechange= function()
		{
			if(a.readyState==4)
			{
				document.getElementById("cnm").innerHTML=a.responseText;
			}
		}
	}
	
   	function policy(st)
	{
		
		var a;
		if(window.XMLHttpRequest)
		{
			a=new XMLHttpRequest;
		}
		else
		{
			a=new activexObject("microsoft.XMLHTTP");
			
		}
		
		a.open("GET","ajax2.php?cid="+st,true);
		a.send();
		a.onreadystatechange= function()
		{
			if(a.readyState==4)
			{
				document.getElementById("policy1").innerHTML=a.responseText;
			}
		}
	}
    
    </script>
</head>

<body>
<div id="car-container">
<?php
include("header.php");
include("connection.php");
?>
      <div class="simple-box" style="height:32px;">
<div id="tabs17" style="margin:0;">
 <ul>
    <li><a href="index.php"><span>Home</span></a></li>
    <li><a href="new_car.php"><span>New Car</span></a></li>
    <li><a href="used_car.php"><span>Used Car</span></a></li>
    <li><a href="big_search.php"><span>Search</span></a></li>
    <li><a href="sell_car.php"><span>Sell Car</span></a></li>
    <li><a href="insurance.php"><span><font color="#FF9966" >Insurance</font></span></a></li>
    <li><a href="upcomingcar.php"><span>Upcoming Car</span></a></li>
    <li><a href="rent_car.php"><span>Rent Car</span></a></li>
    <li><a href="news.php"><span>News</span></a></li>
     <li><a href="contact.php"><span>Contact Us</span></a></li>        
 </ul> 
</div>
</div>

<?php
global $price,$damage,$thirdparty,$thirdparty,$servicetax,$total,$policy,$makeyear,$cnm,$cid,$model,$city,$per,$index,$carid;

if(isset($_SERVER['PHP_SELF']))
{
if(isset($_GET['year']))
{
	$makeyear = $_GET['year'];
}
}
?>

<div id="car-content">
<div class="heading1-box" style="margin-right:200px;">
Car Rent</div>
<form method="post" enctype="multipart/form-data">

                <input type="hidden" id="hidn" name="hidn" />


<table align="center">
 <tr>
            <td>Select Brand</td>
            <td> <select name="cid" id="brand" onchange="stat(this.value)" style="width:155px;">

        	<option value="0" >Select Id</option>
            <?php
			include("connection.php");
			if(isset($_SERVER['PHP_SELF']))
			{
				$sql = "select * from tbl_brand";
				$result = mysql_query($sql) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
					echo "<option value = '$row[0]'>$row[1]</option>";
				}
	    	}
			?>
            </select>     
            </td>
            </tr>
            <tr>
            <td>Select Model</td><!-- droplist here..-->
         <td >
<select id="model"  name="model" id="model" onchange="car(this.value)"style="width:155px;">
		<option>--select--</option>         
</select>
 </td>
</tr>
<tr>
       <td>Car Name</td><!-- droplist here..-->
         <td >
<select id="cnm"  name="cnm"style="width:155px;">
		<option>--select--</option>         
</select>
 </td>      
</tr>

<tr>
<td>City</td>
<td><input type="text" id="city" name="city" /></td>
</tr>
<tr>
<td>Policy Type</td>

<td><select onchange="policy(this.value)" style="width:155px;" name="policy1"><option >--Select--</option>
<option  value="new">New Policy</option>
<option value="renew">Renew Policy</option>

        
</select></td>

<tr id="policy1"  >
</tr>
</table>
<table align="center">
<tr>
<td><button type="submit" id="submit" name="submit" value="0"  style='background-color:#CC0000;color:#FFF;border-color:#003399;'/>Calculate</button>	</td>
</tr>
</table>
</form>

<div class="heading1-box" style="margin-right:200px;">
Insurance</div>

<?php
global $makeyear;

if(isset($_POST['submit']))
{
	$cid = trim($_POST['cid']);
	$model = trim($_POST['model']);
	$cnm = trim($_POST['cnm']);
	$city = trim($_POST['city']);
	$policy = trim($_POST['policy1']);

	//$renew = trim($_POST['renew']);
$sql = "select car_id from tbl_car where car_id = '$cnm'";
$result=mysql_query($sql) or die(mysql_error());
while($r = mysql_fetch_array($result))
{
	$carid = $r[0];
}

}
$sql = "select price from tbl_car where car_id = '$carid'";
$result=mysql_query($sql);
while($r = mysql_fetch_array($result))
{
	$price = $r[0];
}

		 if ($policy!="new")
            {
				$makeyear = trim($_POST['year']);
                if($makeyear != 0)
                {
                    $index = $makeyear;
                     $per =100 -(($index * 5) + 10);
                    $price = ($price * $per) / 100;
                }
                
            }
	 $damage = (int)($price * 3.5) / 100;
     $thirdparty = ($price * 2) / 100;
     $total = $damage + $thirdparty;
     $servicetax = (int)($total * 12.36) / 100;
     $total = $total + $servicetax;
	 echo "<br><br>";
//echo "index:".$index.",per:".$per.",price:".$price;

echo "<table align='center'>
<tr>
<td>Price</td><td>:$price INR.</td>
</tr>

<tr>
<td>Damage</td><td>:$damage</td>
</tr>
<tr>
<td>thirdparty</td><td>:$thirdparty</td>
</tr>
<tr>
<td>total</td><td>:$total</td>
</tr>
<tr>
<td>servicetax</td><td>:$servicetax</td>
</tr>
<tr>
<td>total</td><td>:$total</td></tr></table>";
 ?>

</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>
