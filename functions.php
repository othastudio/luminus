<?php
/**
 * Theme functions and customizations
 */

// Enqueue theme stylesheets and scripts
function luminus_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'luminus-style', get_template_directory_uri() . '/assets/css/core.css' );

    // Enqueue custom JavaScript file
    wp_enqueue_script("jquery");
    wp_enqueue_script( 'luminus-script', get_template_directory_uri() . '/assets/js/core.js');
    wp_enqueue_script( 'luminus-script', get_template_directory_uri() . '/assets/js/jquery.js');
}
add_action( 'wp_enqueue_scripts', 'luminus_enqueue_scripts' );

// Register navigation menus
function luminus_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => esc_html__( 'Primary Menu', 'luminus' ),
            'footer-menu'  => esc_html__( 'Footer Menu', 'luminus' ),
        )
    );
}
add_action( 'after_setup_theme', 'luminus_register_menus' );

// Add theme support
function luminus_setup() {
    // Enable support for automatic feed links
    add_theme_support( 'automatic-feed-links' );

    // Enable support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Enable support for title tag
    add_theme_support( 'title-tag' );

    // Enable support for HTML5 markup for search forms, comments, and galleries
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    // Enable support for selective refresh widgets in the Customizer
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'luminus_setup' );

// Customize excerpt length
function luminus_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'luminus_custom_excerpt_length' );

// Customize excerpt "read more" text
function luminus_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'luminus_excerpt_more' );

// Add custom image sizes
function luminus_custom_image_sizes() {
    add_image_size( 'featured-image', 800, 600, true );
}
add_action( 'after_setup_theme', 'luminus_custom_image_sizes' );
