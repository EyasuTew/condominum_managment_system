<?php	
	include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/resident.php');

try{	
	$DB_con=connect();
	$marital_id=$_POST["marital_id"];
	if(maritalid_validator($marital_id))
	{
		$tempdate = new DateTime();
		$dateexit=$tempdate->format('Y-m-d');

		$residentObject= new Resident();
		$result=$residentObject->deleteMarital($marital_id,$dateexit);
		if($result=="ye")
		{
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Marital information of registered succesfully!</center>
                    </b>
                </div>';
		}else if($result=="un") 
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Marital information registration unsuccessful try again!</center>
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
	            <b><center>Invalid marital id try again! </center>
	            </b></div>';
	}

	}catch(Exception $ex)
	{
		echo $ex->getMessage();
	}
?>
