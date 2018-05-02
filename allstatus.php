<html>

<style>
body{
	background-color: grey !important;
}
	
#open{
	color: green;
}

#closed{
	color: red;
	
}
	
#noResponse{
	color: yellow;
}
	
</style>

<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>  All Status </h1>
		</div>
		<p id="response">
		</p>
	</div>
<script>
$.get("/~ct310/yr2018sp/master.json", function(data){
	$(data).each(function(index, value){
		console.log(value);
		var eid = value.eid;
		if( eid == ""){
			$('<p>').attr('id', 'noResponse').text("404 Server error: " + " " + "team: " + value.team ).appendTo('#response');

		}
	$.get("/~" + eid + "/ct310/index.php/federation/status",  function(response, textStatus, xhr){	
				console.log(xhr.status);
				//console.log(eid);	
				//Checking the variable type
				if(jQuery.type(response) === "object"){
				
					if(response.status == "open"){

						$('<p>').attr('id', 'open').text("nameShort: " + value.nameShort + " " + "nameLong: " + value.nameLong + " "+  response.status).appendTo('#response');
					}

					else if(response.status == "closed"){

						$('<p>').attr('id', 'closed').text("nameShort: " + value.nameShort + " " + "nameLong: " + value.nameLong + " "+  response.status).appendTo('#response');

					}


				
				}
				else{
					if (jQuery.type(response)==="string"){
						try{
							response = JSON.parse(response);
						}
						catch(err){
							$('<p>').attr('id', 'noResponse').text("nameShort: " + value.nameShort + " " + "nameLong: " + value.nameLong + " " + "ERROR: Not JSON object OR JSON String" ).appendTo('#response');
						}
						if(response.status == "open"){
							$('<p>').attr('id', 'open').text("nameShort: " + value.nameShort + " " + "nameLong: " + value.nameLong + " "+  response.status).appendTo('#response');
						}
						else if(response.status == "closed"){

							$('<p>').attr('id', 'closed').text("nameShort: " + value.nameShort + " " + "nameLong: " + value.nameLong + " "+  response.status).appendTo('#response');
						}
				
					}

			}				
		});
	})	
})
</script>
</body>
</html>
