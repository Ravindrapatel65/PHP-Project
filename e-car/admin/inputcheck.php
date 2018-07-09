<?php
					  
	  	       $re=$_GET['check'];
   			   $con=mysql_connect("localhost","root","");
			   mysql_select_db("ecar");   
			  /* $qu="select * from car where com_id='$re'";
			   $res=mysql_query($qu);
			  while($r=mysql_fetch_array($res))
			   {
				   				echo '<img src= images\f.png hight=35 width=20><p align=justify>Alredy Exits</img>';

			   }*/?>
			  
			  
			  <table border="1" align="center">
   <tr>
    <td id="m">Car_Image</td>
    <td id="m">Car_Model</td>
    <td id="m">Car_Price</td>
    <td id="m">Action</td>
  </tr>
  
  
  <?php
 
	   
 // $comp=$_POST['company'];
//  echo $comp;
  	$q="select * from car where com_id='$re'";
	$r=mysql_query($q);
	while($row=mysql_fetch_array($r))
	{
		?>
      <tr>  
     <td><img src="<?php echo $row[1]; ?>" width="100" height="80"></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[10]; ?></td>
    <td><a href="caredit.php?id=<?php echo $row[0]; ?>">Edit</a>&nbsp;&nbsp;<a href="cardel.php?id=<?php echo $row[0]; ?>">Delete</a></td></tr>
    <?php
    }
  
	?>
  
</table>

