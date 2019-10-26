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

         	$("#firstnametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('firstnametxt');

         			var fname = $("#firstnametxt").val();
					if(name_validator(fname) && (fname!=""))
					{
						document.getElementById('firstnamediv').className='form-group has-success';
						document.getElementById('firstname_validation_feedback').innerHTML='';
					}else if(fname=="")
					{
						document.getElementById('firstnamediv').className='form-group has-error';
						document.getElementById('firstname_validation_feedback').innerHTML='<b><p style="color:red;">Empty first name</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('firstnamediv').className='form-group has-error';
						document.getElementById('firstname_validation_feedback').innerHTML='<b><p style="color:red;">Invalid first name</p></b>';
						searchElement.focus();
					}
         	});

         	$("#middlenametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('middlenametxt');

         			var middlename = $("#middlenametxt").val();
					if(name_validator(middlename) && (middlename!=""))
					{
						document.getElementById('middlenamediv').className='form-group has-success';
						document.getElementById('middlename_validation_feedback').innerHTML='';
					}else if(middlename=="")
					{
						document.getElementById('middlenamediv').className='form-group has-error';
						document.getElementById('middlename_validation_feedback').innerHTML='<b><p style="color:red;">Empty middle name</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('middlenamediv').className='form-group has-error';
						document.getElementById('middlename_validation_feedback').innerHTML='<b><p style="color:red;">Invalid middle name</p></b>';
						searchElement.focus();
					}
         	});

         	$("#lastnametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('lastnametxt');

         			var lastname = $("#lastnametxt").val();
					if(name_validator(lastname) && (lastname!=""))
					{
						document.getElementById('lastnamediv').className='form-group has-success';
						document.getElementById('lastname_validation_feedback').innerHTML='';
					}else if(lastname=="")
					{
						document.getElementById('lastnamediv').className='form-group has-error';
						document.getElementById('lastname_validation_feedback').innerHTML='<b><p style="color:red;">Empty lastname name</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('lastnamediv').className='form-group has-error';
						document.getElementById('lastname_validation_feedback').innerHTML='<b><p style="color:red;">Invalid lastname name</p></b>';
						searchElement.focus();
					}
         	});

         	         	$("#mothernametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('lastnametxt');

         			var mothername = $("#mothernametxt").val();
					if(name_validator(mothername) && (mothername!=""))
					{
						document.getElementById('mothernamediv').className='form-group has-success';
						document.getElementById('mothername_validation_feedback').innerHTML='';
					}else if(mothername=="")
					{
						document.getElementById('mothernamediv').className='form-group has-error';
						document.getElementById('mothername_validation_feedback').innerHTML='<b><p style="color:red;">Empty name</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('mothernamediv').className='form-group has-error';
						document.getElementById('mothername_validation_feedback').innerHTML='<b><p style="color:red;">Invalid name</p></b>';
						searchElement.focus();
					}
         	});

         	$("#grandmothernametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('grandmothernametxt');

         			var grandmothername = $("#grandmothernametxt").val();
					if(name_validator(grandmothername) && (grandmothername!=""))
					{
						document.getElementById('grandmothernamediv').className='form-group has-success';
						document.getElementById('grandmothername_validation_feedback').innerHTML='';
					}else if(grandmothername=="")
					{
						document.getElementById('grandmothernamediv').className='form-group has-error';
						document.getElementById('grandmothername_validation_feedback').innerHTML='<b><p style="color:red;">Empty lastname name</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('grandmothernamediv').className='form-group has-error';
						document.getElementById('grandmothername_validation_feedback').innerHTML='<b><p style="color:red;">Invalid name</p></b>';
						searchElement.focus();
					}
         	});

         	$("#genderselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('genderselect');

         			var gender = $("#genderselect").val();
					if(gender_validator(gender) && (gender!=""))
					{
						document.getElementById('genderdiv').className='form-group has-success';
						document.getElementById('gender_validation_feedback').innerHTML='';
					}else if(gender=="")
					{
						document.getElementById('genderdiv').className='form-group has-error';
						document.getElementById('gender_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('genderdiv').className='form-group has-error';
						document.getElementById('gender_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
         	});

         	$("#emailtxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('emailtxt');

         			var email = $("#emailtxt").val();
					if(email_validator(email) && (email!=""))
					{
						document.getElementById('emaildiv').className='form-group has-success';
						document.getElementById('email_validation_feedback').innerHTML='';
					}else if(email=="")
					{
						document.getElementById('emaildiv').className='form-group has-success';
						document.getElementById('email_validation_feedback').innerHTML='<b><p style="color:red;">Optional</p></b>';
						
					}
					else
					{
						document.getElementById('emaildiv').className='form-group has-error';
						document.getElementById('email_validation_feedback').innerHTML='<b><p style="color:red;">Invalid email</p></b>';
						searchElement.focus();
					}
         	});

         	$("#contacttxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('contacttxt');

         			var contact = $("#contacttxt").val();
					if(contact_validator(contact) && (contact!=""))
					{
						document.getElementById('contactdiv').className='form-group has-success';
						document.getElementById('contact_validation_feedback').innerHTML='';
					}else if(contact=="")
					{
						document.getElementById('contactdiv').className='form-group has-error';
						document.getElementById('contact_validation_feedback').innerHTML='<b><p style="color:red;">Empty email</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('contactdiv').className='form-group has-error';
						document.getElementById('contact_validation_feedback').innerHTML='<b><p style="color:red;">Invalid email</p></b>';
						searchElement.focus();
					}
         	});

         	$("#incometxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('incometxt');

         			var income = $("#incometxt").val();
					if(income_validator(income) && (income!=""))
					{
						document.getElementById('incomediv').className='form-group has-success';
						document.getElementById('income_validation_feedback').innerHTML='';
					}else if(income=="")
					{
						document.getElementById('incomediv').className='form-group has-success';
						document.getElementById('income_validation_feedback').innerHTML='<b><p style="color:red;">Optional</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('incomediv').className='form-group has-error';
						document.getElementById('income_validation_feedback').innerHTML='<b><p style="color:red;">Invalid income</p></b>';
						searchElement.focus();
					}
         	});

         	$("#kebeleselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var kebeleElement= document.getElementById('kebeleselect');

         			var kebele = $("#kebeleselect").val();
					if(select_validator(kebele))
					{
						document.getElementById('kebelediv').className='form-group has-success';
						document.getElementById('kebele_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('kebelediv').className='form-group has-error';
						document.getElementById('kebele_validation_feedback').innerHTML='<b><p style="color:red;">Select kebele</p></b>';
						kebeleElement.focus();
					}
         	});


         	$("#woredaselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var woredaElement= document.getElementById('woredaselect');

         			var woreda = $("#woredaselect").val();
					if(select_validator(woreda))
					{
						document.getElementById('woredadiv').className='form-group has-success';
						document.getElementById('woreda_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('woredadiv').className='form-group has-error';
						document.getElementById('woreda_validation_feedback').innerHTML='<b><p style="color:red;">Select woreda</p></b>';
						woredaElement.focus();
					}
         	});


         	$("#incomesourceselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var incomesourceElement= document.getElementById('incomesourceselect');
         			var income = $("#incometxt").val();
         			var incomesource = $("#incomesourceselect").val();
					if(select_validator(incomesource) && income!="")
					{
						document.getElementById('incomesourcediv').className='form-group has-success';
						document.getElementById('incomesource_validation_feedback').innerHTML='';
					}
					else if(!select_validator(incomesource) && income=="")
					{
						document.getElementById('incomesourcediv').className='form-group has-success';
						document.getElementById('incomesource_validation_feedback').innerHTML='<b><p style="color:red;">Optional</p></b>';
						
					}else
					{
						document.getElementById('incomesourcediv').className='form-group has-error';
						document.getElementById('incomesource_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						incomesourceElement.focus();
					}
         	});
         	$("#housestatusselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var housestatusElement= document.getElementById('housestatusselect');

         			var housestatus = $("#housestatusselect").val();
					if(select_validator(housestatus))
					{
						document.getElementById('housestatusdiv').className='form-group has-success';
						document.getElementById('housestatus_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('housestatusdiv').className='form-group has-error';
						document.getElementById('housestatus_validation_feedback').innerHTML='<b><p style="color:red;">Select house status</p></b>';
						housestatusElement.focus();
					}
         	});

         	$("#maritalstatusselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var maritalstatusElement= document.getElementById('maritalstatusselect');

         			var maritalstatus = $("#maritalstatusselect").val();
					if(select_validator(maritalstatus))
					{
						document.getElementById('maritalstatusdiv').className='form-group has-success';
						document.getElementById('maritalstatus_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('maritalstatusdiv').className='form-group has-error';
						document.getElementById('maritalstatus_validation_feedback').innerHTML='<b><p style="color:red;">Select marital status</p></b>';
						maritalstatusElement.focus();
					}
         	});
         	$("#birthdatedate").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var usernameElement = document.getElementById('birthdatedate');

         			var birthdate = $("#birthdatedate").val();
					if(date_validator(birthdate) && (birthdate!=""))
					{
						document.getElementById('birthdatediv').className='form-group has-success';
						document.getElementById('birthdate_validation_feedback').innerHTML='';
					}else if(birthdate=="")
					{
						document.getElementById('birthdatediv').className='form-group has-error';
						document.getElementById('birthdate_validation_feedback').innerHTML='<b><p style="color:red;">Fill date</p></b>';
						usernameElement.focus();
					}
					else
					{
						document.getElementById('birthdatediv').className='form-group has-error';
						document.getElementById('birthdate_validation_feedback').innerHTML='<b><p style="color:red;">Invalid birth date</p></b>';
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


         	$("#photo").change(function(event){
         			var photo = $("#usertypeselect").src();
         			
					if(photo!=""|| photo==NULL)
					{
						document.getElementById('photodiv').className='form-group has-success';
						document.getElementById('photo_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('photodiv').className='form-group has-error';
						document.getElementById('photo_validation_feedback').innerHTML='<b><p style="color:red;">Capture photo</p></b>';
					}
         	});


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
						document.getElementById('photodiv').className='form-group has-success';
						document.getElementById('photo_validation_feedback').innerHTML='';
					}
					else
					{
						document.getElementById('photodiv').className='form-group has-error';
						document.getElementById('photo_validation_feedback').innerHTML='<b><p style="color:red;">Capture photo</p></b>';
					}
            }

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
	<script type="text/javascript" src="../../js/webcam.min.js"></script>
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		function setup() {
			Webcam.reset();
			Webcam.attach( '#my_camera' );
			document.getElementById("tochangebtn").innerHTML='';
			document.getElementById("tochangebtn").innerHTML='<input type="button" class="btn-danger" value="Close" onClick="stopWebcam(); ">';
		}
		function stopWebcam()
		{
			Webcam.reset()
			
			$("#my_camera").empty();
			document.getElementById("my_camera").innerHTML='';
			document.getElementById("results").innerHTML='';
			document.getElementById("tochangebtn").innerHTML='';
			document.getElementById("tochangebtn").innerHTML='<input type="button" class="btn-success" value="Start" onClick="setup(); ">';
		}
		
		function take_snapshot() 
		{
			// take snapshot and get image data
			Webcam.snap( function(data_uri) 
			{
				// display results in page
				document.getElementById('results').innerHTML =  
					'<img id="photo" src="'+data_uri+'"/>';
					
			} );
		}
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
								<a href="empbsc.php" class="" style="color: black;"><b>Register resident</b></a>
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


					<div class="col-md-7 col-xs-12" style="border:1px solid #c0c0c0;">
					<form class="form-horizontal">
						<center></br>
							<p class="actiontitel">Register Resident</p></br></hr>
						</center>

						<div class="form-group" id="firstnamediv">
							<label class="control-label col-xs-4" for="firstnametxt">First name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="firstnametxt" name="firstnametxt" placeholder="First name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="firstname_validation_feedback"></div>
						</div>

						<div class="form-group" id="middlenamediv">
							<label class="control-label col-xs-4" for="middlenametxt">Middle name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="middlenametxt" name="middlenametxt" placeholder="Middle name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="middlename_validation_feedback"></div>
						</div>

						<div class="form-group" id="lastnamediv">
							<label class="control-label col-xs-4" for="lastnametxt">Last name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="lastnametxt" name="lastnametxt" placeholder="Last name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="lastname_validation_feedback"></div>
						</div>

						<div class="form-group" id="genderdiv">
		                        <label class="control-label col-xs-4">Gender:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="genderselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="M">Male</option>
		                                <option value="F">Female</option>
		                            </select>
		                        </div>

		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="gender_validation_feedback"></div>
		                    </div> 

						<div class="form-group" id="birthdatediv">
							<label class="control-label col-xs-4" for="birthdate">Birth date:</label>
							<div class="col-xs-7">
								<!--<div class="col-xs-4">
		                            <input type="text" class="form-control" id="lastnametxt" name="lastnametxt" placeholder="date">
								</div>
								<div class="col-xs-4"><input type="text" class="form-control" id="monthtxt" name="month" placeholder="month">
								</div>
								<div class="col-xs-4"><input type="text" class="form-control" id="yeartxt" name="year" placeholder="year"></div>-->
								<input type="date" class="form-control" id="birthdatedate" name="birthdatedate" max="1918-00-00" min="2000-00-00">
							</div>
							
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="birthdate_validation_feedback"></div>
						</div>
					<!--
						<div class="row" id="birthdate">
							<label class="control-label col-xs-offset-1 col-xs-3" for="birthdate">Birth date:</label>
							
							<div class="form-group col-xs-2" id="date">
								<div class="col-xs-offset-2">
								<input type="date" class="form-control" id="birthdatedate" name="birthdatedate" max="1918-00-00" min="2000-00-00">
								</div>
							</div>
						
							<div class="form-group col-xs-offset-1 col-xs-3" id="month">
							<div class="col-xs-offset-2">
								<input type="month" class="form-control" id="birthdatedate" name="birthdatedate" placeholder="Date">
								</div>
							</div>
					
							<div class="form-group col-xs-offset-1 col-xs-3" id="year">
							<div class="col-xs-offset-2">
								<input type="year" class="form-control" id="birthdatedate" name="birthdatedate" max="1918-00-00" min="2000-00-00">
								</div>
							</div>
						</div>-->

						<div class="form-group" id="mothernamediv">
							<label class="control-label col-xs-4" for="sextxt">Mother name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="mothernametxt" name="mothernametxt" placeholder="Mother name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="mothername_validation_feedback"></div>
						</div>

						<div class="form-group" id="grandmothernamediv">
							<label class="control-label col-xs-4" for="grandmothernametxt">Grand mother name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="grandmothernametxt" name="grandmothernametxt" placeholder="Grand mother name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="grandmothername_validation_feedback"></div>
						</div>

						<div class="form-group" id="woredadiv">
							<label class="control-label col-xs-4" for="woredaselect">Woreda:</label>
							<div class="col-xs-7">
								<select class="form-control" id="woredaselect">
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
<!---
						<div class="form-group" id="addressdiv">
							<label class="control-label col-xs-4" for="woredatxt">Woreda:</label>
							<div class="col-xs-7 row">
								<div class="col-xs-4">
									<select class="form-control" id="woredaselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="1">1</option>
		                                <option value="2">2</option>
		                                <option value="3">3</option>
		                                <option value="4">4</option>
		                                <option value="5">5</option>
			                         </select>
			                     </div>


			                     <label class="control-label col-xs-4" for="kebeleselect">Kebele:</label>
			                     <div class="col-xs-4">
			                     	<select class="form-control" id="kebeleselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="1">01</option>
			                            <option value="2">02</option>
			                            <option value="3">03</option>
			                            <option value="4">04</option>
			                            <option value="5">05</option>
			                            <option value="6">06</option>
			                            <option value="7">07</option>
			                            <option value="8">08</option>
			                            <option value="9">09</option>
			                            <option value="10">10</option>
			                            <option value="11">11</option>
			                            <option value="12">12</option>
			                            <option value="13">13</option>
			                            <option value="14">14</option>
			                            <option value="15">15</option>
			                            <option value="16">16</option>
			                            <option value="17">17</option>
			                         </select>
			                     </div>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="address_validation_feedback"></div>
						</div>

					-->

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