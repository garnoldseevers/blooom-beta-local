<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below
//
function adjust_blooom_theme(){
	global $wpdb;
	// show errors for test
	$wpdb->show_errors( true );
	// bind the current post's ID to a variable
	$current_post_id = get_the_ID();
	// query database for pricing_3 custom field value and bind result to variable using wpdb->prepare in order to prevent sql injection
	$database_query = $wpdb->get_row($wpdb->prepare(
		"
		SELECT * 
		FROM $wpdb->postmeta 
		WHERE post_id = $current_post_id 
			AND meta_key = pricing_3
		",
		""
	));
	// if value returned from database is empty apply style rules to hide fourth pricing box
	if($database_query->meta_value == "" || $database_query->meta_value == NULL){
		?>
		<style type="text/css">
			.blm-pricing-boxes div.et_pb_column{
				width: 31% !important;
			}
			.blm-pricing-box-4{
				display: none;
			}
		</style>
		<?php
	}
}
// run adjust_blooom_theme() when WordPress runs wp_head()
add_action( 'wp_head', 'adjust_blooom_theme');


?>