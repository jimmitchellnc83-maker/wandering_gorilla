<?php
/**
 * The template for displaying category archives
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <h1 class="page-title">
            <?php
            printf(
                __('Route Category: %s', 'wandering-gorilla'),
                '<span>' . single_cat_title('', false) . '</span>'
            );
            ?>
        </h1>
        <?php
        $category_description = category_description();
        if ($category_description) :
            echo '<div class="archive-description lead-text">' . $category_description . '</div>';
        endif;
        ?>
    </header>

    <div class="section-break"></div>

    <?php if (have_posts()) : ?>

        <div class="grid grid-3">

            <?php while (have_posts()) : the_post(); ?>

                <article <?php post_class('post-card fade-in'); ?>>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-card-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('card-thumbnail'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="post-card-content">
                        <?php
                        $categories = get_the_category();
                        if ($categories) :
                            foreach ($categories as $category) :
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-badge">' . esc_html($category->name) . '</a>';
                            endforeach;
                        endif;
                        ?>

                        <h3 class="post-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>

                        <div class="post-card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="post-card-meta">
                            <span><?php echo get_the_date(); ?></span>
                            <a href="<?php the_permalink(); ?>" class="vintage-label">
                                <?php _e('Read Report →', 'wandering-gorilla'); ?>
                            </a>
                        </div>
                    </div>

                </article>

            <?php endwhile; ?>

        </div>

        <?php wandering_gorilla_pagination(); ?>

    <?php else : ?>

        <div class="text-center" style="padding: 96px 0;">
            <h2><?php _e('No Routes in This Category', 'wandering-gorilla'); ?></h2>
            <p><?php _e('No field reports found in this category yet. Check back soon for new expeditions!', 'wandering-gorilla'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-secondary mt-lg">
                <?php _e('Return to Base Camp', 'wandering-gorilla'); ?>
            </a>
        </div>

    <?php endif; ?>

</main><!-- #primary -->

<?php
get_footer();
