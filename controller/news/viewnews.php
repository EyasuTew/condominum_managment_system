<?php
session_start();
include_once('../db.php');
include_once('../validator.php');
include_once('../../class/news.php');
$DB_con = connect();
//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/

$size=$_POST["size"];
$lastid=1;

$stmt2 = $DB_con->prepare('SELECT * FROM news ORDER BY news_id DESC limit 1');
$stmt2->execute();
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
$alstnews_id=$row2['news_id'];

$stmt1 = $DB_con->prepare('SELECT * FROM news ORDER BY news_id DESC limit 10');
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
	$news_id=$row1['news_id'];
	$lastid=$news_id;
	$title=$row1['title'];
	$date=$row1['date'];
	$content_id=$row1['content_id'];
	$newspart=file_get_contents('../../news/'.$content_id.'.txt');
	$newspartsize=strlen($newspart);
	$partial=substr($newspart,1,$newspartsize/4);
	$full=substr($newspart,1,$newspartsize);
 	echo '
 	<div id=#resultdisplaydiv"></div>
 	<div style="border:10px solid white;">
	 	<h4>'.$title.'</h4>
	 	<div style="border:10px solid white;">
	 		<img src="../../news/'.$content_id.'.jpeg" class="img-fluid" alt="image '.$title.'" style="width:100%"/>
	 	</div>';
	 	if(str_word_count($newspart)>40)
	 	{
			echo '<p>'.$partial.'</p>
		 	<p>
				<a class="btn " data-toggle="collapse" href="collapse'.$news_id.'" role="button" aria-expanded="false" aria-controls="collapseExample">
				See more
				</a>
			</p>
			<div class="collapse" id="collapse'.$news_id.'">
				<div class="card card-body">
					'.$full.'
				</div>
			</div>';
	 	}else
	 	{
		 	
			echo '<div class="well">
              '.$full.'
            </div>';
	 	}

		//<a href="editnews.php?id='. $news_id .'" class="btn btn-warning "><span class="glyphicon glyphicon-edit"></span> Edit</a>
		//<a href="delete.php?id=' . $news_id .'" class="btn btn-danger delete-object"><span class="glyphicon glyphicon-remove"></span> Delete</a>

	 	echo '
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaledit'.$news_id.'" data-whatever=""><span class="glyphicon glyphicon-edit">Edit</button>
	    <div class="modal fade" id="modaledit'.$news_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="exampleModalLabel">Edit news</h4>
	          </div>
	          <div class="modal-body">
	            <!-- -->


					<div class="col-md-7 col-xs-12 wow fadeInDown" data-wow-delay="20s"">
					<form name="newsform'.$news_id.'" id="newsform'.$news_id.'" class="form-vertical" enctype="multipart/form-data">

						<div class="form-group" id="newstitlediv'.$news_id.'">
							<label class="control-label col-xs-4" for="newstitletextarea'.$news_id.'">News title:</label>
							<div class="col-xs-7">
								<textarea cols="58" rows="3" name="newstitletextarea'.$news_id.'" id="newstitletextarea'.$news_id.'">'.$title.'</textarea>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="newstitle_validation_feedback'.$news_id.'"></div>
						</div>

						<div class="form-group" id="newspartdiv'.$news_id.'">
							<label class="control-label col-xs-4" for="newsparttextarea'.$news_id.'">News part:</label>
							<div class="col-xs-7">
								<textarea cols="58" rows="13" name="newsparttextarea'.$news_id.'" id="newsparttextarea'.$news_id.'">'.$full.'</textarea>
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="newspart_validation_feedback'.$news_id.'"></div>
						</div>

						<div class="form-group" id="newsmediadiv'.$news_id.'">
							<label class="control-label col-xs-4" for="newsmediafile'.$news_id.'">News media:</label>
							<div class="col-xs-7">
								<input type="file" class="form-control" id="newsmediafile'.$news_id.'" name="newsmediafile'.$news_id.'" value="../../news/'.$content_id.'.jpeg">
							</div>
							<div class="col-xs-1"></div>
							<div class="valid-feedback col-md-offset-5 col-xs-6" id="newsmedia_validation_feedback'.$news_id.'"></div>
						</div>

							<br>
							<div class="form-group">
								<div class="col-xs-offset-3 col-xs-8">
									<div class="col-xs-6">
										<button type="button" class="btn btn-success" id="savebtn'.$news_id.'"><span class="glyphicon glyphicon-save"></span>Save</button>
									
									</div>
									<div class="col-xs-"></div>
									<div class="col-xs-6">
									<button type="button" class="btn btn-warning" id="closebtn'.$news_id.'" data-dismiss="modal">Close</button>
										
									</div>
								</div>
								</br>
						    </div>
						</form>
					</div>

	            <!-- -->
	          </div>
	          <div class="modal-footer">
	            
	          </div>
	        </div>
	      </div>
	    </div>

	<script type = "text/javascript" language = "javascript">
	$("#modaledit'.$news_id.'").on("show.bs.modal", function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	})

	$("#newstitletextarea'.$news_id.'").change(function(event){
		//$("#searchdisplaydiv").empty();
		var searchElement = document.getElementById("newstitletextarea'.$news_id.'");

		var newstitle'.$news_id.'= $("#newstitletextarea'.$news_id.'").val();
		if(newstitle_validator(newstitle'.$news_id.') && (newstitle'.$news_id.'!=""))
		{
		document.getElementById("newstitlediv'.$news_id.'").className="form-group has-success";
		document.getElementById("newstitle_validation_feedback'.$news_id.'").innerHTML="";
		}else if(newstitle'.$news_id.'=="")
		{
		document.getElementById("newstitlediv'.$news_id.'").className="form-group has-error";
		document.getElementById("newstitle_validation_feedback'.$news_id.'").innerHTML="<b><p style=color:red;>Empty news title</p></b>";
		searchElement.focus();
		}
		else
		{
		document.getElementById("newstitlediv'.$news_id.'").className="form-group has-error";
		document.getElementById("newstitle_validation_feedback'.$news_id.'").innerHTML="<b><p style=color:red;>Enter valid news title</p></b>";
		searchElement.focus();
		}

		});

         	$("#newsparttextarea'.$news_id.'").change(function(event){
     			//$("#searchdisplaydiv").empty();
     			var searchElement = document.getElementById("newsparttextarea'.$news_id.'");

     			var newspart'.$news_id.'= $("#newsparttextarea'.$news_id.'").val();
				if(newspart_validator(newspart'.$news_id.') && (newspart'.$news_id.'!=""))
				{
					document.getElementById("newspartdiv'.$news_id.'").className="form-group has-success";
					document.getElementById("newspart_validation_feedback'.$news_id.'").innerHTML="";
				}else if(newspart'.$news_id.'=="")
				{
					document.getElementById("newspartdiv'.$news_id.'").className="form-group has-error";
					document.getElementById("newspart_validation_feedback'.$news_id.'").innerHTML="<b><p style=color:red;>Empty news part contect</p></b>";
					searchElement.focus();
				}
				else
				{
					document.getElementById("newspartdiv'.$news_id.'").className="form-group has-error";
					document.getElementById("newspart_validation_feedback'.$news_id.'").innerHTML="<b><p style=color:red;>Enter valid news content</p></b>";
					searchElement.focus();
				}
         	});

			$("#savebtn'.$news_id.'").on("click",(function(e) {
				e.preventDefault();
				$.ajax({
				url: "../../controller/news/updatenews.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{
				   //  $("#resultdiv'.$news_id.'").html(data);
					window.location="../../pages/manager/newsview.php";
				}
				});
			}));

	</script>


		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete'.$news_id.'" data-whatever=""><span class="glyphicon glyphicon-remove">Delete</button>

	    <div class="modal fade" id="modaldelete'.$news_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="exampleModalLabel">Delete news</h4>
	          </div>
	          <div class="modal-body" id="resultdisplaydiv'.$news_id.'">
	            <form>
	              <div class="form-group">
		              <div style="border:10px solid white;">
					 	<h4>'.$title.'</h4>
					 	<div style="border:10px solid white;">
					 		<img src="../../news/'.$content_id.'.jpeg" class="img-fluid" alt="image '.$title.'" style="width:100%"/>
					 	</div>
					 	
							<div class="collapse" id="collapse'.$news_id.'">
								<div class="card card-body">
									'.$full.'
								</div>
							</div>

							<div class="well">
				              '.$full.'
				            </div>
			            </div>
			       </div>
					<div class="form-group  has-error">
			              <label for="message-text" class="control-label ">Are you shure to dlete this news? Confirm to delete.</label>
			        </div>
			    </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="deletebtn'.$news_id.'"><span class="glyphicon glyphicon-remove"></span>Delete</button>
				<button type="button" class="btn btn-warning" id="cancelbtn'.$news_id.'" data-dismiss="modal">Cancel</button>
			</div>
	    </div>
	</div>
