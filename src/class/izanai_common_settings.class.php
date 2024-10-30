<?php

class izanai_common_settings {

	// =================================================
	// Property
	// =================================================

	Private $facebook_app_id;
	Private $facebook_app_secret;
	Private $want_facebook_user_birthday;
	Private $want_facebook_user_location;
	Private $default_from_for_user_name;
	Private $default_from_for_user;
	Private $default_from_for_admin_name;
	Private $default_from_for_admin;
	Private $default_to_for_admin;
	Private $default_cc_for_admin;
	Private $default_bcc_for_admin;
	Private $cancel_from_for_user_name;
	Private $cancel_from_for_user;
	Private $cancel_subject_for_user;
	Private $cancel_text_for_user;
	Private $cancel_from_for_admin_name;
	Private $cancel_from_for_admin;
	Private $cancel_to_for_admin;
	Private $cancel_cc_for_admin;
	Private $cancel_bcc_for_admin;
	Private $cancel_subject_for_admin;
	Private $cancel_text_for_admin;
	Private $csv_encodings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->facebook_app_id = get_option( 'facebook_app_id' );
		$this->facebook_app_secret = get_option( 'facebook_app_secret' );
		$this->want_facebook_user_birthday = get_option( 'want_facebook_user_birthday' );
		if ( $this->want_facebook_user_birthday != true && $this->want_facebook_user_birthday != false ) {
			update_option('want_facebook_user_birthday', true );
			$this->want_facebook_user_birthday = true;
		}
		$this->want_facebook_user_location = get_option( 'want_facebook_user_location' );
		if ( $this->want_facebook_user_location != true && $this->want_facebook_user_location != false ) {
			update_option('want_facebook_user_location', true );
			$this->want_facebook_user_location = true;
		}
		$this->default_from_for_user_name = get_option( 'default_from_for_user_name' );
		$this->default_from_for_user = get_option( 'default_from_for_user' );
		$this->default_from_for_admin_name = get_option( 'default_from_for_admin_name' );
		$this->default_from_for_admin = get_option( 'default_from_for_admin' );
		$this->default_to_for_admin = get_option( 'default_to_for_admin' );
		$this->default_cc_for_admin = get_option( 'default_cc_for_admin' );
		$this->default_bcc_for_admin = get_option( 'default_bcc_for_admin' );
		$this->cancel_from_for_user_name = get_option( 'cancel_from_for_user_name' );
		$this->cancel_from_for_user = get_option( 'cancel_from_for_user' );
		$this->cancel_subject_for_user = get_option( 'cancel_subject_for_user' );
		$this->cancel_text_for_user = get_option( 'cancel_text_for_user' );
		$this->cancel_from_for_admin_name = get_option( 'cancel_from_for_admin_name' );
		$this->cancel_from_for_admin = get_option( 'cancel_from_for_admin' );
		$this->cancel_to_for_admin = get_option( 'cancel_to_for_admin' );
		$this->cancel_cc_for_admin = get_option( 'cancel_cc_for_admin' );
		$this->cancel_bcc_for_admin = get_option( 'cancel_bcc_for_admin' );
		$this->cancel_subject_for_admin = get_option( 'cancel_subject_for_admin' );
		$this->cancel_text_for_admin = get_option( 'cancel_text_for_admin' );
		$this->csv_encodings = get_option( 'csv_encodings' );
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Getter
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_facebook_app_id() {
		return $this->facebook_app_id;
	}

	Public function get_facebook_app_secret() {
		return $this->facebook_app_secret;
	}

	Public function get_want_facebook_user_birthday() {
		return $this->want_facebook_user_birthday;
	}

	Public function get_want_facebook_user_location() {
		return $this->want_facebook_user_location;
	}

	Public function get_default_from_for_user_name() {
		return $this->default_from_for_user_name;
	}

	Public function get_default_from_for_user() {
		return $this->default_from_for_user;
	}

	Public function get_default_from_for_admin_name() {
		return $this->default_from_for_admin_name;
	}

	Public function get_default_from_for_admin() {
		return $this->default_from_for_admin;
	}

	Public function get_default_to_for_admin() {
		return $this->default_to_for_admin;
	}

	Public function get_default_cc_for_admin() {
		return $this->default_cc_for_admin;
	}

	Public function get_default_bcc_for_admin() {
		return $this->default_bcc_for_admin;
	}

	Public function get_cancel_from_for_user_name() {
		return $this->cancel_from_for_user_name;
	}

	Public function get_cancel_from_for_user() {
		return $this->cancel_from_for_user;
	}

	Public function get_cancel_subject_for_user() {
		return $this->cancel_subject_for_user;
	}

	Public function get_cancel_text_for_user() {
		return $this->cancel_text_for_user;
	}

	Public function get_cancel_from_for_admin_name() {
		return $this->cancel_from_for_admin_name;
	}

	Public function get_cancel_from_for_admin() {
		return $this->cancel_from_for_admin;
	}

