<?php

class izanai_user_from_SNS {

	// =================================================
	// Property
	// =================================================

	Private $user_login;
	Private $user_sns;
	Private $display_name;
	Private $role;
	Private $user_pass;
	Private $user_email;
	Private $user_facebook_id;
	Private $first_name;
	Private $last_name;
	Private $user_gender;
	Private $user_birthday;
	Private $izanai_page;
	Private $izanai_page_title;
	Private $izanai_page_category;
	Private $user_location;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->user_login = "";
		$this->user_sns = "";
		$this->display_name = "";
		$this->role = "";
		$this->user_pass = "";
		$this->user_email = "";
		$this->user_facebook_id = "";
		$this->first_name = "";
		$this->last_name = "";
		$this->user_gender = "";
		$this->user_birthday = "";
		$this->izanai_page = "";
		$this->izanai_page_title = "";
		$this->izanai_page_category = "";
		$this->user_location = "";
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Add user contact
	// -----------------------------------------------------------------------------------------------------------------

	Public function add_user_contact( $user_contact ){
		$user_contact['user_sns'] = 'SNS';
		$user_contact['user_facebook_id'] = 'Facebook ID'; 
		$user_contact['user_gender'] = 'Gender';
		$user_contact['izanai_page'] = 'izanai Page';
		$user_contact['izanai_page_title'] = 'izanai Page Title';
		$user_contact['izanai_page_category'] = 'izanai Page Category';
		$user_contact['user_birthday'] = 'Birthday';
		$user_contact['user_location'] = 'Location';
		return $user_contact;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Getter
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_user_login() {
		return $this->user_login;
	}

	Public function get_user_sns() {
		return $this->user_sns;
	}

	Public function get_display_name() {
		return $this->display_name;
	}

	Public function get_role() {
		return $this->role;
	}

	Public function get_user_pass() {
		return $this->user_pass;
	}

	Public function get_user_email() {
		return $this->user_email;
	}

	Public function get_user_facebook_id() {
		return $this->user_facebook_id;
	}

	Public function get_first_name() {
		return $this->first_name;
	}

	Public function get_last_name() {
		return $this->last_name;
	}

	Public function get_user_gender() {
		return $this->user_gender;
	}

	Public function get_user_birthday() {
		return $this->user_birthday;
	}

	Public function get_izanai_page() {
		return $this->izanai_page;
	}

	Public function get_izanai_page_title() {
		return $this->izanai_page_title;
	}

	Public function get_izanai_page_category() {
		return $this->izanai_page_category;
	}

	Public function get_user_location() {
		return $this->user_location;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_user_login($input) {
		$this->user_login = $input;
	}

	Public function set_user_sns($input) {
		$this->user_sns = $input;
	}

	Public function set_display_name($input) {
		$this->display_name = $input;
	}

	Public function set_role($input) {
		$this->role = $input;
	}

	Public function set_user_pass($input) {
		$this->user_pass = $input;
	}

	Public function set_user_email($input) {
		$this->user_email = $input;
	}

	Public function set_user_facebook_id($input) {
		$this->user_facebook_id = $input;
	}

	Public function set_first_name($input) {
		$this->first_name = $input;
	}

	Public function set_last_name($input) {
		$this->last_name = $input;
	}

	Public function set_user_gender($input) {
		$this->user_gender = $input;
	}

	Public function set_user_birthday($input) {
		$this->user_birthday = $input;
	}

	Public function set_izanai_page($input) {
		$this->izanai_page = $input;
	}

	Public function set_izanai_page_title($input) {
		$this->izanai_page_title = $input;
	}

	Public function set_izanai_page_category($input) {
		$this->izanai_page_category = $input;
	}

	Public function set_user_location($input) {
		$this->user_location = $input;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Get the user-list from only "user_from_SNS". The return type is WP_User object.
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_users() {
		$user_condition = array(
								'role' => 'user_from_SNS',
								'fields' => 'all_with_meta'
							);
		$this->users = get_users( $user_condition );
		return $this->users;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Delete User from only "user_from_SNS". When the user is deleted, the return code is true.
	// -----------------------------------------------------------------------------------------------------------------

	Public function delete_user( $delete_user_id ) {
		$delete_user = get_user_by( 'id', $delete_user_id );
		if ( $delete_user->roles[0] == 'user_from_SNS' ) {
			$rc = wp_delete_user(  $delete_user_id );
			return $rc;
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Register user as "user_from_SNS".
	// -----------------------------------------------------------------------------------------------------------------

	Public function register_user() {
		if ( $this->role == "" ) {
			$this->role = 'user_from_SNS';
		}
		if ( $this->user_pass == "" ) {
			// generate ramdom password
			$num = 8;
			$ar1 = range('a', 'z');
			$ar2 = range('A', 'Z');
			$ar3 = range(0, 9);
			$ar_all = array_merge($ar1, $ar2, $ar3);
			shuffle($ar_all);
			$this->user_pass = substr(implode($ar_all), 0, $num);
		}
		$new_user = array(
			'user_login' => $this->user_login,
			'user_sns' => $this->user_sns,
			'display_name' => $this->display_name,
			'role' => $this->role,
			'user_pass' => $this->user_pass,
			'user_email' => $this->user_email,
			'user_facebook_id' => $this->user_facebook_id,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'user_gender' => $this->user_gender,
			'user_birthday' => $this->user_birthday,
			'izanai_page' => $this->izanai_page,
			'izanai_page_title' => $this->izanai_page_title,
			'izanai_page_category' => $this->izanai_page_category,
			'user_location' => $this->user_location
		);
		if ( $this->user_email != "" && $this->user_login != "" ) {
			$user_id = wp_insert_user( $new_user );
			return true;
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Update "user_from_SNS" user.
	// -----------------------------------------------------------------------------------------------------------------

	Public function update_user() {
		$user = get_user_by( 'login', $this->user_login );
		$user_id = $user->id;
		$update_user = array(
			'ID' => $user_id,
			'user_sns' => $this->user_sns,
			'display_name' => $this->display_name,
			'user_pass' => $this->user_pass,
			'user_email' => $this->user_email,
			'user_facebook_id' => $this->user_facebook_id,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'user_gender' => $this->user_gender,
			'user_birthday' => $this->user_birthday,
			'izanai_page' => $this->izanai_page,
			'izanai_page_title' => $this->izanai_page_title,
			'izanai_page_category' => $this->izanai_page_category,
			'user_location' => $this->user_location
		);
		if ( $user->id != "" ) {
			$user_id = wp_update_user( $update_user );
			if ( is_wp_error( $user_id ) ) {
				return false;
			}
			return true;
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// load "user_from_SNS" information.
	// -----------------------------------------------------------------------------------------------------------------

	Public function load_user( $user_login ) {
		$user = get_user_by( 'login', $user_login );
		if ( $user == FALSE ) {
			return false;
		}
		$this->user_login = $user_login;
		$this->user_sns = $user->user_sns;
		$this->display_name = $user->display_name;
		$this->role = 'user_from_SNS';
		$this->user_pass = $user->user_pass;
		$this->user_email = $user->user_email;
		$this->user_facebook_id = $user->user_facebook_id;
		$this->first_name = $user->first_name;
		$this->last_name = $user->last_name;
		$this->user_gender = $user->user_gender;
		$this->user_birthday = $user->user_birthday;
		$this->izanai_page = $user->izanai_page;
		$this->izanai_page_title = $user->izanai_page_title;
		$this->izanai_page_category = $user->izanai_page_category;
		$this->user_location = $user->user_location;
		return true;
	}


}

?>
