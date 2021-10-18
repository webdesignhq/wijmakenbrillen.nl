<?php
/* Template Name: Contact */

get_header();
?>


<div class="row py-5 my-5 contact">
    <div class="col-5 offset-1 me-4 img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/img/dames_brillen.png');">
        
    </div>
    <civ class="col-5 p-4">
        <h2>Neem contact met ons op!</h2>
        <?php echo do_shortcode("[gravityform id='1' title='false' description='false' ajax='true' tabindex='49']"); ?>		
    </civ>
</div>


<?php
get_footer();

?>