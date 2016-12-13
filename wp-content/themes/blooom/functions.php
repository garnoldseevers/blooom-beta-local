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

function blooom_dcodes(){
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
	// If the database query returns a dcode defined for the current post and the cookie is not already set
	if($database_query->meta_value != "" && $database_query->meta_value != NULL){
		// bind the current post's cookie to a variable and write it to the cookie
		$dcode = $database_query->meta_value;
		setcookie("dcode",$dcode,0);
		// write the current post's post ID to the cookie
		setcookie("dcode_post_id",$current_post_id,"0");
	}
	// get parameters sans url structure and hash
	$url_parameters = $_SERVER['QUERY_STRING'];
	// 
	if(isset($COOKIE["dcode"])){
		//add_action('pre_get_posts','alter_query');
	}else{
	}

	/* Proper way to enqueue scripts */
	function add_scripts(){
	    // Register and Enqueue the Link-Handling Script
	    wp_register_script('relinker', plugins_url('relinker.js', __FILE__ ), array('jquery'), null, true);
	    wp_enqueue_script('relinker');
	}
	add_action('wp_enqueue_scripts', 'add_scripts');
}



function adjust_blooom_theme(){
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

// run functions when WordPress runs wp_head()
add_action( 'wp_head', 'adjust_blooom_theme');
add_action( 'wp', 'blooom_dcodes');


function dev_alert($message) {
	?>
	<script type="text/javascript">
		alert("<?php echo $message; ?>");
	</script>
	<?php
}


?>