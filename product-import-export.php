<?php

/*
plugin name:product-import-export
plugin URL:http://product-import-export.com/plugin
description:this is first plugin for import and export
version:1.0.0
Author:suresh selvaraj
Author URI:www.monitecheducation.com
Test Domain: product-import-export 

*/


defined('ABSPATH') or die(" Hi this plugin can not be access ");

if(file_exists(dirname( __FILE__ ) . '/vendor/autoload.php'))
{
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_product_import_export_plugin(){
	Activate::activate();
}
register_activation_hook(__FILE__,'activate_product_import_export_plugin');

function deactivate_product_import_export_plugin(){
	Deactivate::deactivate();
}
register_deactivation_hook(__FILE__,'deactivate_product_import_export_plugin');

 //define('PLUGIN_PATH',plugin_dir_path( __FILE__ ));
 //define('PLUGIN_URL',plugin_dir_url( __FILE__ ));
 //define('PLUGIN',plugin_basename(__FILE__));

 

 if(class_exists('Inc\\Init'))
 {
	Inc\Init::register_services();
 }

