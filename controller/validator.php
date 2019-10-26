<?php

function name_validator($val)
{
	$nameRegex ="/^[A-Z][a-z]+$/";
	if (preg_match($nameRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}

}
function empid_validator($val)
{
	$nameRegex = "/^[CBA][AMN][0-9]{2,5}$/";
	if (preg_match($nameRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}

}
function residentid_validator($val)
{
	$residentidRegex = "/^BSR[0-9]{1,6}$/";
	if (preg_match($residentidRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}
}
function applicantid_validator($val)
{
	$applicantidRegex = "/^BSA[0-9]{1,6}$/";
	if (preg_match($applicantidRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}
}

function maritalid_validator($val)
{
	$maritalidRegex = "/^BSM[0-9]{1,6}$/";
	if (preg_match($maritalidRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}
}

function gender_validator($val)
{
	$genderRegex = "/[FM]/i";

	if (preg_match($genderRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}

}

function user_name_validator($val)
{
	$user_nameRegex = "/^[A-Za-z][A-Za-z0-9]{5,20}$/i";
	if (preg_match($user_nameRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}
}

function password_validator($val)
{
	$passwordRegex = "/^[A-Za-z0-9.+_)(&*^%$#@!]{6,20}$/i";
	if (preg_match($passwordRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}
}

function email_validator($val)
{
	$emailRegex = "/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i";
	if (preg_match($emailRegex,$val))
	{
		return true;
	} else
	{
		return false;
	}
}
function usesr_type_validator($usertype)
{
	if($usertype=='BSC' ||$usertype=='CBE' ||$usertype=='MG' || $usertype=='Admin')
	{
		return true;
	}else
	{
		return false;
	}
}

function select_validator($val)
{
	$selectRegex1="/^[a-z0-9]{2,5}$/i";
	$selectRegex2="/^[a-z0-9-]{2,20}$/i";
	if (preg_match($selectRegex1,$val) || preg_match($selectRegex2,$val) )
	{
		return true;
	} else
	{
		return false;
	}
}

function contact_validator($val)
{
	$contactRegex1="/^(\+\d{1,3}[-]?)?\d{10}$/";
	$contactRegex2="/^09[0-9]{8}$/";
	if(preg_match($contactRegex1,$val) || preg_match($contactRegex2,$val) )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function income_validator($val)
{
	$incomeRegex= "/^[1-9][0-9]{2,10}$/";
	if(preg_match($incomeRegex,$val))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function savingaccountno_validator($val)
{
	$savingaccountnoRegex="/^[1-9][0-9]{6,20}$/";
	if(preg_match($savingaccountnoRegex,$val))
	{
		return true;
	}else
	{
		return false;
	}
}

function educationallevel_validator($val)
{
	if($val=="Illitrate" || $val=="Grade8" || $val=="Grade10" || $val=="Grade12" || $val=="Certificate" || $val=="Diploma" || $val=="Degree" || $val=="Masters" || $val=="Doctor" || $val=="Profesor")
	{
		return true;
	}else if($val!="no")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function nationality_validator($val)
{
	if($val=="Ethiopian" || $val=="Indian" || $val=="American")
	{
		return true;
	}else if($val!="")
	{
		return false;
	}
	else
	{
		return false;
	}
}
function date_validator($val)
{
	return true;
}

function registrationturn_validator($val)
{
	$registrationturnRegex="/^[0-9]*$/";

	if(preg_match($registrationturnRegex,$val) && $val!="no")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function bedroom_validator($val)
{
	$bedroomRegex="/^[1-9]*$/";

	if(preg_match($bedroomRegex,$val) && $val!="no")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function housetype_validator($val)
{
	if($val=="10/90" || $val=="20/80" || $val=="40/60")
	{
		return true;
	}else if($val=="no")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function causetype_validator($val)
{
	if($val=="Health" || $val=="Loss"){
		return true;
	}else if($val=="no")
	{
		return false;
	}
	else
	{
		return false;
	}
}

function causedetail_validator($val)
{
	if(strlen($val)>5)
	{
		return true;
	}else
	{
		return false;
	}
}

function newstitle_validator($val)
{
	if(strlen($val)>5)
	{
		return true;
	}else
	{
		return false;
	}
}

function newspart_validator($val)
{
	if(strlen($val)>10)
	{
		return true;
	}else
	{
		return false;
	}
}

function newsid_validator($val)
{
	$newsidRegex="/^[1-9][0-9]*$/";

	if(preg_match($newsidRegex,$val) && $val!="")
	{
		return true;
	}
	else
	{
		return false;
	}
}


function blockmodel_validator($val)
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

function sitename_validator($val)
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

function floornumber_validator($val)
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
function roomnumber_validator($val)
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
function housenumber_validator($val)
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
function shopenumber_validator($val)
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

function projecttype_validator($val)
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


function blocktype_validator($val)
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
function applcantusername_validator($val)
{
	$applicantidRegex= "/^AP-[A-Za-z0-9]{3,15}$/";
	if(preg_match($applicantidRegex,$val))
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>
