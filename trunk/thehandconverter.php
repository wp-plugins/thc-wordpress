<?php
/*
Plugin Name: HandConverter for Wordpress
Plugin URI: http://www.rograndom.com/wordpress-projects/hand-converter-wordpress/
Description: Takes raw hand histories from online poker sites and inserts them into your Wordpress posts
Author: Andy Jones
Version: 0.1

Author URI: http://www.rograndom.com/

*/ 

//#################################################################
// Stop direct call
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

//#################################################################
// Let's Go
	
global $wpdb, $wp_version, $wpmu_version, $wp_roles;

// Version and path to check version
define('HCVERSION', "0.1");
// Minimum required database version

// required for Windows & XAMPP
$myabspath = str_replace("\\","/",ABSPATH);  
define('WINABSPATH', $myabspath);

define('HCFOLDER', plugin_basename( dirname(__FILE__)) );
define('HC_ABSPATH', WP_CONTENT_DIR.'/plugins/'.plugin_basename( dirname(__FILE__)).'/' );
define('HC_URLPATH', WP_CONTENT_URL.'/plugins/'.plugin_basename( dirname(__FILE__)).'/' );

// Load tinymce button 
//if (IS_WP25)
	include_once (dirname (__FILE__)."/tinymce3/tinymce.php");
//else
//	include_once (dirname (__FILE__)."/tinymce/tinymce.php");
	
?>