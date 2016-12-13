<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Widget_Carousel_Slider extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_carousel_slider',
			'description' => 'Easily use carousel slider in widget area.',
		);
		parent::__construct( 'widget_carousel_slider', 'Carousel Slider', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract($args);
		
		wp_enqueue_style( 'carousel-slider' );
		wp_enqueue_script( 'owl-carousel' );

		$carousel_id = $instance['carousel_id'];
		echo $args['before_widget'];
		echo do_shortcode('[carousel_slide id='. $carousel_id .']');
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$args = array(
			'post_type' => 'carousels',
			'post_status' => 'publish',
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {
				$query->the_post();

				echo "<label style='display: block;overflow: hidden;width: 100%; margin: 10px 0;'>";

				$carousel_id = ! empty( $instance['carousel_id'] ) ? $instance['carousel_id'] : null;
				$checked = $carousel_id == get_the_ID() ? 'checked="checket"' : '';
				echo sprintf(
					'<input type="radio" name="%s" value="%d" style="%s" %s>',
					$this->get_field_name( 'carousel_id' ),
					get_the_ID(),
					'float: left;margin: 10px 10px 0 0;',
					$checked
				);

				$image_ids 	= explode(',', get_post_meta( get_the_ID(), '_wpdh_image_ids', true) );
				echo $this->thumbnail_list( $image_ids );

				echo "</label>";
			}
			wp_reset_postdata();

		} else {
			echo sprintf('%1$sYou did not add any carousel slider yet. %3$s%4$s%5$s to create a new carousel slider now.%2$s',
				'<p>',
				'</p>',
				'<a href="'. admin_url('post-new.php?post_type=carousels') .'">',
				__('click here'),
				'</a>'
			);
		}
	}

	private function thumbnail_list( $ids )
	{
		$show_more_icon = false;
		if ( count($ids) > 6 ) {
			$ids = array_slice($ids, 0, 5);
			$show_more_icon = true;
		}
		$html = "<ul style='float: left;margin:0;'>";
		foreach ( $ids as $id ) {
			$src = wp_get_attachment_image_src( $id, array(32,32) );
			$html .= "<li style='display:inline;margin-right:5px;'><img src='{$src[0]}' width='{$src[1]}' height='{$src[2]}'></li>";
		}
		if ($show_more_icon) {
			$html .= "<li style='display: inline;'>";
			$html .= "<span style='display: inline;font-size: 14px;height: 32px;vertical-align: top;width: 32px;'>More +</span>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['carousel_id'] = ( ! empty( $new_instance['carousel_id'] ) ) ? strip_tags( $new_instance['carousel_id'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'Widget_Carousel_Slider' );
});
