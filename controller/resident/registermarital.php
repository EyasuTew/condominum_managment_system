<?php	
	include_once('../db.php');
	include_once('../validator.php');
	include_once('../../class/resident.php');

try{	
	$DB_con=connect();
	$hisid=$_POST["hisid"];
	$herid=$_POST["herid"];
	if(residentid_validator($hisid) && residentid_validator($herid))
	{
		
		$stmt_select = $DB_con->prepare('select * from marital where his_id=:hisid AND her_id=:herid');
		$stmt_select->bindParam(':hisid',$hisid);
		$stmt_select->bindParam(':herid',$herid);

		$stmt_select2 = $DB_con->prepare('select * from marital where his_id=:hisid');
		$stmt_select2->bindParam(':hisid',$hisid);

		$stmt_select3 = $DB_con->prepare('select * from marital where her_id=:herid');
		$stmt_select3->bindParam(':herid',$herid);

		$hisgender='M';
		$hergender='F';
		$stmt_select4 = $DB_con->prepare('select * from resident where resident_id=:resident_id and gender=:gender');
		$stmt_select4->bindParam(':resident_id',$hisid);
		$stmt_select4->bindParam(':gender',$hisgender);
		$stmt_select4->execute();
		$row_select4=$stmt_select4->fetch(PDO::FETCH_ASSOC);
		//$temphisid=$row_select4['gender'];

		$stmt_select5 = $DB_con->prepare('select * from resident where resident_id=:resident_id and gender=:gender');
		$stmt_select5->bindParam(':resident_id',$herid);
		$stmt_select5->bindParam(':gender',$hergender);
		$stmt_select5->execute();
		$row_select5=$stmt_select5->fetch(PDO::FETCH_ASSOC);
		//$tempherid=$row_select5['gender'];

		if($stmt_select->execute() && $stmt_select2->execute()  && $stmt_select3->execute())
		{
			$row_select=$stmt_select->fetch(PDO::FETCH_ASSOC);
			$row_select2=$stmt_select2->fetch(PDO::FETCH_ASSOC);
			$row_select3=$stmt_select3->fetch(PDO::FETCH_ASSOC);
			if($stmt_select->rowCount() > 0 )
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <b><center>Marital information can not be registered due to duplication!</center>
		                    </b>
		                </div>';
			}else if($stmt_select2->rowCount() > 0)
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <b><center>Marital information can not be registered due to duplication!</center>
		                    </b>
		                </div>';
			}else if($stmt_select3->rowCount() > 0)
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <b><center>Marital information can not be registered due to duplication!</center>
		                    </b>
		                </div>';
			}else if($stmt_select4->rowCount() > 0 && $stmt_select5->rowCount() > 0)
			{
				if(residentid_validator($hisid) && residentid_validator($herid))
				{
					$marital_id="BSM1";
					
					$stmt1 = $DB_con->prepare('SELECT * FROM marital ORDER BY marital_id DESC limit 1');
					$stmt1->execute();
					$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
					if($stmt1->rowCount() > 0)
					{	
						$tempid=$row1['marital_id'];
						$srtlength=Strlen($tempid);
						$lastIdnum=(int)(substr($tempid,3,$srtlength-1));
						$lastIdnum=$lastIdnum+1;
						$marital_id="BSM".(string) $lastIdnum;

					}

					$tempdate = new DateTime();
					$date=$tempdate->format('Y-m-d');

					$residentObject= new Resident();
					$result=$residentObject->registerMarital($marital_id,$hisid,$herid,$date);

					if($result=="ye")
					{
						echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                    <b><center>Marital information of registered succesfully!</center>
			                    </b>
			                </div>';
					}else if($result=="un") 
					{
						echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                    <b><center>Marital information registration unsuccessful try again!</center>
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
			                    <b><center>Invalid id to register marital information try again! </center>
			                    </b>
			                </div>';
				}
			}
			else
			{
				echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
			                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                    <b><center>Make shure both id to register marital information try again! </center>
			                    </b>
			                </div>';
			}
		}
	}else
	{
		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b><center>Invalid id to register marital information try again! </center>
            </b>
        </div>';
	}

	}catch(Exception $ex)
	{
		echo $ex->getMessage();
	}
?>
