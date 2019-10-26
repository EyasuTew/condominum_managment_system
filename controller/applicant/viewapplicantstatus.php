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
	                            <th>Applicant id</th>
	                            <th>R.date</th>
	                            <th>R. turn</th>
	                            <th>Payment</th>
	                            <th>H. price</th>
	                            <th>H. type</th>
	                            <th>Status</th>
	                            <th>Bedroom</th>
	                            <th>Pre payment</th>
	                            <th>M. payment</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead><tbody>';
                                    /*

`applicant`(`applicant_id`, `resident_id`, `total_income`, `date`, `registration_turn`, `sacc_id`, `payment_status`, `rest_time`, `monthly_payment`, `pre_payment`, `house_type`, `bead_room`, `house_price`, `status`, `ai_id`)
*/
$stmt1 = $DB_con->prepare('SELECT * FROM applicant ORDER BY status'); //ORDER BY news_id DESC limit 1
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
	$applicant_id=$row1['applicant_id'];
	$date=$row1['date'];
	$turn=$row1['registration_turn'];
	$payment_status=$row1['payment_status'];
	$house_price=$row1['house_price'];
	$house_type=$row1['house_type'];
	$bead_room=$row1['bead_room'];
	$pre_payment=$row1['pre_payment'];
	$monthly_payment=$row1['monthly_payment'];
	$status=$row1['status'];
	echo '<tr class="">
	    <td>'.$applicant_id.'</td>
	    <td>'.$date.'</td>
	    <td>'.$turn.'</td>
	    <td>'.$payment_status.'</td>
	    <td>'.$house_price.'</td>
	    <td>'.$status.'</td>
	    <td>'.$house_type.'</td>
	    <td>'.$bead_room.'</td>
	    <td>'.$pre_payment.'</td>
	    <td>'.$monthly_payment.'</td>
	    <td><a href="../../controller/house/updateblock.php?id='.$applicant_id.'" class="btn btn-warning btn-xs "><span class="glyphicon glyphicon-edit"></span></a>
			<a href="deleteblock.php?id='.$applicant_id.'" class="btn btn-danger btn-xs delete-object"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr>';

	}

	echo '</tbody>
       </table>
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