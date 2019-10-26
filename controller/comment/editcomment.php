<?php	
//include_once('db.php');
	session_start();
    include_once('../validator.php');
    include_once('../../class/comment.php');
    $com_id=$_POST["com_id"];
    $comment=$_POST["comment"];
    $applicant_id=$_POST["applicant_id"];
	
		/*	echo 	$_SESSION["user_name"].'</br>';
			echo	$_SESSION["password"].'</br>';/
			echo	$_SESSION["user_type"].'</br>';
			echo	$_SESSION["app_id"].'</br>';
			echo	$_SESSION["applicant_id"].'</br>';*/
    if($applicant_id==$_SESSION["applicant_id"])
    {
    	//GET CURREN DATE AND TIME Y-M-D H:M:S FORMAT
		$tempdate = new DateTime();
		$datet=$tempdate->format('Y-m-d h:m:s');
		$date=$datet;

    	$commentObject=new Commnet();
    	file_put_contents("../../comment/".$com_id.".txt", $comment);
    	$result=$commentObject->edit($com_id, $date);

    	if($result=="ye")
    	{
    		    	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>Comment edited succesfuly!</center>
                        </b>
                    </div>';

    	}else if($result=="un")
    	{
    		    	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>Unable to edit comment!</center>
                        </b>
                    </div>';
    	}else if($result=="no")
    	{
    		    	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>Unable to edit comment!</center>
                        </b>
                    </div>';

    	}else
    	{
	    	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            <b><center>'.$result.'!</center>
	            </b>
	        </div>';
    	}

    }else
    {
    		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>Invalid data to edit your comment please use valid data and try again!</center>
                        </b>
                    </div>';

    }
				 
?>
