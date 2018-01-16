<?php
	
add_theme_support( 'title-tag' );

register_nav_menus( array(
		'header-menu' => 'Main Navigation',
	));

function jamthunder_scripts() {
	wp_enqueue_style( 'jamthunder-style-reset', get_template_directory_uri() . '/css/reset.css' );
	wp_enqueue_style( 'jamthunder-styles', get_stylesheet_uri());
	wp_enqueue_style( 'jamthunder-style-fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css' );
	wp_enqueue_style( 'jamthunder-style-bxslider', get_template_directory_uri() . '/bxslider/jquery.bxslider.css' );
	wp_enqueue_style( 'jamthunder-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700');
}
add_action( 'wp_enqueue_scripts', 'jamthunder_scripts');

function jamthunder_js_scripts(){
	wp_enqueue_script( 'jamthunder-script-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jamthunder-script-modernizr', get_template_directory_uri() . '/js/modernizr.custom.67211.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jamthunder-script-fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jamthunder-script-fancybox-media', get_template_directory_uri() . '/fancybox/helpers/jquery.fancybox-media.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jamthunder-script-bxslider', get_template_directory_uri() . '/bxslider/jquery.bxslider.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jamthunder-script-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jamthunder-script-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'jamthunder_js_scripts');



?>