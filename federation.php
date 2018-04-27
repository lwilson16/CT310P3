<?php
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
}
?>
