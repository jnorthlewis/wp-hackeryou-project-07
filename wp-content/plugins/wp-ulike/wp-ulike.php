<?php
/*
Plugin Name:WP ULike
Plugin URI: http://preview.alimir.ir/developer/wp-ulike/
Description: WP ULike plugin allows to integrate a beautiful Ajax Like Button into your wordPress website to allow your visitors to like and unlike pages, posts, comments AND buddypress activities. Its very simple to use and supports many options.
Version: 2.1
Author: Ali Mirzaei
Author URI: http://about.alimir.ir
Text Domain: alimir
Domain Path: /lang/
License: GPL2
*/

	//Load Translations
	load_plugin_textdomain( 'alimir', false, dirname( plugin_basename( __FILE__ ) ) .'/lang/' );
	
	//Do not change this value
	define('WP_ULIKE_DB_VERSION', '1.2');
	
	/**
	* When the plugin is activated, This function will install wp_ulike tables in database (If not exist table)
	*
	* @author       	Alimir	 	
	* @since          	1.1
	* @updated         	1.7
	* @return			Void
	*/
	register_activation_hook(__FILE__, 'wp_ulike_install');
	function wp_ulike_install() {
		global $wpdb;
		
		$table_name = $wpdb->prefix . "ulike";
		if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
			$sql = "CREATE TABLE " . $table_name . " (
				`id` bigint(11) NOT NULL AUTO_INCREMENT,
				`post_id` int(11) NOT NULL,
				`date_time` datetime NOT NULL,
				`ip` varchar(30) NOT NULL,
				`user_id` int(11) NOT NULL,
				`status` varchar(15) NOT NULL,
				PRIMARY KEY (`id`)
			);";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			
			add_option('wp_ulike_dbVersion', WP_ULIKE_DB_VERSION);
		}
		
		$table_name_2 = $wpdb->prefix . "ulike_comments";
		if($wpdb->get_var("show tables like '$table_name_2'") != $table_name_2) {
			$sql = "CREATE TABLE " . $table_name_2 . " (
				`id` bigint(11) NOT NULL AUTO_INCREMENT,
				`comment_id` int(11) NOT NULL,
				`date_time` datetime NOT NULL,
				`ip` varchar(30) NOT NULL,
				`user_id` int(11) NOT NULL,
				`status` varchar(15) NOT NULL,
				PRIMARY KEY (`id`)
			);";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			
			update_option('wp_ulike_dbVersion', WP_ULIKE_DB_VERSION);
		}
		
		$table_name_3 = $wpdb->prefix . "ulike_activities";
		if($wpdb->get_var("show tables like '$table_name_3'") != $table_name_3) {
			$sql = "CREATE TABLE " . $table_name_3 . " (
				`id` bigint(11) NOT NULL AUTO_INCREMENT,
				`activity_id` int(11) NOT NULL,
				`date_time` datetime NOT NULL,
				`ip` varchar(30) NOT NULL,
				`user_id` int(11) NOT NULL,
				`status` varchar(15) NOT NULL,
				PRIMARY KEY (`id`)
			);";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			
			update_option('wp_ulike_dbVersion', WP_ULIKE_DB_VERSION);
		}
		
	}
	
	/**
	 * This hook is called once any activated plugins have been loaded.
	 *
	 * @author       	Alimir	 	
	 * @since           1.7
	 * @return			Void
	 */
	add_action( 'plugins_loaded', 'wp_ulike_update_db_check' );
	function wp_ulike_update_db_check() {
		if ( get_site_option( 'wp_ulike_dbVersion' ) != WP_ULIKE_DB_VERSION ) {
			wp_ulike_install();
		}
	}
	
	/**
	 * This function is getting the plugin version
	 *
	 * @author       	Alimir	 	
	 * @since           1.8
	 * @return			String
	 */
	function wp_ulike_get_version() {
		$plugin_data = get_plugin_data( __FILE__ );
		$plugin_version = $plugin_data['Version'];
		return $plugin_version;
	}
	
	//Include plugin setting file
	include( plugin_dir_path( __FILE__ ) . 'admin/admin.php');
	
	//Include general functions
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-functions.php');	
	
	//Include plugin scripts
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-script.php');
	
	//Load WP ULike posts functions
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-ulike-posts.php');
	
	//Load WP ULike comments functions
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-ulike-comments.php');
	
	//Load WP ULike buddypress functions
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-ulike-buddypress.php');		