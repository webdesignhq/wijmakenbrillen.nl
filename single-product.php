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
</div>

        <div class="category__container-1 size__container--single mx-auto" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
                <p class="category__headline">Afmetingen</p>
                <div class="categories d-lg-flex d-block flex-row justify-content-between mt-4">
                    <div class="col-lg-2 col-12 me-0 category">
                        <span>Breedte glas</span>
                    </div>
                    <div class="col-lg-2 col-12 mx-0 category" >
                        <span>Hoogte glas</span>
                    </div>
                    <div class="col-lg-2 col-12 ms-0 category" >                    
                        <span>Middenafstand</span>
                    </div>
                    <div class="col-lg-2 col-12 ms-0 category" >
                        <span>Totale breedte</span>
                    </div>
                    <div class="col-lg-2 col-12 ms-0 category">
                        <span>Neusbrug</span>
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

<div class="container-xxl">
    <div class="row mt-5">
	[related products]
</div>
</div>
                </div>
<?php
endwhile;
?>

<?php
get_footer();

?>