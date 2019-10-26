<?php
session_start();
include_once("../db.php");
include_once("../validator.php");
include_once('../../class/Block.php');
   
   $block_id=$_POST["block_id"];
   $blockmodel=$_POST["blockmodel"];
   $sitename=$_POST["sitename"];
   $floornumber=$_POST["floornumber"];
   $roomnumber=$_POST["roomnumber"];
   $housenumber=$_POST["housenumber"];
   $shopenumber=$_POST["shopenumber"];
   $projecttype=$_POST["projecttype"];
   $blocktype=$_POST["blocktype"];
   //$bno=$_POST['bno'];
	if(blockmodel_validator($blockmodel) && sitename_validator($sitename) && floornumber_validator($floornumber) && roomnumber_validator($roomnumber) && housenumber_validator($housenumber) && shopenumber_validator($shopenumber) && projecttype_validator($projecttype) && blocktype_validator($blocktype))
	{
		$blockObject= new Block();
		$result=$blockObject->update($block_id,$blockmodel,$sitename,$floornumber,$roomnumber,$housenumber,$shopenumber,$projecttype,$blocktype);

		if($result=="ye")
		{
				echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Block updated successfully!</center>
	                    </b>
	                </div>';
		}else if($result=="no")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Block update unsuccessful try again!</center>
	                    </b>
	                </div>';
		}else
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Block registration unsuccessful try again!</br>'.$result.'</center>
	                    </b>
	                </div>';
		}
	}else
	{
		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Please use valid data to uopdate block!</center>
	                    </b>
	                </div>';
	}
?>