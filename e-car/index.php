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
<?php
	
	if(isset($_POST['search']))
	{
		$low=$_POST['txtlowprice'];
		$high=$_POST['txthighprice'];
		if($low>=$high)
		{
			header("location:index.php?action=enter proper value");
		}
		else
		{
			header("location:searchcar.php?l=$low&h=$high");
		}
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
<!-- Contact Form -->
<link href="contact-form/css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="contact-form/css/uniform.css" media="screen" rel="stylesheet" type="text/css">

 <link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    <!--<link href="generic.css" rel="stylesheet" type="text/css" />-->
<style>

.msg_redcolor
{
	color:#F00; 
    margin:5px 0px 0px 0px;
	letter-spacing:2px;
	font-size:14px;
}
</style>




<!-- JS Files -->

<script src="js/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="validation/validation.js"></script>
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
//2 company
	function getcar1(carId) {		
		
		var strURL="findcar1.php?car="+carId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('cardiv1').innerHTML=req.responseText;
						/*document.getElementById('verdiv1').innerHTML='<select name="ver1"  id="dd1">'+
						'<option>Select Car Version</option>'+
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
	/*function getver1(carId,verId) {		
		var strURL="findver1.php?car="+carId+"&ver="+verId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('verdiv1').innerHTML=req.responseText;						
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
 <script type="text/javascript">
        //The following script is for the group 2 navigation buttons.
        function switchAutoAdvance() {
            imageSlider.switchAuto();
            switchPlayPauseClass();
        }
        function switchPlayPauseClass() {
            var auto = document.getElementById('auto');
            var isAutoPlay = imageSlider.getAuto();
            auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
            auto.title = isAutoPlay ? "Pause" : "Play";
        }
        switchPlayPauseClass();
    </script>
</head>
<body>
<!-- END header -->
 
<div id="container">
  <!-- tab panes -->
  <div id="prod_wrapper">
<div id="sliderFrame">
        <div id="slider">
            <img src="big car/1.jpg" />
            <img src="big car/2.jpg" />
            <img src="big car/3.jpg" />
            <img src="big car/4.jpg" />
            <img src="big car/5.jpg" />
            <img src="big car/6.jpg" />
        </div>
        <!--Custom navigation buttons on both sides-->
        <div class="group1-Wrapper">
            <a onclick="imageSlider.previous()" class="group1-Prev"></a>
            <a onclick="imageSlider.next()" class="group1-Next"></a>
</div>
        <!--nav bar-->
        <div style="text-align:center;padding:20px;z-index:20;">
            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
            <a id='auto' onclick="switchAutoAdvance()"></a>
            <a onclick="imageSlider.next()" class="group2-Next"></a>
        </div>
    </div>
   </div>
  <div id="prod_wrapper">
    <!-- END tab panes -->
     <div id="prod_nav_1">
      <ul>
     <?php
	 		$q="select * from car_company";
			$result=mysql_query($q);
			while($row=mysql_fetch_array($result))
			{ 
				//echo $row[1];
				$a="admin/".$row[1];
	 	?>
     
        <li><a href="newcar.php?id=<?php echo $row[0]; ?>"><img src="<?php  echo $a; ?>" width="120" height="100" alt=""><strong class="comp"><?php   echo ucwords($row[2]); ?></strong></a></li>
        <?php } ?>
        
      </ul>
    </div>
    
    <br clear="all">
    <!-- navigator --><!-- END navigator -->
  </div>
  <!-- END prod wrapper -->
  <div style="clear:both"></div>
  <div style="clear:both"></div>
<div class="one-half">
    <div class="heading_bg" align="center">
      <h2>Compare car</h2>
    </div>
   <form action="compare.php" class="TTWForm" method="post" name="subject_insertion">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div id="1">
    
    <select name="company" id="dd1" onChange="getcar(this.value)">
	<option value="">Select Car Company</option>
	<?php
	 $query="SELECT * FROM car_company";
	 $result=mysql_query($query);
	 while ($row=mysql_fetch_array($result)) { ?>
	<option value=<?php echo $row[0]?>><?php echo $row[2]?></option>
	<?php } ?>
	</select>
    <div id="cardiv">
    <select name="car"  id="dd1">
	<option>Select Car Model</option>
        </select></div>
       </div>&nbsp;<br><br>
       <div id="vs"> V/s </div><br>
      
    <div id="1">
     <select name="company1" id="dd1" onChange="getcar1(this.value)">
	<option value="">Select Car Company</option>
	<?php
	 $query="SELECT * FROM car_company";
	 $result=mysql_query($query);
	 while ($row=mysql_fetch_array($result)) { ?>
	<option value=<?php echo $row[0];?>><?php echo $row[2];?></option>
	<?php } ?>
	</select>
    <div id="cardiv1">
    <select name="car1"  id="dd1">
	<option value=0>Select Car Model</option>
        </select></div>
      </div>
        <br><br>
        <div id="vs1"><input value="Compare" name="compare" type="submit" align="middle" id="button"
        onclick="return subject_validation();" ></div>
  
</form>

</div>

    
  <div class="one-half last">
    <div class="heading_bg" align="center">
      <h2>Search car </h2>
    </div>
    <form  class="TTWForm" method="post" name="search_car">
     <center> <div id="field1-container" class="field f_50" align="center">
        <input type="text" name="txtlowprice" placeholder="enter low price">
        <br>
      
        Upto 
        <br><input type="text" name="txthighprice" placeholder="enter high price"><br><br>
        <input value="Search" name="search" type="submit" id="button" onClick="return price_srch();" >
         <?php if(isset($_GET["action"]))
							{
								echo "<span class='msg_redcolor'>".$_GET['action']."</span>";
						
							}
							
							?>
      </div>
      
    
      </center>
    </form>
    
 
  </div>
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