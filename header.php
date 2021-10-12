<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Webdesignhq
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>	
</head>

<body>
	<header>
	<div id="topheader"> 
		<div class="container">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-around align-self-center p-2">
						<div>Gratis verzending</div>
						<div>Super kwaliteit</div>
						<div>Nog een usp</div>
						<div>Nog een usp</div>
				</div>
			</div>
		</div>
	</div>
		<div class="header">
			<div class="container">
			<div class="row align-self-center">
				<div class="col-md-2 columns text-center">
				<div class="custom_logo">
					<?php 
						if ( function_exists( 'the_custom_logo' ) ) {
							 the_custom_logo();
							}
						?>
				</div>
				</div>
				<div class="col-md-6">
					<input type="search">
				</div>
				<div class="col-md-4">
					<p>icons</p>
				</div>
			</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-8"  id="menu">
							<button class="menu-toggle btn"><i class="fas fa-bars"></i></button>
							<nav id="site-navigation" class="main-navigation">
								<div class="container">
									<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
								</div>
							</nav>
						</div>
						<div class="col-md-4">
							<div class="social">
							<p>icons</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>




