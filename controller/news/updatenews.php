<?php	
//include_once('db.php');
    include_once('../validator.php');
    include_once('../../class/news.php');

    $title=$_POST["newstitletextarea"];
    $newspart=$_POST["newsparttextarea"];
    $newsmedia=$_FILES["newsmediafile"];

    if(newspart_validator($newspart) && newstitle_validator($title))
    {
    	$newsObject=new News();

        file_put_contents("../../news/".$content_id.".txt", $newspart);
        //
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
        //
    	$result=$newsObject->update($title, $date);

    	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>'.$result.'!</center>
                        </b>
                    </div>';
    }else
    {
    		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b><center>Invalid data to update news please use valid data and try again!</center>
                        </b>
                    </div>';

    }
				 
?>
