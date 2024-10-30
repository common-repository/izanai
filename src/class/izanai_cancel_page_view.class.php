<?php

class izanai_cancel_page_view {

	// =================================================
	// Property
	// =================================================

	// cancel-page controller
	Private $izanai_posts_pages;

	// user controller
	Private $izanai_user;

	// mail controller
	Private $izanai_mail;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->izanai_posts_pages = new izanai_posts_pages_control();
		$this->izanai_user = new izanai_user_from_SNS_control();
		$this->izanai_mail = new izanai_mail_control();
		add_action('after_setup_theme', array( $this, 'exists_cancel_page' ) );
		add_action( 'the_content', array( $this, 'cancel_user_button' ) );
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// If there is not Cancel-Page, make it.
	// -----------------------------------------------------------------------------------------------------------------

	Public function exists_cancel_page() {
		$cancel_page_id = get_option('CancelPageID');
		$cancel_page_status = get_post_status( $cancel_page_id );
		if ( $cancel_page_status == false ) {
			$this->izanai_posts_pages->create_cancel_page();
		}
	}

	// -----------------------------------------------------------------------------------------------------------------
	// add textbox ( for mail-address of cancel-user ) and submit-button ( for cancel ) on the Cancel-Page.
	// -----------------------------------------------------------------------------------------------------------------

	Public function cancel_user_button($the_content) {
		global $post;
		$cancel_page_id = get_option('CancelPageID');
		if ( $post->ID == $cancel_page_id ) {
			if (isset($_POST['cancel_email'])) {
				$user = $this->izanai_user->get_user_with_email( $_POST['cancel_email'] );
				if ( $user != false ) {
					$user_name = $user->get_display_name();
					if ( $user_name == "" ) {
						$user_name = $user->get_user_login();
					}
					$rc = $this->izanai_user->delete_user_with_email( $user->get_user_email() );
					if ($rc) {
						$this->izanai_mail->mail_to_user_in_cancel( $user );
						$this->izanai_mail->mail_to_admin_in_cancel( $user );
					}
				}
			}
			$return  = $the_content;
			$return .= '<form action="" method="post">';
			$return .= '	<center>';
			$return .= '		<p>' . __( 'Input your mail address for de-registration :', IZANAI_DOMAIN ) . '<input type="text" name="cancel_email" style="width:50%" value="" /></p>';
			$return .= '		<p><input type="submit" value="' . __( 'de-registration', IZANAI_DOMAIN ) . '" /></p>';
			$return .= '	</center>';
			$return .= '</form>';
		} else {
			$return = $the_content;
		}
		return $return;
	}

}

?>