</div>

	<script type = "text/javascript" language = "javascript">
	$("#deletebtn'.$news_id.'").click(function(event){
		//$("#searchdisplaydiv").empty();
	   		//var residentid = $("#txtsearch").val();
	   		var news_id='.$news_id.';
			$("#resultdisplaydiv'.$news_id.'").load("../../controller/news/deletenews.php", {"news_id":news_id} );
			//$("#resultdisplaydiv).load("../../controller/news/deletenews.php", {"news_id":news_id} );
			window.location="../../pages/manager/newsview.php";
			
		});

	$("#modaldelete'.$news_id.'").on("show.bs.modal", function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	})
	</script>
	</div>
	';

	}
	$newsize=(int) $size+10;
	//echo '<div style="border:10px solid white;"><button type="button" class="btn btn-primary btn-lg btn-block">Load more news</button><button type="button" class="btn btn-primary btn-lg btn-block">Refresh</button></div>';

	if($lastid==$alstnews_id){
	echo '<div class="col-xs-6" id="loaddiv" style="border:10px solid white;"> 
	<a id="linkseemore" class="btn btn-primary btn-block"> Load more news</a>
	</div>
	<div class="col-xs-6" id="refreshdiv" style="border:10px solid white;"> 
	<a id="linkseemore" class="btn btn-primary btn-block"> Refresh</a>
	</div>

	 <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
			$("#linkseemore").click(function(){
			  	$("#loaddiv").remove();
			  	$("#refreshdiv").remove();
			  	var newsize='.$newsize.';
         		$("#manindivb").load("../../controller/news/viewnews.php", {"size":newsize});
			});

         });';
     }else
     {
     echo '<div class="col-xs-6" id="loaddiv" style="border:10px solid white;"> 
				<fieldset disabled="">
					<button type="button" class="btn btn-primary btn-block">No more news</button>
			    </fieldset> 
			</div>
			<div class="col-xs-6" id="refreshdiv" style="border:10px solid white;"> 
			<a id="linkseemore" class="btn btn-primary btn-block"> Refresh</a>
			</div>';
     }

?>