<?php

class izanai_SNS_connect_view {

	// =================================================
	// Property
	// =================================================

	Private $SNS_settings;
	Private $izanai_user;
	Private $izanai_mail;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		add_action('get_header', array( $this, 'invitation_on_facebook_header' ) );
		add_action('the_content', array( $this, 'invitation_on_facebook_content' ) );
		$this->SNS_settings = new izanai_SNS_connect_control();
		$this->izanai_user = new izanai_user_from_SNS_control();
		$this->izanai_mail = new izanai_mail_control();
	}

	// =================================================
	// Method
	// =================================================

	// ----------------------------------------------------------------------------------------------------------------
	// Difinite invitation on facebook view
	// -----------------------------------------------------------------------------------------------------------------

	// for get_header
	Public function invitation_on_facebook_header() {

		// initialize
		$post_page_id = get_the_ID();
		$this->SNS_settings = new izanai_SNS_connect_control( $post_page_id );
		$this->izanai_user = new izanai_user_from_SNS_control();
		$status_invitation_on_facebook = $this->SNS_settings->get_invitation_on_facebook();
		// Select Action
		if ( $status_invitation_on_facebook == __( 'Force to invite on facebook', IZANAI_DOMAIN ) && ( is_single() || is_page() ) ) {
			$facebook_information = $this->izanai_user->get_facebook_information();
			if ( $facebook_information == FALSE ) {
				$is_from_facebook_login = $this->izanai_user->is_from_facebook_login();
				if ( $is_from_facebook_login == FALSE ) {
					$this->force_to_invite_on_facebook();
				}
			} else {
				$user_email = $facebook_information->get_user_email();
				$user_information = $this->izanai_user->get_user_with_email( $user_email );
				if ( $user_information == FALSE ) {
					$is_from_facebook_login = $this->izanai_user->is_from_facebook_login();
					if ( $is_from_facebook_login == TRUE ) {
						$rc = $this->izanai_user->register_facebook_user( $facebook_information );
						if ($rc) {
							$this->izanai_mail->mail_to_user_in_registration( $this->izanai_user );
							$this->izanai_mail->mail_to_admin_in_registration( $this->izanai_user );
						}
						$is_redirect = $this->SNS_settings->get_redirect_url();
						if ( $is_redirect != "" ) {
							$this->redirect_to_defined_page();
						}
					}
				} else {
					$this_page = get_permalink();
					$izanai_page = $user_information->get_izanai_page();
					if ( strpos( $izanai_page, $this_page) === false ) {
						$rc = $this->izanai_user->update_user_information( $facebook_information );
						if ($rc) {
							$this->izanai_mail->mail_to_user_in_registration( $this->izanai_user );
							$this->izanai_mail->mail_to_admin_in_registration( $this->izanai_user );
						}
						$is_redirect = $this->SNS_settings->get_redirect_url();
						if ( $is_redirect != "" ) {
							$this->redirect_to_defined_page();
						}
					}
				}
			}
		} elseif ( $status_invitation_on_facebook == __( 'Set the facebook invitation button', IZANAI_DOMAIN ) && ( is_single() || is_page() ) ) {
			$facebook_information = $this->izanai_user->get_facebook_information();
			if ( $facebook_information != FALSE ) {
				$user_email = $facebook_information->get_user_email();
				$user_information = $this->izanai_user->get_user_with_email( $user_email );
				if ( $user_information == FALSE ) {
					$is_from_facebook_login = $this->izanai_user->is_from_facebook_login();
					if ( $is_from_facebook_login == TRUE ) {
						$rc = $this->izanai_user->register_facebook_user( $facebook_information );
						if ($rc) {
							$this->izanai_mail->mail_to_user_in_registration( $this->izanai_user );
							$this->izanai_mail->mail_to_admin_in_registration( $this->izanai_user );
						}
						$is_redirect = $this->SNS_settings->get_redirect_url();
						if ( $is_redirect != "" ) {
							$this->redirect_to_defined_page();
						}
					}
				} else {
					$this_page = get_permalink();
					$izanai_page = $user_information->get_izanai_page();
					if ( strpos( $izanai_page, $this_page) === false ) {
						$is_from_facebook_login = $this->izanai_user->is_from_facebook_login();
						if ( $is_from_facebook_login == TRUE ) {
							$rc = $this->izanai_user->update_user_information( $facebook_information );
							if ($rc) {
								$this->izanai_mail->mail_to_user_in_registration( $this->izanai_user );
								$this->izanai_mail->mail_to_admin_in_registration( $this->izanai_user );
							}
							$is_redirect = $this->SNS_settings->get_redirect_url();
							if ( $is_redirect != "" ) {
								$this->redirect_to_defined_page();
							}
						}
					}
				}
			}
		}

	}

	// for the_content
	Public function invitation_on_facebook_content($the_content) {

		// initialize
		$post_page_id = get_the_ID();
		$this->SNS_settings = new izanai_SNS_connect_control( $post_page_id );
		$this->izanai_user = new izanai_user_from_SNS_control();
		$status_invitation_on_facebook = $this->SNS_settings->get_invitation_on_facebook();
		// Select Action
		if ( $status_invitation_on_facebook == __( 'Set the facebook invitation button', IZANAI_DOMAIN ) && ( is_single() || is_page() ) ) {
			$button = $this->the_facebook_invitation_button();
			if ( strpos( $the_content , "[izanai-button-fb]" ) !== false ) {
				$the_content = str_replace( "[izanai-button-fb]" , $button , $the_content );
			} else {
				$the_content = $the_content . $button;
			}
		} elseif ( is_home() ) {
			$button = $this->the_facebook_invitation_button();
			if ( strpos( $the_content , "[izanai-button-fb]" ) !== false ) {
				$the_content = str_replace( "[izanai-button-fb]" , $button , $the_content );
			}
		}
		return $the_content;

	}

	// -----------------------------------------------------------------------------------------------------------------
	// For redirection to login-with-facebook
	// -----------------------------------------------------------------------------------------------------------------

	Private function force_to_invite_on_facebook() {
		$loginUrl = $this->izanai_user->get_facebook_login_url();
		echo '<meta http-equiv="refresh" content="1;URL='.${loginUrl}.'">';
	}

	// -----------------------------------------------------------------------------------------------------------------
	// For viewing login-with-facebook button
	// -----------------------------------------------------------------------------------------------------------------

	Private function the_facebook_invitation_button() {

		// load the value
		$loginUrl = $this->izanai_user->get_facebook_login_url();
		$btn_value = $this->SNS_settings->get_button_character();
		$char_size = $this->SNS_settings->get_button_character_size();
		$char_color = $this->SNS_settings->get_button_character_color();
		$char_color_mouse = $this->SNS_settings->get_button_character_color_mouse();
		$char_color_click = $this->SNS_settings->get_button_character_color_click();
		$bg_color = $this->SNS_settings->get_button_background_color();
		$bg_color_mouse = $this->SNS_settings->get_button_background_color_mouse();
		$bg_color_click = $this->SNS_settings->get_button_background_color_click();
		$btn_pd_v = $this->SNS_settings->get_button_padding_vartical();
		$btn_pd_h = $this->SNS_settings->get_button_padding_horizontal();
		$btn_rds = $this->SNS_settings->get_button_radius();
		$btn_sdw = $this->SNS_settings->get_button_shadow();

		// arrange the value
		$btn_sdw_double = $btn_sdw * 2 ;
		$btn_sdw_half = floor( $btn_sdw / 2 );
		$btn_sdw_all = $btn_sdw . 'px ' . $btn_sdw . 'px ' . $btn_sdw_double . 'px '. $btn_sdw_half . 'px';

		// style parameter
		$style_settings = 'color:' . $char_color . '; ';
		$style_settings = $style_settings . 'background-color:' . $bg_color . '; ';
		$style_settings = $style_settings . 'font-size :' . $char_size . 'px; ';
		$style_settings = $style_settings . 'padding :' . $btn_pd_v . 'px ' . $btn_pd_h . 'px; ' ;
		$style_settings = $style_settings . '-moz-border-radius: ' . $btn_rds . 'px; -webkit-border-radius: ' . $btn_rds . 'px; border-radius: ' . $btn_rds . 'px; ';
		$style_settings = $style_settings . 'box-shadow: ' . $btn_sdw_all . ' #666;-moz-box-shadow: ' . $btn_sdw_all . ' #666;-webkit-box-shadow: ' . $btn_sdw_all . ' #666;';

		// onMouseOver parameter
		$onMouseOver_settings = 'this.style.background=' . "'" . $bg_color_mouse . "'" . '; this.style.color=' . "'" . $char_color_mouse . "'" . ';' ;

		// onMouseOut parameter
		$onMouseOut_settings =  'this.style.background=' . "'" . $bg_color . "'" . '; this.style.color=' . "'" . $char_color . "'" . ';' ;

		// onClick parameter
		$onClick_settings = 'this.style.background=' . "'" . $bg_color_click . "'" . '; this.style.color=' . "'" . $char_color_click . "'" . '; location.href=' . "'" . $loginUrl . "'" . ';' ;

		$return = '<center><button type="button" onMouseOver="' . $onMouseOver_settings . '" onMouseOut="' . $onMouseOut_settings . '" onClick="' . $onClick_settings . '" style="' . $style_settings . '">' . $btn_value . '</button></center>';
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// For redirection to defined-page after registration
	// -----------------------------------------------------------------------------------------------------------------

	Private function redirect_to_defined_page() {
		$redirect_url = $this->SNS_settings->get_redirect_url();
		echo '<meta http-equiv="refresh" content="1;URL='.$redirect_url.'">';
	}

}

?>
