<?php
function luminus_seo_settings($wp_customize){
    $wp_customize->add_section('luminus_seo_settings', array(
        'title'    => __('Search Engine Optimisation', 'luminus'),
        'priority' => 120,
    ));

    $wp_customize->add_setting('luminus_robots_index', array(
        'default'   => true,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('luminus_robots_index', array(
        'label'       => __('Index Page', 'luminus'),
        'description' => __('Choose whether to allow search engines to index this page.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'checkbox',
        'default'     => true,
    ));

    $wp_customize->add_setting('luminus_meta_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('luminus_meta_description', array(
        'label'    => __('Meta Description', 'luminus'),
        'description' => "Create a concise, engaging Meta Description summarizing your page content. It influences search results and encourages clicks.",
        'section'  => 'luminus_seo_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('luminus_link_canonical', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('luminus_link_canonical', array(
        'label'       => __('Canonical Link', 'luminus'),
        'description' => 'Specifies the preferred URL for a webpage to prevent duplicate content issues and consolidate ranking signals for search engines.',
        'section'     => 'luminus_seo_settings',
        'default'     => 'https://www.example.com/canonical-page',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('luminus_meta_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('luminus_meta_description', array(
        'label'    => __('Meta Description', 'luminus'),
        'description' => "Create a concise, engaging Meta Description summarizing your page content. It influences search results and encourages clicks.",
        'section'  => 'luminus_seo_settings',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('luminus_og_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('luminus_og_title', array(
        'label'       => __('Open Graph Title', 'luminus'),
        'description' => __('Specifies the title used when the content is shared on social media.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'text',
        'default'     => 'Your Page Title',
    ));

    $wp_customize->add_setting('luminus_og_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('luminus_og_description', array(
        'label'       => __('Open Graph Description', 'luminus'),
        'description' => __('Specifies the description used when the content is shared on social media.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'text',
        'default'     => 'Your description',
    ));

    $wp_customize->add_setting('luminus_og_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('luminus_og_description', array(
        'label'       => __('Open Graph Description', 'luminus'),
        'description' => __('Specifies the description used when the content is shared on social media.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'text',
        'default'     => 'Your description',
    ));

    $wp_customize->add_setting('luminus_og_image', array(
        'default' => '',
     ));
 
     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'luminus_og_image', array(
         'label'       => __('Open Graph Image', 'luminus'),
         'description' => __('Specifies the image used when the content is shared on social media.', 'luminus'),
         'section'  => 'luminus_seo_settings',
         'settings' => 'luminus_og_image',
     )));

     $wp_customize->add_setting('luminus_twitter_card', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
     $wp_customize->add_control('luminus_twitter_card', array(
        'label'       => __('Twitter Card Type', 'luminus'),
        'description' => __('Specifies the type of Twitter Card used when the content is shared on Twitter.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'select',
        'choices'     => array(
            'summary'       => __('Summary', 'luminus'),
            'summary_large' => __('Summary Large Image', 'luminus'),
        ),
        'default'     => 'summary',
    ));

    $wp_customize->add_setting('luminus_twitter_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('luminus_twitter_title', array(
        'label'       => __('Twitter Title', 'luminus'),
        'description' => __('Specifies the title used when the content is shared on Twitter.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'text',
        'default'     => 'Your Page Title',
    ));

    $wp_customize->add_setting('luminus_twitter_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('luminus_twitter_description', array(
        'label'       => __('Twitter Description', 'luminus'),
        'description' => __('Specifies the description used when the content is shared on Twitter.', 'luminus'),
        'section'     => 'luminus_seo_settings',
        'type'        => 'text',
        'default'     => 'Your Page Title',
    ));

    $wp_customize->add_setting('luminus_twitter_image', array(
        'default' => '',
     ));
 
     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'luminus_twitter_image', array(
         'label'       => __('Twitter Image', 'luminus'),
         'description' => __('Specifies the image used when the content is shared on Twitter.', 'luminus'),
         'section'  => 'luminus_seo_settings',
         'settings' => 'luminus_og_image',
     )));

}
add_action('customize_register', 'luminus_seo_settings');
