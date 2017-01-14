<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Client API
 */
class Controller_Index_Users extends Controller_Index {
   public function action_index(){ 
       echo "Hello";
       $users=Model::factory('users')->all_users();
      //print_r(json_encode($users));
   }
}