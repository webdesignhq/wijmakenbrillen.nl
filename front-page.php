<?php
/* Template Name: Homepagina */

get_header();
?>
<?php is_front_page(); ?>
<div class="hero" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/hero.png);">
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
                <p class="category__headline">Laat je ogen spreken </p>
				<p>In huis ontworpen en geproduceerde monturen, in verschillende stijlen en geschikt voor iedere gelegenheid.  Ontdek onze kleurrijke collectie brilmonturen en laat je ogen spreken. Een bril online kopen is nog nooit zo leuk geweest. Leverbaar vanaf 169,- inclusief ontspiegelde glazen op sterkte.</p>
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
                <p>100% handgemaakt</p>
                <div class="mt-5">
					Onze vrolijke en lichte brillen zijn vervaardigd in onze eigen atelier in Hoogeveen.
De lage prijzen zijn mogelijk doordat wij de gehele collectie zelf produceren.
Hierdoor kunnen we snel op de laatste trends in spelen.  
Ben je nieuwsgierig? Kijk dan op onze “over ons pagina”

				</div>
            </div>
            <div class="usp__image col-lg-6 col-12">
                <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/dames_brillen.png');"></div>
            </div>
</div>

<div class="collection__container">
            <div class="col-12 text-center">
                <h2>Onze collectie</h2>
                <p class="collection__desc mx-auto mt-4">Onze brillen zijn gemaakt van acetaat en hebben een smallere rand en is daardoor lichter.
De allergievrije metalen veren zorgen voor een beter draagcomfort. Door de speciaal geselecteerde kleuren acetaat zijn de monturen voor elke gelegenheid geschikt
</p>
            </div>

			<div class="product__container col-12 px-5 my-5 d-lg-flex d-block flex-row">

			<?php  
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 5
				);

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post();
					global $product;

			?>

				<div class="product d-flex flex-column">
                    <span class="product__sale--flag"></span>
                    <a href="#" class="product__favorites--button"><i class="fa-regular fa-heart" aria-hidden="true"></i></a>
                    <!-- <img src="/assets/img/product.png" alt="" /> -->
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

				<?php
				endwhile;
				wp_reset_query(); 
				?>
            </div>
            <div class="text-end px-5">
                <a href="/wijmakenbrillen.nl/shop" class="text-uppercase button p-3">Bekijk alles</a>
            </div>

</div>

<div class="fitting__container d-lg-flex d-block flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/paskamer_bg.svg);">
            <div class="fitting__image col-lg-6 col-12">
                <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/fitting.png');"></div>
            </div>
            <div class="fitting__info col-lg-5 col-12 offset-lg-1 offset-0">
                <p class="fitting__title">Digitale paskamer</p>
                <div class="fitting__desc">
                    <p>Wil jij weten hoe leuk onze brillen staan? 
					Of wil je ze zien met zonnebrilglazen?
					Je kan ze bekijken in onze digitale paskamer.
					Ook de maten kan je hier bekijken.
					</p>
                </div>
            </div>
</div>

<div class="collection__container" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/eyes.png');">
            <div class="col-12 text-center">
                <h2>Onze bestverkochte brillen</h2>
                <!-- <p class="collection__desc mx-auto mt-4">Speciaal voor jou hebben wij een super leuke en vrolijke collectie ontworpen met vrolijke kleuren.</p> -->
            </div>

			<div class="product__container col-12 px-5 my-5 d-lg-flex d-block flex-row">

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
                    <a href="#" class="product__favorites--button"><i class="fa-regular fa-heart" aria-hidden="true"></i></a>
                    <!-- <img src="/assets/img/product.png" alt="" /> -->
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

				<?php
				endwhile;
				wp_reset_query(); 
				?>
            </div>
            <div class="text-end px-5">
                <a href="/wijmakenbrillen.nl/shop" class="text-uppercase button p-3">Bekijk alles</a>
            </div>

</div>

<div class="fitting__container fitting__container--footer d-flex flex-row" style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/reviews_bg.svg);">
            <div class="fitting__info col-12 offset-lg-1 offset-0">
                <p class="fitting__title">Wat zeggen onze klanten</p>
                <div class="fitting__desc">

                </div>
            </div>
</div>

<?php
get_footer();

?>