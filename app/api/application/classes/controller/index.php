<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Client API
 */
class Controller_Index extends Controller_Base {
   //Welcome to API
    public function action_index(){
        print_r("<h1 style='color:red;text-align:center;'>Welcome to WEB API</h1>");	 
	}
}