<?php	
session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('../../controller/db.php');

class App_acc
{

	private $acc_id;
	private $app_id;
	private $user_name;
	private $password;
	private $user_type;
	//static $DB_con;

	public function update($app_id,$user_name, $password)
	{
		try{
		$DB_con = connect();
		$stmt_update = $DB_con->prepare('UPDATE app_acc SET user_name=:username, password=:password  where app_id = :appid');
		$stmt_update->bindParam(':username',$user_name);
		$stmt_update->bindParam(':password',$password);
		$stmt_update->bindParam(':appid',$app_id);
		$stmt_update->execute();
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
		return 'User account updated successfully!';
	}

	public function login($user_name, $password)
	{

		try{
		$DB_con = connect();
		$stmt = $DB_con->prepare('select * from app_acc where user_name= :un and password= :up');
	    $stmt->bindParam(':un',$user_name);
	    $stmt->bindParam(':up',$password);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0)
		{
			$user_type=$row['user_type'];
			$app_id=$row['acc_id'];
			$applicant_id=$row['applicant_id'];
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
            try
            {
				$_SESSION["user_name"]=$user_name;
				$_SESSION["password"]=$password;
				$_SESSION["user_type"]=$user_type;
				$_SESSION["app_id"]=$app_id;
				$_SESSION["applicant_id"]=$applicant_id;

            }catch(Exception $ex2)
            {
                echo $ex2->getMessage();
            }
            
			header('location: ../../pages/applicant/applicant.php');
 
		}else
		{
			//echo $user_name."   ".$password;
			header("Location: ../../loginerror.php");
			//echo "UNABLE";
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
}				 
?>
