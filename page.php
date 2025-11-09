<?php
/**
 * The template for displaying all pages
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if (has_post_thumbnail()) : ?>
                <div class="hero-section" style="height: 400px;">
                    <?php the_post_thumbnail('hero-large', array('class' => 'hero-image')); ?>
                </div>
                <div class="section-break"></div>
            <?php endif; ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'wandering-gorilla'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="section-break"></div>
                <div class="comments-section government-form">
                    <h3><?php _e('Comments', 'wandering-gorilla'); ?></h3>
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>

        </article>

    <?php endwhile; ?>

</main><!-- #primary -->

<?php
get_footer();
