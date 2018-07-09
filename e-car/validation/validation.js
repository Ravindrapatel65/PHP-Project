//================= Registration Validation=======================
function subject_validation()
{
	if(document.subject_insertion.company.value==0)
	{
		alert("Please select a company");		
		document.subject_insertion.company.focus();
		return false;
		
	}
	else if(document.subject_insertion.car.value==0)
	{
		alert("Please select a car");
		return false;
		document.subject_insertion.car.focus();
		
	}
	else if(document.subject_insertion.company1.value==0)
	{
		alert("Please select a company");
		return false;		
		document.subject_insertion.company1.focus();
		
		
	}
	else if(document.subject_insertion.car1.value==0)
	{
		alert("Please select a car");
		return false;
		document.subject_insertion.car1.focus();
		
	}
	//subject_insertion.submit(); 
}

function price_srch()
{
	 if(document.search_car.txtlowprice.value=="")
	{
		alert("Please insert low price");		
		document.search_car.txtlowprice.focus();
		return false;
		
	}
	else if(document.search_car.txthighprice.value=="")
	{
		alert("Please insert high price");		
		document.search_car.txthighprice.focus();
		return false;
		
	}
	/*else{
	var low=document.search_car.txtlowprice.value;
	var high=document.search_car.txthighprice.value;
	if(low.length >=high.length)
	{
		alert("Please enter proper price");
		return false;
	}
	else if(low>=high)
	{
		alert("Please enter proper price");
		return false;
	}
	
	}*/
	
	
	
	//subject_insertion.submit(); 
}















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


function feedback_validation()
{
	if(document.feedback.txtnm.value=="")
	{
		alert("Please enter name...");
		document.feedback.txtnm.focus();
		return false;
	}
	else if(document.feedback.txtcont.value=="")
	{
		alert("Please enter mobile no....");
		document.feedback.txtcont.focus();
		return false;		
	}
	else if(document.feedback.txtcont.value.length <= 9 || document.feedback.txtcont.value.length>=11)
	{
		alert("Please enter 10 digits no....");
		document.feedback.txtcont.focus();
		return false;		
	}
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.feedback.txtemail.value)))
    {
            window.alert("Please enter valid email address!");
            document.feedback.txtemail.focus();
            return false;
    }
	else if(document.feedback.fback.value=="")
	{
		alert("Please enter comments...");
		document.feedback.fback.focus();
		return false;
	}
}


function registeration_validation()
{
	if(document.registration_form.txtname.value=="")
	{
		alert("Please enter name...");
		document.registration_form.txtname.focus();
		return false;
	}
	else if(document.registration_form.txtusername.value=="")
	{
		alert("Please enter user name...");
		document.registration_form.txtusername.focus();
		return false;
	}
	else if(document.registration_form.txtpass.value=="")
	{
		alert("Please enter password...");
		document.registration_form.txtpass.focus();
		return false;		
	}
	else if(document.registration_form.txtadd.value=="")
	{
		alert("Please enter address...");
		document.registration_form.txtadd.focus();
		return false;		
	}
	else if(document.registration_form.txtemail.value=="")
	{
		alert("Please enter email id...");
		document.registration_form.txtemail.focus();
		return false;		
	}
	
	
	else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.registration_form.txtemail.value)))
    {
            window.alert("Please enter valid email address!");
            document.registration_form.txtemail.focus();
            return false;
    }	
	
	else if(document.registration_form.txtcontact.value=="")
	{
		alert("Please enter mobile no....");
		document.registration_form.txtcontact.focus();
		return false;		
	}

	

	/*else if(document.registration_form.pwd.value=="")
	{
		alert("Please enter password");
		document.registration_form.pwd.focus();
		return false;		
	}	*/
}


function sell_car()
{
	if(document.sell.carimg.value=="")
	{
		alert("Please select car image...");
		document.sell.carimg.focus();
		return false;
	}
	else if(document.sell.company.value==0)
	{
		alert("Please select company...");
		document.sell.company.focus();
		return false;
	}
	else if(document.sell.car.value==0)
	{
		alert("Please enter car model...");
		document.sell.car.focus();
		return false;
	}
	else if(document.sell.txtyear.value=="")
	{
		alert("Please enter car model year...");
		document.sell.txtyear.focus();
		return false;
	}
	
    else if(document.sell.txtdrivenkm.value==0)
	{
		alert("Please select driven km...");
		document.sell.txtdrivenkm.focus();
		return false;
	}
	else if(document.sell.fuel.value==0)
	{
		alert("Please select fuel...");
		document.sell.fuel.focus();
		return false;
	}
	else if(document.sell.state.value==0)
	{
		alert("Please select state...");
		document.sell.state.focus();
		return false;
	}
	else if(document.sell.city.value==0)
	{
		alert("Please select city...");
		document.sell.city.focus();
		return false;
	}
	else if(document.sell.txtrtono.value=="")
	{
		alert("Please enter RTO no...");
		document.sell.txtrtono.focus();
		return false;
	}
	else if(document.sell.txtrtooffice.value=="")
	{
		alert("Please enter RTO office...");
		document.sell.txtrtooffice.focus();
		return false;
	}
	
	else if(document.sell.txtdis.value=="")
	{
		alert("Please enter car description...");
		document.sell.txtdis.focus();
		return false;
	}
	else if(document.sell.txtexprice.value=="")
	{
		alert("Please enter expected price...");
		document.sell.txtexprice.focus();
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

function Isnum(event) 
{
	var KeyBoardCode = (event.which) ? event.which : event.keyCode;
    if (KeyBoardCode > 31 && (KeyBoardCode < 48 || KeyBoardCode > 57))
	{
		alert("Enter numeric value only");
		document.feedback.txtcont.value="";
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


function payment_validation()
{
	if(document.pay.payment.value==0)
	{
		alert("Please select payment type...");
		document.pay.payment.focus();
		return false;
	}
	/*else if(document.net1.txtcardno.value=="")
	{
		alert("Please enter card no");
		document.net1.txtcardno.focus();
		return false;
	}
	else if(document.net1.txtcardname.value=="")
	{
		alert("Please enter card name");
		document.net1.txtcardname.focus();
		return false;
	}
	else if(document.net1.txtexdate.value=="")
	{
		alert("Please enter expire date");
		document.net1.txtexdate.focus();
		return false;
	}
	else if(document.net1.txtcv.value=="")
	{
		alert("Please enter cv");
		document.net1.txtcv.focus();
		return false;
	}
	else if(document.net.txtnn.value=="")
	{
		alert("Please enter user name");
		document.net.txtnn.focus();
		return false;
	}
	else if(document.net.txtpass.value=="")
	{
		alert("Please enter password");
		document.net.txtpass.focus();
		return false;
	}*/
	
	
}