<?php
/*
Plugin Name: izanai
Plugin URI: https://netbusiness.abcnavi.com/izanai
Description: This plugin gives your site some functions for web-marketing, for example, making invitations on Facebook, and so on.
Version: 1.1.3
Author: Dream Seeker Lab Unlimited.
Author URI: https://netbusiness.abcnavi.com/izanai
Text Domain: wp-izanai
Domain Path: /languages
*/

// Text Domain For i18n
define('IZANAI_DOMAIN', 'wp-izanai');

// izanai manual site url
define('IZANAI_MANUAL_SITE', 'https://netbusiness.abcnavi.com/izanai');

// Require ( not izanai )
require_once ABSPATH."/wp-admin/includes/user.php";
require_once("src/vender/facebook/facebook.php");

// Require ( izanai )
require_once("src/class/facebook_user.class.php");
require_once("src/class/izanai_cancel_page_view.class.php");
require_once("src/class/izanai_common_settings.class.php");
require_once("src/class/izanai_common_settings_control.class.php");
require_once("src/class/izanai_common_settings_view.class.php");
require_once("src/class/izanai_mail_control.class.php");
require_once("src/class/izanai_posts_pages_control.class.php");
require_once("src/class/izanai_SNS_connect.class.php");
require_once("src/class/izanai_SNS_connect_control.class.php");
require_once("src/class/izanai_SNS_connect_view.class.php");
require_once("src/class/izanai_SNS_connect_settings_view.class.php");
require_once("src/class/izanai_user_from_SNS.class.php");
require_once("src/class/izanai_user_from_SNS_control.class.php");
require_once("src/class/izanai_user_from_SNS_view.class.php");

class izanai_main {

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
		load_plugin_textdomain( IZANAI_DOMAIN , false , "izanai/languages" );
		add_role( 'user_from_SNS', __( 'izanai-User' , IZANAI_DOMAIN ) );
		new izanai_cancel_page_view;
		new izanai_SNS_connect_settings_view;
		new izanai_common_settings_view;
		new izanai_SNS_connect_view;
		new izanai_user_from_SNS_view;
	}

}
new izanai_main;

?>
