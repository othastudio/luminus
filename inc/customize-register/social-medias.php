<?php
function luminus_social_medias($wp_customize) {
    $wp_customize->add_section('luminus_social_medias', array(
        'title'    => __('Social Media', 'luminus'),
        'priority' => 120,
    ));
    // setting for Facebook link
    $wp_customize->add_setting('luminus_facebook_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_facebook_link', array(
        'label'    => __('Facebook Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

    // setting for Instagram link
    $wp_customize->add_setting('luminus_instagram_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_instagram_link', array(
        'label'    => __('Instagram Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

    // setting for LinkedIn link
    $wp_customize->add_setting('luminus_linkedin_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_linkedin_link', array(
        'label'    => __('LinkedIn Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

    // setting for Twitter link
    $wp_customize->add_setting('luminus_twitter_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_twitter_link', array(
        'label'    => __('Twitter Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

    // setting for Youtube link
    $wp_customize->add_setting('luminus_youtube_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_youtube_link', array(
        'label'    => __('Youtube Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

    // setting for Pinterest link
    $wp_customize->add_setting('luminus_pinterest_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_pinterest_link', array(
        'label'    => __('Pinterest Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

    // setting for TikTok link
    $wp_customize->add_setting('luminus_tiktok_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_tiktok_link', array(
        'label'    => __('TikTok Link', 'luminus'),
        'section'  => 'luminus_social_medias',
        'type'     => 'text',
    ));

}
add_action('customize_register', 'luminus_social_medias');