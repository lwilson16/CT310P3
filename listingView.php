<html>
<title></title>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	
	<div class='attrPic container text-center'>

	<img src= "<?='/~' .$eid. "/ct310/index.php/federation/attrimage" . '/' .$id?>"/>
	 			
	</div>
	
	<div class="desc containter text-center">

	</div>

<script>
var id = '<?php echo $id ?>';
var eid = '<?php echo $eid ?>';
//make an ajax call to attractions api, for eid and passing id inside 
$.get( "/~" + eid + "/ct310/index.php/federation/attraction" + '/' + id, function ( data ) {
	//alert(data);
	document.title = data.name;
	$( ".desc" )
	  .append( "<h3>" + data.name + "</h3>" + "<br />") 
	  .append(data.desc) 
}, "json" );
</script>	  

<div>

</div>




</body>





</html>

