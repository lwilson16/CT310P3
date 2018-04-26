<html>
	<style>
	
	#response1{
	color: green;
	}
	</style>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div>
		<p id="response">
		Print response here
		</p>
	</div>
<script>
	$.get("/~ct310/yr2018sp/master.json", function(data){
		//var response = JSON.parse(data);
		//console.log(data);
		for(i = 0; i < data.length; i++){
			var eid = data[i].eid;
			console.log(eid);
			$.get("/~" + eid + "/ct310/index.php/federation/status", function(response){	
				console.log(response);
				//Checking the variable type
				if (jQuery.type(response)==="string"){
				response = JSON.parse(response);
				//$('#response').append(response.status);
				$('<p>').attr('id', 'response1').text(response.status).appendTo('#response');
			}else {
				//$('#response').append(response.status);
				$('<p>').attr('id', 'response1').text(response.status).appendTo('#response');
				
			}
				//changing the color of the responses 
				//open is green
				//closed in yellow
				//need to put the response.status inside a paragraph tag and change its color
				//$('#response').append('<p id="response1"></p>');
				//$('<p>').attr('id', 'response1').appendTo('#response');
				
			});
		}	
	});
</script>
</body>
</html>
