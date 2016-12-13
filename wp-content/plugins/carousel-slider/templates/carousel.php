<?php
$options_array = array(
	'id' 							=> 'id-' . $id,
	'class' 						=> 'owl-carousel carousel-slider',
	// General
	'data-margin' 					=> $margin_right,
	'data-slide-by' 				=> $slide_by,
	'data-loop' 					=> $inifnity_loop,
	'data-lazy-load' 				=> $lazy_load_image,
	// Navigation
	'data-nav' 						=> $navigation,
	'data-dots' 					=> $pagination,
	// Autoplay
	'data-autoplay' 				=> $auto_play,
	'data-autoplay-timeout' 		=> $autoplay_timeout,
	'data-autoplay-speed' 			=> $autoplay_speed,
	'data-autoplay-hover-pause' 	=> $stop_on_hover,
	// Responsive
	'data-colums' 					=> $items,
	'data-colums-desktop' 			=> $items,
	'data-colums-small-desktop' 	=> $items_desktop,
	'data-colums-tablet' 			=> $items_desktop_small,
	'data-colums-small-tablet' 		=> $items_tablet,
	'data-colums-mobile' 			=> $items_mobile,
);
$data_attr = join(" ", $this->array_to_data( $options_array ));
?>
<style>
    #id-<?php echo $id; ?> .owl-nav [class*='owl-'],
    #id-<?php echo $id; ?> .owl-dots .owl-dot span {
        background-color: <?php echo $nav_color; ?>
    }
    #id-<?php echo $id; ?> .owl-nav [class*='owl-']:hover,
    #id-<?php echo $id; ?> .owl-dots .owl-dot.active span,
    #id-<?php echo $id; ?> .owl-dots .owl-dot:hover span {
        background-color: <?php echo $nav_active_color; ?>
    }
</style>
<div <?php echo $data_attr; ?>>
    <?php echo do_shortcode($content); ?>
</div><!-- .carousel-slider -->
