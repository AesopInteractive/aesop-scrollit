<?php

class aesopScrollitFront {

	function __construct(){

		add_action('lasso_toolbar_components', 	array($this,'components_list'));
		add_filter('lasso_components', 			array($this,'components_available'), 11, 1);

	}

	/**
	*
	*	Add our component to the drop-up list of components
	*
	*	Note: data-type must match the component slug listed above
	*/
	function components_list(){

		?><li data-type="scrollit" title="Scrollit"></li><?php
	}

	/**
	*
	*	First let's wipe out the existing components and replae with our own
	*
	*
	*/
	function components_available($existing){

		$components = array(
			'scrollit' => array(
				'name' => 'Image',
				'content' => self::my_callback()
			)
		);

		return array_merge($existing, $components);

	}


	/**
	*
	*	Create a docs image component
	*	Note: we use aesop-component class so that the user can has controls
	*
	*/
	function my_callback(){

		do_shortcode('[aesop_scrollit]');
	}

}
new aesopScrollitFront;