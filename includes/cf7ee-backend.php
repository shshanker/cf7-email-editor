<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * cf7ee_backend
 *
 * Enable WYSIWYG editor to the Contact Form 7 e-mail body.
 *
 * @class   cf7ee_backend 
 */


class cf7ee_backend {

	/**
	 * Init and hook in the integration.
	 *
	 * @return void
	 */


	public function __construct() {
		$this->id                 = 'cf7ee_backend';
		$this->method_title       = __( 'CF7 email editor backend', 'cf7ee' );
		$this->method_description = __( 'CF7 email editor backend', 'cf7ee' );

		// Get the necessary scripts to launch tinymce
		
		add_action('admin_enqueue_scripts', array($this, 'cf7ee_enqueue_scripts_backend') );
		add_action( 'wp_print_footer_scripts', array( '_WP_Editors', 'editor_js' ), 50 );
		add_action( 'wp_print_footer_scripts', array( '_WP_Editors', 'enqueue_scripts' ), 1 );	

		add_action('admin_init', array($this, 'cf7ee_js_wp_editor'));
	}

	


	public function cf7ee_enqueue_scripts_backend(){

		wp_register_style('tinymce_css', includes_url('css/editor.css'));
		wp_enqueue_style('tinymce_css');
		
	}

	public function cf7ee_js_wp_editor( $settings = array() ) {
	if ( ! class_exists( '_WP_Editors' ) )
		require( ABSPATH . WPINC . '/class-wp-editor.php' );
		
		$set = _WP_Editors::parse_settings( 'apid', $settings );
		$set['textarea_rows'] = '50';			
		_WP_Editors::editor_settings( 'apid', $set );
}
	
}

$cf7ee_backend = new cf7ee_backend();