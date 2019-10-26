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
		    function loadinfo()
		         	{
		     
		         		$("#maindiv").load('../../controller/applicant/viewinfo.php');
		         	}
         $(document).ready(function() {
   			function loadinfo()
         	{
     
         		$("#maindiv").load('../../controller/applicant/viewinfo.php', {"size":size});
         	}

            $("#savebtn").click(function(event){
            	var fname=$("#firstnametxt").val();
            	var mname=$("#middlenametxt").val();
            	var lname=$("#lastnametxt").val();
            	var gender=$("#genderselect").val();
            	var birthdate=$("#birthdatedate").val();
            	var mothername=$("#mothernametxt").val();
            	var grandmothername=$("#grandmothernametxt").val();
            	var woreda=$("#woredaselect").val();
            	var kebele=$("#kebeleselect").val();
            	var contact=$("#contacttxt").val();
            	var email=$("#emailtxt").val();
            	var housestatus=$("#housestatusselect").val();
            	var maritalstatus=$("#maritalstatusselect").val();
            	var income=$("#incometxt").val();
            	var incomesource=$("#incomesourceselect").val();

            		var photo="";
            		try{
            		photo = document.getElementById("photo").src;
	            	}catch(error)
		            {
		            	//$("#photo").trigger("change");
		            	photochanged();
		            }
       
				$("#firstnametxt").trigger("change");
				$("#lastnametxt").trigger("change");
				$("#middlenametxt").trigger("change");
				$("#mothernametxt").trigger("change");
				$("#grandmothernametxt").trigger("change");
				$("#genderselect").trigger("change");
				$("#birthdatedate").trigger("change");
				$("#woredaselect").trigger("change");
				$("#kebeleselect").trigger("change");
				$("#contacttxt").trigger("change");
				$("#emailtxt").trigger("change");
				$("#housestatusselect").trigger("change");
				$("#maritalstatusselect").trigger("change");
				$("#incomesourceselect").trigger("change");
				$("#incometxt").trigger("change");
				$("#photo").trigger("change");

				if(name_validator(fname) && name_validator(mname) && name_validator(lname) && date_validator(birthdate) && gender_validator(gender) && name_validator(mothername) && name_validator(grandmothername) && select_validator(woreda) && select_validator(kebele) && contact_validator(contact) && email_validator(email) && select_validator(housestatus) && select_validator(maritalstatus) && income_validator(income) && select_validator(incomesource) && photo!="")
				{
					$("#resultdiv").load('../../controller/resident/register.php', {"firstname":fname,"middlename":mname,"lastname":lname,"mothername":mothername, "grandmothername":grandmothername, "gender":gender, "woreda":woreda, "kebele":kebele,"contact":contact, "email":email,"housestatus":housestatus,"maritalstatus":maritalstatus,"income":income,"incomesource":incomesource,"birthdate":birthdate,"photo":photo} );
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

            	document.getElementById('firstnametxt').value='';
            	document.getElementById('firstnamediv').className='form-group';
				document.getElementById('firstname_validation_feedback').innerHTML='';

				document.getElementById('middlenametxt').value='';
            	document.getElementById('middlenamediv').className='form-group';
				document.getElementById('middlename_validation_feedback').innerHTML='';

				document.getElementById('lastnametxt').value='';
            	document.getElementById('lastnamediv').className='form-group';
				document.getElementById('lastname_validation_feedback').innerHTML='';

				document.getElementById('genderselect').value='no';
            	document.getElementById('genderdiv').className='form-group';
				document.getElementById('gender_validation_feedback').innerHTML='';

				document.getElementById('mothernametxt').value='';
            	document.getElementById('mothernamediv').className='form-group';
				document.getElementById('mothername_validation_feedback').innerHTML='';

				document.getElementById('grandmothernametxt').value='';
            	document.getElementById('grandmothernamediv').className='form-group';
				document.getElementById('grandmothername_validation_feedback').innerHTML='';

				document.getElementById('woredaselect').value='no';
            	document.getElementById('woredadiv').className='form-group';
				document.getElementById('woreda_validation_feedback').innerHTML='';

				document.getElementById('kebeleselect').value='no';
            	document.getElementById('kebelediv').className='form-group';
				document.getElementById('kebele_validation_feedback').innerHTML='';

				document.getElementById('contacttxt').value='';
            	document.getElementById('contactdiv').className='form-group';
				document.getElementById('contact_validation_feedback').innerHTML='';

				document.getElementById('emailtxt').value='';
            	document.getElementById('emaildiv').className='form-group';
				document.getElementById('email_validation_feedback').innerHTML='';

				document.getElementById('housestatusselect').value='no';
            	document.getElementById('housestatusdiv').className='form-group';
				document.getElementById('housestatus_validation_feedback').innerHTML='';

				document.getElementById('maritalstatusselect').value='no';
            	document.getElementById('maritalstatusdiv').className='form-group';
				document.getElementById('maritalstatus_validation_feedback').innerHTML='';

				document.getElementById('incometxt').value='';
            	document.getElementById('incomediv').className='form-group';
				document.getElementById('income_validation_feedback').innerHTML='';

				document.getElementById('incomesourceselect').value='no';
            	document.getElementById('incomesourcediv').className='form-group';
				document.getElementById('incomesource_validation_feedback').innerHTML='';

				});
			});
     </script>
      	<!-- First, include the Webcam.js JavaScript Library -->
</head>

<body onload="loadinfo()">
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
	</div>
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
								<a href="empbsc.php" class="" style="color: black;"><b>MY info</b></a>
							</li>
							<li class="onhoveside">
								<a href="updateresident.php" class="" style="color: black;"><b>Update resident</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteresident.php" class="" style="color: black;"><b>Delete  resident</b></a>
							</li>
							<li class="onhoveside">
								<a href="registermarital.php" class="" style="color: black;"><b>Register marital</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Update marital</b></a>
							</li>
							<li class="onhoveside">
								<a href="deletemarital.php" class="" style="color: black;"><b>Delete  marital</b></a>
							</li>
							<li class="onhoveside">
								<a href="generatereport.php" class="" style="color: black;"><b>Generate report</b></a>
							</li>
						</div>
					</div>
					<div class="col-md-2 col-xs-12 hidden-lg hidden-md" >
						<div class="nav nav-pills nav-stacked">
							<li class="onactiveside onhoveside">
								<a href="empbsc.php" class="onhoveside" style="color: black;">Register resident</a>
							</li>
							<li class="onhoveside">
								<a href="updateresident.php" class="onhoveside" style="color: black;">Update resident</a>
							</li>
							<li class="onhoveside">
								<a href="deleteresident.php" class="onhoveside" style="color: black;">Delete resident</a>
							</li>
							<li class="onhoveside">
								<a href="registermarital.php" class="" style="color: black;"><b>Register marital</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Update marital</b></a>
							</li>
							<li class="onhoveside">
								<a href="deletemarital.php" class="" style="color: black;"><b>Delete  marital</b></a>
							</li>
							<li class="onhoveside">
								<a href="generatereport.php" class="" style="color: black;"><b>Generate report</b></a>
							</li>
						</div>
					</div>


					<div class="col-md-7 col-xs-12" style="border:1px solid #c0c0c0;" id="maindiv">
						<form class="form-horizontal">
							<center></br>
								<p class="actiontitel">Register Resident</p></br></hr>
							</center>

							<div class="form-group" id="photodiv">
							
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