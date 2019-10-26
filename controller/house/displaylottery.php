<?php
session_start();
include_once('../db.php');
include_once('../validator.php');
//include_once('../../class/news.php');
$DB_con = connect();

$block_id=$_POST["blockid"];



	$stmt1 = $DB_con->prepare('SELECT * FROM block WHERE block_id= :block_id');
	$stmt1->bindParam(':block_id',$block_id);
	$stmt1->execute();
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

	$block_id=$row1['block_id'];
	$model=$row1['model'];
	$type=$row1['type'];
	$projecttype=$row1['project_type'];
	$sitename=$row1['site_name'];
	$nofloor=$row1['no_floor'];
	$noroom=$row1['no_room'];
	$bno=$row1['bno'];
	$nohouse=$row1['no_house'];
	$noshope=$row1['no_shop'];
	$noassigned=$row1['no_assigned'];
	(int)$canassign=$noroom-$noassigned;
	if($canassign>=1){

echo"
<link href='../../css/growl/jquery.growl.css' rel='stylesheet' type='text/css'>
<link href='../../css/growl/sample.css' rel='stylesheet' type='text/css'>
<script src='../../js/growl/jquery.js' type='text/javascript'></script>
<script src='../../js/growl/jquery.growl.js' type='text/javascript'></script>
<!--<script src='js/growl/sample.js' type='text/javascript'></script>-->
<script src='../../js/growl/rainbow.js' type='text/javascript'></script>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31911059-1']);
  _gaq.push(['_trackPageview']);
  
  (function() {
    //var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    //ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    //var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  (function () {
  $(function () {

  	/* $.growl({
      title: 'Hello',
      message: 'Welcome to Condominum Management System for Bole subcity!'
    });*/
//alert(565);
  	$('.error').click(function (event) {
      		return $.growl.error({message: 'The kitten is attacking!'});

      	});
    $('#notice').click(function (event) {
      		return $.growl.notice({message: 'The kitten is cute!'});
  	});

  });
}).call(this);
</script>";

	   echo'<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                DataTables Advanced Tables
		            </div>
		            <!-- /.panel-heading -->
		            <div class="panel-body">
		            	<div id="">
		                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
		                    <thead>
		                        <tr>
		                            <th>Applicant id</th>
		                            <th>Turn</th>
		                            <th>Payment</th>
		                            <th>Status</th>
		                            <th>Type</th>
		                            <th>Bedroom</th>
		                            <th>Site</th>
		                            <th>Block</th>
		                            <th>Room</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead><tbody>';
		//INTIALIZING VALUE FOR ENUMRATOR IN DB TO CHECK HOUSE_STATUS=NO/YES
		$house_status='no';
		$lastroomno=(int)$noassigned;//TO ASSIGN ROOM NUMBER

		$stmt2 = $DB_con->prepare('SELECT * FROM applicant  WHERE house_type= :projecttype AND bead_room= :type AND house_status= :house_status ORDER BY status DESC limit '.$canassign.'');
		$stmt2->bindParam(':projecttype',$projecttype);
		$stmt2->bindParam(':type',$type);
		$stmt2->bindParam(':house_status',$house_status);
		$stmt2->execute();
		while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
			$lastroomno=$lastroomno+1;//INCREEMENT LAST ROOM ASSIGNED FOR THE NEXT
			$applicant_id=$row2['applicant_id'];
			$registration_turn=$row2['registration_turn'];
			//$type=$row2['type'];
			$projecttype=$row2['house_type'];
			$bead_room=$row2['bead_room'];
			$status=$row2['status'];
			$payment_status=$row2['payment_status'];
			/*<a href="../../controller/house/assignroom.php?blockid='.$block_id.', applicant_id='.$applicant_id.'" class="btn btn-warning btn-xs btn disabled"><span class="glyphicon glyphicon-ok  ">Assign</span></a>*/
			echo '<tr class="">
				    <td>'.$applicant_id.'</td>
				    <td>'.$registration_turn.'</td>
				    <td>'.$payment_status.'</td>
				    <td>'.$status.'</td>
				    <td>'.$projecttype.'</td>
				    <td>'.$bead_room.'</td>
				    <td>'.$sitename.'</td>
				    <td>'.$bno.'</td>
				    <td>'.$lastroomno.'</td>
				   
				    <td>
				    <button id="assignbtn'.$applicant_id.'" type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-ok  ">Assign</span></button>
					</td>
				</tr>

				<script>
				    $(document).ready(function() {
				       /* $("#dataTables-example").DataTable({
				            responsive: true
				        });*/

				    
						$("#assignbtn'.$applicant_id.'").click(function(event){
							var blockid="'.$block_id.'";
							var applicantid="'.$applicant_id.'";
							var sitename="'.$sitename.'";
							var block_id="'.$block_id.'";
							var block_no="'.$bno.'";
							var room_no="'.$lastroomno.'";
							$.post("../../controller/house/assignone.php",
							{
								blockid: blockid,
								applicantid: applicantid,
								sitename: sitename,
								block_id: block_id,
								block_no: block_no,
								room_no: room_no
							},
							function(data, status){
								//alert("datav "+ data+ "\n status:"+ status+ blockid);
								if(data=="empty")
								{
									document.getElementById("assignbtn'.$applicant_id.'").innerHTML="Applicant doesnot exist";
			            			document.getElementById("assignbtn'.$applicant_id.'").className="btn btn-danger btn-xs btn disabled";

								}else if(data=="cant")
								{
									document.getElementById("assignbtn'.$applicant_id.'").innerHTML="Unable";
			            			document.getElementById("assignbtn'.$applicant_id.'").className="btn btn-danger btn-xs btn disabled";
								}else if(data=="100")
								{
									document.getElementById("assignbtn'.$applicant_id.'").innerHTML="Assigned";
			            			document.getElementById("assignbtn'.$applicant_id.'").className="btn btn-success btn-xs btn disabled";
								}else if(data=="alrady")
								{
									document.getElementById("assignbtn'.$applicant_id.'").innerHTML="Alrady assigned";
			            			document.getElementById("assignbtn'.$applicant_id.'").className="btn btn-danger btn-xs btn disabled";
								}
								else
								{
									document.getElementById("assignbtn'.$applicant_id.'").innerHTML="Unable";
			            			document.getElementById("assignbtn'.$applicant_id.'").className="btn btn-danger btn-xs btn disabled";
								}

								/*(function () {
								  $(function () {
								  	if(data=="100"){
								      		return $.growl.error({message: "The kitten is attacking!"});
								      	}else
								      	{
								      		return $.growl.notice({message: "The kitten is cute!"});
								      	}

								  });
								}).call(this);*/
								
							

							});
							//$("#resultdiv").load("../../controller/house/displaylottery.php", {"blockid":blockid} );
						});
					});
			    </script>';



		//<!--<a href="deleteblock.php?id='.$block_id.'" class="btn btn-danger btn-xs delete-object"><span class="glyphicon glyphicon-remove"></span></a>
			}
			 echo '</tbody>
		       </table>
		       <!--<a href="../../controller/house/exporttoexcel.php?blockid='.$block_id.',canassign='.$canassign.',projecttype='.$projecttype.', type='.$type.'">Export To Excel</a>
		       <a class="word-export" href="javascript:void(0)"> <p class="fa fa-file-excel-o"></p>Export as .doc </a> -->

		       </div>
		     </div>

		     <div class="row">
		     <div class="col-xs-2">
		     </div>
				<div class="col-xs-3">
					<button id="assignallbtn" type="button" class="btn btn-warning btn-block btn-sm">Assign all rooms</button>
				</div>
				<div class="col-xs-3">
					<a class="btn btn-success btn-block btn-sm" href="../../controller/house/exporttoexcel.php?blockid='.$block_id.',canassign='.$canassign.',projecttype='.$projecttype.', type='.$type.'"><span class="fa fa-file-excel-o"> Export to excel</a>
				</div>
				<div class="col-xs-3">
					<a class="word-export btn btn-primary btn-block btn-sm"" href="javascript:void(0)"> <span class="fa fa-file-excel-o"> </span> Export to word </a> 
				</div>
			</div>

		    </div>
		   </div>

		    <script src="../../js/vendor/jquery/jquery.min.js"></script>
		    <script src="../../js/vendor/bootstrap/js/bootstrap.min.js"></script>
		    <script src="../../js/vendor/metisMenu/metisMenu.min.js"></script>
		    <script src="../../js/vendor/datatables/js/jquery.dataTables.min.js"></script>
		    <script src="../../js/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		    <script src="../../js/vendor/datatables-responsive/dataTables.responsive.js"></script>

		    <script>
		    $(document).ready(function() {
		        $("#dataTables-example").DataTable({
		            responsive: true
		        });
		    });                     


			$("#assignallbtn").click(function(event){
				var blockid="'.$block_id.'";
				$.post("../../controller/house/assignall.php",
				{
					blockid: blockid
				},
				function(data, status){
					/*alert("datav "+ data+ "\n status:"+ status+ blockid);
					$("resultdiv").add(data);*/
				

				});
				//$("#resultdiv").load("../../controller/house/displaylottery.php", {"blockid":blockid} );
			});
		    </script>



		    ';
	}else
	{
		echo "No space to assign room";
	}
	
  date_default_timezone_set('Africa/Nairobi');
 
  $date = new DateTime('now');
  $date->setTimezone(new DateTimeZone('Africa/Nairobi'));
  $str_server_now = $date->format('Y-M-D H:m:s');

  date_default_timezone_set('Africa/Nairobi');
                               
	
	$tempdate = new DateTime();
	$date=$tempdate->format('Y-M-D h:m:s');
	$dategenerated=$date;
	echo '<div id="page-content" class="hidden-lg hidden-md hidden-xs hidden-sm">
		  <div id="">
		  <center><h1><b><u>Lottery Report</u><b></h1></center>
		  <center><h5>Date: '.$dategenerated.' </h5></center></br>
		  </div>
		                <table width="100%" class="table table-striped table-bordered table-hover">
		                    <thead>
		                        <tr>
		                            <th>Applicant id</th>
		                            <th>Turn</th>
		                            <th>Payment</th>
		                            <th>Status</th>
		                            <th>Type</th>
		                            <th>Bedroom</th>
		                            <th>Site</th>
		                            <th>Block</th>
		                            <th>Room</th>
		                        </tr>
		                    </thead><tbody>';
		$lastroomno2=(int)$noassigned;
		$stmt6 = $DB_con->prepare('SELECT * FROM applicant  WHERE house_type= :projecttype AND bead_room= :type AND house_status= :house_status ORDER BY status DESC limit '.$canassign.'');
		$stmt6->bindParam(':projecttype',$projecttype);
		$stmt6->bindParam(':type',$type);
		$stmt6->bindParam(':house_status',$house_status);
		$stmt6->execute();
		while($row6=$stmt6->fetch(PDO::FETCH_ASSOC))
		{
			$lastroomno2=$lastroomno2+1;
			$applicant_id1=$row6['applicant_id'];
			$registration_turn1=$row6['registration_turn'];
			$projecttype1=$row6['house_type'];
			$bead_room1=$row6['bead_room'];
			$status1=$row6['status'];
			$payment_status1=$row6['payment_status'];
			echo '<tr class="">
				    <td>'.$applicant_id.'</td>
				    <td>'.$registration_turn.'</td>
				    <td>'.$payment_status.'</td>
				    <td>'.$status.'</td>
				    <td>'.$projecttype.'</td>
				    <td>'.$bead_room.'</td>
				    <td>'.$sitename.'</td>
				    <td>'.$bno.'</td>
				    <td>'.$lastroomno2.'</td>
				</tr>';

			
		}
			 echo '</tbody>
		       </table> 
		       </div>
		     </div>

		    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
			<script src="../../js/exporttoword/FileSaver.js"></script> 
			<script src="../../js/exporttoword/jquery.wordexport.js"></script> 
			<script type="text/javascript">
			    jQuery(document).ready(function($) {
			        $("a.word-export").click(function(event) {
			            $("#page-content").wordExport();
			        });
			    });
			    </script>
			</body>
			<script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(["_setAccount", "UA-36251023-1"]);
			  _gaq.push(["_setDomainName", "jqueryscript.net"]);
			  _gaq.push(["_trackPageview"]);

			</script>';
?>