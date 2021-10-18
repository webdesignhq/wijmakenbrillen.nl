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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<?php wp_head(); ?>	
</head>

<body>

<header class="w-full py-4 sticky-top">
	<div class="header d-flex flex-row justify-content-between">
		<div class="shop__logo col-lg-3 col-8 pt-3">
			<?php 
						if ( function_exists( 'the_custom_logo' ) ) {
							 the_custom_logo();
							}
			?>
		</div>
		<div class="shop__search col-lg-4 col-4 mt-lg-0 mt-4 d-lg-block d-none">
			<!-- <form><input type="text" placeholder="Zoeken naar " class="search mx-auto py-2 px-4"/></form> -->
			<?php get_search_form(); ?>
		</div>
		<div class="shop__controls col-lg-5 col-4 text-align-right d-none d-lg-inline-flex justify-content-lg-end justify-content-center mt-lg-0 mt-0">
			<a href="#" class="mx-lg-3 ms-0 me-2 pt-3"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/heart.svg" /></a>
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="mx-lg-3 mx-2 pt-3"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/user.svg" /></a>
			<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Winkelwagen' ); ?>" class="mx-lg-3 mx-2 cart__icon d-inline-flex"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/shopping-cart.svg" />
			<div class="cart__text pt-2 ps-3 d-lg-block d-none">
				<!-- <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> -->
				<p>Winkelwagen</p>
				<p class="cart__amount">
					<?php echo WC()->cart->get_cart_total(); ?> 				
				</p>
			</div>
			</a>
		</div>
		<div class="d-lg-none d-flex flex-row justify-content-between m-0 px-0 pt-2 text-uppercase">
			<div class="col-md-10 text-right"  id="menu">
				<button class="menu-toggle btn" type="btn" onclick=""><i class="fas fa-bars"></i></button>
				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
			</div>
		</div>
	</div>
	<div class="d-lg-flex d-none flex-row justify-content-between m-0 px-0 pt-2 text-uppercase">
			<div class="col-md-10 text-right"  id="menu">
				<button class="menu-toggle btn" type="btn" onclick=""><i class="fas fa-bars"></i></button>
				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
			</div>
		</div>

	
</header>





