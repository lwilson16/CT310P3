<html>

<title> Other Team Attractions </title>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<div class="container">
		<h3> Other Team Attractions </h3>
	<p id="response">
	
	</p>
	</div>
<script>
function getWebDataJSON(site){
	if(jQuery.type(site) === "object"){
		$(site).each(function(index, value){
			console.log(value.id);
			$('<a>').attr('href', 'cs.colostate.edu/~lwilson1/ct310/index.php/Florida/getListing/' + value.id).appendTo("response")
		});
	}

	
}
$.get("/~ct310/yr2018sp/master.json", function(data){
	$(data).each(function(index, value){
		var eid = value.eid;
		if( eid != ""){
		
		$.get("/~" + eid + "/ct310/index.php/federation/status",  function(response, textStatus, xhr){	
				console.log(xhr.status);
				//console.log(eid);	
				//Checking the variable type
				if(jQuery.type(response) === "object"){
				
					if(response.status == "open"){
						$.get("/~" + eid + "/ct310/index.php/federation/listing",  function(site, textStatus, xhr){
							getWebDataJSON(site);
						});
					}					

				
				}
				else{
					if (jQuery.type(response)==="string"){
						try{
							response = JSON.parse(response);
						}
						catch(err){
							$('<p>').attr('id', 'closed').text("ERROR").appendTo('#response');
						}

						if(response.status == "open"){
							$.get("/~" + eid + "/ct310/index.php/federation/listing",  function(site, textStatus, xhr){
								getWebDataJSON(site);
							});
						}
				
					}

			}				
		});
	}
	})	
})
</script>
</body>
</html>
