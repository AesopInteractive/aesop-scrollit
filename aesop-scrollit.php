<?php

/**
*	Plugin Name: Aesop Scrollit
*
*/

class aesopScrollit {

	function __construct(){

		define('AESOP_SCROLLIT_VERSION', '1.0');
		define('AESOP_SCROLLIT_DIR', plugin_dir_path( __FILE__ ));
		define('AESOP_SCROLLIT_URL', plugins_url( '', __FILE__ ));

		require_once(AESOP_SCROLLIT_DIR.'class.shortcode.php');
		require_once(AESOP_SCROLLIT_DIR.'class.settings.php');

		if ( class_exists('Aesop_Core') )
			require_once(AESOP_SCROLLIT_DIR.'class.backend.php');

		// compatibility aesop front end editor
		if ( function_exists( 'lasso_editor_components' ) ) {

			//define('LASSO_CUSTOM', true);
			require_once(AESOP_SCROLLIT_DIR.'class.front-end.php');
		}

		// optional enqueue js or css
		add_action('wp_enqueue_scripts', 		array($this,'scripts'));
	}


	/**
	*
	*	Optional add js or css
	*/
	function scripts(){

		// this handy function checks a post or page to see if your component exists beore enqueueing assets
		if ( function_exists('aesop_component_exists') && aesop_component_exists('scrollit') ) {

			wp_enqueue_style('aesop-scrollit-style', AESOP_SCROLLIT_URL.'/css/aesop-scrollit.css', AESOP_SCROLLIT_VERSION );
			wp_enqueue_script('aesop-scrollit-monitor', AESOP_SCROLLIT_URL.'/js/scroll-monitor.js', array('jquery','ai-core'), AESOP_SCROLLIT_VERSION, true);
			wp_enqueue_script('aesop-scrollit-script', AESOP_SCROLLIT_URL.'/js/aesop-scrollit.js', array('jquery','ai-core','aesop-scrollit-monitor'), AESOP_SCROLLIT_VERSION, true);

		}

	}

}

new aesopScrollit;

