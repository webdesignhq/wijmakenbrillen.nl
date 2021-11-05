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
                     </div>
                  </main>
               </div>
            </div>
            <div class="col-lg-6">
               <h5><strong>€ <span id="Totaal">169</span>,00</strong></h5>
               <input type="textaread" style='width:100%' id="Model" size="120" value="Dit is model Anna met een zwarte acetaat plaat, " /></a>
               <p><a id="myAnchorA" href="https://www.wijmakenbrillen.nl/product/anna-zwart/">Klik hier om naar de gegevens van het gekozen model te gaan.</a></p>
               <p id="previewtext">(Gekozen model voor snelkoppeling: Anna zwart)</p>
               <div class="container">
                  <div class="panel-group" id="accordion">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                 <p>Andere modellen</p>
                                 <!-- <input type="textaread" style='width:100%' id="Model" size="120" value=""/> -->
                                 <?php if (have_posts()) : ?>
                                    <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


                                    $args = array(
                                       'post_type'      => 'product',
                                       'posts_per_page' => 9,
                                       'paged' => $paged
                                    );

                                    $loop = new WP_Query($args);

                                    while ($loop->have_posts()) :
                                       $loop->the_post();
                                       global $product;

                                       $glassIDs = [];
                                       $glasses = get_field('custom_glasses');
                                       foreach ($glasses as $glass) {
                                          array_push($glassIDs, $glass);
                                       }

                                    ?>
                                       <div class="col-md-6" style=" float: left;">
                                          <img style="width: 100px" data-title="<?php echo $product->name; ?>" data-color="Zwart" data-glasses='<?php echo json_encode($glassIDs); ?>' src="<?php echo get_field('fittingroom_image') ?>" class="product__image mx-auto" onclick="getModel(this)" />
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
                              </a>
                           </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                           <div class="panel-body">
                              <div class="table-wrapC">
                                 <div class="flex-container">

                                    <!--<div><img src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMBanna01.png" alt="anna" width="100" height="50" onclick="anna01()"onmouseover="modelAA();myannaB();"/></div> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion-colors" href="#collapse3">Kleur glazen</p>
                        </h4>
                        </p><input type="textaread" style='width:100%' id="MGlas" size="120" value="zonder glas" </strong></a>
                        </h4>
                     </div>
                     <div class="panel-body">
                        <div class="flex-container">
                           <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G1.png" alt="" width="40" height="40" onmouseover="glazenAA();" /></div>
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
                           ?>
                              <div><img class="img-rounded glass-colors" style="float: left;" src="<?php echo get_the_post_thumbnail_url(); ?>" data-id="<?php echo get_the_ID(); ?>" alt="" width="40" height="40" onmouseover="glazenAA();" /></div>
                           <?php
                              // array_push($glassesArray, get_the_ID());
                           }
                           ?>
                           <!-- <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G2.png" alt="" width="40" height="40" onmouseover="glazenAB();"/></div>
                        <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G3.png" alt="" width="40" height="40" onmouseover="glazenAC();"/></div>
                        <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G4.png" alt="" width="40" height="40" onmouseover="glazenAD();"/></div>
                        <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G5.png" alt="" width="40" height="40" onmouseover="glazenAE();"/></div>
                        <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G6.png" alt="" width="40" height="40" onmouseover="glazenAF();"/></div>
                        <div><img class="img-rounded" style="float: left;" src="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/G7.png" alt="" width="40" height="40" onmouseover="glazenAG();"/></div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<p>.</p>
