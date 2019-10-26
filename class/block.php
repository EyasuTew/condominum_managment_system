<?php
//session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

//require_once('../../controller/db.php');
/*

Block block_id model type projec_type site_name no_floor no_room bno no_house no_shope register()update()delete()view()

*/
class Block
{

	private $block_id;
	private $model;
	private $type;
	private $projec_type;
	private $site_name;
	private $no_floor;
	private $no_room;
	private $bno;
	private $no_house;
	private $no_shope;
	//static $DB_con;

	public function register($blockmodel,$sitename,$floornumber,$roomnumber,$housenumber,$shopenumber,$projecttype,$blocktype,$bno)
	{
		try{
					$DB_con = connect();
					$stmt = $DB_con->prepare('INSERT INTO block(model, type, project_type, site_name, no_floor, no_room, bno, no_house, no_shop) VALUES(:model, :type, :project_type, :site_name, :no_floor, :no_room, :bno, :no_house, :no_shope)');
					$stmt->bindParam(':model',$blockmodel);
					$stmt->bindParam(':site_name',$sitename);
					$stmt->bindParam(':type',$blocktype);
				  	$stmt->bindParam(':project_type',$projecttype);
				  	$stmt->bindParam(':no_floor',$floornumber);
					$stmt->bindParam(':no_room',$roomnumber);
					$stmt->bindParam(':bno',$bno);
					$stmt->bindParam(':no_house',$housenumber);
					$stmt->bindParam(':no_shope',$shopenumber);

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
	
	public function update($block_id,$blockmodel,$sitename,$floornumber,$roomnumber,$housenumber,$shopenumber,$projecttype,$blocktype)
	{
		try{
			$DB_con = connect();
			$stmt_update = $DB_con->prepare('UPDATE block SET model=:model, type=:type, project_type=:project_type, site_name=:site_name, no_floor=:no_floor, no_room=:no_room, no_house=:no_house, no_shop=:no_shop WHERE block_id=:block_id');
			$stmt_update->bindParam(':model',$blockmodel);
			$stmt_update->bindParam(':type',$blocktype);
			$stmt_update->bindParam(':project_type',$projecttype);
			$stmt_update->bindParam(':site_name',$sitename);
			$stmt_update->bindParam(':no_floor',$floornumber);
			$stmt_update->bindParam(':no_room',$roomnumber);
			//$stmt_update->bindParam(':bno',$bno);
			$stmt_update->bindParam(':no_house',$housenumber);
			$stmt_update->bindParam(':no_shop',$shopenumber);
			$stmt_update->bindParam(':block_id',$block_id);

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
	public function view($user_name, $password)
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
			else if($user_type=="APP")
			{

			}else
			{

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


}
?>
