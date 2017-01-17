<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Client API
 */
class Controller_Index_User extends Controller_Index {
   public function action_index(){ 
			//database methods   	
     /*  $users=Model::factory('users')->all_users();
       for ($i=0;$i<count($users);$i++){
      		print_r(json_encode($users[$i]["login"]));
    	}
    	echo "<br>";
    	print_r($users[0]["name"]);*/
    	//ORM methods
		$users=ORM::factory('user')->find_all();
			$users_all=array();
      		for ($i=0;$i<count($users);$i++){
				$id=$users[$i]->id;   
				$login=$users[$i]->login; 
				$name=$users[$i]->name; 
				$arr=array($id,$login,$name);
				array_push($users_all, $arr);
    		}	
			echo json_encode($users_all);	
   }
}