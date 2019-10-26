<?php	
	session_start();
	include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/applicant.php');
	include_once('../../class/audit.php');

try{
	//VARIABLE INITALIZATION 
	$residentid=$_POST["residentid"];
	$housetype=$_POST["housetype"];
	$bedroom=$_POST["bedroom"];
	$registrationturn=$_POST["registrationturn"];
	$savingaccountno=$_POST["savingaccountno"];
	$nationality=$_POST["nationality"];
	$educationallevel=$_POST["educationallevel"];
	$spauseincome=0;
	$spausesub_city="";
	$spauseworeda="";
	$spausekebele="";
	$applicantfullname="";
	$applicantgender="";
	$applicantbirth="";
	$applicantdate="";
	$spausephoto="";
	$spausefullname="";
	$spausegender="";
	$spausebirth="";
	$spausedate="";
	$his_id="";
	$her_id="";
	$applicant_id="BSA1";
	$emp_id=$_SESSION["emp_id"];

	$isApplicantRegistered=TRUE;
	$isApplicantSpauseRegistered=TRUE;
	$his_id="";
	$her_id="";
	$spausehouse_status='';
	$result="un";
	$DB_con = connect();
	$spauseresidentid="";
	$interest=0.7;
	$marital_status="";

	function isRegistered($resident_id)
	{
		$DB_con = connect();
		$stmt8= $DB_con->prepare('select * from applicant where resident_id= :resident_id');
		$stmt8->bindParam(':resident_id',$resident_id);
		$stmt8->execute();
		$row8=$stmt8->fetch(PDO::FETCH_ASSOC);
		if($stmt8->rowCount() > 0)
		{
			return FALSE;//REGISTERED
		}
		return TRUE;//NOT REGISTERED
	}

	function getPassword()
	{
		//$string = "2010-01-01 20:40:30";
		$tempdate = new DateTime();
		$date=$tempdate->format('Y-m-d h:m:s');
		$string=$date;
		//echo $date.'</br>';
		$string = str_replace("-","A",$string);
		$string = str_replace(":","E",$string);
		$string = str_replace(" ","G",$string);
		$string = str_replace("1","L",$string);
		$string = str_replace("5","V",$string);
		$string = str_replace("7","Z",$string);
		$string = str_replace("0","T",$string);
		$srtlength=Strlen($string);
		$string=substr($string,11,$srtlength);
		//str_replace('-', '', str_replace('-', '', $string));

		//echo "<p>" . $string . "</p>";
		$newstring = $string;

		for ($i=0;$i<strlen($string);$i++) {

		    $ascii = ord($string[$i]);
		    if($ascii == 90) { //uppercase bound
		        $ascii = 65; //reset back to 'A'
		        }
		    else if($ascii == 122) { //lowercase bound
		        $ascii = 97; //reset back to 'a'
		        }
		    else {
		        $ascii++;
		    }
		    $newstring[$i] = chr($ascii);

		}

		//echo "<p>" . $newstring . "</p>";
		return md5($newstring);
	}

	function getUserName($fname,$mname,$lname)
	{
		$srtlength1=Strlen($fname);
		$fname=substr($fname,0,$srtlength1-1);

		$srtlength2=Strlen($mname);
		$mname=substr($mname,0,$srtlength1-2);

		$srtlength3=Strlen($lname);
		$lname=substr($lname,0,$srtlength1-3);

		return "AP-".$fname.$mname.$lname;
	}

	//SERVER-SIDE VALIFATION
	if(registrationturn_validator($registrationturn) && bedroom_validator($bedroom) && housetype_validator($housetype) && savingaccountno_validator($savingaccountno) && residentid_validator($residentid) && educationallevel_validator($educationallevel) && nationality_validator($nationality))
	{

		//GET THE LAST INDEX AND PREPARE NEW ID FOR APPLICANT
		
		$stmt1 = $DB_con->prepare('select * from applicant ORDER BY ai_id DESC limit 1');
		$stmt1->execute();
		$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
		if($stmt1->rowCount() > 0)
		{
			$lastId=$row1['applicant_id'];
			$srtlength=Strlen($lastId);
			$lastIdnum=(int)(substr($lastId,3,$srtlength-1));
			$lastIdnum=$lastIdnum+1;
			$applicant_id="BSA".(string) $lastIdnum;

		}

		//GET THE LAST INDEX AND PREPARE NEW ID FOR SAVING ACCOUNT NO
		$sacc_id="10000111111";
		$stmt2 = $DB_con->prepare('select * from savingaccount ORDER BY ai_id DESC limit 1');
		$stmt2->execute();
		$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
		if($stmt2->rowCount() > 0)
		{
			$lastIdd=$row2['sacc_id'];
			//echo $lastIdd.'</br>';
			$lastIddnum=(double) $lastIdd;
			//echo $lastIddnum.'</br>';
			$lastIddnum=$lastIddnum+1;
			//echo $lastIddnum.'</br>';
			$sacc_id=(string) $lastIddnum;
		}

		//GET RESIDENT INFORMATION BY RESIDENT_ID AND CHECK IF THE RESIDENT EXIST OR NOT
		$stmt3= $DB_con->prepare('select * from resident where resident_id= :resident_id');
		$stmt3->bindParam(':resident_id',$residentid);
		$stmt3->execute();
		$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
		if($stmt3->rowCount() > 0)
		{	
			$applicantresidentid=$residentid;
			$applicantIncome=(double) $row3['income'];
			$applicantIncomeSource=$row3['income_source'];
			$applicantfname=$row3["fname"];
			$applicantmname=$row3["mname"];
			$applicantlname=$row3["lname"];
			$applicantfullname=$row3["fname"]." ".$row3["mname"]." ".$row3["lname"];
			$applicantgender=$row3["gender"];
			$applicantbirth=$row3["birth"];
			$applicantdate=$row3["date"];
			$applicantphoto=$row3["photo"];
			$applicantmothername=$row3["mothername"];
			$applicantgrandmothername=$row3["grandmothername"];
			$applicantsub_city=$row3["sub_city"];
			$applicantworeda=$row3["woreda"];
			$applicantkebele=$row3["kebele"];
			$applicantcontact=$row3["contact"];
			$applicantemail=$row3["email"];
			$applicanthouse_status=$row3["house_status"];
			$applicantmarital_status=$row3["marital_status"];
			$applicantincome=$row3["income"];
			$applicantincome_source=$row3["income_source"];

			$fname=$row3['fname'];
			$mname=$row3['mname'];
			$lname=$row3['lname'];
			$housestatus=$row3['house_status'];

			//Calculate initial status
			$status=0;
			if($applicantgender=="F")
			{
				$status=$status+5;
			}

			if($applicantincome_source=="governmental")
			{
				$status=$status+5;
			}

			//To get full information of his or her spause
			$marital_status=$row3['marital_status'];
			
			if($marital_status=='marrid')
			{
					//GETING SPAUSE FULL INFORMATION
					$gender=$row3['gender'];
					if($gender=='F')
					{
						//echo $residentid.'454'.$gender.' '.$applicantgender;
						$stmt4= $DB_con->prepare('select * from marital where her_id= :her_id');
						$stmt4->bindParam(':her_id',$residentid);
						$stmt4->execute();
						$row4=$stmt4->fetch(PDO::FETCH_ASSOC);
						$his_id=$row4['his_id'];
						
						$stmt6= $DB_con->prepare('select * from resident where resident_id= :his_id');
						$stmt6->bindParam(':his_id',$his_id);
						$stmt6->execute();
						$row6=$stmt6->fetch(PDO::FETCH_ASSOC);

						$spauseresidentid=$his_id;
						$spauseIncome=(double) $row6['income'];
						$spauseIncomeSource=$row6['income_source'];
						$spausefname=$row6["fname"];
						$spausemname=$row6["mname"];
						$spauselname=$row6["lname"];
						$spausefullname=$row6["fname"]." ".$row6["mname"]." ".$row6["lname"];
						$spausegender=$row6["gender"];
						$spausebirth=$row6["birth"];
						$spausedate=$row6["date"];
						$spausephoto=$row6["photo"];
						$spausemothername=$row6["mothername"];
						$spausegrandmothername=$row6["grandmothername"];
						$spausesub_city=$row6["sub_city"];
						$spauseworeda=$row6["woreda"];
						$spausekebele=$row6["kebele"];
						$spausecontact=$row6["contact"];
						$spauseemail=$row6["email"];
						$spausehouse_status=$row6["house_status"];
						$spausemarital_status=$row6["marital_status"];
						$spauseincome=$row6["income"];
						$spauseincome_source=$row6["income_source"];
						//$spausephoto=$row6["photo"];

					}else if ($gender=='M') {
						$stmt5= $DB_con->prepare('select * from marital where his_id= :his_id');
						$stmt5->bindParam(':his_id',$residentid);
						$stmt5->execute();
						$row5=$stmt5->fetch(PDO::FETCH_ASSOC);
						$her_id=$row5['her_id'];
						//echo $residentid;
						$stmt7= $DB_con->prepare('select * from resident where resident_id= :her_id');
						$stmt7->bindParam(':her_id',$her_id);
						$stmt7->execute();
						$row7=$stmt7->fetch(PDO::FETCH_ASSOC);
						$spauseIncome=(double) $row7['income'];
						$spauseIncomeSource=$row7['income_source'];

						$spauseresidentid=$her_id;
						$spausefname=$row7["fname"];
						$spausemname=$row7["mname"];
						$spauselname=$row7["lname"];
						$spausefullname=$row7["fname"]." ".$row7["mname"]." ".$row7["lname"];
						$spausegender=$row7["gender"];
						$spausebirth=$row7["birth"];
						$spausedate=$row7["date"];
						//$spausephoto=$row7["photo"];
						$spausemothername=$row7["mothername"];
						$spausegrandmothername=$row7["grandmothername"];
						$spausesub_city=$row7["sub_city"];
						$spauseworeda=$row7["woreda"];
						$spausekebele=$row7["kebele"];
						$spausecontact=$row7["contact"];
						$spauseemail=$row7["email"];
						$spausehouse_status=$row7["house_status"];
						$spausemarital_status=$row7["marital_status"];
						$spauseincome=$row7["income"];
						$spauseincome_source=$row7["income_source"];
						$spausephoto=$row7["photo"];
					}else
					{
						// nothing Just other sex, if gender=M find her_id by his_id and 
					}

			}else
			{
				//applicant can be single or widdowed

			}

			$applicantincome=(double) $row3['income'];
			$income=(double) $row3['income']+$spauseincome;
			$income_source=$row3['income_source'];
			$house_status=$row3['house_status'];
			$marital_status=$row3['marital_status'];
			$username=getUserName($fname,$mname,$lname);
			$password=getPassword();

			$tempdate = new DateTime();
			$date=$tempdate->format('Y-m-d h:m:s');

			$incomeDouble=(double) $income;
			//ASSIGNING TOTAL PRICE OF HOUSES BASED OF HOUSE TYPE AND BEDROOM NO.
			if($housetype=="10/90")
			{
				$house_price=200000;
			}else if($housetype=="20/80")
			{
				if($bedroom=="1")
				{
					$house_price=300000;
				}else if($bedroom=="2")
				{
					$house_price=400000;
				}else if($bedroom=="3")
				{
					$house_price=500000;
				}else
				{
					$house_price=400000;
				}

			}else if($housetype=="40/60")
			{
				if($bedroom=="1")
				{
					$house_price=400000;
				}else if($bedroom=="2")
				{
					$house_price=500000;
				}else if($bedroom=="3")
				{
					$house_price=600000;
				}else
				{
					$house_price=200000;
				}
			}else
			{

			}

			//ASSIGNING PRE PAYMENT BASED OF HOUSE TYPE
			if($housetype=="10/90")
			{
				$pre_payment=$house_price/10;
				$rest_time=0;
			}else if($housetype=="20/80")
			{
				$pre_payment=$house_price/20;
				$rest_time=12;
			}else if($housetype=="40/60")
			{
				$pre_payment=$house_price/40;
				$rest_time=0;
			}else
			{

			}

			$monthly_payment=$house_price/0.5;
			$percent= $house_price/100;

			//Checking all pre-condition applicant need to be satified
			$result="unqual";
			$isApplicantRegistered=isRegistered($residentid);
			$isApplicantSpauseRegistered=isRegistered($spauseresidentid);

			$registered=$isApplicantRegistered && $isApplicantSpauseRegistered;
			/*if($registered)
			{
				echo $spauseresidentid;
			}else
			{
				echo "hjhh21212hh";
			}*/
			//echo $marital_status." ".$applicanthouse_status." ".$spausehouse_status;
			if($income>=$percent && $housestatus!='own' &&  $spausehouse_status!='own' && $registered)
			{
				$applicantObject= new Applicant();
				$result=$applicantObject->register($applicant_id,$residentid,$sacc_id,$income,$date,$registrationturn,$rest_time,$monthly_payment,$pre_payment,$housetype,$bedroom,$house_price,$nationality,$educationallevel,$username,$password,$interest,$applicantincome,$status);
			}
			else if($housestatus=='own' && $spausehouse_status=='own')
			{
				$result="bothownhouse";
			}else if($housestatus=='own')
			{
				$result="applicantownhouse";
			}else if($spausehouse_status=='own')
			{
				$result="spauseownhouse";
			}
			else if($income<$percent)
			{
				$result="lessincome";
			}else if($isApplicantRegistered && $isApplicantSpauseRegistered)
			{
				$result="bothareregistered";
			}else if(!$isApplicantRegistered)
			{
				$result="applicantregistered";
			}else if(!$isApplicantSpauseRegistered)
			{
				$result="spauseregistered";
			}else
			{
			 	$result="unknownerror";
			}
			//echo $sacc_id;
			if($result=="3rd" && $marital_status=="marrid")
			{
				//SAVE THE ACTION PERFORMED BY EMPLOYEES , IT MUST BE AFTER SUCCESS OF REGISTERING APPLICANT, I.E THE $resul value from Applicant Class should be '3rd'
				$action="Register";
				$auditObject= new Audit();
				$auditObject->save($emp_id,$applicant_id,$action,$date);

				echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Applicant registered succesfully!</center>
	                    </b>
	                    User name:'.$marital_status.'</br>
	                     Password:</br>
	                     Saving account no.:</br>

	                     <table  style="border-top: 7px solid #000000;" class="table table-hover">
										<table  style="border-top: 7px solid #000000;" class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Applicant information</th>
							<th>Spause infromation</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="100px"><label class="control-label" >Photo: </label></td>
							<td> 
							<img src="../../residentphoto/'.$applicantphoto.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail">
							</td>

							<td> <img src="../../residentphoto/'.$spausephoto.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail">
							</td>
						</tr>
						</br>
						<tr>
							<td><label class="control-label" >Full name: </label></td>
							<td> '.$applicantfullname.' </td>
							<td> '.$spausefullname.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Gender: </label></td>
							<td> '.$applicantgender.' </td>
							<td> '.$spausegender.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Birth date: </label></td>
							<td> '.$applicantbirth.' </td>
							<td> '.$spausebirth.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Date: </label></td>
							<td> '.$applicantdate.' </td>
							<td> '.$spausedate.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Address: </label></td>
							<td> '.$applicantsub_city.', Woreda '.$applicantworeda.', Kebele '.$applicantkebele.' </td>
							<td> '.$spausesub_city.', Woreda '.$spauseworeda.', Kebele '.$spausekebele.'</td>

						</tr>
						<tr>
							<td><label class="control-label" >Registered date:</label></td>
							<td> '.$date.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Username:</label></td>
							<td> '.$username.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Username:</label></td>
							<td> '.$password.' </td>
						</tr>
					</tbody>
				</table>
	          </div>';
			}else if($result=="3rd")
			{
				//SAVE THE ACTION PERFORMED BY EMPLOYEES , IT MUST BE AFTER SUCCESS OF REGISTERING APPLICANT, I.E THE $resul value from Applicant Class should be '3rd'
				$action="Register";
				$auditObject= new Audit();
				$auditObject->save($emp_id,$applicant_id,$action,$date);

				echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Applicant registered succesfully!</center>
	                    </b>
	                     <table  style="border-top: 7px solid #000000, border-bottom: 7px solid #000000;" class="table table-hover">
										<table  style="border-top: 7px solid #000000;" class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Applicant information</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="100px"><label class="control-label" >Photo: </label></td>
							<td> 
							<img src="../../residentphoto/'.$applicantphoto.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail">
							</td>
						</tr>
						</br>
						<tr>
							<td><label class="control-label" >Full name: </label></td>
							<td> '.$applicantfullname.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Gender: </label></td>
							<td> '.$applicantgender.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Birth date: </label></td>
							<td> '.$applicantbirth.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Date: </label></td>
							<td> '.$applicantdate.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Address: </label></td>
							<td> '.$applicantsub_city.', Woreda '.$applicantworeda.', Kebele '.$applicantkebele.' </td>

						</tr>
						<tr>
							<td><label class="control-label" >Registered date:</label></td>
							<td> '.$date.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Username:</label></td>
							<td> '.$username.' </td>
						</tr>
						<tr>
							<td><label class="control-label" >Username:</label></td>
							<td> '.$password.' </td>
						</tr>
					</tbody>
				</table>
	          </div>';
			}else if($result=="2nd") 
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Resident registration unsuccessful try again! Unable to creat saving account</center>
	                    </b>
	                </div>';
				
			}
			else if($result=="1st") 
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Applicant registration unsuccessful try again! Unable to create user account</center>
	                    </b>
	                </div>';
				
			}else if($result=="no") 
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Applicant registration unsuccessful try again!</center>
	                    </b>
	                </div>';
				
			}else if($result=="bothownhouse")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Both applicant and his or her wife own house and applicant can not registered</center>
	                    </b>
	                </div>';
			}
			else if($result=="applicantownhouse")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Applicant own house and applicant can not registered!!</center>
	                    </b>
	                </div>';
			}
			else if($result=="spauseownhouse")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Applicant spause own house and applicant can not registered!!</center>
	                    </b>
	                </div>';
			}else if($result=="lessincome")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Applicant income can not afford him or her to register!!</center>
	                    </b>
	                </div>';
			}else if($result=="bothareregistered")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Both applicant and his or her spouse registered in saving house program applicant can not register!!</center>
	                    </b>
	                </div>';
			}else if($result=="spauseregistered")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Applicant spause registered in saving house program applicant can not register!!</center>
	                    </b>
	                </div>';
			}else if($result=="applicantregistered")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Applicant registered in saving house program applicant can not register!!</center>
	                    </b>
	                </div>';
			}else if($result=="unknownerror")
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Unknown error applicant can not register!!</center>
	                    </b>
	                </div>';
			}
			else
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> Unknown error applicant can not register!!</center>
	                    </b>
	                </div>';
			}
		}else
		{
			//resident doesnot found4		
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident with resident id '.$residentid.' was not found! </center>
                    </b>
                </div>';
		}
				
	}else
	{
		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid data to register applicant!</center>
                    </b>
                </div>';
                		
	}
}catch(Exception $ex)
{
	echo $ex->getMessage();
}
?>
