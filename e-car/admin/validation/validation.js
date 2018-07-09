function allLetter()
{ 
	var uzip = document.registration_form.txtname;
	var letters = /^[A-Za-z]+$/;
	if(uzip.value.match(letters))
	{
		return true;
	}
	else
	{
		alert('Username must have alphabet characters only');
		uzip.focus();
		return false;
	}
}



function upload_car()
{
	if(document.car_upload.company.value==0)
	{
		alert("Please select company...");
		document.car_upload.company.focus();
		return false;
	}
	else if(document.car_upload.carimage.value=="")
	{
		alert("Please select car image...");
		document.car_upload.carimage.focus();
		return false;
	}
	else if(document.car_upload.txtmodel.value=="")
	{
		alert("Please enter car model...");
		document.car_upload.txtmodel.focus();
		return false;
	}
	else if(document.car_upload.txtcc.value=="")
	{
		alert("Please enter cc...");
		document.car_upload.txtcc.focus();
		return false;
	}

else if(document.car_upload.fuel.value==0)
	{
		alert("Please select fuel...");
		document.car_upload.fuel.focus();
		return false;
	}
	else if(document.car_upload.txtseating.value=="")
	{
		alert("Please enter seating capacity...");
		document.car_upload.txtseating.focus();
		return false;
	}
	else if(document.car_upload.txtavg.value=="")
	{
		alert("Please enter avg km...");
		document.car_upload.txtavg.focus();
		return false;
	}
	else if(document.car_upload.txtamount.value=="")
	{
		alert("Please enter car amount...");
		document.car_upload.txtamount.focus();
		return false;
	}
}


function upcoming_car()
{
	if(document.car_upcoming.company.value==0)
	{
		alert("Please select company...");
		document.car_upcoming.company.focus();
		return false;
	}
	else if(document.car_upcoming.carimage.value=="")
	{
		alert("Please select car image...");
		document.car_upcoming.carimage.focus();
		return false;
	}
	else if(document.car_upcoming.txtmodel.value=="")
	{
		alert("Please enter car model...");
		document.car_upcoming.txtmodel.focus();
		return false;
	}
	/*else if(document.car_upcoming.txtcc.value=="")
	{
		alert("Please enter cc...");
		document.car_upcoming.txtcc.focus();
		return false;
	}*/

else if(document.car_upcoming.fuel.value==0)
	{
		alert("Please select fuel...");
		document.car_upcoming.fuel.focus();
		return false;
	}
	/*else if(document.car_upcoming.txtseating.value=="")
	{
		alert("Please enter seating capacity...");
		document.car_upcoming.txtseating.focus();
		return false;
	}
	else if(document.car_upcoming.txtavg.value=="")
	{
		alert("Please enter avg km...");
		document.car_upcoming.txtavg.focus();
		return false;
	}*/
	else if(document.car_upcoming.txtamount.value=="")
	{
		alert("Please enter car amount...");
		document.car_upcoming.txtamount.focus();
		return false;
	}
}


function upload_comp()
{
	
	if(document.comp_upload.complogo.value=="")
	{
		alert("Please select car logo...");
		document.comp_upload.complogo.focus();
		return false;
	}
	else if(document.comp_upload.txtcomp.value==0)
	{
		alert("Please select company...");
		document.comp_upload.txtcomp.focus();
		return false;
	}
}

function isNumber(event) 
{
	var KeyBoardCode = (event.which) ? event.which : event.keyCode;
    if (KeyBoardCode > 31 && (KeyBoardCode < 48 || KeyBoardCode > 57))
	{
		alert("Enter numeric value only");
		document.registration_form.txtcontact.value="";
		return false;
    }	
	return true;
}


function restrict()
{
	var uzip = document.registration_form.txtcontact;
	
	if(uzip.value.length<10 || uzip.value.length>10)
	{
		alert('Mobile No. must have 10 numeric digits only');		
		document.registration_form.txtcontact.focus();
		return false;		
	}	
}



//================ View_Doubt Validation ==========================================

function solution_validation()
{
	if(document.post_solution.solution.value=="")
	{
		alert("Please enter solution");
		document.post_solution.solution.focus();
		return false;
	}
	
}


//================ Forget_Password Validation ==========================================

function forget_validation()
{
	if(document.forget_pwd.forget.value=="")
	{
		alert("Please enter ur mail-id");
		document.forget_pwd.forget.focus();
		return false;
	}	
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.forget_pwd.forget.value)))
    {
            window.alert("Please enter valid email address!");
            document.memberLogin.mail.focus();
            return false;
    }
}

//================ Login Validation ==========================================

function login_validation()
{
	if(document.memberLogin.mail.value=="")
	{
		alert("Please enter ur mail-id");
		document.memberLogin.mail.focus();
		return false;
	}	
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.memberLogin.mail.value)))
    {
            window.alert("Please enter valid email address!");
            document.memberLogin.mail.focus();
            return false;
    }
	else if(document.memberLogin.pwd.value=="")
	{
		alert("Please enter ur password");
		document.memberLogin.pwd.focus();
		return false;
	}
}


//================= Post Doubt Validation=========================================

function doubt_validation()
{
	if(document.doubt_form.doubt.value=="")
	{
		alert("Please enter ur doubt");
		//document.doubt_form.doubt.focus();
		return false;
	}	
}

var count = "200";   //Example: var count = "175";
function limiter()
{
	
	var tex = document.doubt_form.doubt.value;
	var len = tex.length;
	//alert(len);
	if(len > count)
	{
		
        tex = tex.substring(0,count);
		document.doubt_form.doubt.value =tex;
        return false;
	}
	document.doubt_form.limit.value = count-len;
}


//================= Password Reset Validation========================================

function reset_validation()
{
	if(document.password_reset.old_pwd.value== "")
	{
		alert("Please enter old password");
		document.password_reset.old_pwd.focus();
		return false;
	}
	else if(document.password_reset.new_pwd.value=="")
	{
		alert("Please enter new password");
		document.password_reset.new_pwd.focus();
		return false;
	}
	else if(document.password_reset.new_pwd.value.length<=6)
	{
		alert("Please enter password more than 6 characters");
		document.password_reset.new_pwd.focus();
		return false;
	}
	else if(document.password_reset.con_pwd.value=="")
	{
		alert("Please enter confirm password");
		document.password_reset.con_pwd.focus();
		return false;
	}		
}

//================= Mobile No. Validation=======================

function f1()
{
	document.registration_form.fname.focus();
	return true;
}



