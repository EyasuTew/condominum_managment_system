<?php	
	include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/Block.php');

    	$blockmodel=$_POST["blockmodel"];
        $sitename=$_POST["sitename"];
        $floornumber=$_POST["floornumber"];
        $roomnumber=$_POST["roomnumber"];
        $housenumber=$_POST["housenumber"];
        $shopenumber=$_POST["shopenumber"];
        $projecttype=$_POST["projecttype"];
        $blocktype=$_POST["blocktype"];
	if(blockmodel_validator($blockmodel) && sitename_validator($sitename) && floornumber_validator($floornumber) && roomnumber_validator($roomnumber) && housenumber_validator($housenumber) && shopenumber_validator($shopenumber) && projecttype_validator($projecttype) && blocktype_validator($blocktype))
	{

		//GET THE LAST INDEX AND PREPARE NEW ID FOR SAVING ACCOUNT NO
		$bno=0;
		$DB_con = connect();
		$stmt = $DB_con->prepare('select * from block ORDER BY block_id DESC limit 1');
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0)
		{
			$lastIdd=$row['bno'];
			//echo $lastIdd.'</br>';
			$lastIddnum=(int) $lastIdd;
			//echo $lastIddnum.'</br>';
			$lastIddnum=$lastIddnum+1;
			//echo $lastIddnum.'</br>';
			$bno=$lastIddnum;
		}else
		{
			$bno=1;
		}

		/*INSERT INTO block(model, type, project_type, site_name, no_floor, no_room, bno, no_house, no_shop) VALUES (:model, :type, :project_type, :site_name, no_floor, :no_room, :bno, :no_house, :no_shop)*/

		$blockObject= new Block();
		$result=$blockObject->register($blockmodel,$sitename,$floornumber,$roomnumber,$housenumber,$shopenumber,$projecttype,$blocktype,$bno);

		if($result=="ye")
		{
				echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Block registered successfully!</center>
	                    </b>
	                </div>';
		}else if($result=="no")
		{
			echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                    <b><center>Block registration unsuccessful try again!</center>
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
	                    <b><center>Please use valid data to register block!</center>
	                    </b>
	                </div>';
	}

?>