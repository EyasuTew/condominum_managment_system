<?php
session_start();
include_once("../db.php");
include_once("../validator.php");
//include_once(?../../class/news.php?);
$DB_con = connect();
//GETING POSTED VALUE FROM BUILTIN POST ARRAY
/*$title=$_POST["newstitle"];
$newspart=$_POST["newspart"];
$newsmedia=$_FILES["newsmedia"];*/
$block_id=$_POST["block_id"];
                                    
	$stmt1 = $DB_con->prepare("SELECT * FROM block WHERE block_id=:block_id");
	$stmt1->bindParam(':block_id',$block_id);
	$stmt1->execute();
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);

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


	echo'<form class="form-horizontal">
	<center></br>
		<p class="actiontitel">Update Block</p></br></hr>
	</center>

	<div class="form-group" id="blockiddiv">
		<label class="control-label col-xs-4" for="blockidtxt">Block id:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$block_id.'" class="form-control" id="blockidtxt" name="blockidtxt" placeholder="Block id" disabled>
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="blockmodel_validation_feedback"></div>
	</div>

	<div class="form-group" id="blockmodeldiv">
		<label class="control-label col-xs-4" for="blockmodeltxt">Block model:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$model.'" class="form-control" id="blockmodeltxt" name="blockmodeltxt" placeholder="Block mode">
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="blockmodel_validation_feedback"></div>
	</div>

	<div class="form-group" id="sitenamediv">
		<label class="control-label col-xs-4" for="sitenametxt">Site name:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$sitename.'" class="form-control" id="sitenametxt" name="sitenametxt" placeholder="Site name">
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="sitename_validation_feedback"></div>
	</div>

	<div class="form-group" id="floornumberdiv">
		<label class="control-label col-xs-4" for="floornumbertxt">Floor number:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$nofloor.'" class="form-control" id="floornumbertxt" name="floornumbertxt" placeholder="Floor number">
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="floornumber_validation_feedback"></div>
	</div>

	<div class="form-group" id="roomnumberdiv">
		<label class="control-label col-xs-4" for="roomnumbertxt">Room number:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$noroom.'" class="form-control" id="roomnumbertxt" name="roomnumbertxt" placeholder="Room number">
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="roomnumber_validation_feedback"></div>
	</div>

	<div class="form-group" id="housenumberdiv">
		<label class="control-label col-xs-4" for="housenumbertxt">House number:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$nohouse.'" class="form-control" id="housenumbertxt" name="housenumbertxt" placeholder="House number">
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="housenumber_validation_feedback"></div>
	</div>

	<div class="form-group" id="shopenumberdiv">
		<label class="control-label col-xs-4" for="shopenumbertxt">Shope number:</label>
		<div class="col-xs-7">
			<input type="text" value="'.$noshope.'" class="form-control" id="shopenumbertxt" name="shopenumbertxt" placeholder="Shope number">
		</div>
		<div class="col-xs-1"></div>
		<div class="valid-feedback col-md-offset-5 col-xs-6" id="shopenumber_validation_feedback"></div>
	</div>

	<div class="form-group" id="projecttypediv">
            <label class="control-label col-xs-4">Project type:</label>
            <div class="col-xs-7">
                <select value="'.$projecttype.'" class="form-control" id="projecttypeselect">
                	<option value="no" selected id="default">Select one</option>
                    <option value="10/90">10/90</option>
                    <option value="20/80">20/80</option>
                    <option value="40/60">40/60 </option>
                </select>
            </div>

            <div class="col-xs-1"></div>
			<div class="valid-feedback col-md-offset-5 col-xs-6" id="projecttype_validation_feedback"></div>
        </div>

     <div class="form-group" id="blocktypediv">
            <label class="control-label col-xs-4">Block type:</label>
            <div class="col-xs-7">
                <select value="'.$type.'" class="form-control" id="blocktypeselect">
                	<option value="no" selected id="default">Select one</option>
                    <option value="studio">Studio</option>
                    <option value="1bedroom">1 Bedroom</option>
                    <option value="2bedroom">2 Bedroom</option>
                    <option value="3bedroom">3 Bedroom</option>
                </select>
            </div>

            <div class="col-xs-1"></div>
			<div class="valid-feedback col-md-offset-5 col-xs-6" id="blocktype_validation_feedback"></div>
        </div>

		<br>
		<div class="form-group">
			<div class="col-xs-offset-3 col-xs-8">
				<div class="col-xs-6">
					<input type="button" class="btn btn-primary  btn-block" id="savebtn" name="savebtn" value="Save">
				</div>
				<div class="col-xs-"></div>
				<div class="col-xs-6">
					<!--<input type="button" class="btn btn-danger  btn-block" id="cancelbtn" name="cancelbtn" value="Cancel" >-->

					<a href="../../pages/manager/blockview.php" class="btn btn-danger btn-block delete-object">Cancel</a>
				</div>
			</div>
			</br>
	    </div>
	    <div class=" col-xs-12" id="resultdiv">
	    	 <!--form ajax-->
	    </div>
	</form>

	<script type = "text/javascript" language = "javascript">
         $(document).ready(function() {

		document.getElementById("blocktypeselect").value="'.$type.'";
		document.getElementById("projecttypeselect").value="'.$projecttype.'";

         	$("#blockmodeltxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("blockmodeltxt");

         			var blockmodel = $("#blockmodeltxt").val();
    					if(blockmodel_validator(blockmodel) && (blockmodel!=""))
    					{
    						document.getElementById("blockmodeldiv").className="form-group has-success";
    						document.getElementById("blockmodel_validation_feedback").innerHTML="";
    					}else if(blockmodel=="")
    					{
    						document.getElementById("blockmodeldiv").className="form-group has-error";
    						document.getElementById("blockmodel_validation_feedback").innerHTML="<b><p style=color:red;>Empty block model</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("blockmodeldiv").className="form-group has-error";
    						document.getElementById("blockmodel_validation_feedback").innerHTML="<b><p style=color:red;>Invalid block model</p></b>";
    						searchElement.focus();
    					}
         	});

         	$("#sitenametxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("sitenametxt");

         			var sitename = $("#sitenametxt").val();
    					if(sitename_validator(sitename) && (sitename!=""))
    					{
    						document.getElementById("sitenamediv").className="form-group has-success";
    						document.getElementById("sitename_validation_feedback").innerHTML="";
    					}else if(sitename=="")
    					{
    						document.getElementById("sitenamediv").className="form-group has-error";
    						document.getElementById("sitename_validation_feedback").innerHTML="<b><p style=color:red;>Empty site name</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("sitenamediv").className="form-group has-error";
    						document.getElementById("sitename_validation_feedback").innerHTML="<b><p style=color:red;>Invalid site name</p></b>";
    						searchElement.focus();
    					}
         	});

         	$("#floornumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("floornumbertxt");

         			var floornumber= $("#floornumbertxt").val();
    					if(floornumber_validator(floornumber) && (floornumber!=""))
    					{
    						document.getElementById("floornumberdiv").className="form-group has-success";
    						document.getElementById("floornumber_validation_feedback").innerHTML="";
    					}else if(floornumber=="")
    					{
    						document.getElementById("floornumberdiv").className="form-group has-error";
    						document.getElementById("floornumber_validation_feedback").innerHTML="<b><p style=color:red;>Empty floor number</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("floornumberdiv").className="form-group has-error";
    						document.getElementById("floornumber_validation_feedback").innerHTML="<b><p style=color:red;>Invalid floor number</p></b>";
    						searchElement.focus();
    					}
         	});

         	 $("#roomnumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("roomnumbertxt");

         			var roomnumber = $("#roomnumbertxt").val();
    					if(roomnumber_validator(roomnumber) && (roomnumber!=""))
    					{
    						document.getElementById("roomnumberdiv").className="form-group has-success";
    						document.getElementById("roomnumber_validation_feedback").innerHTML="";
    					}else if(roomnumber=="")
    					{
    						document.getElementById("roomnumberdiv").className="form-group has-error";
    						document.getElementById("roomnumber_validation_feedback").innerHTML="<b><p style=color:red;>Empty room number</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("roomnumberdiv").className="form-group has-error";
    						document.getElementById("roomnumber_validation_feedback").innerHTML="<b><p style=color:red;>Invalid room number</p></b>";
    						searchElement.focus();
    					}
         	});

         	$("#housenumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("housenumbertxt");

         			var housenumber = $("#housenumbertxt").val();
    					if(housenumber_validator(housenumber) && (housenumber!=""))
    					{
    						document.getElementById("housenumberdiv").className="form-group has-success";
    						document.getElementById("housenumber_validation_feedback").innerHTML="";
    					}else if(housenumber=="")
    					{
    						document.getElementById("housenumberdiv").className="form-group has-error";
    						document.getElementById("housenumber_validation_feedback").innerHTML="<b><p style=color:red;>Empty house number</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("housenumberdiv").className="form-group has-error";
    						document.getElementById("housenumber_validation_feedback").innerHTML="<b><p style=color:red;>Invalid house number</p></b>";
    						searchElement.focus();
    					}
         	});

         	$("#projecttypeselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("projecttypeselect");

         			var projecttype = $("#projecttypeselect").val();
    					if(projecttype_validator(projecttype) && (projecttype!=""))
    					{
    						document.getElementById("projecttypediv").className="form-group has-success";
    						document.getElementById("projecttype_validation_feedback").innerHTML="";
    					}else if(projecttype=="")
    					{
    						document.getElementById("projecttypediv").className="form-group has-error";
    						document.getElementById("projecttype_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("projecttypediv").className="form-group has-error";
    						document.getElementById("projecttype_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
    						searchElement.focus();
    					}
         	});

         	$("#blocktypeselect").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("blocktypeselect");

         			var blocktype = $("#projecttypeselect").val();
    					if(blocktype_validator(blocktype) && (blocktype!=""))
    					{
    						document.getElementById("blocktypediv").className="form-group has-success";
    						document.getElementById("blocktype_validation_feedback").innerHTML="";
    					}else if(blocktype=="")
    					{
    						document.getElementById("blocktypediv").className="form-group has-error";
    						document.getElementById("blocktype_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
    						searchElement.focus();
    					}
    					else
    					{
    						document.getElementById("blocktypediv").className="form-group has-error";
    						document.getElementById("blocktype_validation_feedback").innerHTML="<b><p style=color:red;>Select one</p></b>";
    						searchElement.focus();
    					}
         	});

         	$("#shopenumbertxt").change(function(event){
         			//$("#searchdisplaydiv").empty();
         			var searchElement = document.getElementById("shopenumbertxt");

         			var shopenumber = $("#shopenumbertxt").val();
    					if(shopenumber_validator(shopenumber) && (shopenumber!=""))
    					{
    						document.getElementById("shopenumberdiv").className="form-group has-success";
    						document.getElementById("shopenumber_validation_feedback").innerHTML="";
    					}else if(shopenumber=="")
    					{
    						document.getElementById("shopenumberdiv").className="form-group has-success";
    						document.getElementById("shopenumber_validation_feedback").innerHTML="<b><p style=color:red;>Empity shope number</p></b>";

    					}
    					else
    					{
    						document.getElementById("shopenumberdiv").className="form-group has-error";
    						document.getElementById("shopenumber_validation_feedback").innerHTML="<b><p style=color:red;>Invalid shope number</p></b>";
    						searchElement.focus();
    					}
         	});


            $("#savebtn").click(function(event){
            	var blockid=$("#blockidtxt").val();
            	var blockmodel=$("#blockmodeltxt").val();
            	var sitename=$("#sitenametxt").val();
            	var floornumber=$("#floornumbertxt").val();
            	var roomnumber=$("#roomnumbertxt").val();
            	var housenumber=$("#housenumbertxt").val();
            	var shopenumber=$("#shopenumbertxt").val();
            	var projecttype=$("#projecttypeselect").val();
            	var blocktype=$("#blocktypeselect").val();

      				$("#blockmodeltxt").trigger("change");
      				$("#sitenametxt").trigger("change");
      				$("#floornumbertxt").trigger("change");
      				$("#roomnumbertxt").trigger("change");
      				$("#housenumbertxt").trigger("change");
      				$("#shopenumbertxt").trigger("change");
      				$("#projecttypeselect").trigger("change");
      				$("#blocktypeselect").trigger("change");

      				if(blockmodel_validator(blockmodel) &&sitename_validator(sitename) && floornumber_validator(floornumber) && housenumber_validator(housenumber) &&shopenumber_validator(shopenumber) && projecttype_validator(projecttype) && blocktype_validator(blocktype))
      				{
      					$("#resultdiv").load("../../controller/house/updateblock2.php", {"block_id":blockid,"blockmodel":blockmodel,"sitename":sitename,"floornumber":floornumber,"housenumber":housenumber,"shopenumber":shopenumber,"roomnumber":roomnumber, "projecttype":projecttype, "blocktype":blocktype} );
      				}else
      				{

      				}
				});


        $("#cancelbtn").click(function(event){

        	document.getElementById("blockmodeltxt").value="";
        	document.getElementById("blockmodeldiv").className="form-group";
			document.getElementById("blockmodel_validation_feedback").innerHTML="";

      		document.getElementById("sitenametxt").value="";
            document.getElementById("sitenamediv").className="form-group";
      		document.getElementById("sitename_validation_feedback").innerHTML="";

      		document.getElementById("floornumbertxt").value="";
            document.getElementById("floornumberdiv").className="form-group";
      		document.getElementById("floornumber_validation_feedback").innerHTML="";

      		document.getElementById("roomnumbertxt").value="";
            document.getElementById("roomnumberdiv").className="form-group";
      		document.getElementById("roomnumber_validation_feedback").innerHTML="";

      		document.getElementById("housenumbertxt").value="";
            document.getElementById("housenumberdiv").className="form-group";
      		document.getElementById("housenumber_validation_feedback").innerHTML="";

      		document.getElementById("shopenumbertxt").value="";
            document.getElementById("shopenumberdiv").className="form-group";
      		document.getElementById("shopenumber_validation_feedback").innerHTML="";

      		document.getElementById("projecttypeselect").value="no";
            document.getElementById("projecttypediv").className="form-group";
      		document.getElementById("projecttype_validation_feedback").innerHTML="";

      		document.getElementById("blocktypeselect").value="no";
            document.getElementById("blocktypediv").className="form-group";
      		document.getElementById("blocktype_validation_feedback").innerHTML="";

      				$.ajax( {
							url:"viewblock.php",
							success:function(data) {
							
							}
						});
				});
			});
     </script>?;';

?>
