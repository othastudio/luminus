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


