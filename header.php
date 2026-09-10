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

    <div class="site-masthead">
        <?php $wg_description = get_bloginfo('description', 'display'); ?>
        <?php if ($wg_description) : ?>
            <div class="issue-line"><?php echo esc_html($wg_description); ?></div>
        <?php endif; ?>

        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <?php $wg_title_tag = (is_front_page() && is_home()) ? 'h1' : 'p'; ?>
            <<?php echo $wg_title_tag; ?> class="masthead-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            </<?php echo $wg_title_tag; ?>>
        <?php endif; ?>

        <div class="imprint-line">
            <?php
            printf(
                /* translators: 1: date the page was loaded, 2: site title. */
                esc_html__('%1$s &middot; Published irregularly by %2$s', 'wandering-gorilla'),
                esc_html(date_i18n(get_option('date_format'))),
                esc_html(get_bloginfo('name'))
            );
            ?>
        </div>
    </div>

</header>

<div class="site-nav-bar">
    <div class="header-inner">
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title" rel="home"><?php bloginfo('name'); ?></a>
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
</div><!-- .site-nav-bar -->

<div id="content" class="site-content">
    <div class="container">
        <?php wandering_gorilla_breadcrumbs(); ?>
