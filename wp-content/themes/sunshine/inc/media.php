<?php 

// Custom Sizes Media
function setup() {  
	if(function_exists('add_theme_support')) {
		add_theme_support( 'post-thumbnails' );
		
	     add_image_size( 'thumb-sm', 255, 170, true );
	     add_image_size( 'thumb-md', 365, 250, true );
	     add_image_size( 'banner', 1560, 500, true );
		
	}
}
add_action( 'after_setup_theme', 'setup' );