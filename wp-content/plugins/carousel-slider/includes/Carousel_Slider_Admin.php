<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( ! class_exists('Carousel_Slider_Admin') ):

class Carousel_Slider_Admin
{
	public function __construct()
	{
		add_action('init', array( $this, 'carousel_post_type' ) );
		add_action('add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_filter( 'manage_edit-carousels_columns', array( $this, 'columns_head') );
		add_filter( 'manage_carousels_posts_custom_column', array( $this, 'columns_content'), 10, 2 );
		$this->metaboxs();
	}

	public function carousel_post_type() {
		$labels = array(
			'name'                => _x( 'Carousels', 'Post Type General Name', 'carousel-slider' ),
			'singular_name'       => _x( 'Carousel', 'Post Type Singular Name', 'carousel-slider' ),
			'menu_name'           => __( 'Carousels', 'carousel-slider' ),
			'parent_item_colon'   => __( 'Parent Carousel:', 'carousel-slider' ),
			'all_items'           => __( 'All Carousels', 'carousel-slider' ),
			'view_item'           => __( 'View Carousel', 'carousel-slider' ),
			'add_new_item'        => __( 'Add New Carousel', 'carousel-slider' ),
			'add_new'             => __( 'Add New', 'carousel-slider' ),
			'edit_item'           => __( 'Edit Carousel', 'carousel-slider' ),
			'update_item'         => __( 'Update Carousel', 'carousel-slider' ),
			'search_items'        => __( 'Search Carousel', 'carousel-slider' ),
			'not_found'           => __( 'Not found', 'carousel-slider' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'carousel-slider' ),
		);
		$args = array(
			'label'               => __( 'Carousel', 'carousel-slider' ),
			'description'         => __( 'Carousel', 'carousel-slider' ),
			'labels'              => $labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5.55525,
			'menu_icon'           => 'dashicons-slides',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'rewrite'             => false,
			'capability_type'     => 'post',
		);
		register_post_type( 'carousels', $args );
	}

	public function columns_head(){
	    
	    $columns = array(
	        'cb' 		=> '<input type="checkbox">',
	        'title' 	=> __('Carousel Slide Title', 'carousel-slider'),
	        'usage' 	=> __('Shortcode', 'carousel-slider'),
	        'images' 	=> __('Carousel Images', 'carousel-slider')
	    );

	    return $columns;

	}

	public function columns_content($column, $post_id) {
	    switch ($column) {

	        case 'usage':

	            $id = $post_id;

	            if ( !empty($id) ){
	                echo '<pre><code>[carousel_slide id="'.$id.'"]</code></pre>';
	            }

	            break;

	        case 'images':
	        	$image_ids 	= explode(',', get_post_meta( get_the_ID(), '_wpdh_image_ids', true) );
	        	$images ='<ul id="carousel-thumbs" class="carousel-thumbs">';
				foreach ( $image_ids as $image ) {
					if(!$image) continue;
					$src = wp_get_attachment_image_src( $image, array(32,32) );
					$images .= "<li><img src='{$src[0]}' width='{$src[1]}' height='{$src[2]}'></li>";
				}
				$images .= '</ul>';
				echo $images;

	        	break;
	        default :
	            break;
	    }
	}

	public function add_meta_boxes()
	{
	    add_meta_box( 
	    	"carousel-shortcode-info", 
	    	__("Usage (Shortcode)", 'carousel-slider'), 
	    	array( $this, 'render_meta_box_shortcode_info' ),
	    	"carousels",
	    	"side",
	    	"high"
	    );
	}

	public function render_meta_box_shortcode_info()
	{
        ob_start(); ?>
        <p>
        	<strong>
        		<?php _e('Copy the following shortcode and paste in post or page where you want to show.', 'carousel-slider'); ?>
    		</strong>
    	</p>
    	<p>
    		<pre><code>[carousel_slide id="<?php echo get_the_ID(); ?>"]</code></pre>
    	</p>
    	<hr>
    	<p>
    		<?php _e('If you like this plugin or if you make money using this or if you want to help me to continue my contribution on open source projects, consider to make a small donation.', 'carousel-slider'); ?>
    	</p>
    	<p style="text-align: center;">
	        <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3LZWQTHEVYWCY">
	        	<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal Donate">
	        </a>
        </p>
        <?php echo ob_get_clean();
	}

	public function metaboxs()
	{	
		$carousel_metabox = array(
		    'id' 			=> 'metabox-carousel-slide',
		    'title' 		=> __('Images Settings', 'carousel-slider'),
		    'page' 			=> array('carousels'),
		    'context' 		=> 'normal',
		    'priority' 		=> 'high',
		    'fields' 		=> array(
		        array(
		            'id' 	=> '_carousel_images',
		            'type' 	=> 'images',
		            'name' 	=> __('Carousel Images', 'carousel-slider'),
		            'desc' 	=> __('Choose carousel images.', 'carousel-slider'),
		        ),
		        array(
		            'id' 	=> '_image_size',
		            'type' 	=> 'image_sizes',
		            'name' 	=> __('Carousel Image Size', 'carousel-slider'),
		            'desc' 	=> sprintf(__( 'Select "full" for full size image or your desired image size for carousel image. You can change the default size for thumbnail, medium and large from %1$s Settings >> Media %2$s.', 'carousel-slider' ),'<a target="_blank" href="'.get_admin_url().'options-media.php">','</a>'),
		        ),
                array(
		            'id' 	=> '_show_attachment_title',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Show Title', 'carousel-slider'),
		            'label' => __('Show Title', 'carousel-slider'),
		            'desc' 	=> __('Check to show attachment title below image.', 'carousel-slider'),
		            'std' 	=> 'off'
		        ),
                array(
		            'id' 	=> '_show_attachment_caption',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Show Caption', 'carousel-slider'),
		            'label' => __('Show Caption', 'carousel-slider'),
		            'desc' 	=> __('Check to show attachment caption below image.', 'carousel-slider'),
		            'std' 	=> 'off'
		        ),
	        )
		);

		$general_metabox = array(
		    'id' 			=> 'carousel-slide-general_metabox',
		    'title' 		=> __('General Settings', 'carousel-slider'),
		    'page' 			=> array('carousels'),
		    'context' 		=> 'normal',
		    'priority' 		=> 'high',
		    'fields' 		=> array(
                array(
		            'id' 	=> '_slide_by',
		            'type' 	=> 'text',
		            'name' 	=> __('Slide By', 'carousel-slider'),
		            'desc' 	=> __('Navigation slide by x number. Write "page" with inverted comma to slide by page. Default value is 1.', 'carousel-slider'),
		            'std' 	=> 1
		        ),
                array(
		            'id' 	=> '_margin_right',
		            'type' 	=> 'number',
		            'name' 	=> __('Margin Right(px) on item.', 'carousel-slider'),
		            'desc' 	=> __('margin-right(px) on item. Default value is 10. Example: 20', 'carousel-slider'),
		            'std' 	=> 10
		        ),
                array(
		            'id' 	=> '_inifnity_loop',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Inifnity loop', 'carousel-slider'),
		            'label' => __('Inifnity loop.', 'carousel-slider'),
		            'desc' 	=> __('Check to show inifnity loop. Duplicate last and first items to get loop illusion', 'carousel-slider'),
		            'std' 	=> 'on'
		        ),
                array(
		            'id' 	=> '_lazy_load_image',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Lazy load image', 'carousel-slider'),
		            'label' => __('Lazy load image', 'carousel-slider'),
		            'desc' 	=> __('Check to enable image lazy load.', 'carousel-slider'),
		            'std' 	=> 'off'
		        ),
	        )
		);

		$navigation_metabox = array(
		    'id' 			=> 'carousel-slide-navigation_metabox',
		    'title' 		=> __('Navigation Settings', 'carousel-slider'),
		    'page' 			=> array('carousels'),
		    'context' 		=> 'normal',
		    'priority' 		=> 'high',
		    'fields' 		=> array(
                array(
		            'id' 	=> '_nav_button',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Display navigation buttons', 'carousel-slider'),
		            'label' => __('Display "next" and "previous" buttons', 'carousel-slider'),
		            'desc' 	=> __('Check to display "next" and "previous" buttons', 'carousel-slider'),
		        ),
                array(
		            'id' 	=> '_dot_nav',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Show dots navigation', 'carousel-slider'),
		            'label' => __('Show dots navigation.', 'carousel-slider'),
		            'desc' 	=> __('Check to show dots navigation.', 'carousel-slider'),
		        ),
                array(
		            'id' 	=> '_nav_color',
		            'type' 	=> 'color',
		            'name' 	=> __('Navigation Color	', 'carousel-slider'),
		            'desc' 	=> __('Enter hex value of color for carousel navigation.', 'carousel-slider'),
		            'std' 	=> '#f1f1f1'
		        ),
                array(
		            'id' 	=> '_nav_active_color',
		            'type' 	=> 'color',
		            'name' 	=> __('Navigation Color: Hover & Active', 'carousel-slider'),
		            'desc' 	=> __('Enter hex value of color for carousel navigation.', 'carousel-slider'),
		            'std' 	=> '#4caf50'
		        ),
		    ),
	    );

		$autoplay_metabox = array(
		    'id' 			=> 'carousel-slide-autoplay_metabox',
		    'title' 		=> __('Autoplay Settings', 'carousel-slider'),
		    'page' 			=> array('carousels'),
		    'context' 		=> 'normal',
		    'priority' 		=> 'high',
		    'fields' 		=> array(
                array(
		            'id' 	=> '_autoplay',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Autoplay', 'carousel-slider'),
		            'label' => __('Autoplay.', 'carousel-slider'),
		            'desc' 	=> __('Check to enable autoplay', 'carousel-slider'),
		            'std' 	=> 'on'
		        ),
                array(
		            'id' 	=> '_autoplay_timeout',
		            'type' 	=> 'number',
		            'name' 	=> __('Autoplay Timeout', 'carousel-slider'),
		            'desc' 	=> __('Autoplay interval timeout in millisecond. Default: 5000', 'carousel-slider'),
		            'std' 	=> 5000
		        ),

                array(
		            'id' 	=> '_autoplay_speed',
		            'type' 	=> 'number',
		            'name' 	=> __('Autoplay Speed', 'carousel-slider'),
		            'desc' 	=> __('Autoplay speen in millisecond. Default: 500', 'carousel-slider'),
		            'std' 	=> 500
		        ),
                array(
		            'id' 	=> '_autoplay_pause',
		            'type' 	=> 'checkbox',
		            'name' 	=> __('Autoplay Hover Pause', 'carousel-slider'),
		            'label' => __('Pause on mouse hover.', 'carousel-slider'),
		            'desc' 	=> __('Pause autoplay on mouse hover.', 'carousel-slider'),
		        ),
		    ),
	    );

		$responsive_metabox = array(
		    'id' 			=> 'carousel-slide-responsive_metabox',
		    'title' 		=> __('Responsive Settings', 'carousel-slider'),
		    'page' 			=> array('carousels'),
		    'context' 		=> 'normal',
		    'priority' 		=> 'high',
		    'fields' 		=> array(
                array(
		            'id' 	=> '_items',
		            'type' 	=> 'number',
		            'name' 	=> __('Carousel items', 'carousel-slider'),
		            'desc' 	=> __('To set the maximum amount of items displayed at a time with the widest browser width (window >= 1200)', 'carousel-slider'),
		            'std' 	=> 4
		        ),
                array(
		            'id' 	=> '_items_small_desktop',
		            'type' 	=> 'number',
		            'name' 	=> __('Carousel items for small desktop', 'carousel-slider'),
		            'desc' 	=> __('This allows you to preset the number of slides visible with (window >= 980) browser width.', 'carousel-slider'),
		            'std' 	=> 4
		        ),
                array(
		            'id' 	=> '_items_portrait_tablet',
		            'type' 	=> 'number',
		            'name' 	=> __('Carousel items for portrait Tablet', 'carousel-slider'),
		            'desc' 	=> __('This allows you to preset the number of slides visible with (window >= 768) browser width.', 'carousel-slider'),
		            'std' 	=> 3
		        ),
                array(
		            'id' 	=> '_items_small_portrait_tablet',
		            'type' 	=> 'number',
		            'name' 	=> __('Carousel items for small portrait Tablet', 'carousel-slider'),
		            'desc' 	=> __('This allows you to preset the number of slides visible with (window >= 600) browser width.', 'carousel-slider'),
		            'std' 	=> 2
		        ),
                array(
		            'id' 	=> '_items_portrait_mobile',
		            'type' 	=> 'number',
		            'name' 	=> __('Carousel items for portrait Mobile', 'carousel-slider'),
		            'desc' 	=> __('This allows you to preset the number of slides visible with (window >= 320) browser width.', 'carousel-slider'),
		            'std' 	=> 1
		        ),
		    ),
	    );

		new Carousel_Slider_Meta_Box( $carousel_metabox );
		new Carousel_Slider_Meta_Box( $general_metabox );
		new Carousel_Slider_Meta_Box( $navigation_metabox );
		new Carousel_Slider_Meta_Box( $autoplay_metabox );
		new Carousel_Slider_Meta_Box( $responsive_metabox );
	}
}

endif;