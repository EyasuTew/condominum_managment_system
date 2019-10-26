<?php
session_start();	
include_once('../db.php');
include_once('../validator.php');
$applicant_id=$_POST["applicantid"];
$DB_con = connect();

if(applicantid_validator($applicant_id))
{
	$stmt1 = $DB_con->prepare('SELECT * FROM applicant where applicant_id=:applicantid');
	$stmt1->bindParam(':applicantid',$applicant_id);
	$stmt1->execute();
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
	if($stmt1->rowCount() > 0){
		$resident_id=$row1["resident_id"];
		$total_income=$row1["total_income"];
		$regsitereddate=$row1["date"];
		$registration_turn=$row1["registration_turn"];
		$payment_status=$row1["payment_status"];
		$rest_time=$row1["rest_time"];
		$monthly_payment=$row1["monthly_payment"];
		$pre_payment=$row1["pre_payment"];
		$house_type=$row1["house_type"];
		$bead_room=$row1["bead_room"];
		$house_price=$row1["house_price"];
		$ai_id=$row1["ai_id"];

		$stmt2 = $DB_con->prepare('SELECT * FROM resident where resident_id=:residentid');
		$stmt2->bindParam(':residentid',$resident_id);
		$stmt2->execute();
		$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

		//if($stmt2->rowCount() > 0){
			$fname=$row2["fname"];
			$mname=$row2["mname"];
			$lname=$row2["lname"];
			$fullname=$row2["fname"]." ".$row2["mname"]." ".$row2["lname"];
			$gender=$row2["gender"];
			$birth=$row2["birth"];
			$date=$row2["date"];
			//$age=date_sub($birth,date_interval_create_from_date_string("40 days"));
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

		echo '</br>
		<div class="col-xs-10" id="">
			<div class="row col-xs-offset-2 ">
				<div class="col-xs-11">
					<table style="border-top: 7px solid #000000;" class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Applicant information</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="100px"><b>Photo:</b></td>
							<td> 
							<img src="../../residentphoto/'.$photo.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail" width="300px" height="400px">
							</td>
						</tr>
					<tr>
						<td><b>Full name:</b></td>
						<td> '.$fullname.'</td>
					</tr>
					<tr>
						<td><b>Gender: </b></td>
						<td> '.$gender.'</td>
					</tr>
					<tr>
						<td><b>Birth date: </b></td>
						<td> '.$birth.' - '.$date.'</td>
					</tr>
					<!--<tr>
						<td><b>Mother name: </b></td>
						<td> '.$mothername.'</td>
					</tr>
					<tr>
						<td><b>Grand mother name: </b></td>
						<td> '.$grandmothername.'</td>
					</tr>-->
					<tr>
						<td><b>Address: </b></td>
						<td> '.$sub_city.', Woreda '.$woreda.', Kebele '.$kebele.'</td>
					</tr>
					<tr>
						<td><b>Payment status: </b></td>
						<td> '.$payment_status.'birr , Total price '.$house_price.' birr</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>


				<div class=" col-md-11 col-xs-12" >
					<form class="form-horizontal">
						<center></br>
							<p class="actiontitel">Recive paymet</p></br></hr>
						</center>

				        <div class="form-group" id="amountdiv">
							<label class="control-label col-xs-4" for="amounttxt">Amount:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="amounttxt" name="amounttxt" placeholder="amount">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="amount_validation_feedback"></div>
						</div>

							<br>
							<div class="form-group">
								<div class="col-xs-offset-4 col-xs-8">
									<div class="col-xs-6">
										<input type="button" class="btn btn-primary  btn-sm" id="savebtn" name="savebtn" value="Save">
									</div>
									<div class="col-xs-"></div>
									<div class="col-xs-6">
										<input type="button" class="btn btn-danger  btn-sm" id="cancelbtn" name="cancelbtn" value="Cancel" >
									</div>
								</div>
							</div>
						</form>
					</div>

				<script type = "text/javascript" language = "javascript">
					$(document).ready(function() {
	
					$("#amounttxt").change(function(event){
			         			//$("#searchdisplaydiv").empty();
			         			var searchElement = document.getElementById("amounttxt");

			         			var amount = $("#amounttxt").val();
								if(amount_validator(amount) && (amount!=""))
								{
									document.getElementById("amountdiv").className="form-group has-success";
									document.getElementById("amount_validation_feedback").innerHTML="";
								}else if(amount=="")
								{
									document.getElementById("amountdiv").className="form-group has-error";
									document.getElementById("amount_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
									searchElement.focus();
								}
								else
								{
									document.getElementById("amountdiv").className="form-group has-error";
									document.getElementById("amount_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
									searchElement.focus();
								}
			         	});

			        
					$("#savebtn").click(function(event){
						var applicant_id="'.$applicant_id.'";
		            	amount=$("#amounttxt").val();
		            	employee_id="'.$_SESSION['emp_id'].'";
						$("#amounttxt").trigger("change");
						alert("fgdfg");
						if(amount_validator(amount))
						{

							$("#searchdisplaydiv").load("../../controller/applicant/receivepayment.php", {"applicant_id":applicant_id,"employee_id":employee_id,"amount":amount} );
						}else
						{
							alert("Please enter valid data");
						}
						});

						$("#cancelbtn").click(function(event){
		            		$("#searchdisplaydiv").empty();
						});	
					});		
					</script>';
	}else
	{
			  echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8 wow fadeInUp">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Applicant with id '.$applicant_id.' was not found!! please enter exeting applicant id</center>
                    </b>
                </div>';
	}
}else
{
	echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8 wow fadeInUp">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid residentid id format please enter valid employee id ex. BSR006.</center>
                    </b>
                </div>';//<label class="control-label" width="100px">Photo: </label> <label class="control-label" >
}			 
?>