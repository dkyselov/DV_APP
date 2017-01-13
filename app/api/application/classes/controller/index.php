<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Index Pages
 */
 
class Controller_Index extends Controller_Base {
    public function action_index(){
        print_r("<h1 style='color:red;text-align:center;'>Welcome to WEB API</h1>");	 
	}
    public function action_config(){
        
        parent::action_index();
        $config=array(
            array(
           "site_name" => $this->site_name,
           "site_description" => $this->site_description,
           "copyright" => $this->copyright,
            )
        );
        print_r(json_encode( $config));
    }
}