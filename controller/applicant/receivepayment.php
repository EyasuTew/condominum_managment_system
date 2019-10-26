<?php	
	session_start();
	include_once('../validator.php');
	include_once('../../class/applicant.php');
	include_once('../../class/audit.php');

try{
	$applicant_id=$_POST['applicant_id'];	
	$amount=$_POST['amount'];
	$employee_id=$_POST['employee_id'];	
	$emp_id=$_SESSION['emp_id'];			

	$tempdate = new DateTime();
	$date=$tempdate->format('Y-m-d h:m:s');
	$deleted_date=$date;
	if($employee_id==$emp_id)
	{

		$applicantObject= new Applicant();
		$result=$applicantObject->receivePayment($applicant_id,  $emp_id, $date, $amount);

		if($result=="ye")
		{
			$action="Recivepayment";
			$auditObject= new Audit();
			$auditObject->save($emp_id,$applicant_id,$action,$date);
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Payment received succesfully! With amount: '.$amount.'birr</center>
                    </b>
                </div>';
		}else if($result=="un") 
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Unable to receive payment tray again!</center>
                    </b>
                </div>';
			
		}else if($result=="ex")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Applicant deletion unsuccessful try again!</center>
                    </b>
                </div>';
		}
		else if($result=="uf")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Applicant can not found try again!</center>
                    </b>
                </div>';
		}
		else
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
                    <b><center>Invalid applicant id please enter valid data and try again! </center>
                    </b>
                </div>';
                		
	}
}catch(Exception $ex)
{
	echo $ex->getMessage();
}
?>
