<?php	
//session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('../../controller/db.php');

class Emp_acc
{

	private $acc_id;
	private $emp_id;
	private $user_name;
	private $password;
	private $user_type;
	//static $DB_con;

	public function create($emp_id, $user_name, $password,$user_type)
	{
		try{
			$DB_con = connect();
			$stmt2 = $DB_con->prepare('select * from employee where emp_id= :empid');
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
			$emp_id=$row['emp_id'];
			$session_id=$user_name."".$password;
			setcookie("sessionId",$session_id,time()+120*60*24*7,"/","",0);
            
			$stmt3 = $DB_con->prepare('select * from session where session_id= :session_id');
			$stmt3->bindParam(':session_id',$session_id);
			$stmt3->execute();
			$row=$stmt3->fetch(PDO::FETCH_ASSOC);
			if($stmt3->rowCount() > 0)
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
			$_SESSION["emp_id"]=$emp_id;
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
            if($user_type=="Admin")
            {
                header("Location: ../../pages/admin/admin.php");
            }else if($user_type=="BSC")
			{
				header('location: ../../pages/empbsc/empbsc.php');
			}
			else if($user_type=="CBE")
			{
				header('location: ../../pages/empcbe/empcbe.php');
			}
			else if($user_type=="MG")
			{
				header('location: ../../pages/manager/manager.php');
			}
			else
			{

			}
		    
		}else
		{
			//echo "Username:".$user_name."   password".$password;
			header("Location: ../../loginerror.php");
			/*echo "</br></br></br></br></br></br></br></br></br></br></br>";
			echo $password;
			echo "</br>";
			echo md5(123456);
			echo "</br>";
			echo md5("123456");*/
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
	}
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
}				 
?>
