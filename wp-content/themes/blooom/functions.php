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

// add styles to theme conditionally based on data in custom fields
function add_styles_conditionally(){
	// declare wordpress database as global variable
	global $wpdb;
	// assign the current post's ID to a variable
	$current_post_id = get_the_ID();
	// query database for pricing_3 custom field value and assign result to variable using wpdb->prepare in order to prevent sql injection
	$database_query = $wpdb->get_row($wpdb->prepare(
		"
		SELECT * 
		FROM $wpdb->postmeta 
		WHERE post_id = $current_post_id 
			AND meta_key = 'pricing_3'
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
// Write Dcodes to cookie
function add_dcode_to_cookie(){
	// declare wordpress database as global variable
	global $wpdb;
	// assign the current post's ID to a variable 
	$current_post_id = get_the_ID();
	// query the wordpress database in order to get the value of the dcode custom field for this post and assign the result to a variable. Using wpdb->prepare in order to prevent sql injection.
	$database_query = $wpdb->get_row($wpdb->prepare(
		"
		SELECT * 
		FROM $wpdb->postmeta 
		WHERE post_id = $current_post_id 
			AND meta_key = 'dcode'
		",
		""
	));
	// If the meta_value column returned by the database query has content
	if($database_query->meta_value != "" && $database_query->meta_value != NULL){
		// assign the current post's dcode to a variable and write it to the cookie
		$dcode = $database_query->meta_value;
		// manually write dcode to cookie so that php can access it before page reload
		$_COOKIE["dcode"] = $dcode;
		// properly write dcode to cookie so that it will be set correctly after http request
		setcookie("dcode",$dcode,time()+86400*30,"/");
		// write the current post's post ID to the cookie
		setcookie("dcode_post_id",$current_post_id,time()+86400*30,"/");
	}
	// 

}
function alter_homepage_query_with_dcode($query) {
	//gets the global query var object
	global $wp_query;
	//gets the front page id set in options
	$front_page_id = get_option('page_on_front');
	if ( 'page' != get_option('show_on_front') || $front_page_id != $wp_query->query_vars['page_id'] )
		return;
	if ( !$query->is_main_query() )
		return;
	if( !isset($_COOKIE['dcode_post_id']))
		return;
 	$dcode_post_id = $_COOKIE["dcode_post_id"];
 	/* Note: Consider these options in the chance that we ever want Dcodes for posts
	$query-> set('post_type' ,'any');
	$query-> set('p' , $dcode_post_id);
 	*/
	$query-> set('post_type' ,'page');
	$query-> set('orderby' ,'post__in');
	$query-> set('p' , null);
	$query-> set( 'page_id' , $dcode_post_id);
	// Remove the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');
}

// Add dcode to all secure.blooom links
function add_dcode_to_secure_links(){
	// if the dcode has been written to the cookie
	if(isset( $_COOKIE['dcode'] )){
		//insert javascript
		?>
		<script type="text/javascript">
			// assign new jquery variable to prevent conflict
			var $j = jQuery.noConflict();
			// append dcode from cookie to secure.blooom.url and assign to variable
			$secure_link_with_dcode = "https://secure.blooom.com/<?php echo $_COOKIE['dcode']; ?>";
			<?php 
				// if parameters have been passed through the url, append them to the secure_link_with_dcode variable
				if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != ""){
					?>
					$secure_link_with_dcode = $secure_link_with_dcode + "?" + "<?php echo $_SERVER['QUERY_STRING']; ?>";
					<?php
				}
			?>
			//once document is ready, search DOM for all a tags witha  secure.blooom href and replace href with secure link with dcode
			$j(document).ready(function(){
				$j("a[href^='https://secure.blooom.com/'], a[href^='https://secure.blooom.com']").attr('href',$secure_link_with_dcode);
			});
		</script>

		<?php
	}
}

// WordPress Hooks - call functions at certain points during wordpress load
add_action('pre_get_posts','alter_homepage_query_with_dcode');
add_action( 'wp', 'add_dcode_to_cookie');
add_action( 'wp_head', 'add_dcode_to_secure_links');
add_action( 'wp_head', 'add_styles_conditionally');

?>