<?php
					  
	  	       $re=$_GET['check'];
   			   $con=mysql_connect("localhost","root","");
			   mysql_select_db("ecar");   
			   $qu="select * from user where user_name='$re'";
			   $res=mysql_query($qu);
			   if(mysql_num_rows($res)==1)
			   {
				   				echo '<img src= images\f.png hight=35 width=20><p align=justify>Alredy Exits</img>';

			   }
			   else 
	   		   {
			   					echo '<img src= images\tr.png hight=35 width=20></img>';

			   }
?>
