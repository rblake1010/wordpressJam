<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="navigationwrap">
	<div class="navigation">
		<ul>
			<li><a href="#about">About</a></li>
			<li><a href="#media">Media</a></li>
			<li><a href="#wedding">Weddings</a></li>
			<li><a href="#package">Packages</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</div><!-- end navigation -->
</div><!-- end navigationwrap -->

<header>
	<img src="<?php echo get_bloginfo('template_url') ?>/images/navicon1.png" width="39" height="34" class="mobilenav">
	<div class="slideshow">
		<ul class="bxslider">
		  <li><img src="<?php echo get_bloginfo('template_url') ?>/images/slide1.jpg" alt="Jamthunder Wedding Equipment" /></li>
		  <li><img src="<?php echo get_bloginfo('template_url') ?>/images/slide2.jpg" alt="Jamthunder DJ Equipment"  /></li>
		</ul>
	</div>
	<div class="logo">
		<img src="<?php echo get_bloginfo('template_url') ?>/images/logo.png" class="jamthunder" alt="Jamthunder Logo">
		<h1>JamThunder<span>DJ</span></h1>
		<h2>Music for all occasions</h2>
	<!--div>
		<img src="images/hat.png" class="hat" alt="Jamthunder Christmas Hat">
		</div>-->
	</div><!-- end logo -->
	<nav>
		<ul>
			<?php wp_nav_menu( array( "theme_location" => 'header-menu')) ?>
		</ul>
	</nav><!-- end nav -->
</header><!-- end header -->


