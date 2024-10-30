<?php

class izanai_SNS_connect {

	// =================================================
	// Property
	// =================================================

	Private $post_page_id;
	Private $invitation_on_facebook;
	Private $redirect_url;
	Private $button_character;
	Private $button_character_size;
	Private $button_character_color;
	Private $button_character_color_mouse;
	Private $button_character_color_click;
	Private $button_background_color;
	Private $button_background_color_mouse;
	Private $button_background_color_click;
	Private $button_padding_vartical;
	Private $button_padding_horizontal;
	Private $button_radius;
	Private $button_shadow;
	Private $from_for_user_name;
	Private $from_for_user;
	Private $subject_for_user;
	Private $text_for_user;
	Private $from_for_admin_name;
	Private $from_for_admin;
	Private $to_for_admin;
	Private $cc_for_admin;
	Private $bcc_for_admin;
	Private $subject_for_admin;
	Private $text_for_admin;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct($postid) {

		// basic information
		
		$this->post_page_id = $postid;
		$this->invitation_on_facebook = get_post_meta( $this->post_page_id, 'invitation_on_facebook',true);
		$this->redirect_url = get_post_meta( $this->post_page_id,  'redirect_url', true);
		$this->button_character = get_post_meta( $this->post_page_id,  'button_character', true);
		$this->button_character_size = get_post_meta( $this->post_page_id,  'button_character_size', true);
		if ( $this->button_character_size == "" ) {
			$this->button_character_size = 13;
		}
		
		// font-color and back ground color in onMouseOut
		
		$this->button_character_color = get_post_meta( $this->post_page_id,  'button_character_color', true);
		if ( $this->button_character_color == "" ) {
			$this->button_character_color = "#FFFFFF";
		}
		$this->button_background_color = get_post_meta( $this->post_page_id,  'button_background_color', true);
		if ( $this->button_background_color == "" ) {
			$this->button_background_color = "#224488";
		}
		
		// font-color and back ground color in onMouseOver
		
		$this->button_character_color_mouse = get_post_meta( $this->post_page_id,  'button_character_color_mouse', true);
		if ( $this->button_character_color_mouse == "" ) {
			$this->button_character_color_mouse = "#FFFFFF";
		}
		$this->button_background_color_mouse = get_post_meta( $this->post_page_id,  'button_background_color_mouse', true);
		if ( $this->button_background_color_mouse == "" ) {
			$this->button_background_color_mouse = "#162244";
		}
		
		// font-color and back ground color in onClick
		
		$this->button_character_color_click = get_post_meta( $this->post_page_id,  'button_character_color_click', true);
		if ( $this->button_character_color_click == "" ) {
			$this->button_character_color_click = "#224488";
		}
		$this->button_background_color_click = get_post_meta( $this->post_page_id,  'button_background_color_click', true);
		if ( $this->button_background_color_click == "" ) {
			$this->button_background_color_click = "#4488FF";
		}
		
		// padding size
		
		$this->button_padding_vartical = get_post_meta( $this->post_page_id,  'button_padding_vartical', true);
		if ( $this->button_padding_vartical == "" ) {
			$this->button_padding_vartical = 10;
		}
		$this->button_padding_horizontal = get_post_meta( $this->post_page_id,  'button_padding_horizontal', true);
		if ( $this->button_padding_horizontal == "" ) {
			$this->button_padding_horizontal = 20;
		}
		
		// radius
		
		$this->button_radius = get_post_meta( $this->post_page_id,  'button_radius', true);
		if ( $this->button_radius == "" ) {
			$this->button_radius = 0;
		}
		
		// shadow ( boolean )
		
		$this->button_shadow = get_post_meta( $this->post_page_id,  'button_shadow', true);
		if ( $this->button_shadow == "" ) {
			$this->button_shadow = 0;
		}
		
		// mail information
		
		$this->from_for_user_name = get_post_meta( $this->post_page_id,  'from_for_user_name', true);
		$this->from_for_user = get_post_meta( $this->post_page_id,  'from_for_user', true);
		$this->subject_for_user = get_post_meta( $this->post_page_id,  'subject_for_user', true);
		$this->text_for_user = get_post_meta( $this->post_page_id,  'text_for_user', true);
		$this->from_for_admin_name = get_post_meta( $this->post_page_id,  'from_for_admin_name', true);
		$this->from_for_admin = get_post_meta( $this->post_page_id,  'from_for_admin', true);
		$this->to_for_admin = get_post_meta( $this->post_page_id,  'to_for_admin', true);
		$this->cc_for_admin = get_post_meta( $this->post_page_id,  'cc_for_admin', true);
		$this->bcc_for_admin = get_post_meta( $this->post_page_id,  'bcc_for_admin', true);
		$this->subject_for_admin = get_post_meta( $this->post_page_id,  'subject_for_admin', true);
		$this->text_for_admin = get_post_meta( $this->post_page_id,  'text_for_admin', true);
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Getter
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_invitation_on_facebook() {
		$return = $this->invitation_on_facebook;
		return $return;
	}

	Public function get_redirect_url() {
		$return = $this->redirect_url;
		return $return;
	}

	Public function get_button_character() {
		$return = $this->button_character;
		return $return;
	}

	Public function get_button_character_size() {
		$return = $this->button_character_size;
		return $return;
	}

	Public function get_button_character_color() {
		$return = $this->button_character_color;
		return $return;
	}

	Public function get_button_character_color_mouse() {
		$return = $this->button_character_color_mouse;
		return $return;
	}

	Public function get_button_character_color_click() {
		$return = $this->button_character_color_click;
		return $return;
	}

	Public function get_button_background_color() {
		$return = $this->button_background_color;
		return $return;
	}

	Public function get_button_background_color_mouse() {
		$return = $this->button_background_color_mouse;
		return $return;
	}

	Public function get_button_background_color_click() {
		$return = $this->button_background_color_click;
		return $return;
	}

	Public function get_button_padding_vartical() {
		$return = $this->button_padding_vartical;
		return $return;
	}

	Public function get_button_padding_horizontal() {
		$return = $this->button_padding_horizontal;
		return $return;
	}

	Public function get_button_radius() {
		$return = $this->button_radius;
		return $return;
	}

	Public function get_button_shadow() {
		$return = $this->button_shadow;
		return $return;
	}

	Public function get_from_for_user_name() {
		$return = $this->from_for_user_name;
		return $return;
	}

	Public function get_from_for_user() {
		$return = $this->from_for_user;
		return $return;
	}

	Public function get_subject_for_user() {
		$return = $this->subject_for_user;
		return $return;
	}

	Public function get_text_for_user() {
		$return = $this->text_for_user;
		return $return;
	}

	Public function get_from_for_admin_name() {
		$return = $this->from_for_admin_name;
		return $return;
	}

	Public function get_from_for_admin() {
		$return = $this->from_for_admin;
		return $return;
	}

	Public function get_to_for_admin() {
		$return = $this->to_for_admin;
		return $return;
	}

	Public function get_cc_for_admin() {
		$return = $this->cc_for_admin;
		return $return;
	}

	Public function get_bcc_for_admin() {
		$return = $this->bcc_for_admin;
		return $return;
	}

	Public function get_subject_for_admin() {
		$return = $this->subject_for_admin;
		return $return;
	}

	Public function get_text_for_admin() {
		$return = $this->text_for_admin;
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_post_id($postid) {
		$this->post_page_id = $postid;
		$this->invitation_on_facebook = get_post_meta( $this->post_page_id, 'invitation_on_facebook',true);
		$this->redirect_url = get_post_meta( $this->post_page_id,  'redirect_url', true);
		$this->button_character = get_post_meta( $this->post_page_id,  'button_character', true);
		$this->button_character_size = get_post_meta( $this->post_page_id,  'button_character_size', true);
		$this->button_character_color = get_post_meta( $this->post_page_id,  'button_character_color', true);
		$this->button_character_color_mouse = get_post_meta( $this->post_page_id,  'button_character_color_mouse', true);
		$this->button_character_color_click = get_post_meta( $this->post_page_id,  'button_character_color_click', true);
		$this->button_background_color = get_post_meta( $this->post_page_id,  'button_background_color', true);
		$this->button_background_color_mouse = get_post_meta( $this->post_page_id,  'button_background_color_mouse', true);
		$this->button_background_color_click = get_post_meta( $this->post_page_id,  'button_background_color_click', true);
		$this->button_padding_vartical = get_post_meta( $this->post_page_id,  'button_padding_vartical', true);
		$this->button_padding_horizontal = get_post_meta( $this->post_page_id,  'button_padding_horizontal', true);
		$this->button_radius = get_post_meta( $this->post_page_id,  'button_radius', true);
		$this->button_shadow = get_post_meta( $this->post_page_id,  'button_shadow', true);
		$this->from_for_user_name = get_post_meta( $this->post_page_id,  'from_for_user_name', true);
		$this->from_for_user = get_post_meta( $this->post_page_id,  'from_for_user', true);
		$this->subject_for_user = get_post_meta( $this->post_page_id,  'subject_for_user', true);
		$this->text_for_user = get_post_meta( $this->post_page_id,  'text_for_user', true);
		$this->from_for_admin_name = get_post_meta( $this->post_page_id,  'from_for_admin_name', true);
		$this->from_for_admin = get_post_meta( $this->post_page_id,  'from_for_admin', true);
		$this->to_for_admin = get_post_meta( $this->post_page_id,  'to_for_admin', true);
		$this->cc_for_admin = get_post_meta( $this->post_page_id,  'cc_for_admin', true);
		$this->bcc_for_admin = get_post_meta( $this->post_page_id,  'bcc_for_admin', true);
		$this->subject_for_admin = get_post_meta( $this->post_page_id,  'subject_for_admin', true);
		$this->text_for_admin = get_post_meta( $this->post_page_id,  'text_for_admin', true);
	}

	Public function set_invitation_on_facebook($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'invitation_on_facebook', true ) == "" ){
			add_post_meta( $this->post_page_id, 'invitation_on_facebook', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'invitation_on_facebook', true ) ) {
			update_post_meta( $this->post_page_id, 'invitation_on_facebook', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'invitation_on_facebook', true ) != "" ){
			delete_post_meta( $this->post_page_id, 'invitation_on_facebook', get_post_meta( $this->post_page_id, 'invitation_on_facebook', true ) );
		}
		$this->invitation_on_facebook = get_post_meta( $this->post_page_id, 'invitation_on_facebook',true);
	}

