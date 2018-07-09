<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">

   	function payment(st)
	{
		
		var a;
		if(window.XMLHttpRequest)
		{
			a=new XMLHttpRequest;
		}
		else
		{
			a=new activexObject("microsoft.XMLHTTP");
			
		}
		
		a.open("GET","ajax1.php?cid="+st,true);
		a.send();
		a.onreadystatechange= function()
		{
			if(a.readyState==4)
			{
				document.getElementById("pay").innerHTML=a.responseText;
			}
		}
	}

</script>
</head>

<body>
<select  onchange="payment(this.value)" style="width:155px;" name="payment"><option >--Select--</option>
<option  value="c">Credit Card</option>
<option value="n">Net Banking</option>
<option value="d">Debit Card</option>
</select>
<div id="pay">
	
</div>

</body>
</html>