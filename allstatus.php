<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<script>
	$.get("/~ct310/yr2018sp/master.json", function(data){
		//var response = JSON.parse(data);
		console.log(data[0]);
	});
</script>
</body>
</html>
