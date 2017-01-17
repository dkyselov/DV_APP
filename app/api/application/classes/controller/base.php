<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class API 
 */
 class Controller_Base extends Controller{
    //Config variable
    protected $config;
    protected $site_name, $site_description,$copyright;
    //initial to brauser
    public function  before() {
        parent::before();

        if(Request::current()->is_initial())
        {
            $this->auto_render = FALSE;
			
        }
    }
    public function action_config() {
        //open app_server_config file
        $config = Kohana::config('app_server_config');
        // config data
        $this->site_name = $config->site_name;
        $this->site_description = $config->site_description;
        $this->copyright = $config->copyright;
        // Include styles and scripts 
       /* $this->template->styles = array();
        $this->template->scripts = array();
        // Include blocks
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;*/
    }
}