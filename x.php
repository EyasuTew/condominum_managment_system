<?php	
require_once('class/emp_acc.php');
require_once('validator.php');
require_once('db.php');
echo $_COOKIE["session_id"];
if(isset($_COOKIE["session_id"]))
{
	echo "zsdsd";
	/*$DB_con= connect();
	$session_id=$_COOKIE["session_id"];

	$stmt = $DB_con->prepare('select * from session where session_id= :session_id ');
	$stmt->bindParam(':session_id',$session_id);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$user_name=$row['user_name'];
	$password=$row['password'];

	$emp_acc_obj=new Emp_acc();
	$result=$emp_acc_obj->login($user_name,$password);
	//unset($emp_acc_obj);*/


}else
{
	/*$user_name=$_POST['username'];
	$password=$_POST['password'];
	if(user_name_validator($user_name) && password_validator($password))
	{
		$emp_acc_obj=new Emp_acc();
		$result=$emp_acc_obj->login($user_name,$password);
		unset($emp_acc_obj);
	}
	else
	{
		header("Location: loginerror.php");
	}*/
}


?>
