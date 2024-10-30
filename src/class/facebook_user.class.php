<?php

class facebook_user {

	// =================================================
	// Property
	// =================================================

	Private $is_login;
	Private $facebook_login_url;
	Private $user_login;
	Private $display_name;
	Private $user_email;
	Private $user_facebook_id;
	Private $first_name;
	Private $last_name;
	Private $user_gender;
	Private $user_birthday;
	Private $user_location;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct( $app_id, $app_secret ) {
		$this->is_login = FALSE;
		$this->facebook_login_url = "";
		$this->user_login = "";
		$this->display_name = "";
		$this->user_email = "";
		$this->user_facebook_id = "";
		$this->first_name = "";
		$this->last_name = "";
		$this->user_gender = "";
		$this->user_birthday = "";
		$this->user_location = "";
		if ( $app_id != "" && $app_secret != "" ) {
			$config = array(
				'appId' => $app_id,
				'secret' => $app_secret
			);
			$facebook = new Facebook($config);
			$here = get_permalink();
			$params = array(
				'scope' => 'email,user_birthday,user_location',
				'redirect_uri' => $here . "?is_from_facebook=yes"
			);
			$this->facebook_login_url = $facebook->getLoginUrl($params);
			if ( $facebook->getUser() ) {
				try {
					$locale = get_locale();
					if ( $locale == 'ja' ) {
						$api_return_jp = $facebook->api('/me?fields=id,name,email,location,first_name,last_name,gender,birthday&locale=ja_JP','GET');
						$api_return_en = $facebook->api('/me?fields=id,name,email,location,first_name,last_name,gender,birthday');
						$this->set_user_information_jp( $api_return_jp, $api_return_en );
					} else {
						$api_return_en = $facebook->api('/me?fields=id,name,email,location,first_name,last_name,gender,birthday');
						$this->set_user_information( $api_return_en );
					}
					$this->is_login = TRUE;
				} catch( FacebookApiException $e ) {
					$this->is_login = FALSE;
					$this->user_login = "";
					$this->display_name = "";
					$this->user_email = "";
					$this->user_facebook_id = "";
					$this->first_name = "";
					$this->last_name = "";
					$this->user_gender = "";
					$this->user_birthday = "";
					$this->user_location = "";
				}
			}
		}
	}

	// =================================================
	// Method
	// =================================================


	// ----------------------------------------------------------------------------------------------------------------
	// Getter
	// -----------------------------------------------------------------------------------------------------------------

	Public function is_login() {
		return $this->is_login;
	}

	Public function get_facebook_login_url() {
		return $this->facebook_login_url;
	}

	Public function get_user_login() {
		return $this->user_login;
	}

	Public function get_display_name() {
		return $this->display_name;
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

	Public function get_user_location() {
		return $this->user_location;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_user_login($input) {
		$this->user_login = $input;
	}

	Public function set_display_name($input) {
		$this->display_name = $input;
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

	Public function set_user_location($input) {
		$this->user_location = $input;
	}

	Private function set_user_information_jp( $facebook_return_jp, $facebook_return_en ) {
		$this->user_login = $facebook_return_en['name'];
		$this->display_name = $facebook_return_jp['name'];
		$this->user_email = $facebook_return_jp['email'];
		$this->user_facebook_id = $facebook_return_jp['id'];
		$this->first_name = $facebook_return_jp['first_name'];
		$this->last_name = $facebook_return_jp['last_name'];
		$this->user_gender = $facebook_return_jp['gender'];
		$this->user_birthday = $facebook_return_jp['birthday'];
		$this->user_location = $facebook_return_jp['location']['name'];
	}

	Private function set_user_information( $facebook_return ) {
		$this->user_login = $facebook_return['name'];
		$this->display_name = $facebook_return['name'];
		$this->user_email = $facebook_return['email'];
		$this->user_facebook_id = $facebook_return['id'];
		$this->first_name = $facebook_return['first_name'];
		$this->last_name = $facebook_return['last_name'];
		$this->user_gender = $facebook_return['gender'];
		$this->user_birthday = $facebook_return['birthday'];
		$this->user_location = $facebook_return['location']['name'];
	}

	// ----------------------------------------------------------------------------------------------------------------
	// Advanced Setter
	// -----------------------------------------------------------------------------------------------------------------

	Public function set_want_information( $app_id, $app_secret, $want_birthday, $want_location ) {
		if ( $app_id != "" && $app_secret != "" ) {
			$config = array(
				'appId' => $app_id,
				'secret' => $app_secret
			);
			$facebook = new Facebook($config);
			$here = get_permalink();
			$scopes = 'email';
			if ( $want_birthday == "true" ) {
				$scopes = $scopes . ',user_birthday';
			}
			if ( $want_location == "true" ) {
				$scopes = $scopes . ',user_location';
			}
			$params = array(
				'scope' => $scopes,
				'redirect_uri' => $here . "?is_from_facebook=yes"
			);
			$this->facebook_login_url = $facebook->getLoginUrl($params);
		}
	}

}

?>