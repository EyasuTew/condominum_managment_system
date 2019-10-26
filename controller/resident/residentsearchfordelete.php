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
					<td>
						<tr><label class="control-label" >Address: </label></tr>
						<tr> '.$sub_city.' Sub-city'.$woreda.' Woreda '.$kebele.' Kebele</label></tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Contact and email: </label></tr>
						<tr> Phone: '.$contact.' Email: '.$email.'</label></tr></br>
					</td>
					<td>
						<tr><label class="control-label" >House status: </label></tr>
						<tr> '.$house_status.'</label></tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Income: </label></tr>
						<tr> '.$income.' '.$income_source.'</label></tr></br>
					</td>
					</table>
			</div>
		</div></br></br>
			<div class=" col-md-offset-2 col-md-7 col-xs-12">
				<form class="form-horizontal">				
					<div class="form-group" id="usernamediv">
						<label class="control-label col-xs-4" for="inputEmail"></label>
						<div class="col-xs-8">
						<b style="color:red"> Confirm to delete this user account</b>
						</div>
						<div class="valid-feedback col-md-offset-5" id="username_validation_feedback"></div>
					</div>					
					<div class="form-group">
						<div class="col-xs-offset-4 col-xs-8">
							<div class="col-xs-6">
								<input type="button" class="btn btn-primary  btn-block" id="confirmbtn" name="confrimbtn" value="Confirm">
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
	         	$("#confirmbtn").click(function(event){
						var resident_id = $("#txtsearch").val();;
						$("#searchdisplaydiv").empty();
						$("#searchdisplaydiv").load("../../controller/resident/delete.php", {"resident_id":resident_id} );
					
				});

				$("#cancelbtn").click(function(event){
            		$("#searchdisplaydiv").empty();
				});
			</script>';
	}else
	{
			  echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Resident with id '.$residentid.' was not found!! please enter exeting employee id</center>
                    </b>
                </div>';
	}
}else
{
	echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid Resident id format please enter valid resident id ex. BSR96 .</center>
                    </b>
                </div>';
}

			 
?>
