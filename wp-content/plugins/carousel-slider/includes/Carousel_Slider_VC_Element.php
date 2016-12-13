<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if( ! class_exists('Carousel_Slider_VC_Element') ):

class Carousel_Slider_VC_Element
{
    public function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );
    }
 
    public function integrateWithVC() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
 
        vc_map( array(
            "name" => __("Carousel Slider", 'carousel-slider'),
            "description" => __("Place Carousel Slider.", 'carousel-slider'),
            "base" => "carousel_slide",
            "controls" => "full",
            "icon" => plugins_url('assets/img/icon-images.svg', dirname(__FILE__)),
            "category" => __('Content', 'carousel-slider'),
            "params" => array(
                array(
                    "type"        => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "param_name"  => "id",
                    "heading"     => __("Carousel Slide ID", 'carousel-slider'),
                    "description" => sprintf(__("Place carousel slide id here. %s to go Carousels page", 'carousel-slider'), '<a href="'. admin_url('edit.php?post_type=carousels') .'" target="_blank">' . __('Click here', 'carousel-slider') . '</a>'),
                ),
            ),
        ));
    }
}

endif;
new Carousel_Slider_VC_Element;