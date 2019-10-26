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
	if(preg_match($incomeRegex1,$val))
	{
		return true;
	}
	else
	{
		return false;
	}
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