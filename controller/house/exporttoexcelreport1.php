<?php


include_once('../db.php');
$DB_con = connect();
$reporttype= $_GET['reporttype'];
$tempdate = new DateTime();
$date=$tempdate->format('Y-m-d h:m:s');
$dategenerated=$date;

if($reporttype==1 || $reporttype=="1")
{
	reportType1($DB_con,$dategenerated);
}else if($reporttype==2 || $reporttype=="2")
{
    reportType2($DB_con,$dategenerated);
}else if($reporttype==3 || $reporttype=="3")
{
    reportType3($DB_con,$dategenerated);
}else if($reporttype==4 || $reporttype=="4")
{

}else if($reporttype==5 || $reporttype=="5")
{
    reportType5($DB_con,$dategenerated);
}else
{

}

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

    $columnHeader ='';
    $columnHeader = "No."."\t"."House type"."\t"."Bedroom"."\t"."Size"."\t"."Total"."\t";
    $setData='';

    $rowData = '';
    $value = '"' . "1" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "Studio" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "-" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_2 . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_2 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "2" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "1bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_3 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "3" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "2bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_4 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "4" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "3bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_5 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . $total20_80 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "5" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "1bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_6 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "6" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "2bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_7 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "7" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "3bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_8 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . $total40_60 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "Total" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "". '"'. "\t";
    $rowData .= $value;
    $value = '"' . $no_applicant_1 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Registered Applicant Report.xls");//xls
    header("Pragma: no-cache");
    header("Expires: 0");

    echo ucwords($columnHeader)."\n".$setData."\n";
}


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

    $columnHeader ='';
    $columnHeader = "No."."\t"."House type"."\t"."Bedroom"."\t"."Size"."\t"."Total"."\t";
    $setData='';

    $rowData = '';
    $value = '"' . "1" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "Studio" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "-" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_2 . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_2 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "2" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "1bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_3 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "3" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "2bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_4 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "4" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "3bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_5 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . $total20_80canceld . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "5" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "1bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_6 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "6" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "2bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_7 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "7" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "3bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_8 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . $total40_60canceld . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "Total" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "". '"'. "\t";
    $rowData .= $value;
    $value = '"' . $nocanceld_applicant_1 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Canceled Applicant Report.xls");//xls
    header("Pragma: no-cache");
    header("Expires: 0");

    echo ucwords($columnHeader)."\n".$setData."\n";
}


function reportType3($DB_con,$dategenerated)
{
    //echo "Report title : Applicant get house    Date".$dategenerated;
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

    $columnHeader ='';
    $columnHeader = "No."."\t"."House type"."\t"."Bedroom"."\t"."Size"."\t"."Total"."\t";
    $setData='';

    $rowData = '';
    $value = '"' . "1" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "Studio" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "-" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_2 . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_2 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "2" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "1bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_3 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "3" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "2bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_4 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "4" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "20/80" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "3bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_5 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . $total20_80assigned . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "5" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "1bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_6 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "6" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "2bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_7 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . "" . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "7" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "40/60" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "3bedroom" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_8 . '"'. "\t";
    $rowData .= $value;
    $value = '"' . $total40_60assigned . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    $rowData = '';
    $value = '"' . "Total" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "" . '"' . "\t";
    $rowData .= $value;
    $value = '"' . "". '"'. "\t";
    $rowData .= $value;
    $value = '"' . $noassigned_applicant_1 . '"'. "\t";
    $rowData .= $value;
    $setData .= trim($rowData)."\n";

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Applicant get house Report.xls");//xls
    header("Pragma: no-cache");
    header("Expires: 0");

    echo ucwords($columnHeader)."\n".$setData."\n";
}

/*
INSERT INTO `applicant`(`applicant_id`, `resident_id`, `total_income`, `date`, `registration_turn`, `sacc_id`, `payment_status`, `rest_time`, `monthly_payment`, `pre_payment`, `house_type`, `bead_room`, `house_price`, `status`, `ai_id`, `house_status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16])*/
function reportType5($DB_con,$dategenerated)
{
    
    $columnHeader ='';
    $columnHeader = "No."."\t"."Applicant id"."\t"."Date"."\t"."Payment status"."\t"."House type"."\t"."Bedroom"."\t"."Status"."\t";
    $setData='';

    $no=1;
    $stmt1 = $DB_con->prepare('SELECT * FROM applicant');
    $stmt1->execute();
    while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $applicant_id=$row1['applicant_id'];
        $date=(string)$row1['date'];
        $payment_status=(string)$row1['payment_status'];
        $house_type=$row1['house_type'];
        $bead_room=$row1['bead_room'];
        $status=$row1['status'];

        $rowData = '';
        $value = '"' . $no . '"' . "\t";
        $rowData .= $value;

        $value = '"' .$applicant_id. '"' . "\t";
        $rowData .= $value;

        $value = '"' .  $date . '"' . "\t";
        $rowData .= $value;

        $value = '"' . $payment_status . '"'. "\t";
        $rowData .= $value;

        $value = '"' . $house_type . '"'. "\t";
        $rowData .= $value;

        $value = '"' . $bead_room . '"'. "\t";
        $rowData .= $value;
        
        $value = '"' . $status . '"'. "\t";
        $rowData .= $value;

        $setData .= trim($rowData)."\n";
        $no=$no+1;

    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Applicant status Report.xls");//xls
    header("Pragma: no-cache");
    header("Expires: 0");

    echo ucwords($columnHeader)."\n".$setData."\n";
}


?>
