<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Woo Floating cf7ee_backend
 *
 * Allows user to get WooCommerce Floating cf7ee_backend.
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
		$baseurl = includes_url( 'js/tinymce' );
		$cssurl = includes_url('css/');

		global $tinymce_version, $concatenate_scripts, $compress_scripts;

		$version = 'ver=' . $tinymce_version;
		$css = $cssurl . 'editor.css';


		add_action('admin_enqueue_scripts', array($this, 'cf7_enqueue_scripts_backend') );
		add_action( 'wp_print_footer_scripts', array( '_WP_Editors', 'editor_js' ), 50 );
		add_action( 'wp_print_footer_scripts', array( '_WP_Editors', 'enqueue_scripts' ), 1 );	

		add_action('admin_footer', array($this, 'cf7ee_print_footer_scripts'));

		add_action('wpcf7_save_contact_form', array($this, 'cf7ee_wpcf7_save_contact_form'), 1); 
		
		
	}

	


	public function cf7_enqueue_scripts_backend(){
		$cssurl = includes_url('css/');
		$css = $cssurl . 'editor.css';
		wp_register_style('tinymce_css', $css);
		wp_enqueue_style('tinymce_css');

	}

	public function cf7ee_print_footer_scripts(){
		// Get the necessary scripts to launch tinymce
		$baseurl = includes_url( 'js/tinymce' );
		$cssurl = includes_url('css/');

		global $tinymce_version, $concatenate_scripts, $compress_scripts;

		$version = 'ver=' . $tinymce_version;
		$css = $cssurl . 'editor.css';

		$compressed = $compress_scripts && $concatenate_scripts && isset($_SERVER['HTTP_ACCEPT_ENCODING'])
		    && false !== stripos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip');

		if ( $compressed ) {
		    echo "<script type='text/javascript' src='{$baseurl}/wp-tinymce.php?c=1&amp;$version'></script>\n";
		} else {
		    echo "<script type='text/javascript' src='{$baseurl}/tinymce.min.js?$version'></script>\n";
		    echo "<script type='text/javascript' src='{$baseurl}/plugins/compat3x/plugin.min.js?$version'></script>\n";
		    echo "<script type='text/javascript' src='{ACF7EE_BASE_DIR}/includes/mce/table/plugin.min.js?$version'></script>\n";
		}

	}

	public function cf7ee_wpcf7_save_contact_form($WPCF7_ContactForm){
		
			$default_use_html = $WPCF7_ContactForm->prop('mail');
			$default_use_html['use_html'] = true;

			return $WPCF7_ContactForm;
		
			}


	
}

$cf7ee_backend = new cf7ee_backend();