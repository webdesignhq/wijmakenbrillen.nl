<?php
/* Template Name: single product */

get_header();
?>


<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="container-xxl">
    <div class="row mt-5">
<?php
while ( have_posts() ) : the_post();
    global $product;
    $productID = $product->get_id();
    $productVar = wc_get_product( $productID );
    $result = wc_get_checkout_url(); 
    $checkout_url = wc_get_checkout_url(); 
?>


        <div class="col-lg-6 col-12 product__images--container text-center px-5 mb-5">
            <!-- <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image product__image--single mx-auto" /> -->
           <?php do_action('woocommerce_before_single_product_summary'); ?>
        </div>
        <div class="col-lg-5 col-11 mx-auto mx-lg-0 product__info--container">     
            <div class="product__options--container row mt-4">
				<?php do_action( 'woocommerce_single_product_summary'); ?>
             
            </div>
        </div>
</div>
</div>

<div class="container-xxl">
        <div class="category__container size__container--single mx-auto">
            <h2>Uitgebreide omschrijving</h2>
            <p>
                <?php the_content()?>
            </p>    
        </div>	
</div>

        <div class="category__container-1 size__container--single mx-auto" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
                <?php 
					$width = $product->get_attribute('breedte-glas');
					$height = $product->get_attribute('hoogte-glas');
					$center = $product->get_attribute('middenafstand');
					$fullWidth = $product->get_attribute('totale-breedte');
					$neusbrug = $product->get_attribute('neusbrug');
                ?>
                <h2 class="text-center">Afmetingen</h2>
                <div class="categories d-lg-flex d-block flex-row justify-content-between mt-4">
                    <div class="col-lg-2 col-12 me-0 category d-flex flex-column text-center justify-content-center">
						<img class="effect-multiply" src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/breedte-glas.png"/>
                        <span>Breedte glas</span>
                        <span class="mt-2"><?php echo $width; ?></span>
                    </div>
                    <div class="col-lg-2 col-12 mx-0 category d-flex flex-column text-center justify-content-center" >
						<img class="effect-multiply" src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/hoogte-glas.png"/>
                        <span>Hoogte glas</span>
						<span class="mt-2"><?php echo $height; ?></span>
                    </div>
                    <div class="col-lg-2 col-12 ms-0 category d-flex flex-column text-center justify-content-center" >                    
                        <img class="effect-multiply" src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/middenafstand.png"/>
						<span>Middenafstand</span>
						<span class="mt-2"><?php echo $center; ?></span>
                    </div>
                    <div class="col-lg-2 col-12 ms-0 category d-flex flex-column text-center justify-content-center" >
						<img class="effect-multiply" src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/totale-breedte.png"/>
                        <span>Totale breedte</span>
						<span class="mt-2"><?php echo $fullWidth; ?></span>
                    </div>
                    <div class="col-lg-2 col-12 ms-0 category d-flex flex-column text-center justify-content-center">
						<img class="effect-multiply" src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/neusbrug.png"/>
                        <span>Neusbrug</span>
						<span class="mt-2"><?php echo $neusbrug; ?></span>
                    </div>
                </div>
        </div>

<div class="container-xxl">
        <div class="category__container size__container--single mx-auto" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
            <p class="product__category__title--single"><?php echo wc_get_product_category_list($product->get_id()) ?></p>
            <p>
                <?php 
                    global $post;
                    $args  = array(
                        'taxonomy' => 'product_cat'
                    );
                    $terms = wp_get_post_terms($post->ID, 'product_cat', $args);
                    
                    $count = count($terms);
                    if ($count > 0) {
                    
                        foreach ($terms as $term) {
                            echo $term->description;
                        }
                    }
                ?>
            </p>    
        </div>	
</div>
<div class="collection__container">
	
<div class="product__container col-12 px-lg-5 px-2 my-5 ">
<h2 class="text-center">Gerelateerde producten </h2>
 <div  class="d-flex flex-row flex-wrap justify-content-lg-start justify-content-between">

		<?php
		$related_query = new WP_Query(array(
			'post_type' => 'product',
			'category__in' => wp_get_post_categories(get_the_ID()),
			'post__not_in' => array(get_the_ID()),
			'posts_per_page' => 4,
			'orderby' => 'date',
		));

		while ($related_query->have_posts()) : $related_query->the_post();

		global $product;
		?>
		<div class="product d-flex flex-column col-lg-3 justify-content-between product_clickable">
                    <span class="product__sale--flag"></span>
                    <a href="#" class="product__favorites--button"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist label=""]'); ?></a>
					<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image mx-auto" />
                    <p class="product__category--title"><?php echo wc_get_product_category_list($product->get_id()) ?></p>
                    <p class="product__color--name"><?php the_title() ?></p>
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
		<?php endwhile; 
		wp_reset_query();
		?>       
	</div>
		</div>
</div>
<?php
endwhile;
?>

<?php
get_footer();

?>