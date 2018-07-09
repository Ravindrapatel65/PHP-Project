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
<script>
function getcar(str)
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
	

</script>

</head>
<body>
<div id="container" align="center">
  <div id="new" class="one-half" align="center">
    <div class="heading_bg">
		<h2>View Car Info.</h2>
    </div>
     <form action="#" class="TTWForm" method="post">
     Select Company : &nbsp;&nbsp;<select name="company" onChange="getcar(this.value)"><option>--Select Company--</option>
     <?php
				$query="select * from car_company";
				$result=mysql_query($query);
				while($row=mysql_fetch_array($result))
				{
                    ?><option value="<?php echo $row['com_id']; ?>"><?php echo $row['com_name']; ?></option> <?php
				}
				?>
     </select>
     <div id="inputcheck">
     
     </div>
</form>
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