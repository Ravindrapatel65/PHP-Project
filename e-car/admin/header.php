<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">

</head>

<body>
<div class="header">
  <div id="site_title"><a href="addnewcomp.php"><img src="../carlogo/e_car.png" alt="" width="168" height="65"></a></div>
  <!-- Main Menu -->
  <ol id="menu">
    <li class="active_menu_item"><a href="addnewcomp.php">Home</a>
      <!-- sub menu -->
     
    </li>
    <!-- END sub menu -->
    <li><a href="#">Add_car</a>
    	<ol>
      
        <li><a href="uploadnewcar.php">Add New Car</a></li>
        <li><a href="addupcar.php">Add Upcoming Car</a></li>
       
      </ol>
      <!-- sub menu -->
     
    </li>
    <!-- END sub menu -->
    <li><a href="#">manage_car</a>
    
     <ol>
      
        <li><a href="viewcomp.php">View Company</a></li>
        <li><a href="viewcar.php">View Car</a></li>
        <li><a href="viewupcar.php">View upcoming Car</a></li>
      </ol>
      </li>
      
    <li><a href="viewfeedback.php">view_feedback</a>
      <!-- sub menu -->
      
    </li>
    <!-- END sub menu -->
    <li><a href="viewpayment.php">view_payment</a></li>
  </ol>
     <?php
		if($nm)
		{ ?>	
			 <div id="sort1">	
        		<a href="logout.php">Logout</a>
		</div>
	<?php	} ?>

</div>
<!-- END header -->

</body>
</html>