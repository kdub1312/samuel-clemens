<?php
//load child theme styles
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

// Override the parent theme fonts
add_action('wp_enqueue_scripts', 'twentysixteen_fonts_url');
function twentysixteen_fonts_url() {
    $fonts_url = 'https://fonts.googleapis.com/css?family=Gayathri|Nunito|Oswald&display=swap';
	return $fonts_url;
}

function webdev_cat_styles() {
    wp_register_style('webdev_stylesheet', get_stylesheet_directory_uri() . '/css/webdev-styles.css');
    wp_enqueue_style('webdev_stylesheet');
    }
    add_action( 'wp_enqueue_scripts', 'webdev_cat_styles' ); 