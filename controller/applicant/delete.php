<?php	
 	session_start();
	//include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/applicant.php');
	include_once('../../class/audit.php');

try{

	$applicant_id=$_POST['applicant_id'];	
	$resident_id=$_POST['resident_id'];	
	$registration_date=$_POST['registration_date'];	
	//$deleted_date=$_POST['deleted_date'];	
	$house_type=$_POST['house_type'];	
	$bedroom=$_POST['bedroom'];	
	$cause_type=$_POST['cause_type'];	
	$cause=$_POST['cause'];
	$emp_id=$_SESSION["emp_id"];			

	$tempdate = new DateTime();
	$date=$tempdate->format('Y-m-d h:m:s');
	$deleted_date=$date;
	if(residentid_validator($resident_id) && causetype_validator($cause_type) && causedetail_validator($cause))
	{

		$applicantObject= new Applicant();
		$result=$applicantObject->delete($applicant_id, $resident_id, $registration_date, $deleted_date, $house_type, $bedroom, $cause_type, $cause);

		if($result=="ye")
		{
			$action="Delete";
	        $auditObject= new Audit();
	        $auditObject->save($emp_id,$applicant_id,$action,$date);
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Applicant delete succesfully!</center>
                    </b>
                </div>';
		}else if($result=="un") 
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Applicant deletion unsuccessful try again!</center>
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
