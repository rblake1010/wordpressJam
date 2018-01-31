<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage SG Simple
 * @since SG Simple 1.0
*/

/**
 * SG Simple setup.
 *
 * @since SG Simple 1.0
 */
 
define( 'SGWINDOWCHILD', 'SGSimple' );
  
function sgsimple_setup() {

	$defaults = sgwindow_get_defaults();

	load_child_theme_textdomain( 'sgsimple', get_stylesheet_directory() . '/languages' );
	
	$args = array(
		'default-image'          => '',
		'header-text'            => true,
		'default-text-color'     => sgwindow_text_color( get_theme_mod('color_scheme'), $defaults ['color_scheme'] ),
		'width'                  => sgwindow_get_theme_mod( 'size_image' ),
		'height'                 => sgwindow_get_theme_mod( 'size_image_height' ),
		'flex-height'            => true,
		'flex-width'             => true,
	);
	add_theme_support( 'custom-header', $args );
	
	remove_action( 'sgwindow_empty_sidebar_top-home', 'sgwindow_the_top_sidebar_widgets', 20 );
	remove_action( 'sgwindow_empty_column_2-portfolio-page', 'sgwindow_right_sidebar_portfolio', 20 );
	remove_action( 'admin_menu', 'sgwindow_admin_page' );
}
add_action( 'after_setup_theme', 'sgsimple_setup' );

/**
 * SG Simple Colors.
 *
 * @since SG Simple 1.0
 */
   
function sgsimple_setup_colors() {
	
	/* colors */
	global $sgwindow_colors_class;
	
	$section_id = 'main_colors';
	$section_priority = 10;
	$p = 10;
	
	$i = 'link_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link', 'sgsimple'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#840a2b');
	$sgwindow_colors_class->set_color($i, 1, '#b7ba2a');
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
	
	$i = 'heading_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 heading', 'sgsimple'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#3f3f3f');
	$sgwindow_colors_class->set_color($i, 1, '#141414');
	$sgwindow_colors_class->set_color($i, 2, '#3f3f3f');
	
	$i = 'heading_link';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 Link', 'sgsimple'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#840a2b');	
	$sgwindow_colors_class->set_color($i, 1, '#b7ba2a');	
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
	
	$i = 'description_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Description', 'sgsimple'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#ffffff');	
	$sgwindow_colors_class->set_color($i, 1, '#ffffff');
	$sgwindow_colors_class->set_color($i, 2, '#ffffff');			
	
	$i = 'hover_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link Hover', 'sgsimple'), $p++, false, 'refresh');
	$sgwindow_colors_class->set_color($i, 0, '#1e73be');
	$sgwindow_colors_class->set_color($i, 1, '#1e73be');
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
}
add_action( 'after_setup_theme', 'sgsimple_setup_colors', 100 );

/**
 * Enqueue parent and child scripts
 *
 * @package WordPress
 * @subpackage SG Simple
 * @since SG Simple 1.0
*/

function sgsimple_styles() {
    wp_enqueue_style( 'sgwindow-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sgsimple-style', get_stylesheet_uri(), array( 'sgwindow-style' ) );
	
	wp_enqueue_style( 'sgsimple-colors', get_stylesheet_directory_uri() . '/css/scheme-' . sgwindow_get_theme_mod( 'color_scheme' ) . '.css', array( 'sgsimple-style', 'sgwindow-colors' ) );
}
add_action( 'wp_enqueue_scripts', 'sgsimple_styles' );

/**
 * Set defaults
 *
 * @package WordPress
 * @subpackage SG Simple
 * @since SG Simple 1.0
*/

