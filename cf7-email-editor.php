<?php

/*
 * Plugin Name:       CF7 email editor
 * Description:       Enable WYSIWYG editor to the Contact Form 7 e-mail body. 
 * Version:           2.1.0
 * Author:            shivashankerbhatta
 * Text Domain:       acf7ee
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );  // prevent direct access

if ( ! class_exists( 'cf7_email_editor' ) ) {

	class cf7_email_editor {
			public function __construct(){
			
			   register_activation_hook( __FILE__, array( $this, 'cf7_email_editor_activate') );
			   register_deactivation_hook( __FILE__, array( $this, 'cf7_email_editor_deactivation') );
						
			   defined( 'ACF7EE_BASE_FILE' ) or define( 'ACF7EE_BASE_FILE', __FILE__ );			
			   defined( 'ACF7EE_BASE_DIR' ) or define( 'ACF7EE_BASE_DIR', dirname( ACF7EE_BASE_FILE ) );		
			   defined( 'ACF7EE_PLUGIN_URL' ) or define( 'ACF7EE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			
				// Scripts
				add_action( 'admin_enqueue_scripts', array( $this, 'cf7_email_editor_scripts' ));
				
			} // end of contructor

			
			public function cf7_email_editor_scripts(){
						
						wp_enqueue_script('jquery');
						wp_enqueue_script( 'tinymce_js', includes_url( 'js/tinymce/' ) . 'wp-tinymce.php', array( 'jquery' ), false, true );

						wp_register_script( 'acf7ee-init-script', ACF7EE_PLUGIN_URL.'js/scripts.js', array('tinymce_js'), '1.0.0', true );
						wp_enqueue_script( 'acf7ee-init-script' );

						wp_register_style('tinymce_css', includes_url('css/editor.css'));
						wp_enqueue_style('tinymce_css');
						
			}
			
			public function cf7_email_editor_activate() {		 
			   	 
			  
			    flush_rewrite_rules();
			 
			} // end of cf7_email_editor_activate
			

			public function cf7_email_editor_deactivation() {
			    
			    flush_rewrite_rules();
			 
			} // end of cf7_email_editor_deactivation

			

	} // end of class

	$cf7_email_editor = new cf7_email_editor();
} 