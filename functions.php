<?php 

if ( ! function_exists( 'website_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features
*
*  It is important to set up these functions before the init hook so that none of these
*  features are lost.
*
*  @since MyFirstTheme 1.0
*/
function website_setup() 
{ 
	
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'website' ),
		'secondary' => __( 'Secondary Menu', 'website' ),
		'footer_moreinfo' => __( 'Footer Meer informatie', 'website' ),
		'footer_categories' => __( 'Footer Categorieën', 'website' )
	) );
	
	if ( ! isset ( $content_width) )
    $content_width = 1200;

	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	add_theme_support( 'custom-background' );	
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // website setup
add_action( 'after_setup_theme', 'website_setup' );



function website_custom_logo_setup() {
    $defaults = array(
        'height'      => 50,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'website_custom_logo_setup' );


function the_breadcrumb() {
	if (!is_home()) {
		echo '<span class="breadcrumbs"><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a> / ";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo " / ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
		echo '</span>';
	}
}


function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
   }
   add_filter('upload_mimes', 'cc_mime_types');


add_filter('add_to_cart_custom_fragments', 'woocommerce_header_add_to_cart_custom_fragment');
function woocommerce_header_add_to_cart_custom_fragment( $cart_fragments ) {
				   global $woocommerce;
				   ob_start();
				   ?>
				   <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View   cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
				   <?php
				   $cart_fragments['a.cart-contents'] = ob_get_clean();
				   return $cart_fragments;
}

add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );

/** 
 * Filer WooCommerce Flexslider options - Add Navigation Arrows
 */
function sf_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;

    return $options;
}



add_action('wp_ajax_myfilter', 'filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'filter_function');

function filter_function(){
	$args = array(
		'post_type' => 'product',
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
 
	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'])
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true
 
	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
		$args['meta_query'][] = array(
			'key' => '_price',
			'value' => array( $_POST['price_min'], $_POST['price_max'] ),
			'type' => 'numeric',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_min'],
				'type' => 'numeric',
				'compare' => '>'
			);
 
		// if only max price is set
		if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_max'],
				'type' => 'numeric',
				'compare' => '<'
			);
	}
 
	// if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox
 
	$query = new WP_Query( $args );
	
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post(); 
		global $product;
		?>

			<div class="product archive__product d-flex flex-column">
                <span class="product__sale--flag"></span>
                <a href="#" class="product__favorites--button"><i class="fa-regular fa-heart" aria-hidden="true"></i></a>
				<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product__image mx-auto" />
                <p class="product__category--title"><?php echo wc_get_product_category_list($product->get_id()) ?></p>
                <p class="product__color--name"><?php the_title() ?></p>
                <div class="product__colors--container mx-auto d-flex flex-row justify-content-between py-4">
                    <div class="product__color"></div>
                    <div class="product__color"></div>
                    <div class="product__color"></div>
                    <div class="product__color"></div>
                </div>
                <span class="product__price"><?php echo $product->get_price_html();  ?></span>
                <a href="<?php the_permalink() ?>" class="product__button py-3 mt-3">Bekijk bril</a>
            </div>

	<?php endwhile;
			wp_reset_postdata();
		else :
			echo 'Geen producten gevonden';
		endif;
		
		die();
	}
	?>


<?php

?>
`


