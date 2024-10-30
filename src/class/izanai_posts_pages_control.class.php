<?php

class izanai_posts_pages_control {

	// =================================================
	// Constractor
	// =================================================

	Public function __construct() {
	}

	// =================================================
	// Method
	// =================================================

	// -----------------------------------------------------------------------------------------------------------------
	// make cancel-page and register its id as "CancelPageID".
	// -----------------------------------------------------------------------------------------------------------------

	Public function create_cancel_page() {
		$new_content = __( 'If you want de-registration from this site, write your mail-address and push the de-registration button.' , IZANAI_DOMAIN );
		$cancel_page_id = wp_insert_post(
			array(
				'post_title'   => 'CancelPage',
				'post_name'    => 'cancel-page',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => $new_content,
			)
		);
		update_option('CancelPageID', $cancel_page_id );
	}

}

?>
