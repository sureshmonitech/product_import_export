<?php

namespace Inc;

final class Init
{
    public static function get_services()
    {
  return [
			Pages\Admin::class,
           	Base\Enqueue::class,
			Base\SettingsLinks::class

		];
    }
	   public static function register_services()
    {
        //add_action('admin_menu',array($this,'add_admin_pages'));
        foreach(self::get_services() as $key=>$class)
        {
			
            $service=self::instantiate($class);
            if(method_exists($service,'register'))
            {
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        $service=new $class();
        return $service;
    }
   

}
/* 
use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

class Product_Import_Export 
{
	public $plugin;
	function __construct()
	{
		$this->plugin=plugin_basename(__FILE__);
	//add_action('init',array($this,'custom_post_type'));
     //$this->create_post_type();
	}
	 function register()
	{
		add_action('admin_enqueue_scripts',array($this,'enqueue'));
		add_action('admin_menu',array($this,'add_admin_pages'));
		
		add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
		
	}
  	public function settings_link($links)
	{
		//$settings_link='<a href="options-general.php?page=productimportexport_plugin.php">Settings</a>';
		$settings_link='<a href="admin.php?page=productimportexport_plugin.php">Settings</a>';
		array_push($links,$settings_link);
		return $links;
	}
	function add_admin_pages(){
	add_menu_page('productimportexport plugin','product import','manage_options','productimportexport_plugin.php',array($this,'admin_index'),'dashicons-admin-generic',6);
	//add_menu_page('productimport plugin','Product import','manage_options','example.php','admin_index', 'dashicons-tickets', 6 );
	


}

	//function add_admin_pages() {
	//	add_menu_page( 'My Top Level Menu Example', 'productimport', 
		//   'manage_options', 'example.php', 'myplguin_admin_page', 'dashicons-tickets', 6 );
	//}


	function admin_index()
		{
        require_once plugin_dir_path(__FILE__).'templates/admin.php';
		}
	protected function create_post_type()
	{
		add_action('init',array($this,'custom_post_type'));
	}

	function uninstall()
	{
//delete cpt
//delete all plugin data from db
	}

	function custom_post_type()
	{
      register_post_type('book',['public'=>true,'label'=>'Books']);
	}
	function enqueue()
	{
		wp_enqueue_style('mypluginstyle',plugins_url('/assets/style.css', __FILE__));
		wp_enqueue_script('mypluginscript',plugins_url('/assets/myscript.js', __FILE__));
	}
function activate(){
	//require_once plugin_dir_path(__FILE__) .'includes/productimportexportactivation.php';
	Activate::activate();

}
	//add_action('init',custom_post_type);
}
if(class_exists('Product_Import_Export'))
{
$productimportexport=new Product_Import_Export();
$productimportexport->register();
}

//activation

//register_activation_hook( __FILE__, array('productimportexportactivation','activate'));


//deactivation
//require_once plugin_dir_path(__FILE__) .'includes/productimportexportdeactivation.php';
register_deactivation_hook( __FILE__, array('Deactivate','deactivate'));
//uninstall

//register_uninstall_hook(__FILE__,array($productimportexport,'uninstall'));
*/
