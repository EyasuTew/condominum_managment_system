<?php	
include_once('../db.php');
include_once('../validator.php');
$residentid=$_POST["residentid"];
$DB_con = connect();
if(residentid_validator($residentid))
{
	$stmt1 = $DB_con->prepare('SELECT * FROM resident where resident_id=:residentid');
	$stmt1->bindParam(':residentid',$residentid);
	$stmt1->execute();
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

	if($stmt1->rowCount() > 0){
		$fname=$row1["fname"];
		$mname=$row1["mname"];
		$lname=$row1["lname"];
		$fullname=$row1["fname"]." ".$row1["mname"]." ".$row1["lname"];
		$gender=$row1["gender"];
		$birth=$row1["birth"];
		$date=$row1["date"];
		$photo=$row1["photo"];
		$mothername=$row1["mothername"];
		$grandmothername=$row1["grandmothername"];
		$sub_city=$row1["sub_city"];
		$woreda=$row1["woreda"];
		$kebele=$row1["kebele"];
		$contact=$row1["contact"];
		$email=$row1["email"];
		$house_status=$row1["house_status"];
		$marital_status=$row1["marital_status"];
		$income=$row1["income"];
		$income_source=$row1["income_source"];


		echo '</br>
		<div class="form-group" id="" onload="load()">
			<div class="row col-xs-offset-2 ">
				<div class="col-xs-3" >
					<img src="../../residentphoto/'.$photo.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail">
				</div>
				<div class="col-xs-7">
					<table>
					<td>
						<tr><label class="control-label" >Full name: </label></tr>
						<tr> '.$fullname.'</tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Gender: </label></tr>
						<tr> '.$gender.'</tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Birth date: </label></tr>
						<tr> '.$birth.' - '.$date.'</tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Mother name: </label></tr>
						<tr> '.$mothername.'</label></tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Grand mother name: </label></tr>
						<tr> '.$grandmothername.'</label></tr></br>
					</td>
					</table>
			</div>
		</div></br></br>

				<div class=" col-md-offset-2 col-md-7 col-xs-12" style="border:1px solid #c0c0c0;">
					<form class="form-horizontal">
						<center></br>
							<p class="actiontitel">Update resident</p></br></hr>
						</center>

						<div class="form-group" id="woredadiv">
							<label class="control-label col-xs-4" for="woredaselect">Woreda:</label>
							<div class="col-xs-7">
								<select class="form-control" id="woredaselect" value="'.$woreda.'">
	                            	<option value="no" selected id="default">Select one</option>
	                                <option value="01">01</option>
	                                <option value="02">02</option>
	                                <option value="03">03</option>
	                                <option value="04">04</option>
	                                <option value="05">05</option>
			                    </select>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="woreda_validation_feedback"></div>
						</div>

						<div class="form-group" id="kebelediv">
							<label class="control-label col-xs-4" for="kebeleselect">Kebele:</label>
							<div class="col-xs-7">
								<select class="form-control" id="kebeleselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="01">01</option>
		                                <option value="02">02</option>
		                                <option value="03">03</option>
		                                <option value="04">04</option>
		                                <option value="05">05</option>
			                    </select>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="kebele_validation_feedback"></div>
						</div>


						<div class="form-group" id="contactdiv">
							<label class="control-label col-xs-4" for="contacttxt">Contact:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="contacttxt" name="contacttxt" placeholder="Contact">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="contact_validation_feedback"></div>
						</div>

						<div class="form-group" id="emaildiv">
							<label class="control-label col-xs-4" for="emailtxt">Email:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="emailtxt" name="emailtxt" placeholder="Email">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="email_validation_feedback"></div>
						</div>

						<div class="form-group" id="housestatusdiv">
							<label class="control-label col-xs-4" for="housestatusselect">House status:</label>
							<div class="col-xs-7">
								<select class="form-control" id="housestatusselect" name="housestatusselect">
		                         	<option value="no" selected id="default">Select one</option>
		                            <option value="own">Own</option>
		                            <option value="rent">Rent</option>
		                            <option value="kebele">Kebele</option>
		                            <option value="4">4</option>
			                    </select>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="housestatus_validation_feedback"></div>
						</div>

						<div class="form-group" id="maritalstatusdiv">
							<label class="control-label col-xs-4" for="maritalstatusselect">Marital status:</label>
							<div class="col-xs-7">
								<select class="form-control" id="maritalstatusselect">
		                         	<option value="no" selected id="default">Select one</option>
		                            <option value="marrid">Married</option>
		                            <option value="widdowed">Widdowed</option>
		                            <option value="single">Single</option>
			                    </select>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="maritalstatus_validation_feedback"></div>
						</div>

						<div class="form-group" id="incomediv">
							<label class="control-label col-xs-4" for="incometxt">Income:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="incometxt" name="incometxt" placeholder="Income">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="income_validation_feedback"></div>
						</div>

						<div class="form-group" id="incomesourcediv">
							<label class="control-label col-xs-4" for="sextxt">Income source:</label>
							<div class="col-xs-7">
			                     	<select class="form-control" id="incomesourceselect" placeholder="asd">
		                            	<option value="no" id="default">Select one</option>
		                                <option value="governmental">Governmental</option>
			                            <option value="non-governmental">Non-Governmental</option>
			                            <option value="private">Private</option>
			                         </select>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="incomesource_validation_feedback"></div>
						</div>
						<div class="form-group" id="photodiv">
							<label class="control-label col-xs-4" for="photo">Take photo:</label>
							<div class="col-xs-7">
								<div class="row">
									<div class="col-xs-7" id="my_camera"></div>
								</div>
								<div class="row">
									<div class="col-xs-5"></br></div>
								</div>
								<div class="row">
									<div class="col-xs-7" id="results"></div>
								</div>
								</br>
								<div class="row col-xs-12">
									<div class="col-xs-6" id="tochangebtn">
										<input type="button" class=" btn-success" value="Start" onClick="setup(); ">
									</div>
									<div class="col-xs-6">
										<input type="button" class=" btn-primary" value="Capture" onClick="take_snapshot();">
									</div>
								</div>
								
								
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="photo_validation_feedback"></div>
						</div>

																		<br>
												<div class="form-group">
													<div class="col-xs-offset-4 col-xs-8">
														<div class="col-xs-6">
															<input type="button" class="btn btn-primary  btn-block" id="savebtn" name="savebtn" value="Save">
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

					/*function load()
					{
						document.getElementById("woredaselect").value="'.$woreda.'";
						document.getElementById("kebeleselect").value="'.$kebele.'";
						document.getElementById("contacttxt").value="'.$contact.'";
						document.getElementById("emailtxt").value="'.$email.'";
						document.getElementById("housestatusselect").value="'.$house_status.'";
						document.getElementById("maritalstatusselect").value="'.$marital_status.'";
						document.getElementById("incometxt").value="'.$income.'";
						document.getElementById("incomesourceselect").value="'.$income_source.'";
						var x="'.$woreda.'";
						alert(99);
					}*/
					$(document).ready(function() {
						document.getElementById("woredaselect").value="'.$woreda.'";
						document.getElementById("kebeleselect").value="'.$kebele.'";
						document.getElementById("contacttxt").value="'.$contact.'";
						document.getElementById("emailtxt").value="'.$email.'";
						document.getElementById("housestatusselect").value="'.$house_status.'";
						document.getElementById("maritalstatusselect").value="'.$marital_status.'";
						document.getElementById("incometxt").value="'.$income.'";
						document.getElementById("incomesourceselect").value="'.$income_source.'";
						//alert("'.$woreda.'");
					});
			function photochanged()
            {
            	    var photo=""
            	    try{
            	    photo = $("#photo").src();
            		}catch(error)
            		{

            		}
					if(photo!="")
					{
						document.getElementById("photodiv").className="form-group has-success";
						document.getElementById("photo_validation_feedback").innerHTML="";
					}
					else
					{
						document.getElementById("photodiv").className="form-group has-error";
						document.getElementById("photo_validation_feedback").innerHTML="<b><p style=color:red;>Capture photo</p></b>";
					}
            }

            

			$("#savebtn").click(function(event){
				var residentid="'.$residentid.'";
            	var fname="'.$fname.'";
            	var mname="'.$mname.'";
            	var lname="'.$lname.'";
            	var gender="'.$gender.'";
            	var birth="'.$birth.'";
            	var date="'.$date.'";
            	var mothername="'.$mothername.'";
            	var grandmothername="'.$grandmothername.'";
            	/*var woreda="'.$woreda.'";
            	var kebele="'.$kebele.'";
            	var contact="'.$contact.'";
            	var email="'.$email.'";
            	var housestatus="'.$house_status.'";
            	var maritalstatus="'.$marital_status.'";
            	var income="'.$income.'";
            	var incomesource="'.$income_source.'";*/
            	var photo="'.$photo.'";

            		try{
            			var photocam="";
            			photocam = document.getElementById("photo").src;
	            	}catch(error)
		            {
		            	//photochanged();
		            }

		         if(photocam.length>10)
		         {
		         	photo=photocam;
		         }

            	woreda=$("#woredaselect").val();
            	kebele=$("#kebeleselect").val();
            	contact=$("#contacttxt").val();
            	email=$("#emailtxt").val();
            	housestatus=$("#housestatusselect").val();
            	maritalstatus=$("#maritalstatusselect").val();
            	income=$("#incometxt").val();
            	incomesource=$("#incomesourceselect").val();

       
				$("#woredaselect").trigger("change");
				$("#kebeleselect").trigger("change");
				$("#contacttxt").trigger("change");
				$("#emailtxt").trigger("change");
				$("#housestatusselect").trigger("change");
				$("#maritalstatusselect").trigger("change");
				$("#incomesourceselect").trigger("change");
				$("#incometxt").trigger("change");
				$("#photo").trigger("change");

				if( select_validator(woreda) && select_validator(kebele) && contact_validator(contact) && email_validator(email) && select_validator(housestatus) && select_validator(maritalstatus) && income_validator(income) && select_validator(incomesource))
				{

					$("#searchdisplaydiv").load("../../controller/resident/update.php", {"residentid":residentid,"woreda":woreda, "kebele":kebele,"contact":contact, "email":email,"housestatus":housestatus,"maritalstatus":maritalstatus,"income":income,"incomesource":incomesource,"photo":photo} );
				}else
				{

				}
				});

				$("#cancelbtn").click(function(event){
            		$("#searchdisplaydiv").empty();
            		$("#searchdisplaydiv").empty();
            		document.getElementById("txtsearch").value="";
            		document.getElementById("searchdiv").className="form-group";
					document.getElementById("residentid_validation_feedback").innerHTML="";
				});
				
				
	</script>';

	}else
	{
			  echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8 wow fadeInUp">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>residentid with id '.$residentid.' was not found!! please enter exeting residentid id</center>
                    </b>
                </div>';
	}
}else
{
	echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8 wow fadeInUp">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid residentid id format please enter valid employee id ex. BSR006.</center>
                    </b>
                </div>';
}

			 
?>
