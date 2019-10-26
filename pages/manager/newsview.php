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
	<link rel="stylesheet" href="../../css/bootstrap-theme.css" />
	
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
    function loadnews()
         	{
         		size=10;
         		$("#manindivb").load('../../controller/news/viewnews.php', {"size":size});
         	}

         $(document).ready(function() {
         	
         

         	$("#newstitletextarea").change(function(event){
     			//$("#searchdisplaydiv").empty();
     			var searchElement = document.getElementById('newstitletextarea');

     			var newstitle= $("#newstitletextarea").val();
				if(newstitle_validator(newstitle) && (newstitle!=""))
				{
					document.getElementById('newstitlediv').className='form-group has-success';
					document.getElementById('newstitle_validation_feedback').innerHTML='';
				}else if(newstitle=="")
				{
					document.getElementById('newstitlediv').className='form-group has-error';
					document.getElementById('newstitle_validation_feedback').innerHTML='<b><p style="color:red;">Empty news title</p></b>';
					searchElement.focus();
				}
				else
				{
					document.getElementById('newstitlediv').className='form-group has-error';
					document.getElementById('newstitle_validation_feedback').innerHTML='<b><p style="color:red;">Enter valid news title</p></b>';
					searchElement.focus();
				}

         	});

         	$("#newsparttextarea").change(function(event){
     			//$("#searchdisplaydiv").empty();
     			var searchElement = document.getElementById('newsparttextarea');

     			var newspart= $("#newsparttextarea").val();  
				if(newspart_validator(newspart) && (newspart!=""))
				{
					document.getElementById('newspartdiv').className='form-group has-success';
					document.getElementById('newspart_validation_feedback').innerHTML='';
				}else if(newspart=="")
				{
					document.getElementById('newspartdiv').className='form-group has-error';
					document.getElementById('newspart_validation_feedback').innerHTML='<b><p style="color:red;">Empty news part contect</p></b>';
					searchElement.focus();
				}
				else
				{
					document.getElementById('newspartdiv').className='form-group has-error';
					document.getElementById('newspart_validation_feedback').innerHTML='<b><p style="color:red;">Enter valid news content</p></b>';
					searchElement.focus();
				}
         	});

           /* $("#savebtn").click(function(event){
            	var newstitle=$("#newstitletextarea").val();
            	var newspart=$("#newsparttextarea").val();
            	var newsmedia=$("#newsmediafile").val();
            	file=event.target.file;
            	alert(file);
				$("#newstitletextarea").trigger("change");
				$("#newsparttextarea").trigger("change");
				
				if(newspart_validator(newspart) && newstitle_validator(newstitle) )
				{
					$("#resultdiv").load('../../controller/news/postnews.php', {"newstitle":newstitle,"newspart":newspart, "newsmedia":newsmedia});
				}else
				{
					alert("Please enter valid news data");
				}
			});*/

			$("#newsform").on('submit',(function(e) {
				e.preventDefault();
				//alert('df');
				$.ajax({
				url: "../../controller/news/postnews.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{

				     //alert(data);
				    // $("#myForm").reset();
				     $("#resultdiv").html(data);
				    // $("#myForm").reset();
				    // $("#myForm")[0].reset(); 
				}
				});
			}));

             $("#cancelbtn").click(function(event){
            	$("#resultdiv").empty();
            	document.getElementById('newstitletextarea').value='';
            	document.getElementById('newstitlediv').className='form-group';
				document.getElementById('newstitle_validation_feedback').innerHTML='';

				document.getElementById('newsparttextarea').value='';
            	document.getElementById('newspartdiv').className='form-group';
				document.getElementById('newspart_validation_feedback').innerHTML='';

				document.getElementById('newsmediafile').value='';
            	document.getElementById('newsmediadiv').className='form-group';
				document.getElementById('newsmedia_validation_feedback').innerHTML='';
				});
			});
     </script>
</head>

<body onload="loadnews()">
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
								<a href="empbsc.php" class="" style="color: black;"><b>Post news</b></a>
							</li>
							<li class="onactiveside onhoveside">
								<a href="newsview.php" class="" style="color: black;"><b>View news</b></a>
							</li>
							<li class="onhoveside">
								<a href="blockregister.php" class="" style="color: black;"><b>Register block</b></a>
							</li>
							<!--
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Receive payment</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>View statusl</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Control status</b></a>
							</li>-->
						</div>
					</div>
					<div class="col-md-2 col-xs-12 hidden-lg hidden-md" >
						<div class="nav nav-pills nav-stacked">
							<li class="onhoveside">
								<a href="empbsc.php" class="" style="color: black;"><b>Post news</b></a>
							</li>
							<li class="onactiveside onhoveside">
								<a href="newsview.php" class="" style="color: black;"><b>View news</b></a>
							</li>
							<!--<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Delete applicant</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Receive payment</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>View statusl</b></a>
							</li>
							<li class="onhoveside">
								<a href="deleteaccount.php" class="" style="color: black;"><b>Control status</b></a>
							</li>-->
						</div>
					</div>

					<div class="col-md-7 col-xs-12 wow fadeInDown" id="manindivb" data-wow-delay="20s" style="border:1px solid #c0c0c0;">
					

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





    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Open modal for @mdo</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>-->

<script type = "text/javascript" language = "javascript">
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  /*
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)*/
})
</script>
</body>
</html>