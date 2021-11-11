<?php get_header(); ?>
<div id="content">
	<div class="flex-row d-flex">
		<div class="d-flex col-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							 
				<?php the_content(); ?>
				 
				
				<?php endwhile; else: ?>
				 
				<h2>Woops...</h2>
				 
				<p>Deze pagina heeft geen content.</p>
				 
				<?php endif; ?>
				 
				<?php posts_nav_link(); ?>
			</div>
	
	</div>	
</div>	
<?php
get_footer();

?>