<?php
/**
 * The template for displaying archive pages
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description lead-text">', '</div>');
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
                        // Display categories or taxonomies
                        if (get_post_type() === 'route_report') {
                            $destinations = get_the_terms(get_the_ID(), 'destination');
                            if ($destinations && !is_wp_error($destinations)) :
                                foreach ($destinations as $destination) :
                                    echo '<a href="' . esc_url(get_term_link($destination)) . '" class="category-badge">' . esc_html($destination->name) . '</a>';
                                endforeach;
                            endif;
                        } elseif (get_post_type() === 'gear_review') {
                            $rating = get_post_meta(get_the_ID(), '_gear_rating', true);
                            if ($rating) :
                                echo wandering_gorilla_display_star_rating($rating);
                            endif;
                        } else {
                            $categories = get_the_category();
                            if ($categories) :
                                foreach ($categories as $category) :
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-badge">' . esc_html($category->name) . '</a>';
                                endforeach;
                            endif;
                        }
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
                                <?php
                                if (get_post_type() === 'route_report') {
                                    _e('View Report →', 'wandering-gorilla');
                                } elseif (get_post_type() === 'gear_review') {
                                    _e('Read Review →', 'wandering-gorilla');
                                } else {
                                    _e('Read More →', 'wandering-gorilla');
                                }
                                ?>
                            </a>
                        </div>
                    </div>

                </article>

            <?php endwhile; ?>

        </div>

        <?php wandering_gorilla_pagination(); ?>

    <?php else : ?>

        <div class="text-center" style="padding: 96px 0;">
            <h2><?php _e('No Entries Found', 'wandering-gorilla'); ?></h2>
            <p><?php _e('Nothing to report from this section yet. Check back soon for new expeditions!', 'wandering-gorilla'); ?></p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-secondary mt-lg">
                <?php _e('Return to Base Camp', 'wandering-gorilla'); ?>
            </a>
        </div>

    <?php endif; ?>

</main><!-- #primary -->

<?php
get_footer();
