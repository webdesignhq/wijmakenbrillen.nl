<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Adinda Media
 * @since 1.0.0
 */

?>

<div class="mobile__menu__overlay--container d-xl-none">
	<div class="container p-4 d-flex flex-row justify-content-end">
		<button class="menu-close btn mt-4" type="btn" onclick=""><i class="fas fa-close"></i></button>
	</div>
	<nav> 
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav>
	<div class="shop__controls ps-4 col-lg-5 col-4 text-align-right d-inline-flex justify-content-center mt-0">
			<a href="#" class="mx-lg-3 ms-0 me-2 pt-3"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/heart.svg" /></a>
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="mx-lg-3 mx-2 pt-3"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/user.svg" /></a>
			<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Winkelwagen' ); ?>" class="mx-lg-3 mx-2 pt-3 cart__icon d-inline-flex"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/shopping-cart.svg" />
			<div class="cart__text pt-2 ps-3 d-lg-block d-none">
				<!-- <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> -->
				<p>Winkelwagen</p>
				<p class="cart__amount">
					<?php echo WC()->cart->get_cart_total(); ?> 				
				</p>
			</div>
			</a>
		</div>
</div>

<footer>
	<div id="footer">
		<div class="col-lg-8 col-10 mx-auto d-lg-flex d-block flex-row justify-content-lg-between justify-content-start">
			<div class="col-lg-4 col-12">
				<div class="shop__logo col-3 pt-2">
					<?php 
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
								}
					?>
				</div>
				<ul>
					<li>www.wijmakenbrillen.nl</li>
					<li><a href="phone:info@06-12928592">06-12928592</li>
					<li><a href="mailto:info@wijmakenbrillen.nl">info@wijmakenbrillen.nl</a></li>
					<li>Schutstraat 12-01</li>
					<li>7901 EC Hoogeveen</li>
					<div class="socials__container col-6 mt-4 d-flex flex-row justify-content-between">
					<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
					<a  href="#"><i class="fa-brands fa-facebook"></i></a>
					<a  href="#"><i class="fa-brands fa-instagram"></i></a>
					</div>
				</ul>

			</div>
			<div class="col-lg-3 col-12">
				<span>Meer informatie</span>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_moreinfo' ) ); ?>
			</div>
			<div class="col-lg-2 col-12">
			<span>Brillen</span>
				<?php wp_nav_menu( array( 'theme_location' => 'footer_categories' ) ); ?>
			</div>
			<div class="col-lg-3 col-12">
				<span>Mail ons je vraag</span>		
				<?php echo do_shortcode("[gravityform id='1' title='false' description='false' ajax='true' tabindex='49']"); ?>		
			</div>
		</div>
	</div>
	
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</body>

<?php wp_footer(); ?>

