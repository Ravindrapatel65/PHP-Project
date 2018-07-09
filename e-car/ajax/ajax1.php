<?php
	
	$cid=$_REQUEST['cid'];
	if($cid== "n")
	{?><tr>
		<td>User Name : </td>
		<td>
  		<?php echo "<input type='text' placeholder='User Name'>"; ?>
		</td>
        <td>Password : </td>
        <td><?php echo "<input type='text' placeholder='Password'>"; ?></td>
</tr>
<?php } 

	else if($cid=="c")
	{ ?><tr>
		<td>Card No.:</td>
		<td>
  		<?php echo "<input type='text' placeholder='Card Number'>"; ?>
		</td>
        <td>Name of Card :</td>
        <td><?php echo "<input type='text' placeholder='Name of Card'>"; ?></td>
        <td>Expier Date :</td>
		<td>
  		<?php echo "<input type='text' placeholder='Expier Date'>"; ?>
		</td>
        <td>CV :</td>
        <td><?php echo "<input type='text' placeholder='Cv'>"; ?></td>
</tr>
<?php } 

	else { ?><tr>
			<td>Card No.:</td>
		<td>
  		<?php echo "<input type='text' placeholder='Card Number'>"; ?>
		</td>
        <td>Name of Card :</td>
        <td><?php echo "<input type='text' placeholder='Name of Card'>"; ?></td>
        <td>Card Issuedate</td>
        <td><?php echo "<input type='text' placeholder='Card Issuedate'>"; ?></td>
        <td>CV :</td>
        <td><?php echo "<input type='text' placeholder=''>"; ?></td>
</tr>
<?php } ?>