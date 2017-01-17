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
    	$p=ORM::factory('user');
			$p->id=3;
			$p->name='Vasia';
			$p->login='vasia93';
			$p->save();
   }
}