<?php
//include_once('../db.php');
include_once('../validator.php');
include_once('../../class/news.php');
//$DB_con = connect();

//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/

if(isset($_POST["news_id"]))
{
 	$news_id=$_POST["news_id"];
 	if(newsid_validator($news_id))
 	{
 		$newsObject= new News();
		$result=$newsObject->delete($news_id);
		
		if($result=="ye")
		{
			header("Location: ../../pages/manager/newsview.php");
		}else if($result=="un")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><center>Unable to delte this news please try again!!</center>
                    </b>
                </div>';
		}
		else
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
                    <b><center>Invalid to delete news</center>
                    </b>
                </div>';
 	}
}else
{
	echo "f**k";
}

?>