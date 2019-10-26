<?php	
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
		$sacc_id=$row1["sacc_id"];

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
///resident
//Expand/CollapseStructures
		$stmt3 = $DB_con->prepare('SELECT * FROM savingaccount where sacc_id=:sacc_id');
		$stmt3->bindParam(':sacc_id',$sacc_id);
		$stmt3->execute();
		$row3=$stmt3->fetch(PDO::FETCH_ASSOC);

		//if($stmt2->rowCount() > 0){
		$balance=$row3["balance"];
		$loan=$row3["loan"];
		$interest=$row3["interest"];
		

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
						<td><b>House Type: </b></td>
						<td> '.$house_type.' house project</td>
					</tr>
					<tr>
						<td><b>Badroom: </b></td>
						<td> '.$bead_room.' bedroom</td>
					</tr>
					<tr>
						<td><b>Balance: </b></td>
						<td> '.$balance.' birr</td>
					</tr>
					<tr>
						<td><b>loan: </b></td>
						<td> '.$loan.' birr</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>


				<div class=" col-md-11 col-xs-12" >
					<form class="form-horizontal">
						<center></br>
							<p class="actiontitel" color="red">Delete applicant</p></br></hr>
						</center>

				        <div class="form-group" id="causetypediv">
		                        <label class="control-label col-xs-4">Cause Type:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="causetypeselect" value="">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="Health">Health</option>
		                                <option value="Loss">Loss</option>
		                            </select>
		                        </div>
		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="causetype_validation_feedback"></div>
		                    </div> 

				        <div class="form-group" id="causedetaildiv">
				            <label class="control-label col-xs-4">Cause detail:</label>
				            <div class="col-xs-7">
				                <textarea cols="60" rows="6" name="causedetailtextarea" id="causedetailtextarea"></textarea>
				            </div>
				            <div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="causedetail_validation_feedback"></div>
				        </div>

				        

							<br>
							<div class="form-group">
								<div class="col-xs-offset-4 col-xs-8">
									<div class="col-xs-6">
										<input type="button" class="btn btn-primary  btn-block" id="deletebtn" name="deletebtn" value="Save">
									</div>
									<div class="col-xs-"></div>
									<div class="col-xs-6">
										<input type="button" class="btn btn-danger  btn-block" id="cancelbtn" name="cancelbtn" value="Cancel" >
									</div>
								</div>
							</div>
						</form>
					</div>

				<script type = "text/javascript" language = "javascript">
					$(document).ready(function() {
					
					$("#causetypeselect").change(function(event){
			         			//$("#searchdisplaydiv").empty();
			         			var searchElement = document.getElementById("causetypeselect");

			         			var causetype = $("#causetypeselect").val();
								if(causetype_validator(causetype) && (causetype!=""))
								{
									document.getElementById("causetypediv").className="form-group has-success";
									document.getElementById("causetype_validation_feedback").innerHTML="";
								}else if(causetype=="")
								{
									document.getElementById("causetypediv").className="form-group has-error";
									document.getElementById("causetype_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
									searchElement.focus();
								}
								else
								{
									document.getElementById("causetypediv").className="form-group has-error";
									document.getElementById("causetype_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
									searchElement.focus();
								}
			         	});

			         $("#causedetailtextarea").change(function(event){
			         			//$("#searchdisplaydiv").empty();
			         			var searchElement = document.getElementById("causedetailtextarea");

			         			var causedetail = $("#causedetailtextarea").val();
								if(causedetail_validator(causedetail) && (causedetail!=""))
								{
									document.getElementById("causedetaildiv").className="form-group has-success";
									document.getElementById("causedetail_validation_feedback").innerHTML="";
								}else if(causedetail=="")
								{
									document.getElementById("causedetaildiv").className="form-group has-error";
									document.getElementById("causedetail_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
									searchElement.focus();
								}
								else
								{
									document.getElementById("causedetaildiv").className="form-group has-error";
									document.getElementById("causedetail_validation_feedback").innerHTML="<b><p style=color:red;>Write the discription of why applicant want canceled</p></b>";
									searchElement.focus();
								}
			         	});

					$("#deletebtn").click(function(event){
						var applicant_id="'.$applicant_id.'";
						var resident_id="'.$resident_id.'";
						var sacc_id="'.$sacc_id.'";
						var registration_date="'.$date.'";
						var house_type="'.$house_type.'";
						var bedroom="'.$bead_room.'";

		            	var cause_type=$("#causetypeselect").val();
		            	var cause=$("#causedetailtextarea").val();

						$("#causetypeselect").trigger("change");
						$("#causedetailtextarea").trigger("change");

						if(causetype_validator(cause_type) && causedetail_validator(cause))
						{

							$("#searchdisplaydiv").load("../../controller/applicant/delete.php", {"applicant_id":applicant_id,"resident_id":resident_id,"registration_date":registration_date,"house_type":house_type, "bedroom":bedroom, "cause_type":cause_type, "cause":cause} );
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