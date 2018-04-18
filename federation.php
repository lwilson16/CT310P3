<?php
class Controller_Federation extends Controller{
  public function action_status(){
	$object = new stdClass();
	$object->status = 'closed';
	$object_JSON = Format::forge($object)->to_json();
	return $object_JSON;
  }
  public function action_allstatus(){
	  $content = View::forge('federations/allstatus');  
		return $content;
  }
}
?>
