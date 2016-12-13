<?php 

	//  Saving Mobile Menu Admin settings form data
	if($_POST['mobmenu_update_settings'] == 'Y') {

		//Save Enable Header/Footer Option
		update_option('mobmenu_opt_enabled',               $_POST['mobmenu_enabled']);
		
		//Save Resolution Trigger Option
		update_option('mobmenu_opt_res_trigger',           $_POST['mobmenu_res_trigger']);
				
		//Save Enable Left Menu
		update_option('mobmenu_opt_left_menu_enabled',     $_POST['mobmenu_enabled_left_menu']);
		
		//Save Enable Right Menu
		update_option('mobmenu_opt_right_menu_enabled',    $_POST['mobmenu_enabled_right_menu']);
				
		//Save Header Text Option
		update_option('mobmenu_opt_header_text',           $_POST['mobmenu_header_text']);
		
		//Save Header Text Option
		update_option('mobmenu_opt_header_font_size',      $_POST['mobmenu_header_font_size']);
				
		//Save Header Height Option
		update_option('mobmenu_opt_header_height',         $_POST['mobmenu_header_height']);
			
		//Save Site Logo Option
		update_option('mobmenu_opt_site_logo',             $_POST['mobmenu_site_logo']);            
		
		//Save Site Logo Image
		update_option('mobmenu_opt_site_logo_img',         $_POST['mobmenu_site_logo_img']);            
		
		//Save Html Hide Elements
		update_option('mobmenu_opt_hide_selectors',        $_POST['mobmenu_hide_selectors']);    
		     	
		//Header Background Color
		update_option('mobmenu_opt_header_bgcolor',        $_POST['mobmenu_header_bgcolor']);    
				
		//Header Text Color
		update_option('mobmenu_opt_header_textcolor',      $_POST['mobmenu_header_textcolor']);    
		
		//Footer Background Color
		update_option('mobmenu_opt_footer_bgcolor',        $_POST['mobmenu_footer_bgcolor']);    
		
		//Left Menu Background Color
		update_option('mobmenu_opt_left_menu_bgcolor',     $_POST['mobmenu_left_menu_bgcolor']);    
		
		//Right Menu Background Color
		update_option('mobmenu_opt_right_menu_bgcolor',    $_POST['mobmenu_right_menu_bgcolor']);  
		
		//Menu Left Text Color
		update_option('mobmenu_opt_left_text_color',       $_POST['mobmenu_left_text_color']);  
		
		//Menu Right Text Color
		update_option('mobmenu_opt_right_text_color',      $_POST['mobmenu_right_text_color']);  
		
		//Left Menu Text Color on Hover
		update_option('mobmenu_opt_left_text_color_hover', $_POST['mobmenu_left_text_color_hover']);  
		
		//Right Menu Text Color on Hover
		update_option('mobmenu_opt_right_text_color_hover', $_POST['mobmenu_right_text_color_hover']);  
						
		//Left Menu 
		update_option('mobmenu_opt_left_menu',             $_POST['mobmenu_left_menu']);  
		
		//Right Menu 
		update_option('mobmenu_opt_right_menu',            $_POST['mobmenu_right_menu']);  
		
		//Left Menu Icon
		update_option('mobmenu_opt_left_icon',             $_POST['mobmenu_left_icon']);  
		
		//Left Menu Icon Top Margin
		update_option('mobmenu_opt_left_icon_topmargin',   $_POST['mobmenu_left_icon_topmargin']); 
		
		//Logo Top Margin
		update_option('mobmenu_opt_header_logo_topmargin', $_POST['mobmenu_header_logo_topmargin']);  
		
		//Right Menu Icon
		update_option('mobmenu_opt_right_icon',            $_POST['mobmenu_right_icon']);  
		
		//Right Menu Icon Top Margin
		update_option('mobmenu_opt_right_icon_topmargin',  $_POST['mobmenu_right_icon_topmargin']);  
		
		//Footer Height Menu Icon Top Margin
		update_option('mobmenu_opt_footer_height',         $_POST['mobmenu_footer_height']); 
		
		//Enable Footer 1st Link 
		update_option('mobmenu_opt_enabled_1stlink',       $_POST['mobmenu_enabled_1stlink']); 
		
		//Enable Footer 2nd Link 
		update_option('mobmenu_opt_enabled_2ndlink',       $_POST['mobmenu_enabled_2ndlink']); 
		
		//Enable Footer 3rd Link 
		update_option('mobmenu_opt_enabled_3rdlink',       $_POST['mobmenu_enabled_3rdlink']); 
		
		//Enable Footer 4th Link 
		update_option('mobmenu_opt_enabled_4thlink',      $_POST['mobmenu_enabled_4thlink']); 
		
		//Footer 1st Icon
		update_option('mobmenu_opt_footer_1sticon',        $_POST['mobmenu_footer_1sticon']); 
		
		//Footer 2nd Icon
		update_option('mobmenu_opt_footer_2ndicon',        $_POST['mobmenu_footer_2ndicon']); 
		
		//Footer 3rd Icon
		update_option('mobmenu_opt_footer_3rdicon',        $_POST['mobmenu_footer_3rdicon']); 
		
		//Footer 4th Icon
		update_option('mobmenu_opt_footer_4thicon',        $_POST['mobmenu_footer_4thicon']); 
		
		//Footer 1st Link Url
		update_option('mobmenu_opt_ft1stlinkurl',          $_POST['mobmenu_ft1stlinkurl']); 
		
		//Footer 2nd Link Url
		update_option('mobmenu_opt_ft2ndlinkurl',          $_POST['mobmenu_ft2ndlinkurl']); 
		
		//Footer 3rd Link Url
		update_option('mobmenu_opt_ft3rdlinkurl',          $_POST['mobmenu_ft3rdlinkurl']); 
		
		//Footer 4th Link Url
		update_option('mobmenu_opt_ft4thlinkurl',          $_POST['mobmenu_ft4thlinkurl']); 
					
		//Footer 1st Link Url Target
		update_option('mobmenu_opt_ft1stlinknwindow',      $_POST['mobmenu_ft1stlinknwindow']); 
		
		//Footer 2nd Link Url Target
		update_option('mobmenu_opt_ft2ndlinknwindow',      $_POST['mobmenu_ft2ndlinknwindow']); 
		
		//Footer 3rd Link Url Target
		update_option('mobmenu_opt_ft3rdlinknwindow',      $_POST['mobmenu_ft3rdlinknwindow']); 
		
		//Footer 4th Link Url Target
		update_option('mobmenu_opt_ft4thlinknwindow',      $_POST['mobmenu_ft4thlinknwindow']); 
		
		//Header Menus Enabled
		update_option('mobmenu_opt_header_menus',      $_POST['mobmenu_header_menus']); 
		
		//Footer Menus Enabled
		update_option('mobmenu_opt_footer_menus',      $_POST['mobmenu_footer_menus']); 
		
		
		
		
		unset($_POST['mobmenu_update_settings']);
		
		?>
		
		<div class="updated">
		
			<p><strong><?php _e('Options saved.' ); ?></strong></p>
			
		</div>
		
		<?php
		
	} else {
		
		$mobiletheme = get_option('mobiletheme');
	 
	}	
	
