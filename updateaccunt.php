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
	<link rel="stylesheet" href="../../font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/hoving.css">
	<script src="../../js/jquery2.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../main.js"></script>
	<script src="../../js/wow.min.js"></script>
	<style>
		@media screen and (max-width:480px) {

		}
	</style>
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
							<li class="onhoveside">
								<a href="admin.php" class="" style="color: black;"><b>Create account</b></a>
							</li>
							<li class="onactiveside onhoveside">
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
								<a href="#" class="onhoveside" style="color: black;">Create account</a>
							</li>
							<li class="onactiveside onhoveside">
								<a href="#" class="onhoveside" style="color: black;">Update account</a>
							</li>
							<li class="onhoveside">
								<a href="#" class="onhoveside" style="color: black;">Delete account</a>
							</li>
						</div>
					</div>
                    
                    
					<div class="col-md-7 col-xs-12" style="border:1px solid #c0c0c0;">
					<form class="form-horizontal">
												<center>
                                                    </br>
													<p class="actiontitel">Update user account</p>
													</br>
													</hr>
												</center>
												<div class="form-group">
													<label class="control-label col-xs-4" for="inputEmail">Employee Id:</label>
													<div class="col-xs-7">
														<input type="text" class="form-control" id="inputFname" placeholder="Resident Id">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-4" for="inputEmail">First Name:</label>
													<div class="col-xs-7">
														<input type="text" class="form-control" id="inputFname" placeholder="First Name">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-4" for="inputEmail">Middel Name:</label>
													<div class="col-xs-7">
														<input type="text" class="form-control" id="inputFname" placeholder="Middel Name">
													</div>
                                                </div>
                                                <div class="form-group ">
                                                        <label class="control-label col-xs-4" for="inputEmail">Last Name:</label>
                                                        <div class="col-xs-7">
                                                            <input type="text" class="form-control" id="inputFname" placeholder="Last Name">
                                                        </div>
                                                    </div>
												<div class="form-group">
													<label class="control-label col-xs-4">Gender:</label>
													<div class="col-xs-2">
														<label class="radio-inline">
															<input type="radio" name="genderRadios" value="male"> Male
														</label>
													</div>
													<div class="col-xs-2">
														<label class="radio-inline">
															<input type="radio" name="genderRadios" value="female"> Female
														</label>
													</div>
                                                </div>
                                                
                                                <div class="form-group has-success">
                                                        <label class="control-label col-xs-4">User type:</label>
                                                        <div class="col-xs-7">
                                                            <select class="form-control">
                                                                <option>Select</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                            <label class="control-label col-xs-4">Role:</label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control">
                                                                    <option>Select</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <label class="control-label col-xs-4">Branch:</label>
                                                                <div class="col-xs-7">
                                                                    <input type="text" class="form-control" id="inputBranch" placeholder="Branch">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-xs-4" for="inputEmail">Username:</label>
                                                                    <div class="col-xs-7">
                                                                        <input type="text" class="form-control" id="inputFname" placeholder="User name">
                                                                    </div>
                                                                </div>
                                                            <div class="form-group">
                                                                    <label class="control-label col-xs-4" for="inputEmail">Password:</label>
                                                                    <div class="col-xs-7">
                                                                        <input type="password" class="form-control" id="inputFname" placeholder="Password">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                        <label class="control-label col-xs-4" for="inputEmail">Confirm Password:</label>
                                                                        <div class="col-xs-7">
                                                                            <input type="password" class="form-control" id="inputFname" placeholder="Confirm Password">
                                                                        </div>
                                                                    </div>

												<br>
												<div class="form-group">
													<div class="col-xs-offset-4 col-xs-8">
														<div class="col-xs-3">
															<input type="submit" class="btn btn-primary" value="Submit" style="width:100px">
														</div>
														<div class="col-xs-3">
															<input type="reset" class="btn btn-danger" value="Reset" style="width:100px">
														</div>
													</div>
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
	<div class="col-md-1"></div>
	</div>
	</div>
	<<div id="footer" class="footer" style="background-color: black; color:white">
		<div class="container">
			<center>
				<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
			</center>
		</div>
	</div>
</body>
</html>