<input type="hidden" id="Modelprijs" value="150" />
<input type="hidden" id="Plaatprijs" value="0" />
<input type="hidden" id="Veerprijs" value="0" />
<input type="hidden" id="Variantprijs" value="0" />
<input type="hidden" id="Glasprijs" value="0" />
<input type="hidden" id="Neusmaatprijs" value="0" />
<input type="hidden" id="Plaatdikteprijs" value="0" />
<input type="hidden" id="Neusbrugprijs" value="0" />
<input type="hidden" id="Afwerkingprijs" value="0" />
<input type="hidden" id="malA" value="Anna zwart" />
<input type="hidden" id="VA" value="anna01" />
<input type="hidden" id="GV" value="" />
<input type="hidden" id="Voor" value="https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMBanna01.png" />
<input type="hidden" id="Glas" value="">
<input type="hidden" id="PGlas" value="" />
<input type="hidden" id="Glasprijs" value="0" />
<input type="hidden" id="KostenG" value="">
<input type="hidden" id="KostenMG" value="">
<input type="hidden" id="LModel" value="Dit is model Anna met een zwarte acetaat plaat, ">
<script>
   function glazenAA() {
      document.getElementById("GV").value = "";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "zonder glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function glazenAB() {
      document.getElementById("GV").value = "G1";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "een bruin dergrade 85-25 % glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function glazenAC() {
      document.getElementById("GV").value = "G2";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "een bruin 85 % glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function glazenAD() {
      document.getElementById("GV").value = "G3";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "een grijs dergrade 85-25 % glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function glazenAE() {
      document.getElementById("GV").value = "G4";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "een grijs 85 % glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function glazenAF() {
      document.getElementById("GV").value = "G5";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "een pioneer dergrade 85-25 % glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function glazenAG() {
      document.getElementById("GV").value = "G6";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;
      document.getElementById("PGlas").value = "";
      document.getElementById("Glasprijs").value = "";
      document.getElementById("KostenG").value = "";
      document.getElementById("KostenMG").value = "";
      document.getElementById("Glas").value = "een pioneer 85 % glas";
      document.getElementById("MGlas").value = document.getElementById("Glas").value + "." + document.getElementById("KostenG").value;
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;

   }
</script>
<script>
   function modelAA() {
      document.getElementById("LModel").value = "Dit is model Anna, met een zwarte acetaat plaat, ";
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;
      document.getElementById("mal").value = "Anna heeft 6 verschillende acetaat platen";
      document.getElementById("malA").value = "Anna - zwart";
      document.getElementById("Modelprijs").value = "169";
      document.getElementById("VA").value = "anna01";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;

   }
</script>
<script>
   function modelAB() {
      document.getElementById("LModel").value = "Dit is model Bloem, met een zwarte acetaat plaat, ";
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;
      document.getElementById("mal").value = "Bloem heeft 6 verschillende acetaat platen";
      document.getElementById("malA").value = "Bloem - zwart";
      document.getElementById("Modelprijs").value = "169";
      document.getElementById("VA").value = "bloem01";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;

   }
</script>
<script>
   function modelAC() {
      document.getElementById("LModel").value = "Dit is model Gijs, met een zwarte acetaat plaat, ";
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;
      document.getElementById("mal").value = "Gijs heeft 6 verschillende acetaat platen";
      document.getElementById("malA").value = "Gijs - zwart";
      document.getElementById("Modelprijs").value = "169";
      document.getElementById("VA").value = "gijs01";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;

   }
</script>
<script>
   function modelAD() {
      document.getElementById("LModel").value = "Dit is model Guus, met een zwarte acetaat plaat, ";
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;
      document.getElementById("mal").value = "Guus heeft 6 verschillende acetaat platen";
      document.getElementById("malA").value = "Guus - zwart";
      document.getElementById("Modelprijs").value = "169";
      document.getElementById("VA").value = "guus01";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;

   }
</script>
<script>
   function modelAE() {
      document.getElementById("LModel").value = "Dit is model Jos, met een zwarte acetaat plaat, ";
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;
      document.getElementById("mal").value = "Jos heeft 6 verschillende acetaat platen";
      document.getElementById("malA").value = "Jos - zwart";
      document.getElementById("Modelprijs").value = "169";
      document.getElementById("VA").value = "jos01";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;

   }
</script>
<script>
   function modelAF() {
      document.getElementById("LModel").value = "Dit is model kris, met een zwarte acetaat plaat, ";
      document.getElementById("Model").value = document.getElementById("LModel").value + document.getElementById("Glas").value;
      document.getElementById("mal").value = "kris heeft 6 verschillende acetaat platen";
      document.getElementById("malA").value = "kris - zwart";
      document.getElementById("Modelprijs").value = "169";
      document.getElementById("VA").value = "kris01";
      document.getElementById("Voor").value = "https://www.wijmakenbrillen.nl/wp-content/uploads/Paskamer/WMB" + document.getElementById("VA").value + document.getElementById("GV").value + ".png";
      document.getElementById("Fplaat").src = document.getElementById("Voor").value;

   }
