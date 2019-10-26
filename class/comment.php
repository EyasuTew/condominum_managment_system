<?php	
//session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('../../controller/db.php');

class Commnet
{/*Comment com_id app_id date content write()edit()delete()view()*/

	private $com_id;
	private $app_id;
	private $date;
	private $contenet;

	public function write($applicant_id, $date, $content_id)
	{
		try{
			$DB_con = connect();
			$stmt = $DB_con->prepare('INSERT INTO comment(applicant_id,date,content) VALUES(:applicant_id, :date, :contenet)');
			$stmt->bindParam(':applicant_id',$applicant_id);
			$stmt->bindParam(':date',$date);
			$stmt->bindParam(':contenet',$content_id);
			if($stmt->execute())
			{
			 	return 'ye';
			 	//header("Location: ../../pages/applicant/comment.php");
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
	public function edit($com_id, $date)
	{
		try{
		$DB_con = connect();
		$stmt_update = $DB_con->prepare('UPDATE comment SET date=:date where com_id=:com_id');
		$stmt_update->bindParam(':date',$user_name);
		$stmt_update->bindParam(':com_id',$com_id);
		//$stmt_update->execute();
		if($stmt_update->execute())
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
		return 'no';
	}
	public function delete($com_id)
	{
		try{
			$DB_con = connect();
			$stmt_delete = $DB_con->prepare('DELETE FROM comment WHERE com_id= :com_id');
			$stmt_delete->bindParam(':com_id',$com_id);
			if($stmt_delete->execute())
			{
				return "ye";
			}else
			{
				return "un";
			}
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
		return "no";
	}
	public function login($user_name, $password)
	{
		echo $password;
		//echo "</br>";

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
