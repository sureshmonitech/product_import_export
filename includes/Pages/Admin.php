<?php

namespace Inc\Pages;
/*
*
*/
use \Inc\Base\BaseController;
class Admin extends BaseController
{
   
     public function register()
    {
        add_action('admin_menu',array($this,'add_admin_pages'));
    }

    function add_admin_pages(){
        add_menu_page('productimportexport plugin','product import','manage_options','productimportexport_plugin.php',array($this,'admin_index'),'dashicons-admin-generic',6);
        //add_menu_page('productimport plugin','Product import','manage_options','example.php','admin_index', 'dashicons-tickets', 6 );
          
    }    
    
        function admin_index()
            {
            require_once $this->plugin_path .'templates/admin.php';
            }

}