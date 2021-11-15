<?php 
/* Template Name: één kolom layout */
get_header(); ?>
<div id="content">
<div class="container-xxl pt-5 pb-5">
	<div class="flex-row d-flex">
		<div class="d-flex col-12 flex-column">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
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