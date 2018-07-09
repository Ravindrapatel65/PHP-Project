

<?php $car=intval($_GET['car']);
$con = mysql_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('ecar');
$query="SELECT * FROM car WHERE com_id='$car'";
$result=mysql_query($query);

?>
<select name="car1"  id="dd1" onchange="getver1(<?php echo $car?>,this.value)">
<option>Select Car Model</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row[0];?>><?php echo $row[2];?></option>
<?php } ?>
</select>
