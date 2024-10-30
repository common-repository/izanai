<?php

class izanai_user_from_SNS_view {

	// =================================================
	// Property
	// =================================================

	Private $izanai_user;
	Private $settings;

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		$this->izanai_user = new izanai_user_from_SNS_control();
		$this->settings = new izanai_common_settings_control();
		add_filter('user_contactmethods', array( $this, 'add_user_contact' ) );
		add_action( 'admin_menu', array( $this, 'add_izanai_user_list_page' ) );
		add_action( 'init', array( $this, 'generate_csv_of_izanai_user_list' ) );
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
	// Add User List Page
	// -----------------------------------------------------------------------------------------------------------------

	Public function add_izanai_user_list_page() {
		add_users_page( __( 'izanai-Users-List', IZANAI_DOMAIN ) , __( 'izanai-Users-List', IZANAI_DOMAIN ) , 'manage_options', 'izanai-users-list', array( $this, 'izanai_users_list_page' ) );
	}

	// -----------------------------------------------------------------------------------------------------------------
	// Definite izanai Users List Page
	// -----------------------------------------------------------------------------------------------------------------

	Public function izanai_users_list_page() {

		if ( ! current_user_can( 'manage_options' ) )
			wp_die( 'You do not have sufficient permissions to access this page.' );
		if ( $_POST['izanai_user_submit'] == __( 'Search', IZANAI_DOMAIN ) || $_POST['izanai_user_submit'] == __( 'Output Search-Result', IZANAI_DOMAIN ) ) {
			$user_name_init = $_POST['user_name'];
			$register_date_start_init = $_POST['register_date_start'];
			$register_date_end_init = $_POST['register_date_end'];
			$user_email_init = $_POST['user_email'];
			$birthday_start_init = $_POST['birthday_start'];
			$birthday_end_init = $_POST['birthday_end'];
			$user_location_init = $_POST['user_location'];
			$birth_month_init = $_POST['birth_month'];
			$user_gender_init = $_POST['user_gender'];
			$izanai_page_category_init = $_POST['izanai_page_category'];
			$izanai_page_title_init = $_POST['izanai_page_title'];
			$izanai_page_init = $_POST['izanai_page'];
		} else {
			$user_name_init = "";
			$register_date_start_init = "";
			$register_date_end_init = "";
			$user_email_init = "";
			$birthday_start_init = "";
			$birthday_end_init = "";
			$user_location_init = "";
			$birth_month_init = __( 'ALL', IZANAI_DOMAIN );
			$user_gender_init = __( 'ALL', IZANAI_DOMAIN );
			$izanai_page_category_init = __( 'ALL', IZANAI_DOMAIN );
			$izanai_page_title_init = __( 'ALL', IZANAI_DOMAIN );
			$izanai_page_init = __( 'ALL', IZANAI_DOMAIN );
		}
		// view
		echo '<div class="wrap">';
		echo '<h1>' . __( 'izanai Users List', IZANAI_DOMAIN ) . '</h1>';
		echo '<br>';
		echo  __( 'If you want to see the manual of this plugin, see the manual site. ' , IZANAI_DOMAIN ) . "<a href=\"" . IZANAI_MANUAL_SITE . "\">" . IZANAI_MANUAL_SITE . "</a>";
		echo '<br>';
		echo '<h4>' . __( 'Set conditions and put "Search" button, and list the izanai-users who meet conditions. ( If conditions is not set, all izanai-users are listed.)', IZANAI_DOMAIN ) . '</h4>';
		echo '<h4>' . __( 'Set conditions and put "Output Search-Result" button, and Output CSV file of the search-result.', IZANAI_DOMAIN ) . '</h4>';
		if ( isset( $_GET['error'] ) ) {
			echo '<div class="updated"><p><strong>' . 'No user found.' . '</strong></p></div>';
		}
		echo '<form method="post" action="" enctype="multipart/form-data">';
		wp_nonce_field( 'izanai-user-page_export', '_wpnonce-izanai-user-page_export' );
		echo '<table class="form-table">';
		echo '	<tr valign="top">';
		echo '		<th scope="row"><label>' . __( 'User name', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" name="user_name" style="width:80%" value="' . $user_name_init . '" >';
		echo '		</td>';
		echo '		<th scope="row"><label>' . __( 'Date of registration', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="date" name="register_date_start" value="' . $register_date_start_init . '" >';
		echo '			' . __( '--', IZANAI_DOMAIN );
		echo '			<input type="date" name="register_date_end" value="' . $register_date_end_init . '">';
		echo '		</td>';
		echo '	</tr>';
		echo '	<tr valign="top">';
		echo '		<th scope="row"><label>' . __( 'User e-mail', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" name="user_email" style="width:80%" value="' . $user_email_init . '">';
		echo '		</td>';
		echo '		<th scope="row"><label>' . __( 'User birthday', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="date" name="birthday_start" value="' . $birthday_start_init . '">';
		echo '			' . __( '--', IZANAI_DOMAIN );
		echo '			<input type="date" name="birthday_end" value="' . $birthday_end_init . '">';
		echo '		</td>';
		echo '	</tr>';
		echo '	<tr valign="top">';
		echo '		<th scope="row"><label>' . __( 'User location', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" name="user_location" style="width:40%" value="' . $user_location_init . '">';
		echo '		</td>';
		echo '		<th scope="row"><label>' . __( 'Month of user birthday', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<select name="birth_month" size="1">';
		if ($birth_month_init == __( 'ALL', IZANAI_DOMAIN )) {
			echo '				<option value="' . __( 'ALL', IZANAI_DOMAIN ) . '" selected>' . __( 'ALL', IZANAI_DOMAIN ) . '</option>';
		} else {
			echo '				<option value="' . __( 'ALL', IZANAI_DOMAIN ) . '">' . __( 'ALL', IZANAI_DOMAIN ) . '</option>';
		}
		if ($birth_month_init == "1") {
			echo '				<option value="1" selected>1</option>';
		} else {
			echo '				<option value="1">1</option>';
		}
		if ($birth_month_init == "2") {
			echo '				<option value="2" selected>2</option>';
		} else {
			echo '				<option value="2">2</option>';
		}
		if ($birth_month_init == "3") {
			echo '				<option value="3" selected>3</option>';
		} else {
			echo '				<option value="3">3</option>';
		}
		if ($birth_month_init == "4") {
			echo '				<option value="4" selected>4</option>';
		} else {
			echo '				<option value="4">4</option>';
		}
		if ($birth_month_init == "5") {
			echo '				<option value="5" selected>5</option>';
		} else {
			echo '				<option value="5">5</option>';
		}
		if ($birth_month_init == "6") {
			echo '				<option value="6" selected>6</option>';
		} else {
			echo '				<option value="6">6</option>';
		}
		if ($birth_month_init == "7") {
			echo '				<option value="7" selected>7</option>';
		} else {
			echo '				<option value="7">7</option>';
		}
		if ($birth_month_init == "8") {
			echo '				<option value="8" selected>8</option>';
		} else {
			echo '				<option value="8">8</option>';
		}
		if ($birth_month_init == "9") {
			echo '				<option value="9" selected>9</option>';
		} else {
			echo '				<option value="9">9</option>';
		}
		if ($birth_month_init == "10") {
			echo '				<option value="10" selected>10</option>';
		} else {
			echo '				<option value="10">10</option>';
		}
		if ($birth_month_init == "11") {
			echo '				<option value="11" selected>11</option>';
		} else {
			echo '				<option value="11">11</option>';
		}
		if ($birth_month_init == "12") {
			echo '				<option value="12" selected>12</option>';
		} else {
			echo '				<option value="12">12</option>';
		}
		echo '			</select>';
		echo '			' . __( '(month)', IZANAI_DOMAIN );
		echo '		</td>';
		echo '	</tr>';
		echo '	<tr valign="top">';
		echo '		<th scope="row"><label>' . __( 'User gender', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<select name="user_gender" id="pp_eu_users_gender" value="' . $user_gender_init . '">';
		$user_gender_list = $this->izanai_user->get_user_gender_list();
		foreach ( $user_gender_list as $gender ) {
			if ( $gender == $user_gender_init ) {
				echo '<option value="' . $gender . '" selected>' . $gender . '</option>';
			} else {
				echo '<option value="' . $gender . '">' . $gender . '</option>';
			}
		}
		echo '			</select>';
		echo '		</td>';
		echo '		<th scope="row"><label>' . __( 'Categories of the post or page in registration', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<select name="izanai_page_category" id="pp_eu_users_page" style="width:90%">';
		$izanai_page_category_list = $this->izanai_user->get_izanai_page_category_list();
		foreach ( $izanai_page_category_list as $category ) {
			if ( $category == $izanai_page_category_init ) {
				echo '<option value="' . $category . '" selected>' . $category . '</option>';
			} else {
				echo '<option value="' . $category . '">' . $category . '</option>';
			}
		}
		echo '			</select>';
		echo '		</td>';
		echo '	</tr>';
		echo '	<tr valign="top">';
		echo '		<th scope="row"><label>' . __( 'Title of the post or page in registration', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<select name="izanai_page_title" id="pp_eu_users_page" style="width:80%">';
		$izanai_page_title_list = $this->izanai_user->get_izanai_page_title_list();
		foreach ( $izanai_page_title_list as $title ) {
			if ( $title == $izanai_page_title_init ) {
				echo '<option value="' . $title . '" selected>' . $title . '</option>';
			} else {
				echo '<option value="' . $title . '">' . $title . '</option>';
			}
		}
		echo '			</select>';
		echo '		</td>';
		echo '		<th scope="row"><label>' . __( 'URL of the post or page in registration', IZANAI_DOMAIN ) . '</label></th>';
		echo '		<td>';
		echo '			<select name="izanai_page" id="pp_eu_users_page" style="width:90%">';
		$izanai_page_list = $this->izanai_user->get_izanai_page_list();
		foreach ( $izanai_page_list as $url ) {
			if ( $url == $izanai_page_init ) {
				echo '<option value="' . $url . '" selected>' . $url . '</option>';
			} else {
				echo '<option value="' . $url . '">' . $url . '</option>';
			}
		}
		echo '			</select>';
		echo '		</td>';
		echo '	</tr>';
		echo '</table>';
		echo '<p class="submit">';
		echo '	<input type="hidden" name="_wp_http_referer" value="' . $_SERVER['REQUEST_URI'] . '" />';
		echo '	<input type="submit" name="izanai_user_submit" class="button-primary" value="' . __( 'Search', IZANAI_DOMAIN ) . '" />';
		echo '	<input type="submit" name="izanai_user_submit" class="button-primary" value="' . __( 'Output Search-Result', IZANAI_DOMAIN ) . '" />';
		echo '	<input type="submit" name="izanai_user_submit" class="button-primary" value="' . __( 'Initializing the values', IZANAI_DOMAIN ) .'" />';
		echo '</p>';
		$conditions = array(
			'user_name' => $user_name_init,
			'register_date_start' => $register_date_start_init,
			'register_date_end' => $register_date_end_init,
			'user_email' => $user_email_init,
			'birthday_start' => $birthday_start_init,
			'birthday_end' => $birthday_end_init,
			'user_location' => $user_location_init,
			'birth_month' => $birth_month_init,
			'user_gender' => $user_gender_init,
			'izanai_page_category' => $izanai_page_category_init,
			'izanai_page_title' => $izanai_page_title_init,
			'izanai_page' => $izanai_page_init
		);
		$this->view_izanai_users_list_table($conditions);
		echo '</form>';

	}

	// -----------------------------------------------------------------------------------------------------------------
	// View izanai users list table
	// -----------------------------------------------------------------------------------------------------------------

	Private function view_izanai_users_list_table($conditions) {

		// set columns
		$fields = array(
			'id',
			'user_sns',
			'user_registered',
			'display_name',
			'user_login',
			'user_gender',
			'user_email',
			'user_birthday',
			'user_location',
			'izanai_page',
			'izanai_page_title',
			'izanai_page_category'
		);

		// set table header
		$fields_header = array(
			__( 'ID', IZANAI_DOMAIN ),
			__( 'SNS', IZANAI_DOMAIN ),
			__( 'Date of registration', IZANAI_DOMAIN ),
			__( 'User name', IZANAI_DOMAIN ),
			__( 'User Login', IZANAI_DOMAIN ),
			__( 'User gender', IZANAI_DOMAIN ),
			__( 'User e-mail', IZANAI_DOMAIN ),
			__( 'User birthday', IZANAI_DOMAIN ),
			__( 'User location', IZANAI_DOMAIN ),
			__( 'izanai-Page', IZANAI_DOMAIN ),
			__( 'izanai-Page-Title', IZANAI_DOMAIN ),
			__( 'izanai-Page-Categories', IZANAI_DOMAIN )
		);

		// get data
		$users = $this->izanai_user->get_users_in_conditions($conditions);

		// view
		echo '<style type="text/css">';
		echo '.table_to_admin {';
		echo '  border-collapse: collapse;';
		echo '}';
		echo '.table_to_admin th {';
		echo '  background-color: #cccccc;';
		echo '}';
		echo '</style>';
		echo '<table class="table_to_admin" border=1>';
		echo '<caption>';
		echo '<strong>' . __( 'izanai Users Search-Result List', IZANAI_DOMAIN ) . '</strong>';
		echo '</caption>';
		foreach ( $fields_header as $field ) {
			echo '<th>'. $field .'</th>';
		}
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach ( $users as $user ) {
			echo '<tr>';
			foreach ( $fields as $field ) {
				$value = isset( $user->{$field} ) ? $user->{$field} : '';
				$value = is_array( $value ) ? serialize( $value ) : $value;
				echo '<td>' . $value . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';

	}

	// -----------------------------------------------------------------------------------------------------------------
	// Generate izanai users list csv file
	// -----------------------------------------------------------------------------------------------------------------

	Public function generate_csv_of_izanai_user_list() {
		if ( isset( $_POST['_wpnonce-izanai-user-page_export'] ) && $_POST['izanai_user_submit'] == __( 'Output Search-Result', IZANAI_DOMAIN ) ) {
			check_admin_referer( 'izanai-user-page_export', '_wpnonce-izanai-user-page_export' );

			// set columns
			$fields = array(
				'id',
				'user_registered',
				'display_name',
				'user_login',
				'user_gender',
				'user_email',
				'user_birthday',
				'user_location',
				'izanai_page',
				'izanai_page_title',
				'izanai_page_category',
				'user_sns',
				'user_facebook_id'
			);

			// set table header
			$fields_header = array(
				__( 'ID', IZANAI_DOMAIN ),
				__( 'Date of registration', IZANAI_DOMAIN ),
				__( 'User name', IZANAI_DOMAIN ),
				__( 'User Login', IZANAI_DOMAIN ),
				__( 'User gender', IZANAI_DOMAIN ),
				__( 'User e-mail', IZANAI_DOMAIN ),
				__( 'User birthday', IZANAI_DOMAIN ),
				__( 'User location', IZANAI_DOMAIN ),
				__( 'izanai-Page', IZANAI_DOMAIN ),
				__( 'izanai-Page-Title', IZANAI_DOMAIN ),
				__( 'izanai-Page-Categories', IZANAI_DOMAIN ),
				__( 'SNS', IZANAI_DOMAIN ),
				__( 'Facebook-ID', IZANAI_DOMAIN )
			);

			// get data
			$conditions = array(
				'user_name' => $_POST['user_name'],
				'register_date_start' => $_POST['register_date_start'],
				'register_date_end' => $_POST['register_date_end'],
				'user_email' => $_POST['user_email'],
				'birthday_start' => $_POST['birthday_start'],
				'birthday_end' => $_POST['birthday_end'],
				'user_location' => $_POST['user_location'],
				'birth_month' => $_POST['birth_month'],
				'user_gender' => $_POST['user_gender'],
				'izanai_page_category' => $_POST['izanai_page_category'],
				'izanai_page_title' => $_POST['izanai_page_title'],
				'izanai_page' => $_POST['izanai_page']
			);
			$users = $this->izanai_user->get_users_in_conditions($conditions);

			// get encoding
			$encoding = $this->settings->get_csv_encodings();

			// write csv - filename
			$sitename = sanitize_key( get_bloginfo( 'name' ) );
			if ( ! empty( $sitename ) ) {
				$sitename .= '.';
			}
			$filename = $sitename . '_izanai_users.' . date( 'Y-m-d-H-i-s' ) . '.csv';
			header( 'Content-Description: File Transfer' );
			header( 'Content-Disposition: attachment; filename=' . $filename );
			header( 'Content-Type: text/csv; charset=' . get_option( 'blog_charset' ), true );

			// write csv - header
			$headers = array();
			foreach ( $fields_header as $key => $field ) {
							$headers[] = '"' . $field . '"';
			}
			$outline = implode( ',', $headers ) . "\n";
			if ( $encoding == "Shift-JIS" ) {
				$outline = mb_convert_encoding( $outline, "SJIS" );
				echo $outline;
			} else {
				echo $outline;
			}

			// write csv - data
			foreach ( $users as $user ) {
				$outline = "";
				$data = "";
				foreach ( $fields as $field ) {
					$value = isset( $user->{$field} ) ? $user->{$field} : '';
					$value = is_array( $value ) ? serialize( $value ) : $value;
					$data[] = '"' . str_replace( '"', '""', $value ) . '"';
				}
				$outline = implode( ',', $data ) . "\n";
				if ( $encoding == "Shift-JIS" ) {
					$outline = mb_convert_encoding( $outline, "SJIS" );
					echo $outline;
				} else {
					echo $outline;
				}
			}

			// Exit
			exit;
		}
	}

}

?>
