<?php
/*
 Plugin Name: WP Comment Fields V4
Plugin URI: http://najeebmedia.com/wpcomments
Description: Adds extra fields to post comments.
Version: 4.1
Author: N-Media
Text Domain: wpcomment
Domain Path: /languages
Author URI: http://www.najeebmedia.com/
*/

// @since 6.1
if( ! defined('ABSPATH' ) ){
	exit;
}

define('WPCOMMENT_PATH', untrailingslashit(plugin_dir_path( __FILE__ )) );
define('WPCOMMENT_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );
define('WPCOMMENT_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __DIR__ ) ));
define('WPCOMMENT_VERSION', '4.1');
define('WPCOMMENT_UPLOAD_DIR_NAME', 'wpcomment_files');
define('WPCOMMENT_TABLE_META', 'nm_personalized');

/*
 * plugin localization being initiated here
 */
add_action ( 'init', 'wpcomment_i18n_setup');
function wpcomment_i18n_setup() {

	$loadedok = load_plugin_textdomain('wpcomment', false, basename( dirname( __FILE__ ) ) . '/languages');
}


include_once WPCOMMENT_PATH . "/inc/files.php";

/* ======= For now we are including class file, we will replace  =========== */
include_once WPCOMMENT_PATH . "/classes/input.class.php";
include_once WPCOMMENT_PATH . "/classes/fields.class.php";

/**
 * NEW
 **/
include_once WPCOMMENT_PATH . "/classes/scripts.class.php";
include_once WPCOMMENT_PATH . "/classes/frontend-scripts.class.php";
include_once WPCOMMENT_PATH . "/inc/validation.php";
include_once WPCOMMENT_PATH . "/inc/functions.php";
include_once WPCOMMENT_PATH . "/classes/input-meta.class.php";
include_once WPCOMMENT_PATH . "/classes/admin.class.php";
include_once WPCOMMENT_PATH . "/classes/form.class.php";
include_once WPCOMMENT_PATH . "/classes/class.frontend.php";


// ==================== INITIALIZE PLUGIN CLASS =======================
//
add_action('plugins_loaded', 'WPCOMMENT');
//
// ==================== INITIALIZE PLUGIN CLASS =======================

function WPCOMMENT(){
	WPComment_Frontend::get_instance();
}