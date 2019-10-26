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
	                            <th>Block id</th>
	                            <th>Block no.</th>
	                            <th>Model</th>
	                            <th>Project type</th>
	                            <th>Block type</th>
	                            <th>Site name</th>
	                            <th>No. Floor</th>
	                            <th>No. Room</th>
	                            <th>No. House </th>
	                            <th>No. Shope</th>
	                            <th>No. Assigned</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead><tbody>';
                                    
$stmt1 = $DB_con->prepare('SELECT * FROM block WHERE 1');
$stmt1->execute();
while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
	$block_id=$row1['block_id'];
	$model=$row1['model'];
	$type=$row1['type'];
	$projecttype=$row1['project_type'];
	$sitename=$row1['site_name'];
	$nofloor=$row1['no_floor'];
	$noroom=$row1['no_room'];
	$bno=$row1['bno'];
	$nohouse=$row1['no_house'];
	$noshope=$row1['no_shop'];
	$noassigned=$row1['no_assigned'];

	echo '<tr class="">
	    <td>'.$block_id.'</td>
	    <td>'.$bno.'</td>
	    <td>'.$model.'</td>
	    <td>'.$projecttype.'</td>
	    <td>'.$type.'</td>
	    <td>'.$sitename.'</td>
	    <td>'.$nofloor.'</td>
	    <td>'.$noroom.'</td>
	    <td>'.$nohouse.'</td>
	    <td>'.$noshope.'</td>
	    <td>'.$noassigned.'</td>
	    <td><a href="../../controller/house/updateblock.php?id='.$block_id.'" class="btn btn-warning btn-xs "><span class="glyphicon glyphicon-edit"></span></a>
			<a href="deleteblock.php?id='.$block_id.'" class="btn btn-danger btn-xs delete-object"><span class="glyphicon glyphicon-remove"></span></a></td>
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