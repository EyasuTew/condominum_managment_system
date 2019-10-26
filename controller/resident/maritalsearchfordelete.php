<?php	
include_once('../db.php');
include_once('../validator.php');

$marital_id=$_POST["maritalid"];
$DB_con = connect();
if(maritalid_validator($marital_id))
{
	$stmt1 = $DB_con->prepare('SELECT * FROM marital where marital_id=:marital_id');
	$stmt1->bindParam(':marital_id',$marital_id);
	$stmt1->execute();

	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
	if($stmt1->rowCount() > 0){
		$hisid=$row1["his_id"];
		$herid=$row1["her_id"];
		$date=$row1["date"];

		$stmt2 = $DB_con->prepare('SELECT * FROM resident where resident_id=:residentid');
		$stmt2->bindParam(':residentid',$hisid);
		$stmt2->execute();
		$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

		$stmt3 = $DB_con->prepare('SELECT * FROM resident where resident_id=:residentid');
		$stmt3->bindParam(':residentid',$herid);
		$stmt3->execute();
		$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
		if($stmt2->rowCount() > 0 && $stmt3->rowCount() > 0)
		{
			$hisfname=$row2["fname"];
			$hismname=$row2["mname"];
			$hislname=$row2["lname"];
			$hisfullname=$row2["fname"]." ".$row2["mname"]." ".$row2["lname"];
			$hisgender=$row2["gender"];
			$hisbirth=$row2["birth"];
			$hisdate=$row2["date"];
			$hisphoto=$row2["photo"];
			$hismothername=$row2["mothername"];
			$hisgrandmothername=$row2["grandmothername"];
			$hissub_city=$row2["sub_city"];
			$hisworeda=$row2["woreda"];
			$hiskebele=$row2["kebele"];
			$hiscontact=$row2["contact"];
			$hisemail=$row2["email"];
			$hishouse_status=$row2["house_status"];
			$hismarital_status=$row2["marital_status"];
			$hisincome=$row2["income"];
			$hisincome_source=$row2["income_source"];

			$herfname=$row3["fname"];
			$hermname=$row3["mname"];
			$herlname=$row3["lname"];
			$herfullname=$row3["fname"]." ".$row3["mname"]." ".$row3["lname"];
			$hergender=$row3["gender"];
			$herbirth=$row3["birth"];
			$herdate=$row3["date"];
			$herphoto=$row3["photo"];
			$hermothername=$row3["mothername"];
			$hergrandmothername=$row3["grandmothername"];
			$hersub_city=$row3["sub_city"];
			$herworeda=$row3["woreda"];
			$herkebele=$row3["kebele"];
			$hercontact=$row3["contact"];
			$heremail=$row3["email"];
			$herhouse_status=$row3["house_status"];
			$hermarital_status=$row3["marital_status"];
			$herincome=$row3["income"];
			$herincome_source=$row3["income_source"];

			echo '</br>
		<div class="form-group" id="">
			<div class="row col-xs-offset-2 ">
				<div class="col-xs-10">
					<table  style="border-top: 7px solid #000000;" class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>His information</th>
							<th>Her infromation</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="100px"><label class="control-label" >Photo: </label></td>
							<td> 
							<img src="../../residentphoto/'.$hisphoto.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail">
							</td>

							<td> <img src="../../residentphoto/'.$herphoto.'.jpeg" id="photodisp"alt="Resident photo" class="img-thumbnail">
							</td>
						</tr>
						</br>
						<tr>
							<td><label class="control-label" >Full name: </label></td>
							<td> '.$hisfullname.' </td>
							<td> '.$herfullname.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Gender: </label></td>
							<td> '.$hisgender.' </td>
							<td> '.$hergender.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Birth date: </label></td>
							<td> '.$hisbirth.' </td>
							<td> '.$herbirth.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Date: </label></td>
							<td> '.$hisdate.' </td>
							<td> '.$herdate.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Address: </label></td>
							<td> '.$hissub_city.', Woreda '.$hisworeda.', Kebele '.$hiskebele.' </td>
							<td> '.$hersub_city.', Woreda '.$herworeda.', Kebele '.$herkebele.'</td>
						</tr>
						<tr>
							<td><label class="control-label" >Registered date:</label></td>
							<td> '.$date.' </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
				<div class=" col-md-offset-2 col-md-7 col-xs-12" >
					<form class="form-horizontal">
						<div class="form-group">
							<div class="col-xs-offset-4 col-xs-8">

							<div class="form-group" id="usernamediv">
								<label class="control-label col-xs-4" for="inputEmail"></label>
								<div class="col-xs-12">
								<b style="color:red"> Confirm to delete this marital infromation</b>
								</div>
								<div class="valid-feedback col-md-offset-5" id="username_validation_feedback"></div>
							</div>	

							<div class="col-xs-6">
								<input type="button" class="btn btn-primary  btn-block" id="deletebtn" name="deletebtn" value="Delete">
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

			$("#deletebtn").click(function(event){
				marital_id="'.$marital_id.'";
				if(maritalid_validator(marital_id))
				{
					$("#searchdisplaydiv").load("../../controller/resident/deletemarital.php", {"marital_id":marital_id} );
				}else
				{

				}
				});

				$("#cancelbtn").click(function(event){
            		$("#searchdisplaydiv").empty();            		
            		document.getElementById("txtsearch").value="";
            		document.getElementById("searchdiv").className="form-group";
					document.getElementById("maritalid_validation_feedback").innerHTML="";
				});
				
				
	</script>';

		}

		
	}else
	{

			  echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Marital information with id '.$marital_id.' was not found!! please enter exeting marital id</center>
                    </b>
                </div>';
	}
}else
{
	echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid marital id format please enter valid marital id ex. BSM1.</center>
                    </b>
                </div>';
}

			 
?>
