<?php	

function connect2()
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
 }		

 ///echo connect();	 
?>
