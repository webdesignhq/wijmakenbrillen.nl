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
            <div class="row">
<!--                 <div class="col-11">
                    <p class="product__category__title--single"><?php echo wc_get_product_category_list($product->get_id()) ?></p>
                    <h1 class="product__color--name"><?php the_title() ?></h1>  
                </div>
                <div class="col-1">
                    <a href="#" class="product__favorites--button"><i class="fa-regular fa-heart" aria-hidden="true"></i></a>
                </div> -->
            </div>
           
            <div class="product__price--container row mt-4">
                <div class="col-8 d-flex flex-column">
<!--                     <span class="product__price">Beschikbare kleuren</span>
                    <div class="d-flex">
						<?php 
							$post = get_post();
							$id =  $post->ID;
							$product_variations = new WC_Product_Variable( $id );
							$product_variations = $product_variations->get_available_variations();
							var_dump($product_variations[0]['variation_id']);
							 foreach ($product_variations as $variation){
								 $var_id = $variation['variation_id'];
								 $color = $variation['attributes']['attribute_pa_kleur'];
								 $color_b;
								 
// 								 echo $var_id; ?> <br/> <?php 
								 echo $color_b; ?> <br/> <?php 
							 }
							
							$terms = get_the_terms( $product->id, 'pa_kleur');
							foreach($terms as $term){
								$singleID = $term->term_id;
								$singleTax = $term->taxonomy;
								$name = $term->name;
								$hex = get_field('colorpicker', $singleTax . '_' . $singleID);
								
								if($hex == ''){
									$hex = '#000';
								};
								
								?>
						 		<div class="mx-1 product-color" style="background-color: <?php echo $hex;?>; width: 25px; height:25px;" data-name="<?php echo $name ?>"></div>
						 <?php
							}
						?>
					</div> -->
                </div>
                <div class="col-4">
<!--                     <span class="product__price--single"><?php echo $product->get_price_html(); ?></span> -->
                </div>
            </div>
            <div class="product__options--container row mt-4">
				<!-- <?php do_action( 'woocommerce_before_add_to_cart_button'); ?> -->
				<?php do_action( 'woocommerce_single_product_summary'); ?>
             
            </div>
<!--             <div class="product__cta--container col-12 d-flex flex-row justify-content-start mt-5">
                <span class="product__price--cta me-3"><a href="#">Passen</a></span>
                <span class="product__price--cta button__add--cart"><?php echo '<a href="'. $checkout_url.'?add-to-cart=' .$productID. '">'?>In Winkelwagen</a></span>
            </div> -->
        </div>
</div>
</div>
        <div class="handmade__container handmade__container--single  d-flex flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/reviews_bg.svg);">
            <div class="usp col-5 offset-1">
            <h2 class="text-uppercase">Wintercollectie</h2>
                <p>
                    Lorem ipsum dolor sit amet vultekst voor collectie informatie. Lorem ipsum dolor sit amet vultekst voor collectie informatie.
                    Lorem ipsum dolor sit amet vultekst voor collectie informatie.
                </p>
            </div>
            <div class="usp__image usp__image--single col-6">
                <!-- <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');"></div> -->
            </div>
        </div>

        <div class="category__container size__container--single mx-auto" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
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

        <div class="handmade__container handmade__container--single  d-flex flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/reviews_bg.svg);">
            <div class="usp col-5 offset-1">
                <h2 class="text-uppercase">Virtuele Paskamer</h2>
                <p>
                    Lorem ipsum dolor sit amet vultekst voor collectie informatie. Lorem ipsum dolor sit amet vultekst voor collectie informatie.
                    Lorem ipsum dolor sit amet vultekst voor collectie informatie.
                </p>
            </div>
            <div class="usp__image usp__image--single col-6">
                <!-- <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');"></div> -->
            </div>
        </div>

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

        <div class="fitting__container fitting__container--single d-flex flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/reviews_bg.svg);">
            <div class="fitting__info col-10 offset-1">
                <p class="fitting__title">Wat zeggen onze klanten</p>
                <div class="fitting__desc">
                    <?php comments_template(); ?>
                </div>
            </div>
        </div>

<?php
endwhile;
?>

<?php
get_footer();

?>