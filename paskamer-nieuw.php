<?php
/* Template Name: Paskamer Nieuw */
get_header();
?>
    <div class="container-xxl pt-5 pb-5">
        <div class="row">
            <!-- <button class="button" onmouseover="history.back()">Terug</button> -->
            <div class="formRow">
                <div class="formSpan12 row">
                    <div class="col-lg-6">
                        <div class="relativeVP">
                            <main id="camera">
                                <!-- Camera sensor -->
                                <canvas id="camera--sensor"></canvas>
                                <!-- Camera view -->
                                <video id="camera--view" autoplay="" playsinline=""></video>
                                <!-- Camera trigger -->
                                <button id="camera--trigger">Maak een foto</button>
                                <!-- Camera output -->
                                <!-- <div class="absoluteVP1"> </div> -->

                                <div class="absoluteVP2"><img
                                            src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMBtheoM.png"
                                            alt="Plaat" width="100%" height="300"/></div>

                                <div class="absoluteVP3"><img src="//:0" alt="" id="camera--output"> <img
                                            id="previewimage"
                                            src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMBanna01.png">
                                    <img id="previewglasses"
                                         src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/G6.png"
                                         style="-webkit-mask-image: url('https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/transparant.png'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat;"/>
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5><strong><span id="Totaal">169</span>,00</strong></h5>
                        <p><a id="myAnchorA" href="https://www.wijmakenbrillen.nl/product/anna-zwart/">Klik hier om naar
                                de gegevens van het gekozen model te gaan.</a></p>
                        <p id="previewtext">(Gekozen model voor snelkoppeling: Anna zwart)</p>
                        <div class="row">
                            <p>Andere modellen</p>
                            <?php if (have_posts()) : ?>
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
                                    'paged' => $paged,
                                    'orderby' => 'ASC',
                                );

                                $loop = new WP_Query($args);


                                while ($loop->have_posts()) :
									global $product; 
									$loop->the_post();
							       
									$img = get_field('fittingroom_image');
									$productName = $product->name;
							
									$glassIDs = [];
                                    $glasses = get_field('custom_glasses') ?? [];

                                    foreach ($glasses as $glass) {
                                        array_push($glassIDs, $glass);
                                    }
									
                                    
                                    ?>

                                    <div class="col-md-3" style="float: left;">
                                        <img style="width: 100px" data-title="<?php echo $productName ?>"
                                             data-color="Zwart" src="<?php echo $img ?>"
                                             data-glasses='<?php echo json_encode($glassIDs); ?>'
                                             class="product__image mx-auto" onclick="getModel(this)"/>
                                    </div>

                                <?php endwhile; ?>

                                <p>Andere kleuren</p>
                                <?php while ($loop->have_posts()) :
                                    $loop->the_post();

                                    $variations = $product->get_available_variations();
                                    global $product;
                                    ?>

                                    <div class="flex-row variation" data-modelgroup="<?php echo $product->name; ?>">
                                        <?php foreach ($variations as $key => $value) {
                                            // var_dump($value);
                                            $paskamer_image = get_field('paskamer_variation_image', $value['variation_id']);
                                            // var_dump($paskamer_image);
                                            ?>
                                            <div class="col-md-3" style=" float: left;">
                                                <img data-title="<?php echo $product->name; ?>"
                                                     data-color="<?php echo $value['attributes']['attribute_pa_kleur'] ?>"
                                                     style="width: 100px"
                                                     src="<?php echo $paskamer_image; ?>"
                                                     class="product__image mx-auto" onclick="getModel(this)"/>
                                            </div>
                                            <?php
                                        } ?>

                                    </div>

                                <?php endwhile; ?>

                                <p>Glazen</p>
                                <?php while ($loop->have_posts()) :
                                    

                                    global $product;
                                    $imagemask = get_field('img_mask') ?? '';

                                    $glasses = get_field('custom_glasses');

                                    ?>
									<div class="container">
                                    <div class="row" data-modelgroup="<?php echo $product->name; ?>">
                                        <?php
                                        foreach ($glasses as $g) {
                                            $glass = get_post($g);
                                            $img = get_the_post_thumbnail_url($glass->ID, 'full');
                                            ?>
                                            <div class="col-md-3">
                                                <img class="img-rounded glass-colors"
                                                     src="<?php echo $img ?>"
                                                     data-id="<?php echo $g; ?>"
                                                     style="-webkit-mask-image: url('<?php echo $imagemask; ?>'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat;"
                                                     onclick="getGlasses(this);"/>
                                            </div>
                                            <?php
                                        }
										$loop->the_post();
                                        ?>
                                    </div></div>



                                <?php endwhile; ?>

                            <?php else : ?>
                            <p>Sorry, er zijn geen producten gevonden
                            <p>
                                <?php endif ?>
                        </div>
                        <!--<a href="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/product/anna" class="btn btn-primary single_add_to_cart_button">Bestel direct</a>-->
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
?>