<?php	
/*nclude_once('../../class/emp_acc.php');
$emp_acc_obj=new Emp_acc();
	$emp_acc_obj->logout();
	unset($emp_acc_obj);	*/
       session_start();
       setcookie("sessionId","",time()-60,"/","",0);
        //session_destroy();
        unset($_SESSION["user_name"]);
        unset($_SESSION["password"]);
        unset($_SESSION["user_type"]);
        header("Location: ../../index.php");
?>
