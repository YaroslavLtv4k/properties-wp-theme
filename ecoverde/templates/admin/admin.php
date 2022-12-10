<?php

function ecoverde_admin_settings_in_menu(){
	add_menu_page( 'Theme Options', 'Ecoverde', 'manage_options', 'ecoverde-settings', 'ecoverde_setting_init', 'dashicons-admin-appearance', 2 );
	add_submenu_page( 'ecoverde-settings', 'Social Media', 'Social Media', 'manage_options', 'social-media', 'ecoverde_social_media' );
}

// Main page settings
function ecoverde_main_settings(){
	register_setting('ecoverde-main-group', 'front_page_num');

	add_settings_section('ecoverde-main-section', 'Front Page', $callback, 'ecoverde-settings');

	add_settings_field('front-page-post-num', 'Number of posts', 'front_page_num', 'ecoverde-settings', 'ecoverde-main-section');
}
// Social Media SubMenu
function ecoverde_social_media_settings(){

	// Register Setting
	register_setting( 'social-media-group', 'socmedia_facebook');
	register_setting( 'social-media-group', 'socmedia_twitter');
	register_setting( 'social-media-group', 'socmedia_instagram');
	register_setting( 'social-media-group', 'socmedia_youtube');

	// Section
	add_settings_section( 'social-media-section', 'Your Social Medias', $callback, 'social-media' );

	// Fields
	add_settings_field( 'socmedia-facebook', 'Facebook Link', 'socmedia_facebook_callback', 'social-media', 'social-media-section');
	add_settings_field( 'socmedia-twitter', 'Twitter Link', 'socmedia_twitter_callback', 'social-media', 'social-media-section' );
	add_settings_field( 'socmedia-instagram', 'Instagram Link', 'socmedia_instagram_callback', 'social-media', 'social-media-section' );
	add_settings_field( 'socmedia-youtube', 'Youtube Link', 'socmedia_youtube_callback', 'social-media', 'social-media-section' );
}

// Add Action
add_action('admin_menu', 'ecoverde_admin_settings_in_menu' );

add_action('admin_init', 'ecoverde_social_media_settings');
add_action('admin_init', 'ecoverde_main_settings');


// Templates for admin menu items
function ecoverde_setting_init(){
	require_once(get_template_directory() . '/templates/admin/ecoverde-main.php');
}

function ecoverde_social_media(){
	require_once(get_template_directory() . '/templates/admin/social-media.php');
}

// MAIN ECOVERDE SETTINGS

// Front Page Settings
function front_page_num(){
	$num_of_posts = get_option( 'front_page_num' );
	echo '<input type="number" name="front_page_num" placeholder="Num" value="'. $num_of_posts .'"><p class="description">Put here the number of posts on the front page</p>';
}

// SOCIAL MEDIA SUBMENU

// Twitter
function socmedia_twitter_callback(){
	$twitter_link = get_option( 'socmedia_twitter' );
	echo '<input type="url" name="socmedia_twitter" placeholder="Your Twitter Link" value="'. $twitter_link .'">';
}
// Facebook
function socmedia_facebook_callback(){
	$facebook_link = get_option( 'socmedia_facebook' );
	echo '<input type="url" name="socmedia_facebook" placeholder="Your Facebook Link" value="'. $facebook_link .'">  ';
}
// Instagram
function socmedia_instagram_callback(){
	$instagram_link = get_option( 'socmedia_instagram' );
	echo '<input type="url" name="socmedia_instagram" placeholder="Your Instagram Link" value="'. $instagram_link .'">  ';
}
// Youtube
function socmedia_youtube_callback(){
	$youtube_link = get_option( 'socmedia_youtube' );
	echo '<input type="url" name="socmedia_youtube" placeholder="Your Youtube Link" value="'. $youtube_link .'">  ';
}





