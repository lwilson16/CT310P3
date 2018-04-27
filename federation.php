<?php
use Model\florida;
class Controller_Federation extends Controller{

 public function action_status(){
	
	$object = new stdClass();
	$object->status = 'open';
	$object_JSON = Format::forge($object)->to_json();
	$response = Response::forge($object_JSON);
	$response->set_header('Content-Type', 'application/json');
	return $response;
 }

  public function action_allstatus(){
	  $content = View::forge('federations/allstatus');  
		return $content;
  }

  public function action_attraction($attractionID){
	$object = new stdClass();
        $Florida = new florida();
       
	$attraction = Florida::selectAttraction($attractionID);
	//print(gettype($attraction));
	//print_r($attraction[0]);
	$object->id = $attraction[0]['attractionID'];
	$object->name = $attraction[0]['attractionName'];
	$object->desc = $attraction[0]['description'];
	$object->state = 'Florida';

	$object_JSON = Format::forge($object)->to_json();
	$response = Response::forge($object_JSON);
	$response->set_header('Content-Type', 'application/json');
	return $response;
			
  }

  public function action_attrimage($attractionID){
	  $Florida = new florida();
	  $attraction = Florida::selectAttraction($attractionID);
	  //print_r($attraction[0]['picture'])
	  $array = explode ('/', $attraction[0]['picture']);
	  //print_r($array);
	  $response = Response::forge(file_get_contents(Asset::get_file($array[2], 'img')));
	  $response->set_header('Content-Type', 'image/jpeg');
	  return $response;
  }

}
?>
