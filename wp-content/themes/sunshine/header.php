<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_home_url();?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_home_url();?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_home_url();?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_home_url();?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_home_url();?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_home_url();?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_home_url();?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_home_url();?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_home_url();?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_home_url();?>/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_home_url();?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_home_url();?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_home_url();?>/favicon/favicon-16x16.png">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_home_url();?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-debug="true">
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="flypanels-container preload">
	<div class="flypanels-main">
		<div class="l-header">
			<div class="container">
				<div class="navbar navbar-default" role="navigation">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="<?php echo get_home_url();?>">

					      <?php if(of_get_option('logo_uploader', '')){?>
			                <img src="<?php echo of_get_option('logo_uploader', ''); ?>" alt="">
			              <?php }else{ ?>
							<img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" alt="">
			              <?php } ?>
				      </a>
				      <a class="flypanels-button-right flypanels-toggle" data-panel="treemenu" href="#"><span class="icon icon-sm icon-menu icon-r-sm"></span>Menu</a>
				    </div>
				    <div id="cssmenu" class="navbar-collapse collapse list-reset" aria-expanded="true">
				      <?php

						$defaults = array(
							'theme_location'  => 'primary',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => 'cssmenu',
							'menu_class'      => 'nav navbar-nav',
							'menu_id'         => 'menu-main',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);

						wp_nav_menu( $defaults );
					?>
						<ul class="nav navbar-nav nav-icon navbar-right">
							<?php if (of_get_option('facebook', '')): ?>
								<li> <a href="<?php echo of_get_option('facebook', ''); ?>" target='_blank'><span class="icon icon-facebook"></span></a> </li>
							<?php endif ?>
							<?php if (of_get_option('google', '')): ?>
								<li> <a href="<?php echo of_get_option('google', ''); ?>" target='_blank'><span class="icon icon-google-plus"></span></a> </li>
							<?php endif ?>
							<?php if (of_get_option('twitter', '')): ?>
								<li> <a href="<?php echo of_get_option('twitter', ''); ?>" target='_blank'><span class="icon icon-twitter"></span></a> </li>
							<?php endif ?>
							<?php if (of_get_option('youtube', '')): ?>
								<li> <a href="<?php echo of_get_option('youtube', ''); ?>" target='_blank'><span class="icon icon-youtube"></span></a> </li>
							<?php endif ?>
							<?php if (of_get_option('linkedin', '')): ?>
								<li> <a href="<?php echo of_get_option('linkedin', ''); ?>" target='_blank'><span class="icon icon-linkedin"></span></a> </li>
							<?php endif ?>
							<?php if (of_get_option('insta', '')): ?>
								<li> <a href="<?php echo of_get_option('insta', ''); ?>" target='_blank'><span class="icon icon-instagram"></span></a> </li>
							<?php endif ?>
							<?php if (of_get_option('tv', '')): ?>
								<li> <a href="<?php echo of_get_option('tv', ''); ?>" target='_blank'><span class="icon icon-tv"></span></a> </li>
							<?php endif ?>
							<li class="nav-text first"><a href="<?php bloginfo('url'); ?>/blog">Blog</a></li>
							<li class="nav-text nav-text-toggle"><a class="flypanels-button-right" data-panel="treemenu" href="#">Menu</a></li>
						</ul>
				    </div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="flypanels-content">
			<div class="l-content">