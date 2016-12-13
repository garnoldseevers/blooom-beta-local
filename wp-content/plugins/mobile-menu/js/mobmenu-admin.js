
	jQuery(document).ready(function() {
	
	  
	  
	  
		jQuery('.wp-color-picker-field').wpColorPicker();
   		jQuery("#mobmenu-admin-tabs").tabs();
    		
	
		jQuery('#upload_image_licon').click(function(e) {
				
		    e.preventDefault();
			mob_menu_save_image('#mobmenu_left_icon');
 
        	//If the uploader object has already been created, reopen the dialog
			/*
        	if (custom_uploader) {
            	custom_uploader.open();
            	return;
        }*/
 /*
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
 		attachment = null;
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_left_icon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
*/		
	});
	
	
	
	
	
	jQuery('#upload_image_ft_1sticon').click(function(e) {
				
		    e.preventDefault();
 			mob_menu_save_image('#mobmenu_footer_1sticon');
       /*
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
		
   		attachment = null;
		
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_footer_1sticon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
		*/
	});
	
	jQuery('#upload_image_ft_2ndicon').click(function(e) {
				
		    e.preventDefault();
			mob_menu_save_image('#mobmenu_footer_2ndicon');
 
        /*
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
 		attachment = null;
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_footer_2ndicon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
		*/
	});
	
	
	
	jQuery('#upload_image_ft_3rdicon').click(function(e) {
				
		    e.preventDefault();
 			mob_menu_save_image('#mobmenu_footer_3rdicon');
        
 /*
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 		
		attachment = null;
		
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_footer_3rdicon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
*/		
	});
	
	
	jQuery('#upload_image_ft_4thicon').click(function(e) {
				
		    e.preventDefault();
 			mob_menu_save_image('#mobmenu_footer_4thicon');
        
 /*
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 		
		attachment = null;
		
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_footer_3rdicon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
*/		
	});
	
	
	
	
	
	
	jQuery('#upload_image_ricon').click(function(e) {
				
		    e.preventDefault();
 			mob_menu_save_image('#mobmenu_right_icon');
 /*
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 		
		attachment = null;
		
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_right_icon').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
*/		
	});
	
	
	jQuery('#upload_image_button').click(function(e) {
				
		    e.preventDefault();
 			mob_menu_save_image('#mobmenu_site_logo_img');
			
			/*
 
         //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        attachment = null;
		
		//When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#mobmenu_site_logo_img').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
		*/
	});


	
	});
	
	function mob_menu_save_image(targetvar){
		
		  var custom_uploader;	
		
		  custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 		
		attachment = null;
		
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery(targetvar).val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
	}