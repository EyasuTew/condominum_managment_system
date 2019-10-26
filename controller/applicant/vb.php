			$("#housetypeselect").change(function(event){
			         			//$("#searchdisplaydiv").empty();
			         			var searchElement = document.getElementById("housetypeselect");

			         			var housetype = $("#housetypeselect").val();
								if(housetype_validator(housetype) && (housetype!=""))
								{
									document.getElementById("housetypediv").className="form-group has-success";
									document.getElementById("housetype_validation_feedback").innerHTML='';
								}else if(housetype=="")
								{
									document.getElementById("housetypediv").className="form-group has-error";
									document.getElementById("housetype_validation_feedback").innerHTML="<b><p style="color:red;">Select one</p></b>";
									searchElement.focus();
								}
								else
								{
									document.getElementById("housetypediv").className="form-group has-error";
									document.getElementById("housetype_validation_feedback").innerHTML="<b><p style="color:red;">Select one</p></b>";
									searchElement.focus();
								}
			         	});

			         	$("#bedroomselect").change(function(event){
			         			//$("#searchdisplaydiv").empty();
			         			var searchElement = document.getElementById("bedroomselect");

			         			var bedroom = $("#bedroomselect").val();
								if(bedroom_validator(bedroom) && (bedroom!=""))
								{
									document.getElementById("bedroomdiv").className="form-group has-success";
									document.getElementById("bedroom_validation_feedback").innerHTML="";
								}else if(bedroom=="")
								{
									document.getElementById("bedroomdiv").className="form-group has-error";
									document.getElementById("bedroom_validation_feedback").innerHTML="<b><p style='color:red;'>Select one</p></b>";
									searchElement.focus();
								}
								else
								{
									document.getElementById("bedroomdiv").className="form-group has-error";
									document.getElementById("bedroom_validation_feedback").innerHTML="<b><p style="color:red;">Select one</p></b>";
									searchElement.focus();
								}
			         	});
					});