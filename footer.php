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
		<div class="container">
			<div class="row pt-5">
				<div class="col-md-3 small-12 columns">
					<h3>Hoe kunnen wij jou helpen?</h3>
					<p>Alles wat hiet staat is slecht om een indruk te maken</p>
					<h3>Volg ons op social media</h3>
				</div>
				<div class="col-md-3 small-12 columns">
					<h3>Klantenservice</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_customerservice' ) ); ?>
				</div>
				<div class="col-md-3 small-12 columns">
					<h3>Informatie<h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer_moreinfo' ) ); ?>
				</div>
				<div class="col-md-3 small-12 columns contact">
					<h3>Waar vind je ons?<h3>
					<ul>
						<li>Straatnaam 1A</li>
						<li>0000AA Plaats</li>
					</ul>

					<ul>
						<li>Straatnaam 1A</li>
						<li>0000AA Plaats</li>
						<li>(op afspraak)</li>
					</ul>

					<ul>
						<li><a class="contact" href="#">0523 615323</a></li>
						<li><a href="#">info@huisentuin.nl</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="copyright">
		<div class="row">
			<div class="col-md-12 columns">
				<p class="text-white">Copyright &copy; - <?php echo date('Y') ?></p>
			</div>
		</div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</body>

<?php wp_footer(); ?>

