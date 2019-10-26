<?php
session_start();
include_once('../db.php');
include_once('../validator.php');

$DB_con = connect();

$block_id=$_POST["blockid"];
$applicant_id=$_POST["applicantid"];
$sitename=$_POST["sitename"];
$block_id=$_POST["block_id"];
$block_no=$_POST["block_no"];
$room_no=$_POST["room_no"];
$tempdate = new DateTime();
$datet=$tempdate->format('Y-m-d');
$dateassigned=$datet;
$age=30;
//RETRIVING BLOCK INFORMATION BY USING BLOCK_ID
$stmt1 = $DB_con->prepare('SELECT * FROM block WHERE block_id= :block_id');
$stmt1->bindParam(':block_id',$block_id);
$stmt1->execute();
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
//RETRIVIED BLOCK INFORMATION BY USING BLOCK_ID
$block_id=$row1['block_id'];
$model=$row1['model'];
$type=$row1['type'];
$projecttype=$row1['project_type'];
$sitename=$row1['site_name'];
$nofloor=$row1['no_floor'];
$noroom=$row1['no_room'];
$bno=$row1['bno'];
$nohouse=$row1['no_house'];
$noshope=$row1['no_shop'];
$noassigned=$row1['no_assigned'];
(int)$canassign=$noroom-$noassigned;

