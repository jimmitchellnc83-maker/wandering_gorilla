<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text skip-link" href="#primary"><?php _e('Skip to content', 'wandering-gorilla'); ?></a>

<header class="site-header" role="banner">
    <div class="header-inner">
        <div class="site-branding">
            <?php wandering_gorilla_custom_logo(); ?>
        </div>

        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span><?php _e('Menu', 'wandering-gorilla'); ?></span>
        </button>

        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'wandering-gorilla'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => 'wandering_gorilla_default_menu',
            ));
            ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content">
    <div class="container">
        <?php wandering_gorilla_breadcrumbs(); ?>
