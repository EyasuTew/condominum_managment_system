<?php
session_start();
include_once('../db.php');
include_once('../validator.php');
//include_once('../../class/news.php');
$DB_con = connect();
//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/
//echo $_SESSION[''];
		//$app_id = $_SESSION['app_id'];
		$app_id=$_SESSION['applicant_id'];
	    $stmt = $DB_con->prepare('select * from applicant where applicant_id= :app_id');
	    $stmt->bindParam(':app_id',$app_id);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0 )
		{
			$resident_id=$row['resident_id'];
			$total_income=$row['total_income'];
			$date=$row['date'];
			$registration_turn=$row['registration_turn'];
			$sacc_id=$row['sacc_id'];
			$payment_status=$row['payment_status'];
			$rest_time=$row['rest_time'];
			$monthly_payment=$row['monthly_payment'];
			$pre_payment=$row['pre_payment'];
			$house_type=$row['house_type'];
			$bead_room=$row['bead_room'];
			$house_price=$row['house_price'];
			$status=$row['status'];

			$stmt1 = $DB_con->prepare('select * from savingaccount where sacc_id= :sacc_id');
		    $stmt1->bindParam(':sacc_id',$sacc_id);
			$stmt1->execute();
			$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

			if($stmt1->rowCount() > 0)
			{
				//$total_income=$row1['total_income'];
				$nationality=$row1['nationality'];
				$education_level=$row1['education_level'];
				$income=$row1['income'];
				$acc_no=$row1['acc_no'];
				$acc_type=$row1['acc_type'];
				$balance=$row1['balance'];
				$loan=$row1['loan'];
				$interest=$row1['interest'];
			}

			$stmt2 = $DB_con->prepare('select * from resident where resident_id= :resident_id');
		    $stmt2->bindParam(':resident_id',$resident_id);
			$stmt2->execute();
			$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

			if($stmt2->rowCount() > 0)
			{
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
				$sub_city=$row2["sub_city"];
				$woreda=$row2["woreda"];
				$kebele=$row2["kebele"];
				$contact=$row2["contact"];
				$email=$row2["email"];
				$house_status=$row2["house_status"];
				$marital_status=$row2["marital_status"];
				$income=$row2["income"];
				$income_source=$row2["income_source"];
			}
			
	echo '
	<div class="row">
		<div class="col-xs-3" >
				<img src="../../photo/'.$photo.'.jpg" alt="Employee photo" class="img-thumbnail">
		</div>
		<table width="100%" class="table table-striped table-bordered table-hover>
            <thead>
                <tr>
                    <th>Action</th>
                </tr>
            </thead><tbody>
				<tr class="">
			    	<td>Full name</td>
			    	<td>'.$fullname.'</td>
				</tr>
				<tr class="">
			    	<td>Full name</td>
			    	<td>'.$fullname.'</td>
				</tr>
				<tr class="">
			    	<td>Gender</td>
			    	<td>'.$gender.'</td>
				</tr>
				<tr class="">
			    	<td>Birth date</td>
			    	<td>'.$birth.'</td>
				</tr>
				<tr class="">
			    	<td>Registration date</td>
			    	<td>'.$date.'</td>
				</tr>
				<tr class="">
			    	<td>Mother name</td>
			    	<td>'.$mothername.'</td>
				</tr>
				<tr class="">
			    	<td>Grand mother name</td>
			    	<td>'.$grandmothername.'</td>
				</tr>
				<tr class="">
			    	<td>Address</td>
			    	<td>'.$sub_city.' Sub-city, Woreda '.$woreda.', Kebele'.$kebele.'.</td>
				</tr>
				<tr class="">
			    	<td>Contact</td>
			    	<td>'.$contact.'</td>
				</tr>
				<tr class="">
			    	<td>Email</td>
			    	<td>'.$email.'</td>
				</tr>
				<tr class="">
			    	<td>Saving account</td>
			    	<td>'.$acc_no.'</td>
				</tr>
				<tr class="">
			    	<td>Balance</td>
			    	<td>'.$balance.'</td>
				</tr>
				<tr class="">
			    	<td>Contact</td>
			    	<td>'.$contact.'</td>
				</tr>
				<tr class="">
			    	<td>Project type</td>
			    	<td>'.$house_type.'</td>
				</tr>
				<tr class="">
			    	<td>Bedroom</td>
			    	<td>'.$bead_room.'</td>
				</tr>
				<tr class="">
			    	<td>House pricee</td>
			    	<td>'.$house_price.'</td>
				</tr>
				<tr class="">
			    	<td>Pre-payment</td>
			    	<td>'.$pre_payment.'</td>
				</tr>
				<tr class="">
			    	<td>Monthly payment</td>
			    	<td>'.$monthly_payment.'</td>
				</tr>
			</tbody>
       </table>
      </div>
    </div>';

	}
	
?>