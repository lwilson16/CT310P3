<html>
<title></title>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
	<div class="desc">
	</div>
	<div class="name">
	</div>
<script>

var id = '<?php echo $id ?>';

var eid = '<?php echo $eid ?>';

//make an ajax call to attractions api, for eid and passing id inside 
$.get( "/~" + eid + "/ct310/index.php/federation/attraction" + '/' + id, function ( data ) {
	//alert(data);
	$( ".desc" )
	  .append( "Name: " + data.name ) 
	  .append( "Description: " + data.desc ) 
}, "json" );
</script>	  

<div>

<img src= "<?='/~' .$eid. "/ct310/index.php/federation/attrimage" . '/' .$id?>"/>

</div>




</body>





</html>
