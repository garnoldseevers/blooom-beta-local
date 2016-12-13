<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists('Carousel_Slider_Meta_Box') ):

class Carousel_Slider_Meta_Box {

    private $fields;

	public function __construct($fields){
        $this->fields = $fields;
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 15 );
		add_action( 'save_post', array( $this, 'save_meta_box' ) );
        add_action( 'wp_ajax_save_images', array( $this, 'save_images' ) );
	}

    /**
     * Add a custom meta box
     * 
     * @method add_meta_boxes
     */
    public function add_meta_boxes()
    {
        if( !is_array( $this->fields ) ) return false;
        add_meta_box(
            $this->fields['id'],
            $this->fields['title'],
            array( $this, 'meta_box_callback' ),
            $this->fields['page'],
            $this->fields['context'],
            $this->fields['priority'],
            $this->fields
        );
    }


    /**
     * Prints out the HTML for the edit screen section.
     * @method meta_box_callback
     * @param  string   $post   name of post type
     * @param  array $form_fields Arguments to pass into your callback function.
     *
     * @return string
     */
    public function meta_box_callback($post, $form_fields)
    {
        if( !is_array( $form_fields) ) return false;

        wp_nonce_field( basename(__FILE__), 'wpdh_meta_box_nonce' );

        echo '<table class="form-table">';

        foreach( $form_fields['args']['fields'] as $field ){

            $meta_id    = (isset($field['id'])) ? $field['id'] : strtolower(str_replace(' ', '_', $field['name']));
            $meta_name  = $this->fields['id'] . '_meta['.$meta_id. ']';
            $meta       = get_post_meta( $post->ID, $meta_id, true );
            $std        = (isset($field['std'])) ? $field['std'] : '';
            $value      = $meta ? $meta : $std;
            $desc       = (isset($field['desc'])) ? $field['desc'] : '';
            $type       = (isset($field['type'])) ? $field['type'] : 'text';

            echo sprintf('<tr><th><label for="%1$s"><strong>%2$s</strong></label></th>', $meta_id, $field['name']);

            switch( $type ){
                case 'text':
                    echo sprintf('<td><input type="text" name="%1$s" id="%2$s" value="%3$s" class="regular-text">',$meta_name, $meta_id, $value);
                break;

                case 'email':
                    echo sprintf('<td><input type="email" name="%1$s" id="%2$s" value="%3$s" class="regular-text">',$meta_name, $meta_id, $value);
                break;

                case 'number':
                    if ($value == 'zero') {
                        $value = 0;
                    }
                    echo sprintf('<td><input type="number" name="%1$s" id="%2$s" value="%3$s" class="regular-text">',$meta_name, $meta_id, $value);
                break;

                case 'url':
                    echo sprintf('<td><input type="url" name="%1$s" id="%2$s" value="%3$s" class="regular-text">',$meta_name, $meta_id, $value);
                break;

                case 'color':
                    echo sprintf('<td><input type="text" name="%1$s" id="%2$s" value="%3$s" data-default-color="%4$s" class="colorpicker">',$meta_name, $meta_id, $value, $std);
                break;

                case 'date':
                    echo sprintf('<td><input type="text" name="%1$s" id="%2$s" value="%3$s" class="datepicker">',$meta_name, $meta_id, $value);
                break;

                case 'textarea':
                    echo sprintf('<td><textarea name="%1$s" id="%2$s" rows="8" cols="50">%3$s</textarea>',$meta_name, $meta_id, $value);
                break;

                case 'select':
                    echo sprintf('<td><select name="%1$s" id="%2$s">',$meta_name, $meta_id);
                    foreach( $field['options'] as $key => $option ){
                        $selected = ( $value == $key ) ? ' selected="selected"' : '';
                        echo sprintf('<option value="%1$s" %3$s>%2$s</option>',$key, $option, $selected);
                    }
                    echo'</select>';
                break;

                case 'image_sizes':
                    $available_img_size = get_intermediate_image_sizes();
                    array_push($available_img_size, 'full');

                    echo sprintf('<td><select name="%1$s" id="%2$s">',$meta_name, $meta_id);
                    foreach( $available_img_size as $key => $option ){
                        $selected = ( $value == $option ) ? ' selected="selected"' : '';
                        echo sprintf('<option value="%1$s" %3$s>%2$s</option>',$option, $option, $selected);
                    }
                    echo'</select>';
                break;

                case 'radio':
                    echo '<td><fieldset>';
                    foreach( $field['options'] as $key => $option ){

                        $checked = ( $value == $key ) ? ' checked="checked"' : '';
                        echo sprintf('<label for="%1$s"><input type="radio" name="%4$s" id="%1$s" value="%1$s" %3$s>%2$s</label><br>',$key, $option, $checked, $meta_name);
                    }
                    echo '<fieldset>';
                break;

                case 'checkbox':
                    $checked = ( $value == 'on' ) ? ' checked' : '';
                    $label = (isset($field['label'])) ? $field['label'] : '';
                    echo sprintf( '<input type="hidden" name="%1$s" value="off">', $meta_name );
                    echo sprintf('<td><label for="%2$s"><input type="checkbox" %4$s value="on" id="%2$s" name="%1$s">%3$s</label>',$meta_name, $meta_id, $label, $checked);
                break;

                case 'file':
                    $multiple = ( isset( $field['multiple'] ) ) ? true : false;
                    ?><script>
                    jQuery(function($){
                        var frame,
                            isMultiple = "<?php echo $multiple; ?>";

                        $('#<?php echo $meta_id; ?>_button').on('click', function(e) {
                            e.preventDefault();

                            var options = {
                                state: 'insert',
                                frame: 'post',
                                multiple: isMultiple
                            };

                            frame = wp.media(options).open();

                            frame.menu.get('view').unset('gallery');
                            frame.menu.get('view').unset('featured-image');

                            frame.toolbar.get('view').set({
                                insert: {
                                    style: 'primary',
                                    text: '<?php _e("Insert", "wpdh"); ?>',

                                    click: function() {
                                        var models = frame.state().get('selection'),
                                            url = models.first().attributes.url,
                                            files = [];

                                        if( isMultiple ) {
                                            models.map (function( attachment ) {
                                                attachment = attachment.toJSON();
                                                files.push(attachment.url);
                                                url = files;
                                            });
                                        }

                                        $('#<?php echo $meta_id; ?>').val( url );

                                        frame.close();
                                    }
                                }
                            });
                        });
                    });
                    </script>

                    <?php
                    echo sprintf('<td><input type="text" name="%1$s" id="%2$s" value="%3$s" class="regular-text">',$meta_name, $meta_id, $value);
                    echo '<input type="button" class="button" name="'. $meta_id .'_button" id="'. $meta_id .'_button" value="Browse">';
                break;

                case 'images':
                    $create_btn_text    = 'Create Gallery';
                    $edit_btn_text      = 'Edit Gallery';

                    $meta = get_post_meta( $post->ID, '_wpdh_image_ids', true );
                    $thumbs_output = '';
                    $button_text = ($meta) ? $edit_btn_text : $create_btn_text;
                    if( $meta ) {
                        $thumbs = explode(',', $meta);
                        $thumbs_output = '';
                        foreach( $thumbs as $thumb ) {
                            $thumbs_output .= '<li>' . wp_get_attachment_image( $thumb, array(75,75) ) . '</li>';
                        }
                    }

                    echo sprintf('<td class="wpdh-box-%s">', $type);
                    echo sprintf('<input type="button" class="button" name="%1$s" id="wpdh_images_upload" value="%2$s">', $meta_id, $button_text);
                    echo '<input type="hidden" name="wpdh_meta[_wpdh_image_ids]" id="_wpdh_image_ids" value="' . ($meta ? $meta : 'false') . '"><br>';

                    echo sprintf('<div class="wpdh-gallery-thumbs"><ul>%s</ul></div>',$thumbs_output);
                break;

                default:
                    echo sprintf('<td><input type="text" name="%1$s" id="%2$s" value="%3$s" class="regular-text">',$meta_name, $meta_id, $value);
                break;

            }

            if (!empty($desc)) {
                echo sprintf('<p class="description">%s</p>', $desc);
            }

            echo '</td></tr>';

        }

        echo '</table>';

    }

    /**
     * Save custom meta box
     * @method save_meta_box
     * @param  int $post_id The post ID
     */
    public function save_meta_box( $post_id ) {

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;

        $postName  = $this->fields['id']. '_meta';

        if ( !isset($_POST[$postName]) || !isset($_POST['wpdh_meta_box_nonce']) || !wp_verify_nonce( $_POST['wpdh_meta_box_nonce'], basename( __FILE__ ) ) )
            return;

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) return;
        } else {
            if ( !current_user_can( 'edit_post', $post_id ) ) return;
        }

        foreach( $_POST[$postName] as $key => $val ){
            if ($key == '_margin_right' && $val == 0) {
                $val = 'zero';
            }
            update_post_meta( $post_id, $key, sanitize_text_field( $val ) );
        }
    }

    /**
     * Save images
     * @method save_images
     */
    public function save_images(){
        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
            return;
        }

        if ( !isset($_POST['ids']) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'wpdh-ajax' ) ){
            return;
        }

        if ( !current_user_can( 'edit_posts' ) ) return;

        $ids = strip_tags(rtrim($_POST['ids'], ','));
        update_post_meta($_POST['post_id'], '_wpdh_image_ids', $ids);

        $thumbs = explode(',', $ids);
        $thumbs_output = '';
        foreach( $thumbs as $thumb ) {
            $thumbs_output .= '<li>' . wp_get_attachment_image( $thumb, array(75,75) ) . '</li>';
        }

        echo $thumbs_output;

        die();
    }

}
endif;
