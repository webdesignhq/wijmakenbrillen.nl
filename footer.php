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
			</div>
		</div>
	</div>
	
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/public/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</body>

<?php wp_footer(); ?>

