<link rel="stylesheet" type="text/css" media="screen" href="admin/contact-form/css/style.css">
<?php
	
	$cid=$_REQUEST['cid'];
	if($cid == "Net Banking")
	{?>
    <form name="net">
    <table>
    <tr>
		<td id="m">User Name : </td>
		<td id="m">
  		<input type='text' name='txtnn' required="required" placeholder='User Name'>
		</td></tr><br /><tr>
        <td id="m">Password : </td>
        <td id="m"><input type='text' name='txtpass' required="required" placeholder='Password'></td>
</tr></table>
</form>
<?php } 

	else if($cid=="Credit Card")
	{ ?>
   <form name="net1">
    <table>
    <tr>
		<td id="m">Card No.:</td>
		<td id="m">
  		<input type="text" name="txtcardno" required="required" placeholder="Card Number">
		</td></tr>
        <tr>
       <td id="m">Name of Card :</td>
        <td id="m"><input type='text' name='txtcardname' required="required" placeholder='Name of Card'></td></tr>
       <tr> <td id="m">Expier Date :</td>
		<td id="m">
  		<input type='text' name='txtexdate' required="required" placeholder='Expire Date'>
		</td></tr><tr>
       <td id="m">CV :</td>
        <td id="m"><input type='text' name='txtcv' required="required" placeholder='Cv'></td></tr>
        </table>
    </form>   
<?php } 

	else { ?>
    <form name="net2">
    <table>
    <tr>
			<td id="m">Card No.:</td>
		<td id="m">
  		<input type='text' name='txtcard' required="required" placeholder='Card Number'>
		</td></tr>
        <tr>
        <td id="m">Name of Card :</td>
        <td id="m"><input type='text' name='txtnameofcard' required="required" placeholder='Name of Card'></td>
        </tr>
        <tr>
        <td id="m">Card Issuedate</td>
        <td id="m"><input type='text' name='txtissuedate' required="required" placeholder='Card Issuedate'></td>
        </tr>
        <tr>
        <td id="m">CV :</td>
        <td id="m"><input type='text' name='txtcv1' required="required" placeholder='Cv'></td>
</tr></table>
<?php } ?>
</form>