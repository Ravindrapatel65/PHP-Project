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
<script language="javascript" src="validation/validation.js"></script>
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
<script language="javascript">
	 function inputcheck(str)
	 {
		
		    if(str=="")
			{
				document.getElementById("inputcheck").innerHTML=="";
				return;
			}
			if(window.XMLHttpRequest)
			{
				  xmlhttp= new XMLHttpRequest();
			}
			else
			{
				   xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				   if(xmlhttp.readyState==4 && xmlhttp.status==200)
				   {
//	   				document.getElementById("inputcheck").innerHTML==xmlhttp.responseText;
					document.getElementById("inputcheck").innerHTML=xmlhttp.responseText;
				   }
			}
			xmlhttp.open("GET","inputcheck.php?check="+str,true);
			xmlhttp.send();

	 }
	 
	/* function isNumber(event) 
	{
		var KeyBoardCode = (event.which) ? event.which : event.keyCode;
    	if (KeyBoardCode > 31 && (KeyBoardCode < 48 || KeyBoardCode > 57))
		{
			alert("Enter numeric value only");
			document.registration_form.contact_no.value="";
			return false;
   		}	
		return true;
	}*/
	
	  function cont(str)
	 {
		
		   if(str=="")
			{
				alert("Enter the conact No..");
				document.registration_form.txtcontact.focus();
				return false;
			}
			
			
			else if(str.length >=11 || str.length <=9)
			{
				alert("Enter 10 digit Only..");
				document.registration_form.txtcontact.focus();
				return false;
			}
			 else if(str!="")
			{
				var letters = /^[A-Za-z]+$/;
				if(str.match(letters))
				{
					alert('Contact no. must have numeric only...');
						document.registration_form.txtcontact.focus();
						return false;
					
				}
				else
				{
						return true;
				}
			}
			/*if(window.XMLHttpRequest)
			{
				  xmlhttp= new XMLHttpRequest();
			}
			else
			{
				   xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				   if(xmlhttp.readyState==4 && xmlhttp.status==200)
				   {
//	   				document.getElementById("inputcheck").innerHTML==xmlhttp.responseText;
					document.getElementById("inputcheck").innerHTML=xmlhttp.responseText;
				   }
			}
			xmlhttp.open("GET","inputcheck.php?check="+str,true);
			xmlhttp.send();*/

	 }


</script>
</head>
<body>
<div id="container" align="center">

 <div id="he" class="heading_bg">
		<h2>Registration</h2>
    </div><br>
    <form action="regicode.php" name="registration_form" method="post">
  <!-- tab panes --><table align="center">
  <tr>
    <td id="m"><center>Name:</center></td>
    <td><input type="text" name="txtname" required="required" id="txtname" style="border:ridge" placeholder="Name" ></td>
  </tr>
   <tr>
    <td id="m"><center>User Name:</center></td>
    <td><input type="text" name="txtusername" style="border:ridge" placeholder="User Name" onblur="inputcheck(this.value)" /><font color="#CC0000" size="-1"><span id="inputcheck"></span></font></td>
  </tr>
  <tr>
    <td id="m">Password:</td>
    <td><input type="password" name="txtpass" style="border:ridge" placeholder="Password"></td>
  </tr>
   <tr>
    <td id="m"><center>Address:</center></td>
    <td><input type="text" name="txtadd" style="border:ridge" placeholder="add"></td>
  </tr>
    <tr>
    <td id="m"><center>E_mail:</center></td>
    <td><input type="email" name="txtemail" style="border:ridge" placeholder="abc@gmil.com"></td>
  </tr>
  <tr>
    <td id="m"><center>Contact:</center></td>
    <td><input type="text" name="txtcontact" onkeypress="return isNumber(event)"  onblur="return restrict();" style="border:ridge" placeholder="contact" ></td>
  </tr>

  <tr>
    <td  id="m"></td>
    <td><center>
    <input type="submit" value="Registration" name="regi" onClick="return registeration_validation();" style="border-radius:5px" ></center></td>
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