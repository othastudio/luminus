<?php
$maintenance_mode = get_theme_mod('maintenance_mode_setting', false);

if ($maintenance_mode && !current_user_can('manage_options')) {
    get_template_part('template-parts/maintenance-mode/maintenance-mode');
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.0.2 CSS -->
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/vendors/bootstrap-5.0.2/css/bootstrap.min.css' ?>" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/vendors/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css' ?>" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/vendors/animate/animate.min.css' ?>" />

    <title><?= bloginfo('name') . ' - ' . bloginfo('description'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <?php get_template_part('template-parts/header/header'); ?>