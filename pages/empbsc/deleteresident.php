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

         	$("#txtsearch").change(function(event){
         			$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById('txtsearch');
         			var residentid = $("#txtsearch").val();
					if(residentid_validator(residentid) && (residentid!=""))
					{
						document.getElementById('searchdiv').className='form-group has-success';
						document.getElementById('residentid_validation_feedback').innerHTML='';
					}else if(residentid=="")
					{
						document.getElementById('searchdiv').className='form-group has-error';
						document.getElementById('residentid_validation_feedback').innerHTML='<b><p style="color:red;">Empty resident id</p></b>';
						searchElement.focus();
					}
					else
					{
						document.getElementById('searchdiv').className='form-group has-error';
						document.getElementById('residentid_validation_feedback').innerHTML='<b><p style="color:red;">Invalid resident id</p></b>';
						searchElement.focus();
					}
         	});

            $("#searchbtn").click(function(event){
            	$("#searchdisplaydiv").empty();
               		var residentid = $("#txtsearch").val();
					var searchElement = document.getElementById('txtsearch');
					var residentid = $("#txtsearch").val();
					$("#txtsearch").trigger("change");
					if(residentid_validator(residentid) && (residentid!=""))
					{
						$("#searchdisplaydiv").load('../../controller/resident/residentsearchfordelete.php', {"residentid":residentid} );
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
			});
            // $("#resultindiv").html("<b style='color:black; background-color:skyblue; font-size:17px'>Please enter data</b>");
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
			<div class="col-md-2 col-xs-12"></div>

			<div class="col-md-12 col-xs-12">
				<div class="row">

<div class="col-md-2 col-xs-12" >
						<div class="nav nav-pills nav-stacked fixed-top hidden-xs hidden-sm" style="position: fixed; width:15%; border:1px solid #c0c0c0; ">
							<li class="onhoveside">
								<a href="empbsc.php" class="" style="color: black;"><b>Register resident</b></a>
							</li>
							<li class="onhoveside">
								<a href="updateresident.php" class="" style="color: black;"><b>Update resident</b></a>
							</li>
							<li class="onactiveside onhoveside">
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
							<li class="onhoveside">
								<a href="empbsc.php" class="onhoveside" style="color: black;">Register resident</a>
							</li>
							<li class="onhoveside">
								<a href="updateresident.php" class="onhoveside" style="color: black;">Update resident</a>
							</li>
							<li class="onactiveside onhoveside">
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
					
					<div class="col-md-7 col-xs-12" style="border:1px solid #c0c0c0; min-height:550px">
						<form class="form-horizontal">
							<center></br><p class="actiontitel">Delete Resident</p></br></hr>
							</center>
							<div class="form-group" id="searchdiv">
								<div class="input-group custom-search-form col-xs-offset-2" >
	                                <label class="control-label col-offset-1 col-xs-4" for="txtsearch">Resident ID:</label>
	                                <div class="col-xs-6">
		                                <input type="text" class="form-control" placeholder="Resident id..." id="txtsearch" name="txtsearch">
		                            </div>
		                             <div class="col-xs-2">
		                                <span class="input-group-btn">
			                                <button class="btn btn-default" type="button" id="searchbtn" name="searchbtn">
			                                    <i class="glyphicon glyphicon-search "></i>
			                                </button>
		                            	</span>
		                            	</div>
	                            	</div>
	                            
	                            <div class="valid-feedback col-xs-offset-4" id="residentid_validation_feedback"></div>
	                           </div> 
							<div class="searchdisplaydiv" id="searchdisplaydiv" >
	                            <!--for ajax-->
	                            
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