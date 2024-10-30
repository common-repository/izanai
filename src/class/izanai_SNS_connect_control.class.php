<?php

class izanai_SNS_connect_control {

	// =================================================
	// Property
	// =================================================

	Private $settings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct($postid) {
		$this->settings = new izanai_SNS_connect($postid);
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Getter and Escape
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_escape_invitation_on_facebook() {
		$return = $this->settings->get_invitation_on_facebook();
		return $return;
	}

	Public function get_escape_redirect_url() {
		$return = $this->settings->get_redirect_url();
		$return = esc_url( $return );
		return $return;
	}

	Public function get_escape_button_character() {
		$return = $this->settings->get_button_character();
		return $return;
	}

	Public function get_escape_button_character_size() {
		$return = $this->settings->get_button_character_size();
		if ( $return == "" ) {
			$return = 13;
		}
		return $return;
	}

	Public function get_escape_button_character_color() {
		$return = $this->settings->get_button_character_color();
		if ( $return == "" ) {
			$return = "#FFFFFF";
		}
		return $return;
	}

	Public function get_escape_button_character_color_mouse() {
		$return = $this->settings->get_button_character_color_mouse();
		if ( $return == "" ) {
			$return = "#FFFFFF";
		}
		return $return;
	}

	Public function get_escape_button_character_color_click() {
		$return = $this->settings->get_button_character_color_click();
		if ( $return == "" ) {
			$return = "#224488";
		}
		return $return;
	}

	Public function get_escape_button_background_color() {
		$return = $this->settings->get_button_background_color();
		if ( $return == "" ) {
			$return = "#224488";
		}
		return $return;
	}

	Public function get_escape_button_background_color_mouse() {
		$return = $this->settings->get_button_background_color_mouse();
		if ( $return == "" ) {
			$return = "#162244";
		}
		return $return;
	}

	Public function get_escape_button_background_color_click() {
		$return = $this->settings->get_button_background_color_click();
		if ( $return == "" ) {
			$return = "#4488FF";
		}
		return $return;
	}

	Public function get_escape_button_padding_vartical() {
		$return = $this->settings->get_button_padding_vartical();
		if ( $return == "" ) {
			$return = 10;
		}
		return $return;
	}

	Public function get_escape_button_padding_horizontal() {
		$return = $this->settings->get_button_padding_horizontal();
		if ( $return == "" ) {
			$return = 20;
		}
		return $return;
	}

	Public function get_escape_button_radius() {
		$return = $this->settings->get_button_radius();
		if ( $return == "" ) {
			$return = 0;
		}
		return $return;
	}

	Public function get_escape_button_shadow() {
		$return = $this->settings->get_button_shadow();
		if ( $return == "" ) {
			$return = 0;
		}
		return $return;
	}

	Public function get_escape_from_for_user_name() {
		$return = $this->settings->get_from_for_user_name();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_from_for_user() {
		$return = $this->settings->get_from_for_user();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_subject_for_user() {
		$return = $this->settings->get_subject_for_user();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_text_for_user() {
		$return = $this->settings->get_text_for_user();
		$return = esc_textarea( $return );
		return $return;
	}

	Public function get_escape_from_for_admin_name() {
		$return = $this->settings->get_from_for_admin_name();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_from_for_admin() {
		$return = $this->settings->get_from_for_admin();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_to_for_admin() {
		$return = $this->settings->get_to_for_admin();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_cc_for_admin() {
		$return = $this->settings->get_cc_for_admin();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_bcc_for_admin() {
		$return = $this->settings->get_bcc_for_admin();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_subject_for_admin() {
		$return = $this->settings->get_subject_for_admin();
		$return = esc_html( $return );
		return $return;
	}

	Public function get_escape_text_for_admin() {
		$return = $this->settings->get_text_for_admin();
		$return = esc_textarea( $return );
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Getter
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_invitation_on_facebook() {
		$return = $this->settings->get_invitation_on_facebook();
		return $return;
	}

	Public function get_redirect_url() {
		$return = $this->settings->get_redirect_url();
		return $return;
	}

	Public function get_button_character() {
		$return = $this->settings->get_button_character();
		if ( $return == "" ) {
			$return = "Facebook Login";
		}
		return $return;
	}

	Public function get_button_character_size() {
		$return = $this->settings->get_button_character_size();
		if ( $return == "" ) {
			$return = 13;
		}
		return $return;
	}

	Public function get_button_character_color() {
		$return = $this->settings->get_button_character_color();
		if ( $return == "" ) {
			$return = "#FFFFFF";
		}
		return $return;
	}

	Public function get_button_character_color_mouse() {
		$return = $this->settings->get_button_character_color_mouse();
		if ( $return == "" ) {
			$return = "#FFFFFF";
		}
		return $return;
	}

	Public function get_button_character_color_click() {
		$return = $this->settings->get_button_character_color_click();
		if ( $return == "" ) {
			$return = "#224488";
		}
		return $return;
	}

	Public function get_button_background_color() {
		$return = $this->settings->get_button_background_color();
		if ( $return == "" ) {
			$return = "#224488";
		}
		return $return;
	}

	Public function get_button_background_color_mouse() {
		$return = $this->settings->get_button_background_color_mouse();
		if ( $return == "" ) {
			$return = "#162244";
		}
		return $return;
	}

	Public function get_button_background_color_click() {
		$return = $this->settings->get_button_background_color_click();
		if ( $return == "" ) {
			$return = "#4488FF";
		}
		return $return;
	}

	Public function get_button_padding_vartical() {
		$return = $this->settings->get_button_padding_vartical();
		if ( $return == "" ) {
			$return = 10;
		}
		return $return;
	}

	Public function get_button_padding_horizontal() {
		$return = $this->settings->get_button_padding_horizontal();
		if ( $return == "" ) {
			$return = 20;
		}
		return $return;
	}

	Public function get_button_radius() {
		$return = $this->settings->get_button_radius();
		if ( $return == "" ) {
			$return = 0;
		}
		return $return;
	}

	Public function get_button_shadow() {
		$return = $this->settings->get_button_shadow();
		if ( $return == "" ) {
			$return = 0;
		}
		return $return;
	}

	Public function get_from_for_user_name() {
		$return = $this->settings->get_from_for_user_name();
		return $return;
	}

	Public function get_from_for_user() {
		$return = $this->settings->get_from_for_user();
		return $return;
	}

	Public function get_subject_for_user() {
		$return = $this->settings->get_subject_for_user();
		return $return;
	}

	Public function get_text_for_user() {
		$return = $this->settings->get_text_for_user();
		return $return;
	}

	Public function get_from_for_admin_name() {
		$return = $this->settings->get_from_for_admin_name();
		return $return;
	}

	Public function get_from_for_admin() {
		$return = $this->settings->get_from_for_admin();
		return $return;
	}

	Public function get_to_for_admin() {
		$return = $this->settings->get_to_for_admin();
		return $return;
	}

	Public function get_cc_for_admin() {
		$return = $this->settings->get_cc_for_admin();
		return $return;
	}

	Public function get_bcc_for_admin() {
		$return = $this->settings->get_bcc_for_admin();
		return $return;
	}

	Public function get_subject_for_admin() {
		$return = $this->settings->get_subject_for_admin();
		return $return;
	}

	Public function get_text_for_admin() {
		$return = $this->settings->get_text_for_admin();
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_post_id($postid) {
		$settings = new izanai_SNS_connect($postid);
	}

	Public function set_invitation_on_facebook($input) {
		$this->settings->set_invitation_on_facebook($input);
	}

	Public function set_redirect_url($input) {
		$this->settings->set_redirect_url($input);
	}

	Public function set_button_character($input) {
		$this->settings->set_button_character($input);
	}

	Public function set_button_character_size($input) {
		$this->settings->set_button_character_size($input);
	}

	Public function set_button_character_color($input) {
		$this->settings->set_button_character_color($input);
	}

	Public function set_button_character_color_mouse($input) {
		$this->settings->set_button_character_color_mouse($input);
	}

	Public function set_button_character_color_click($input) {
		$this->settings->set_button_character_color_click($input);
	}

	Public function set_button_background_color($input) {
		$this->settings->set_button_background_color($input);
	}

	Public function set_button_background_color_mouse($input) {
		$this->settings->set_button_background_color_mouse($input);
	}

	Public function set_button_background_color_click($input) {
		$this->settings->set_button_background_color_click($input);
	}

	Public function set_button_padding_vartical($input) {
		$this->settings->set_button_padding_vartical($input);
	}

	Public function set_button_padding_horizontal($input) {
		$this->settings->set_button_padding_horizontal($input);
	}

	Public function set_button_radius($input) {
		$this->settings->set_button_radius($input);
	}

	Public function set_button_shadow($input) {
		$this->settings->set_button_shadow($input);
	}

	Public function set_from_for_user_name($input) {
		$this->settings->set_from_for_user_name($input);
	}

	Public function set_from_for_user($input) {
		$this->settings->set_from_for_user($input);
	}

	Public function set_subject_for_user($input) {
		$this->settings->set_subject_for_user($input);
	}

	Public function set_text_for_user($input) {
		$this->settings->set_text_for_user($input);
	}

	Public function set_from_for_admin_name($input) {
		$this->settings->set_from_for_admin_name($input);
	}

	Public function set_from_for_admin($input) {
		$this->settings->set_from_for_admin($input);
	}

	Public function set_to_for_admin($input) {
		$this->settings->set_to_for_admin($input);
	}

	Public function set_cc_for_admin($input) {
		$this->settings->set_cc_for_admin($input);
	}

	Public function set_bcc_for_admin($input) {
		$this->settings->set_bcc_for_admin($input);
	}

	Public function set_subject_for_admin($input) {
		$this->settings->set_subject_for_admin($input);
	}

	Public function set_text_for_admin($input) {
		$this->settings->set_text_for_admin($input);
	}

}

?>
