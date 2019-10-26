<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CMS-BSC</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/hoving.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/validator.js"></script>
	<script language="javascript">
		

		function formValidation()
		{
			var usernameElement = document.getElementById('username');
			var passwordElement = document.getElementById('password');

			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			
			if(username_validator(username))
			{
				if(password_validator(password))
				{
					return true;
				}else
				{
					passwordElement.focus();
				}
			}else
			{
				usernameElement.focus();
			}
			return false;
		}

		function cansubmit()
		{
			return formValidation()
		} 

		function validation_state()
		{
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			
			if(username!='')
			{
				if(username_validator(username))
				{
					document.getElementById('usernamediv').className='form-group has-success';
					document.getElementById('username_validation_feedback').innerHTML='';
				}else
				{
					document.getElementById('usernamediv').className='form-group has-error';
					document.getElementById('username_validation_feedback').innerHTML='<b><p style="color:red;">Invalid user name</p></b>';
				}
			}else
			{
				document.getElementById('usernamediv').className='form-group has-error';
				document.getElementById('username_validation_feedback').innerHTML='<b><p style="color:red;">Empty user name</p></b>';
			}

			if(password!='')
			{
				if(password_validator(password))
				{
					document.getElementById('passworddiv').className='form-group has-success';
					document.getElementById('password_validation_feedback').innerHTML='';
				}else
				{
					document.getElementById('passworddiv').className='form-group has-error';
					document.getElementById('password_validation_feedback').innerHTML='<b><p style="color:red;">Invalid password</p></b>';
				}
			}else
			{
				document.getElementById('passworddiv').className='form-group has-error';
				document.getElementById('password_validation_feedback').innerHTML='<b><p style="color:red;">Empty password</p></b>';
			}
		}

	</script>
	<style>
		@media screen and (max-width:480px) {

		}
		.no-gutters {
		margin-right: 0;
		margin-left: 0;
		> .col,
		> [class*="col-"] {
		padding-right: 0;
		padding-left: 0;
		}
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
				<a href="#" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> CMS</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse" >
				<ul class="nav navbar-nav navbar-right" style="background-color: black;" >
					<li><a class="onhove" href="#">Home</a></li>
					<li><a class="onhove" href="#">News</a></li>
					<li><a class="onhove" href="#">Lottery</a></li>				
					<li>
						<a href="#" class="dropdown-toggle link onhove" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span>Login</a>
						<ul class="dropdown-menu">
							<div style="width:350px;">
								<div class="col-md-12 col-xs-12 hidden-xs hidden-sm">
										<center><h4>Login</h4></center>
										<form action="controller/account/login.php" method="Post" name="login" onsubmit='return cansubmit()'>
											<div class="form-group" id="usernamediv">
			                                    <label class="control-label" for="username">Username</label>
			                                    <input type="text" class="form-control" id="username" name="username" onchange="validation_state()">
			                                    <div class="valid-feedback" id="username_validation_feedback"></div>
			                                </div>
			                                <div class="form-group" id="passworddiv">
			                                    <label class="control-label" for="password">Password</label>
			                                    <input type="password" class="form-control" id="password" name="password" onchange="validation_state()">
			                                    
			                                 	<div class="valid-feedback" id="password_validation_feedback"></div>
			                                </div>
											<!--<a href="#" style="color:rgb(7, 7, 7); list-style:none;">Forgotten Password</a>-->
											</br></br>
											<input type="submit" class="btn btn-primary" style="float:right; width: 100px; padding-right:10px; padding-left: 10px;" id="login" value="Login">
											<span class=""></span>
											<input type="reset" class="btn btn-danger" style="float:right; width: 100px; padding-right:10px; padding-left: 10px" id="clear" value="Clear">
										</form>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<p><br/></p><p><br/></p>


	<div class="container-fluid ">
		<div class="row no-gutters">
				<div class="row no-gutters">
					<div class=" col-md-12 col-xs-12">
							<div class="alert alert-danger alert-dismissable">
	                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                <b></br>Login Failed! User name and Password does't match</br></br>
	                                <a href="#" class="alert-link">Alert Link</a>.</b>
	                            </div>
	                      </div>  
								<div class="col-md-12 col-xs-12" style="border-left-color:2px solid #ccc">
									<div class="col-md-offset-4 col-md-4">
										<center><h4>Login</h4></center>
										<form action="controller/account/login.php" method="Post" name="login" onsubmit='return cansubmit()'>
											<div class="form-group" id="usernamediv">
			                                    <label class="control-label" for="username">Username</label>
			                                    <input type="text" class="form-control" id="username" name="username" onchange="validation_state()">
			                                    <div class="valid-feedback" id="username_validation_feedback"></div>
			                                </div>
			                                <div class="form-group" id="passworddiv">
			                                    <label class="control-label" for="password">Password</label>
			                                    <input type="password" class="form-control" id="password" name="password" onchange="validation_state()">
			                                 	<div class="valid-feedback" id="password_validation_feedback"></div>
			                                </div>
											<!--<a href="#" style="color:rgb(7, 7, 7); list-style:none;">Forgotten Password</a>-->
											</br></br>
											
											<div class="col-md-offset-7 col-md-4">
											<div class="row">
											<div class="col-md-4">
											<input type="reset" class="btn btn-danger"  id="clear" value="Clear"> 
											</div>
											<div class="col-md-2"></div>
											<div class="col-md-4">
											<input type="submit" class="btn btn-primary"  id="login" value="Login">
											</div>
											</div>
											</div>
											</br></br></br>
										</form>
									</div>
							</div>
					<div class=" col-md-12 col-xs-12 hidden-xs">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
							  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							  <li data-target="#myCarousel" data-slide-to="1"></li>
							  <li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner" role="listbox">
							  <div class="item active">
								<img class="first-slide" style="width:100%; height:600px;" src="src/image/indeximg.JPG" alt="First slide">
								<div class="container">
								  <div class="carousel-caption">
									<h1>Headline</h1>
									<p>note</p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
								  </div>
								</div>
							  </div>
							  <div class="item">
								<img class="second-slide" style="width:100%; height:600px;" src="src/image/indeximg.JPG" alt="Second slide">
								<div class="container">
								  <div class="carousel-caption">
									<h1>Register today.</h1>
									<p>Register and be owner of house with low cost and develop your saving habit.</p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
								  </div>
								</div>
							  </div>
							  <div class="item">
								<img class="third-slide" style="width:100%; height:600px;" src="src/image/indeximg.JPG" alt="Third slide" height="300px">
								<div class="container">
								  <div class="carousel-caption">
									<h1>One more for good measure.</h1>
									<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
									<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
								  </div>
								</div>
							  </div>
							</div>
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							  <span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							  <span class="sr-only">Next</span>
							</a>
						  </div><!-- /.carousel -->
						</div>

						<div class="row no-gutters">
							<div class="col-md-6 offset-md-3">hsaghagshdgasgdh</br>hsaghagshdgasgdh</br>hsaghagshdgasgdh</br>hsaghagshdgasgdh</br>hsaghagshdgasgdh</br>hsaghagshdgasgdh</br>hsaghagshdgasgdh</br></div>
						</div>
					</div>
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