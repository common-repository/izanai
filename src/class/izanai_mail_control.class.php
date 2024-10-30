<?php

class izanai_mail_control {

	// =================================================
	// Property
	// =================================================

	Private $settings;

	Private $to_for_user_in_cancel;
	Private $cc_for_user_in_cancel;
	Private $bcc_for_user_in_cancel;
	Private $subject_for_user_in_cancel;
	Private $message_for_user_in_cancel;
	Private $headers_for_user_in_cancel;

	Private $to_for_admin_in_cancel;
	Private $cc_for_admin_in_cancel;
	Private $bcc_for_admin_in_cancel;
	Private $subject_for_admin_in_cancel;
	Private $message_for_admin_in_cancel;
	Private $headers_for_admin_in_cancel;

	Private $to_for_user_in_registration;
	Private $cc_for_user_in_registration;
	Private $bcc_for_user_in_registration;
	Private $subject_for_user_in_registration;
	Private $message_for_user_in_registration;
	Private $headers_for_user_in_registration;

	Private $to_for_admin_in_registration;
	Private $cc_for_admin_in_registration;
	Private $bcc_for_admin_in_registration;
	Private $subject_for_admin_in_registration;
	Private $message_for_admin_in_registration;
	Private $headers_for_admin_in_registration;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {

		// load settings
		$this->settings = new izanai_common_settings_control();

		// for user in cancel
		$this->subject_for_user_in_cancel = $this->settings->get_cancel_subject_for_user();
		if ( $this->subject_for_user_in_cancel == "" ) {
			$this->subject_for_user_in_cancel = 'From '.get_bloginfo('name');
		}
		$this->message_for_user_in_cancel = $this->settings->get_cancel_text_for_user();
		$from_name = $this->settings->get_cancel_from_for_user_name();
		$from_address = $this->settings->get_cancel_from_for_user();
		if ( $from_name == "" && $from_address != "" ) {
			$from_name = $from_address;
		}
		if ( $from_address != "" ) {
			$from_address = '"'.$from_name.'"<'.$from_address.'>';
			$this->headers_for_user_in_cancel = array( 'From: '.$from_address , 'Content-Type: text/plain; charset=UTF-8' );
		} else {
			$this->headers_for_user_in_cancel = array( 'Content-Type: text/plain; charset=UTF-8' );
		}

		// for admin in cancel
		$this->to_for_admin_in_cancel = $this->settings->get_cancel_to_for_admin();
		$this->cc_for_admin_in_cancel = $this->settings->get_cancel_cc_for_admin();
		$this->bcc_for_admin_in_cancel = $this->settings->get_cancel_bcc_for_admin();
		$this->subject_for_admin_in_cancel = $this->settings->get_cancel_subject_for_admin();
		if ( $this->subject_for_admin_in_cancel == "" ) {
			$this->subject_for_admin_in_cancel = 'From '.get_bloginfo('name');
		}
		$this->message_for_admin_in_cancel = $this->settings->get_cancel_text_for_admin();
		$from_name = $this->settings->get_cancel_from_for_admin_name();
		$from_address = $this->settings->get_cancel_from_for_admin();
		if ( $from_name == "" && $from_address != "" ) {
			$from_name = $from_address;
		}
		if ( $from_address != "" ) {
			$from_address = '"'.$from_name.'"<'.$from_address.'>';
			$this->headers_for_admin_in_cancel[] = 'From: '.$from_address;
		}
		if ( $this->cc_for_admin_in_cancel != "" ) {
			$this->headers_for_admin_in_cancel[] = 'Cc: '.$this->cc_for_admin_in_cancel;
		}
		if ( $this->bcc_for_admin_in_cancel != "" ) {
			$this->headers_for_admin_in_cancel[] = 'Bcc: '.$this->bcc_for_admin_in_cancel;
		}
		$this->headers_for_admin_in_cancel[] = 'Content-Type: text/plain; charset=UTF-8';

		// for user in registration
		$to_for_user_in_registration = "";
		$cc_for_user_in_registration = "";
		$bcc_for_user_in_registration = "";
		$subject_for_user_in_registration = "";
		$message_for_user_in_registration = "";
		$headers_for_user_in_registration = "";

		// for admin in registration
		$to_for_admin_in_registration = "";
		$cc_for_admin_in_registration = "";
		$bcc_for_admin_in_registration = "";
		$subject_for_admin_in_registration = "";
		$message_for_admin_in_registration = "";
		$headers_for_admin_in_registration = "";

	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// mail to user when the user is registered.
	// -----------------------------------------------------------------------------------------------------------------

	Public function mail_to_user_in_registration( $izanai_user_from_sns ) {

		$this->to_for_user_in_registration = $izanai_user_from_sns->get_user_email();
		$user_name = $izanai_user_from_sns->get_display_name();
		if ( $user_name == "" ) {
			$user_name = $izanai_user_from_sns->get_user_login();
		}

		// get mail information
		$post_page_id = get_the_ID();
		$izanai_SNS_connect = new izanai_SNS_connect_control($post_page_id);
		$this->subject_for_user_in_registration = $izanai_SNS_connect->get_subject_for_user();
		if ( $this->subject_for_user_in_registration == "" ) {
			$this->subject_for_user_in_registration = 'From '.get_bloginfo('name');
		}
		$this->message_for_user_in_registration = $izanai_SNS_connect->get_text_for_user();
		$from_name = $izanai_SNS_connect->get_from_for_user_name();
		if ( $from_name == "" ) {
			$from_name = $this->settings->get_default_from_for_user_name();
		}
		$from_address = $izanai_SNS_connect->get_from_for_user();
		if ( $from_address == "" ) {
			$from_address = $this->settings->get_default_from_for_user();
		}
		if ( $from_name == "" && $from_address != "" ) {
			$from_name = $from_address;
		}
		if ( $from_address != "" ) {
			$from_address = '"'.$from_name.'"<'.$from_address.'>';
			$this->headers_for_user_in_registration = array( 'From: '.$from_address , 'Content-Type: text/plain; charset=UTF-8' );
		} else {
			$this->headers_for_user_in_registration = array( 'Content-Type: text/plain; charset=UTF-8' );
		}

		if ( $this->message_for_user_in_registration != "" && $this->to_for_user_in_registration != "" ) {
			$this->message_for_user_in_registration = str_replace( "[" . __( 'User_from_SNS', IZANAI_DOMAIN ) . "]" , $user_name , $this->message_for_user_in_registration );
			$this->message_for_user_in_registration = do_shortcode( $this->message_for_user_in_registration );
			$return = wp_mail( $this->to_for_user_in_registration, $this->subject_for_user_in_registration, $this->message_for_user_in_registration, $this->headers_for_user_in_registration );
		} else {
			$return = false;
		}
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// mail to admin when the user is registered.
	// -----------------------------------------------------------------------------------------------------------------

	Public function mail_to_admin_in_registration( $izanai_user_from_sns ) {
		$user_name = $izanai_user_from_sns->get_display_name();
		if ( $user_name == "" ) {
			$user_name = $izanai_user_from_sns->get_user_login();
		}

		// get mail information
		$post_page_id = get_the_ID();
		$izanai_SNS_connect = new izanai_SNS_connect_control($post_page_id);
		$this->to_for_admin_in_registration = $izanai_SNS_connect->get_escape_to_for_admin();
		if ( $this->to_for_admin_in_registration == "" ) {
			$this->to_for_admin_in_registration = $this->settings->get_default_to_for_admin();
		}
		$this->cc_for_admin_in_registration = $izanai_SNS_connect->get_escape_cc_for_admin();
		if ( $this->cc_for_admin_in_registration == "" ) {
			$this->cc_for_admin_in_registration = $this->settings->get_default_cc_for_admin();
		}
		$this->bcc_for_admin_in_registration = $izanai_SNS_connect->get_escape_bcc_for_admin();
		if ( $this->bcc_for_admin_in_registration == "" ) {
			$this->bcc_for_admin_in_registration = $this->settings->get_default_bcc_for_admin();
		}
		$this->subject_for_admin_in_registration = $izanai_SNS_connect->get_escape_subject_for_admin();
		if ( $this->subject_for_admin_in_registration == "" ) {
			$this->subject_for_admin_in_registration = 'From '.get_bloginfo('name');
		}
		$this->message_for_admin_in_registration = $izanai_SNS_connect->get_escape_text_for_admin();


		$from_name = $izanai_SNS_connect->get_from_for_admin_name();
		if ( $from_name == "" ) {
			$from_name = $this->settings->get_default_from_for_admin_name();
		}
		$from_address = $izanai_SNS_connect->get_from_for_admin();
		if ( $from_address == "" ) {
			$from_address = $this->settings->get_default_from_for_admin();
		}
		if ( $from_name == "" && $from_address != "" ) {
			$from_name = $from_address;
		}
		if ( $from_address != "" ) {
			$from_address = '"'.$from_name.'"<'.$from_address.'>';
			$this->headers_for_admin_in_registration[] = 'From: '.$from_address;
		}
		if ( $this->cc_for_admin_in_registration != "" ) {
			$this->headers_for_admin_in_registration[] = 'Cc: '.$this->cc_for_admin_in_registration;
		}
		if ( $this->bcc_for_admin_in_registration != "" ) {
			$this->headers_for_admin_in_registration[] = 'Bcc: '.$this->bcc_for_admin_in_registration;
		}
		$this->headers_for_admin_in_registration[] = 'Content-Type: text/plain; charset=UTF-8';

		if ( $this->message_for_admin_in_registration != "" && $this->to_for_admin_in_registration != "" ) {
			$this->message_for_admin_in_registration = str_replace( "[" . __( 'User_from_SNS', IZANAI_DOMAIN ) . "]" , $user_name , $this->message_for_admin_in_registration );
			$this->message_for_admin_in_registration = do_shortcode( $this->message_for_admin_in_registration );
			$return = wp_mail( $this->to_for_admin_in_registration, $this->subject_for_admin_in_registration, $this->message_for_admin_in_registration, $this->headers_for_admin_in_registration );
		} else {
			$return = false;
		}
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// mail to user when the user is canceled.
	// -----------------------------------------------------------------------------------------------------------------

	Public function mail_to_user_in_cancel( $izanai_user_from_sns ) {
		$this->to_for_user_in_cancel = $izanai_user_from_sns->get_user_email();
		$user_name = $izanai_user_from_sns->get_display_name();
		if ( $user_name == "" ) {
			$user_name = $izanai_user_from_sns->get_user_login();
		}
		if ( $this->message_for_user_in_cancel != "" && $this->to_for_user_in_cancel != "" ) {
			$this->message_for_user_in_cancel = str_replace( "[" . __( 'User_from_SNS', IZANAI_DOMAIN ) . "]" , $user_name , $this->message_for_user_in_cancel );
			$this->message_for_user_in_cancel = do_shortcode( $this->message_for_user_in_cancel );
			$return = wp_mail( $this->to_for_user_in_cancel, $this->subject_for_user_in_cancel, $this->message_for_user_in_cancel, $this->headers_for_user_in_cancel );
		} else {
			$return = false;
		}
		return $return;
	}

	// -----------------------------------------------------------------------------------------------------------------
	// mail to admin when the user is canceled.
	// -----------------------------------------------------------------------------------------------------------------

	Public function mail_to_admin_in_cancel( $izanai_user_from_sns ) {
		$user_name = $izanai_user_from_sns->get_display_name();
		if ( $user_name == "" ) {
			$user_name = $izanai_user_from_sns->get_user_login();
		}
		if ( $this->message_for_admin_in_cancel != "" && $this->to_for_admin_in_cancel != "" ) {
			$this->message_for_admin_in_cancel = str_replace( "[" . __( 'User_from_SNS', IZANAI_DOMAIN ) . "]" , $user_name , $this->message_for_admin_in_cancel );
			$this->message_for_admin_in_cancel = do_shortcode( $this->message_for_admin_in_cancel );
			$return = wp_mail( $this->to_for_admin_in_cancel, $this->subject_for_admin_in_cancel, $this->message_for_admin_in_cancel, $this->headers_for_admin_in_cancel );
		} else {
			$return = false;
		}
		return $return;
	}

}

?>
