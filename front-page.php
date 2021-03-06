<?php
/* Template Name: Homepagina */

get_header();
?>
<?php is_front_page(); ?>
<div class="hero" style="background-image: url(<?php echo get_field('homepage_image'); ?>);">
            <div class="welcome__message d-flex flex-column">
                <div class="welcome__message--1"><span>Welkom bij</span></div>
                <div class="welcome__message--2"><span>Wijmakenbrillen.nl</span></div>
            </div>
</div>


<div class="container mx-auto">
            <div class="usp__container mx-auto d-flex flex-row justify-content-around p-lg-5 p-4 ">
                <div class="usp d-flex flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/milieu.svg" alt="" /><span>Milieuvriendelijk</span></div>
                <div class="seperator mx-4"></div>
                <div class="usp d-flex flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/hand.svg" alt="" /><span>Handgemaakt</span></div>
                <div class="seperator mx-4 d-lg-inline d-none"></div>
                <div class="usp d-lg-flex d-none flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/design.svg" alt="" /><span>Eigen design</span></div>
                <div class="seperator mx-4 d-lg-inline d-none"></div>
                <div class="usp d-lg-flex d-none flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/factory.svg" alt="" /><span>Eigen productie</span></div>
            </div>

			<div class="category__container mx-auto">
                <p class="category__headline"><?php echo get_field('hp_titel_1'); ?></p>
				<p><?php echo get_field('hp_paragraph_1'); ?></p>
                <div class="categories d-lg-flex col-12 d-block flex-row justify-content-between mt-4">
                    <div class="col-lg-4 col-11 me-lg-2 mx-auto mt-3 category clickable" style=" background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/dames_brillen.png');">
                        <!-- <a href="" class="button">Damesbrillen</a> -->
                        <div class="overlay"></div>
						<?php 
							// if ( ! empty( $get_category_link ) ) {
								echo '<a href="' . esc_url( get_category_link( 22 ) ) . '" class="button">' . esc_html( 'Damesbrillen' ) . '</a>';
							// }
						?>
                        <span class="hover__text">bekijk alles</span>
                    </div>
                    <div class="col-lg-4 col-11 mx-lg-2 mx-auto mt-3 category clickable" style= "background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/heren_brillen.png');">
                        <!-- <a href="#" class="button">Herenbrillen</a> -->
                        <div class="overlay"></div>
						<?php 
							// if ( ! empty( $get_category_link ) ) {
								echo '<a href="' . esc_url( get_category_link( 23 ) ) . '" class="button">' . esc_html( 'Herenbrillen' ) . '</a>';
							// }
						?>
                        <span class="hover__text">bekijk alles</span>
                    </div>
                    <div class="col-lg-4 col-11 ms-lg-2 mx-auto mt-3 category clickable" style=" background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/zonne_brillen.jpg');">
                        <!-- <a href="#" class="button">Zonnebrillen</a> -->
                        <div class="overlay"></div>
						<?php 
							// if ( ! empty( $get_category_link ) ) {
								echo '<a href="' . esc_url( get_category_link( 20 ) ) . '" class="button">' . esc_html( 'Zonnebrillen' ) . '</a>';
							// }
						?>
                        <span class="hover__text">bekijk alles</span>
                    </div>
                </div>
            </div>
</div>

<div class="handmade__container d-lg-flex d-block flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/usp_bg.svg);">
            <div class="usp col-lg-5 col-12 offset-lg-1 offset-0">
                <span><?php echo get_field('hp_titel_2'); ?></span>
                <div class="mt-3">
				<?php echo get_field('hp_paragraph_2'); ?>
				</div>
            </div>
            <div class="usp__image ms-lg-5 ms-0 mt-lg-0 mt-3 col-lg-6 col-12">
                <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/dames_brillen.png');"></div>
            </div>
</div>

