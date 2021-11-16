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

                     <div class="absoluteVP2"><img src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMBtheoM.png" alt="Plaat" width="100%" height="300" /></div>

                     <div class="absoluteVP3"><img src="//:0" alt="" id="camera--output"> <img id="previewimage" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMBanna01.png">
<img id="previewglasses" src="https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/G6.png" style="-webkit-mask-image: url('https://server1.webdesignhq.cloud.shockmedia.nl/~brillen/wp-content/uploads/2021/11/mask-anna.png'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat;"/>
                     </div>
                  </main>
               </div>
            </div>
            <div class="col-lg-6">
               <h5><strong><span id="Totaal">169</span>,00</strong></h5>
               <p><a id="myAnchorA" href="https://www.wijmakenbrillen.nl/product/anna-zwart/">Klik hier om naar de gegevens van het gekozen model te gaan.</a></p>
               <p id="previewtext">(Gekozen model voor snelkoppeling: Anna zwart)</p>
						<div class="row">
                                 <p>Andere modellen</p>
                                 <?php if (have_posts()) : ?>
                                    <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                    $args = array(
                                       'post_type'      => 'product',
                                       'posts_per_page' => -1,
                                       'paged' => $paged
                                    );
									
									$loop = new WP_Query($args);
									
									
                                    while ($loop->have_posts()) :
                                       
									  
									   $glassIDs = [];
										$glasses = get_field('custom_glasses') ?? [];
									
									   foreach ($glasses as $glass) { 
										  array_push($glassIDs, $glass);
									   }
									   
									   $loop->the_post();
                                       
									   global $product;
                                    ?>
									
                                       <div class="col-md-3" style="float: left;">
                                          <img style="width: 100px" data-title="<?php echo $product->name; ?>" data-color="Zwart" src="<?php echo get_field('fittingroom_image') ?>" data-glasses='<?php echo json_encode($glassIDs); ?>' class="product__image mx-auto" onclick="getModel(this)" />
                                       </div>

                                    <?php endwhile; ?>
									
                                    <p>Andere kleuren</p>
                                    <?php while ($loop->have_posts()) :
                                       $loop->the_post();
                                       global $product;
                                       $variations = $product->get_available_variations(); ?>

                                       <div class="flex-row variation" data-modelgroup="<?php echo $product->name; ?>">
                                          <?php foreach ($variations as $key => $value) {
                                          ?>
                                             <div class="d-flex flex-column" style=" float: left;">
                                                <img data-title="<?php echo $product->name; ?>" data-color="<?php echo $value['attributes']['attribute_pa_kleur'] ?>" style="width: 100px" src="<?php echo $value['image']['gallery_thumbnail_src']; ?>" class="product__image mx-auto" onclick="getModel(this)" />
                                             </div>
                                          <?php
                                          } ?>

                                       </div>
									   
                                    <?php endwhile; ?>

                                 <?php else : ?>
                                    <p>Sorry, er zijn geen producten gevonden<p>
                                       <?php endif ?>
					</div>
					<div class="row">
                           <p>Kleur glazen</p>
							 <?php
								$glassesArray = array();

									$posts = new WP_Query(
										array(
											'post_type' => 'glas',
											'posts_per_page' => -1
										)
									);

									while ($posts->have_posts()) {
										$posts->the_post();
										$imagemask = get_field('img_mask');
								?>
								<div class="col-md-3">
									<img class="img-rounded glass-colors" src="<?php echo get_the_post_thumbnail_url(); ?>" data-id="<?php echo get_the_ID(); ?>" style="-webkit-mask-image: url('<?php echo $imagemask;?>'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat;" onclick="getGlasses(this);"/>
								</div>
								<?php
										// array_push($glassesArray, get_the_ID());
									}
								?>

					</div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
get_footer();
?>