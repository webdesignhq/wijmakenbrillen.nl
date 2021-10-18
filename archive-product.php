<?php
/* Template Name: shoppage */

get_header();
?>

<?php 

if ( is_product_category() ){
    global $wp_query;

    // get the query object
    $cat = $wp_query->get_queried_object();

    // get the thumbnail id using the queried category term_id
    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 
}

?>

<div class="hero" style="background-image: url(' <?php echo $image; ?>'); background-position: center;">
            <div class="welcome__message d-flex flex-column">
                <div class="welcome__message--1"><span>Alle</span></div>
                <div class="welcome__message--2"><span>Monturen</span></div>
            </div>
</div>

<div class="container container--archive mx-auto" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
            <div class="usp__container mx-auto d-flex flex-row justify-content-around p-5">
                <div class="usp d-flex flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/milieu.svg" alt="" /><span>Milieuvriendelijk</span></div>
                <div class="seperator mx-4"></div>
                <div class="usp d-flex flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/hand.svg" alt="" /><span>Handgemaakt</span></div>
                <div class="seperator mx-4 d-lg-inline d-none"></div>
                <div class="usp d-lg-flex d-none flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/design.svg" alt="" /><span>Eigen design</span></div>
                <div class="seperator mx-4 d-lg-inline d-none"></div>
                <div class="usp d-lg-flex d-none flex-column"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/factory.svg" alt="" /><span>Eigen productie</span></div>
            </div>

            <div class="category__container category__container--archive mx-auto">
                <p class="category__headline"><?php wp_title(); ?></p>
                <p class="collection__desc mx-auto mt-4">
                Speciaal voor jou hebben wij een super leuke en vrolijke collectie ontworpen met vrolijke kleuren.
                </p>
            </div>

            <div class="collection__container archive__collection col-12 d-lg-flex d-block flex-row justify-content-between">
                <div class="filter__container col-lg-4 col-12">
                <p class="ms-5 ps-2 filter__title">Filters</p>
                </div>
                <div class="product__container col-lg-8 col-12 px-lg-5 px-2 my-5 d-flex flex-row flex-wrap justify-content-lg-start justify-content-between">

                <?php if (have_posts()) : ?>     
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    if ( is_product_category() ) {
                        if ( is_product_category( 'zonnebrillen' ) ) {
                           $cat = 20;
                          }
                        elseif ( is_product_category( 'heren-brillen' ) ){
                            $cat = 23;
                        }
                        elseif ( is_product_category( 'dames-brillen' ) ){
                            $cat = 22;
                        }
                        elseif ( is_product_category( 'aanbieding' ) ){
                            $cat = 21;
                        }
                    }
                    else{
                        $cat = array(20, 21, 22, 23);
                    }

                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 9,
                        'paged' => $paged,
                        'tax_query'     => array(
                            array(
                                'taxonomy'  => 'product_cat',
                                'field'     => 'id', 
                                'terms'     => $cat
                            )
                        )
                    );

                    $loop = new WP_Query( $args );

                    while ( $loop->have_posts() ) : $loop->the_post();
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

				<?php endwhile; ?>

                <nav class="mx-auto">
                    <ul>
                        <li><?php previous_posts_link( '&laquo; Vorige', $loop->max_num_pages) ?></li> 
                        <li><?php next_posts_link( 'Volgende &raquo;', $loop->max_num_pages) ?></li>
                    </ul>
                </nav>

                 <?php else: ?>
                <p>Sorry, no products matched your criteria.<p>
                    <?php endif ?>

               
                

                </div>
            </div>
</div>

<div class="fitting__container d-flex flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/reviews_bg.svg);">
            <div class="fitting__info col-12 offset-1">
                <p class="fitting__title">Wat zeggen onze klanten</p>
                <div class="fitting__desc">
                    
                </div>
            </div>
</div>




<?php
get_footer();

?>