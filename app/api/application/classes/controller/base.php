<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class
 */
abstract class Controller_Base extends Controller_Template {


    public function before() {
        parent::before();

        //open app_server_config file
        $config = Kohana::config('app_server_config');

        // config data
        $site_name = $config->site_name;

        // Include styles and scripts 
        $this->template->styles = array();
        $this->template->scripts = array();
        
        // Include blocks
        $this->template->block_left = null;
        $this->template->block_center = null;
        $this->template->block_right = null;
    }
}