	Public function set_redirect_url($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'redirect_url', true ) == "" ){
			add_post_meta( $this->post_page_id, 'redirect_url', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'redirect_url', true ) ) {
			update_post_meta( $this->post_page_id, 'redirect_url', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'redirect_url' ) != "" ){
			delete_post_meta( $this->post_page_id, 'redirect_url', get_post_meta( $this->post_page_id, 'redirect_url', true ) );
		}
		$this->redirect_url = get_post_meta( $this->post_page_id,  'redirect_url', true);
	}

	Public function set_button_character($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_character', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_character', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_character', true ) ) {
			update_post_meta( $this->post_page_id, 'button_character', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_character' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_character', get_post_meta( $this->post_page_id, 'button_character', true ) );
		}
		$this->button_character = get_post_meta( $this->post_page_id,  'button_character', true);
	}

	Public function set_button_character_size($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_character_size', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_character_size', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_character_size', true ) ) {
			update_post_meta( $this->post_page_id, 'button_character_size', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_character_size' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_character_size', get_post_meta( $this->post_page_id, 'button_character_size', true ) );
		}
		$this->button_character_size = get_post_meta( $this->post_page_id,  'button_character_size', true);
	}

	Public function set_button_character_color($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_character_color', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_character_color', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_character_color', true ) ) {
			update_post_meta( $this->post_page_id, 'button_character_color', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_character_color' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_character_color', get_post_meta( $this->post_page_id, 'button_character_color', true ) );
		}
		$this->button_character_color = get_post_meta( $this->post_page_id,  'button_character_color', true);
	}

	Public function set_button_character_color_mouse($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_character_color_mouse', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_character_color_mouse', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_character_color_mouse', true ) ) {
			update_post_meta( $this->post_page_id, 'button_character_color_mouse', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_character_color_mouse' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_character_color_mouse', get_post_meta( $this->post_page_id, 'button_character_color_mouse', true ) );
		}
		$this->button_character_color_mouse = get_post_meta( $this->post_page_id,  'button_character_color_mouse', true);
	}

	Public function set_button_character_color_click($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_character_color_click', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_character_color_click', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_character_color_click', true ) ) {
			update_post_meta( $this->post_page_id, 'button_character_color_click', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_character_color_click' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_character_color_click', get_post_meta( $this->post_page_id, 'button_character_color_click', true ) );
		}
		$this->button_character_color_click = get_post_meta( $this->post_page_id,  'button_character_color_click', true);
	}

	Public function set_button_background_color($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_background_color', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_background_color', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_background_color', true ) ) {
			update_post_meta( $this->post_page_id, 'button_background_color', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_background_color' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_background_color', get_post_meta( $this->post_page_id, 'button_background_color', true ) );
		}
		$this->button_background_color = get_post_meta( $this->post_page_id,  'button_background_color', true);
	}

	Public function set_button_background_color_mouse($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_background_color_mouse', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_background_color_mouse', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_background_color_mouse', true ) ) {
			update_post_meta( $this->post_page_id, 'button_background_color_mouse', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_background_color_mouse' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_background_color_mouse', get_post_meta( $this->post_page_id, 'button_background_color_mouse', true ) );
		}
		$this->button_background_color_mouse = get_post_meta( $this->post_page_id,  'button_background_color_mouse', true);
	}

	Public function set_button_background_color_click($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_background_color_click', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_background_color_click', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_background_color_click', true ) ) {
			update_post_meta( $this->post_page_id, 'button_background_color_click', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_background_color_click' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_background_color_click', get_post_meta( $this->post_page_id, 'button_background_color_click', true ) );
		}
		$this->button_background_color_click = get_post_meta( $this->post_page_id,  'button_background_color_click', true);
	}

	Public function set_button_padding_vartical($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_padding_vartical', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_padding_vartical', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_padding_vartical', true ) ) {
			update_post_meta( $this->post_page_id, 'button_padding_vartical', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_padding_vartical' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_padding_vartical', get_post_meta( $this->post_page_id, 'button_padding_vartical', true ) );
		}
		$this->button_padding_vartical = get_post_meta( $this->post_page_id,  'button_padding_vartical', true);
	}

	Public function set_button_padding_horizontal($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_padding_horizontal', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_padding_horizontal', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_padding_horizontal', true ) ) {
			update_post_meta( $this->post_page_id, 'button_padding_horizontal', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_padding_horizontal' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_padding_horizontal', get_post_meta( $this->post_page_id, 'button_padding_horizontal', true ) );
		}
		$this->button_padding_horizontal = get_post_meta( $this->post_page_id,  'button_padding_horizontal', true);
	}

	Public function set_button_radius($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_radius', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_radius', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_radius', true ) ) {
			update_post_meta( $this->post_page_id, 'button_radius', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_radius' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_radius', get_post_meta( $this->post_page_id, 'button_radius', true ) );
		}
		$this->button_radius = get_post_meta( $this->post_page_id,  'button_radius', true);
	}

	Public function set_button_shadow($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'button_shadow', true ) == "" ){
			add_post_meta( $this->post_page_id, 'button_shadow', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'button_shadow', true ) ) {
			update_post_meta( $this->post_page_id, 'button_shadow', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'button_shadow' ) != "" ){
			delete_post_meta( $this->post_page_id, 'button_shadow', get_post_meta( $this->post_page_id, 'button_shadow', true ) );
		}
		$this->button_shadow = get_post_meta( $this->post_page_id,  'button_shadow', true);
	}

	Public function set_from_for_user_name($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'from_for_user_name', true ) == "" ){
			add_post_meta( $this->post_page_id, 'from_for_user_name', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'from_for_user_name', true ) ) {
			update_post_meta( $this->post_page_id, 'from_for_user_name', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'from_for_user_name' ) != "" ){
			delete_post_meta( $this->post_page_id, 'from_for_user_name', get_post_meta( $this->post_page_id, 'from_for_user_name', true ) );
		}
		$this->from_for_user_name = get_post_meta( $this->post_page_id,  'from_for_user_name', true);
	}

	Public function set_from_for_user($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'from_for_user', true ) == "" ){
			add_post_meta( $this->post_page_id, 'from_for_user', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'from_for_user', true ) ) {
			update_post_meta( $this->post_page_id, 'from_for_user', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'from_for_user' ) != "" ){
			delete_post_meta( $this->post_page_id, 'from_for_user', get_post_meta( $this->post_page_id, 'from_for_user', true ) );
		}
		$this->from_for_user = get_post_meta( $this->post_page_id,  'from_for_user', true);
	}

	Public function set_subject_for_user($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'subject_for_user', true ) == "" ){
			add_post_meta( $this->post_page_id, 'subject_for_user', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'subject_for_user', true ) ) {
			update_post_meta( $this->post_page_id, 'subject_for_user', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'subject_for_user' ) != "" ){
			delete_post_meta( $this->post_page_id, 'subject_for_user', get_post_meta( $this->post_page_id, 'subject_for_user', true ) );
		}
		$this->subject_for_user = get_post_meta( $this->post_page_id,  'subject_for_user', true);
	}

	Public function set_text_for_user($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'text_for_user', true ) == "" ){
			add_post_meta( $this->post_page_id, 'text_for_user', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'text_for_user', true ) ) {
			update_post_meta( $this->post_page_id, 'text_for_user', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'text_for_user' ) != "" ){
			delete_post_meta( $this->post_page_id, 'text_for_user', get_post_meta( $this->post_page_id, 'text_for_user', true ) );
		}
		$this->text_for_user = get_post_meta( $this->post_page_id,  'text_for_user', true);
	}

	Public function set_from_for_admin_name($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'from_for_admin_name', true ) == "" ){
			add_post_meta( $this->post_page_id, 'from_for_admin_name', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'from_for_admin_name', true ) ) {
			update_post_meta( $this->post_page_id, 'from_for_admin_name', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'from_for_admin_name' ) != "" ){
			delete_post_meta( $this->post_page_id, 'from_for_admin_name', get_post_meta( $this->post_page_id, 'from_for_admin_name', true ) );
		}
		$this->from_for_admin_name = get_post_meta( $this->post_page_id,  'from_for_admin_name', true);
	}

	Public function set_from_for_admin($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'from_for_admin', true ) == "" ){
			add_post_meta( $this->post_page_id, 'from_for_admin', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'from_for_admin', true ) ) {
			update_post_meta( $this->post_page_id, 'from_for_admin', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'from_for_admin' ) != "" ){
			delete_post_meta( $this->post_page_id, 'from_for_admin', get_post_meta( $this->post_page_id, 'from_for_admin', true ) );
		}
		$this->from_for_admin = get_post_meta( $this->post_page_id,  'from_for_admin', true);
	}

	Public function set_to_for_admin($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'to_for_admin', true ) == "" ){
			add_post_meta( $this->post_page_id, 'to_for_admin', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'to_for_admin', true ) ) {
			update_post_meta( $this->post_page_id, 'to_for_admin', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'to_for_admin' ) != "" ){
			delete_post_meta( $this->post_page_id, 'to_for_admin', get_post_meta( $this->post_page_id, 'to_for_admin', true ) );
		}
		$this->to_for_admin = get_post_meta( $this->post_page_id,  'to_for_admin', true);
	}

	Public function set_cc_for_admin($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'cc_for_admin', true ) == "" ){
			add_post_meta( $this->post_page_id, 'cc_for_admin', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'cc_for_admin', true ) ) {
			update_post_meta( $this->post_page_id, 'cc_for_admin', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'cc_for_admin' ) != "" ){
			delete_post_meta( $this->post_page_id, 'cc_for_admin', get_post_meta( $this->post_page_id, 'cc_for_admin', true ) );
		}
		$this->cc_for_admin = get_post_meta( $this->post_page_id,  'cc_for_admin', true);
	}

	Public function set_bcc_for_admin($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'bcc_for_admin', true ) == "" ){
			add_post_meta( $this->post_page_id, 'bcc_for_admin', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'bcc_for_admin', true ) ) {
			update_post_meta( $this->post_page_id, 'bcc_for_admin', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'bcc_for_admin' ) != "" ){
			delete_post_meta( $this->post_page_id, 'bcc_for_admin', get_post_meta( $this->post_page_id, 'bcc_for_admin', true ) );
		}
		$this->bcc_for_admin = get_post_meta( $this->post_page_id,  'bcc_for_admin', true);
	}

	Public function set_subject_for_admin($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'subject_for_admin', true ) == "" ){
			add_post_meta( $this->post_page_id, 'subject_for_admin', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'subject_for_admin', true ) ) {
			update_post_meta( $this->post_page_id, 'subject_for_admin', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'subject_for_admin' ) != "" ){
			delete_post_meta( $this->post_page_id, 'subject_for_admin', get_post_meta( $this->post_page_id, 'subject_for_admin', true ) );
		}
		$this->subject_for_admin = get_post_meta( $this->post_page_id,  'subject_for_admin', true);
	}

	Public function set_text_for_admin($input) {
		if( $input != "" && get_post_meta( $this->post_page_id, 'text_for_admin', true ) == "" ){
			add_post_meta( $this->post_page_id, 'text_for_admin', $input, true );
		} elseif ( $input != "" && $input != get_post_meta( $this->post_page_id, 'text_for_admin', true ) ) {
			update_post_meta( $this->post_page_id, 'text_for_admin', $input );
		} elseif ( $input == "" && get_post_meta( $this->post_page_id, 'text_for_admin' ) != "" ){
			delete_post_meta( $this->post_page_id, 'text_for_admin', get_post_meta( $this->post_page_id, 'text_for_admin', true ) );
		}
		$this->text_for_admin = get_post_meta( $this->post_page_id,  'text_for_admin', true);
	}

}

?>
