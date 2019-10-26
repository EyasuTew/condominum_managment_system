<?php
session_start();
include_once('../db.php');
include_once('../validator.php');
include_once('../../class/news.php');

//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/

$title=$_POST["newstitletextarea"];
$newspart=$_POST["newsparttextarea"];
$newsmedia=$_FILES["newsmediafile"];

if(newspart_validator($newspart) && newstitle_validator($title))
{
		$DB_con = connect();

		//GET NEWS_ID AND CONTENT_ID FROM LAST ROW + ONE(1)
		$news_id=1;
		$content_id=1;
		$stmt1 = $DB_con->prepare('SELECT * FROM news ORDER BY news_id DESC limit 1');
		$stmt1->execute();
		$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
		if($stmt1->rowCount() > 0)
		{	
			$tempid=$row1['news_id'];
			$lastIdnum=(int) $tempid;
			$lastIdnum=$lastIdnum+1;
			$news_id=$lastIdnum;
		}
		$content_id=$news_id;

		//GET EMP_ID FROM SESSION
		$emp_id=$_SESSION["emp_id"];
		//GET CURREN DATE AND TIME Y-M-D H:M:S FORMAT
		$tempdate = new DateTime();
		$datet=$tempdate->format('Y-m-d h:m:s');
		$date=$datet;

		//UPLOADING NEWS PART TO NEWS FOLDER IN CMS DIR
		file_put_contents("../../news/".$content_id.".txt", $newspart);
		//$SFWeather = file_get_contents(“example.txt”);

		//UPLOADING FILE TO NEWS FOLDER IN CMS DIR
		if($_FILES['newsmediafile']['type']=="image/png"){
			$temp=$_FILES['newsmediafile']['tmp_name'];
			$_FILES['newsmediafile']['name']=$content_id;// str_replace("world", "Dolly", "Hello world!")
			$dest='../../news/'.basename($_FILES['newsmediafile']['name']).'.'.str_replace("image/","",$_FILES['newsmediafile']['type']);

		}else if($_FILES['newsmediafile']['type']=="image/jpeg")
		{
			$temp=$_FILES['newsmediafile']['tmp_name'];
			$_FILES['newsmediafile']['name']=$content_id;// str_replace("world", "Dolly", "Hello world!")
			$dest='../../news/'.basename($_FILES['newsmediafile']['name']).'.'.str_replace("image/","",$_FILES['newsmediafile']['type']);
		}else if($_FILES['newsmediafile']['type']=="image/jpg")
		{
			$temp=$_FILES['newsmediafile']['tmp_name'];
			$_FILES['newsmediafile']['name']=$content_id;// str_replace("world", "Dolly", "Hello world!")
			$dest='../../news/'.basename($_FILES['newsmediafile']['name']).'.'.str_replace("image/","",$_FILES['newsmediafile']['type']);
		}else if($_FILES['newsmediafile']['type']=="image/gif")
		{
			$temp=$_FILES['newsmediafile']['tmp_name'];
			$_FILES['newsmediafile']['name']=$content_id;// str_replace("world", "Dolly", "Hello world!")
			$dest='../../news/'.basename($_FILES['newsmediafile']['name']).'.'.str_replace("image/","",$_FILES['newsmediafile']['type']);
		}else if($_FILES['newsmediafile']['type']=="image/tiff")
		{
			$temp=$_FILES['newsmediafile']['tmp_name'];
			$_FILES['newsmediafile']['name']=$content_id;// str_replace("world", "Dolly", "Hello world!")
			$dest='../../news/'.basename($_FILES['newsmediafile']['name']).'.'.str_replace("image/","",$_FILES['newsmediafile']['type']);
		}else if(substr($_FILES['newsmediafile']['name'],strlen($_FILES['newsmediafile']['name'])-4,strlen($_FILES['newsmediafile']['name']))==".pdf")
		{
		//substr($string,11,$srtlength);
			$temp=$_FILES['newsmediafile']['tmp_name'];
			//echo $_FILES['newsmediafile']['tmp_name'];
			$_FILES['newsmediafile']['name']=$content_id.'.pdf';
			$dest='../../news/'.basename($_FILES['newsmediafile']['name']);
			//move_uploaded_file($temp,$dest);
			//echo $dest;
		}
		/*echo $_FILES['newsmediafile']['name'];
		$temp=$_FILES['newsmediafile']['tmp_name'];
		$_FILES['newsmediafile']['name']=$content_id;// str_replace("world", "Dolly", "Hello world!")
		$dest='../../news/'.basename($_FILES['newsmediafile']['name']).'.'.str_replace("image/","",$_FILES['newsmediafile']['type']);*/
		move_uploaded_file($temp,$dest);

		$newsObject=new News();
		$result=$newsObject->post($news_id, $emp_id, $title, $date, $content_id);

		//echo $emp_id;
		if($result=="ye")
		{
			echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>News Posted successfuly!</center>
	                    </b>
	                </div>';

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