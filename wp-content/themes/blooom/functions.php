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

// add styles to theme conditionally based on custom fields
function add_styles_conditionally(){
	// declare wordpress database as global variable
	global $wpdb;
	// bind the current post's ID to a variable
	$current_post_id = get_the_ID();
	// query database for pricing_3 custom field value and bind result to variable using wpdb->prepare in order to prevent sql injection
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
// Bind Dcodes to cookie
function add_dcode_to_cookie(){
	// declare wordpress database as global variable
	global $wpdb;
	// bind the current post's ID to a variable 
	$current_post_id = get_the_ID();
	// query database for dcode custom field value and bind result to variable using wpdb->prepare in order to prevent sql injection
	$database_query = $wpdb->get_row($wpdb->prepare(
		"
		SELECT * 
		FROM $wpdb->postmeta 
		WHERE post_id = $current_post_id 
			AND meta_key = 'dcode'
		",
		""
	));
	// If the database query returns a dcode defined for the current post
	if($database_query->meta_value != "" && $database_query->meta_value != NULL){
		// bind the current post's cookie to a variable and write it to the cookie
		$dcode = $database_query->meta_value;
		/*

		
		ERROR: adding "/" path argument to setcookie(), resolves duplicate cookie issue but results in cookie not being set on first page load
		
		One, potentially hacky, workaround is to manually set the cookie on the next line after setcookie() function ala:
		$_COOKIE["dcode"] = $dcode;

		The fancy way would be AJAX?

		Another is to create a refresh if there is no cookie, but I HATE that idea...

		*/
		$_COOKIE["dcode"] = $dcode;
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
 	/* GARY - Note to Self: Consider these options in the chace that we ever want Dcodes for posts
	$query-> set('post_type' ,'any');
	$query-> set('p' , $dcode_post_id);
 	*/
	$query-> set('post_type' ,'page');
	$query-> set('orderby' ,'post__in');
	$query-> set('p' , null);
	$query-> set( 'page_id' , $dcode_post_id);
 
	//we remove the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');
}
// Add dcode to all secure.blooom links
function add_dcode_to_secure_links(){
	if(isset( $_COOKIE['dcode'] )){
		?>
		<script type="text/javascript">
			var $j = jQuery.noConflict();
			$d_code = "<?php echo $_COOKIE['dcode']; ?>";
			$url_parameters = "<?php echo $_SERVER['QUERY_STRING']; ?>";
			$custom_signup_url = "https://secure.blooom.com/<?php echo $_COOKIE['dcode']; ?>";
			<?php 
				if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != ""){
					?>
					$custom_signup_url = $custom_signup_url + "?" + "<?php echo $_SERVER['QUERY_STRING']; ?>";
					<?php
				}
			?>
			$j(document).ready(function(){
				$j("a[href^='https://secure.blooom.com/'], a[href^='https://secure.blooom.com']").attr('href',$custom_signup_url);
			});
		</script>

		<?php
	}
}
/* Proper way to enqueue scripts */
function add_scripts(){
    // Register and Enqueue the Link-Handling Script
    wp_register_script('relinker', plugins_url('relinker.js', __FILE__ ), array('jquery'), null, true);
    wp_enqueue_script('relinker');
}

function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
	$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

// WordPress Hooksadd_dcode_to_secure_links
add_action('pre_get_posts','alter_homepage_query_with_dcode');
add_action( 'wp', 'add_dcode_to_cookie');
add_action( 'wp_head', 'add_dcode_to_secure_links');
add_action( 'wp_head', 'add_styles_conditionally');
//add_action('wp_enqueue_scripts', 'add_scripts');










function dev_alert($message) {
	?>
	<script type="text/javascript">
		alert("<?php echo $message; ?>");
	</script>
	<?php
}
?>