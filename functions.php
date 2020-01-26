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

/*
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');
 
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');
 
/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;
 
/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :
 
if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
 
elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
 
endforeach;
}