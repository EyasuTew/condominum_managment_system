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

         	$("#blockmodeltxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('blockmodeltxt');

         			var blockmodel = $("#blockmodeltxt").val();
    					if(blockmodel_validator(blockmodel) && (blockmodel!=""))
    					{
    						document.getElementById('blockmodeldiv').className='form-group has-success';
    						document.getElementById('blockmodel_validation_feedback').innerHTML='';
    					}else if(blockmodel=="")
    					{
    						document.getElementById('blockmodeldiv').className='form-group has-error';
    						document.getElementById('blockmodel_validation_feedback').innerHTML='<b><p style="color:red;">Empty block model</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('blockmodeldiv').className='form-group has-error';
    						document.getElementById('blockmodel_validation_feedback').innerHTML='<b><p style="color:red;">Invalid block model</p></b>';
    						searchElement.focus();
    					}
         	});

         	$("#sitenametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('sitenametxt');

         			var sitename = $("#sitenametxt").val();
    					if(sitename_validator(sitename) && (sitename!=""))
    					{
    						document.getElementById('sitenamediv').className='form-group has-success';
    						document.getElementById('sitename_validation_feedback').innerHTML='';
    					}else if(sitename=="")
    					{
    						document.getElementById('sitenamediv').className='form-group has-error';
    						document.getElementById('sitename_validation_feedback').innerHTML='<b><p style="color:red;">Empty site name</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('sitenamediv').className='form-group has-error';
    						document.getElementById('sitename_validation_feedback').innerHTML='<b><p style="color:red;">Invalid site name</p></b>';
    						searchElement.focus();
    					}
         	});

         	$("#floornumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('floornumbertxt');

         			var floornumber= $("#floornumbertxt").val();
    					if(floornumber_validator(floornumber) && (floornumber!=""))
    					{
    						document.getElementById('floornumberdiv').className='form-group has-success';
    						document.getElementById('floornumber_validation_feedback').innerHTML='';
    					}else if(floornumber=="")
    					{
    						document.getElementById('floornumberdiv').className='form-group has-error';
    						document.getElementById('floornumber_validation_feedback').innerHTML='<b><p style="color:red;">Empty floor number</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('floornumberdiv').className='form-group has-error';
    						document.getElementById('floornumber_validation_feedback').innerHTML='<b><p style="color:red;">Invalid floor number</p></b>';
    						searchElement.focus();
    					}
         	});

         	 $("#roomnumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('roomnumbertxt');

         			var roomnumber = $("#roomnumbertxt").val();
    					if(roomnumber_validator(roomnumber) && (roomnumber!=""))
    					{
    						document.getElementById('roomnumberdiv').className='form-group has-success';
    						document.getElementById('roomnumber_validation_feedback').innerHTML='';
    					}else if(roomnumber=="")
    					{
    						document.getElementById('roomnumberdiv').className='form-group has-error';
    						document.getElementById('roomnumber_validation_feedback').innerHTML='<b><p style="color:red;">Empty room number</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('roomnumberdiv').className='form-group has-error';
    						document.getElementById('roomnumber_validation_feedback').innerHTML='<b><p style="color:red;">Invalid room number</p></b>';
    						searchElement.focus();
    					}
         	});

         	$("#housenumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('housenumbertxt');

         			var housenumber = $("#housenumbertxt").val();
    					if(housenumber_validator(housenumber) && (housenumber!=""))
    					{
    						document.getElementById('housenumberdiv').className='form-group has-success';
    						document.getElementById('housenumber_validation_feedback').innerHTML='';
    					}else if(housenumber=="")
    					{
    						document.getElementById('housenumberdiv').className='form-group has-error';
    						document.getElementById('housenumber_validation_feedback').innerHTML='<b><p style="color:red;">Empty house number</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('housenumberdiv').className='form-group has-error';
    						document.getElementById('housenumber_validation_feedback').innerHTML='<b><p style="color:red;">Invalid house number</p></b>';
    						searchElement.focus();
    					}
         	});

         	$("#projecttypeselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('projecttypeselect');

         			var projecttype = $("#projecttypeselect").val();
    					if(projecttype_validator(projecttype) && (projecttype!=""))
    					{
    						document.getElementById('projecttypediv').className='form-group has-success';
    						document.getElementById('projecttype_validation_feedback').innerHTML='';
    					}else if(projecttype=="")
    					{
    						document.getElementById('projecttypediv').className='form-group has-error';
    						document.getElementById('projecttype_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('projecttypediv').className='form-group has-error';
    						document.getElementById('projecttype_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
    						searchElement.focus();
    					}
         	});

         	$("#blocktypeselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('blocktypeselect');

         			var blocktype = $("#projecttypeselect").val();
    					if(blocktype_validator(blocktype) && (blocktype!=""))
    					{
    						document.getElementById('blocktypediv').className='form-group has-success';
    						document.getElementById('blocktype_validation_feedback').innerHTML='';
    					}else if(blocktype=="")
    					{
    						document.getElementById('blocktypediv').className='form-group has-error';
    						document.getElementById('blocktype_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('blocktypediv').className='form-group has-error';
    						document.getElementById('blocktype_validation_feedback').innerHTML='<b><p style="color:red;">Select one</p></b>';
    						searchElement.focus();
    					}
         	});

         	$("#shopenumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('shopenumbertxt');

         			var shopenumber = $("#shopenumbertxt").val();
    					if(shopenumber_validator(shopenumber) && (shopenumber!=""))
    					{
    						document.getElementById('shopenumberdiv').className='form-group has-success';
    						document.getElementById('shopenumber_validation_feedback').innerHTML='';
    					}else if(shopenumber=="")
    					{
    						document.getElementById('shopenumberdiv').className='form-group has-success';
    						document.getElementById('shopenumber_validation_feedback').innerHTML='<b><p style="color:red;">Empity shope number</p></b>';

    					}
    					else
    					{
    						document.getElementById('shopenumberdiv').className='form-group has-error';
    						document.getElementById('shopenumber_validation_feedback').innerHTML='<b><p style="color:red;">Invalid shope number</p></b>';
    						searchElement.focus();
    					}
         	});


            $("#savebtn").click(function(event){
            	var blockmodel=$("#blockmodeltxt").val();
            	var sitename=$("#sitenametxt").val();
            	var floornumber=$("#floornumbertxt").val();
            	var roomnumber=$("#roomnumbertxt").val();
            	var housenumber=$("#housenumbertxt").val();
            	var shopenumber=$("#shopenumbertxt").val();
            	var projecttype=$("#projecttypeselect").val();
            	var blocktype=$("#blocktypeselect").val();

      				$("#blockmodeltxt").trigger("change");
      				$("#sitenametxt").trigger("change");
      				$("#floornumbertxt").trigger("change");
      				$("#roomnumbertxt").trigger("change");
      				$("#housenumbertxt").trigger("change");
      				$("#shopenumbertxt").trigger("change");
      				$("#projecttypeselect").trigger("change");
      				$("#blocktypeype").trigger("change");

      				if(blockmodel_validator(blockmodel) &&sitename_validator(sitename) && floornumber_validator(floornumber) && housenumber_validator(housenumber) &&shopenumber_validator(shopenumber) && projecttype_validator(projecttype) && blocktype_validator(blocktype))
      				{
      					$("#resultdiv").load('../../controller/house/registerblock.php', {"blockmodel":blockmodel,"sitename":sitename,"floornumber":floornumber,"housenumber":housenumber,"shopenumber":shopenumber,"roomnumber":roomnumber, "projecttype":projecttype, "blocktype":blocktype} );
      				}else
      				{

      				}
				});


        $("#cancelbtn").click(function(event){

            	document.getElementById('blockmodeltxt').value='';
            	document.getElementById('blockmodeldiv').className='form-group';
				      document.getElementById('blockmodel_validation_feedback').innerHTML='';

      				document.getElementById('sitenametxt').value='';
              document.getElementById('sitenamediv').className='form-group';
      				document.getElementById('sitename_validation_feedback').innerHTML='';

      				document.getElementById('floornumbertxt').value='';
              document.getElementById('floornumberdiv').className='form-group';
      				document.getElementById('floornumber_validation_feedback').innerHTML='';

      				document.getElementById('roomnumbertxt').value='';
              document.getElementById('roomnumberdiv').className='form-group';
      				document.getElementById('roomnumber_validation_feedback').innerHTML='';

      				document.getElementById('housenumbertxt').value='';
              document.getElementById('housenumberdiv').className='form-group';
      				document.getElementById('housenumber_validation_feedback').innerHTML='';

      				document.getElementById('shopenumbertxt').value='';
              document.getElementById('shopenumberdiv').className='form-group';
      				document.getElementById('shopenumber_validation_feedback').innerHTML='';

      				document.getElementById('projecttypeselect').value='no';
              document.getElementById('projecttypediv').className='form-group';
      				document.getElementById('projecttype_validation_feedback').innerHTML='';

      				document.getElementById('blocktypeselect').value='no';
              document.getElementById('blocktypediv').className='form-group';
      				document.getElementById('blocktype_validation_feedback').innerHTML='';

				});
			});
     </script>
      	<!-- First, include the Webcam.js JavaScript Library -->

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
								<a href="blockview.php" class="" style="color: black;"><b>View blocks</b></a>
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
                <a href="blockview.php" class="" style="color: black;"><b>View blocks</b></a>
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
							<p class="actiontitel">Register Block</p></br></hr>
						</center>

						<div class="form-group" id="blockmodeldiv">
							<label class="control-label col-xs-4" for="blockmodeltxt">Block model:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="blockmodeltxt" name="blockmodeltxt" placeholder="Block mode">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="blockmodel_validation_feedback"></div>
						</div>

						<div class="form-group" id="sitenamediv">
							<label class="control-label col-xs-4" for="sitenametxt">Site name:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="sitenametxt" name="sitenametxt" placeholder="Site name">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="sitename_validation_feedback"></div>
						</div>

						<div class="form-group" id="floornumberdiv">
							<label class="control-label col-xs-4" for="floornumbertxt">Floor number:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="floornumbertxt" name="floornumbertxt" placeholder="Floor number">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="floornumber_validation_feedback"></div>
						</div>

						<div class="form-group" id="roomnumberdiv">
							<label class="control-label col-xs-4" for="roomnumbertxt">Room number:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="roomnumbertxt" name="roomnumbertxt" placeholder="Room number">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="roomnumber_validation_feedback"></div>
						</div>

						<div class="form-group" id="housenumberdiv">
							<label class="control-label col-xs-4" for="housenumbertxt">House number:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="housenumbertxt" name="housenumbertxt" placeholder="House number">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="housenumber_validation_feedback"></div>
						</div>

						<div class="form-group" id="shopenumberdiv">
							<label class="control-label col-xs-4" for="shopenumbertxt">Shope number:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="shopenumbertxt" name="shopenumbertxt" placeholder="Shope number">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="shopenumber_validation_feedback"></div>
						</div>

						<div class="form-group" id="projecttypediv">
		                        <label class="control-label col-xs-4">Project type:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="projecttypeselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="10/90">10/90</option>
		                                <option value="20/80">20/80</option>
		                                <option value="40/60">40/60 </option>
		                            </select>
		                        </div>

		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="projecttype_validation_feedback"></div>
		                    </div>

		                 <div class="form-group" id="blocktypediv">
		                        <label class="control-label col-xs-4">Block type:</label>
		                        <div class="col-xs-7">
		                            <select class="form-control" id="blocktypeselect">
		                            	<option value="no" selected id="default">Select one</option>
		                                <option value="studio">Studio</option>
		                                <option value="1bedroom">1 Bedroom</option>
		                                <option value="2bedroom">2 Bedroom</option>
		                                <option value="3bedroom">3 Bedroom</option>
		                            </select>
		                        </div>

		                        <div class="col-xs-1"></div>
								<div class="valid-feedback col-md-offset-5 col-xs-6" id="blocktype_validation_feedback"></div>
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
