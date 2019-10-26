<?php
session_start();
include_once('../db.php');
include_once('../validator.php');
//include_once('../../class/news.php');
$DB_con = connect();

//$reportname=$_POST["reportname"];
$reporttype=$_POST["reporttype"];

$tempdate = new DateTime();
$date=$tempdate->format('Y-m-d h:m:s');
$dategenerated=$date;

/*
<option value="1">Registered applicant</option> yes
<option value="2">Canceld applicant</option>  yes
<option value="3">Applicant get house</option> yes
<option value="4">Applicant in waiting</option>

4; <option value="5">Applicant status</option>
<option value="6">Applicant pay total price</option>
<option value="7">Applicant not pay total price</option>
*/
if($reporttype=="1" || $reporttype==1)
{
	reportType1($DB_con,$dategenerated);
}else if($reporttype=="2" || $reporttype==2)
{
	reportType2($DB_con,$dategenerated);
}else if($reporttype=="3" || $reporttype==3)
{
	reportType3($DB_con,$dategenerated);
}else if($reporttype=="5" || $reporttype==5)
{
	reportType5($DB_con,$dategenerated);
}else
{

}

/*VIEW REPORT Registered Applicant  -START*/
function reportType1($DB_con,$dategenerated)
{
	$house_type_studio="studio";
	$house_type_2="20/80";
	$house_type_4="40/60";
	$bead_room_1=1;
	$bead_room_2=2;
	$bead_room_3=3;

	$stmt1_1 = $DB_con->prepare('SELECT * FROM applicant');
	$stmt1_1->execute();
	$row1_1=$stmt1_1->fetch(PDO::FETCH_ASSOC);
	$no_applicant_1=$stmt1_1->rowCount();
	//echo"<p>Totally There are ".$no_applicant_1." Applicant registered to get house.</p>";

	$stmt1_2 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type');
	$stmt1_2->bindParam(':house_type',$house_type_studio);
	$stmt1_2->execute();
	$row1_2=$stmt1_2->fetch(PDO::FETCH_ASSOC);
	$no_applicant_2=$stmt1_2->rowCount();
	//echo "<p>There are ".$no_applicant_2." Applicant registered for studio.</p>";

	$stmt1_3 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_3->bindParam(':house_type',$house_type_2);
	$stmt1_3->bindParam(':bead_room',$bead_room_1);
	$stmt1_3->execute();
	$row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
	$no_applicant_3=$stmt1_3->rowCount();
	//echo "<p>There are ".$no_applicant_3." Applicant registered for 20/80, 1 bedroom.</p>";

	$stmt1_3 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_3->bindParam(':house_type',$house_type_2);
	$stmt1_3->bindParam(':bead_room',$bead_room_1);
	$stmt1_3->execute();
	$row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
	$no_applicant_3=$stmt1_3->rowCount();
	//echo "<p>There are ".$no_applicant_3." Applicant registered for 20/80, 1 bedroom.</p>";

	$stmt1_4 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_4->bindParam(':house_type',$house_type_2);
	$stmt1_4->bindParam(':bead_room',$bead_room_2);
	$stmt1_4->execute();
	$row1_4=$stmt1_4->fetch(PDO::FETCH_ASSOC);
	$no_applicant_4=$stmt1_4->rowCount();
	//echo "<p>There are ".$no_applicant_4." Applicant registered for 20/80, 2 bedroom.</p>";

	$stmt1_5 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_5->bindParam(':house_type',$house_type_2);
	$stmt1_5->bindParam(':bead_room',$bead_room_3);
	$stmt1_5->execute();
	$row1_5=$stmt1_5->fetch(PDO::FETCH_ASSOC);
	$no_applicant_5=$stmt1_5->rowCount();
	//echo "<p>There are ".$no_applicant_5." Applicant registered for 20/80, 3 bedroom.</p>";

	$stmt1_6 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_6->bindParam(':house_type',$house_type_4);
	$stmt1_6->bindParam(':bead_room',$bead_room_1);
	$stmt1_6->execute();
	$row1_6=$stmt1_6->fetch(PDO::FETCH_ASSOC);
	$no_applicant_6=$stmt1_6->rowCount();
	//echo "<p>There are ".$no_applicant_6." Applicant registered for 40/60, 1 bedroom.</p>";

	$stmt1_7 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_7->bindParam(':house_type',$house_type_4);
	$stmt1_7->bindParam(':bead_room',$bead_room_2);
	$stmt1_7->execute();
	$row1_7=$stmt1_7->fetch(PDO::FETCH_ASSOC);
	$no_applicant_7=$stmt1_7->rowCount();
	//echo "<p>There are ".$no_applicant_7." Applicant registered for 40/60, 2 bedroom.</p>";

	$stmt1_8 = $DB_con->prepare('SELECT * FROM applicant WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_8->bindParam(':house_type',$house_type_4);
	$stmt1_8->bindParam(':bead_room',$bead_room_3);
	$stmt1_8->execute();
	$row1_8=$stmt1_8->fetch(PDO::FETCH_ASSOC);
	$no_applicant_8=$stmt1_8->rowCount();

	$total20_80=$no_applicant_3+$no_applicant_4+$no_applicant_5;
	$total40_60=$no_applicant_6+$no_applicant_7+$no_applicant_8;
	//echo "<p>There are ".$no_applicant_8." Applicant registered for 40, 3 bedroom.</p>";

	echo'
	<div id="page-content">
		<h1 style="text-size:10px"><center>Bole subcity Condominum Management System Report</center></h1></br>
		<center><h5>Report title : Number of applicant registered</h5>
				<h6>Date:'.$dategenerated.'</h6>
		</center>

		<div id=""><center><h4><b><u>Table: Registerd status</u><b></h4></center></div><!- TABLE HOLDER START-->
			<table width="100%" class="table table-striped table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No.</th>
	                    <th>House type</th>
	                    <th>Bedroom</th>
	                    <th>Size</th>
	                    <th>Total</th>
	                </tr>
	            </thead>
	            <tbody>
		            <tr class="">
					    <td>1</td>
					    <td>Studio</td>
					    <td>-</td>
					    <td>'.$no_applicant_2.'</td>
					    <td>'.$no_applicant_2.'</td>
					</tr>
		            <tr class="">
					    <td>2</td>
					    <td>20/80</td>
					    <td>1bedroom</td>
					    <td>'.$no_applicant_3.'</td>
					    <td rowspan="3">'.$total20_80.'</td>
					</tr>
		            <tr class="">
					    <td>3</td>
					    <td>20/80</td>
					    <td>2bedroom</td>
					    <td>'.$no_applicant_4.'</td>
					</tr>
		            <tr class="">
					    <td>4</td>
					    <td>20/80</td>
					    <td>3bedroom</td>
					    <td>'.$no_applicant_5.'</td>
					</tr>
		            <tr class="">
					    <td>5</td>
					    <td>40/60</td>
					    <td>1bedroom</td>
					    <td>'.$no_applicant_6.'</td>
					    <td rowspan="3">'.$total40_60.'</td>
					</tr>
		            <tr class="">
					    <td>6</td>
					    <td>40/60</td>
					    <td>2bedroom</td>
					    <td>'.$no_applicant_7.'</td>
					</tr>
		            <tr class="">
					    <td>7</td>
					    <td>40/60</td>
					    <td>3bedroom</td>
					    <td>'.$no_applicant_8.'</td>
					</tr>
					<tr class="">
					    <td></td>
					    <td></td>
					    <td></td>
					    <td>Total</td>
					    <td>'.$no_applicant_1.'</td>
					</tr>
				</tbody>
		    </table> 
		 </div><!- TABLE HOLDER END-->

		 <!- PIE CHART HOLDER START-->
		 <div id="" style="float:center; width: 70%; height:50%"><center><h6><b><u>Chart: Applicant Status</u><b></h6></center></div>
			 <div class="chart-container col-offset-2 col-xs-8">
				<div class="pie-chart-container">
					<canvas id="pie-chartcanvas-1"></canvas>
				</div>
			 </div>
		 </div><!- PIE CHART HOLDER END-->
		 <script src="../../js/chartjs/Chart.min.js"></script>
		 <script src="../../js/chartjs/jquery.min.js"></script>

		 <script>

		    $(document).ready(function () {

			var ctx1 = $("#pie-chartcanvas-1");

			var data1 = {
				labels : ["Studio", "20/80, 1bedroom", "20/80, 2bedroom", "20/80, 3bedroom", "40/60, 1bedroom", "40/60, 2bedroom", "40/60, 3bedroom"],
				datasets : [
					{
						label : "Registered applicant",
						data : ['.$no_applicant_2.', '.$no_applicant_3.', '.$no_applicant_4.', '.$no_applicant_5.', '.$no_applicant_6.', '.$no_applicant_7.', '.$no_applicant_8.'],
						backgroundColor : ["#4A89DC","#37BC9B","#8CC152","#F6BB42","#E9573F","#967ADC","#D770AD"],
		                borderColor : ["#434A54","#434A54","#434A54","#434A54","#434A54","#434A54","#434A54"],
		                borderWidth : [1, 1, 1, 1, 1]
					}
				]
			};

			var options = {		title : {display : true,position : "top",text : "Pie Chart",fontSize : 18,fontColor : "#111"},
							   legend : {display : true,position : "bottom"	}	};


			var chart1 = new Chart( ctx1, {type : "pie",data : data1,options : options	});

			});

		    </script>
		    <div><!- FORM HOLDER START-->
				<form class="form-horizontal">
					<div">
					<div class="col-xs-offset-2 col-xs-8">
							vbcvb
						</div>

						<div class="col-xs-offset-2 col-xs-8">
							<div class="col-xs-5">
								<a class="btn btn-success btn-block btn-sm" href="../../controller/house/exporttoexcelreport1.php?reporttype=1><span class="fa fa-file-excel-o"> Export to excel</a>
							</div>
							<div class="col-xs-5">
								<a class="word-export btn btn-primary btn-block btn-sm"" href="javascript:void(0)"> <span class="fa fa-file-excel-o"> </span> Export to word </a></div>
						</div>
				    </div>
				</form>
			</div><!- FORM HOLDER END -->


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

					</script

			</div></div><!- PIE CHART HOLDER END-->';

}
/*VIEW REPORT Registered Applicant  -END*/

/*VIEW REPORT Canceled Applicant  -START*/
function reportType2($DB_con,$dategenerated)
{
	$house_type_studio="studio";
	$house_type_2="20/80";
	$house_type_4="40/60";
	$bead_room_1=1;
	$bead_room_2=2;
	$bead_room_3=3;

	$stmt1_1 = $DB_con->prepare('SELECT * FROM deletedapplicant');
	$stmt1_1->execute();
	$row1_1=$stmt1_1->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_1=$stmt1_1->rowCount();
	//echo"<p>Totally There are ".$no_applicant_1." Applicant registered to get house.</p>";

	$stmt1_2 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type');
	$stmt1_2->bindParam(':house_type',$house_type_studio);
	$stmt1_2->execute();
	$row1_2=$stmt1_2->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_2=$stmt1_2->rowCount();
	//echo "<p>There are ".$no_applicant_2." Applicant registered for studio.</p>";

	$stmt1_3 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_3->bindParam(':house_type',$house_type_2);
	$stmt1_3->bindParam(':bead_room',$bead_room_1);
	$stmt1_3->execute();
	$row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_3=$stmt1_3->rowCount();
	//echo "<p>There are ".$no_applicant_3." Applicant registered for 20/80, 1 bedroom.</p>";

	$stmt1_3 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_3->bindParam(':house_type',$house_type_2);
	$stmt1_3->bindParam(':bead_room',$bead_room_1);
	$stmt1_3->execute();
	$row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_3=$stmt1_3->rowCount();
	//echo "<p>There are ".$no_applicant_3." Applicant registered for 20/80, 1 bedroom.</p>";

	$stmt1_4 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_4->bindParam(':house_type',$house_type_2);
	$stmt1_4->bindParam(':bead_room',$bead_room_2);
	$stmt1_4->execute();
	$row1_4=$stmt1_4->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_4=$stmt1_4->rowCount();
	//echo "<p>There are ".$no_applicant_4." Applicant registered for 20/80, 2 bedroom.</p>";

	$stmt1_5 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_5->bindParam(':house_type',$house_type_2);
	$stmt1_5->bindParam(':bead_room',$bead_room_3);
	$stmt1_5->execute();
	$row1_5=$stmt1_5->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_5=$stmt1_5->rowCount();
	//echo "<p>There are ".$no_applicant_5." Applicant registered for 20/80, 3 bedroom.</p>";

	$stmt1_6 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_6->bindParam(':house_type',$house_type_4);
	$stmt1_6->bindParam(':bead_room',$bead_room_1);
	$stmt1_6->execute();
	$row1_6=$stmt1_6->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_6=$stmt1_6->rowCount();
	//echo "<p>There are ".$no_applicant_6." Applicant registered for 40/60, 1 bedroom.</p>";

	$stmt1_7 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_7->bindParam(':house_type',$house_type_4);
	$stmt1_7->bindParam(':bead_room',$bead_room_2);
	$stmt1_7->execute();
	$row1_7=$stmt1_7->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_7=$stmt1_7->rowCount();
	//echo "<p>There are ".$no_applicant_7." Applicant registered for 40/60, 2 bedroom.</p>";

	$stmt1_8 = $DB_con->prepare('SELECT * FROM deletedapplicant WHERE house_type= :house_type AND bedroom= :bead_room');
	$stmt1_8->bindParam(':house_type',$house_type_4);
	$stmt1_8->bindParam(':bead_room',$bead_room_3);
	$stmt1_8->execute();
	$row1_8=$stmt1_8->fetch(PDO::FETCH_ASSOC);
	$nocanceld_applicant_8=$stmt1_8->rowCount();

	$total20_80canceld=$nocanceld_applicant_3+$nocanceld_applicant_4+$nocanceld_applicant_5;
	$total40_60canceld=$nocanceld_applicant_6+$nocanceld_applicant_7+$nocanceld_applicant_8;
	//echo "<p>There are ".$no_applicant_8." Applicant registered for 40, 3 bedroom.</p>";

	echo'
	<div id="page-content">
		<h1 style="text-size:10px"><center>Bole subcity Condominum Management System Report</center></h1></br>
		<center><h5>Report title : Number of applicant Canceled</h5>
				<h6>Date:'.$dategenerated.'</h6>
		</center>

		<div id=""><center><h4><b><u>Table: Cancelde applicant</u><b></h4></center></div><!- TABLE HOLDER START-->
			<table width="100%" class="table table-striped table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No.</th>
	                    <th>House type</th>
	                    <th>Bedroom</th>
	                    <th>Size</th>
	                    <th>Total</th>
	                </tr>
	            </thead>
	            <tbody>
		            <tr class="">
					    <td>1</td>
					    <td>Studio</td>
					    <td>-</td>
					    <td>'.$nocanceld_applicant_2.'</td>
					    <td>'.$nocanceld_applicant_2.'</td>
					</tr>
		            <tr class="">
					    <td>2</td>
					    <td>20/80</td>
					    <td>1bedroom</td>
					    <td>'.$nocanceld_applicant_3.'</td>
					    <td rowspan="3">'.$total20_80canceld.'</td>
					</tr>
		            <tr class="">
					    <td>3</td>
					    <td>20/80</td>
					    <td>2bedroom</td>
					    <td>'.$nocanceld_applicant_4.'</td>
					</tr>
		            <tr class="">
					    <td>4</td>
					    <td>20/80</td>
					    <td>3bedroom</td>
					    <td>'.$nocanceld_applicant_5.'</td>
					</tr>
		            <tr class="">
					    <td>5</td>
					    <td>40/60</td>
					    <td>1bedroom</td>
					    <td>'.$nocanceld_applicant_6.'</td>
					    <td rowspan="3">'.$total40_60canceld.'</td>
					</tr>
		            <tr class="">
					    <td>6</td>
					    <td>40/60</td>
					    <td>2bedroom</td>
					    <td>'.$nocanceld_applicant_7.'</td>
					</tr>
		            <tr class="">
					    <td>7</td>
					    <td>40/60</td>
					    <td>3bedroom</td>
					    <td>'.$nocanceld_applicant_8.'</td>
					</tr>
					<tr class="">
					    <td></td>
					    <td></td>
					    <td></td>
					    <td>Total</td>
					    <td>'.$nocanceld_applicant_1.'</td>
					</tr>
				</tbody>
		    </table> 
		 </div><!- TABLE HOLDER END-->

		 <!- PIE CHART HOLDER START-->
		 <div id="" style="float:center; width: 70%; height:50%"><center><h6><b><u>Chart: Registerd applicant</u><b></h6></center></div>
			 <div class="chart-container col-offset-2 col-xs-8">
				<div class="pie-chart-container">
					<canvas id="pie-chartcanvas-1"></canvas>
				</div>
			 </div>
		 </div><!- PIE CHART HOLDER END-->
		 <script src="../../js/chartjs/Chart.min.js"></script>
		 <script src="../../js/chartjs/jquery.min.js"></script>

		 <script>

		    $(document).ready(function () {

			var ctx1 = $("#pie-chartcanvas-1");

			var data1 = {
				labels : ["Studio", "20/80, 1bedroom", "20/80, 2bedroom", "20/80, 3bedroom", "40/60, 1bedroom", "40/60, 2bedroom", "40/60, 3bedroom"],
				datasets : [
					{
						label : "Canceled Applicant",
						data : ['.$nocanceld_applicant_2.', '.$nocanceld_applicant_3.', '.$nocanceld_applicant_4.', '.$nocanceld_applicant_5.', '.$nocanceld_applicant_6.', '.$nocanceld_applicant_7.', '.$nocanceld_applicant_8.'],
						backgroundColor : ["#4A89DC","#37BC9B","#8CC152","#F6BB42","#E9573F","#967ADC","#D770AD"],
		                borderColor : ["#434A54","#434A54","#434A54","#434A54","#434A54","#434A54","#434A54"],
		                borderWidth : [1, 1, 1, 1, 1]
					}
				]
			};

			var options = {		title : {display : true,position : "top",text : "Pie Chart",fontSize : 18,fontColor : "#111"},
							   legend : {display : true,position : "bottom"	}	};


			var chart1 = new Chart( ctx1, {type : "pie",data : data1,options : options	});

			});

		    </script>
		    <div><!- FORM HOLDER START-->
				<form class="form-horizontal">
					<div">
					<div class="col-xs-offset-2 col-xs-8">
							vbcvb
						</div>

						<div class="col-xs-offset-2 col-xs-8">
							<div class="col-xs-5">
								<a class="btn btn-success btn-block btn-sm" href="../../controller/house/exporttoexcelreport1.php?reporttype=2><span class="fa fa-file-excel-o"> Export to excel</a>
							</div>
							<div class="col-xs-5">
								<a class="word-export btn btn-primary btn-block btn-sm"" href="javascript:void(0)"> <span class="fa fa-file-excel-o"> </span> Export to word </a></div>
						</div>
				    </div>
				</form>
			</div><!- FORM HOLDER END -->


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

					</script

			</div></div><!- PIE CHART HOLDER END-->';

}
/*VIEW REPORT Canceled Applicant  -END*/

/*VIEW REPORT Applicant Get house  -START*/
function reportType3($DB_con,$dategenerated)
{
	$house_type_studio="studio";
	$house_type_2="20/80";
	$house_type_4="40/60";
	$bead_room_1=1;
	$bead_room_2=2;
	$bead_room_3=3;

	$stmt1_1 = $DB_con->prepare('SELECT * FROM house');
	$stmt1_1->execute();
	$row1_1=$stmt1_1->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_1=$stmt1_1->rowCount();
	//echo"<p>Totally There are ".$no_applicant_1." Applicant registered to get house.</p>";

	$stmt1_2 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type');
	$stmt1_2->bindParam(':house_type',$house_type_studio);
	$stmt1_2->execute();
	$row1_2=$stmt1_2->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_2=$stmt1_2->rowCount();
	//echo "<p>There are ".$no_applicant_2." Applicant registered for studio.</p>";

	$stmt1_3 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_3->bindParam(':house_type',$house_type_2);
	$stmt1_3->bindParam(':bead_room',$bead_room_1);
	$stmt1_3->execute();
	$row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_3=$stmt1_3->rowCount();
	//echo "<p>There are ".$no_applicant_3." Applicant registered for 20/80, 1 bedroom.</p>";

	$stmt1_3 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_3->bindParam(':house_type',$house_type_2);
	$stmt1_3->bindParam(':bead_room',$bead_room_1);
	$stmt1_3->execute();
	$row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_3=$stmt1_3->rowCount();
	//echo "<p>There are ".$no_applicant_3." Applicant registered for 20/80, 1 bedroom.</p>";

	$stmt1_4 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_4->bindParam(':house_type',$house_type_2);
	$stmt1_4->bindParam(':bead_room',$bead_room_2);
	$stmt1_4->execute();
	$row1_4=$stmt1_4->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_4=$stmt1_4->rowCount();
	//echo "<p>There are ".$no_applicant_4." Applicant registered for 20/80, 2 bedroom.</p>";

	$stmt1_5 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_5->bindParam(':house_type',$house_type_2);
	$stmt1_5->bindParam(':bead_room',$bead_room_3);
	$stmt1_5->execute();
	$row1_5=$stmt1_5->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_5=$stmt1_5->rowCount();
	//echo "<p>There are ".$no_applicant_5." Applicant registered for 20/80, 3 bedroom.</p>";

	$stmt1_6 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_6->bindParam(':house_type',$house_type_4);
	$stmt1_6->bindParam(':bead_room',$bead_room_1);
	$stmt1_6->execute();
	$row1_6=$stmt1_6->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_6=$stmt1_6->rowCount();
	//echo "<p>There are ".$no_applicant_6." Applicant registered for 40/60, 1 bedroom.</p>";

	$stmt1_7 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_7->bindParam(':house_type',$house_type_4);
	$stmt1_7->bindParam(':bead_room',$bead_room_2);
	$stmt1_7->execute();
	$row1_7=$stmt1_7->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_7=$stmt1_7->rowCount();
	//echo "<p>There are ".$no_applicant_7." Applicant registered for 40/60, 2 bedroom.</p>";

	$stmt1_8 = $DB_con->prepare('SELECT * FROM house WHERE house_type= :house_type AND bead_room= :bead_room');
	$stmt1_8->bindParam(':house_type',$house_type_4);
	$stmt1_8->bindParam(':bead_room',$bead_room_3);
	$stmt1_8->execute();
	$row1_8=$stmt1_8->fetch(PDO::FETCH_ASSOC);
	$noassigned_applicant_8=$stmt1_8->rowCount();

	$total20_80assigned=$noassigned_applicant_3+$noassigned_applicant_4+$noassigned_applicant_5;
	$total40_60assigned=$noassigned_applicant_6+$noassigned_applicant_7+$noassigned_applicant_8;
	//echo "<p>There are ".$no_applicant_8." Applicant registered for 40, 3 bedroom.</p>";

	echo'
	<div id="page-content">
		<h1 style="text-size:10px"><center>Bole subcity Condominum Management System Report</center></h1></br>
		<center><h5>Report title : Number of applicant get house</h5>
				<h6>Date:'.$dategenerated.'</h6>
		</center>

		<div id=""><center><h4><b><u>Table: Applicant get house</u><b></h4></center></div><!- TABLE HOLDER START-->
			<table width="100%" class="table table-striped table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No.</th>
	                    <th>House type</th>
	                    <th>Bedroom</th>
	                    <th>Size</th>
	                    <th>Total</th>
	                </tr>
	            </thead>
	            <tbody>
		            <tr class="">
					    <td>1</td>
					    <td>Studio</td>
					    <td>-</td>
					    <td>'.$noassigned_applicant_2.'</td>
					    <td>'.$noassigned_applicant_2.'</td>
					</tr>
		            <tr class="">
					    <td>2</td>
					    <td>20/80</td>
					    <td>1bedroom</td>
					    <td>'.$noassigned_applicant_3.'</td>
					    <td rowspan="3">'.$total20_80assigned.'</td>
					</tr>
		            <tr class="">
					    <td>3</td>
					    <td>20/80</td>
					    <td>2bedroom</td>
					    <td>'.$noassigned_applicant_4.'</td>
					</tr>
		            <tr class="">
					    <td>4</td>
					    <td>20/80</td>
					    <td>3bedroom</td>
					    <td>'.$noassigned_applicant_5.'</td>
					</tr>
		            <tr class="">
					    <td>5</td>
					    <td>40/60</td>
					    <td>1bedroom</td>
					    <td>'.$noassigned_applicant_6.'</td>
					    <td rowspan="3">'.$total40_60assigned.'</td>
					</tr>
		            <tr class="">
					    <td>6</td>
					    <td>40/60</td>
					    <td>2bedroom</td>
					    <td>'.$noassigned_applicant_7.'</td>
					</tr>
		            <tr class="">
					    <td>7</td>
					    <td>40/60</td>
					    <td>3bedroom</td>
					    <td>'.$noassigned_applicant_8.'</td>
					</tr>
					<tr class="">
					    <td></td>
					    <td></td>
					    <td></td>
					    <td>Total</td>
					    <td>'.$noassigned_applicant_1.'</td>
					</tr>
				</tbody>
		    </table> 
		 </div><!- TABLE HOLDER END-->

		 <!- PIE CHART HOLDER START-->
		 <div id="" style="float:center; width: 70%; height:50%"><center><h6><b><u>Chart: Registerd applicant</u><b></h6></center></div>
			 <div class="chart-container col-offset-2 col-xs-8">
				<div class="pie-chart-container">
					<canvas id="pie-chartcanvas-1"></canvas>
				</div>
			 </div>
		 </div><!- PIE CHART HOLDER END-->
		 <script src="../../js/chartjs/Chart.min.js"></script>
		 <script src="../../js/chartjs/jquery.min.js"></script>

		 <script>

		    $(document).ready(function () {

			var ctx1 = $("#pie-chartcanvas-1");

			var data1 = {
				labels : ["Studio", "20/80, 1bedroom", "20/80, 2bedroom", "20/80, 3bedroom", "40/60, 1bedroom", "40/60, 2bedroom", "40/60, 3bedroom"],
				datasets : [
					{
						label : "Applicant get house",
						data : ['.$noassigned_applicant_2.', '.$noassigned_applicant_3.', '.$noassigned_applicant_4.', '.$noassigned_applicant_5.', '.$noassigned_applicant_6.', '.$noassigned_applicant_7.', '.$noassigned_applicant_8.'],
						backgroundColor : ["#4A89DC","#37BC9B","#8CC152","#F6BB42","#E9573F","#967ADC","#D770AD"],
		                borderColor : ["#434A54","#434A54","#434A54","#434A54","#434A54","#434A54","#434A54"],
		                borderWidth : [1, 1, 1, 1, 1]
					}
				]
			};

			var options = {		title : {display : true,position : "top",text : "Pie Chart",fontSize : 18,fontColor : "#111"},
							   legend : {display : true,position : "bottom"	}	};


			var chart1 = new Chart( ctx1, {type : "pie",data : data1,options : options	});

			});

		    </script>
		    <div><!- FORM HOLDER START-->
				<form class="form-horizontal">
					<div">
					<div class="col-xs-offset-2 col-xs-8">
							vbcvb
						</div>

						<div class="col-xs-offset-2 col-xs-8">
							<div class="col-xs-5">
								<a class="btn btn-success btn-block btn-sm" href="../../controller/house/exporttoexcelreport1.php?reporttype=3><span class="fa fa-file-excel-o"> Export to excel</a>
							</div>
							<div class="col-xs-5">
								<a class="word-export btn btn-primary btn-block btn-sm"" href="javascript:void(0)"> <span class="fa fa-file-excel-o"> </span> Export to word </a></div>
						</div>
				    </div>
				</form>
			</div><!- FORM HOLDER END -->


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

					</script

			</div></div><!- PIE CHART HOLDER END-->';

}
/*VIEW REPORT Applicant Applicant Get house  -END*/


/*VIEW REPORT Applicant status  -START*/
function reportType5($DB_con,$dategenerated)
{
	$min1=0;
	$min2=10;
	$min3=20;
	$min4=30;
	$min5=40;
	$min6=50;
	$min7=60;
	$min8=70;
	$min9=80;
	$min10=90;

	$max1=10;
	$max2=20;
	$max3=30;
	$max4=40;
	$max5=50;
	$max6=60;
	$max7=70;
	$max8=80;
	$max9=90;
	$max10=100;

	$stmt1_1 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_1->bindParam(':min',$min1);
    $stmt1_1->bindParam(':max',$max1);
    $stmt1_1->execute();
    $row1_1=$stmt1_1->fetch(PDO::FETCH_ASSOC);
    $no_applicant_1=$stmt1_1->rowCount();

	$stmt1_2 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_2->bindParam(':min',$min2);
    $stmt1_2->bindParam(':max',$max2);
    $stmt1_2->execute();
    $row1_2=$stmt1_2->fetch(PDO::FETCH_ASSOC);
    $no_applicant_2=$stmt1_2->rowCount();

    	$stmt1_3 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_3->bindParam(':min',$min3);
    $stmt1_3->bindParam(':max',$max3);
    $stmt1_3->execute();
    $row1_3=$stmt1_3->fetch(PDO::FETCH_ASSOC);
    $no_applicant_3=$stmt1_3->rowCount();

	$stmt1_4 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_4->bindParam(':min',$min4);
    $stmt1_4->bindParam(':max',$max4);
    $stmt1_4->execute();
    $row1_4=$stmt1_4->fetch(PDO::FETCH_ASSOC);
    $no_applicant_4=$stmt1_4->rowCount();

    	$stmt1_5 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_5->bindParam(':min',$min5);
    $stmt1_5->bindParam(':max',$max5);
    $stmt1_5->execute();
    $row1_5=$stmt1_5->fetch(PDO::FETCH_ASSOC);
    $no_applicant_5=$stmt1_5->rowCount();

	$stmt1_6 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_6->bindParam(':min',$min6);
    $stmt1_6->bindParam(':max',$max6);
    $stmt1_6->execute();
    $row1_6=$stmt1_6->fetch(PDO::FETCH_ASSOC);
    $no_applicant_6=$stmt1_6->rowCount();

        	$stmt1_7 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_7->bindParam(':min',$min7);
    $stmt1_7->bindParam(':max',$max7);
    $stmt1_7->execute();
    $row1_7=$stmt1_7->fetch(PDO::FETCH_ASSOC);
    $no_applicant_7=$stmt1_7->rowCount();
   

	$stmt1_8 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_8->bindParam(':min',$min8);
    $stmt1_8->bindParam(':max',$max8);
    $stmt1_8->execute();
    $row1_8=$stmt1_8->fetch(PDO::FETCH_ASSOC);
    $no_applicant_8=$stmt1_8->rowCount();
 echo $no_applicant_8;

    	$stmt1_9 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_9->bindParam(':min',$min9);
    $stmt1_9->bindParam(':max',$max9);
    $stmt1_9->execute();
    $row1_9=$stmt1_9->fetch(PDO::FETCH_ASSOC);
    $no_applicant_9=$stmt1_9->rowCount();

	$stmt1_10 = $DB_con->prepare('SELECT * FROM applicant WHERE status  BETWEEN :min AND :max');
    $stmt1_10->bindParam(':min',$min10);
    $stmt1_10->bindParam(':max',$max10);
    $stmt1_10->execute();
    $row1_10=$stmt1_10->fetch(PDO::FETCH_ASSOC);
    $no_applicant_10=$stmt1_10->rowCount();

 //   $chartdata='.$noassigned_applicant_2.', '.$noassigned_applicant_3.', '.$noassigned_applicant_4.', '.$noassigned_applicant_5.', '.$noassigned_applicant_6.', '.$noassigned_applicant_7.', '.$noassigned_applicant_8.'

    echo'<div id="page-content">
		<h1 style="text-size:10px"><center>Bole subcity Condominum Management System Report</center></h1></br>
		<center><h5>Report title : Applicant status</h5>
				<h6>Date:'.$dategenerated.'</h6>
		</center>

		<div id=""><center><h4><b><u>Table: Applicant status</u><b></h4></center></div><!- TABLE HOLDER START-->
			<table width="100%" class="table table-striped table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No.</th>
	                    <th>Applicant id</th>
	                    <th>Date</th>
	                    <th>Payment_status</th>
	                    <th>House_type</th>
	                    <th>Bead_room</th>
	                    <th>Status</th>
	                </tr>
	            </thead>
	            <tbody>';
	$no=1;
	$stmt1 = $DB_con->prepare('SELECT * FROM applicant');
	$stmt1->execute();
	while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
	{
		$applicant_id=$row1['applicant_id'];
		$date=$row1['date'];
		$payment_status=$row1['payment_status'];
		$house_type=$row1['house_type'];
		$bead_room=$row1['bead_room'];
		$status=$row1['status'];

		echo '
			<tr class="">
		    <td>'.$no.'</td>
		    <td>'.$applicant_id.'</td>
		    <td>'.$date.'</td>
		    <td>'.$payment_status.'</td>
		    <td>'.$house_type.'</td>
		    <td>'.$bead_room.'</td>
		    <td>'.$status.'</td>
			</tr>';
			$no=$no+1;

	}
		echo '
					</tbody>
			    </table> 
			 </div><!- TABLE HOLDER END-->

			 <!- PIE CHART HOLDER START-->
			 <div id="" style="float:center; width: 70%; height:50%"><center><h6><b><u>Chart: Registerd applicant</u><b></h6></center></div>
				 <div class="chart-container col-offset-2 col-xs-8">
					<div class="pie-chart-container">
						<canvas id="pie-chartcanvas-1"></canvas>
					</div>
				 </div>
			 </div><!- PIE CHART HOLDER END-->
			 <script src="../../js/chartjs/Chart.min.js"></script>
			 <script src="../../js/chartjs/jquery.min.js"></script>

			 <script>

			    $(document).ready(function () {

				var ctx1 = $("#pie-chartcanvas-1");

				var data1 = {
					labels : ["-10%", "11-20%", "21-30%","31-40%", "41-50%", "51-60%","61-70%", "71-80%", "81-90%","91-100%"],
					datasets : [
						{
							label : "Applicant status",
							data : ['.$no_applicant_1.', '.$no_applicant_2.', '.$no_applicant_3.', '.$no_applicant_4.', '.$no_applicant_5.', '.$no_applicant_6.', '.$no_applicant_7.', '.$no_applicant_8.' , '.$no_applicant_9.' , '.$no_applicant_10.'],
							backgroundColor : ["#4A89DC","#37BC9B","#8CC152","#F6BB42","#E9573F","#967ADC","#D770AD"],
			                borderColor : ["#434A54","#434A54","#434A54","#434A54","#434A54","#434A54","#434A54"],
			                borderWidth : [1, 1, 1, 1, 1]
						}
					]
				};

				var options = {		title : {display : true,position : "top",text : "Pie Chart",fontSize : 18,fontColor : "#111"},
								   legend : {display : true,position : "bottom"	}	};


				var chart1 = new Chart( ctx1, {type : "pie",data : data1,options : options	});

				});

			    </script>
			    <div><!- FORM HOLDER START-->
					<form class="form-horizontal">
						<div">
						<div class="col-xs-offset-2 col-xs-8">
								vbcvb
							</div>

							<div class="col-xs-offset-2 col-xs-8">
								<div class="col-xs-5">
									<a class="btn btn-success btn-block btn-sm" href="../../controller/house/exporttoexcelreport1.php?reporttype=5><span class="fa fa-file-excel-o"> Export to excel</a>
								</div>
								<div class="col-xs-5">
									<a class="word-export btn btn-primary btn-block btn-sm"" href="javascript:void(0)"> <span class="fa fa-file-excel-o"> </span> Export to word </a></div>
							</div>
					    </div>
					</form>
				</div><!- FORM HOLDER END -->


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

						</script

				</div></div><!- PIE CHART HOLDER END-->';

}
/*VIEW REPORT Applicant Applicant Get house  -END*/
?>