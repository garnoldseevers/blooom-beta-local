<?php
    /*
	*
	*	Plugin Styling 
	*	------------------------------------------------
	*	WP Mobile Menu
	* 	Copyright WP Mobile Menu 2016 - http://www.wpmobilemenu.com
	*
	*	sf_custom_styles()
	*	sf_custom_script()
	*
	*/

    /* CUSTOM CSS OUTPUT
 	================================================== */
			 
	$titan = TitanFramework::getInstance( 'mobmenu' );
	// Determine the Width of the Footer li elements base on the admin options

	// Check if the Mobile Menu is enable in the plugin options
	if ( 'yes' == $titan->getOption( 'enabled' ) ){

		$trigger_res = $titan->getOption( 'width_trigger' );
		$right_menu_width = $titan->getOption( 'right_menu_width' ) . 'px';
		$left_menu_width = $titan->getOption( 'left_menu_width' ) . 'px';
	
	?>

	<style>

	/* Our css Custom Options values */
	
	@media only screen and (max-width:<?php	echo $trigger_res; ?>px){
		<?php echo $titan->getOption('hide_elements'); ?> {
			display:none !important;
		}

		.mobmenu, .mob-menu-left-panel, .mob-menu-right-panel{
			display: block;
		}
		
		.mobmenur-container .mobmenu-right-bt{
		 	color: <?php echo $titan->getOption('right_menu_icon_color'); ?> !important;
		}
		.mobmenul-container .mobmenu-left-bt{
			color: <?php echo $titan->getOption('left_menu_icon_color'); ?> !important;
		}
		#mobmenuleft li a , #mobmenuleft li a:visited {
			font-family:"Open sans" , arial, sans-serif;
			color: <?php echo $titan->getOption('left_panel_text_color');?> !important;

		}
		.mobmenu_content h2, .mobmenu_content h3{
		    font-size: 18px;
			font-family:"Open sans" , arial, sans-serif;
    		padding-left: 20px;
    		color: <?php echo $titan->getOption('left_panel_text_color');?> !important;
		}

		.mobmenu_content #mobmenuleft li:hover, .mobmenu_content #mobmenuright li:hover  {
 	         background-color: <?php echo $titan->getOption("left_panel_hover_bgcolor");?> !important;
		}

		.mobmenu_content #mobmenuright li:hover  {
 	         background-color: <?php echo $titan->getOption("right_panel_hover_bgcolor");?> !important;
		}
		
		.mobmenu_content #mobmenuleft .sub-menu  {
 	         background-color: <?php echo $titan->getOption("left_panel_submenu_bgcolor");?> !important;
 	         margin: 0;
 	         color: <?php echo $titan->getOption("left_panel_submenu_text_color");?> !important;
 	         width: 100%;
 	         
		}

		.mobmenu_content #mobmenuleft .sub-menu a {
 	         color: <?php echo $titan->getOption("left_panel_submenu_text_color");?> !important;
		}

		.mobmenu_content #mobmenuright .sub-menu  a{
 	         color: <?php echo $titan->getOption("right_panel_submenu_text_color");?> !important;
		}

		.mobmenu_content #mobmenuright .sub-menu  {
 	         background-color: <?php echo $titan->getOption("right_panel_submenu_bgcolor");?> !important;
 	         margin: 0;  
 	         color: <?php echo $titan->getOption("right_panel_submenu_text_color");?> !important;
		}

		#mobmenuleft li a:hover {
			font-family:"Open sans" , arial, sans-serif;
			color: <?php echo $titan->getOption("left_panel_hover_text_color");?> !important;

		}
		
		#mobmenuright li a , #mobmenuright li a:visited{
			color: <?php echo $titan->getOption('right_panel_text_color');?> !important;
		}

		#mobmenuright li a:hover {
			color: <?php echo $titan->getOption('right_panel_hover_text_color');?> !important;
		}

		.mobmenul-container{
			top: <?php echo $titan->getOption('left_icon_top_margin'); ?>px;
			margin-left: <?php echo $titan->getOption('left_icon_left_margin'); ?>px;

		}

		.mobmenur-container{
			top: <?php	echo $titan->getOption('right_icon_top_margin'); ?>px;
			margin-right: <?php	echo $titan->getOption('right_icon_right_margin'); ?>px;

		}
  
		.logo-holder{
			padding-top: <?php echo $titan->getOption('logo_top_margin'); ?>px;
			text-align:center;
		}

		.mob_menu_header_div{

			background-color: <?php	echo $titan->getOption('header_bg_color'); ?>;
			height: <?php	echo $titan->getOption('header_height'); ?>px;
			width: 100%;
			font-weight:bold;
			font-size:12px;
			position:fixed;
			top:0px;	
			right: 0px;
			z-index: 99998;
			color:#000;
			display: block;
		}

		.mobmenu-push-wrap{
    		padding-top: <?php	echo $titan->getOption('header_height'); ?>px;
		}

		.mob-menu-left-panel{
			background-color: <?php	echo $titan->getOption('left_panel_bg_color'); ?>;
			width:  <?php echo $left_menu_width; ?>;  
			-webkit-transform: translateX(-<?php echo $left_menu_width; ?>);
            -moz-transform: translateX(-<?php echo $left_menu_width; ?>);
            -ms-transform: translateX(-<?php echo $left_menu_width; ?>);
            -o-transform: translateX(-<?php echo $left_menu_width; ?>);
            transform: translateX(-<?php echo $left_menu_width; ?>);
		}

		.mob-menu-right-panel{
			background-color: <?php	echo $titan->getOption('right_panel_bg_color'); ?>;
			width:  <?php echo $right_menu_width; ?>;  
			-webkit-transform: translateX( <?php echo $right_menu_width; ?> );
            -moz-transform: translateX( <?php echo $right_menu_width; ?> );
            -ms-transform: translateX( <?php echo $right_menu_width; ?> );
            -o-transform: translateX( <?php echo $right_menu_width; ?> );
            transform: translateX( <?php echo $right_menu_width; ?> );
		}

		/* Will animate the content to the right 275px revealing the hidden nav */
		.show-nav-left .mobmenu-push-wrap, .show-nav-left .mob_menu_header_div {

		    -webkit-transform: translate(<?php echo $left_menu_width; ?>, 0);
		    -moz-transform: translate(<?php echo $left_menu_width; ?>, 0);
		    -ms-transform: translate(<?php echo $left_menu_width; ?>, 0);
		    -o-transform: translate(<?php echo $left_menu_width; ?>, 0);
		    transform: translate(<?php echo $left_menu_width; ?>, 0);

		    -webkit-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    -moz-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    -ms-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    -o-transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		    transform: translate3d(<?php echo $left_menu_width; ?>, 0, 0);
		}

		.show-nav-right .mobmenu-push-wrap , .show-nav-right .mob_menu_header_div{

		    -webkit-transform: translate(-<?php echo $right_menu_width; ?>, 0);
		    -moz-transform: translate(-<?php echo $right_menu_width; ?>, 0);
		    -ms-transform: translate(-<?php echo $right_menu_width; ?>, 0);
		    -o-transform: translate(-<?php echo $right_menu_width; ?>, 0);
		    transform: translate(-<?php echo $right_menu_width; ?>, 0);

		    -webkit-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    -moz-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    -ms-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    -o-transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		    transform: translate3d(-<?php echo $right_menu_width; ?>, 0, 0);
		}
  
		.headertext{ 
			color: <?php echo $titan->getOption('header_text_color'); ?> !important;
			font-size:  <?php	echo $titan->getOption('header_font_size');?>px;
		}

				
		/* Adds a transition and the resting translate state */
		.mobmenu-push-wrap, .mob_menu_header_div {
			
		    -webkit-transition: all 300ms ease 0;
		    -moz-transition: all 300ms ease 0;
		    -o-transition: all 300ms ease 0;
		    transition: all 300ms ease 0;

		    -webkit-transform: translate(0, 0);
		    -moz-transform: translate(0, 0);
		    -ms-transform: translate(0, 0);
		    -o-transform: translate(0, 0);
		    transform: translate(0, 0);

		    -webkit-transform: translate3d(0, 0, 0);
		    -moz-transform: translate3d(0, 0, 0);
		    -ms-transform: translate3d(0, 0, 0);
		    -o-transform: translate3d(0, 0, 0);
		    transform: translate3d(0, 0, 0);

		    -webkit-transition: -webkit-transform .5s;
		    -moz-transition: -moz-transform .5s;
		    -ms-transition: -ms-transform .5s;
		    -o-transition: -o-transform .5s;
		    transition: transform .5s;
		}
		
	}
	@media only screen and (min-width:<?php	echo $trigger_res; ?>px){
		
		.mob_menu, .mob_menu_left_panel, .mob_menu_right_panel{
			display: none;
		}
	}

	</style>

	<?php  }  ?>