function sgsimple_defaults( $defaults ) {

	$defaults['is_show_top_menu'] = '';
	$defaults['body_font'] = 'Open Sans';
	$defaults['heading_font'] = 'Open Sans';
	$defaults['header_font'] = 'Allerta Stencil';
	$defaults['column_background_url'] = esc_url( get_stylesheet_directory_uri() ) . '/img/back.jpg';
	$defaults['logotype_url'] =  esc_url( get_stylesheet_directory_uri() ) . '/img/logo.png';
	$defaults['post_thumbnail_size'] = '730';
	
	$defaults['width_top_widget_area'] = '1100';
	$defaults['width_content_no_sidebar'] = '1100';	
	$defaults['width_content'] = '1100';
	$defaults['width_main_wrapper'] = '1100';
	$defaults['is_home_footer'] = '1';
	$defaults['front_page_style'] = 'no_content';
	
	/* portfolio: excerpt/content */
	$defaults['portfolio_style'] = 'no_content';
	
	/* Header Image size */
	$defaults['size_image'] = '1100';
	$defaults['size_image_height'] = '400';
	/* Header Image and top sidebar wrapper */
	$defaults['width_image'] = '1100';
	
	$defaults['image_style'] = 'boxed';
	
	$defaults['width_column_1_left_rate'] = '30';
	$defaults['width_column_1_right_rate'] = '30';
	$defaults['width_column_1_rate'] = '22';
	$defaults['width_column_2_rate'] = '22';
	
	$defaults['single_style'] = 'content';

	$defaults['defined_sidebars']['home'] = array(
											'use' => '1', 
											'callback' => 'is_front_page', 
											'param' => '', 
											'title' => __( 'Home', 'sgsimple' ),
											'sidebar-top' => '1',
											'sidebar-before-footer' => '1',
											'column-1' => '1',
											'column-2' => '1', 
											);

	$defaults['footer_text'] = '<a href="' . esc_url( __( 'http://wordpress.org/', 'sgsimple' ) ) . '">' . __( 'Powered by WordPress', 'sgsimple' ). '</a> | ' . __( 'theme ', 'sgsimple' ) . '<a href="' .  esc_url( __( 'http://wpblogs.ru/themes/blog/theme/sg-simple/', 'sgsimple') ) . '">SG Simple</a>';
	
	return $defaults;

}
add_filter( 'sgwindow_option_defaults', 'sgsimple_defaults' );

/** Set theme layout
 *
 * @since SG Simple 1.0
 */
function sgsimple_layout( $layout ) {
	
	foreach( $layout as $id => $layouts ) {
		if ( 'layout_home' == $layouts['name'] || 'layout_blog' == $layouts['name'] || 'layout_archive' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'default';
			$layout[ $id ]['val'] = 'right-sidebar';
			
		}
	}
	return $layout;
}
add_filter( 'sgwindow_layout', 'sgsimple_layout' );

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage SG Simple
 * @since SG Simple 1.0
*/

function sgsimple_home_right_column( $layouts ) {

	the_widget( 'WP_Widget_Search', 'title=' );
	the_widget( 'WP_Widget_Categories' );
	the_widget( 'WP_Widget_Tag_Cloud', 'title=' );
	the_widget( 'WP_Widget_Recent_Comments' );
	
}
add_action('sgwindow_empty_column_2-home', 'sgsimple_home_right_column', 20);

/**
 * Add widgets to the top sidebar
 *
 * @since SG Simple 1.0
 */
function sgsimple_the_top_sidebar_widgets() {
	$icons = sgsimple_social_icons();
	
	$defaults = array( 
					'facebook' => '#',
					'twitter' => '#',
					'wordpress' => '#',
					'rss' => '#',
					);
	$params = null;
	
	foreach( $icons as $id => $icon ) {
		$link = get_theme_mod( $id, null);
		if( isset( $link ) && ! empty ( $link ) ) {
			$params .= '&' . $id . '=' . $link;
		}
	}
	if( ! isset( $params ) ) {
	
		foreach( $defaults as $id => $icon ) {
				$params .= '&' . $id . '=' . $icon;
		}
	}
	
	the_widget( 'sgwindow_SocialIcons',
								$params );
								
}
add_action('sgwindow_empty_sidebar_top-home', 'sgsimple_the_top_sidebar_widgets', 20);
/**
 * Return array Social Icons List
 *
 * @since SG Simple 1.0
 */
function sgsimple_social_icons(){
	$icons = array(
					'facebook' => '',
					'twitter' => '',
					'google' => '',
					'wordpress' => '',
					'blogger' => '',
					'yahoo' => '',
					'youtube' => '',
					'myspace' => '',
					'livejournal' => '',
					'linkedin' => '',
					'friendster' => '',
					'friendfeed' => '',
					'digg' => '',
					'delicious' => '',
					'aim' => '',
					'ask' => '',
					'buzz' => '',
					'tumblr' => '',		
					'flickr' => '',						
					'rss' => '',
				  );

	return $icons;
}
/**
 * Add widgets to the right sidebar on portfolio pages
 *
 * @since SG Simple 1.0
 */
function sgsimple_right_sidebar_portfolio() {

	the_widget( 'sgwindow_items_portfolio', 'title='.__('Recent Projects', 'sgsimple').
								'&count=8'.
								'&jetpack-portfolio-type=0'.
								'&columns=column-2'.
								'&is_background=1'.
								'&is_margin_0='.
								'&is_link=1'.
								'&effect_id_0=effect-1');
}
add_action('sgwindow_empty_column_2-portfolio-page', 'sgsimple_right_sidebar_portfolio', 20);

//admin page
require get_stylesheet_directory() . '/inc/admin-page.php';