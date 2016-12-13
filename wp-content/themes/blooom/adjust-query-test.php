<?php
function alter_query(){
	//gets the global query var object
	global $wp_query;

	//gets the front page id set in options
	$front_page_id = get_option('page_on_front');

	if ( 'page' != get_option('show_on_front') || $front_page_id != $wp_query->query_vars['page_id'] )
		return;

	if ( !$query->is_main_query() )
		return;

	$query-> set('post_type' ,'page');
	$query-> set('post__in' ,array( $front_page_id , [YOUR SECOND PAGE ID]  ));
	$query-> set('orderby' ,'post__in');
	$query-> set('p' , null);
	$query-> set( 'page_id' ,null);

	//we remove the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');


	// OR


	//setup hooks in the template_redirect action => once the main WordPress query is set
add_action( 'template_redirect', 'hooks_setup' , 20 );
function hooks_setup() {
    if (! is_home() ) //<= you can also use any conditional tag here
        return;
    add_action( '__before_loop'     , 'set_my_query' );
    add_action( '__after_loop'      , 'set_my_query', 100 );
}
 
function set_my_query() {
    global $wp_query, $wp_the_query;
    switch ( current_filter() ) {
    	case '__before_loop':
    		//replace the current query by a custom query
		    //Note : the initial query is stored in another global named $wp_the_query
		    $wp_query = new WP_Query( array(
		    	'post_type'         => 'post',
				'post_status'       => 'publish',
		       //others parameters...
		    ) );
    	break;
 
    	default:
    		//back to the initial WP query stored in $wp_the_query
    		$wp_query = $wp_the_query;
    	break;
    }
}



	// OR


	add_filter( 'posts_where' , 'posts_where_statement' );
 
function posts_where_statement( $where ) {
	//gets the global query var object
	global $wp_query;
 
	//gets the front page id set in options
	$front_page_id = get_option('page_on_front');
 
	//checks the context before altering the query
	if ( 'page' != get_option('show_on_front') || $front_page_id != $wp_query->query_vars['page_id'] )
		return $where;
 
	//changes the where statement
	$where = " AND wp_posts.ID IN ('{$front_page_id}', [YOUR SECOND PAGE ID] ) AND wp_posts.post_type = 'page' ";
 
	//removes the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');
 
	return $where;
}
 
add_filter( 'posts_orderby' , 'posts_orderby_statement' );
 
function posts_orderby_statement($orderby) {
	global $wp_query;
	$front_page_id = get_option('page_on_front');
 
	//checks the context before altering the query
	if ( 'page' != get_option('show_on_front') || $front_page_id != $wp_query->query_vars['page_id'] )
		return $orderby;
 
	//changes the orderby statement
	$orderby = " FIELD( wp_posts.ID, '{$front_page_id}' ,[YOUR SECOND PAGE ID] )";
 
    return $orderby;
}


	// OR


	if ( $query->is_home() && $query->is_main_query() ) { // Run only on the homepage
		$query->query_vars[‘cat’] = -2; // Exclude my featured category because I display that elsewhere
		$query->query_vars[‘posts_per_page’] = 5; // Show only 5 posts on the homepage only
	}
	dev_alert("success");
}
?>