
// validate property class Form

function validatePCfrm()
{
	var error="";
	var status= true;
	if (document.add_pclasses.pclassname.value == "")
	{
		error += "Property Class Name Required.!!\n";
		status = false;
		document.add_pclasses.pclassname.focus();
	}
	if (status == false)
	{
		alert(error);
		return false;
	}
	else
	{
		return true;
	}
}

//  validate user form

function validateUserfrm()
{
	var error="";
	var status= true;
	var emailpattern = /^[A-Za-z0-9\-\.\_]+\@[A-Za-z0-9\-\.]+\.[a-zA-Z]+$/;
	if (document.frmuser.fname.value == "")
	{
		error += "First Name Required.!!\n";
		status = false;
		document.frmuser.fname.focus();
	}
	if (document.frmuser.lname.value == "")
	{
		error += "Last Name Required.!!\n";
		status = false;
		document.frmuser.lname.focus();
	}
	if (document.frmuser.email.value == "")
	{
		error += "Email Address Required.!!\n";
		status = false;
		document.frmuser.email.focus();
	}
	if (document.frmuser.phone.value == "" || isNaN(document.frmuser.phone.value))
	{
		error += "Contact No. Required.!!\n";
		status = false;
		document.frmuser.phone.focus();
	}
	if (document.frmuser.address.value == "")
	{
		error += "Address Required.!!\n";
		status = false;
		document.frmuser.address.focus();
	}
	if (!emailpattern.test(document.frmuser.email.value))
	{
	error += "Enter a valid email address.!!\n";
	status = false;
	document.frmuser.email.focus();
	}
	if (status == false)
		{
			alert(error);
			return false;
		}
	else
		{
			return true;
		}
}

// check for spaces
function nospaces(t)
{
	if(t.value.match(/\s/g))
	{
	alert('Sorry, you are not allowed to enter any spaces.!!');
	t.value=t.value.replace(/\s/g,'');
	}
}






