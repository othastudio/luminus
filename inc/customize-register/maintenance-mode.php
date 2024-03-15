<?php 

function luminus_maintenance_mode($wp_customize){
    $wp_customize->add_section('maintenance_mode_section', array(
        'title'    => __('Maintenance Mode', 'luminus'),
        'description' => 'Toggle this setting to put your website into maintenance mode. When enabled, visitors will see a maintenance message or be redirected to a maintenance page, allowing you to perform updates or make changes to your site without interrupting the user experience. Useful for ensuring a smooth and uninterrupted browsing experience during maintenance periods.',
        'priority' => 30,
    ));

    $wp_customize->add_setting('maintenance_mode_setting', array(
        'default'   => false,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('maintenance_mode_control', array(
        'label'    => __('Enable Maintenance Mode', 'luminus'),
        'section'  => 'maintenance_mode_section',
        'settings' => 'maintenance_mode_setting',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'luminus_maintenance_mode');

function luminus_footer_copyright($wp_customize){
    $wp_customize->add_section('luminus_footer_copyright', array(
        'title'    => __('Copyright', 'luminus'),
        'priority' => 120,
    ));
    $wp_customize->add_setting('luminus_copyright_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('luminus_copyright_text', array(
        'label'    => __('Copyright Text', 'luminus'),
        'section'  => 'luminus_footer_copyright',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'luminus_footer_copyright');

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

