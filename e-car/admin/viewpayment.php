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
</head>
<body>
<div id="container" align="center">
  <div id="new3" class="one-half" align="center">
    <div id="he1" class="heading_bg">
		<h2>View Company Info.</h2>
    </div>
   <form action="#" class="" method="post">
     
      <!-- tab panes -->
      <!-- tab panes -->
      <table border="1" align="center">
        <tr>
          <td id="m"><center>User_Name</center></td>
          <td id="m"><center>Payment_Date</center></td>
          <td id="m"><center>Amount</center></td>
          <td  id="m"><center>Payment_Type</center></td>
           <td id="m"><center>Ref._No.</center></td>
         </tr>
        
         <?php
		 	$q="select * from payment";
			$result=mysql_query($q);
			while($r=mysql_fetch_array($result))
			{
				 ?>
             <tr>
             	 <td><?php echo $r[4]; ?></td>
         		 <td><?php echo $r[1]; ?></td>
         		 <td><?php echo $r[2];  ?></td>
                 <td><?php echo $r[3];  ?></td>
        		 <td><?php echo $r[5]; ?></td>
            </tr>
       		<?php  } ?>
      </table>
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