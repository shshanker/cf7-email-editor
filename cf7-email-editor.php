<?php

/*
 * Plugin Name:       CF7 E-mail Editor
 * Description:       Enable WYSIWYG editor to the Contact Form 7 e-mail body. 
 * Version:           1.0.0
 * Author:            Shshanker
 * Text Domain:       zgf-social-share
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

				include_once 'includes/cf7ee-backend.php';

				// Scripts
				add_action( 'admin_enqueue_scripts', array( $this, 'Wp_floating_social_share_scripts' ));
				
			} // end of contructor

			
			public function Wp_floating_social_share_scripts(){
				// loading plugin custom js file
						wp_register_script( 'acf7ee-script', ACF7EE_PLUGIN_URL.'/js/scripts.js', array('jquery'), '1.0.0', true );
						wp_enqueue_script( 'acf7ee-script' );
						/*wp_register_script( 'acf7ee-tiny', '//cdn.tinymce.com/4/tinymce.min.js', array('jquery'), '1.0.0', true );
						wp_enqueue_script( 'acf7ee-tiny' );
						*/

						/*wp_register_script( 'acf7ee-tiny', 'http://202.166.207.19/c/shshanker/aankha/wp-includes/js/tinymce/wp-tinymce.php?c=1&amp;ver=4208-20151113' );
						wp_enqueue_script( 'acf7ee-tiny' );*/
						//wp_enqueue_script( 'acf7ee-theme', 'http://202.166.207.19/c/shshanker/aankha/wp-includes/js/tinymce/themes/simple/editor_template.js' );
						

						//wp_enqueue_script('tiny_mce');
			}
			
			public function cf7_email_editor_activate() {		 
			   	 
			    // Clear the permalinks after the post type has been registered
			    flush_rewrite_rules();
			 
			} // end of cf7_email_editor_activate
			

			public function cf7_email_editor_deactivation() {
			    // Clear the permalinks to remove our post type's rules
			    flush_rewrite_rules();
			 
			} // end of cf7_email_editor_deactivation

			

	} // end of class

	$cf7_email_editor = new cf7_email_editor();
} 