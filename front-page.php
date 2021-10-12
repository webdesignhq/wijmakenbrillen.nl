<?php
/* Template Name: Homepagina */

get_header();
?>
<?php is_front_page(); ?>
<div id="banner">
	<div class="row align-items-end">
		<div class="col-md-4">
		<div class="banner-1 text-center p-4">
			<h1>Woonkamer</h1>
			<p>Alles wat hier staat is slechts om een indruk te geven 
van het grafische effect van tekst op deze plek. </p>
		</div>
</div>
		<div class="banner-2 col-md-4 text-center p-4">
			<h1>Woonkamer</h1>
			<p>Alles wat hier staat is slechts om een indruk te geven 
van het grafische effect van tekst op deze plek. </p>
		</div>
		<div class="banner-3 col-md-4 text-center p-4">
			<h1>Woonkamer</h1>
			<p>Alles wat hier staat is slechts om een indruk te geven 
van het grafische effect van tekst op deze plek. </p>
		</div>
	</div>
</div>
<div id="content" class="pt-5 pb-5">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
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
</div>	
<?php
get_footer();

?>