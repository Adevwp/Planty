<?php
add_action( 'wp_enqueue_scripts', 'dt_enqueue_styles' );
function dt_enqueue_styles() {
    $parenthandle = 'divi-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', 
        array(), filemtime(get_stylesheet_directory() . '/css/theme.css')
    );
}

// Hook //
add_filter( 'wp_nav_menu_items','admin_link_menu', 10, 2 );

function admin_link_menu ( $items, $args ) {
//apply if any user is logged and only in the header menu
    if (is_user_logged_in() && $args->theme_location == 'primary-menu' ) {

        $items .= '<li><a href="'. get_admin_url() .'">Admin</a></li>';

    }

    return $items;
}

