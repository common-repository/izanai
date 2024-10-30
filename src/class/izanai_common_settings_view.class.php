<?php

class izanai_common_settings_view {

	// =================================================
	// Property
	// =================================================

	Private $settings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_izanai_setting' ) );
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// Add izanai-Settings
	// -----------------------------------------------------------------------------------------------------------------

	Public function add_izanai_setting() {
		add_options_page( 'izanai-Settings', __( 'izanai-Settings', IZANAI_DOMAIN ), 'manage_options', 'izanai-Settings', array( $this, 'view_izanai_Settings' ) );
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Difinite izanai-Settings
	// -----------------------------------------------------------------------------------------------------------------

	Public function view_izanai_Settings() {
		// role check
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.', IZANAI_DOMAIN ) );
		}
		// initialize
		$this->settings = new izanai_common_settings_control();
		// input data

		if (isset($_POST['facebook_app_id'])) {
			// set data
			$this->settings->set_facebook_app_id( $_POST['facebook_app_id'] );
			$this->settings->set_facebook_app_secret( $_POST['facebook_app_secret'] );
			$this->settings->set_want_facebook_user_birthday( $_POST['want_facebook_user_birthday'] );
			$this->settings->set_want_facebook_user_location( $_POST['want_facebook_user_location'] );
			$this->settings->set_default_from_for_user_name( $_POST['default_from_for_user_name'] );
			$this->settings->set_default_from_for_user( $_POST['default_from_for_user'] );
			$this->settings->set_default_from_for_admin_name( $_POST['default_from_for_admin_name'] );
			$this->settings->set_default_from_for_admin( $_POST['default_from_for_admin'] );
			$this->settings->set_default_to_for_admin( $_POST['default_to_for_admin'] );
			$this->settings->set_default_cc_for_admin( $_POST['default_cc_for_admin'] );
			$this->settings->set_default_bcc_for_admin( $_POST['default_bcc_for_admin'] );
			$this->settings->set_cancel_from_for_user_name( $_POST['cancel_from_for_user_name'] );
			$this->settings->set_cancel_from_for_user( $_POST['cancel_from_for_user'] );
			$this->settings->set_cancel_subject_for_user( $_POST['cancel_subject_for_user'] );
			$this->settings->set_cancel_text_for_user( $_POST['cancel_text_for_user'] );
			$this->settings->set_cancel_from_for_admin_name( $_POST['cancel_from_for_admin_name'] );
			$this->settings->set_cancel_from_for_admin( $_POST['cancel_from_for_admin'] );
			$this->settings->set_cancel_to_for_admin( $_POST['cancel_to_for_admin'] );
			$this->settings->set_cancel_cc_for_admin( $_POST['cancel_cc_for_admin'] );
			$this->settings->set_cancel_bcc_for_admin( $_POST['cancel_bcc_for_admin'] );
			$this->settings->set_cancel_subject_for_admin( $_POST['cancel_subject_for_admin'] );
			$this->settings->set_cancel_text_for_admin( $_POST['cancel_text_for_admin'] );
			$this->settings->set_csv_encodings( $_POST['csv_encodings'] );
		}
		// get data
		$facebook_app_id = $this->settings->get_facebook_app_id();
		$facebook_app_secret = $this->settings->get_facebook_app_secret();
		$want_facebook_user_birthday = $this->settings->get_want_facebook_user_birthday();
		$want_facebook_user_location = $this->settings->get_want_facebook_user_location();
		$default_from_for_user_name = $this->settings->get_default_from_for_user_name();
		$default_from_for_user = $this->settings->get_default_from_for_user();
		$default_from_for_admin_name = $this->settings->get_default_from_for_admin_name();
		$default_from_for_admin = $this->settings->get_default_from_for_admin();
		$default_to_for_admin = $this->settings->get_default_to_for_admin();
		$default_cc_for_admin = $this->settings->get_default_cc_for_admin();
		$default_bcc_for_admin = $this->settings->get_default_bcc_for_admin();
		$cancel_from_for_user_name = $this->settings->get_cancel_from_for_user_name();
		$cancel_from_for_user = $this->settings->get_cancel_from_for_user();
		$cancel_subject_for_user = $this->settings->get_cancel_subject_for_user();
		$cancel_text_for_user = $this->settings->get_cancel_text_for_user();
		$cancel_from_for_admin_name = $this->settings->get_cancel_from_for_admin_name();
		$cancel_from_for_admin = $this->settings->get_cancel_from_for_admin();
		$cancel_to_for_admin = $this->settings->get_cancel_to_for_admin();
		$cancel_cc_for_admin = $this->settings->get_cancel_cc_for_admin();
		$cancel_bcc_for_admin = $this->settings->get_cancel_bcc_for_admin();
		$cancel_subject_for_admin = $this->settings->get_cancel_subject_for_admin();
		$cancel_text_for_admin = $this->settings->get_cancel_text_for_admin();
		$csv_encodings = $this->settings->get_csv_encodings();
		// view
		echo "<div>";
		echo "		<h1>" . __( 'izanai Settings' , IZANAI_DOMAIN ) . "</h1>";
		echo "		<BR>";
		echo "		" . __( 'If you want to see the manual of this plugin, see the manual site. ' , IZANAI_DOMAIN ) . "<a href=\"" . IZANAI_MANUAL_SITE . "\">" . IZANAI_MANUAL_SITE . "</a>";
		echo "		<form action=\"\" method=\"post\">";
		echo "			<table>";
		echo "				<tr><td colspan=\"3\"><hr style=\"width:100%\"></td></tr>";
		echo "				<tr><td colspan=\"3\"><b>" . __( "Input your App ID and App Secret you got in facebook for developers.", IZANAI_DOMAIN ) . "</b></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Facebook App ID', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"facebook_app_id\" style=\"width:50%\" value=\"{$facebook_app_id}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Facebook App Secret', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"facebook_app_secret\" style=\"width:50%\" value=\"{$facebook_app_secret}\" /></td></tr>";
		echo "				<tr><td colspan=\"3\"><hr style=\"width:100%\"></td></tr>";
		echo "				<tr><td colspan=\"3\"><b>" . __( "Input the information you want to get from facebook.", IZANAI_DOMAIN ) . "</b></td></tr>";
		if ( $want_facebook_user_birthday == "true" ) {
			echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'User birthday', IZANAI_DOMAIN) . "</b></td><td><input type=\"radio\" name=\"want_facebook_user_birthday\" value=\"true\" checked>" . __( 'I want to get.', IZANAI_DOMAIN) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"want_facebook_user_birthday\" value=\"false\">" . __( 'I don\'t want to get.', IZANAI_DOMAIN) . "</td></tr>";
		} else {
			echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'User birthday', IZANAI_DOMAIN) . "</b></td><td><input type=\"radio\" name=\"want_facebook_user_birthday\" value=\"true\">" . __( 'I want to get.', IZANAI_DOMAIN) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"want_facebook_user_birthday\" value=\"false\" checked>" . __( 'I don\'t want to get.', IZANAI_DOMAIN) . "</td></tr>";
		}
		if ( $want_facebook_user_location == "true" ) {
			echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'User location', IZANAI_DOMAIN) . "</b></td><td><input type=\"radio\" name=\"want_facebook_user_location\" value=\"true\" checked>" . __( 'I want to get.', IZANAI_DOMAIN) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"want_facebook_user_location\" value=\"false\">" . __( 'I don\'t want to get.', IZANAI_DOMAIN) . "</td></tr>";
		} else {
			echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'User location', IZANAI_DOMAIN) . "</b></td><td><input type=\"radio\" name=\"want_facebook_user_location\" value=\"true\">" . __( 'I want to get.', IZANAI_DOMAIN) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"want_facebook_user_location\" value=\"false\" checked>" . __( 'I don\'t want to get.', IZANAI_DOMAIN) . "</td></tr>";
		}
		echo "				<tr><td colspan=\"3\"><hr style=\"width:100%\"></td></tr>";
		echo "				<tr><td colspan=\"3\"><b>" . __( 'Input the information of the mail sent at your registration time.', IZANAI_DOMAIN) . "</b></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Name (From) sent to the registered user', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_from_for_user_name\" style=\"width:50%\" value=\"{$default_from_for_user_name}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (From) sent to the registered user', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_from_for_user\" style=\"width:50%\" value=\"{$default_from_for_user}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Name (From) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_from_for_admin_name\" style=\"width:50%\" value=\"{$default_from_for_admin_name}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (From) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_from_for_admin\" style=\"width:50%\" value=\"{$default_from_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (To) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_to_for_admin\" style=\"width:50%\" value=\"{$default_to_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (Cc) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_cc_for_admin\" style=\"width:50%\" value=\"{$default_cc_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (Bcc) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"default_bcc_for_admin\" style=\"width:50%\" value=\"{$default_bcc_for_admin}\" /></td></tr>";
		echo "				<tr><td colspan=\"3\"><hr style=\"width:100%\"></td></tr>";
		echo "				<tr><td colspan=\"3\"><b>" . __( 'Input the information of the mail sent at your deregistration time.', IZANAI_DOMAIN) . "</b></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Name (From) sent to the deregistered user', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_from_for_user_name\" style=\"width:50%\" value=\"{$cancel_from_for_user_name}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (From) sent to the deregistered user', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_from_for_user\" style=\"width:50%\" value=\"{$cancel_from_for_user}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Subject sent to the deregistered user', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_subject_for_user\" style=\"width:100%\" value=\"{$cancel_subject_for_user}\" /></td></tr>";
		echo "				<tr><td> </td><td valign=\"top\" style=\"width:200px\"><b>" . __( 'Mail-Text sent to the deregistered user', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><textarea name=\"cancel_text_for_user\" style=\"width:100%;height:200px;\">{$cancel_text_for_user}</textarea></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Name (From) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_from_for_admin_name\" style=\"width:50%\" value=\"{$cancel_from_for_admin_name}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (From) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_from_for_admin\" style=\"width:50%\" value=\"{$cancel_from_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (To) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_to_for_admin\" style=\"width:50%\" value=\"{$cancel_to_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (Cc) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_cc_for_admin\" style=\"width:50%\" value=\"{$cancel_cc_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Address (Bcc) sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_bcc_for_admin\" style=\"width:50%\" value=\"{$cancel_bcc_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'Mail-Subject sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><input type=\"text\" name=\"cancel_subject_for_admin\" style=\"width:100%\" value=\"{$cancel_subject_for_admin}\" /></td></tr>";
		echo "				<tr><td> </td><td valign=\"top\" style=\"width:250px\"><b>" . __( 'Mail-Text sent to the site administrator', IZANAI_DOMAIN) . "</b></td><td style=\"width:700px\"><textarea name=\"cancel_text_for_admin\" style=\"width:100%;height:200px;\">{$cancel_text_for_admin}</textarea></td></tr>";
		echo "				<tr><td colspan=\"3\"><hr style=\"width:100%\"></td></tr>";
		echo "				<tr><td colspan=\"3\"><b>" . __( 'Input the character encoding of the izanai-User-List CSV file' , IZANAI_DOMAIN ) . "</b></td></tr>";
		echo "				<tr><td> </td><td style=\"width:230px\"><b>" . __( 'the character encoding', IZANAI_DOMAIN ) . "</b></td><td style=\"width:700px\">";
		echo "					<select name=\"csv_encodings\">";
		if ( $csv_encodings == "Shift-JIS"  ) {
			echo "						<option value=\"Shift-JIS\" selected>Shift-JIS</option>";
			echo "						<option value=\"UTF-8\">UTF-8</option>";
		} else {
			echo "						<option value=\"Shift-JIS\">Shift-JIS</option>";
			echo "						<option value=\"UTF-8\" selected>UTF-8</option>";
		}
		echo "				</td></tr>";
		echo "				<tr><td colspan=\"3\"><hr style=\"width:100%\"></td></tr>";
		echo "				<tr><td colspan=\"3\"><input type=\"submit\"  class=\"button-primary\" value=\"" . __( 'Submit' , IZANAI_DOMAIN ) . "\" /></td></tr>";
		echo "			</table>";
		echo "		</form>";
		echo "</div>";
	}

}

?>
