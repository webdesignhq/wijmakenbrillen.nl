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
		'footer_categories' => __( 'Footer Categorie&#1043;&#1087;&#1111;&#1029;n', 'website' )
	) );
	
	if ( ! isset ( $content_width) )
    $content_width = 1200;

	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	add_theme_support( 'custom-background' );	
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'wc-product-gallery-slider' );
        // add_theme_support('woocommerce');
}	
endif; // website setup
add_action( 'after_setup_theme', 'website_setup' );

add_action( 'init', 'my_remove_lightbox' );	 	 
function my_remove_lightbox() {	 	 
   remove_theme_support( 'wc-product-gallery-lightbox' );	 	 
}

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

function filter_projects() {
	$color = $_POST['color'];
	
	if (is_null($color)){
		$ajaxposts = new WP_Query([
		 	'post_type' => 'product',
			'posts_per_page' => -1
		]);
		
	} else {
		 $ajaxposts = new WP_Query([
		'post_type' => 'product',
		'posts_per_page' => -1,
		'orderby' => 'menu_order', 
		'order' => 'desc',
		'tax_query' => array(
			array(
				'taxonomy' => 'pa_kleur',
				'field' => 'slug',
				'terms' => array_values($color),
				'operator' => 'IN',
			)
		)
	  ]);
	}
  
	  $response = '';
  
	  if($ajaxposts->have_posts()) {
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		  global $product;
		  $title = $product->post_title;
		  $content = $product->post_content;
		  ?>

			<div class="product archive__product d-flex flex-column justify-content-between product_clickable">
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


<?php
		endwhile;
	  } else {
		
	  }
	  exit;
  }
	add_action('wp_ajax_filter_projects', 'filter_projects');
	add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');


function post_type_glasses() {
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'post-formats',
    );
    $labels = array(
        'name' => 'Glazen',
        'singular_name' => 'Glas',
        'menu_name' => 'Glazen',
        'name_admin_bar' => 'Glazen',
        'add_new' => 'Toevoegen',
        'add_new_item' => 'Voeg glas toe',
        'new_item' => 'Glazen glazen',
        'edit_item' => 'Bewerk glas',
        'view_item' => 'Bekijk glas',
        'all_items' => 'Alle glazen',
        'search_items' => 'Zoek glas',
        'not_found' => 'Geen glazen gevonden',
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'glazen'),
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-page',
        'hierarchical' => false
    );
    register_post_type('glas', $args);
}
add_action('init', 'post_type_glasses');


function post_type_reviews() {
    $supports = array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'custom-fields',
        'revisions',
        'post-formats',
    );
    $labels = array(
        'name' => 'Reviews',
        'singular_name' => 'Review',
        'menu_name' => 'Reviews',
        'name_admin_bar' => 'Reviews',
        'add_new' => 'Toevoegen',
        'add_new_item' => 'Voeg review toe',
        'new_item' => 'Glazen reviews',
        'edit_item' => 'Bewerk review',
        'view_item' => 'Bekijk review',
        'all_items' => 'Alle reviews',
        'search_items' => 'Zoek review',
        'not_found' => 'Geen reviews gevonden',
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'reviews'),
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-page',
        'hierarchical' => false
    );
    register_post_type('review', $args);
}
add_action('init', 'post_type_reviews');

add_filter( 'dgwt/wcas/form/magnifier_ico', function ( $html, $class ) {
	$html = '<i class="fa fa-glasses ' . $class . '"></i>';
	return $html;
  }, 10, 2 );


function custom_checkboxes_acf($field) {
	
	$glassesArray = array();
	
	$posts = new WP_Query( array(
			'post_type' => 'glas',
			'posts_per_page' => -1
		)
	);
	
	
	while($posts->have_posts() ) {
		$posts->the_post();
		$glassesArray += [strval(get_the_ID()) => get_the_title()];
	}
	
	
	$field['required'] = true;
	$field['choices'] = $glassesArray;
	return $field;
}

add_filter('acf/load_field/name=custom_glasses', 'custom_checkboxes_acf');


// Adds a custom rule type.
add_filter( 'acf/location/rule_types', function( $choices ){
    $choices[ __("Other",'acf') ]['wc_prod_attr'] = 'WC Product Attribute';
    return $choices;
} );

