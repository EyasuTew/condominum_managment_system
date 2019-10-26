<?php	
require_once('../../class/emp_acc.php');
require_once('../../class/app_acc.php');
require_once('../validator.php');
require_once('../db.php');
if(isset($_COOKIE["sessionId"]))
{
	//echo "cc";
	try{
	$DB_con= connect();
	$session_id=$_COOKIE["sessionId"];

	$stmt = $DB_con->prepare('select * from session where session_id= :session_id ');
	$stmt->bindParam(':session_id',$session_id);
	$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$user_name=$row['user_name'];
	$password=$row['password'];
	//echo "<script>alert()</script>"
	if(substr($user_name, 0, 3)=="AP-")
	{
		$app_acc_obj=new App_acc();
		$result=$app_acc_obj->login($user_name,$password);
		unset($app_acc_obj);
	}else
	{
		$emp_acc_obj=new Emp_acc();
		$result=$emp_acc_obj->login($user_name,$password);
		unset($emp_acc_obj);
	}

	}catch(Exception $ex)
	{
		echo $ex->getMessage();
	}

}
else
{
	try{
		$user_name=$_POST['username'];
		$password=md5($_POST['password']);//&& password_validator($password)
		/*if(isset($_POST['password']))
		{
			echo "seted";
		}*/

		if(user_name_validator($user_name) || applcantusername_validator($user_name))
		{
			//echo $password;
			if(substr($user_name, 0, 3)=="AP-")
			{
				$app_acc_obj=new App_acc();
				$result=$app_acc_obj->login($user_name,$password);
				unset($app_acc_obj);
			}else
			{
				$emp_acc_obj=new Emp_acc();
				$result=$emp_acc_obj->login($user_name,$password);
				unset($emp_acc_obj);
			}

		}
		else
		{
			//header("Location: ../../loginerror.php");
		}
	}catch(Exception $ex)
	{
		echo $ex->getMessage();
	}
}

	/*$user_name='Eyasuy';
	$password='123456';
	
	$emp_acc_obj=new Emp_acc();
	$result=$emp_acc_obj->login($user_name,$password);
	/*unset($emp_acc_obj);*/


?>
