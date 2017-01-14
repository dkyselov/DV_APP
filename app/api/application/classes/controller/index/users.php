<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Client API
 */
class Controller_Index_Users extends Controller_Index {
   public function action_index(){ 
       $users=Model::factory('users')->all_users();
       for ($i=0;$i<count($users);$i++){
      		print_r(json_encode($users[$i]["login"]));
    	}
    	echo "<br>";
    	print_r($users[0]["name"]);
   }
}