	Public function get_cancel_to_for_admin() {
		return $this->cancel_to_for_admin;
	}

	Public function get_cancel_cc_for_admin() {
		return $this->cancel_cc_for_admin;
	}

	Public function get_cancel_bcc_for_admin() {
		return $this->cancel_bcc_for_admin;
	}

	Public function get_cancel_subject_for_admin() {
		return $this->cancel_subject_for_admin;
	}

	Public function get_cancel_text_for_admin() {
		return $this->cancel_text_for_admin;
	}

	Public function get_csv_encodings() {
		return $this->csv_encodings;
	}


	// -----------------------------------------------------------------------------------------------------------------
	// Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_facebook_app_id($input) {
		update_option('facebook_app_id', $input);
		$this->facebook_app_id = get_option( 'facebook_app_id' );
	}

	Public function set_facebook_app_secret($input) {
		update_option('facebook_app_secret', $input);
		$this->facebook_app_secret = get_option( 'facebook_app_secret' );
	}

	Public function set_want_facebook_user_birthday($input) {
		update_option('want_facebook_user_birthday', $input);
		$this->want_facebook_user_birthday = get_option( 'want_facebook_user_birthday' );
	}

	Public function set_want_facebook_user_location($input) {
		update_option('want_facebook_user_location', $input);
		$this->want_facebook_user_location = get_option( 'want_facebook_user_location' );
	}

	Public function set_default_from_for_user_name($input) {
		update_option('default_from_for_user_name', $input);
		$this->default_from_for_user_name = get_option( 'default_from_for_user_name' );
	}

	Public function set_default_from_for_user($input) {
		update_option('default_from_for_user', $input);
		$this->default_from_for_user = get_option( 'default_from_for_user' );
	}

	Public function set_default_from_for_admin_name($input) {
		update_option('default_from_for_admin_name', $input);
		$this->default_from_for_admin_name = get_option( 'default_from_for_admin_name' );
	}

	Public function set_default_from_for_admin($input) {
		update_option('default_from_for_admin', $input);
		$this->default_from_for_admin = get_option( 'default_from_for_admin' );
	}

	Public function set_default_to_for_admin($input) {
		update_option('default_to_for_admin', $input);
		$this->default_to_for_admin = get_option( 'default_to_for_admin' );
	}

	Public function set_default_cc_for_admin($input) {
		update_option('default_cc_for_admin', $input);
		$this->default_cc_for_admin = get_option( 'default_cc_for_admin' );
	}

	Public function set_default_bcc_for_admin($input) {
		update_option('default_bcc_for_admin', $input);
		$this->default_bcc_for_admin = get_option( 'default_bcc_for_admin' );
	}

	Public function set_cancel_from_for_user_name($input) {
		update_option('cancel_from_for_user_name', $input);
		$this->cancel_from_for_user_name = get_option( 'cancel_from_for_user_name' );
	}

	Public function set_cancel_from_for_user($input) {
		update_option('cancel_from_for_user', $input);
		$this->cancel_from_for_user = get_option( 'cancel_from_for_user' );
	}

	Public function set_cancel_subject_for_user($input) {
		update_option('cancel_subject_for_user', $input);
		$this->cancel_subject_for_user = get_option( 'cancel_subject_for_user' );
	}

	Public function set_cancel_text_for_user($input) {
		update_option('cancel_text_for_user', $input);
		$this->cancel_text_for_user = get_option( 'cancel_text_for_user' );
	}

	Public function set_cancel_from_for_admin_name($input) {
		update_option('cancel_from_for_admin_name', $input);
		$this->cancel_from_for_admin_name = get_option( 'cancel_from_for_admin_name' );
	}

	Public function set_cancel_from_for_admin($input) {
		update_option('cancel_from_for_admin', $input);
		$this->cancel_from_for_admin = get_option( 'cancel_from_for_admin' );
	}

	Public function set_cancel_to_for_admin($input) {
		update_option('cancel_to_for_admin', $input);
		$this->cancel_to_for_admin = get_option( 'cancel_to_for_admin' );
	}

	Public function set_cancel_cc_for_admin($input) {
		update_option('cancel_cc_for_admin', $input);
		$this->cancel_cc_for_admin = get_option( 'cancel_cc_for_admin' );
	}

	Public function set_cancel_bcc_for_admin($input) {
		update_option('cancel_bcc_for_admin', $input);
		$this->cancel_bcc_for_admin = get_option( 'cancel_bcc_for_admin' );
	}

	Public function set_cancel_subject_for_admin($input) {
		update_option('cancel_subject_for_admin', $input);
		$this->cancel_subject_for_admin = get_option( 'cancel_subject_for_admin' );
	}

	Public function set_cancel_text_for_admin($input) {
		update_option('cancel_text_for_admin', $input);
		$this->cancel_text_for_admin = get_option( 'cancel_text_for_admin' );
	}

	Public function set_csv_encodings($input) {
		update_option('csv_encodings', $input);
		$this->csv_encodings = get_option( 'csv_encodings' );
	}

}

?>