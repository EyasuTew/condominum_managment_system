<?php	
	//include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/resident.php');

try{

	$fname=$_POST["firstname"];
	$mname=$_POST["middlename"];
	$lname=$_POST["lastname"];
	$mothername=$_POST["mothername"];
	$grandmothername=$_POST["grandmothername"];
	$gender=$_POST["gender"];
	$woreda=$_POST["woreda"];
	$kebele=$_POST["kebele"];
	$contact=$_POST["contact"];
	$email=$_POST["email"];
	$housestatus=$_POST["housestatus"];
	$maritalstatus=$_POST["maritalstatus"];
	$income=$_POST["income"];
	$incomesource=$_POST["incomesource"];
	$birthdate=$_POST["birthdate"];
	$photo=$_POST["photo"];

	if(name_validator($fname) && name_validator($mname) && name_validator($lname) && name_validator($mothername) && name_validator($grandmothername) && gender_validator($gender) && select_validator($woreda) && select_validator($kebele) && contact_validator($contact) && email_validator($email) && select_validator($housestatus) && select_validator($maritalstatus) && income_validator($income) && select_validator($incomesource) && date_validator($birthdate) && $photo!=""){
		/*$data = 'data:image/png;base64,AAAFBfj42Pj4';*/
		
		
		
		$lastindex="1";
		$tempStr = file_get_contents("../../residentphoto/lastindex.txt");
		$tempInt=(int) $tempStr;
		$tempInt=$tempInt+1;
		$lastindex=(String) $tempInt;
		//echo $lastindex;
		$File = fopen("../../residentphoto/lastindex.txt", "w");
		fwrite($File, $lastindex);
		fclose($File);

		list($type, $photo) = explode(';', $photo);
		list(, $photo) = explode(',', $photo);
		$photo = base64_decode($photo);
		file_put_contents("../../residentphoto/".$lastindex.".jpeg", $photo);

		/*$imgdir="../../residentphoto/".$lastindex.".jpeg";
		file_put_contents($imgdir, base64_decode($photo));*/
		$photoindex=$lastindex;

		$tempdate = new DateTime();
		$date=$tempdate->format('Y-m-d');

		$residentObject= new Resident();
		$result=$residentObject->register($fname,$mname,$lname,$gender,$birthdate,$date,$photoindex,$mothername,$grandmothername,$woreda,$kebele,$contact,$email,$housestatus,$maritalstatus, $income,$incomesource);
										//$fname,$mname,$lname,$gender,$birth,$photo,$mothername,$grandmothername,$woreda,$kebele,$contact,$email,$house_status,$marital_status, $income, $income_source

		if($result=="ye")
		{
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident registered succesfully!</center>
                    </b>
                </div>';
		}else if($result=="un") 
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident registration unsuccessful try again!</center>
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
}catch(Exception $ex)
{
	echo $ex->getMessage();
}
?>
