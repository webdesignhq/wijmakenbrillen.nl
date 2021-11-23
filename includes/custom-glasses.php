<?php

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

?>