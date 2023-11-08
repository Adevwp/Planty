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
