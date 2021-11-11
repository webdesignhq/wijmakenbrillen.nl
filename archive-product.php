<?php
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

if(is_search()){
	global $wp_query;
	$wp_query->is_search();
}

?>
<div class="hero" style="background-image: url('<?php if(is_shop()):?> <?php bloginfo('template_directory'); ?>/assets/img/hero.png'); <?php else: echo $image; endif?>'); background-position: center;">
            <div class="welcome__message d-flex flex-column">
                <div class="welcome__message--1"><span>Alle</span></div>
                <div class="welcome__message--2"><span><?php if(is_shop()):?> Brillen <?php else: single_term_title(); endif?></span></div>
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
                <p class="category__headline"><?php single_term_title(); ?></p>
                <p class="collection__desc mx-auto mt-4">
                 <?php echo category_description(); ?>
                </p>
            </div>

            <div class="collection__container archive__collection col-12 d-lg-flex d-block flex-row justify-content-between">
                <div id="filters" class="filter__container col-lg-4 col-12">
                <!-- <p class="ms-5 ps-2 filter__title">Filters</p> -->
                    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="col-12">
                        <div class="d-flex flex-column col-12">
                            <div class="col-12">
                                <h2>Bedrag</h2>
                                <input type="text" name="price_min" placeholder="Min. prijs" />
                                <input type="text" name="price_max" placeholder="Max. prijs" />
                            </div>
                            <div class="col-12 d-flex flex-column mt-3">
                                <h2>Sorteren</h2>
                                <label>
                                    <div class="input-container">
                                    <input type="radio" name="date" value="ASC" /> Datum: Oplopend
                                    <span class="mark"></span>
                                    </div>
                                </label>
                                <label>
                                    <div class="input-container">
                                        <input type="radio" name="date" value="DESC" selected="selected" /> Datum: Aflopend
                                        <span class="mark"></span>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12 ">
                                <input type="hidden" name="action" value="myfilter">
                            </div>	
                        </div>
                        <div class="col-8 mt-5">
                            <button class="btn btn-primary">Filters toepassen</button>
                        </div>
                    </form>
                </div>
                <div class="product__container col-lg-8 col-12 px-lg-5 px-2 my-5 ">
                    <div id="response" class="d-flex flex-row flex-wrap justify-content-lg-start justify-content-between">
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
                    // else{
                    //     $cat = array(20, 21, 22, 23);
                    // }
                if($cat){
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
                }elseif(is_search()){
					$s=get_search_query();
					$args = array(
									's' =>$s,
									'post_type'      => 'product',
									'posts_per_page' => 12,
									'paged' => $paged
								);
				}else{
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => 12,
						'paged' => $paged
				);}

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
                    <span class="product__price"><?php if($product->get_price_htmL()){ echo $product->get_price_html(); } else { echo '€0.01'; } ?></span>
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
                <p>Sorry, er zijn geen producten gevonden<p>
                    <?php endif ?>

                 </div>
                

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