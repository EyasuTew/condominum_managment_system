<?php	
//session_start();
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('../../controller/db.php');

class Audit
{

	private $action_id;
	private $emp_id;
	private $app_id;
	private $action;
	private $date;

	public function save($emp_id, $app_id, $action, $date)
	{
		try{
			$DB_con = connect();
			$stmt = $DB_con->prepare('INSERT INTO audit(emp_id, app_id, action, date) VALUES( :emp_id, :app_id, :action, :date)');
			$stmt->bindParam(':emp_id',$emp_id);
			$stmt->bindParam(':app_id',$app_id);
			$stmt->bindParam(':action',$action);
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

	public function view($search)
	{
		if($search=="all")
		{

		}
		{
			$stmt = $DB_con->prepare('SELECT * FROM audit WHERE action_id= :action_id');
		    $stmt->bindParam(':action_id',$action_id);
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				return 'found';
			}else
			{

			}
		}
	}
}				 
?>
