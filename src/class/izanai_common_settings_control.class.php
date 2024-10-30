<?php

class izanai_common_settings_control {

	// =================================================
	// Property
	// =================================================

	Private $settings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->settings = new izanai_common_settings();
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Getter
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_facebook_app_id() {
		$return = $this->settings->get_facebook_app_id();
		return $return;
	}

	Public function get_facebook_app_secret() {
		$return = $this->settings->get_facebook_app_secret();
		return $return;
	}

	Public function get_want_facebook_user_birthday() {
		$return = $this->settings->get_want_facebook_user_birthday();
		return $return;
	}

	Public function get_want_facebook_user_location() {
		$return = $this->settings->get_want_facebook_user_location();
		return $return;
	}

	Public function get_default_from_for_user_name() {
		$return = $this->settings->get_default_from_for_user_name();
		return $return;
	}

	Public function get_default_from_for_user() {
		$return = $this->settings->get_default_from_for_user();
		return $return;
	}

	Public function get_default_from_for_admin_name() {
		$return = $this->settings->get_default_from_for_admin_name();
		return $return;
	}

	Public function get_default_from_for_admin() {
		$return = $this->settings->get_default_from_for_admin();
		return $return;
	}

	Public function get_default_to_for_admin() {
		$return = $this->settings->get_default_to_for_admin();
		return $return;
	}

	Public function get_default_cc_for_admin() {
		$return = $this->settings->get_default_cc_for_admin();
		return $return;
	}

	Public function get_default_bcc_for_admin() {
		$return = $this->settings->get_default_bcc_for_admin();
		return $return;
	}

	Public function get_cancel_from_for_user_name() {
		$return = $this->settings->get_cancel_from_for_user_name();
		return $return;
	}

	Public function get_cancel_from_for_user() {
		$return = $this->settings->get_cancel_from_for_user();
		return $return;
	}

	Public function get_cancel_subject_for_user() {
		$return = $this->settings->get_cancel_subject_for_user();
		return $return;
	}

	Public function get_cancel_text_for_user() {
		$return = $this->settings->get_cancel_text_for_user();
		return $return;
	}

	Public function get_cancel_from_for_admin_name() {
		$return = $this->settings->get_cancel_from_for_admin_name();
		return $return;
	}

	Public function get_cancel_from_for_admin() {
		$return = $this->settings->get_cancel_from_for_admin();
		return $return;
	}

	Public function get_cancel_to_for_admin() {
		$return = $this->settings->get_cancel_to_for_admin();
		return $return;
	}

	Public function get_cancel_cc_for_admin() {
		$return = $this->settings->get_cancel_cc_for_admin();
		return $return;
	}

	Public function get_cancel_bcc_for_admin() {
		$return = $this->settings->get_cancel_bcc_for_admin();
		return $return;
	}

	Public function get_cancel_subject_for_admin() {
		$return = $this->settings->get_cancel_subject_for_admin();
		return $return;
	}

	Public function get_cancel_text_for_admin() {
		$return = $this->settings->get_cancel_text_for_admin();
		return $return;
	}

	Public function get_csv_encodings() {
		$return = $this->settings->get_csv_encodings();
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_facebook_app_id($input) {
		$this->settings->set_facebook_app_id($input);
	}

	Public function set_facebook_app_secret($input) {
		$this->settings->set_facebook_app_secret($input);
	}

	Public function set_want_facebook_user_birthday($input) {
		$this->settings->set_want_facebook_user_birthday($input);
	}

	Public function set_want_facebook_user_location($input) {
		$this->settings->set_want_facebook_user_location($input);
	}

	Public function set_default_from_for_user_name($input) {
		$this->settings->set_default_from_for_user_name($input);
	}

	Public function set_default_from_for_user($input) {
		$this->settings->set_default_from_for_user($input);
	}

	Public function set_default_from_for_admin_name($input) {
		$this->settings->set_default_from_for_admin_name($input);
	}

	Public function set_default_from_for_admin($input) {
		$this->settings->set_default_from_for_admin($input);
	}

	Public function set_default_to_for_admin($input) {
		$this->settings->set_default_to_for_admin($input);
	}

	Public function set_default_cc_for_admin($input) {
		$this->settings->set_default_cc_for_admin($input);
	}

	Public function set_default_bcc_for_admin($input) {
		$this->settings->set_default_bcc_for_admin($input);
	}

	Public function set_cancel_from_for_user_name($input) {
		$this->settings->set_cancel_from_for_user_name($input);
	}

	Public function set_cancel_from_for_user($input) {
		$this->settings->set_cancel_from_for_user($input);
	}

	Public function set_cancel_subject_for_user($input) {
		$this->settings->set_cancel_subject_for_user($input);
	}

	Public function set_cancel_text_for_user($input) {
		$this->settings->set_cancel_text_for_user($input);
	}

	Public function set_cancel_from_for_admin_name($input) {
		$this->settings->set_cancel_from_for_admin_name($input);
	}

	Public function set_cancel_from_for_admin($input) {
		$this->settings->set_cancel_from_for_admin($input);
	}

	Public function set_cancel_to_for_admin($input) {
		$this->settings->set_cancel_to_for_admin($input);
	}

	Public function set_cancel_cc_for_admin($input) {
		$this->settings->set_cancel_cc_for_admin($input);
	}

	Public function set_cancel_bcc_for_admin($input) {
		$this->settings->set_cancel_bcc_for_admin($input);
	}

	Public function set_cancel_subject_for_admin($input) {
		$this->settings->set_cancel_subject_for_admin($input);
	}

	Public function set_cancel_text_for_admin($input) {
		$this->settings->set_cancel_text_for_admin($input);
	}

	Public function set_csv_encodings($input) {
		$this->settings->set_csv_encodings($input);
	}

}

?>
