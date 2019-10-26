<?php	
include_once('db.php');
include_once('validator.php');
include_once('../../class/emp_acc.php');

$empid=$_POST["empid"];
$username=$_POST["username"];
$password=$_POST["password"];
$DB_con = connect();
if(empid_validator($empid) && user_name_validator($username) && password_validator($password))
{
	$emp_acc_obj=new Emp_acc();
	$result=$emp_acc_obj->update($empid,$username,$password);

	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>'.$result.'!</center>
                    </b>
                </div>';
}else
{
		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid data to update user account please use valid data and try again!.</center>
                    </b>
                </div>';

}
				 
?>