<div class="collection__container">
            <div class="col-12 text-center">
                <h2 class="category__headline"><?php echo get_field('hp_titel_3'); ?></h2>
                <div class="collection__desc px-lg-0 px-3 mx-auto mt-4"><?php echo get_field('hp_paragraph_3'); ?></div>
            </div>

			<div class="product__container col-12 px-lg-5 px-3 my-5 d-flex flex-row justify-content-between">

			<?php  
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 5
				);

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;

			?>

				<div class="product d-flex flex-column justify-content-between">
                    <span class="product__sale--flag"></span>
					<span class="product__favorites--button"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist label=""]'); ?></span>
                    <!-- <img src="/assets/img/product.png" alt="" /> -->
					<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image mx-auto" />
                    <!-- <p class="product__category--title"><?php echo wc_get_product_category_list($product->get_id()) ?></p> -->
                    <p class="product__category--title"><?php the_title() ?></p>
                   	 <div class="product__colors--container mx-auto d-flex flex-row justify-content-between py-4">
						<?php 
							$attributes = $product->get_attributes();
							$terms = get_the_terms( $product->id, 'pa_kleur');
							
							foreach($terms as $term){
								$singleID = $term->term_id;
								$singleTax = $term->taxonomy;
								
								$hex = get_field('colorpicker', $singleTax . '_' . $singleID);
								
								if($hex == ''){
									$hex = '#000';
								};
								
								?>
						 		<div style="background-color: <?php echo $hex;?>; width: 25px; height:25px;"></div>
						 <?php
							}
						?>
						
						 
						</div>
					
                    <span class="product__price"><?php echo $product->get_price_html();  ?></span>
                    <a href="<?php the_permalink() ?>" class="product__button py-3 mt-3">Bekijk bril</a>
                	</div>

				<?php
				endwhile;
				wp_reset_query(); 
				?>
            </div>
            <div class="text-end px-5">
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="text-uppercase button p-3">Bekijk alles</a>
            </div>
</div>
<div class="fitting__container d-lg-flex d-block flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/paskamer_bg.svg);">
            <div class="fitting__image col-lg-6 col-12">
                <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/fitting.png');"></div>
            </div>
            <div class="fitting__info col-lg-5 col-12 offset-lg-1 offset-0">
                <p class="fitting__title"><?php echo get_field('hp_titel_4'); ?></p>
                <div class="fitting__desc">
                    <p><?php echo get_field('hp_paragraph_4'); ?>
					</p>
                </div>
            </div>
</div>

<div class="collection__container" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
            <div class="col-12 text-center">
                <h2 class="category__headline"><?php echo get_field('hp_titel_5'); ?></h2>
                <!-- <p class="collection__desc mx-auto mt-4">Speciaal voor jou hebben wij een super leuke en vrolijke collectie ontworpen met vrolijke kleuren.</p> -->
            </div>

			<div class="product__container col-12 px-3 px-lg-5 my-5 d-flex flex-row justify-content-between">

			<?php  
				$args = array(
					'post_type'      => 'product',
					'meta_key' => 'total_sales',
    				'orderby' => 'meta_value_num',
					'posts_per_page' => 5
				);

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;

			?>

				<div class="product d-flex flex-column">
                    <span class="product__sale--flag"></span>
                    <a href="#" class="product__favorites--button"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist label=""]'); ?></a>
                    <!-- <img src="/assets/img/product.png" alt="" /> -->
					<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image mx-auto" />
                    <!-- <p class="product__category--title"><?php echo wc_get_product_category_list($product->get_id()) ?></p> -->
                    <p class="product__category--title"><?php the_title() ?></p>
                    <div class="product__colors--container mx-auto d-flex flex-row justify-content-between py-4">
       						<?php 
							$attributes = $product->get_attributes();
							$terms = get_the_terms( $product->id, 'pa_kleur');
							
							foreach($terms as $term){
								$singleID = $term->term_id;
								$singleTax = $term->taxonomy;
								
								$hex = get_field('colorpicker', $singleTax . '_' . $singleID);
								
								if($hex == ''){
									$hex = '#000';
								};
								
								?>
						 		<div style="background-color: <?php echo $hex;?>; width: 25px; height:25px;"></div>
						 <?php
							}
						?>
                    </div>
                    <span class="product__price"><?php echo $product->get_price_html();  ?></span>
                    <a href="<?php the_permalink() ?>" class="product__button py-3 mt-3">Bekijk bril</a>
                	</div>

				<?php
				endwhile;
				wp_reset_query(); 
				?>
            </div>
            <div class="text-end px-5">
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="text-uppercase button p-3">Bekijk alles</a>
            </div>

</div>
<div id="reviews" class="fitting__container fitting__container--footer" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/reviews_bg.svg); padding: 100px">
	
<div class="container-xxl">
			<p class="fitting__title">Wat zeggen onze klanten</p>
                <div class="d-flex flex-row mt-5 slider slider-review">          
		<?php   
						$args = array(
							'post_type'      => 'review',
							'posts_per_page' => 5
						);

						$loop = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post();
							global $product;

					?>
					<div class="d-flex flex-column col-12 col-lg-4 m-0 me-3 me-lg-5 " style="background-color: #fff; padding: 40px; margin: 0 40px;">
                    	<h3><?php the_title() ?></h3>
						<p><?php the_content() ?></p>
					</div>
					
					<?php endwhile; ?>
                </div>
            </div>
</div>
<?php
get_footer();

?>