// Adds custom rule values.
add_filter( 'acf/location/rule_values/wc_prod_attr', function( $choices ){
    foreach ( wc_get_attribute_taxonomies() as $attr ) {
        $pa_name = wc_attribute_taxonomy_name( $attr->attribute_name );
        $choices[ $pa_name ] = $attr->attribute_label;
    }
    return $choices;
} );

// Matching the custom rule.
add_filter( 'acf/location/rule_match/wc_prod_attr', function( $match, $rule, $options ){
    if ( isset( $options['taxonomy'] ) ) {
        if ( '==' === $rule['operator'] ) {
            $match = $rule['value'] === $options['taxonomy'];
        } elseif ( '!=' === $rule['operator'] ) {
            $match = $rule['value'] !== $options['taxonomy'];
        }
    }
    return $match;
}, 10, 3 );

function add_product_colors() { 
    ?>
	<div class="col-8 d-flex flex-column mt-3">
	<span class="product__price">Beschikbare kleuren</span>
	<div class="d-flex">
		<?php 
			global $product;
			$post = get_post();
			
			$terms = get_the_terms( $product->get_id(), 'pa_kleur');
			foreach($terms as $term){
				$singleID = $term->term_id;
				$singleTax = $term->taxonomy;
				$name = $term->name;
				$slug = $term->slug;
				$hex = get_field('colorpicker', $singleTax . '_' . $singleID);
				
				if($hex == ''){
					$hex = '#000';
				};
				
				?>
				 <div class="mx-1 product-color" style="background-color: <?php echo $hex;?>; width: 25px; height:25px;" data-name="<?php echo $slug ?>"></div>
		 <?php
			}
		?>
	</div>
</div>
<div class="col-12 d-flex flex-column">
	<div class="d-flex flex-lg-row flex-column col-12">
		<a href="/~brillen/paskamer-nieuw" class="single_add_to_cart_button" id="fitting-room" target="_blank">Paskamer</a><a href="" class="single_add_to_cart_button ms-lg-2 choose-glasses">Kies je glazen</a>
	</div>
</div>
<?php

};     
add_action( 'woocommerce_single_product_summary', 'add_product_colors', 25 ); 

 
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'yourtheme_setup' );

function themename_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action('widgets_init', 'themename_widgets_init');


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );



function show_colors(){
	global $product;
?>
	<div class="product__colors--container mx-3 d-flex flex-row justify-content-between py-4">
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
<?php
}

add_action('woocommerce_after_shop_loop_item_title', 'show_colors');


function product_title(){
	global $product;?>
	<h1 class="product_name"><?php echo get_the_title($product->ID); ?></h1>
<?php
}
add_action( 'woocommerce_single_product_summary', 'product_title', 5 );

function add_to_favorites(){ ?>
	<a href="#" class="product__favorites--button"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist label=""]'); ?></a>
<?php
}
add_action('woocommerce_before_shop_loop_item', 'add_to_favorites');


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
	$text = 'Bekijk product';
	if(is_product()){
		$text = 'In winkelwagen';
	}
    return __( $text, 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Bekijk product', 'woocommerce' );
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'replacing_add_to_cart_button', 10, 2 );
function replacing_add_to_cart_button( $button, $product  ) {
    $button_text = __("Bekijk product", "woocommerce");
    $button = '<a class="button add_to_cart_button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';

    return $button;
}

function after_single_summary(){
	global $product; ?>
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
<?php 
}
add_action('woocommerce_after_single_product_summary', 'after_single_summary');

// Add "Product Variation" location rule values
function my_acf_location_rule_values_post_type($choices){

	$keys = array_keys($choices);
	$index = array_search('product', $keys);

	$position = $index === false ? count($choices) : $index + 1;

	$choices = array_merge(
		array_slice($choices, 0, $position),
		array('product_variation' => __('Product Variation', 'auf')),
		array_slice($choices, $position)
	);

	return $choices;
}

add_filter('acf/location/rule_values/post_type', 'my_acf_location_rule_values_post_type');


// Add "Product Variation" location rule match
function my_acf_location_rule_match_post_type($match, $rule, $options, $field_group){

	if ($rule['value'] == 'product_variation') {

		$post_type = $options['post_type'];

		if ($rule['operator'] == "==")
			$match = $post_type == $rule['value'];

		elseif ($rule['operator'] == "!=")
			$match = $post_type != $rule['value'];
	}

	return $match;
}

add_filter('acf/location/rule_match/post_type', 'my_acf_location_rule_match_post_type', 10, 4);


