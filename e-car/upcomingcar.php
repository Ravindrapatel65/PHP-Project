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
<link rel="stylesheet" type="text/css" href="css/gridNavigation.css">
<!--JS FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.gridnav.js"></script>
<script src="js/easing/jquery.easing.1.3.js"></script>
<script>
$(function () {
    $('#tj_container').gridnav({
        type: {
            mode: 'seqfade', // use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
            speed: 500, // for fade, seqfade, updown, sequpdown, showhide, disperse, rows
            easing: '', // for fade, seqfade, updown, sequpdown, showhide, disperse, rows	
            factor: 100, // for seqfade, sequpdown, rows
            reverse: '' // for sequpdown
        }
    });
});
</script>
</head>
<body>
<!-- END header -->
<div id="container">
<div id="he2" class="heading_bg">
		<center><h2>Upcoming Car</h2></center>
    </div>
  <div id="tj_container" class="tj_container">
    <div class="tj_nav"> <span id="tj_prev" class="tj_prev">Previous</span> <span id="tj_next" class="tj_next">Next</span></div>
    <div class="tj_wrapper">
      <ul class="tj_gallery" style="margin:0; padding:0">
      <?php
	  		$q="select * from upcoming_car";
			$r=mysql_query($q);
			while($row=mysql_fetch_array($r))
			{
				$cimg="admin/".$row[1];
	  		?>
        <li><a href="upcardetail.php?cid=<?php echo $row[0]; ?>"><img src="<?php echo $cimg; ?>" width="100px" height="70px" alt=""></a></li>
        <?php   } ?>
      
      </ul>
    </div>
  </div>
  <!-- END Portfolio -->
</div>
<!-- END container -->
<div id="footer" align="right">
  
    <h3>Socialize</h3>
     <img src="img/icon_fb.png" alt=""> <img src="img/icon_twitter.png" alt=""> <img src="img/icon_in.png" alt=""> 
</div>
</div>
<!-- END footer -->
</body>
</html>