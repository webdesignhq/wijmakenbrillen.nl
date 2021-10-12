<?php get_header(); ?>
<div id="content">
	<div class="row content">
		<div class="medium-12 columns">
			<div class="columns">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
							 
				<?php the_content(); ?>
				 
				
				<?php endwhile; else: ?>
				 
				<h2>Woops...</h2>
				 
				<p>Deze pagina heeft geen content.</p>
				 
				<?php endif; ?>
				 
				<p align="center"><?php posts_nav_link(); ?></p>
			</div>
		
		</div>
	</div>	
</div>	
<div id="partners">
	<div class="row">
		<div class="medium-12 columns">
			<?php
				$post_id = 20;
				$queried_post = get_post($post_id);
				$content = $queried_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
			?>
		</div>
	</div>
</div>
			

<?php
get_footer();

?>