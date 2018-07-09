<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-car</title>
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">

</head>

<body>

<div class="header">
  <div id="site_title"><a href="index.php"><img src="carlogo/e_car.png" alt="" width="168" height="65"></a></div>
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
        <div id="sort1">
        <font color="#99CC00"> <?php
        		echo "Well Come  :  ".$nm; ?></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        		<a href="logout.php">Logout</a>
		</div>
		<?php } ?>
</div>
  


</body>
</html>