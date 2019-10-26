<?php	
	include_once('../db.php');
	include_once('validator.php');
	include_once('../../class/emp_acc.php');

	$emp_id=$_POST["empid"];
	$user_name=$_POST["username"];
	$password=md5($_POST["password"]);
	$user_type=$_POST["usertype"];//&& password_validator($password)
	if(empid_validator($emp_id) && user_name_validator($user_name) &&  usesr_type_validator($user_type))
	{
		$emp_acc_object= new Emp_acc();
		$result=$emp_acc_object->create($emp_id,$user_name,$password,$user_type);
		if($result=="ye")
		{
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>User account created succesfully!</center>
                    </b>
                </div>';
		}else if($result=="found")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Employee with id '.$emp_id.' has user account!</center>
                    </b>
                </div>';
		}else if($result=="un") 
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>User account creation unsuccessful try again!</center>
                    </b>
                </div>';
			
		}else if($result=="no")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Employee with id '.$emp_id.' was not found!</center>
                    </b>
                </div>';
		}else
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>'.$result.'</center>
                    </b>
                </div>';
		}
	}else
	{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid data to create user account please enter valid data and try again! </center>
                    </b>
                </div>';
	}
?>
