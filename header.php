<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="site-header">
        <nav id="site-navigation">
            <?php
            // Display the primary menu
            wp_nav_menu(
                array(
                    'theme_location' => 'primary-menu',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav>
    </header>

    <div id="content" class="site-content">