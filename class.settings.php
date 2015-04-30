<?php

/**
*
*	This class is responsible for creating custom options used by both Aesop Story Engine and Lasso
*
*/
class aesopScrollitSettings {

	function __construct(){

		// if you arent using Lasso then this filter isnt needed
		add_filter('lasso_custom_options',		array($this,'options'));

		// if you arent using aesop story engine then this filter isnt needed
		add_filter('aesop_avail_components',	array($this, 'options') );
	}
	/**
	*
	*	This adds our options into the generator for both Lasso and Aesop Story Engine
	*
	*/
	function options($shortcodes) {

		$custom = array(
			'scrollit' 						=> array(
				'name' 					=> 'Scrollit', // name of the component
				'type' 					=> 'wrap', // single - wrap
				'atts' 					=> array(
					'img'    => array(
						'type'  => 'media_upload',
						'default'  => '',
						'desc'   => __( 'Image', 'aesop-core' ),
						'tip'  => __( 'Upload a background image for this component.', 'aesop-core' )
					)
				),
				'content' => ''
			)
		);


		return array_merge( $shortcodes, $custom );

	}
}
new aesopScrollitSettings;







