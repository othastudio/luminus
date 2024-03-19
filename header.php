<?php
$maintenance_mode = get_theme_mod('maintenance_mode_setting', false);

if ($maintenance_mode && !current_user_can('manage_options')) {
    get_template_part('template-parts/content/maintenance-mode');
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= bloginfo('name') . ' - ' . bloginfo('description'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <?php get_template_part('template-parts/header/header'); ?>