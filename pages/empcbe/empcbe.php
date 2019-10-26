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

         	$("#residentidtxt").change(function(event){
     			//$("#searchdisplaydiv").empty();
     			var searchElement = document.getElementById('residentidtxt');

     			var residentid= $("#residentidtxt").val();
				if(residentid_validator(residentid) && (residentid!=""))
				{
					document.getElementById('residentiddiv').className='form-group has-success';
					document.getElementById('residentid_validation_feedback').innerHTML='';
				}else if(residentid=="")
				{
					document.getElementById('residentiddiv').className='form-group has-error';
					document.getElementById('residentid_validation_feedback').innerHTML='<b><p style="color:red;">Empty resident id</p></b>';
					searchElement.focus();
				}
				else
				{
					document.getElementById('residentiddiv').className='form-group has-error';
					document.getElementById('residentid_validation_feedback').innerHTML='<b><p style="color:red;">Invalid resident id</p></b>';
					searchElement.focus();
				}

         	});

         	$("#savingaccountnotxt").change(function(event){
     			//$("#searchdisplaydiv").empty();
     			var searchElement = document.getElementById('savingaccountnotxt');

     			var savingaccountno= $("#savingaccountnotxt").val();
				if(savingaccountno_validator(savingaccountno) && (savingaccountno!=""))
				{
					document.getElementById('savingaccountnodiv').className='form-group has-success';
					document.getElementById('savingaccountno_validation_feedback').innerHTML='';
				}else if(savingaccountno=="")
				{
					document.getElementById('savingaccountnodiv').className='form-group has-error';
					document.getElementById('savingaccountno_validation_feedback').innerHTML='<b><p style="color:red;">Empty saving account no</p></b>';
					searchElement.focus();
				}
				else
				{
					document.getElementById('savingaccountnodiv').className='form-group has-error';
					document.getElementById('savingaccountno_validation_feedback').innerHTML='<b><p style="color:red;">Invalid account no</p></b>';
					searchElement.focus();
				}
         	});

         	$("#nationalitytxt").change(function(event){
     			//$("#searchdisplaydiv").empty();
     			var searchElement = document.getElementById('nationalitytxt');

     			var nationality= $("#nationalitytxt").val();
				if(nationality_validator(nationality) && (nationality!=""))
				{
					document.getElementById('nationalitydiv').className='form-group has-success';
					document.getElementById('nationality_validation_feedback').innerHTML='';
				}else if(nationality=="")
				{
					document.getElementById('nationalitydiv').className='form-group has-error';
					document.getElementById('nationality_validation_feedback').innerHTML='<b><p style="color:red;">Empty nationality</p></b>';
					searchElement.focus();
				}
				else
				{
					document.getElementById('nationalitydiv').className='form-group has-error';
					document.getElementById('nationality_validation_feedback').innerHTML='<b><p style="color:red;">Invalid nationality</p></b>';
					searchElement.focus();
				}
         	});
         	$("#housetypeselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('housetypeselect');

         			var housetype = $("#housetypeselect").val();
					if(housetype_validator(housetype) && (housetype!=""))
					{
						document.getElementById('housetypediv').className='form-group has-success';
						document.getElementById('housetype_validation_feedback').innerHTML='';
					}else if(housetype=="")
					{
						document.getElementById('housetypediv').className='form-group has-error';
						document.getElementById('housetype_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('housetypediv').className='form-group has-error';
						document.getElementById('housetype_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
         	});

         	$("#bedroomselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('bedroomselect');

         			var bedroom = $("#bedroomselect").val();
					if(bedroom_validator(bedroom) && (bedroom!=""))
					{
						document.getElementById('bedroomdiv').className='form-group has-success';
						document.getElementById('bedroom_validation_feedback').innerHTML='';
					}else if(bedroom=="")
					{
						document.getElementById('bedroomdiv').className='form-group has-error';
						document.getElementById('bedroom_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('bedroomdiv').className='form-group has-error';
						document.getElementById('bedroom_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
         	});

         	$("#registrationturnselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('registrationturnselect');

         			var registrationturn = $("#registrationturnselect").val();
					if(registrationturn_validator(registrationturn) && (registrationturn!=""))
					{
						document.getElementById('registrationturndiv').className='form-group has-success';
						document.getElementById('registrationturn_validation_feedback').innerHTML='';
					}else if(registrationturn=="")
					{
						document.getElementById('registrationturndiv').className='form-group has-error';
						document.getElementById('registrationturn_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('registrationturndiv').className='form-group has-error';
						document.getElementById('registrationturn_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
         	});

         	$("#educationallevelselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('educationallevelselect');

         			var educationallevel= $("#educationallevelselect").val();
					if(educationallevel_validator(educationallevel) && (educationallevel!=""))
					{
						document.getElementById('educationalleveldiv').className='form-group has-success';
						document.getElementById('educationallevel_validation_feedback').innerHTML='';
					}else if(educationallevel=="")
					{
						document.getElementById('educationalleveldiv').className='form-group has-error';
						document.getElementById('educationallevel_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('educationalleveldiv').className='form-group has-error';
						document.getElementById('educationallevel_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
						searchElement.focus();
					}
         	});

            $("#savebtn").click(function(event){
            	var residentid=$("#residentidtxt").val();
            	var housetype=$("#housetypeselect").val();
            	var bedroom=$("#bedroomselect").val();
            	var registrationturn=$("#registrationturnselect").val();
            	var savingaccountno=$("#savingaccountnotxt").val();
            	var nationality=$("#nationalitytxt").val();
            	var educationallevel=$("#educationallevelselect").val();
       
				$("#residentidtxt").trigger("change");
				$("#housetypeselect").trigger("change");
				$("#bedroomselect").trigger("change");
				$("#registrationturnselect").trigger("change");
				$("#savingaccountnotxt").trigger("change");
				$("#nationalitytxt").trigger("change");
				$("#educationallevelselect").trigger("change");

				if(registrationturn_validator(registrationturn) && bedroom_validator(bedroom) && housetype_validator(housetype) && savingaccountno_validator(savingaccountno) && residentid_validator(residentid) && educationallevel_validator(educationallevel) && nationality_validator(nationality))
				{

					$("#resultdiv").load('../../controller/applicant/register.php', {"residentid":residentid,"housetype":housetype,"bedroom":bedroom,"registrationturn":registrationturn,"savingaccountno":savingaccountno,"nationality":nationality, "educationallevel":educationallevel} );
				}else
				{

				}
				});


             $("#cancelbtn").click(function(event){
            	$("#resultdiv").empty();
            	document.getElementById('residentidtxt').value='';
            	document.getElementById('residentiddiv').className='form-group';
				document.getElementById('residentid_validation_feedback').innerHTML='';

				document.getElementById('savingaccountnotxt').value='';
            	document.getElementById('savingaccountnodiv').className='form-group';
				document.getElementById('savingaccountno_validation_feedback').innerHTML='';

				document.getElementById('nationalitytxt').value='';
            	document.getElementById('nationalitydiv').className='form-group';
				document.getElementById('nationality_validation_feedback').innerHTML='';

				document.getElementById('housetypeselect').value='no';
            	document.getElementById('housetypediv').className='form-group';
				document.getElementById('housetype_validation_feedback').innerHTML='';

				document.getElementById('bedroomselect').value='no';
            	document.getElementById('bedroomdiv').className='form-group';
				document.getElementById('bedroom_validation_feedback').innerHTML='';

				document.getElementById('registrationturnselect').value='no';
            	document.getElementById('registrationturndiv').className='form-group';
				document.getElementById('registrationturn_validation_feedback').innerHTML='';

				document.getElementById('educationallevelselect').value='no';
            	document.getElementById('educationalleveldiv').className='form-group';
				document.getElementById('educationallevel_validation_feedback').innerHTML='';
				});
			});
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
								<a href="empbsc.php" class="" style="color: black;"><b>Register applicant</b></a>
							</li>
							<li class="onhoveside">
								<a href="updateapplicant.php" class="" style="color: black;"><b>Update applicant</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteapplicant.php" class="" style="color: black;"><b>Delete applicant</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Receive payment</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>View statusl</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Control status</b></a>
							</li>
						</div>
					</div>
					<div class="col-md-2 col-xs-12 hidden-lg hidden-md" >
						<div class="nav nav-pills nav-stacked">
							<li class="onactiveside onhoveside">
								<a href="empbsc.php" class="" style="color: black;"><b>Register applicant</b></a>
							</li>
							<li class="onhoveside">
								<a href="updateapplicant.php" class="" style="color: black;"><b>Update applicant</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteapplicant.php" class="" style="color: black;"><b>Delete applicant</b></a>
							</li>

							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Receive payment</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>View statusl</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Control status</b></a>
							</li>
						</div>
					</div>
					
					<div class="col-md-7 col-xs-12 wow fadeInDown" data-wow-delay="20s" style="border:1px solid #c0c0c0;">
					<form class="form-horizontal">
						<center></br>
							<p class="actiontitel">Register Applicant</p></br></hr>
						</center>

						<div class="form-group" id="residentiddiv">
							<label class="control-label col-xs-4" for="residentidtxt">Resident id:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="residentidtxt" name="residentidtxt" placeholder="Resident id">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="residentid_validation_feedback"></div>
						</div>

						<div class="form-group" id="savingaccountnodiv">
							<label class="control-label col-xs-4" for="savingaccountnotxt">Saving account no:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="savingaccountnotxt" name="savingaccountnotxt" placeholder="Saving account no">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="savingaccountno_validation_feedback"></div>
						</div>

						<div class="form-group" id="nationalitydiv">
							<label class="control-label col-xs-4" for="nationalitytxt">Nationality:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="nationalitytxt" name="nationalitytxt" placeholder="Nationality">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="nationality_validation_feedback"></div>
						</div>

						<div class="form-group" id="educationalleveldiv">
		                        <label class="control-label col-xs-4">Educational level:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="educationallevelselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="Illitrate">Illitrate</option>
		                                <option value="Grade8">Grade8</option>
		                                <option value="Grade10">Grade10</option>
		                                <option value="Grade12">Grade12</option>
		                                <option value="Certificate">Certificate</option>
		                                <option value="Diploma">Diploma</option>
		                                <option value="Degree">Degree</option>
		                                <option value="Master">Master</option>
		                                <option value="Doctor">Doctor</option>
		                                <option value="Profesor">Profesor</option>
		                            </select>
		                        </div>
		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="educationallevel_validation_feedback"></div>
		                    </div> 

					

						<div class="form-group" id="housetypediv">
		                        <label class="control-label col-xs-4">House type:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="housetypeselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="10/90">10/90</option>
		                                <option value="20/80">20/80</option>
		                                <option value="40/60">40/60</option>
		                            </select>
		                        </div>
		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="housetype_validation_feedback"></div>
		                    </div> 

		                    <div class="form-group" id="bedroomdiv">
		                        <label class="control-label col-xs-4">Bedroom:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="bedroomselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="1">1 Bedroom</option>
		                                <option value="2">2 Bedroom</option>
		                                <option value="3">3 Bedroom</option>
		                            </select>
		                        </div>
		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="bedroom_validation_feedback"></div>
		                    </div> 


						

						<div class="form-group" id="registrationturndiv">
							<label class="control-label col-xs-4" for="registrationturnselect">Registration turn:</label>
							<div class="col-xs-7">
								<select class="form-control" id="registrationturnselect">
	                            	<option value="no" selected id="default">Select one</option>
	                                <option value="1">1 turn</option>
	                                <option value="2">2 turn</option>
	                                <option value="3">3 turn</option>
	                                <option value="4">4 turn</option>
	                                <option value="5">5 turn</option>
	                                <option value="6">6 turn</option>
	                                <option value="7">7 turn</option>
	                                <option value="8">8 turn</option>
	                                <option value="9">9 turn</option>
	                                <option value="10">10 turn</option>
			                    </select>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="registrationturn_validation_feedback"></div>
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
	    <!--<script src="../../js/js2/jquery-1.11.1.min.js"></script>
        <script src="../../js/js2/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../js/js2/bootstrap-hover-dropdown.min.js"></script>
        <script src="../../js/js2/jquery.backstretch.min.js"></script>
        <script src="../../js/js2js/wow.min.js"></script>
        <script src="../../js/js2/retina-1.1.0.min.js"></script>
        <script src="../../js/js2/jquery.magnific-popup.min.js"></script>
        <script src="../../js/js2/flexslider/jquery.flexslider-min.js"></script>
        <script src="../../js/js2/jflickrfeed.min.js"></script>
        <script src="../../js/js2/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="../../js/js2/jquery.ui.map.min.js"></script>
        <script src="../../js/js2/scripts.js"></script>-->
</body>
</html>