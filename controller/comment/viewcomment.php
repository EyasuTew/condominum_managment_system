<?php
session_start();

include_once('../db.php');
//include_once('../validator.php');
//include_once('../../class/comment.php');
$DB_con = connect();
//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/
date_default_timezone_set('Africa/Nairobi');
//$size=$_POST["size"];
$size=$_POST['size'];
$lastid=1;

try
{		/*$dob = new DateTime($postedDate);  //DateTime Object

		$interval = $dob->diff(new DateTime);*/
		function array_msort($array, $cols)
		{
		    $colarr = array();
		    foreach ($cols as $col => $order) {
		        $colarr[$col] = array();
		        foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
		    }
		    $eval = 'array_multisort(';
		    foreach ($cols as $col => $order) {
		        $eval .= '$colarr[\''.$col.'\'],'.$order.',';
		    }
		    $eval = substr($eval,0,-1).');';
		    eval($eval);
		    $ret = array();
		    foreach ($colarr as $col => $arr) {
		        foreach ($arr as $k => $v) {
		            $k = substr($k,1);
		            if (!isset($ret[$k])) $ret[$k] = $array[$k];
		            $ret[$k][$col] = $array[$k][$col];
		        }
		    }
		    return $ret;

		}

		function pluralize( $count, $text ) 
		{ 
		    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s ago" ) );
		}

		function ago( $datetime )
		{
		    //$interval = date_create('now')->diff( $datetime );
		    date_default_timezone_set('Africa/Nairobi');
		    $datetimeObj=new DateTime($datetime);
		    $interval = $datetimeObj->diff(new DateTime);
		    $suffix = ( $interval->invert ? ' ago' : '' );
		    if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
		    if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
		    if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
		    if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'hour' ) . $suffix;
		    if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'minute' ) . $suffix;
		    return pluralize( $interval->s, 'second' ) . $suffix;
		}

	$stmt = $DB_con->prepare('SELECT * FROM comment ORDER BY com_id ASC limit 1');
	$stmt ->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$lastid=$row['com_id'];

	//echo '<table width="100%" class="table table-striped table-bordered table-hover">';
	$stmt1 = $DB_con->prepare('SELECT * FROM comment ORDER BY com_id DESC limit '.$size.'');//DESC
	$stmt1->execute();
	$rowx=$stmt1->fetchAll(PDO::FETCH_ASSOC);

	$arr2 = array_msort($rowx, array('com_id'=>SORT_ASC));
	/*print_r($arr2);
	while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){*/

	foreach($arr2 as $ra=>$row1)
	{
		$com_id=$row1['com_id'];
		$applicant_id=$row1['applicant_id'];
		$date=$row1['date'];
		$content=$row1['content'];
		$contentpart=file_get_contents('../../comment/'.$content.'.txt');
		//GET APPLICANT INFO
		$stmt2 = $DB_con->prepare('SELECT * FROM applicant WHERE applicant_id= :applicant_id');
		$stmt2->bindParam(':applicant_id',$applicant_id);
		$stmt2->execute();
		$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
		$resident_id=$row2['resident_id'];
		//print_r($row2);
		//var_dump($row2);
		//echo $row1['applicant_id'].'   '.$row2['resident_id']."</br>";

		$stmt3 = $DB_con->prepare('SELECT * FROM resident WHERE resident_id= :resident_id');
		$stmt3->bindParam(':resident_id',$resident_id);
		$stmt3->execute();
		$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
		$name=$row3['fname'].' '.$row3['mname'];
		$photo=$row3['photo'];
		
		if($row2['resident_id']=="")
		{
			$photo="avater";
			$name="Name unavailable";
		}

		/*$saveddate = $date;
		$today = date("Y-m-d h:m:s");
		$diff = date_diff(date_create($saveddate), date_create($today));
		//echo 'Duration is is '.$diff->format('%y-%m-%d-%h-%m-%s');
		if((int)$diff->format('%m')>1 && (int)$diff->format('%m')<60)
		{
			echo (int)$diff->format('%m');
		}
		else if((int)$diff->format('%m')>60 && (int)$diff->format('%h')<24)
		{
			echo "hour";
		}else if((int)$diff->format('%h')>24 && (int)$diff->format('%d')<7)
		{
			echo "day";
		}else if((int)$diff->format('%d')>7 && (int)$diff->format('%d')<30)
		{
			echo "week";
		}else if((int)$diff->format('%d')>30 && (int)$diff->format('%d')<365)
		{
			echo "month";
		}else if((int)$diff->format('%m')>12)
		{
			echo "year";
		}else
		{
			echo "hour1212";
		}*/


		/*$tempdate = new DateTime($date);
		$datet=$tempdate->format('Y-m-d :h:m:s');
		$datey=$tempdate->format('Y');
		$datem=$tempdate->format('m');
		$dated=$tempdate->format('d');
		$dateh=$tempdate->format('h');
		$datemin=$tempdate->format('m');
		$dates=$tempdate->format('s');
		$postedDate = $datey.'-'.$datem.'-'.$dated.'-'.$dateh.'-'.$datemin.'-'.$dates;

		$dob = new DateTime($postedDate);  //DateTime Object

		$interval = $dob->diff(new DateTime); //calculates the difference between two DateTime objects */


		/*//$dateassigned=$datet;
		//echo "<br />";
		$y=(int) $datey;
		//echo "<br />";
		$m=(int)$datem;
		//echo "<br />";
		$d=(int) $dated;
		//echo "<br />";
		$h=(int) $datey;
		//echo "<br />";
		$min=(int)$datem;
		//echo "<br />";
		$s=(int) $dated;
		//echo "<br />";
		*/


		/*$y=(int) $interval->y;
		//echo "<br />";
		$m=(int) $interval->m;
		//echo "<br />";
		$d=(int) $interval->d;
		//echo "<br />";
		$h=(int) $interval->H;
		//echo "<br />";
		$min=(int) $interval->I;
		//echo "<br />";
		$s=(int) $interval->S;
		//echo "age ".$interval->y;
		if($m<60)
		{
			$time=$m." min ago";
		}
		else if($h<24)
		{
			$time=$h." hr ago";
		}else if($d<7)
		{
			$time=$d." dat ago";
		}else if($d>=7 && $d<13)
		{
			$time="1 week ago";
		}else if($d>=14 && $d<21)
		{
			$time="2 week ago";
		}else if($d>=21 && $d<30)
		{
			$time="3 week ago";
		}else if($d>=30)
		{
			$time= $m."months ago";
		}else
		{
			$time= $y."year ago";
		}*/

		if($applicant_id==$_SESSION['applicant_id'])
		{
			echo'<div class="class="col-sm-offset-3 col-sm-12">
					<div class="container1 darker" style="width:80%; float:right; " >
					  <img class="img-responsive img-circle pull-right" src="../../photo/'.$photo.'.jpg" alt="Avatar" width="50" height="50"> </br></br>
					  <p style="color:#4169e1" align="right"><b align="right">'.$name.'</b></p>
					  <p >'.$contentpart.'

					<div class="row">
					<!----->
					<div class="col-sm-1">
					<button type="button" class="btn btn-warning btn-link" style="color:orange" data-toggle="modal" data-target="#modaledit'.$com_id.'" data-whatever=""><span class="glyphicon glyphicon-edit"></button>
						    <div class="modal fade" id="modaledit'.$com_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						      <div class="modal-dialog" role="document">
						        <div class="modal-content">
						          <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						            <h4 class="modal-title" id="exampleModalLabel">Edit comment</h4>
						          </div>
						          <div class="modal-body">
						            <!-- -->


										<div class="col-md-12 col-xs-12 wow fadeInDown" data-wow-delay="20s"">
										<form name="newsform'.$com_id.'" id="newsform'.$com_id.'" class="form-vertical" enctype="multipart/form-data">

											<div class="form-group" id="commentpartdiv'.$com_id.'">
												<!--<label class="control-label col-xs-4" for="commentparttextarea'.$com_id.'">News part:</label>-->
												<div class="col-xs-12">
													<textarea style="width:100%" rows="5" name="commentparttextarea'.$com_id.'" id="commentparttextarea'.$com_id.'">'.$contentpart.'</textarea>
												</div>
												<div class="col-xs-1"></div>
												<div class="valid-feedback col-md-offset-5 col-xs-6" id="commentpart_validation_feedback'.$com_id.'"></div>
											</div>
												<div class="form-group">
													<div class="col-xs-offset-3 col-xs-8">
														<div class="col-xs-6">
															<button type="button" class="btn btn-success" id="savebtn'.$com_id.'"><span class="glyphicon  glyphicon-floppy-disk"></span>Save</button>
														
														</div>
														<div class="col-xs-"></div>
														<div class="col-xs-6">
														<button type="button" class="btn btn-warning" id="closebtn'.$com_id.'" data-dismiss="modal"><span class="glyphicon  glyphicon-remove"></span>Close</button>
															
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
						  </div>

					  	<script type = "text/javascript" language = "javascript">
						$("#modaledit'.$com_id.'").on("show.bs.modal", function (event) {
						  var button = $(event.relatedTarget) // Button that triggered the modal
						})

					         	$("#commentparttextarea'.$com_id.'").change(function(event){
					     			//$("#searchdisplaydiv").empty();
					     			var searchElement = document.getElementById("commentparttextarea'.$com_id.'");

					     			var commentpart= $("#commentparttextarea'.$com_id.'").val();
									if(commentpart_validator(commentpart) && (commentpart!=""))
									{
										document.getElementById("commentpartdiv'.$com_id.'").className="form-group has-success";
										document.getElementById("commentpart_validation_feedback'.$com_id.'").innerHTML="";
									}else if(commentpart=="")
									{
										document.getElementById("commentpartdiv'.$com_id.'").className="form-group has-error";
										document.getElementById("commentpart_validation_feedback'.$com_id.'").innerHTML="<b><p style=color:red;>Empty news part contect</p></b>";
										searchElement.focus();
									}
									else
									{
										document.getElementById("commentpartdiv'.$com_id.'").className="form-group has-error";
										document.getElementById("commentpart_validation_feedback'.$com_id.'").innerHTML="<b><p style=color:red;>Enter valid news content</p></b>";
										searchElement.focus();
									}
					         	});

								$("#savebtn'.$com_id.'").on("click",(function(e) {
									//alert(1);
									var commentpart= $("#commentparttextarea'.$com_id.'").val();
									var applicant_id="'.$applicant_id.'";
									if(commentpart_validator(commentpart))
									{
									var commentpart= $("#commentparttextarea'.$com_id.'").val();
									var com_id='.$com_id.';
									$("#maindiv1").load("../../controller/comment/editcomment.php", {"com_id":com_id,"applicant_id":applicant_id,"comment":commentpart});
									window.location="../../pages/applicant/comment.php";
									}else
									{
										$("#commentspart'.$com_id.'").trigger("change");
									}
								}));

							</script>

							<!------>
							<div class="col-sm-6">
												  <button type="button" class="btn btn-danger btn-link" style="color:red;" data-toggle="modal" data-target="#modaldelete'.$com_id.'" data-whatever=""><span class="glyphicon glyphicon-trash"></button>

								    <div class="modal fade" id="modaldelete'.$com_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								      <div class="modal-dialog" role="document">
								        <div class="modal-content">
								          <div class="modal-header">
								            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								            <h4 class="modal-title" id="exampleModalLabel">Delete comment</h4>
								          </div>
								          <div class="modal-body" id="resultdisplaydiv'.$com_id.'">
								            <form>
								              <div class="form-group">
									              <div style="border:10px solid white;">
												 	
														<div class="well">
											              '.$contentpart.'</hr> </br>   '.$date.'
											            </div>
										            </div>
										       </div>
												<div class="form-group  has-error">
										              <label for="message-text" class="control-label ">Are you shure to delete this comment? Confirm to delete.</label>
										              	<button type="button" class="btn btn-danger btn-sm" id="deletebtn'.$com_id.'"></span>Comfirm</button>
														<button type="button" class="btn btn-warning btn-sm" id="cancelbtn'.$com_id.'" data-dismiss="modal">Cancel</button>
										
										        </div>
										    </form>
										</div>
										<!--<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-sm" id="deletebtn'.$com_id.'"></span>Comfirm</button>
											<button type="button" class="btn btn-warning btn-sm" id="cancelbtn'.$com_id.'" data-dismiss="modal">Cancel</button>
										</div>-->
								  	  </div>
									</div>
								</div>
								</div>
						  	<span class="time-right" style="color:white; background-color:#6C7A89">'.ago( $date ).'&nbsp&nbsp</span></p>
							</div>
						</div>

						<script type = "text/javascript" language = "javascript">
						$("#deletebtn'.$com_id.'").click(function(event){
					   		var com_id='.$com_id.';
					   		var applicant_id="'.$applicant_id.'";
							$("#resultdisplaydiv'.$com_id.'").load("../../controller/comment/deletecomment.php", {"com_id":com_id, "applicant_id":applicant_id} );
							window.location="../../pages/applicant/comment.php";
							
						});

						$("#modaldelete'.$com_id.'").on("show.bs.modal", function (event) {
						  var button = $(event.relatedTarget) // Button that triggered the modal
						})
						</script>';
		}
		else
		{
			echo'
				<div class="container1 class="col-sm-10" style="width:80%; float:left;">
				 
				  <img class="img-responsive img-circle " src="../../photo/'.$photo.'.jpg" alt="Avatar" width="50" height="50"> <p style="color:#008080"><b align="right">'.$name.'</b></p>
				  <p>'.$contentpart.'</p>
				  <span class="time-left" style="color:white; background-color:#6C7A89">'.ago( $date ).'</span>
				</div>';
		}
		$alstcomm_id=$com_id;
	}
	//FOR NEW COMMENT
	echo'
		<div class="container1 darker" style="width:80%; float:right; margin-bottom:5%">
			  <img class="img-responsive img-circle pull-right" src="../../photo/'.$photo.'.jpg" alt="Avatar" width="50" height="50"> </br></br>
						  <p style="color:#4169e1" align="right"><b align="right">'.$name.'</b></p>
			  <textarea name="newcommet" id="newcommenttextarea" rows="5" style="width: 100%;"></textarea>
			 
			  <div align="right">
				  <button type="button" class="btn btn-danger btn-circle" id="cancelbtn"><span class="glyphicon glyphicon-remove "></button>
				  <button type="button" class="btn btn-success  btn-circle" id="savebtn"><span class="glyphicon glyphicon-send "></button>
			  </div>
		</div>

		<script type = "text/javascript" language = "javascript">
	        
				$("#savebtn").click(function(){
				  	var newsize='.$size.';
				  	var applicant_id="'.$applicant_id.'";
				  	var comment= $("#newcommenttextarea").val();
	         		$("#resultdiv").load("../../controller/comment/writecomment.php",{"applicant_id":applicant_id,"comment":comment});
	         		//window.location="../../pages/applicant/comment.php";
				});

				$("#cancelbtn").click(function(){
					document.getElementById("newcommenttextarea").value="";
				});
	      </script>';

		$newsize=$size+10;
	 	if($lastid==$alstcomm_id){

	     echo '<div class="col-xs-6" id="loaddiv" style="border-top:5px solid #dcdcdc;"> 
						<fieldset disabled="">
							<button type="button" style="float:right;" class="btn btn-primary "><span class="glyphicon glyphicon-arrow-up"></button>
					    </fieldset> 
					</div>
					<div class="col-xs-6" id="refreshdiv" style="border-top:5px solid #dcdcdc;"> 
						<a id="linkrefresh" class="btn btn-primary "><span class="glyphicon glyphicon-refresh"></a>
					</div>';//$("#refreshdiv").remove();
	     }else
	     {
     		echo '
			  <div class="col-xs-6" id="refreshdiv" style=" border-top:5px solid #dcdcdc;"> 
						<!--<a id="linkseemore" class="btn btn-primary float:right;"><span class="glyphicon glyphicon-arrow-up"></a>-->
						<!--<button id="linkseemore" type="button" style="float:right;" class="btn btn-primary "><span class="glyphicon glyphicon-arrow-up"></button>-->
						<a href="comment.php?size='.$newsize.'" id="linkseemore" class="btn btn-primary " style="float:right;"><span class="glyphicon glyphicon-arrow-up"></a>
					</div>
			 
			  <div class="col-xs-6" id="refreshdiv" style="border-top:5px solid #dcdcdc;"> 
						<a  href="comment.php" id="linkrefresh" class="btn btn-primary " ><span class="glyphicon glyphicon-refresh"></a>
					</div>


			  <script type = "text/javascript" language = "javascript">
		        // $(document).ready(function() {
					$("#linkseemore").click(function(){
					  	//$("#loaddiv").remove();
					  	var newsize='.$newsize.';
		         		$("#manindiv1").load("../../controller/comment/viewcomment.php", {"size":newsize});
		         		//alert(newsize);
					});
					$("#linkrefresh").click(function(){
					  	//$("#loaddiv").remove();
					  	var newsize='.$size.';
		         		$("#manindiv1").load("../../controller/comment/viewcomment.php", {"size":newsize});
					});

		        // });
		      </script>';
         
     	}
  
}catch(Exception $ex)
{
	echo $ex->getMessage();
}
?>