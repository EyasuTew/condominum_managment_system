<?php	
require_once('../../class/emp_acc.php');
require_once('../../class/app_acc.php');
require_once('../validator.php');
require_once('../db.php');
if(isset($_COOKIE["sessionId"]))
{
	try{
	$DB_con= connect();
	$session_id=$_COOKIE["sessionId"];
	echo $_COOKIE["sessionId"];

	$stmt = $DB_con->prepare('select * from session where session_id= :session_id');
	$stmt->bindParam(':session_id',$session_id);
	$stmt->execute();
/*$stmt = $DB_con->prepare('select * from emp_acc where user_name= :un and password= :up');
$stmt->bindParam(':un',$user_name);
	    $stmt->bindParam(':up',$password);*/
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$user_name=$row['user_name'];
	$password=$row['password'];

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
?>
