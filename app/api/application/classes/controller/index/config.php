<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Client API
 */
class Controller_Index_Config extends Controller_Index {
   public function action_index(){ 
       parent::action_index();
   }
    //Configuration data
    public function action_config(){ 
        parent::action_config();
        $config=array(
            array(
                "site_name" => $this->site_name,
                "site_description" => $this->site_description,
                "copyright" => $this->copyright,
            )
        );
            print_r(json_encode($config));
    }
}