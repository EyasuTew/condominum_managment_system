<?php

include_once('db.php');
class News
{
	private $news_id;//*
	private $emp_id; ///
	private $title;
	private $date; //*
	private $content_id;//*

	function post($news_id, $emp_id, $title, $date, $content_id)
	{
		try{
			$DB_con = connect();
			$stmt = $DB_con->prepare('INSERT INTO news(emp_id, title, date, content_id) VALUES (:emp_id,:title,:date,:content_id)');
			$stmt->bindParam(':emp_id',$emp_id);
			$stmt->bindParam(':title',$title);
			$stmt->bindParam(':date',$date);
			$stmt->bindParam(':content_id',$content_id);
			if($stmt->execute())
			{
				return "ye";
			}else
			{
				return "no";
			}
		}catch(Exception $ex)
		{
			return $ex->getMessage();
		}
	}

	function edit($title, $date)
	{
		
	}

	function delete($news_id)
	{
		try{
				$DB_con = connect2();
				$stmt_delete1 = $DB_con->prepare('DELETE FROM news WHERE news_id= :news_id');
				$stmt_delete1->bindParam(':news_id',$news_id);

				if($stmt_delete1->execute())
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

	function view()
	{

	}

}
?>