		function username_validator(val)
		{
			var usernameRegex=/^[A-Za-z][A-Za-z0-9]{5,20}$/i;
			if(val.match(usernameRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function empid_validator(val)
		{
			var empidRegex=/^[CBA][AMN][0-9]{2,5}$/;
			if(val.match(empidRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function applcantusername_validator(val)
		{
			/*var applicantusernameRegex= /(AP-)^[A-Za-z0-9]{3,15}$/;
			//var applicantusernameRegex= -{2,6};
			if(val.match(applicantusernameRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			if(val.includes("AP-"))
			{
				return true;
			}else
			{
				return false;
			}
		}
		function residentid_validator(val)
		{
			var residentidRegex=/^BSR[0-9]{1,6}$/;
			if(val.match(residentidRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function maritalid_validator(val)
		{
			var residentidRegex=/^BSM[0-9]{1,6}$/;
			if(val.match(residentidRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function name_validator(val)
		{
			var empidRegex=/^[A-Z][a-z]+$/;
			if(val.match(empidRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function password_validator(val)
		{
			var passwordRegex=/^[A-Za-z0-9.,!_&*^%$#@!]{6,20}$/i;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function gender_validator(val)
		{
			var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}
		}

		function blockmodel_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}

		function sitename_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}

		function floornumber_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}
		function roomnumber_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}
		function housenumber_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}
		function shopenumber_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}

		function projecttype_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}
		

		function blocktype_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}

		function blockid_validator(val)
		{
			/*var passwordRegex=/[FM]/;
			if(val.match(passwordRegex))
			{
				return true;
			}else
			{
				return false;
			}*/
			return true;
		}

		function date_validator(val)
		{
			/*alert(val);
			//var dateRegex=/[0-9]{1,2}[/-\][0-9]{1,2}[/-\][0-9]{4}/;
			//var dateRegex=/[0-9]{4}[/-\][0-9]{1,2}[/-\][0-9]{1,2}/;
			var dateRegex = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;

			if(val.match(dateRegex))
			{

				return true;
			}else
			{
				return true;
			}*/
			return true;
		}

		function userid_validation(uid,mx,my)
		{
			var uid_len = uid.value.length;
			if (uid_len == 0 || uid_len >= my || uid_len < mx)
			{
			document.getElementById("div1").innerHTML="<p class='err' color='red'>User Id should not be empty / length be between "+mx+" to "+my+"</p>";
			document.getElementById("userid").style.BorderColor="red";
			uid.focus();
			return false;
			}else{
			document.getElementById("div1").innerHTML="";
			return true;
			}
		}

function username_validator(val)
{
	var usernameRegex=/^[A-Za-z][A-Za-z0-9]{5,20}$/i;
	if(val.match(usernameRegex))
	{
		return true;
	}else
	{
		return false;
	}
}

function select_validator(val)
{
	var selectRegex1=/^[a-z0-9]{2,5}$/i;
	var selectRegex2=/^[a-z0-9-]{2,20}$/i;

	if(val.match(selectRegex1) && val!="no")
	{
		return true;
	}else if(val.match(selectRegex2) && val!="no")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function housetype_validator(val)
{
	if(val=="10/90" || val=="20/80" || val=="40/60")
	{
		return true;
	}else if(val=="no")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function bedroom_validator(val)
{
	var bedroomRegex=/^[1234]$/;

	if(val.match(bedroomRegex) && val!="no")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function registrationturn_validator(val)
{
	var registrationturnRegex=/^[0-9]*$/;

	if(val.match(registrationturnRegex) && val!="no")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function amount_validator(val)
{
	//var registrationturnRegex=/^[0-9]*$/;

	/*if(val.match(registrationturnRegex) && val!="no")
	{
		return true;
	}
	else
	{
		return false;
	}*/
	return true;
}

function email_validator(val)
{
	var emailRegex= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(val.match(emailRegex))
	{
	return true;
	}
	else
	{
	return false;
	}
}

function contact_validator(val)
{
	var contactRegex1= /^(\+\d{1,3}[-]?)?\d{10}$/;
	var contactRegex2= /^09[0-9]{8}$/;
	if(val.match(contactRegex1) || val.match(contactRegex2))
	{
	return true;
	}
	else
	{
	return false;
	}
}

function income_validator(val)
{
//	try{
	var incomeRegex= /^[1-9][0-9]{2,10}$/;
	// var incomeRegex=/^\d{1,6}\.\d{0,2}$/;
	valint= parseInt(val);

	if(val.match(incomeRegex))
	{
		//alert(valint+3);
	return true;
	}
	else
	{
	//	alert(valint-3);
	return false;
	}
/*}catch(erro){
	alert(erro);
}*/
}

function password_validator(val)
{
	var passwordRegex=/^[A-Za-z0-9.,!/?><;:\|+_)(&*^%$#@!]{6,20}$/i;
	if(val.match(passwordRegex))
	{
		return true;
	}else
	{
		return false;
	}
}

function savingaccountno_validator(val)
{
	var savingaccountnoRegex=/^[1-9][0-9]{6,20}$/;
	if(val.match(savingaccountnoRegex))
	{
		return true;
	}else
	{
		return false;
	}
}

function educationallevel_validator(val)
{
	if(val=="Illitrate" || val=="Grade8" || val=="Grade10" || val=="Grade12" || val=="Certificate" || val=="Diploma" || val=="Degree" || val=="Masters" || val=="Doctor" || val=="Profesor")
	{
		return true;
	}else if(val!="no")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function nationality_validator(val)
{
	if(val=="Ethiopian" || val=="Indian" || val=="American")
	{
		return true;
	}else if(val!="")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function applicantid_validator(val)
{
	var applicantidRegex=/^BSA[0-9]{1,6}$/;
	if(val.match(applicantidRegex))
	{
		return true;
	}else
	{
		return false;
	}
}

function causetype_validator(val)
{
	if(val=="Health" || val=="Loss"){
		return true;
	}else if(val=="no")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function causedetail_validator(val)
{
	if(val.length>5)
	{
		return true;
	}else
	{
		return false;
	}
}

function newstitle_validator(val)
{
	if(val.length>5)
	{
		return true;
	}else
	{
		return false;
	}
}

function newspart_validator(val)
{
	if(val.length>10)
	{
		return true;
	}else
	{
		return false;
	}
}

function commentpart_validator(val)
{
	if(val.length>10)
	{
		return true;
	}else
	{
		return false;
	}
}

function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
//alert("Password should not be empty / length be between "+mx+" to "+my);
document.getElementById("div2").innerHTML="<p class='err' color='red'>Password should not be empty / length be between "+mx+" to "+my+"</p>";
passid.focus();
return false;
}
document.getElementById("div2").innerHTML="";
return true;
}

function allLetter(uname)
{
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
	document.getElementById("div3").innerHTML="";
return true;
}
else
{
//alert('Username must have alphabet characters only');
document.getElementById("div3").innerHTML="<p class='err' color='red'>Username must have alphabet characters only</p>";
uname.focus();
return false;
}
}
function alphanumeric(uadd)
{
	var letters = /^[0-9a-zA-Z]+$/;
	if(uadd.value.match(letters))
	{
		document.getElementById("div4").innerHTML="";
	return true;
	}
	else
	{
	//alert('User address must have alphanumeric characters only');
	document.getElementById("div4").innerHTML="<p class='err' color='red'>Username must have alphabet characters only</p>";
	uadd.focus();
	return false;
	}
}


function countryselect(ucountry)
{
if(ucountry.value == "Default")
{
//alert('Select your country from the list');
document.getElementById("div5").innerHTML="<p class='err' color='red'>Select your country from the list</p>";
ucountry.focus();
return false;
}
else
{
	document.getElementById("div5").innerHTML="";
return true;
}
}

function allnumeric(uzip)
{
var numbers = /^[0-9]+$/;
if(uzip.value.match(numbers))
{
	document.getElementById("div6").innerHTML="";
return true;
}
else
{
//alert('ZIP code must have numeric characters only');
document.getElementById("div6").innerHTML="<p class='err' color='red'>ZIP code must have numeric characters only</p>";
uzip.focus();
return false;
}
}



function validsex(umsex,ufsex)
{
x=0;

if(umsex.checked)
{
x++;
} if(ufsex.checked)
{
x++;
}
if(x==0)
{
//alert('Select Male/Female');
document.getElementById("div8").innerHTML="<p class='err' color='red'>Select Male/Female</p>";
umsex.focus();
return false;
}
else
{
document.getElementById("div8").innerHTML=""
alert('Form Succesfully Submitted');
window.location.reload()
return true;
}
}
