<?php
session_start();
include_once('../db.php');
include_once('../validator.php');
//include_once('../../class/news.php');
$DB_con = connect();
//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/

//`action_id`, `emp_id`, `app_id`, `action`, `date`
   echo'<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                DataTables Advanced Tables
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	                    <thead>
	                        <tr>
	                            <th>Audit id</th>
	                            <th>Employee id</th>
	                            <th>Applicant id</th>
	                            <th>Date</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead><tbody>';
                                    //`action_id`, `emp_id`, `app_id`, `action`, `date`
$stmt1 = $DB_con->prepare('SELECT * FROM audit ORDER BY action_id DESC');//ASC
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
	$action_id=$row1['action_id'];
	$emp_id=$row1['emp_id'];
	$app_id=$row1['app_id'];
	$date=$row1['date'];
	$action=$row1['action'];
	if($action=="Delete")
	{
		$color="#B61F0D";
		$action=$action."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}else if($action=="Update")
	{
		$color="#C19811";
		$action=$action."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}else if($action=="Recivepayment")
	{
		$color="#C19811";
		$action=$action."&nbsp;";
	}else if($action=="Register")
	{
		$color="#0C561E";
		$action=$action."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}else
	{
		$color="#fff";
	}
	echo '<tr class="">
		    <td>'.$action_id.'</td>
		    <td>'.$emp_id.'</td>
		    <td>'.$app_id.'</td>
		    <td>'.$date.'</td>
		    <td><span style="color:white; background-color:'.$color.'">'.$action.'</span></td>
		 </tr>';

	}

	echo '</tbody>
       </table><span class="label lable-danger" >'.$action.'</span>
     </div>
    </div>
   </div>

    <script src="../../js/vendor/jquery/jquery.min.js"></script>
    <script src="../../js/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../js/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../js/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../js/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
    $(document).ready(function() {
        $("#dataTables-example").DataTable({
            responsive: true
        });
    });
    </script>';


	
?>