<?php
session_start();

include_once('../db.php');
include_once('../validator.php');
include_once('../../class/comment.php');

//"size":newsize,"applicant_id":applicant_id,"comment":comment
$applicant_id=$_POST["applicant_id"];
$comment=$_POST["comment"];

if(1==1)//newspart_validator($newspart) && newstitle_validator($title)
{
		$DB_con = connect();

		//GET NEWS_ID AND CONTENT_ID FROM LAST ROW + ONE(1)
		$news_id=1;
		$content_id=1;
		$stmt1 = $DB_con->prepare('SELECT * FROM comment ORDER BY com_id DESC limit 1');
		$stmt1->execute();
		$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
		if($stmt1->rowCount() > 0)
		{	
			$tempid=$row1['com_id'];
			$lastIdnum=(int) $tempid;
			$lastIdnum=$lastIdnum+1;
			$content_id=$lastIdnum;
		}
		//$content_id=$news_id;
//echo $content_id;
		//GET Applicant_ID FROM SESSION
		$applicant_id=$_SESSION["applicant_id"];
		//GET CURREN DATE AND TIME Y-M-D H:M:S FORMAT
		date_default_timezone_set('Africa/Nairobi');
		$tempdate = new DateTime();
		$datet=$tempdate->format('Y-m-d H:m:s');
		$date=$datet;

		file_put_contents("../../comment/".$content_id.".txt", $comment);
		/*file_put_contents("c.txt", $comment);
		$filename = "commnet/".$content_id.".txt";
		$file = fopen( $filename, "w" );
		/*if( $file == false )
		{
		echo ( "Error in opening new file" );
		exit();
		}*//*
		fwrite( $file, $comment);
		fclose( $file );*/


		$commentObject=new Commnet();
		$result=$commentObject->write($applicant_id, $date, $content_id);

		//echo $emp_id;
		if($result=="ye")
		{
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>News Posted successfuly!</center>
	                    </b>
	                </div>';
	       // header("Location: ../../pages/applicant/comment.php");

		}else if($result=="no")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>News does not posted unsuccessful try again!</center>
	                    </b>
	                </div>';
		}else
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>'.$result.'</center>
	                    </b>
	                </div>';
		}
	}else
	{
		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Plese enter valid data to post news and try again!!</center>
	                    </b>
	                </div>';
	}

?>