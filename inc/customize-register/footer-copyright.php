<?php
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