<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <!-- <label> -->
        <span class="screen-reader-text"><?php echo _x( 'Zoeken naar:', 'label' ) ?></span>
        <input type="search" class="search mx-auto py-3 px-4" placeholder="<?php echo esc_attr_x( 'Zoeken naar', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <!-- </label> -->
    <!-- <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" /> -->
</form>