<?php
    session_start();
    include_once('../validator.php');
    include_once('../../class/applicant.php');
    include_once('../../class/audit.php');
    $applicant_id=$_POST["applicant_id"];
    $house_type=$_POST["house_type"];
    $bedroom=$_POST["bedroom"];
    $emp_id=$_SESSION["emp_id"];

    $tempdate = new DateTime();
    $date=$tempdate->format('Y-m-d h:m:s');

    if(applicantid_validator($applicant_id) && housetype_validator($house_type) && bedroom_validator($bedroom))
    {
    	$applicantObject=new Applicant();
    	$result=$applicantObject->update($applicant_id,$house_type,$bedroom);
        //SAVE THE ACTION PERFORMED BY EMPLOYEES , IT MUST BE AFTER SUCCESS OF REGISTERING APPLICANT, I.E THE $resul value from Applicant Class should be '3rd'
        $action="Update";
        $auditObject= new Audit();
        $auditObject->save($emp_id,$applicant_id,$action,$date);

    	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>'.$result.'!</center>
                        </b>
                    </div>';

    }else
    {
    		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>Invalid data to update applicant information please use valid data and try again!</center>
                        </b>
                    </div>';

    }
				 
?>
