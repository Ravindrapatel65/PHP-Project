<?php
include("connection.php");
	
	$cid=$_REQUEST['cid'];
	if($cid== "renew")
{
?>
<td>Make Year</td>
<td>
                <input type="hidden" id="hidnyear" name="hidnyear" />

 <select id="year" name="year" style="width:155px;" onchange="getyear()" ><option >--Select--</option>
  <?php
			if(isset($_SERVER['PHP_SELF']))
			{
					echo "
           
<option  value='0'>2014</option>
<option  value='1'>2013</option>
<option  value='2'>2012</option>
<option  value='3'>2011</option>
<option  value='4'>2010</option>
<option  value='5'>2009</option>
<option  value='6'>2008</option>
<option  value='7'>2007</option>
<option  value='8'>2006</option>
<option  value='9'>2005</option>
<option  value='10'>2004</option>
<option  value='11'>2003</option>
<option  value='12'>2002</option>
<option  value='13'>2001</option>
<option  value='14'>2000</option>
<option  value='15'>1999</option>
<option  value='16'>1998</option>
<option  value='17'>1997</option>
<option  value='18'>1996</option>
<option  value='19'>1995</option>
<option  value='20'>1994</option>
<option  value='21'>1993</option>
<option  value='22'>1992</option>
<option  value='23'>1991</option>
<option  value='24'>1990</option>
<option  value='25'>1989</option>
<option  value='26'>1988</option>
<option  value='27'>1987</option>
<option  value='28'>1986</option>
<option  value='29'>1985</option>
<option  value='30'>1984</option>
<option  value='31'>1983</option>
<option  value='32'>1982</option>
<option  value='33'>1981</option>
<option  value='34'>1980</option>
";           
			}
?>

</select>

<?php } ?>