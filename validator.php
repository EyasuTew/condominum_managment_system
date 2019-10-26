<?php
function name_validator($val)
{
	$nameRegex = "/^[A-Z][a-z]+$/";
	if (preg_match($nameRegex,$val) && ($val!=""||$val!=NULL))
	{
		return true;
	} else 
	{
		return false;
	}

}

function sex_validator($val)
{
	$emailRegex = "/[FM]/i";
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
	$passwordRegex = "/^[A-Za-z0-9.,!?_&*^%$#@!]{6,20}$/i";
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


?>