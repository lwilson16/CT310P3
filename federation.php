
<?php
use Model\florida;
class Controller_Federation extends Controller{
 public function action_status(){
	
	$object = new stdClass();
	$object->status = 'closed';
	$object_JSON = Format::forge($object)->to_json();
	$response = Response::forge($object_JSON);
	$response->set_header('Content-Type', 'application/json');
	return $response;
  }
  public function action_allstatus(){
	  $content = View::forge('federations/allstatus');  
		return $content;
  }
  
  public function action_listing(){
  $listingName = new florida();
  $attractions = Florida::getAttraction();
  
  //loop through attractions
  $listings = "";
  $listingsArr = [];
  for($x=0;$x<sizeof($attractions);$x++){
	 $obj= new stdClass();
	
	 $obj->id = $attractions[$x]['attractionID'];
	 $obj->name = $attractions[$x]['attractionName'];
	$obj->state='Florida';
	 
	 //$object_JSON = Format::forge($obj)->to_json();
	 
	 //$listings. = $object_JSON;
	 array_push ($listingsArr, $obj); 
	  
  }
  
  $object_JSON = Format::forge($listingsArr)->to_json();
  //append attractins as a string 
  $response = Response::forge($object_JSON);
	$response->set_header('Content-Type', 'application/json');
	return $response;
  }

}
?>
