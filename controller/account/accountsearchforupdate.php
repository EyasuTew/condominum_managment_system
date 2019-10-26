<?php	
include_once('db.php');
include_once('validator.php');
$empid=$_POST["empid"];
$DB_con = connect();
if(empid_validator($empid))
{
	$stmt1 = $DB_con->prepare('SELECT * FROM emp_acc where emp_id=:empid');
	$stmt1->bindParam(':empid',$empid);
	$stmt1->execute();
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

	$stmt2 = $DB_con->prepare('SELECT * FROM employee where emp_id=:empid');
	$stmt2->bindParam(':empid',$empid);
	$stmt2->execute();
	$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

	if($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0){
		$fullname=$row2["fname"]." ".$row2["mname"]." ".$row2["lname"];
		$sex=$row2["sex"];
		$type=$row2["type"];
		$branch=$row2["branch"];
		$photo=$row2["photo"];
		$birtdate=$row2["birth"];
		$user_name=$row1["user_name"];
		$password=$row1["password"];
		$user_type=$row1["user_type"];

		echo '</br>
		<div class="form-group" id="">
			<div class="row col-xs-offset-2 ">
				<div class="col-xs-3" >
					<img src="../../photo/'.$photo.'.jpg" alt="Employee photo" class="img-thumbnail">
				</div>
				<div class="col-xs-7">
					<table>
					<td>
						<tr><label class="control-label" >Full name: </label></tr>
						<tr> '.$fullname.'</tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Gender: </label></tr>
						<tr> '.$sex.'</tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Birth date: </label></tr>
						<tr> '.$birtdate.'</tr></br>
					</td>
					<td>
						<tr><label class="control-label" >User type: </label></tr>
						<tr> '.$type.'</label></tr></br>
					</td>
					<td>
						<tr><label class="control-label" >Branch: </label></tr>
						<tr> '.$branch.'</label></tr></br>
					</td>
					</table>
			</div>
		</div></br></br>

				<div class=" col-md-offset-2 col-md-7 col-xs-12">
					<form class="form-horizontal">
												
						<div class="form-group" id="usernamediv">
							<label class="control-label col-xs-4" for="inputEmail">User name:</label>
							<div class="col-xs-8">
								<input type="text" class="form-control" id="usernametxt" name="usernametxt" placeholder="Resident Id"
								value="'.$user_name.'">
							</div>
							<div class="valid-feedback col-md-offset-5" id="username_validation_feedback"></div>
						</div>
						<div class="form-group" id="passworddiv">
							<label class="control-label col-xs-4" for="inputEmail">Password:</label>
							<div class="col-xs-8">
								<!--<input type="password" class="form-control" id="passwordtxt" name="passwordtxt" placeholder="Password" value="'.$password.'">-->
								<input type="password" class="form-control" id="passwordtxt" name="passwordtxt" placeholder="Password">
							</div>
							<div class="valid-feedback col-md-offset-5" id="password_feedback"></div>
						</div>
						<div class="form-group" id="passwordconfirmdiv">
							<label class="control-label col-xs-4" for="inputEmail">Confirm:</label>
							<div class="col-xs-8">
								<input type="password" class="form-control" id="passwordconfirmtxt" name="passwordconfirmtxt" placeholder="Confirm" >
							</div>
							<div class="valid-feedback col-md-offset-5" id="passwordconfirm_validation_feedback"></div>
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
	 	            $("#usernametxt").change(function(event){
	 	            	            	
	         			var username = $("#usernametxt").val();

						if(username_validator(username) && (username!=""))
						{
							document.getElementById("usernamediv").className="form-group has-success";
							document.getElementById("username_validation_feedback").innerHTML="";
							
						}else if(username=="")
						{
							document.getElementById("usernamediv").className="form-group has-error";
							document.getElementById("username_validation_feedback").innerHTML="<b><p style=color:red;>Empty employee id</p></b>";
						}
						else
						{
							document.getElementById("usernamediv").className="form-group has-error";
							document.getElementById("username_validation_feedback").innerHTML="<b><p style=color:red;>Invalid employee id</p></b>";
						}
	         	});

	         	$("#passwordtxt").change(function(event){
	 	            	            	
	         			var password = $("#passwordtxt").val();
	         			var passwordconfirm = $("#passwordconfirmtxt").val();
	         			if(password!=passwordconfirm)
	         			{
	         				document.getElementById("passworddiv").className="form-group has-error";
							document.getElementById("password_feedback").innerHTML="<b><p style=color:red;>Password does not match</p></b>";
	         			}
						else if(password_validator(password) && (password!=""))
						{
							document.getElementById("passworddiv").className="form-group has-success";
							document.getElementById("password_feedback").innerHTML="";
						}else if(password=="")
						{
							document.getElementById("passworddiv").className="form-group has-error";
							document.getElementById("password_feedback").innerHTML="<b><p style=color:red;>Empty password</p></b>";
						}
						else
						{
							document.getElementById("passworddiv").className="form-group has-error";
							document.getElementById("password_feedback").innerHTML="<b><p style=color:red;>Minimum password length is 6</p></b>";
						}
	         	});

	         	$("#passwordconfirmtxt").change(function(event){
	 	            	            	
	         			var password = $("#passwordtxt").val();
	         			var passwordconfirm = $("#passwordconfirmtxt").val();

						if(password_validator(passwordconfirm) && (password!="") && (password==passwordconfirm))
						{
							document.getElementById("passwordconfirmdiv").className="form-group has-success";
							document.getElementById("passwordconfirm_validation_feedback").innerHTML="";
						}else if(passwordconfirm=="")
						{
							document.getElementById("passwordconfirmdiv").className="form-group has-error";
							document.getElementById("passwordconfirm_validation_feedback").innerHTML="<b><p style=color:red;>Empty password</p></b>";
						}else if(passwordconfirm!=password)
						{
							document.getElementById("passwordconfirmdiv").className="form-group has-error";
							document.getElementById("passwordconfirm_validation_feedback").innerHTML="<b><p style=color:red;>Password does not match</p></b>";
						}
						else
						{
							document.getElementById("passwordconfirmdiv").className="form-group has-error";
							document.getElementById("passwordconfirm_validation_feedback").innerHTML="<b><p style=color:red;>Minimum password length is 6</p></b>";
						}
	         	});

	         	$("#savebtn").click(function(event){
            		
               		var username = $("#usernametxt").val();
               		var password = $("#passwordtxt").val();
               		var passwordconfirm = $("#passwordconfirmtxt").val();

               		
					var searchElement = document.getElementById("txtsearch");
					var empid = $("#txtsearch").val();
					$("#usernametxt").trigger("change");
					$("#passwordtxt").trigger("change");
					$("passwordconfirmtxt").trigger("change");

					
					if(username_validator(username) && password_validator(password) && password_validator(passwordconfirm) && (password==passwordconfirm))
					{   
						$("#searchdisplaydiv").empty();
						$("#searchdisplaydiv").load("../../controller/account/update.php", {"empid":empid,"username":username,"password":password} );
					}else
					{

					}
				});

				$("#cancelbtn").click(function(event){
            		$("#searchdisplaydiv").empty();
				});
	</script>';

	}else
	{
			  echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Employee with id '.$empid.' was not found!! please enter exeting employee id</center>
                    </b>
                </div>';
	}
}else
{
	echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Invalid Employee id format please enter valid employee id ex. CA003 CE112 AN008.</center>
                    </b>
                </div>';
}

			 
?>
