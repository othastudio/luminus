<?php
function luminus_enqueue_styles() {
    wp_enqueue_style('luminus-core-style', get_template_directory_uri() . '/assets/css/core.css');
}
add_action('wp_enqueue_scripts', 'luminus_enqueue_styles');

function luminus_enqueue_scripts() {
    wp_enqueue_script('luminus-core-script', get_template_directory_uri() . "/assets/js/core.js");
}

add_action('wp_enqueue_scripts', 'luminus_enqueue_scripts');

function luminus_setup() {
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'luminus_setup');

function luminus_register_menus() {
    register_nav_menus(array(
        'header' => esc_html__('Header Menu', 'luminus'),
        'footer' => esc_html__('Footer Menu', 'luminus'),
    ));
}
add_action('after_setup_theme', 'luminus_register_menus');
