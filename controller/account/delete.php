<?php	
	include_once('db.php');
	include_once('validator.php');
	include_once('../../class/emp_acc.php');

	$empid=$_POST["empid"];
	$DB_con = connect();
	$emp_acc_obj=new Emp_acc();
	$result=$emp_acc_obj->delete($empid);
	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>'.$result.'</center>
                    </b>
                </div>';
?>
