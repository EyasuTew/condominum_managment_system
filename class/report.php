<?php	
//session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('../../controller/account/db.php');

class Report
{
	private $report_id;
	private $emp_id;
	private $date;

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
}				 
?>
