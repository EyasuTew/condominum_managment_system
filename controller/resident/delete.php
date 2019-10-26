<?php	
	//include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/resident.php');

try{
	$resident_id=$_POST['resident_id'];

	if(residentid_validator($resident_id))
	{

		$residentObject= new Resident();
		$result=$residentObject->delete($resident_id);

		if($result=="ye")
		{
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident delete succesfully!</center>
                    </b>
                </div>';
		}else if($result=="un") 
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident deletion unsuccessful try again!</center>
                    </b>
                </div>';
			
		}else if($result=="ex")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident deletion unsuccessful try again!</center>
                    </b>
                </div>';
		}
		else if($result=="uf")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident can not found try again!</center>
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
                    <b><center>Invalid resident id please enter valid data and try again! </center>
                    </b>
                </div>';
                		
	}
}catch(Exception $ex)
{
	echo $ex->getMessage();
}
?>
