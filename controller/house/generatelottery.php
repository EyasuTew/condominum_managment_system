<?php

session_start();
include_once("../db.php");
include_once("../validator.php");
//include_once(?../../class/news.php?);
$DB_con = connect();
//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/
$blockid=$_POST["blockid"];
                                    
$stmt1 = $DB_con->prepare("SELECT * FROM block WHERE block_id=:block_id");
$stmt1->bindParam(':block_id',$blockid);
$stmt1->execute();
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

if($stmt1->rowCount() > 0){
	$blockid=$row1['block_id'];
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

	echo '</br>
		<div class="col-xs-12" id="">
			<div class="row">
				<div class="col-xs-12">
				<center><b>Block information</b></center>
					<table style="border-top: 7px solid #000000;" class="table table-hover">
						<thead>
							<!--<tr>
								<th></th>
								<th>Block information</th>
							</tr>-->
						</thead>
						<tbody>
							<tr>
								<td ><b>Block id:</b></td>
								<td>'.$blockid.'</td>
							</tr>
							<tr>
								<td><b>Project type:</b></td>
								<td> '.$projecttype.'</td>
							</tr>
							<tr>
								<td><b>Bedroom:</b></td>
								<td> '.$type.'</td>
							</tr>
							<tr>
								<td><b>Site name:</b></td>
								<td> '.$sitename.'</td>
							</tr>
							<tr>
								<td><b>Block:</b></td>
								<td> '.$bno.'</td>
							</tr>
							<tr>
								<td><b>Floour no.:</b></td>
								<td> '.$nofloor.'</td>
							</tr>
							<tr>
								<td><b>Room no.:</b></td>
								<td> '.$noroom.'</td>
							</tr>
							<tr>
								<td><b>House no.:</b></td>
								<td> '.$nohouse.'</td>
							</tr>
							<tr>
								<td><b>Shope no.:</b></td>
								<td> '.$noshope.'</td>
							</tr>
							<tr>
								<td><b>No assigned no.:</b></td>
								<td> '.$noassigned.'</td>
							</tr>
						</tbody>
					</table>';

					if((int)$noassigned>=(int)$noroom)
					{
						echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> No space to assign applicant in this block, block id'.$blockid.'</center>
	                    </b>
	                </div>';
					}else
					{
						echo '
						<div class="row">
							<div class="col-xs-6">
								<button id="generatebtn" type="button" class="btn btn-primary btn-sm btn-block">Genereate lottery</button></div>
							<div class="col-xs-6">
								<button type="button" class="btn btn-primary btn-sm btn-block btn-warning">Cancel</button>
							</div>
						</div>
					<script>
						/*$("#generatebtn").click(function(event){
							//alert(1212);
            			var blockid=$("#blockidtxt").val();
	      				$("#blockidtxt").trigger("change");
	      				if(blockid_validator(blockid))
	      				{
	            
	      					$("#resultdiv").load("../../controller/house/displaylottery.php", {"blockid":blockid} );
	      				}else
	      				{

	      				}
					});*/

					$("#generatebtn").click(function(event){
						var blockid="'.$blockid.'";
						/*$.post("../../controller/house/displaylottery.php",
						{
							blockid: blockid
						},
						function(data, status){
							alert("datav "+ data+ "\n status:"+ status+ blockid);
							$("resultdiv").add(data);

						});*/
						$("#resultdiv").load("../../controller/house/displaylottery.php", {"blockid":blockid} );
					});
					</script>';
					}

		}else
		{

			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center> No block found with block id '.$blockid.'</center>
	                    </b>
	                </div>';
		}


?>