<?php

class izanai_SNS_connect_settings_view {

	// =================================================
	// Property
	// =================================================

	Private $function_name;
	Private $post_page_id;
	Private $SNS_settings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->function_name = __( 'Invitation on Facebook', IZANAI_DOMAIN );
		add_action('admin_menu', array( $this, 'add_izanai_meta_box_for_post_page' ) );
		add_action('save_post', array( $this, 'save_data_izanai_meta_box_for_post_page' ) );
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Add izanai-Meta-Box to posts and pages
	// -----------------------------------------------------------------------------------------------------------------

	Public function add_izanai_meta_box_for_post_page() {
		add_meta_box('mail_setting_post', $this->function_name, array( $this, 'view_izanai_meta_box_for_post_page' ), 'post', 'normal', 'high');
		add_meta_box('mail_setting_page', $this->function_name, array( $this, 'view_izanai_meta_box_for_post_page' ), 'page', 'normal', 'high');
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Difinite izanai-Meta-Box
	// -----------------------------------------------------------------------------------------------------------------

	Public function view_izanai_meta_box_for_post_page() {
		global $post;
		wp_nonce_field( wp_create_nonce(__FILE__), 'my_nonce');
		// initialize
		$this->post_page_id = get_the_ID();
		$this->SNS_settings = new izanai_SNS_connect_control( $this->post_page_id );
		// load data
		$invitation_on_facebook = $this->SNS_settings->get_escape_invitation_on_facebook();
		$redirect_url = $this->SNS_settings->get_escape_redirect_url();
		$button_character = $this->SNS_settings->get_escape_button_character();
		$button_character_size = $this->SNS_settings->get_escape_button_character_size();
		$button_character_color = $this->SNS_settings->get_escape_button_character_color();
		$button_character_color_mouse = $this->SNS_settings->get_escape_button_character_color_mouse();
		$button_character_color_click = $this->SNS_settings->get_escape_button_character_color_click();
		$button_background_color = $this->SNS_settings->get_escape_button_background_color();
		$button_background_color_mouse = $this->SNS_settings->get_escape_button_background_color_mouse();
		$button_background_color_click = $this->SNS_settings->get_escape_button_background_color_click();
		$button_padding_vartical = $this->SNS_settings->get_escape_button_padding_vartical();
		$button_padding_horizontal = $this->SNS_settings->get_escape_button_padding_horizontal();
		$button_radius = $this->SNS_settings->get_escape_button_radius();
		$button_shadow = $this->SNS_settings->get_escape_button_shadow();
		$from_for_user_name = $this->SNS_settings->get_escape_from_for_user_name();
		$from_for_user = $this->SNS_settings->get_escape_from_for_user();
		$subject_for_user = $this->SNS_settings->get_escape_subject_for_user();
		$text_for_user = $this->SNS_settings->get_escape_text_for_user();
		$from_for_admin_name = $this->SNS_settings->get_escape_from_for_admin_name();
		$from_for_admin = $this->SNS_settings->get_escape_from_for_admin();
		$to_for_admin = $this->SNS_settings->get_escape_to_for_admin();
		$cc_for_admin = $this->SNS_settings->get_escape_cc_for_admin();
		$bcc_for_admin = $this->SNS_settings->get_escape_bcc_for_admin();
		$subject_for_admin = $this->SNS_settings->get_escape_subject_for_admin();
		$text_for_admin = $this->SNS_settings->get_escape_text_for_admin();

		// Set the radio-button to input whether you use the invitation tool for facebook or not.
		echo  __( 'If you want to see the manual of this plugin, see the manual site. ' , IZANAI_DOMAIN ) . "<a href=\"" . IZANAI_MANUAL_SITE . "\">" . IZANAI_MANUAL_SITE . "</a><br>";
		echo '<hr>';
		echo '<p><b>' . __( 'Invitation On Facebook - Settings', IZANAI_DOMAIN ) . '</b></p>';
		if ( $invitation_on_facebook == "" ) {
			$invitation_on_facebook = __( 'No invitation', IZANAI_DOMAIN );
		}
		$options = array( __( 'No invitation', IZANAI_DOMAIN ), __( 'Set the facebook invitation button', IZANAI_DOMAIN ), __( 'Force to invite on facebook', IZANAI_DOMAIN ) );
		$n = count($options);
		for ($i=0; $i<$n; $i++) {
			$option = $options[$i];
			if ($option == $invitation_on_facebook ) {
			echo '<input type="radio" name="invitation_on_facebook" value="'. esc_html($option) .'" checked > '. $option .' ';
			} else {
			echo '<input type="radio" name="invitation_on_facebook" value="'. esc_html($option) .'" > '. $option .' ';
			}
		}

		// Set the form to input redirect-URL
		echo '<hr>';
		echo '<p><b>' . __( 'Ridirect-URL after facebook registration', IZANAI_DOMAIN ) . ' </b> ' . __( '(If you input nothing, the redirect is not occurred.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="redirect_url">' . __( 'Ridirect-URL after facebook registration', IZANAI_DOMAIN ) . '</label><input type="text" name="redirect_url" style="width:100%" value="'. $redirect_url .'" />';

		// Set the button view
		echo '<hr>';
		echo '<p><b>' . __( 'Facebook-Login-Button Settings', IZANAI_DOMAIN ) . '</b></p>';
		echo '<p>' . __( 'Comment of Login-Button in "Set the facebook invitation button" mode. ( If you input nothing, "Facebook Login" is displayed. )', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="button_character">' . __( 'Comment of Login-Button in "Set the facebook invitation button" mode.', IZANAI_DOMAIN ) . '</label><input type="text" name="button_character" style="width:30%" value="'. $button_character .'" />';

		echo '<p>' . __( 'Set the size and the shape of Login-Button in "Set the facebook invitation button" mode.', IZANAI_DOMAIN ) . '</p>';
		echo '<table border="1" cellspacing="0">';
		echo '<tr>';
		echo     '<td>' . __( 'Character Size (px)', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'Vertical Margin Size (px)', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'Horizontal Margin Size (px)', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'Corner Roundings (px)', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'Shadow Size (px)', IZANAI_DOMAIN ) . '</td>';
		echo '</tr>';
		echo '<tr>';
		echo     '<td>' . '<input type="number" name="button_character_size" value="'. $button_character_size .'" />' . ' px</td>';
		echo     '<td>' . '<input type="number" name="button_padding_vartical" value="'. $button_padding_vartical .'" />' . ' px</td>';
		echo     '<td>' . '<input type="number" name="button_padding_horizontal" value="'. $button_padding_horizontal .'" />' . ' px</td>';
		echo     '<td>' . '<input type="number" name="button_radius" value="'. $button_radius .'" />' . ' px</td>';
		echo     '<td>' . '<input type="number" name="button_shadow" value="'. $button_shadow .'" />' . ' px</td>';
		echo '</tr>';
		echo '</table>';

		echo '<p>' . __( 'Set the below colors of Login-Button in "Set the facebook invitation button" mode.', IZANAI_DOMAIN ) . '</p>';
		echo '<table border="1" cellspacing="0">';
		echo '<tr>';
		echo     '<td>' . __( 'Where', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'Mouse Out', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'Mouse Over', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . __( 'On Click', IZANAI_DOMAIN ) . '</td>';
		echo '</tr>';
		echo '<tr>';
		echo     '<td>' . __( 'Character Color', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . '<input type="color" name="button_character_color" style="width:100px" value="'. $button_character_color .'" />' . '</td>';
		echo     '<td>' . '<input type="color" name="button_character_color_mouse" style="width:100px" value="'. $button_character_color_mouse .'" />' . '</td>';
		echo     '<td>' . '<input type="color" name="button_character_color_click" style="width:100px" value="'. $button_character_color_click .'" />' . '</td>';
		echo '</tr>';
		echo '<tr>';
		echo     '<td>' . __( 'Button Color', IZANAI_DOMAIN ) . '</td>';
		echo     '<td>' . '<input type="color" name="button_background_color" style="width:100px" value="'. $button_background_color .'" />' . '</td>';
		echo     '<td>' . '<input type="color" name="button_background_color_mouse" style="width:100px" value="'. $button_background_color_mouse .'" />' . '</td>';
		echo     '<td>' . '<input type="color" name="button_background_color_click" style="width:100px" value="'. $button_background_color_click .'" />' . '</td>';
		echo '</tr>';
		echo '</table>';

		// Set the form to input the mail-information for the registered user.
		echo '<hr>';
		echo '<p><b>' . __( 'Inpu the mail-information for the registered user.' , IZANAI_DOMAIN ) .'</b></p>';
		echo '<p>' . __( 'Name of From: for the registered user ( If you input nothing, the name in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="from_for_user_name">' . __( 'Name of From: for the registered user ( If you input nothing, the name in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="from_for_user_name" style="width:100%" value="'. $from_for_user_name .'" />';
		echo '<p>' . __( 'From: for the registered user ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="from_for_user">' . __( 'From: for the registered user ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="from_for_user" style="width:100%" value="'. $from_for_user .'" />';
		echo '<p>' . __( 'Subject: for the registered user. If you input nothing, the subject is setted to...', IZANAI_DOMAIN ) . 'From ' . get_bloginfo('name') . '</p>';
		echo '<label class="hidden" for="subject_for_user">' . __( 'mail subject', IZANAI_DOMAIN ) . '</label><input type="text" name="subject_for_user" style="width:100%" value="'. $subject_for_user .'" />';
		echo '<p>' . __( 'Text: for the registered user ( If you input nothing, the mail is not sent.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="text_for_user">' . __( 'Text: for the registered user', IZANAI_DOMAIN ) . '</label><textarea name="text_for_user" style="width:100%;height:200px;">'. $text_for_user .'</textarea>';

		// Set the form to input the mail-information for the site administrator.
		echo '<hr>';
		echo '<p><b>' . __( 'Inpu the mail-information for the site administrator.' , IZANAI_DOMAIN ) .'</b></p>';
		echo '<p>' . __( 'Name of From: for the site administrator ( If you input nothing, the name in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="from_for_admin_name">'. __( 'Name of From: for the site administrator ( If you input nothing, the name in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="from_for_admin_name" style="width:100%" value="'. $from_for_admin_name .'" />';
		echo '<p>' . __( 'From: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="from_for_admin">'. __( 'From: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="from_for_admin" style="width:100%" value="'. $from_for_admin .'" />';
		echo '<p>' . __( 'To: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="to_for_admin">' . __( 'To: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="to_for_admin" style="width:100%" value="'. $to_for_admin .'" />';
		echo '<p>' . __( 'Cc: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="cc_for_admin">' . __( 'Cc: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="cc_for_admin" style="width:100%" value="'. $cc_for_admin .'" />';
		echo '<p>' . __( 'Bcc: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="bcc_for_admin">' . __( 'Bcc: for the site administrator ( If you input nothing, the address in izanai-Settings is assigned.)', IZANAI_DOMAIN ) . '</label><input type="text" name="bcc_for_admin" style="width:100%" value="'. $bcc_for_admin .'" />';
		echo '<p>' . __( 'Subject: for the site administrator. If you input nothing, the subject is setted to...', IZANAI_DOMAIN ) . 'From ' . get_bloginfo('name') . '</p>';
		echo '<label class="hidden" for="subject_for_admin">' . __( 'mail subject for the site administrator', IZANAI_DOMAIN ) . '</label><input type="text" name="subject_for_admin" style="width:100%" value="'. $subject_for_admin .'" />';
		echo '<p>' . __( 'Text: for the site administrator ( If you input nothing, the mail is not sent.)', IZANAI_DOMAIN ) . '</p>';
		echo '<label class="hidden" for="text_for_admin">' . __( 'Text: for the site administrator', IZANAI_DOMAIN ) . '</label><textarea name="text_for_admin" style="width:100%;height:200px;">'. $text_for_admin .'</textarea>';

	}

	// -----------------------------------------------------------------------------------------------------------------
	//  Save data in izanai-Meta-Box
	// -----------------------------------------------------------------------------------------------------------------

	function save_data_izanai_meta_box_for_post_page($post_id){
		// check error
		$my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;
		if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {
			return $post_id;
		}
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
		if(!current_user_can('edit_post', $post_id)) { return $post_id; }
		// initialize
		$this->post_page_id = get_the_ID();
		$this->SNS_settings = new izanai_SNS_connect_control( $this->post_page_id );
		// save data
		$this->SNS_settings = new izanai_SNS_connect_control( $this->post_page_id );
		$this->SNS_settings->set_invitation_on_facebook( $_POST['invitation_on_facebook'] );
		$this->SNS_settings->set_redirect_url( $_POST['redirect_url'] );
		$this->SNS_settings->set_button_character( $_POST['button_character'] );
		$this->SNS_settings->set_button_character_size( $_POST['button_character_size'] );
		$this->SNS_settings->set_button_character_color( $_POST['button_character_color'] );
		$this->SNS_settings->set_button_character_color_mouse( $_POST['button_character_color_mouse'] );
		$this->SNS_settings->set_button_character_color_click( $_POST['button_character_color_click'] );
		$this->SNS_settings->set_button_background_color( $_POST['button_background_color'] );
		$this->SNS_settings->set_button_background_color_mouse( $_POST['button_background_color_mouse'] );
		$this->SNS_settings->set_button_background_color_click( $_POST['button_background_color_click'] );
		$this->SNS_settings->set_button_padding_vartical( $_POST['button_padding_vartical'] );
		$this->SNS_settings->set_button_padding_horizontal( $_POST['button_padding_horizontal'] );
		$this->SNS_settings->set_button_radius( $_POST['button_radius'] );
		$this->SNS_settings->set_button_shadow( $_POST['button_shadow'] );
		$this->SNS_settings->set_from_for_user_name( $_POST['from_for_user_name'] );
		$this->SNS_settings->set_from_for_user( $_POST['from_for_user'] );
		$this->SNS_settings->set_subject_for_user( $_POST['subject_for_user'] );
		$this->SNS_settings->set_text_for_user( $_POST['text_for_user'] );
		$this->SNS_settings->set_from_for_admin_name( $_POST['from_for_admin_name'] );
		$this->SNS_settings->set_from_for_admin( $_POST['from_for_admin'] );
		$this->SNS_settings->set_to_for_admin( $_POST['to_for_admin'] );
		$this->SNS_settings->set_cc_for_admin( $_POST['cc_for_admin'] );
		$this->SNS_settings->set_bcc_for_admin( $_POST['bcc_for_admin'] );
		$this->SNS_settings->set_subject_for_admin( $_POST['subject_for_admin'] );
		$this->SNS_settings->set_text_for_admin( $_POST['text_for_admin'] );
	}

}

?>
