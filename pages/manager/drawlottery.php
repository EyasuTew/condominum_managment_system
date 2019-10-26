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
    <link rel="stylesheet" href="../../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

         	$("#blockidtxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('blockidtxt');

         			var blockid = $("#blockidtxt").val();
    					if(blockid_validator(blockid) && (blockid!=""))
    					{
    						document.getElementById('blockiddiv').className='form-group has-success';
    						document.getElementById('blockid_validation_feedback').innerHTML='';
    					}else if(blockid=="")
    					{
    						document.getElementById('blockiddiv').className='form-group has-error';
    						document.getElementById('blockid_validation_feedback').innerHTML='<b><p style="color:red;">Empty block model</p></b>';
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById('blockiddiv').className='form-group has-error';
    						document.getElementById('blockid_validation_feedback').innerHTML='<b><p style="color:red;">Invalid block model</p></b>';
    						searchElement.focus();
    					}
         	});

            $("#savebtn").click(function(event){
            	var blockid=$("#blockidtxt").val();
      				$("#blockidtxt").trigger("change");
      				if(blockid_validator(blockid))
      				{
            
      					$("#resultdiv").load('../../controller/house/generatelottery.php', {"blockid":blockid} );
      				}else
      				{

      				}
				});


        $("#cancelbtn").click(function(event){

            	document.getElementById('blockidtxt').value='';
            	document.getElementById('blockiddiv').className='form-group';
				      document.getElementById('blockid_validation_feedback').innerHTML='';

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
							<p class="actiontitel">Draw lottery</p></br></hr>
						</center>

						<div class="form-group" id="blockiddiv">
							<label class="control-label col-xs-4" for="blockidtxt">Block id:</label>
							<div class="col-xs-7">
								<input type="text" class="form-control" id="blockidtxt" name="blockidtxt" placeholder="Block id">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="blockid_validation_feedback"></div>
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
