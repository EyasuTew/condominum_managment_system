<?php


    session_start();
 /*       setcookie("sessionId","",time()-60,"/","",0);
        //session_destroy();
        unset($_SESSION["user_name"]);
        unset($_SESSION["password"]);
        unset($_SESSION["user_type"]);*/

if( isset($_SESSION["user_name"]) && isset($_SESSION["password"]) && isset($_SESSION["user_type"])&&isset($_COOKIE["sessionId"]))
{
   

}else
{
    
    header('location: ../../index.php');
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>CMS-BSC</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/hoving.css">
	<script src="../../js/jquery2.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/wow.min.js"></script>
	<style>
		@media screen and (max-width:480px) {

		}
	</style>
	<script src="../../js/validator.js"></script>  
    <script type = "text/javascript" src = "../../js/jquery.min1.js"></script>
    <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {

         	$("#empidtxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('empidtxt');

         			var empid = $("#empidtxt").val();
					if(empid_validator(empid) && (empid!=""))
					{
						document.getElementById('empiddiv').className='form-group has-success';
						document.getElementById('empid_validation_feedback').innerHTML='';
					}else if(empid=="")
					{
						document.getElementById('empiddiv').className='form-group has-error';
						document.getElementById('empid_validation_feedback').innerHTML='<b><p style="color:red;">Empty employee id</p></b>';
						earchElement.focus();
					}
					else
					{
						document.getElementById('empiddiv').className='form-group has-error';
						document.getElementById('empid_validation_feedback').innerHTML='<b><p style="color:red;">Invalid employee id</p></b>';
						searchElement.focus();
					}
         	});
         	$("#usernametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var usernameElement = document.getElementById('usernametxt');

         			var username = $("#usernametxt").val();
					if(username_validator(username) && (username!=""))
					{
						document.getElementById('usernamediv').className='form-group has-success';
						document.getElementById('username_validation_feedback').innerHTML='';
					}else if(username=="")
					{
						document.getElementById('usernamediv').className='form-group has-error';
						document.getElementById('username_validation_feedback').innerHTML='<b><p style="color:red;">Username employee id</p></b>';
						usernameElement.focus();
					}
					else
					{
						document.getElementById('usernamediv').className='form-group has-error';
						document.getElementById('username_validation_feedback').innerHTML='<b><p style="color:red;">Invalid username</p></b>';
						usernameElement.focus();
					}
         	});
         	$("#passwordtxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var usernameElement = document.getElementById('passwordtxt');

         			var password = $("#passwordtxt").val();
					if(password_validator(password) && (password!=""))
					{
						document.getElementById('passworddiv').className='form-group has-success';
						document.getElementById('password_validation_feedback').innerHTML='';
					}else if(password=="")
					{
						document.getElementById('passworddiv').className='form-group has-error';
						document.getElementById('password_validation_feedback').innerHTML='<b><p style="color:red;">Empty password</p></b>';
						passwordElement.focus();
					}
					else
					{
						document.getElementById('passworddiv').className='form-group has-error';
						document.getElementById('password_validation_feedback').innerHTML='<b><p style="color:red;">Invalid or weak password</p></b>';
						passwordElement.focus();
					}
         	});

         	$("#confirmpasswordtxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var confirmpasswordtxtElement = document.getElementById('confirmpasswordtxt');

         			var password = $("#passwordtxt").val();
         			var confirmpasswordtxt = $("#confirmpasswordtxt").val();
					if(password_validator(confirmpasswordtxt) && (confirmpasswordtxt!="") && confirmpasswordtxt==password)
					{
						document.getElementById('confirmpassworddiv').className='form-group has-success';
						document.getElementById('confirmpassword_validation_feedback').innerHTML='';
					}else if(confirmpasswordtxt=="")
					{
						document.getElementById('confirmpassworddiv').className='form-group has-error';
						document.getElementById('confirmpassword_validation_feedback').innerHTML='<b><p style="color:red;">Empty password</p></b>';
						confirmpasswordtxtElement.focus();
					}else if(confirmpasswordtxt!=password)
					{
						document.getElementById('confirmpassworddiv').className='form-group has-error';
						document.getElementById('confirmpassword_validation_feedback').innerHTML='<b><p style="color:red;">Password does not match</p></b>';
						confirmpasswordtxtElement.focus();
					}
					else
					{
						document.getElementById('confirmpassworddiv').className='form-group has-error';
						document.getElementById('confirmpassword_validation_feedback').innerHTML='<b><p style="color:red;">Invalid or weak password</p></b>';
						confirmpasswordtxtElement.focus();
					}
         	});

         	$("#usertypeselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var usertypeselect = document.getElementById('usertypeselect');

         			var usertype = $("#usertypeselect").val();
					if(usertype=="BSC" ||usertype=="CBE" ||usertype=="MG" || usertype=="Admin")
					{
						document.getElementById('usertypediv').className='form-group has-success';
						document.getElementById('usertype_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('usertypediv').className='form-group has-error';
						document.getElementById('usertype_validation_feedback').innerHTML='<b><p style="color:red;">Select user type</p></b>';
						usertypeselectElement.focus();
					}
         	});

            $("#savebtn").click(function(event){
            	//$("#resultdiv").empty();
            	var empid = $("#empidtxt").val();
            	var password = $("#passwordtxt").val();
            	$("#confirmpasswordtxt").trigger("change");
            	var username = $("#usernametxt").val();
            	var usertype = $("#usertypeselect").val();
					//var searchElement = document.getElementById('txtsearch');
					//var empid = $("#txtsearch").val();
				$("#empidtxt").trigger("change");
				$("#passwordtxt").trigger("change");
				$("#usernametxt").trigger("change");
				$("#usertypeselect").trigger("change");

				if(empid_validator(empid) && username_validator(username) && password_validator(password) && (usertype=="BSC" ||usertype=="CBE" ||usertype=="MG" || usertype=="Admin"))
				{
					$("#resultdiv").load('../../controller/account/create.php', {"empid":empid,"username":username,"password":password,"usertype":usertype} );
				}else
				{

				}
				});

             $("#cancelbtn").click(function(event){
            	//$("#resultdiv").empty();
            	/*var empid = $("#empidtxt").val();
            	var password = $("#passwordtxt").val();
            	var username = $("#usernametxt").val();
            	var usertype = $("#usertypeselect").val();*/
            	
            	/*$("#empidtxt").attr("value", "");
            	$("#usertxt").attr("value", "");
            	$("#passwordtxt").attr("value", "");
            	$("#confirmpasswordtxttxt").attr("value", "");
            	$("#default").attr("", "Selected");*/
            	/*$("#empidtxt").trigger("change");
				$("#passwordtxt").trigger("change");
				$("#confirmpasswordtxt").trigger("change");
				$("#usernametxt").trigger("change");
				$("#usertypeselect").trigger("change");*/

            	document.getElementById('empidtxt').value='';
            	document.getElementById('usertypediv').className='form-group';
				document.getElementById('usertype_validation_feedback').innerHTML='';

				document.getElementById('confirmpasswordtxt').value='';
				document.getElementById('confirmpassworddiv').className='form-group';
				document.getElementById('confirmpassword_validation_feedback').innerHTML='';

				document.getElementById('usernamediv').className='form-group';
				document.getElementById('username_validation_feedback').innerHTML='';
            	document.getElementById('usernametxt').value='';

            	document.getElementById('passworddiv').className='form-group';
				document.getElementById('password_validation_feedback').innerHTML='';
            	document.getElementById('passwordtxt').value='';
            	
            	document.getElementById('usertypediv').className='form-group';
				document.getElementById('usertype_validation_feedback').innerHTML='';
            	document.getElementById('usertypeselect').value='';

				});
			});
            // $("#resultindiv").html("<b style='color:black; background-color:skyblue; font-size:17px'>Please enter data</b>");


      </script>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top no-gutters" style="background-color: black; border-bottom: 4px solid white">
		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="#" class="navbar-brand">
					<span class="glyphicon glyphicon-home"></span> CMS</a>
			</div>

			<div class="collapse navbar-collapse" id="collapse" >

				<ul class="nav navbar-nav navbar-right"  >
					<li><a href="admin.php" class="onhove">Home</a></li>
					 <li>
                        <a href="" class="dropdown-toggle onhove"" data-toggle="dropdown">
                            Amir  <span class="glyphicon glyphicon-menu-down"></span></a>
                        <ul class="dropdown-menu">
                            <div style="width:100%;">
                                <div class="nav nav-pills nav-stacked" style="background-color: white;"">
                                    <li class="onhoveblack">
                                        <a href="#" class="" style="background-color: white; color: black"><span class="glyphicon glyphicon-cog"></span> Setting</a>
                                    </li>
                                    <li class="onhoveblack">
                                        <a href='../../controller/account/logout.php' class="" style="background-color: white; color: black"><span class="glyphicon glyphicon-log-out"></span> logout</a>
                                    </li>
                                </div>
                            </div>
                            </ul>
                            </li>
				</ul>
			</div>
		</div>
	</div><!--  -->

	<p>
		<br/>
	</p>
	<p>
		<br/>
	</p>
	<p>
		<br/>
	</p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">

			</div>
			<div class="col-md-12 col-xs-12">
				<div class="row">
					<div class="col-md-2 col-xs-12" >
						<div class="nav nav-pills nav-stacked fixed-top hidden-xs hidden-sm" style="position: fixed; width:15%; border:1px solid #c0c0c0; ">
							<li class="onactiveside onhoveside">
								<a href="admin.php" class="" style="color: black;"><b>Create account</b></a>
							</li>
							<li class="onhoveside">
								<a href="updateaccunt.php" class="" style="color: black;"><b>Update account</b></a>
							</li>
                            
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Delete account</b></a>
							</li>
						</div>
					</div>
					<div class="col-md-2 col-xs-12 hidden-lg hidden-md" >
						<div class="nav nav-pills nav-stacked">
							<li class="onhoveside">
								<a href="onactiveside admin.php" class="onhoveside" style="color: black;">Create account</a>
							</li>
							<li class="onhoveside">
								<a href="updateaccunt.php" class="onhoveside" style="color: black;">Update account</a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="onhoveside" style="color: black;">Delete account</a>
							</li>
						</div>
					</div>

					<div class="col-md-7 col-xs-12" style="border:1px solid #c0c0c0; height:550px">
					<form class="form-horizontal">
						<center></br>
							<p class="actiontitel">Create user account</p></br></hr>
						</center>
						<div class="form-group" id="empiddiv">
							<label class="control-label col-xs-4" for="empidtxt">Employee Id:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="empidtxt" name="empidtxt" placeholder="Employee id">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="empid_validation_feedback"></div>
						</div>
						<div class="form-group" id="usernamediv">
							<label class="control-label col-xs-4" for="empidtxt">User name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="usernametxt" name="usernametxt" placeholder="User name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="username_validation_feedback"></div>
						</div>
						<div class="form-group" id="passworddiv">
							<label class="control-label col-xs-4" for="passwordtxt">Password:</label>
							<div class="col-xs-7">
								<input type="password" class="form-control" id="passwordtxt" name="passwordtxt" placeholder="password">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="password_validation_feedback"></div>
						</div>
						<div class="form-group" id="confirmpassworddiv">
							<label class="control-label col-xs-4" for="confirmpasswordtxt">Confirm:</label>
							<div class="col-xs-7">
								<input type="password" class="form-control" id="confirmpasswordtxt" name="confirmpasswordtxt" placeholder="password">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="confirmpassword_validation_feedback"></div>
						</div>                   
		                <div class="form-group" id="usertypediv">
		                        <label class="control-label col-xs-4">User type:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="usertypeselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="CBE">Employee of CBE</option>
		                                <option value="BSC">Employee of BSC</option>
		                                <option value="MG">Manager</option>
		                                <option value="Admin">System Administrator</option>
		                            </select>
		                        </div>

		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="usertype_validation_feedback"></div>
		                    </div>  	                
							<br>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-8">
									<div class="col-xs-6">
										<input type="button" class="btn btn-primary  btn-block" id="savebtn" name="savebtn" value="Save">
									</div>
									<div class="col-xs-"></div>
									<div class="col-xs-6">
										<input type="button" class="btn btn-danger  btn-block" id="cancelbtn" name="cancelbtn" value="Cancel" >
									</div>
								</div>
								</br>
						    </div>
						    <div class=" col-xs-12" id="resultdiv">
						    	 <!--form ajax-->
						    </div>
						</form>

					</div>

					<div class="col-md-3 col-xs-12" >
						<div class="panel panel-default " style="position: fixed; width:22%">
							<div class="panel-heading">
								<h4><span class="glyphicon glyphicon-bell"></span> Notice</h4>
							</div>
							<div class="panel-body" >
                                <div  id="noticeResult"> <blockquote >my vcvc dfdfd werer erer erere erere erere erere erere</blockquote>
                                <blockquote >my vcvc dfdfd werer erer erere erere erere erere erere</blockquote>
                                <blockquote >my vcvc dfdfd werer erer erere erere erere erere erere</blockquote></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
		<div class="col-md-1"> </div>
	</div>
	</div>


	<div id="footer" class="footer" style="background-color: black; color:white">
		<div class="container">
			<center>
				<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
			</center>
		</div>
	</div>
</body>
</html>