</script>
<script type="text/javascript">
   function bereken() {
      var a = parseFloat(document.getElementById("Modelprijs").value);
      var b = parseFloat(document.getElementById("Plaatprijs").value);
      var c = parseFloat(document.getElementById("Veerprijs").value);
      var d = parseFloat(document.getElementById("Variantprijs").value);
      var e = parseFloat(document.getElementById("Glasprijs").value);
      var f = parseFloat(document.getElementById("Neusmaatprijs").value);
      var g = parseFloat(document.getElementById("Plaatdikteprijs").value);
      var h = parseFloat(document.getElementById("Neusbrugprijs").value);
      var i = parseFloat(document.getElementById("Afwerkingprijs").value);
      document.getElementById("Totaal").innerHTML = a + b + c + d + e + f + g + h + i;

   }
</script>


<script>
   // Display variations on digital fitting room
   function showVariations(name) {
      $("div").find(`[data-modelgroup]`).hide();
      $("div").find(`[data-modelgroup='${name}']`).show();
   }

   function showGlasses(glasses) {
      var decoded = JSON.parse(glasses);
      $(".glass-colors").hide();
      decoded.forEach(function(glass) {
         $(`.glass-colors[data-id='${glass}']`).show();
      });
   }

   function getModel(model) {
      var modelTitle = $(model).attr("data-title");
      var modelColor = $(model).attr("data-color");
      var modelImage = $(model).attr("src");
      var modelGlasses = $(model).attr("data-glasses");
      // document.getElementById("myAnchorA").href = "https://www.wijmakenbrillen.nl/product/anna-zwart/";
      document.getElementById("previewtext").innerHTML = "<h5>(Gekozen model: " + modelTitle + " - " + modelColor + ")</h5>";
      $('#previewimage').attr("src", modelImage);
      showVariations(modelTitle);
      showGlasses(modelGlasses);
   }
</script>

<style>
   .variation {
      display: none;
   }

   .table-wrapC {
      height: 120px;
      overflow-y: scroll;
      display: inline-block;
   }

   .relativeVP {
      position: relative;
      width: 300px;
      height: 700px;
      border: 0px solid #73AD21;
   }

   .absoluteVP1 {
      position: absolute;
      top: 0px;
      left: 10px;
      width: 300px;
      height: 700px;
      border: 0px solid #73AD21;
   }

   .absoluteVP2 {
      position: absolute;
      top: 0px;
      left: 10px;
      width: 300px;
      height: 200px;
      border: 0px solid #73AD21;
   }

   .absoluteVP2 img {
      width: 300px;
      height: 200px;
   }

   .absoluteVP3 {
      position: absolute;
      top: 350px;
      width: 300px;
      height: 250px;
      border: 0px solid #73AD21;
   }

   .absoluteVP4 {
      position: absolute;
      top: 170px;
      left: 75%;
      width: 75px;
      height: 75px;
      border: 0px solid #73AD21;
   }

   .flex-container {
      display: flex;
      flex-wrap: wrap;
      background-color: ffffff;
   }

   .flex-container>div {
      background-color: #ffffff;
      width: 80px;
      margin: 1px;
      text-align: center;
      line-height: 0px;
      font-size: 30px;
   }

   .panel-heading {
      background-color: #FFFFFF !important;
   }

   .panel-title {
      font-size: 20px;
      color: #000000 !important;
   }

   #Model {
      border: none;
      font-size: 15px;
      color: #50B252 !important;
   }

   #mal {
      border: none;
      font-size: 15px;
      color: #50B252 !important;
   }

   #MGlas {
      border: none;
      font-size: 15px;
      color: #50B252 !important;
   }

   #malA {
      border: none;
      font-size: 15px;
      color: #50B252 !important;
   }

   #myanna {
      display: block;
   }

   .button {
      background-color: #50B252;
      /* WMBGreen */
      border: none;
      color: white;
      padding: 3px 6px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 2px 1px;
      cursor: pointer;
   }

   .glass-colors {
      display:none;
   }
</style>
<?php
get_footer();
?>