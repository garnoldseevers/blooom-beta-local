<?php
/*
Plugin Name: 	Carousel Slider
Plugin URI: 	http://wordpress.org/plugins/carousel-slider
Description: 	Touch enabled WordPress plugin that lets you create beautiful responsive carousel slider.
Version: 		1.5.3
Author: 		Sayful Islam
Author URI: 	http://sayfulit.com
Text Domain: 	carousel-slider
Domain Path: 	/languages/
License: 		GPLv2 or later
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( ! class_exists('Carousel_Slider') ):

class Carousel_Slider
{
	private $plugin_name;
	private $plugin_version;
	private $plugin_url;
	private $plugin_path;

	public function __construct()
	{
		$this->plugin_name = 'carousel-slider';
		$this->plugin_version = '1.5.3';

		add_action('wp_enqueue_scripts', array( $this, 'frontend_scripts' ), 15 );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 10 );
		add_action('wp_footer', array( $this, 'inline_script'), 30);
		add_action('init', array( $this, 'load_textdomain' ) );
		add_filter('widget_text', 'do_shortcode');
		$this->includes();
	}

	public function load_textdomain()
	{
		// Set filter for plugin's languages directory
		$shaplatools_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';

		// Traditional WordPress plugin locale filter
		$locale        = apply_filters( 'plugin_locale',  get_locale(), 'carousel-slider' );
		$mofile        = sprintf( '%1$s-%2$s.mo', 'carousel-slider', $locale );

		// Setup paths to current locale file
		$mofile_local  = $shaplatools_lang_dir . $mofile;
		$mofile_global = WP_LANG_DIR . '/carousel-slider/' . $mofile;

		if ( file_exists( $mofile_global ) ) {
			// Look in global /wp-content/languages/carousel-slider folder
			load_textdomain( $this->plugin_name, $mofile_global );
		} elseif ( file_exists( $mofile_local ) ) {
			// Look in local /wp-content/plugins/carousel-slider/languages/ folder
			load_textdomain( $this->plugin_name, $mofile_local );
		} else {
			// Load the default language files
			load_plugin_textdomain( $this->plugin_name, false, $shaplatools_lang_dir );
		}
	}

	public function includes()
	{
		if ( is_admin() ) {
			$this->admin_includes();
		}
		if ( ! is_admin() ) {
			$this->frontend_includes();
		}

		require_once $this->plugin_path() . '/widgets/widget-carousel_slider.php';
	}

	public function admin_includes()
	{
		require_once $this->plugin_path() . '/includes/Carousel_Slider_VC_Element.php';
		require_once $this->plugin_path() . '/includes/Carousel_Slider_Documentation.php';
		require_once $this->plugin_path() . '/includes/Carousel_Slider_Meta_Box.php';
		require_once $this->plugin_path() . '/includes/Carousel_Slider_Admin.php';

		new Carousel_Slider_Admin;
	}

	public function frontend_includes()
	{
		require_once $this->plugin_path() . '/shortcodes/Carousel_Slider_Shortcode.php';

		new Carousel_Slider_Shortcode( $this->plugin_path(), $this->plugin_url() );
	}

	public function frontend_scripts()
	{
		wp_register_style( $this->plugin_name, $this->plugin_url() . '/assets/css/style.css', array(), $this->plugin_version, 'all' );
		wp_register_script( 'owl-carousel', $this->plugin_url() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );

		if( $this->has_shortcode('carousel_slide') || $this->has_shortcode( 'carousel') )
		{
			wp_enqueue_style( $this->plugin_name );
			wp_enqueue_script( 'owl-carousel' );
		}
	}

	public function admin_scripts()
	{
        global $post;
        
		wp_enqueue_style(
			$this->plugin_name . '-admin',
			$this->plugin_url() . '/assets/css/admin.css',
			array(),
			$this->plugin_version,
			'all'
		);

        if( is_a( $post, 'WP_Post' ) && isset( $post->ID ) ) {

	        wp_enqueue_media();
	        wp_enqueue_style( 'wp-color-picker' );
	        wp_enqueue_script( 'wp-color-picker' );

			wp_enqueue_script(
				$this->plugin_name . '-admin',
				$this->plugin_url() . '/assets/js/admin.js',
				array( 'jquery', 'wp-color-picker' ),
				$this->plugin_version,
				true
			);
        	
            wp_localize_script( $this->plugin_name . '-admin', 'wpdh_ajax', array(
                'post_id' 			=> $post->ID,
                'image_ids' 		=> get_post_meta( $post->ID, '_wpdh_image_ids', true ),
                'nonce' 			=> wp_create_nonce( 'wpdh-ajax' ),
                'create_btn_text' 	=> __('Create Gallery', 'carousel-slider'),
                'edit_btn_text' 	=> __('Edit Gallery', 'carousel-slider'),
                'save_btn_text' 	=> __('Save Gallery', 'carousel-slider'),
                'progress_btn_text' => __('Saving...', 'carousel-slider'),
            ) );
        }
	}

	public function inline_script()
	{
		if( $this->has_shortcode('carousel_slide') || $this->has_shortcode( 'carousel') ):
		?><script type="text/javascript">
		    jQuery( document ).ready(function( $ ){
		        $( 'body' ).find('.carousel-slider').each(function(){
		            var _this = $(this);
		            _this.owlCarousel({
		                nav: _this.data('nav'),
		                dots: _this.data('dots'),
		                margin: _this.data('margin'),
		                loop: _this.data('loop'),
		                autoplay: _this.data('autoplay'),
		                autoplayTimeout: _this.data('autoplay-timeout'),
		                autoplaySpeed: _this.data('autoplay-speed'),
		                autoplayHoverPause: _this.data('autoplay-hover-pause'),
		                slideBy: _this.data('slide-by'),
		                lazyLoad: _this.data('lazy-load'),
		                responsive: {
	                        320:{ items: _this.data('colums-mobile') },
	                        600:{ items: _this.data('colums-tablet') },
	                        768:{ items: _this.data('colums-small-desktop') },
	                        980:{ items: _this.data('colums-desktop') },
	                        1200:{items: _this.data('colums') }
		                }
		            });
		        });
		    });
		</script><?php
		endif;
	}

	private function has_shortcode( $shortcode )
	{
		global $post;

		if ( is_active_widget( false, false, 'widget_carousel_slider', true ) ) {
			return true;
		}

		if ( ! is_a( $post, 'WP_Post' ) ) {
			return false;
		}

		if ( ! has_shortcode( $post->post_content, $shortcode) ) {
			return false;
		}

		return true;
	}

	/**
	 * Plugin path.
	 *
	 * @return string Plugin path
	 */
	private function plugin_path() {
		if ( $this->plugin_path ) return $this->plugin_path;

		return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Plugin url.
	 *
	 * @return string Plugin url
	 */
	private function plugin_url() {
		if ( $this->plugin_url ) return $this->plugin_url;
		return $this->plugin_url = untrailingslashit( plugins_url( '/', __FILE__ ) );
	}
}

endif;

/**
 * The code that runs during plugin activation.
 * The code that runs during plugin deactivation.
 */
function carousel_slider_activation_deactivation() {
	flush_rewrite_rules();;
}
register_activation_hook( __FILE__, 'carousel_slider_activation_deactivation' );
register_deactivation_hook( __FILE__, 'carousel_slider_activation_deactivation' );

/**
 * Begins execution of the plugin.
 */
function run_carousel_slider() {
	new Carousel_Slider();
}
run_carousel_slider();
