<?php

class izanai_user_from_SNS_control {

	// =================================================
	// Property
	// =================================================

	// user_model
	Private $izanai_user;
	Private $izanai_common_settings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->izanai_user = new izanai_user_from_SNS();
		$this->izanai_common_settings = new izanai_common_settings_control();
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Add user contact
	// -----------------------------------------------------------------------------------------------------------------

	Public function add_user_contact( $user_contact ) {
		$user_contact = $this->izanai_user->add_user_contact( $user_contact );
		return $user_contact;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Getter (user information)
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_user_login() {
		return $this->izanai_user->get_user_login();
	}

	Public function get_user_sns() {
		return $this->izanai_user->get_user_sns();
	}

	Public function get_display_name() {
		return $this->izanai_user->get_display_name();
	}

	Public function get_role() {
		return $this->izanai_user->get_role();
	}

	Public function get_user_pass() {
		return $this->izanai_user->get_user_pass();
	}

	Public function get_user_email() {
		return $this->izanai_user->get_user_email();
	}

	Public function get_user_facebook_id() {
		return $this->izanai_user->get_user_facebook_id();
	}

	Public function get_first_name() {
		return $this->izanai_user->get_first_name();
	}

	Public function get_last_name() {
		return $this->izanai_user->get_last_name();
	}

	Public function get_user_gender() {
		return $this->izanai_user->get_user_gender();
	}

	Public function get_user_birthday() {
		return $this->izanai_user->get_user_birthday();
	}

	Public function get_izanai_page() {
		return $this->izanai_user->get_izanai_page();
	}

	Public function get_izanai_page_title() {
		return $this->izanai_user->get_izanai_page_title();
	}

	Public function get_izanai_page_category() {
		return $this->izanai_user->get_izanai_page_category();
	}

	Public function get_user_location() {
		return $this->izanai_user->get_user_location();
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Setter (user information)
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_user_login($input) {
		$this->izanai_user->set_user_login($input);
	}

	Public function set_user_sns($input) {
		$this->izanai_user->set_user_sns($input);
	}

	Public function set_display_name($input) {
		$this->izanai_user->set_display_name($input);
	}

	Public function set_role($input) {
		$this->izanai_user->set_role($input);
	}

	Public function set_user_pass($input) {
		$this->izanai_user->set_user_pass($input);
	}

	Public function set_user_email($input) {
		$this->izanai_user->set_user_email($input);
	}

	Public function set_user_facebook_id($input) {
		$this->izanai_user->set_user_facebook_id($input);
	}

	Public function set_first_name($input) {
		$this->izanai_user->set_first_name($input);
	}

	Public function set_last_name($input) {
		$this->izanai_user->set_last_name($input);
	}

	Public function set_user_gender($input) {
		$this->izanai_user->set_user_gender($input);
	}

	Public function set_user_birthday($input) {
		$this->izanai_user->set_user_birthday($input);
	}

	Public function set_izanai_page($input) {
		$this->izanai_user->set_izanai_page($input);
	}

	Public function set_izanai_page_title($input) {
		$this->izanai_user->set_izanai_page_title($input);
	}

	Public function set_izanai_page_category($input) {
		$this->izanai_user->set_izanai_page_category($input);
	}

	Public function set_user_location($input) {
		$this->izanai_user->set_user_location($input);
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Get the data of the user (only "user_from_SNS") with the input email-address. If the user cannot be found, return false.
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_user_with_email( $email_address ) {
		$user =get_user_by( 'email', $email_address );
		$user_from_SNS = new izanai_user_from_SNS;
		$rc = $user_from_SNS->load_user( $user->user_login );
		if ( $rc != false ) {
			return $user_from_SNS;
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Delete user (only "user_from_SNS") with the input email-address. If the user cannot be found, return false.
	// -----------------------------------------------------------------------------------------------------------------

	Public function delete_user_with_email( $email_address ) {
		$users = $this->izanai_user->get_users();
		$count = count( $users );
		if ( $count >= 1 ) {
			$delete_count = 0;
			foreach ( $users as $user) {
				if ( $user->user_email == $email_address ) {
					$rc = $this->izanai_user->delete_user( $user->ID );
					if ( $rc ) {
						$delete_count = $delete_count + 1;
					}
				}
			}
			if ( $delete_count > 0 ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Get the facebook information of the viewer. When the viewer hasn't facebook-logined, the function returns false.
	// The facebook information is returned as the class 'facebook_user'.
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_facebook_information() {
		$app_id = $this->izanai_common_settings->get_facebook_app_id();
		$app_secret = $this->izanai_common_settings->get_facebook_app_secret();
		$facebook_user = new facebook_user( $app_id, $app_secret );
		$is_login = $facebook_user->is_login();
		if ( $is_login ) {
			return $facebook_user;
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Is the viewer from facebook-login page which url can be got by using getLoginUrl in facebook-php-sdk.
	// -----------------------------------------------------------------------------------------------------------------

	Public function is_from_facebook_login() {
		$is_from_facebook = $_GET['is_from_facebook'];
		if ( $is_from_facebook == "yes" ) {
			return true;
		} else {
			return false;
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Get facebook-login page url.
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_facebook_login_url() {
		$app_id = $this->izanai_common_settings->get_facebook_app_id();
		$app_secret = $this->izanai_common_settings->get_facebook_app_secret();
		$want_birthday = $this->izanai_common_settings->get_want_facebook_user_birthday();
		$want_location = $this->izanai_common_settings->get_want_facebook_user_location();
		$facebook_user = new facebook_user( $app_id, $app_secret );
		if ( $want_birthday == "false" || $want_location == "false" ) {
			$facebook_user->set_want_information( $app_id, $app_secret, $want_birthday, $want_location );
		}
		$facebook_login_page = $facebook_user->get_facebook_login_url();
		return $facebook_login_page;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Register new izanai user.
	// -----------------------------------------------------------------------------------------------------------------

	Public function register_facebook_user( $facebook_user ) {
		// set
		$this->izanai_user->set_user_login( $facebook_user->get_user_login() );
		$this->izanai_user->set_user_sns( "Facebook" );
		$this->izanai_user->set_display_name( $facebook_user->get_display_name() );
		$this->izanai_user->set_user_email( $facebook_user->get_user_email() );
		$this->izanai_user->set_user_facebook_id( $facebook_user->get_user_facebook_id() );
		$this->izanai_user->set_first_name( $facebook_user->get_first_name() );
		$this->izanai_user->set_last_name( $facebook_user->get_last_name() );
		$this->izanai_user->set_user_gender( $facebook_user->get_user_gender() );
		$this->izanai_user->set_user_birthday( $facebook_user->get_user_birthday() );
		$this->izanai_user->set_izanai_page( get_permalink() );
		$this->izanai_user->set_izanai_page_title( get_the_title() );
		$categories = get_the_category();
		foreach ( $categories as $category ) {
			$izanai_category[] = $category->name;
		}
		$izanai_category = implode( "," , $izanai_category );
		$this->izanai_user->set_izanai_page_category( $izanai_category );
		$this->izanai_user->set_user_location( $facebook_user->get_user_location() );
		// register
		$rc = $this->izanai_user->register_user();
		// load user
		if ( $rc != FALSE ) {
			$this->izanai_user->load_user( $facebook_user->get_user_login() );
		}
		return $rc;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Update the informations of the izanai user.
	// -----------------------------------------------------------------------------------------------------------------

	Public function update_user_information( $facebook_user ) {

		// load user
		$this->izanai_user->load_user( $facebook_user->get_user_login() );

		// set display_name
		$org_info = $this->izanai_user->get_display_name();
		$new_info = $facebook_user->get_display_name();
		if ( $org_info != $new_info ) {
			$this->izanai_user->set_display_name( $new_info );
		}

		// set first_name
		$org_info = $this->izanai_user->get_first_name();
		$new_info = $facebook_user->get_first_name();
		if ( $org_info != $new_info ) {
			$this->izanai_user->set_first_name( $new_info );
		}

		// set last_name
		$org_info = $this->izanai_user->get_last_name();
		$new_info = $facebook_user->get_last_name();
		if ( $org_info != $new_info ) {
			$this->izanai_user->set_last_name( $new_info );
		}

		// set user_gender
		$org_info = $this->izanai_user->get_user_gender();
		$new_info = $facebook_user->get_user_gender();
		if ( $org_info != $new_info ) {
			$this->izanai_user->set_user_gender( $new_info );
		}

		// set user_birthday
		$org_info = $this->izanai_user->get_user_birthday();
		$new_info = $facebook_user->get_user_birthday();
		if ( $org_info != $new_info ) {
			$this->izanai_user->set_user_birthday( $new_info );
		}

		// set izanai_page
		$org_info = $this->izanai_user->get_izanai_page();
		$new_info = get_permalink();
		if ( $org_info != $new_info ) {
			$input = $org_info . "," . $new_info;
			$this->izanai_user->set_izanai_page( $input );
		}

		// set izanai_page_title
		$org_info = $this->izanai_user->get_izanai_page_title();
		$new_info = get_the_title();
		if ( $org_info != $new_info ) {
			$input = $org_info . "," . $new_info;
			$this->izanai_user->set_izanai_page_title( $input );
		}

		// set izanai_page_category
		$org_info = $this->izanai_user->get_izanai_page_category();
		$org_info = explode( "," , $org_info );
		$categories = get_the_category();
		foreach ( $categories as $category ) {
			$izanai_category[] = $category->name;
		}
		$new_info = $izanai_category;
		$input = array_merge( $org_info , $new_info );
		$input = array_unique( $input );
		$input = implode( "," , $input );
		$this->izanai_user->set_izanai_page_category( $input );

		// set user_location
		$org_info = $this->izanai_user->get_user_location();
		$new_info = $facebook_user->get_user_location();
		if ( $org_info != $new_info ) {
			$this->izanai_user->set_user_location( $new_info );
		}

		// update
		$rc = $this->izanai_user->update_user();

		// load user
		if ( $rc != FALSE ) {
			$this->izanai_user->load_user( $facebook_user->get_user_login() );
		}

		return $rc;

	}

	// -----------------------------------------------------------------------------------------------------------------
	// load izanai user.
	// -----------------------------------------------------------------------------------------------------------------

	Public function load_user( $user_login ) {
		$rc = $this->izanai_user->load_user( $user_login );
		return $rc;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// get gender list
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_user_gender_list() {
		$users = $this->izanai_user->get_users();
		$return_list[] = __( 'ALL', IZANAI_DOMAIN );
		foreach ( $users as $user ) {
			$return_list[] = $user->user_gender;
		}
		$return_list = array_unique( $return_list );
		return $return_list;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// get izanai-page-category list
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_izanai_page_category_list() {
		$users = $this->izanai_user->get_users();
		$return_list[] = __( 'ALL', IZANAI_DOMAIN );
		foreach ( $users as $user ) {
			$category = explode( ",", $user->izanai_page_category );
			$return_list = array_merge( $return_list, $category );
		}
		$return_list = array_unique( $return_list );
		return $return_list;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// get izanai-page-title list
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_izanai_page_title_list() {
		$users = $this->izanai_user->get_users();
		$return_list[] = __( 'ALL', IZANAI_DOMAIN );
		foreach ( $users as $user ) {
			$titles = explode( ",", $user->izanai_page_title );
			$return_list = array_merge( $return_list, $titles );
		}
		$return_list = array_unique( $return_list );
		return $return_list;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// get izanai-page url list
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_izanai_page_list() {
		$users = $this->izanai_user->get_users();
		$return_list[] = __( 'ALL', IZANAI_DOMAIN );
		foreach ( $users as $user ) {
			$pages = explode( ",", $user->izanai_page );
			$return_list = array_merge( $return_list, $pages );
		}
		$return_list = array_unique( $return_list );
		return $return_list;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// get users
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_users() {
		$return_list = $this->izanai_user->get_users();
		return $return_list;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// get users in conditions
	// -----------------------------------------------------------------------------------------------------------------

	Public function get_users_in_conditions( $conditions ) {
		$users = $this->izanai_user->get_users();
		foreach ( $users as $user ) {
			if ( $conditions[user_name] == "" || isset( $conditions[user_name] ) == false || ( $conditions[user_name] != "" && ( ( strpos( $user->display_name, $conditions[user_name] ) !== FALSE ) || ( strpos( $user->user_login, $conditions[user_name] ) !== FALSE ) ) ) ) {
				if ( $conditions[user_email] == "" || ( $conditions[user_email] != "" && strpos( $user->user_email, $conditions[user_email] ) !== FALSE ) ) {
					if ( $user->user_gender == $conditions[user_gender] || $conditions[user_gender] == __( 'ALL', IZANAI_DOMAIN ) || isset( $conditions[user_gender] ) == false ) {
						if ( $conditions[user_location] == "" || isset( $conditions[user_location] ) == false || ( $conditions[user_location] != "" && strpos( $user->user_location, $conditions[user_location] ) !== FALSE ) ) {
							if ( $user->user_birthday != "" ) {
								$tmp_birthday = substr( $user->user_birthday, 6, 4 ) . substr( $user->user_birthday, 0, 2 ) . substr( $user->user_birthday, 3, 2 );
							} else {
								$tmp_birthday = 1;
							}
							if ( $conditions[birthday_start] != "" ) {
								$tmp_birthday_start = substr( $conditions[birthday_start], 0, 4 ) . substr( $conditions[birthday_start], 5, 2 ) . substr( $conditions[birthday_start], 8, 2 );
							} else {
								$tmp_birthday_start = 0;
							}
							if ( $conditions[birthday_end] != "" ) {
								$tmp_birthday_end = substr( $conditions[birthday_end], 0, 4 ) . substr( $conditions[birthday_end], 5, 2 ) . substr( $conditions[birthday_end], 8, 2 );
							} else {
								$tmp_birthday_end = 99999999;
							}
							if ( $tmp_birthday_start <= $tmp_birthday && $tmp_birthday <= $tmp_birthday_end ) {
								if ( $user->user_registered != "" ) {
									$tmp_register = date('Ymd', strtotime($user->user_registered));
								} else {
									$tmp_register = 1;
								}
								if ( $conditions[register_date_start] != "" ) {
									$tmp_register_start = substr( $conditions[register_date_start], 0, 4 ) . substr( $conditions[register_date_start], 5, 2 ) . substr( $conditions[register_date_start], 8, 2 );
								} else {
									$tmp_register_start = 0;
								}
								if ( $conditions[register_date_end] != "" ) {
									$tmp_register_end = substr( $conditions[register_date_end], 0, 4 ) . substr( $conditions[register_date_end], 5, 2 ) . substr( $conditions[register_date_end], 8, 2 );
								} else {
									$tmp_register_end = 99999999;
								}
								if ( $tmp_register_start <= $tmp_register && $tmp_register <= $tmp_register_end) {
									if ( $conditions[birth_month] == __( 'ALL', IZANAI_DOMAIN ) || ( $conditions[birth_month] != __( 'ALL', IZANAI_DOMAIN ) && (int)$conditions[birth_month] == (int)substr($user->user_birthday, 0, 2) ) ) {
										if ( $conditions[izanai_page] == __( 'ALL', IZANAI_DOMAIN ) || ( $conditions[izanai_page] != __( 'ALL', IZANAI_DOMAIN ) && strpos( $user->izanai_page, $conditions[izanai_page] ) !== FALSE ) ) {
											if ( $conditions[izanai_page_title] == __( 'ALL', IZANAI_DOMAIN ) || ( $conditions[izanai_page_title] != __( 'ALL', IZANAI_DOMAIN ) && strpos( $user->izanai_page_title , $conditions[izanai_page_title] ) !== FALSE ) ) {
												if ( $conditions[izanai_page_category] == __( 'ALL', IZANAI_DOMAIN ) || ( $conditions[izanai_page_category] != __( 'ALL', IZANAI_DOMAIN ) && strpos( $user->izanai_page_category , $conditions[izanai_page_category] ) !== FALSE ) ) {
													$return_list[] = $user;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		return $return_list;
	}

}


?>
