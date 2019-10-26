<?php

	include_once('../db.php');
	$DB_con = connect();
	$block_id = $_GET['blockid'];

		                            
		                         
	$columnHeader ='';
	$columnHeader = "Applicant id"."\t"."Turn"."\t"."House project"."\t"."Bedroom"."\t"."Status"."\t"."Payment"."\t"."Site"."\t"."Block"."\t"."Room"."\t";
	$setData='';

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
	$lastroom=(int)$noassigned;

	$house_status="no";//APPLICANT DOES NOT GET HOUSE
	$stmt2 = $DB_con->prepare('SELECT * FROM applicant  WHERE house_type= :projecttype AND bead_room= :type AND house_status= :house_status ORDER BY status DESC limit '.$canassign.'');
	$stmt2->bindParam(':projecttype',$projecttype);
	$stmt2->bindParam(':type',$type);
	$stmt2->bindParam(':house_status',$house_status);
	$stmt2->execute();
	
	while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
	{

		$lastroom=$lastroom+1;
		$applicant_id=$row2['applicant_id'];
		$registration_turn=$row2['registration_turn'];
		$projecttype=$row2['house_type'];
		$bead_room=$row2['bead_room'];
		$status=$row2['status'];
		$payment_status=$row2['payment_status'];

	  	$rowData = '';

	    $value = '"' . $applicant_id . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $registration_turn . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $projecttype . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $bead_room . 'bedroom"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $status . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $payment_status . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $sitename . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' .$bno . '"' . "\t";
	    $rowData .= $value;
	    $value = '"' . $lastroom. '"' . "\t";
	    $rowData .= $value;
	  	$setData .= trim($rowData)."\n";
	}

	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=Lottery.xls");//xls
	header("Pragma: no-cache");
	header("Expires: 0");

	echo ucwords($columnHeader)."\n".$setData."\n";

?>
