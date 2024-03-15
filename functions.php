<?php
function luminus_enqueue_styles() {
    wp_enqueue_style('luminus-core-style', get_template_directory_uri() . '/assets/css/core.css');
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/vendors/bootstrap-5.0.2/css/bootstrap.min.css');
    wp_enqueue_style( 'bootstrap-icons-css', get_template_directory_uri() . '/assets/vendors/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css');
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/vendors/animate/animate.min.css');
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/vendors/fontawesome-6.5.1/all.min.css');
}
add_action('wp_enqueue_scripts', 'luminus_enqueue_styles');

function luminus_enqueue_scripts() {
    wp_enqueue_script('luminus-core-script', get_template_directory_uri() . "/assets/js/core.js");
    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/vendors/bootstrap-5.0.2/js/bootstrap.bundle.min.js');
    wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/assets/vendors/fontawesome-6.5.1/js/all.min.js');
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

function luminus_display_footer_copyright(){
    $text = get_theme_mod('luminus_copyright_text', '');
    if($text){
        echo $text;
        return;
    }
    echo 'Proudly made with Luminus';
}
function luminus_display_social_medias() {
    $facebook_link = get_theme_mod('luminus_facebook_link');
    $instagram_link = get_theme_mod('luminus_instagram_link');
    $linkedin_link = get_theme_mod('luminus_linkedin_link');
    $twitter_link = get_theme_mod('luminus_twitter_link');
    $youtube_link = get_theme_mod('luminus_youtube_link');
    $pinterest_link = get_theme_mod('luminus_pinterest_link');
    $tiktok_link = get_theme_mod('luminus_tiktok_link');

    echo '<ul class="social-media-list list-inline">';
    if ($facebook_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($facebook_link) . '"><i class="fa-brands fa-facebook-f"></i></a></li>';
    }
    if ($instagram_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($instagram_link) . '"><i class="fa-brands fa-instagram"></i></a></li>';
    }
    if ($linkedin_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($linkedin_link) . '"><i class="fa-brands fa-linkedin-in"></i></a></li>';
    }
    if ($twitter_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($twitter_link) . '"><i class="fa-brands fa-x-twitter"></i></a></li>';
    }
    if ($youtube_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($youtube_link) . '"><i class="fa-brands fa-youtube"></i></a></li>';
    }
    if ($pinterest_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($pinterest_link) . '"><i class="fa-brands fa-pinterest-p"></i></a></li>';
    }
    if ($tiktok_link) {
        echo '<li class="list-inline-item"><a href="' . esc_url($tiktok_link) . '"><i class="fa-brands fa-tiktok"></i></a></li>';
    }
    echo '</ul>';
}

// Include external functions
require_once(get_template_directory() . '/inc/customize-register/setup.php');
require_once(get_template_directory() . '/inc/shortcodes/setup.php');
