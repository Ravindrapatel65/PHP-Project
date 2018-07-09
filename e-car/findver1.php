
<?php $car=intval($_GET['car']);
$ver=intval($_GET['ver']);
$con = mysql_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('ecar');
$query="SELECT * FROM car WHERE com_id='$car'";
$result=mysql_query($query);

?>
<select name="ver1"  id="dd1">
<option>Select Car Version</option>
<?php while($row=mysql_fetch_array($result)) { ?>
<option value><?php echo $row[3];?></option>
<?php } ?>
</select>
