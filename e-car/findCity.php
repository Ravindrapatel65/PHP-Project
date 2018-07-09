
<?php 
include('conn.php');
$stateId=intval($_GET['state']);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$query="SELECT * FROM city WHERE stateid='$stateId'";
$result=mysql_query($query);

?>
<select name="city">
<option value=0>Select City</option>
<?php while($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row[0]; ?>"><?php echo $row[1];?></option>
<?php } ?>
</select>
