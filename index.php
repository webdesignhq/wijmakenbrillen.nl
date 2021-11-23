<?php 
get_header();

if ( is_product_category() ){
    global $wp_query;

    // get the query object
    $cat = $wp_query->get_queried_object();

    // get the thumbnail id using the queried category term_id
    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 
}

?>
<div id="content">
	
<?php if (is_shop() || is_product_category() ) {?> 
	<div class="hero hero-index" style="background-image: url('<?php if(is_shop()):?> <?php bloginfo('template_directory'); ?>/assets/img/hero.png'); <?php else: echo $image; endif?>'); background-position: center;">
		<div class="welcome__message d-flex flex-column">
			<div class="welcome__message--1"><span>Alle</span></div>
			<div class="welcome__message--2"><span><?php if(is_shop()):?> Brillen <?php else: single_term_title(); endif?></span></div>
		</div>
	</div>
<?php } ?>
<div class="w-full py-lg-5 py-2" style="<?php if (is_shop() || is_product_category() ) { ?> background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png'); background-size: 66%; <?php } ?>">
	<div class="flex-lg-row flex-column d-flex justify-content-between">
		<?php if (is_shop() || is_product_category() ) {?> 
			<div class="col-lg-2 col-12">
				<?php get_sidebar( 'primary' ); ?>
			</div>				 
		<?php } ?>
		<div class="d-flex <?php if (is_shop() || is_product_category() ) {?> col-lg-8 col-12 offset-lg-2 product-archive<?php } elseif(is_product()) { ?> single-product <?php } else { ?> col-12 <?php } ?> flex-column" >
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if (is_shop() || is_product() ) {?>
			
			<?php } else {?>
				<h1><?php the_title(); ?></h1>
			<?php } ?> 	

				<?php the_content(); ?>
				 
				
				<?php endwhile; else: ?>
				 
				<h2>Woops...</h2>
				 
				<p>Deze pagina heeft geen content.</p>
				 
				<?php endif; ?>
				 
				<?php posts_nav_link(); ?>
			</div>
	
	</div>	
</div>
	</div>
<?php
get_footer();

?>