// Render fields at the bottom of variations - does not account for field group order or placement.
add_action( 'woocommerce_product_after_variable_attributes', function( $loop, $variation_data, $variation ) {
    global $abcdefgh_i; // Custom global variable to monitor index
    $abcdefgh_i = $loop;
    // Add filter to update field name
    add_filter( 'acf/prepare_field', 'acf_prepare_field_update_field_name' );
    
    // Loop through all field groups
    $acf_field_groups = acf_get_field_groups();
    foreach( $acf_field_groups as $acf_field_group ) {
        foreach( $acf_field_group['location'] as $group_locations ) {
            foreach( $group_locations as $rule ) {
                // See if field Group has at least one post_type = Variations rule - does not validate other rules
                if( $rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == 'product_variation' ) {
                    // Render field Group
                    acf_render_fields( $variation->ID, acf_get_fields( $acf_field_group ) );
                    break 2;
                }
            }
        }
    }
    
    // Remove filter
    remove_filter( 'acf/prepare_field', 'acf_prepare_field_update_field_name' );
}, 10, 3 );

// Filter function to update field names
function  acf_prepare_field_update_field_name( $field ) {
    global $abcdefgh_i;
    $field['name'] = preg_replace( '/^acf\[/', "acf[$abcdefgh_i][", $field['name'] );
    return $field;
}
    
// Save variation data
add_action( 'woocommerce_save_product_variation', function( $variation_id, $i = -1 ) {
    // Update all fields for the current variation
    if ( ! empty( $_POST['acf'] ) && is_array( $_POST['acf'] ) && array_key_exists( $i, $_POST['acf'] ) && is_array( ( $fields = $_POST['acf'][ $i ] ) ) ) {
        foreach ( $fields as $key => $val ) {
            update_field( $key, $val, $variation_id );
        }
    }
}, 10, 2 );

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

function my_acf_input_admin_footer() {
?>
  <script type="text/javascript">
	(function($) {
	  $(document).on('woocommerce_variations_loaded', function () {
		acf.do_action('append', $('#post'));
	  })
	})(jQuery);	
  </script>
<?php      
}

// function custom_tax_text(){

// 	$pc_info = get_field('more_info');
// 	echo $pc_info;
// }

// add_action('woocommerce_after_shop_loop', 'custom_tax_text', 10);

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
 
add_action( 'woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description' );
add_action( 'woocommerce_after_main_content', 'woocommerce_product_archive_description' );

function remove_zeroes_from_price($price) {
$price = str_replace('.00', ',- <span class="price_after"> Inclusief glazen* </span>', $price);
return $price;}

add_filter('woocommerce_get_price_html', 'remove_zeroes_from_price');
add_filter('woocommerce_cart_subtotal', 'remove_zeroes_from_price');
add_filter('woocommerce_cart_item_price', 'remove_zeroes_from_price');
add_filter('woocommerce_cart_item_subtotal', 'remove_zeroes_from_price');
add_filter('woocommerce_single_product_summary', 'remove_zeroes_from_price');
add_filter('woocommerce_cart_contents_total', 'remove_zeroes_from_price');

function after_price(){
	$text = 'inclusief glazen*';
	return $text;
}
add_action('woocommerce_after_shop_loop_item', 'after_price');


// Remove all currency symbols
 function sww_remove_wc_currency_symbols( $currency_symbol, $currency ) {
 $currency_symbol = '';
 return $currency_symbol;}
add_filter('woocommerce_currency_symbol', 'sww_remove_wc_currency_symbols',     10, 2);
add_filter('woocommerce_cart_totals_order_total_html',     'remove_zeroes_from_price');


function checkout_logo(){
 ?>
 
 <?php
}
add_filter('woocommerce_before_checkout_form', 'checkout_logo');

add_action('wp_head', function() { ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MD4TC55');</script>
	<!-- End Google Tag Manager -->
	<meta name="facebook-domain-verification" content="knnv6avzxg3e0oc63cqvwzpkqs9hve" />
<?php });
	
	add_theme_support( 'title-tag' );



	add_filter('woocommerce_billing_fields','hq_custom_billing_fields');

	function hq_custom_billing_fields( $fields = array()){
		
		unset($fields['billing_address_2']);
		
		return $fields;
		
	}


add_filter( 'woocommerce_order_button_html', 'misha_custom_button_html' );

function misha_custom_button_html( $button_html ) {
	$button_html = str_replace( 'Bestelling plaatsen', 'Bestelling betalen', $button_html );
	return $button_html;
}


?>




