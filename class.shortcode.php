<?php

/**
*
*	Draws the shorcode component used for Aesop Story Engine
* 	Note: components in shortcode form not required see class.front-end.php
*
*/
class aesopScrollitSC {

	// the shortcode HAS to start with aesop_
	function __construct(){
		add_shortcode('aesop_scrollit', 			array($this, 'shortcode') );
	}

	/**
	*
	*	Components are shortcodes
	*
	*
	*/
	function shortcode( $atts, $content = null ) {

		$defaults = array(
			'img' 	=> '',
			'align' => 'left'
		);

		$atts 	= shortcode_atts($defaults, $atts);

		// account for multiple instances of this component
		static $instance = 0;
		$instance++;
		$unique = sprintf('aesop-scrollit-%s-%s',get_the_ID(), $instance);

		// if lasso is active we need to map the sc atts as data-attributes
		if ( function_exists( 'lasso_editor_components' ) ) {

			$options = function_exists('aesop_component_data_atts') ? aesop_component_data_atts('aesop_scrollit', $unique, $atts) : false;

		} else {

			$options = false;

		}

		$align = !empty( $atts['align'] ) ? sprintf('aesop-scrollit--align-%s', sanitize_html_class( $atts['align'] ) ) : 'aesop-scrollit--align-left';

		ob_start(); ?>

		<div id="<?php echo $unique;?>" class="aesop-component aesop-scrollit <?php echo $align;?>" <?php echo $options;?>>

			<div class="aesop-scrollit--content">
				<span>
					<?php echo do_shortcode( wpautop( html_entity_decode( $content ) ) );?>
				</span>
			</div>

			<div class="aesop-scrollit--img" style="background-image:url( <?php echo esc_url( $atts['img'] );?> );?>"></div>
		</div>

		<?php return ob_get_clean();
	}
}
new aesopScrollitSC;