?>

<div class="wrap">

  
	<div>
	
		<div class="icon32">
			<img src="<?php echo plugins_url( 'images/mobile_32.png', __FILE__ ); ?>">
		</div>
		
		<h2><?php echo __( 'Mobile Menu Settings', 'jv_mobiletheme' ); ?></h2>
		<br>
	</div>
	
	<!-- Mobile Menu Options Form -->
	<form name="mobiletheme_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	
		<div id="mobmenu-admin-tabs">
			 <ul>
    			<li><a href="#mobmenu-tabs-1">General Settings</a></li>
    			<li><a href="#mobmenu-tabs-2">Header Settings</a></li>
    			<li><a href="#mobmenu-tabs-3">Footer Settings</a></li>
    			<li><a href="#mobmenu-tabs-4">Color Settings</a></li>
  			</ul>
		
			<!-- General Settings Tab -->
			<div id="mobmenu-tabs-1">
				<table class="widefat fixed">
            		
					<!--  Option - Enable/Disable Mobile Menu  -->
					<tr>
                		<td class="firstcol">
							Enable Mobile Menu:
						</td>
                 		<td class="forminp">
				 	
							<select  name="mobmenu_enabled" id="mobmenu_enabled">
 
        	                    <option value="true"  <?php  if ( get_option('mobmenu_opt_enabled') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
            	                <option value="false"  <?php  if ( get_option('mobmenu_opt_enabled') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    		</select><br />
                		</td>
            		</tr>
			<!--  Option - Minimun Width Resolution that displays the Mobile Menu -->
			<tr>
                <td>
					Width Resolution to display Menu:
				</td>
                 <td class="forminp">
				 	
					<input type="text"  name="mobmenu_res_trigger" id="mobmenu_res_trigger" maxlength="4" size="3" value="<?php echo  get_option('mobmenu_opt_res_trigger');?>">px
                  
             
                </td>
            </tr>
			
			<!--  Option - Html Elements to Hide  -->
			<tr valign="top">
				<td>Hide Html elements (Navigation, Sidebar, Slider, etc)</td>
				<td><label for="mobmenu_hide_selectors">
				
					<input id="mobmenu_hide_selectors" type="text" size="56" name="mobmenu_hide_selectors" value="<?php echo get_option("mobmenu_opt_hide_selectors"); ?>" />
		<br /> You can use css class or IDs.  Example:  .menu , #nav
					</label>
				</td>
			</tr>
			
			<!--  Option - Enable Header Menus Toolbar  -->
			<tr>
			
                    <td class="firstcol">
						Enable Header Menu:
					</td>
					
                    <td class="forminp">
					
						<select name="mobmenu_header_menus" id="mobmenu_header_menus">
    
                            <option value="yes"  <?php  if ( get_option('mobmenu_opt_header_menus') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            <option value="no" <?php  if ( get_option('mobmenu_opt_header_menus') == 'no' ) echo "selected='selected'"; ?>>No</option>

                        </select><br />
                    </td>
            </tr>
			<!--  Option - Enable/Disable Left Menu  -->
					<tr>
                		<td class="firstcol">
							Enable Left Menu:
						</td>
                 		<td class="forminp">
				 	
							<select  name="mobmenu_enabled_left_menu" id="mobmenu_enabled_left_menu">
 
        	                    <option value="true"  <?php  if ( get_option('mobmenu_opt_left_menu_enabled') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
            	                <option value="false"  <?php  if ( get_option('mobmenu_opt_left_menu_enabled') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    </select><br />
                </td>
            </tr>
			<!--  Option - Enable/Disable Mobile Menu  -->
					<tr>
                		<td class="firstcol">
							Enable Right Menu:
						</td>
                 		<td class="forminp">
				 	
							<select  name="mobmenu_enabled_right_menu" id="mobmenu_enabled_right_menu">
 
        	                    <option value="true"  <?php  if ( get_option('mobmenu_opt_right_menu_enabled') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
            	                <option value="false"  <?php  if ( get_option('mobmenu_opt_right_menu_enabled') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    </select><br />
                </td>
            </tr>
			
					<!--  Option - Enable Footer Menu Toolbar  -->
					<tr>
			
                    	<td class="firstcol">Enable Footer Menu:</td>
					
                    	<td class="forminp">
					
							<select name="mobmenu_footer_menus" id="mobmenu_footer_menus">
    
                            	<option value="yes"  <?php  if ( get_option('mobmenu_opt_footer_menus') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            	<option value="no" <?php  if ( get_option('mobmenu_opt_footer_menus') == 'no' ) echo "selected='selected'"; ?>>No</option>

                        	</select><br />
                    	</td>
            		</tr>
			
			
						
		</table>
			</div>
			
			<!-- Header Settings Tab -->			
			<div id="mobmenu-tabs-2">
				<table class="widefat fixed">
			
			
				
			<!--  Option - Enable Site logo  -->
			<tr>
			
                    <td class="firstcol">
						Enable Site Logo:
					</td>
					
                    <td class="forminp">
					
						<select name="mobmenu_site_logo" id="mobmenu_site_logo">
    
                            <option value="yes"  <?php  if ( get_option('mobmenu_opt_site_logo') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            <option value="no" <?php  if ( get_option('mobmenu_opt_site_logo') == 'no' ) echo "selected='selected'"; ?>>No</option>

                        </select><br />
                    </td>
            </tr>
			
			 <!--  Option - Mobile Site Logo  -->
			<tr valign="top">
				<td>Site Logo</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_site_logo_img" type="text" size="56" name="mobmenu_site_logo_img" value="<?php echo get_option("mobmenu_opt_site_logo_img"); ?>" />
					<input id="upload_image_button" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the Header Image/Logo.
					</label>
				</td>
			</tr>
			
		
										
					<!--  Option - Header Text  -->
            		<tr>
				
						<td> Header Text: </td>
				
            	    	<td class="forminp">
							<input type="text" id="mobmenu_header_text" maxlength="15" name="mobmenu_header_text" value="<?php echo  get_option('mobmenu_opt_header_text');?>"></input>
                		</td>
				
            		</tr>
					
					<!--  Option - Header Font Size  -->
            		<tr>
				
						<td> Header Text Font Size: </td>
				
                		<td class="forminp">
							<input type="text" id="mobmenu_header_font_size"  maxlength="2" size="2" name="mobmenu_header_font_size" value="<?php echo  get_option('mobmenu_opt_header_font_size');?>">px</input>
                		</td>
				
            		</tr>
			
					<!--  Option - Header Height  -->
            		<tr>
				
						<td> Header Height: </td>
				
                		<td class="forminp">
							<input type="text" id="mobmenu_header_height"  maxlength="3" size="3" name="mobmenu_header_height" value="<?php echo  get_option('mobmenu_opt_header_height');?>">px</input>
                		</td>
				
            		</tr>
					
					<!--  Option - Header Logo Top Margin  -->
            		<tr>
				
						<td>
							Header Logo Top Margin:
						</td>
				
                		<td class="forminp">
							<input type="text" id="mobmenu_header_logo_topmargin"  maxlength="3" size="3" name="mobmenu_header_logo_topmargin" value="<?php echo  get_option('mobmenu_opt_header_logo_topmargin');?>">px</input>
		                </td>
				
        		    </tr>
					
						<tr><td colspan="2"><hr></td></tr>
			
			
			
			<!--  Option - Left Menu  -->
            <tr>
			
			    <td>
					Left Menu:
				</td>
				
                <td class="forminp">
				 
				    <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); ?>
					 
					<select name="mobmenu_left_menu" id="mobmenu_left_menu">
						
						<!--  Display all Wordpress Menus  -->
    					<?php foreach( $menus as $menu ){ ?>
							
        						<option value="<?php echo $menu->name; ?>" <?php if( get_option('mobmenu_opt_left_menu')==$menu->name) echo "selected";?> >
									<?php echo $menu->name; ?>
								</option>
									
							<?php } ?>
						</select>
					
                </td>
            </tr>
			
			<!--  Option - Left Menu Icon  -->
			<tr valign="top">
				<td>Left Menu Icon</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_left_icon" type="text" size="56" name="mobmenu_left_icon" value="<?php echo get_option("mobmenu_opt_left_icon"); ?>" />
					<input id="upload_image_licon" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the Left Menu Icon.
					</label>
				</td>
			</tr>
			
			<!--  Option - Left Menu Icon Top Margin  -->
            <tr>
				
				<td>
					Left Menu Icon Top Margin:
				</td>
				
                <td class="forminp">
					<input type="text" id="mobmenu_left_icon_topmargin"  maxlength="3" size="3" name="mobmenu_left_icon_topmargin" value="<?php echo  get_option('mobmenu_opt_left_icon_topmargin');?>">px</input>
                </td>
				
            </tr>
			
			
			<tr><td colspan="2"><hr></td></tr>
			
			
			<!--  Option -Right Menu  -->
            <tr>
			
			    <td>
					Right Menu:
				</td>
				
                <td class="forminp">
				 
				     <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); ?>
					 
					<select name="mobmenu_right_menu" id="mobmenu_right_menu">
						
						<!--  Display all Wordpress Menus  -->
    					<?php foreach( $menus as $menu ){ ?>
							
        						<option value="<?php echo $menu->name; ?>" <?php if( get_option('mobmenu_opt_right_menu')==$menu->name) echo "selected";?> >
									<?php echo $menu->name; ?>
								</option>
									
							<?php } ?>
						</select>
					
                </td>
            </tr>
			
			<!--  Option - Right Menu Icon  -->
			<tr valign="top">
				<td>Right Menu Icon</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_right_icon" type="text" size="56" name="mobmenu_right_icon" value="<?php echo get_option("mobmenu_opt_right_icon"); ?>" />
					<input id="upload_image_ricon" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the Right Menu Icon.
					</label>
				</td>
			</tr>
			
			<!--  Option - Right Menu Icon Top Margin  -->
            <tr>
				
				<td>
					Right Menu Icon Top Margin:
				</td>
				
                <td class="forminp">
					<input type="text" id="mobmenu_right_icon_topmargin"  maxlength="3" size="3" name="mobmenu_right_icon_topmargin" value="<?php echo  get_option('mobmenu_opt_right_icon_topmargin');?>">px</input>
                </td>
				
            </tr>
		
				</table>
			</div>
				
			<!-- Footer Settings Tab -->
			<div id="mobmenu-tabs-3">
				<table class="widefat fixed">
			
				<tr>
					<td class="firstcol">Footer Height</td>
			 		<td class="forminp">
						<input type="text" id="mobmenu_footer_height" maxlength="3" size="3" name="mobmenu_footer_height" value="<?php echo  get_option('mobmenu_opt_footer_height');?>"></input>px
                </td>
				
			</tr>
			
			<tr><td colspan="2"><hr></td></tr>
			
			<!--  Option - Enable/Disable First Link  -->
			<tr>
                <td>
					Enable First Link:
				</td>
                 <td class="forminp">
				 	
					<select  name="mobmenu_enabled_1stlink" id="mobmenu_enabled_1stlink">
 
                            <option value="true"  <?php  if ( get_option('mobmenu_opt_enabled_1stlink') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
                            <option value="false"  <?php  if ( get_option('mobmenu_opt_enabled_1stlink') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    </select><br />
                </td>
            </tr>
			
				
			</tr>
			<!--  Option - 1st Link Icon  -->
			<tr valign="top">
				<td>1st Link Icon</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_footer_1sticon" type="text" size="56" name="mobmenu_footer_1sticon" value="<?php echo get_option("mobmenu_opt_footer_1sticon"); ?>" />
					<input id="upload_image_ft_1sticon" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the 1st Link Icon.
					</label>
				</td>
			</tr>
			<!--  Option - 1st Link Url  -->
			<tr>
				<td>1st Link Url</td>
				<td>
					<input type="text" id="mobmenu_ft1stlinkurl" size="80" name="mobmenu_ft1stlinkurl" value="<?php echo get_option("mobmenu_opt_ft1stlinkurl");?>"  /></td>
			</tr>
			<tr>
				<td>Open 1st Link in a new Window</td>
				<td>
						<select name="mobmenu_ft1stlinknwindow" id="mobmenu_ft1stlinknwindow">
    						<option value="no" <?php  if ( get_option('mobmenu_opt_ft1stlinknwindow') == 'no' ) echo "selected='selected'"; ?>>No</option>
                            <option value="yes"  <?php  if ( get_option('mobmenu_opt_ft1stlinknwindow') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            

                        </select><br /></td>
			</tr>
				
			<tr><td colspan="2"><hr></td></tr>
			
			<!--  Option - Enable/Disable Second Link  -->
			<tr>
                <td>
					Enable Second Link:
				</td>
                 <td class="forminp">
				 	
					<select  name="mobmenu_enabled_2ndlink" id="mobmenu_enabled_2ndlink">
 
                            <option value="true"  <?php  if ( get_option('mobmenu_opt_enabled_2ndlink') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
                            <option value="false"  <?php  if ( get_option('mobmenu_opt_enabled_2ndlink') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    </select><br />
                </td>
            </tr>
				
			<!--  Option - 2nd Link Icon  -->
			<tr valign="top">
				<td>2nd Link Icon</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_footer_2ndicon" type="text" size="56" name="mobmenu_footer_2ndicon" value="<?php echo get_option("mobmenu_opt_footer_2ndicon"); ?>" />
					<input id="upload_image_ft_2ndicon" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the 2nd Link Icon.
					</label>
				</td>
			</tr>
			<!--  Option - 2nd Link Url  -->
			<tr>
				<td>2nd Link Url</td>
				<td>
					<input type="text" id="mobmenu_ft2ndlinkurl" size="80" name="mobmenu_ft2ndlinkurl" value="<?php echo get_option("mobmenu_opt_ft2ndlinkurl");?>"  /></td>
			</tr>
			<tr>
				<td>Open 2nd Link in a new Window</td>
				<td>
						<select name="mobmenu_ft2ndlinknwindow" id="mobmenu_ft2ndlinknwindow">
    						<option value="no" <?php  if ( get_option('mobmenu_opt_ft2ndlinknwindow') == 'no' ) echo "selected='selected'"; ?>>No</option>
                            <option value="yes"  <?php  if ( get_option('mobmenu_opt_ft2ndlinknwindow') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            

                        </select><br /></td>
			</tr>
			
			<tr><td colspan="2"><hr></td></tr>
			
			<!--  Option - Enable/Disable Third Link  -->
			<tr>
                <td>
					Enable Third Link:
				</td>
                 <td class="forminp">
				 	
					<select  name="mobmenu_enabled_3rdlink" id="mobmenu_enabled_3rdlink">
 
                            <option value="true"  <?php  if ( get_option('mobmenu_opt_enabled_3rdlink') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
                            <option value="false"  <?php  if ( get_option('mobmenu_opt_enabled_3rdlink') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    </select><br />
                </td>
            </tr>
			
			<!--  Option - 3rd Link Icon  -->
			<tr valign="top">
				<td>3rd Link Icon</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_footer_3rdicon" type="text" size="56" name="mobmenu_footer_3rdicon" value="<?php echo get_option("mobmenu_opt_footer_3rdicon"); ?>" />
					<input id="upload_image_ft_3rdicon" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the 3rd Link Icon.
					</label>
				</td>
			</tr>
			<!--  Option - 3rd Link Url  -->
			<tr>
				<td>3rd Link Url</td>
				<td>
					<input type="text" id="mobmenu_ft3rdlinkurl" size="80" name="mobmenu_ft3rdlinkurl" value="<?php echo get_option("mobmenu_opt_ft3rdlinkurl");?>"  /></td>
			</tr>
			<tr>
				<td>Open 3rd Link in a new Window</td>
				<td>
						<select name="mobmenu_ft3rdlinknwindow" id="mobmenu_ft3rdlinknwindow">
    						<option value="no" <?php  if ( get_option('mobmenu_opt_ft3rdlinknwindow') == 'no' ) echo "selected='selected'"; ?>>No</option>
                            <option value="yes"  <?php  if ( get_option('mobmenu_opt_ft3rdlinknwindow') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            

                        </select><br /></td>
			</tr>		
			
			<tr><td colspan="2"><hr></td></tr>
			
			<!--  Option - Enable/Disable Fourth Link  -->
			<tr>
                <td>
					Enable Fourth Link:
				</td>
                 <td class="forminp">
				 	
					<select  name="mobmenu_enabled_4thlink" id="mobmenu_enabled_4thlink">
 
                            <option value="true"  <?php  if ( get_option('mobmenu_opt_enabled_4thlink') == 'true' ) echo "selected='selected'"; ?>>Yes</option>                 
                            <option value="false"  <?php  if ( get_option('mobmenu_opt_enabled_4thlink') == 'false' ) echo "selected='selected'"; ?>>No</option>
                        
                    </select><br />
                </td>
            </tr>
				
			<!--  Option - 4th Link Icon  -->
			<tr valign="top">
				<td>4th Link Icon</td>
				<td><label for="upload_image">
				
					<input id="mobmenu_footer_4thicon" type="text" size="56" name="mobmenu_footer_4thicon" value="<?php echo get_option("mobmenu_opt_footer_4thicon"); ?>" />
					<input id="upload_image_ft_4thicon" type="button" class="button" value="Upload Image" />
					<br />Enter an URL or upload an image for the 4th Link Icon.
					</label>
				</td>
			</tr>
			<!--  Option - 4th Link Url  -->
			<tr>
				<td>4th Link Url</td>
				<td>
					<input type="text" id="mobmenu_ft4thlinkurl" size="80" name="mobmenu_ft4thlinkurl" value="<?php echo get_option("mobmenu_opt_ft4thlinkurl");?>"  /></td>
			</tr>
			<tr>
				<td>Open 4th Link in a new Window</td>
				<td>
						<select name="mobmenu_ft4thlinknwindow" id="mobmenu_ft4thlinknwindow">
    						<option value="no" <?php  if ( get_option('mobmenu_opt_ft4thlinknwindow') == 'no' ) echo "selected='selected'"; ?>>No</option>
                            <option value="yes"  <?php  if ( get_option('mobmenu_opt_ft4thlinknwindow') == 'yes' ) echo "selected='selected'"; ?>>Yes</option>  
                            

                        </select><br /></td>
			</tr>
			 			
			
				
		</table> 
			</div>
			
			<!-- Color Settings Tab -->
			<div id="mobmenu-tabs-4">
				<table class="widefat fixed">
			<tr>
				<td class="firstcol">Header Background Color:</td>
				<td>
					<input type="text" id="mobmenu_header_bgcolor" name="mobmenu_header_bgcolor" value="<?php echo get_option("mobmenu_opt_header_bgcolor");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
			
			<tr>
				<td>Header Text Color:</td>
				<td>
					<input type="text" id="mobmenu_header_textcolor" name="mobmenu_header_textcolor" value="<?php echo get_option("mobmenu_opt_header_textcolor");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
			
			<tr><td colspan="2"><hr></td></tr>	  				
			
			<tr>
				<td>Left Menu Panel Background Color:</td>
				<td>
					<input type="text" id="mobmenu_left_menu_bgcolor" name="mobmenu_left_menu_bgcolor" value="<?php echo get_option("mobmenu_opt_left_menu_bgcolor");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
									
			<tr>
				<td>Left Menu Text Color:</td>
				<td>
					<input type="text" id="mobmenu_left_text_color" name="mobmenu_left_text_color" value="<?php echo get_option("mobmenu_opt_left_text_color");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
			
			<tr>
				<td>Left Menu Text Color on Hover: </td>
				<td>
					<input type="text" id="mobmenu_left_text_color_hover" name="mobmenu_left_text_color_hover" value="<?php echo get_option("mobmenu_opt_left_text_color_hover");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
					
			
			<tr><td colspan="2"><hr></td></tr>	  				
			
			<tr>
				<td>Right Menu Panel Background Color:</td>
				<td>
					<input type="text" id="mobmenu_right_menu_bgcolor" name="mobmenu_right_menu_bgcolor" value="<?php echo get_option("mobmenu_opt_right_menu_bgcolor");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
			
			<tr>
				<td>Right Menu Text Color:</td>
				<td>
					<input type="text" id="mobmenu_right_text_color" name="mobmenu_right_text_color" value="<?php echo get_option("mobmenu_opt_right_text_color");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
			
			<tr>
				<td>Right Menu Text Color on Hover: </td>
				<td>
					<input type="text" id="mobmenu_right_text_color_hover" name="mobmenu_right_text_color_hover" value="<?php echo get_option("mobmenu_opt_right_text_color_hover");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
						
			<tr><td colspan="2"><hr></td></tr>	  				
			
			<tr>
				<td>Footer Background Color:</td>
				<td>
					<input type="text" id="mobmenu_footer_bgcolor" name="mobmenu_footer_bgcolor" value="<?php echo get_option("mobmenu_opt_footer_bgcolor");?>" class="wp-color-picker-field" data-default-color="#ffffff" /></td>
			</tr>
			</table>
			</div>		
	
		</div>
	
		<input type="hidden" name="mobmenu_update_settings" value="Y" />  
	
		<p><input type="submit" value="Save settings" class="button-primary"/></p>
		
	</form>
	
</div>