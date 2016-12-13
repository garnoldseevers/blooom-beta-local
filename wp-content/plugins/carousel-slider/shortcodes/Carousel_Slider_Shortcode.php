<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( ! class_exists('Carousel_Slider_Shortcode') ):

class Carousel_Slider_Shortcode
{
	private $plugin_path;
	private $plugin_url;

	public function __construct( $plugin_path, $plugin_url )
	{
		$this->plugin_path = $plugin_path;
		$this->plugin_url = $plugin_url;

		add_shortcode('carousel_slide', array( $this, 'carousel_slide' ) );
		add_shortcode('carousel', array( $this, 'carousel' ) );
		add_shortcode('item', array( $this, 'item' ) );
	}

	/**
	 * A shortcode for rendering the carousel slide.
	 *
	 * @param  array   $attributes  Shortcode attributes.
	 * @param  string  $content     The text content for shortcode. Not used.
	 *
	 * @return string  The shortcode output
	 */
	public function carousel_slide( $attributes, $content = null )
	{
		extract(
			shortcode_atts(
				array( 'id' =>'' ),
				$attributes
			)
		);
		if ( ! $id ) return;
		$images_ids = array_filter( explode( ',', get_post_meta( $id, '_wpdh_image_ids', true ) ) );
		if (count( $images_ids ) < 1 ) {
			return;
		}

		ob_start();
	    require $this->plugin_path . '/templates/carousel_slide.php';
	    $html = ob_get_contents();
	    ob_end_clean();
	 
	    return $html;
	}

	/**
	 * A shortcode for rendering the carousel slide.
	 *
	 * @param  array   $atts  		Shortcode attributes.
	 * @param  string  $content     The text content for shortcode. Not used.
	 *
	 * @return string  The shortcode output
	 */
	public function carousel( $atts, $content = null )
	{
	    extract(shortcode_atts(array(
	        'id'                    => rand(1, 10),
	        'items'                 => '4',
	        'items_desktop'         => '4',
	        'items_desktop_small'   => '3',
	        'items_tablet'          => '2',
	        'items_mobile'          => '1',
	        'auto_play'             => 'true',
	        'stop_on_hover'         => 'true',
	        'navigation'            => 'true',
	        'pagination'            => 'false',
	        'nav_color'             => '#f1f1f1',
	        'nav_active_color'      => '#4caf50',
	        'margin_right'          => '10',
	        'inifnity_loop'         => 'true',
	        'autoplay_timeout'      => '5000',
	        'autoplay_speed'        => '500',
	        'slide_by'              => '1',
	        'lazy_load_image'       => 'true',
	    ), $atts ) );

	    ob_start();
	    require $this->plugin_path . '/templates/carousel.php';
	    $html = ob_get_contents();
	    ob_end_clean();
	 
	    return $html;
	}

	/**
	 * A shortcode for rendering the carousel slide.
	 *
	 * @param  array   $attributes  Shortcode attributes.
	 * @param  string  $content     The text content for shortcode. Not used.
	 *
	 * @return string  The shortcode output
	 */
	public function item( $attributes, $content = null )
	{
		extract(shortcode_atts(array(
	        'img_link' 		=> '',
	        'href' 			=> '',
	        'lazy-load' 	=> '',
	        'target' 		=> '_self',
	    ), $attributes ) );

	    if ($this->is_valid_url($href) && $this->is_valid_url($img_link)) {
	    	
	    	return sprintf('<div><a target="%3$s" href="%2$s"><img class="owl-lazy" data-src="%1$s"></a></div>', $img_link, $href, $target);
	    }

	    if ( $this->is_valid_url($img_link) ) {
	    	
	    	return sprintf('<div><img class="owl-lazy" data-src="%1$s"></div>', $img_link);
	    }

	    return;
	}

	private function carousel_options( $id )
	{
		$options_array = array(
			'id' 							=> 'id-' . $id,
			'class' 						=> 'owl-carousel carousel-slider',
			// General
			'data-margin' 					=> $this->get_meta( $id, '_margin_right' ),
			'data-slide-by' 				=> $this->get_meta( $id, '_slide_by' ),
			'data-loop' 					=> $this->get_meta( $id, '_inifnity_loop' ),
			'data-lazy-load' 				=> $this->get_meta( $id, '_lazy_load_image' ),
			// Navigation
			'data-nav' 						=> $this->get_meta( $id, '_nav_button' ),
			'data-dots' 					=> $this->get_meta( $id, '_dot_nav' ),
			// Autoplay
			'data-autoplay' 				=> $this->get_meta( $id, '_autoplay' ),
			'data-autoplay-timeout' 		=> $this->get_meta( $id, '_autoplay_timeout' ),
			'data-autoplay-speed' 			=> $this->get_meta( $id, '_autoplay_speed' ),
			'data-autoplay-hover-pause' 	=> $this->get_meta( $id, '_autoplay_pause' ),
			// Responsive
			'data-colums' 					=> $this->get_meta( $id, '_items' ),
			'data-colums-desktop' 			=> $this->get_meta( $id, '_items' ),
			'data-colums-small-desktop' 	=> $this->get_meta( $id, '_items_small_desktop' ),
			'data-colums-tablet' 			=> $this->get_meta( $id, '_items_portrait_tablet' ),
			'data-colums-small-tablet' 		=> $this->get_meta( $id, '_items_small_portrait_tablet' ),
			'data-colums-mobile' 			=> $this->get_meta( $id, '_items_portrait_mobile' ),
		);

		return $this->array_to_data( $options_array );
	}

	public function get_meta($id, $key)
	{
		$meta = get_post_meta( $id, $key, true );

		if ($meta == 'zero') { $meta = '0'; }
		if ($meta == 'on') { $meta = 'true'; }
		if ($meta == 'off') { $meta = 'false'; }
		if ($key == '_margin_right' && $meta == 0) { $meta = '0'; }

		return $meta;
	}

	public function array_to_data( $array )
	{

		$array_map = array_map( function( $key, $value )
		{

			if( is_bool( $value ) )
			{
				if ($value) {

					return sprintf( '%s="%s"', $key, 'true' );
				} else {
					
					return sprintf( '%s="%s"', $key, 'false' );
				}
			}

			if ( is_array( $value ) ) {

				return sprintf( '%s="%s"', $key, implode(" ", $value ) );
			}

			return sprintf( '%s="%s"', $key, $value );

		}, array_keys($array), array_values( $array ) );

		return $array_map;
	}

	/**
	 * Check if url is valid as per RFC 2396 Generic Syntax
	 * 
	 * @param  string $url
	 * @return boolean
	 */
	public function is_valid_url( $url )
	{
		if ( filter_var( $url, FILTER_VALIDATE_URL ) ) {

			return true;
		}

		return false;
	}
}

endif;