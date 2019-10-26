<?php	
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('../../controller/db.php');

class Resident
{
	private $fname;
	private $mname;
	private $lname;
	private $mothername;
	private $grandmothername;
	private $gender;
	private $birthdate;
	private $housestatus;
	private $maritalstatus;
	private $income;
	private $incomesource;
	private $contact;
	private $email;
	private $kebele;
	private $woreda;
	private $photo;
	//static $DB_con;
	
	function register($fname,$mname,$lname,$gender,$birth,$date,$photo,$mothername,$grandmothername,$woreda,$kebele,$contact,$email,$house_status,$marital_status, $income, $income_source)
	{	
		try{

			$resident_id="BSR1";
			$sub_city="Bole";
			$DB_con = connect();
			$stmt2 = $DB_con->prepare('select * from resident ORDER BY resident_id DESC limit 1');
			$stmt2->execute();
			$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
			if($stmt2->rowCount() > 0)
			{
				$lastId=$row2['resident_id'];//BSC

				$srtlength=Strlen($lastId);
				//str_split($lastId,3);
				$lastIdnum=(int)(substr($lastId,3,$srtlength-1));
				//return substr($lastId,3,$srtlength-1)+1;
				$lastIdnum=$lastIdnum+1;
				$resident_id="BSR".(string) $lastIdnum;
				//return $resident_id;

			}
			//$date="1945-2-5";
			
			$stmt = $DB_con->prepare('INSERT INTO resident(resident_id,fname,mname,lname,gender,birth,date,photo,mothername,grandmothername,sub_city,woreda,kebele,contact,email,house_status,marital_status,income,income_source) VALUES(:resident_id,:fname,:mname,:lname,:gender,:birth,:date,:photo,:mothername,:grandmothername,:sub_city,:woreda,:kebele,:contact,:email,:house_status,:marital_status,:income,:income_source)');

			$stmt->bindParam(':resident_id',$resident_id);
			$stmt->bindParam(':fname',$fname);
			$stmt->bindParam(':mname',$mname);
		    $stmt->bindParam(':lname',$lname);
		    $stmt->bindParam(':gender',$gender);
		    $stmt->bindParam(':birth',$birth);
			$stmt->bindParam(':date',$date);
			$stmt->bindParam(':photo',$photo);
		    $stmt->bindParam(':mothername',$mothername);
		    $stmt->bindParam(':grandmothername',$grandmothername);
			$stmt->bindParam(':sub_city',$sub_city);
			$stmt->bindParam(':woreda',$woreda);
		    $stmt->bindParam(':kebele',$kebele);
		    $stmt->bindParam(':contact',$contact);
		    $stmt->bindParam(':email',$email);
			$stmt->bindParam(':house_status',$house_status);
			$stmt->bindParam(':marital_status',$marital_status);
			$stmt->bindParam(':income',$income);
		    $stmt->bindParam(':income_source',$income_source);

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

function update($resident_id,$photoindex,$woreda,$kebele,$contact,$email,$house_status,$marital_status, $income, $income_source)
	{	
	try{
		$DB_con = connect();
		$stmt_update = $DB_con->prepare('UPDATE resident SET photo=:photo, woreda=:woreda, kebele=:kebele, contact=:contact, email=:email, house_status=:house_status, marital_status=:marital_status, income=:income, income_source=:income_source where resident_id =:resident_id');
		$stmt_update->bindParam(':photo',$photoindex);
		$stmt_update->bindParam(':woreda',$woreda);
		$stmt_update->bindParam(':kebele',$kebele);
		$stmt_update->bindParam(':contact',$contact);
		$stmt_update->bindParam(':email',$email);
		$stmt_update->bindParam(':house_status',$house_status);
		$stmt_update->bindParam(':marital_status',$marital_status);
		$incomedouble=(double) $income;
		$stmt_update->bindParam(':income',$incomedouble);
		$stmt_update->bindParam(':income_source',$income_source);
		$stmt_update->bindParam(':resident_id',$resident_id);
		if($stmt_update->execute())
		{
			return 'User account updated successfully!';
		}
		
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
	}
function delete($resident_id)
	{
		try{
			$DB_con = connect();
			$stmt1 = $DB_con->prepare('SELECT * FROM resident where resident_id=:residentid');
			$stmt1->bindParam(':residentid',$resident_id);
			$stmt1->execute();
			$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
				$fname=$row1["fname"];
				$mname=$row1["mname"];
				$lname=$row1["lname"];
				//$fullname=$row1["fname"]." ".$row1["mname"]." ".$row1["lname"];
				$gender=$row1["gender"];
				$birth=$row1["birth"];
				$date=$row1["date"];
				$photo=$row1["photo"];
				$mothername=$row1["mothername"];
				$grandmothername=$row1["grandmothername"];
				$sub_city=$row1["sub_city"];
				$woreda=$row1["woreda"];
				$kebele=$row1["kebele"];
				$contact=$row1["contact"];
				$email=$row1["email"];
				$house_status=$row1["house_status"];
				$marital_status=$row1["marital_status"];
				$income=$row1["income"];
				$income_source=$row1["income_source"];
				$tempdate = new DateTime();
				$dateexit=$tempdate->format('Y-m-d');

				$stmt = $DB_con->prepare('INSERT INTO deletedresident(resident_id,fname,mname,lname,gender,birth,date,dateexite,photo,mothername,grandmothername,sub_city,woreda,kebele,contact,email,house_status,marital_status,income,income_source) VALUES(:resident_id,:fname,:mname,:lname,:gender,:birth,:date, :dateexit, :photo,:mothername,:grandmothername,:sub_city,:woreda,:kebele,:contact,:email,:house_status,:marital_status,:income,:income_source)');
				$stmt->bindParam(':resident_id',$resident_id);
				$stmt->bindParam(':fname',$fname);
				$stmt->bindParam(':mname',$mname);
			    $stmt->bindParam(':lname',$lname);
			    $stmt->bindParam(':gender',$gender);
			    $stmt->bindParam(':birth',$birth);
				$stmt->bindParam(':date',$date);
				$stmt->bindParam(':dateexit',$dateexit);
				$stmt->bindParam(':photo',$photo);
			    $stmt->bindParam(':mothername',$mothername);
			    $stmt->bindParam(':grandmothername',$grandmothername);
				$stmt->bindParam(':sub_city',$sub_city);
				$stmt->bindParam(':woreda',$woreda);
			    $stmt->bindParam(':kebele',$kebele);
			    $stmt->bindParam(':contact',$contact);
			    $stmt->bindParam(':email',$email);
				$stmt->bindParam(':house_status',$house_status);
				$stmt->bindParam(':marital_status',$marital_status);
				$stmt->bindParam(':income',$income);
			    $stmt->bindParam(':income_source',$income_source);
			    $stmt->execute();

				$stmt_delete = $DB_con->prepare('DELETE FROM resident WHERE resident_id= :resident_id');
				$stmt_delete->bindParam(':resident_id',$resident_id);
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
