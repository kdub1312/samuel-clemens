<?php
//load child theme styles
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/output/styles.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/css/output/theme-colors.css',
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
    if (has_category('web')) {
        wp_register_style('webdev_stylesheet', get_stylesheet_directory_uri() . '/css/output.css');
        wp_enqueue_style('webdev_stylesheet');
        }
    }
    add_action( 'wp_enqueue_scripts', 'webdev_cat_styles' ); 

    function bootstrapstarter_enqueue_styles() {
        wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css' );
        $dependencies = array('bootstrap');
        wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
    }
    
    function bootstrapstarter_enqueue_scripts() {
        $dependencies = array('jquery');
        wp_enqueue_script('bootstrap', get_stylesheet_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', $dependencies, '3.3.6', true );
    }
    
    add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
    add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );

    //Page Slug Body Class
    function add_slug_body_class( $classes ) {
        global $post;
        if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
        }
        return $classes;
    }
        add_filter( 'body_class', 'add_slug_body_class' );