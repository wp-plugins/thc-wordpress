<?php
/*
Plugin Name: HandConverter for Wordpress
Plugin URI: http://www.handconverter.com
Description: Takes raw hand histories and inserts them into your Wordpress posts
Author: Andy Jones
Version: 0.02

Author URI: http://www.handconverter.com/

*/ 

//#################################################################
// Stop direct call
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

//#################################################################
// Let's Go
	
global $wpdb, $wp_version, $wpmu_version, $wp_roles;

// ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);

// Version and path to check version
define('HCVERSION', "0.02");
// Minimum required database version
//define('HCURL', "http://www.rograndom.com/test/version.php");

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