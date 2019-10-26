<?php	
//include_once('db.php');
include_once('../validator.php');
include_once('../../class/resident.php');
        $photo=$_POST["photo"];
        //$mothername=$_POST["mothername"];
        //$grandmothername=$_POST["grandmothername"];
        //$sub_city=$_POST["sub_city"];
        $woreda=$_POST["woreda"];
        $kebele=$_POST["kebele"];
        $contact=$_POST["contact"];
        $email=$_POST["email"];
        $house_status=$_POST["housestatus"];
        $marital_status=$_POST["maritalstatus"];
        $income=$_POST["income"];
        $income_source=$_POST["incomesource"];
        $resident_id=$_POST["residentid"];
        echo $photo;
        echo $woreda;
        echo $kebele;
        //$lastId=$row2['resident_id'];//BSC

        //$srtlength=Strlen($lastId);
        //str_split($lastId,3);
        //$photoindex=(int)(substr($lastId,1,$srtlength-5));
        //return substr($lastId,3,$srtlength-1)+1;
        //$lastIdnum=$lastIdnum+1;
        //$resident_id="BSR".(string) $lastIdnum;
       
       /* $srtlength=Strlen($photo);
        $phototemp=(int)(substr($lastId,0,$srtlength-5));*/

    if(!is_numeric($photo) && Strlen($photo)>6)
    {
        $lastindex="1";
        $tempStr = file_get_contents("../../residentphoto/lastindex.txt");
        $tempInt=(int) $phototemp;
        $tempInt=$tempInt+1;
        $lastindex=(String) $tempInt;
        //echo $lastindex;
        $File = fopen("../../residentphoto/lastindex.txt", "w");
        fwrite($File, $lastindex);
        fclose($File);

        list($type, $photo) = explode(';', $photo);
        list(, $photo) = explode(',', $photo);
        $photo = base64_decode($photo);
        file_put_contents("../../residentphoto/".$lastindex.".jpeg", $photo);

        /*$imgdir="../../residentphoto/".$lastindex.".jpeg";
        file_put_contents($imgdir, base64_decode($photo));*/
        $photoindex=$lastindex;
    }else
    {
        $photoindex=$photo;
    }


        $DB_con = connect();
        if(select_validator($woreda) && select_validator($kebele) && contact_validator($contact) && email_validator($email) && select_validator($house_status) && select_validator($marital_status) && income_validator($income) && select_validator($income_source) && $photoindex!="")
        {
        	$residentObject=new Resident();
        	$result=$residentObject->update($resident_id,$photoindex,$woreda,$kebele,$contact,$email,$house_status,$marital_status, $income, $income_source);

        	echo '<div class="alert alert-success alert-dismissable col-xs-offset-2 col-xs-8">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b><center>'.$result.'!</center>
                            </b>
                        </div>';
        }else
        {
        		echo '<div class="alert alert-danger alert-dismissable col-xs-offset-2 col-xs-8">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b><center>Invalid data to update resident please use valid data and try again!</center>
                            </b>
                        </div>';

        }
				 
?>