//INTIALIZING VALUE FOR ENUMRATOR IN DB TO CHECK HOUSE_STATUS=NO/YES
$house_status='no';
//RETRIVING APPLICANT INFORMATION BY USING BLOCK_ID
$stmt4 = $DB_con->prepare('SELECT * FROM applicant where applicant_id= :applicantid AND house_status= :house_status');
$stmt4->bindParam(':applicantid',$applicant_id);
$stmt4->bindParam(':house_status',$house_status);
$stmt4->execute();
$row4=$stmt4->fetch(PDO::FETCH_ASSOC);
if($stmt4->rowCount() > 0)
{
	//IN RETRIVED APPLICANT INFORMATION BY USING BLOCK_ID
	$resident_id=$row4["resident_id"];
	$total_income=$row4["total_income"];
	$regsitereddate=$row4["date"];
	$registration_turn=$row4["registration_turn"];
	$payment_status=$row4["payment_status"];
	$rest_time=$row4["rest_time"];
	$monthly_payment=$row4["monthly_payment"];
	$pre_payment=$row4["pre_payment"];
	$house_type=$row4["house_type"];
	$bead_room=$row4["bead_room"];
	$house_price=$row4["house_price"];
	$ai_id=$row4["ai_id"];
	$status=$row4["status"];

	//RETRIVING RESIDENTIAL INFORMATION OF APPLICANT USING RESIDENT_ID
	$stmt2 = $DB_con->prepare('SELECT * FROM resident where resident_id=:residentid');
	$stmt2->bindParam(':residentid',$resident_id);
	$stmt2->execute();
	$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

	$fname=$row2["fname"];
	$mname=$row2["mname"];
	$lname=$row2["lname"];
	$fullname=$row2["fname"]." ".$row2["mname"]." ".$row2["lname"];
	$gender=$row2["gender"];
	$birth=$row2["birth"];
	$date=$row2["date"];
	$photo=$row2["photo"];
	$mothername=$row2["mothername"];
	$grandmothername=$row2["grandmothername"];
	$subcity=$row2["sub_city"];
	$woreda=$row2["woreda"];
	$kebele=$row2["kebele"];
	$contact=$row2["contact"];
	$email=$row2["email"];
	$house_status=$row2["house_status"];
	$marital_status=$row2["marital_status"];
	$income=$row2["income"];
	$income_source=$row2["income_source"];

	//CALCULATE AGE OF APPLICANT FROM 
	$tempdate = new DateTime($birth);
	//$datet=$tempdate->format('Y-m-d');
	$datey=$tempdate->format('Y');
	$datem=$tempdate->format('m');
	$dated=$tempdate->format('d');
	$birthDate = $datey.'-'.$datem.'-'.$dated;
	$dob = new DateTime($birthDate);  //DateTime Object
	$interval = $dob->diff(new DateTime); //calculates the difference between two DateTime objects 
	$age=(int) $interval->y;

	//CHECK IF APPLICANT IS ASSIGNED
	$stmtchk = $DB_con->prepare('SELECT * FROM house where applicant_id= :applicantid');
	$stmtchk->bindParam(':applicantid',$applicant_id);
	$stmtchk->execute();
	$rowchk=$stmtchk->fetch(PDO::FETCH_ASSOC);
	if($stmtchk->rowCount() > 0)
	{
		echo "alrady";
	}
	else
	{
		/*TRATING ASSIGNMENT OF HOUSES TO APPLICANT*/
		//CHECKING HOW MUCH NUMBER OF APPLICANT CAN BE ASSIGNED TO THE GIVEN BLOCK
		if($canassign>=1)
		{
				
			//ASSIGNIN TO HOUSE
			$stmt = $DB_con->prepare('INSERT INTO house (applicant_id,resident_id,fname,mname,lname,gender,age,date,registration_turn,house_type,bead_room,house_price,subcity,wereda,kebele,status,site,block_id,block_no,room) VALUES(:applicant_id,:resident_id,:fname,:mname,:lname,:gender,:age,:date,:registration_turn,:house_type,:bead_room,:house_price,:subcity,:wereda,:kebele,:status,:site,:block_id,:block_no,:room_no)');
			$stmt->bindParam(':applicant_id',$applicant_id);
			$stmt->bindParam(':resident_id',$resident_id);
			$stmt->bindParam(':fname',$fname);
			$stmt->bindParam(':mname',$mname);
			$stmt->bindParam(':lname',$lname);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':age',$age);
			$stmt->bindParam(':date',$dateassigned);
		    $stmt->bindParam(':registration_turn',$registration_turn);
		    $stmt->bindParam(':house_type',$house_type);
			$stmt->bindParam(':bead_room',$bead_room);
			$stmt->bindParam(':house_price',$house_price);
			$stmt->bindParam(':subcity',$subcity);
			$stmt->bindParam(':wereda',$woreda);
			$stmt->bindParam(':kebele',$kebele);
			$stmt->bindParam(':status',$status);
			$stmt->bindParam(':sitename',$sitename);
			$stmt->bindParam(':block_id',$block_id);
			$stmt->bindParam(':block_no',$block_no);
			$stmt->bindParam(':room_no',$room_no);

			//INCREMENT NO_ASSIGNED
			(int)$newnoassign=(int)$noassigned+1;
			$stmt_update = $DB_con->prepare('UPDATE block SET no_assigned= :no_assigned where block_id =:block_id');
				$stmt_update->bindParam(':no_assigned',$newnoassign);
				$stmt_update->bindParam(':block_id',$block_id);

			//CHECK IF APPLICANT PAY ALL
			if($payment_status>=$house_price)
			{
				$stmt_delete1 = $DB_con->prepare('DELETE FROM savingaccount WHERE sacc_id= :sacc_id');
				$stmt_delete1->bindParam(':sacc_id',$sacc_id);

				$stmt_delete2 = $DB_con->prepare('DELETE FROM applicant WHERE applicant_id= :applicantid');
				$stmt_delete2->bindParam(':applicantid',$applicant_id);

				$stmt_update = $DB_con->prepare('UPDATE resident SET house_status= :house_status where resident_id =:resident_id');
				$stmt_update->bindParam(':resident_id',$resident_id);
				$stmt_update->bindParam(':house_status',$house_status);

				if($stmt->execute())
				{
					if($stmt_delete1->execute())
					{
						if($stmt_delete2->execute())
						{
							if($stmt_update->execute())
							{
								echo "100";
							}

						}
					}

				}
			}else
			{
				if($stmt->execute())
				{
					if($stmt_update->execute())
					{
						echo "100";
					}
				}
			}

				
		}else
		{
			echo "cant";
		}
		/*END OF ASSIGNMENT OF HOUSES TO APPLICANT*/
	}

}else
{
	echo "empty";
}

	

?>