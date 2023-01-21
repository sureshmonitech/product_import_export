<?php

namespace Inc\Pages;
/*
*
*/
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;    
    public $pages = array();
    public $subpages = array();
    public $callbacks;
    /*
   public function __construct()
   {
          

   }
   */
     public function register()
    {             
      $this->settings=new SettingsApi();

      $this->callbacks=new AdminCallbacks();

      $this->setPages();
      $this->setSubpages();


      $this->setSettings();
      
      $this->setSections();
      $this->setFields();

      $this->settings->addPages( $this->pages )->withSubPage( 'dashboard' )->addSubPages($this->subpages)->register();      

    }
    public function setPages()
    {
      $this->pages=array(
  
        array(
        'page_title'=>'productimportexport plugin',
        'menu_title'=>'product import',
        'capability'=>'manage_options',
        'menu_slug'=>'productimportexport_plugin',
        'callback'=>array($this->callbacks,'adminDashboard'),
        'icon_url'=>'dashicons-admin-generic',         
        'position'=>6
        ),        
      ); 

    }

    public function setSubpages(){

      $this->subpages=array(
        array(
  
            'parent_slug'=>'productimportexport_plugin',
            'page_title'=>'custom post type',
            'menu_title'=>'CBT',
            'capability'=>'manage_options',
            'menu_slug'=>'productimport_cbt',
            'callback'=>array($this->callbacks,'adminCpt'),            
        ),
  
        array(
          'parent_slug'=>'productimportexport_plugin',
          'page_title'=>'custom taxonomy',
          'menu_title'=>'taxonomy',
          'capability'=>'manage_options',
          'menu_slug'=>'productimport_taxonomy',
          'callback'=>array($this->callbacks,'adminTaxonomy')           
      ),
      array(
        'parent_slug'=>'productimportexport_plugin',
        'page_title'=>'custom widgets',
        'menu_title'=>'widgets',
        'capability'=>'manage_options',
        'menu_slug'=>'productimport_widgets',
        'callback'=>array($this->callbacks,'adminWidget')          
        ),
        );     
  

    }
    public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'alecadddOptionsGroup' )
			),
			array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'first_name'
      ),
      array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'last_name'
			),
      array(
				'option_group' => 'alecaddd_options_group',
				'option_name' => 'courses'
			)

		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'alecaddd_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'alecadddAdminSection' ),
				'page' => 'productimportexport_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'alecadddTextExample' ),
				'page' => 'productimportexport_plugin',
				'section' => 'alecaddd_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'alecadddFirstName' ),
				'page' => 'productimportexport_plugin',
				'section' => 'alecaddd_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
        ),
        array(
          'id' => 'last_name',
          'title' => 'Last Name',
          'callback' => array( $this->callbacks, 'alecadddLastName' ),
          'page' => 'productimportexport_plugin',
          'section' => 'alecaddd_admin_index',
          'args' => array(
            'label_for' => 'last_name',
            'class' => 'example-class'
          )
          ),
          array(
            'id' => 'course',
            'title' => 'Course',
            'callback' => array( $this->callbacks, 'alecadddCourse' ),
            'page' => 'productimportexport_plugin',
            'section' => 'alecaddd_admin_index',
            'args' => array(
              'label_for' => 'course',
              'class' => 'example-class'
            )
            ),

		);

		$this->settings->setFields( $args );
	}
/*
    function add_admin_pages(){
        add_menu_page('productimportexport plugin','product import','manage_options','productimportexport_plugin.php',array($this,'admin_index'),'dashicons-admin-generic',6);
        //add_menu_page('productimport plugin','Product import','manage_options','example.php','admin_index', 'dashicons-tickets', 6 );
          
    }    
    
        function admin_index()
            {                
              //require_once $baseapi->plugin_path . 'templates\admin.php';
              require_once plugin_dir_path( dirname(__FILE__, 2 )) . 'templates\admin.php';

            }
*/
}