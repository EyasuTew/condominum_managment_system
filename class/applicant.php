<?php	
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once('../../controller/db.php');

class Applicant
{
	private $applicant_id;//*
	private $resident_id; ///
	private $t_income; //*
	private $date;//*
	private $register_turn;///
	private $sacc_id;///
	private $payment_status;//*
	private $rest_time;//*
	private $monthly_payment;//*
	private $pre_payment;//*
	private $house_type;//*
	private $bead_room;//*
	private $house_price;//*

	//static $DB_con;
	
	function register($applicant_id,$resident_id,$sacc_id,$income,$date,$registration_turn,$rest_time,$monthly_payment,$pre_payment,$house_type,$bedroom,$house_price,$nationality,$educationallevel,$username,$password,$interest,$applicantincome,$status)
	{	
		try{

			$DB_con = connect();
			//$resident_id="BSR1";
			$user_type="Applicant";
			$res=$username.' | '.$password.' | '.$applicant_id.' | '.$user_type.' | My';
			$accounttype="savinghouse";
			//return $res;

			//$date="1945-2-5";
			
			$stmt = $DB_con->prepare('INSERT INTO applicant(applicant_id,resident_id,total_income,date,registration_turn,sacc_id,rest_time,monthly_payment,pre_payment,house_type,bead_room,house_price,status) VALUES(:applicant_id,:resident_id,:total_income,:date,:registration_turn,:sacc_id,:rest_time,:monthly_payment,:pre_payment,:house_type,:bedroom,:house_price,:status)');
			$stmt->bindParam(':applicant_id',$applicant_id);
			$stmt->bindParam(':resident_id',$resident_id);
			$stmt->bindParam(':total_income',$income);
			$stmt->bindParam(':date',$date);
		    $stmt->bindParam(':registration_turn',$registration_turn);
		    $stmt->bindParam(':sacc_id',$sacc_id);
			$stmt->bindParam(':rest_time',$rest_time);
			$stmt->bindParam(':monthly_payment',$monthly_payment);
		    $stmt->bindParam(':pre_payment',$pre_payment);
		    $stmt->bindParam(':house_type',$house_type);
			$stmt->bindParam(':bedroom',$bedroom);
			$stmt->bindParam(':house_price',$house_price);
			$stmt->bindParam(':status',$status);

			/*$stmt2 = $DB_con->prepare('INSERT INTO app_acc(applicant_id,user_name,password,user_type) VALUES(:applicant_id,:user_name,:password,:user_type)');
			$stmt2->bindParam(':applicant_id',$applicant_id);
			$stmt2->bindParam(':user_name',$username);
			$stmt2->bindParam(':password,',$password);
		    $stmt2->bindParam(':user_type',$user_type);*/

		    $stmt3 = $DB_con->prepare('INSERT INTO app_acc(applicant_id, user_name, password, user_type) VALUES (:applicantid,:username,:password,:usertype)');
			$stmt3->bindParam(':applicantid',$applicant_id);
			$stmt3->bindParam(':username',$username);
			$stmt3->bindParam(':password',$password);
			$stmt3->bindParam(':usertype',$user_type);

			$stmt4 = $DB_con->prepare('INSERT INTO savingaccount(sacc_id, resident_id, nationality, education_level, income,acc_no, acc_type, interest) VALUES (:saccid,:residentid,:nationality,:educationallevel,:income,:accountno,:accounttype,:interest)');
			$stmt4->bindParam(':saccid',$sacc_id);
			$stmt4->bindParam(':residentid',$resident_id);
			$stmt4->bindParam(':nationality',$nationality);
			$stmt4->bindParam(':educationallevel',$educationallevel);
			$stmt4->bindParam(':income',$applicantincome);
			$stmt4->bindParam(':accountno',$sacc_id);
			$stmt4->bindParam(':accounttype',$accounttype);
			$stmt4->bindParam(':interest',$interest);

			if($stmt->execute())
			{
			 	if($stmt3->execute())
				{
					if($stmt4->execute())
					{
						return '3rd';
					}
					return '2nd';//UNABLE TO CREATE SAVING ACCOUNT FOR APPLICANT 
				}
				return '1st';//UNABLE TO CREATE USER ACCOUNT FOR APPLICANT
			}
			else
			{
			 	return 'no';//UNABLE TO REGISTER APPLICANT
			}
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
	}

function update($applicant_id,$house_type,$bedroom)
	{	
	try{
		$DB_con = connect();
		$stmt_update = $DB_con->prepare('UPDATE applicant SET house_type=:house_type, bead_room=:bedroom where applicant_id =:applicant_id');
		$stmt_update->bindParam(':applicant_id',$applicant_id);
		$stmt_update->bindParam(':house_type',$house_type);
		$stmt_update->bindParam(':bedroom',$bedroom);
		if($stmt_update->execute())
		{
			return 'User account updated successfully!';
		}
		
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
	}
	
function delete($applicant_id, $resident_id, $registration_date, $deleted_date, $house_type, $bedroom, $cause_type, $cause)
	{
		//FIRST DELETE FROM [1] SAVINGACCOUTN THE FROM [2]APPLICANT'S USER ACCOUNT AND FROM [3] APPLICANT TABLE
		//SECOND ARCHIVE APPLICANT INFORMATION INTO 'DELETEDAPPLICANT' TABLE
		try{
				$DB_con = connect();
				//FIRST PHASE
				$stmt_delete1 = $DB_con->prepare('DELETE FROM savingaccount WHERE sacc_id= :sacc_id');
				$stmt_delete1->bindParam(':sacc_id',$sacc_id);

				$stmt_delete2 = $DB_con->prepare('DELETE FROM app_acc WHERE applicant_id= :applicant_id');
				$stmt_delete2->bindParam(':applicant_id',$applicant_id);

				$stmt_delete3 = $DB_con->prepare('DELETE FROM applicant WHERE applicant_id= :applicant_id');
				$stmt_delete3->bindParam(':applicant_id',$applicant_id);

				//SECOND PHASE
				//applicant_id	resident_id	registration_date	deleted_date	house_type	bedroom	cause_type	cause	ai_id

				$stmt_insert = $DB_con->prepare('INSERT INTO deletedapplicant(applicant_id, resident_id, registration_date,	deleted_date, house_type, bedroom, cause_type, cause) VALUES (:applicant_id, :resident_id, :registration_date,	:deleted_date, :house_type, :bedroom, :cause_type, :cause)');
				$stmt_insert->bindParam(':applicant_id',$applicant_id);
				$stmt_insert->bindParam(':resident_id',$resident_id);
				$stmt_insert->bindParam(':registration_date',$registration_date);
				$stmt_insert->bindParam(':deleted_date',$deleted_date);
				$stmt_insert->bindParam(':house_type',$house_type);
				$stmt_insert->bindParam(':bedroom',$bedroom);
				$stmt_insert->bindParam(':cause_type',$cause_type);
				$stmt_insert->bindParam(':cause',$cause);

				if($stmt_delete1->execute() && $stmt_delete2->execute() && $stmt_delete3->execute() && $stmt_insert->execute())
				{
					return 'ye';
				}else
				{
					return 'un';
				}


		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
		return 'ex';
		
	}

	function receivePayment($applicant_id,  $emp_id, $date, $amount)
	{	
	try{
			$DB_con = connect();
			$stmt_select = $DB_con->prepare('SELECT * FROM applicant where applicant_id=:applicant_id');
			$stmt_select->bindParam(':applicant_id',$applicant_id);
			$stmt_select->execute();
			$row_select=$stmt_select->fetch(PDO::FETCH_ASSOC);
			$payment_status=$row_select['payment_status'];
			$house_price=$row_select['house_price'];
			$status=$row_select['status'];
			//AMOUNT In PERCENT OF HOUSE PRICE
			$x=($amount*100)/(double)$house_price;
			//CONVERTING 100% to 90%
			$y=(90*$x)/100;
			$newstatus=$y+ (double)$status;
			$newpayment=(double) $payment_status + (double) $amount;

			$stmt_update = $DB_con->prepare('UPDATE applicant SET payment_status=:payment_status, status=:status where applicant_id =:applicant_id');
			$stmt_update->bindParam(':applicant_id',$applicant_id);
			$stmt_update->bindParam(':payment_status',$newpayment);
			$stmt_update->bindParam(':status',$newstatus);
			if($stmt_update->execute())
			{
				return 'ye';
			}else
			{
				return 'no';
			}
		
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
	}

	function registerMarital($marital_id,$hisid,$herid,$date)
	{
		try{
			$DB_con = connect();
			$stmt = $DB_con->prepare('INSERT INTO marital(marital_id,his_id,her_id,date) VALUES(:marital_id,:his_id,:her_id,:date)');
			$stmt->bindParam(':marital_id',$marital_id);
			$stmt->bindParam(':his_id',$hisid);
			$stmt->bindParam(':her_id',$herid);
		    $stmt->bindParam(':date',$date);

			if($stmt->execute())
			{
			 	return 'ye';
			}
			else
			{
			 	return 'un';
			}
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
	}
	function deleteMarital($marital_id,$dateexit)
	{
		try{
			$DB_con = connect();
			$stmt1 = $DB_con->prepare('SELECT * FROM marital where marital_id=:marital_id');
			$stmt1->bindParam(':marital_id',$marital_id);
			$stmt1->execute();
			$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
				$his_id=$row1["his_id"];
				$her_id=$row1["her_id"];
				$date=$row1["date"];
				
				$stmt = $DB_con->prepare('INSERT INTO deletedmarital(marital_id,his_id,her_id,date,datadeleted) VALUES(:marital_id, :his_id, :her_id, :date, :dateexit)');
				$stmt->bindParam(':marital_id',$marital_id);
				$stmt->bindParam(':his_id',$his_id);
				$stmt->bindParam(':her_id',$her_id);
			    $stmt->bindParam(':date',$date);
			    $stmt->bindParam(':dateexit',$dateexit);
			    $stmt->execute();

				$stmt_delete = $DB_con->prepare('DELETE FROM marital WHERE marital_id= :marital_id');
				$stmt_delete->bindParam(':marital_id',$marital_id);
				if($stmt_delete->execute())
				{
					return 'ye';
				}else
				{
					return 'un';
				}
			}else
			{
				return 'uf';
			}
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
		return 'ex';
		
	}
}
/*
	public function create($emp_id, $user_name, $password,$user_type)
	{
		try{
			$DB_con = connect();
			$stmt2 = $DB_con->prepare('select * from resident where resident_id= :resident_id');
		    $stmt2->bindParam(':empid',$emp_id);
			$stmt2->execute();
			$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
			if($stmt2->rowCount() > 0)
			{
					$acc_id=1;

					$stmt1 = $DB_con->prepare('SELECT * FROM emp_acc ORDER BY acc_id DESC limit 1');
					$stmt1->execute();
					$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
					if($stmt1->rowCount() > 0)
					{
						$acc_id=$row1['acc_id'];
						$acc_id=$acc_id+1;

					}

					$stmt3 = $DB_con->prepare('select * from emp_acc where emp_id= :empid');
				    $stmt3->bindParam(':empid',$emp_id);
					$stmt3->execute();
					$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
					if($stmt3->rowCount() > 0)
					{
						return 'found';
					}else
					{
						$stmt = $DB_con->prepare('INSERT INTO emp_acc(acc_id,emp_id,user_name,password,user_type) VALUES(:acc_id, :emp_id, :user_name, :password, :user_type)');
						$stmt->bindParam(':acc_id',$acc_id);
						$stmt->bindParam(':emp_id',$emp_id);
						$stmt->bindParam(':user_name',$user_name);
					    $stmt->bindParam(':password',$password);
					    $stmt->bindParam(':user_type',$user_type);

						if($stmt->execute())
						{
						 	return 'ye';
						}
						else
						{
						 	return 'un';
						}
					}
				}else
				{
					return 'no';
				}
			}catch(Exception $ex)
			{
				return $ex->getMessage();
			}
	}
	public function update($emp_id,$user_name, $password)
	{
		try{
		$DB_con = connect();
		$stmt_update = $DB_con->prepare('UPDATE emp_acc SET user_name=:username, password=:password  where emp_id = :empid');
		$stmt_update->bindParam(':username',$user_name);
		$stmt_update->bindParam(':password',$password);
		$stmt_update->bindParam(':empid',$emp_id);
		$stmt_update->execute();
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
		return 'User account updated successfully!';
	}
	public function delete($emp_id)
	{
		try{
		$DB_con = connect();
		$stmt_delete = $DB_con->prepare('DELETE FROM emp_acc WHERE emp_id= :empid');
		$stmt_delete->bindParam(':empid',$emp_id);
		$stmt_delete->execute();
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
		return 'User account with employee id '.$emp_id.' deleted successfully!';
		
	}
	public function login($user_name, $password)
	{

		try{
		$DB_con = connect();
		$stmt = $DB_con->prepare('select * from emp_acc where user_name= :un and password= :up');
	    $stmt->bindParam(':un',$user_name);
	    $stmt->bindParam(':up',$password);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0)
		{
			$user_type=$row['user_type'];
			$session_id=$user_name."".$password;
			setcookie("sessionId",$session_id,time()+120*60*24*7,"/","",0);
            
			$stmt3 = $DB_con->prepare('select * from session where session_id= :session_id');
			$stmt3->bindParam(':session_id',$session_id);
			$stmt3->execute();
			$row=$stmt3->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				$stmt4 = $DB_con->prepare('UPDATE session SET user_name=:username, password=:password  where session_id = :session_id');
			   	$stmt4->bindParam(':session_id',$session_id);
			   	$stmt4->bindParam(':username',$user_name);
			   	$stmt4->bindParam(':password',$password);
			   	$stmt4->execute();
		    }else
		    {
		    	$stmt2 = $DB_con->prepare('INSERT INTO session(session_id, user_name, password, user_type) VALUES(:session_id, :un, :up, :ut)');
			   	$stmt2->bindParam(':session_id',$session_id);
			   	$stmt2->bindParam(':un',$user_name);
			   	$stmt2->bindParam(':up',$password);
			   	$stmt2->bindParam(':ut',$user_type);
			   	$stmt2->execute();
		    }
            try{
		    
			$_SESSION["user_name"]=$user_name;
			$_SESSION["password"]=$password;
			$_SESSION["user_type"]=$user_type;
            }catch(Exception $ex2)
            {
                echo $ex2->getMessage();
            }
            
            /*echo $_SESSION["user_name"];
            echo $_SESSION["password"];
            echo $_SESSION["user_type"];
            if( isset($_SESSION["user_name"]) && isset($_SESSION["password"]) && isset($_SESSION["user_type"]))
            {
                echo "session is seted";
            }*/



            /*
            if($user_type=="Admin")
            {
                header("Location: ../../pages/admin/admin.php");
            }
		    
		}else
		{
			header("Location: ../../loginerror.php");
		}



		}
		catch(Exception $ex)
		{
		 echo $ex->getMessage();
		}

		
	}

	public function logout()
	{
		setcookie("sessionId","",time()-1000);
        session_destroy();
        unset($_SESSION["user_name"]);
        unset($_SESSION["password"]);
        unset($_SESSION["user_type"]);
        echo $_SESSION["password"];
        //header("Location: ../../index.php");
	}

	function setAcc_id($val)
	{
		$this->acc_id=$val;
	}
	function setEmp_id($val)
	{
		$this->emp_id=$val;
	}
	function setUser_name($val)
	{
		$this->user_name=$val;
	}
	function setPassword($val)
	{
		$this->password=$val;
	}
	function setUser_type($val)
	{
		$this->user_type=$val;
	}

	function getAcc_id()
	{
		return $this->emp_id;
	}
	function getEmp_id()
	{
		return $this->emp_id;
	}
	function getUser_name()
	{
		return $this->user_name;
	}
	function getPassword()
	{
		return $this->password;
	}
	function getUser_type()
	{
		return $this->user_type;
	}*/
	/*function connect()
	{
		 $DB_HOST = 'localhost';
		 $DB_USER = 'root';
		 $DB_PASS = '';
		 $DB_NAME = 'cms';
		 
		 try{
		  $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		  $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  return $DB_con;
		 }
		 catch(PDOException $e){
		 return $e->getMessage();
		 }
	 }	*/	

?>
