<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found">

        <div class="route-report-header text-center" style="max-width: 800px; margin: 0 auto; background: rgba(220, 20, 60, 0.05);">
            <h1 class="page-title" style="font-size: 6rem; color: var(--color-accent); margin-bottom: 24px;">404</h1>
            <h2><?php _e('Trail Not Found', 'wandering-gorilla'); ?></h2>
            <p class="vintage-label"><?php _e('The path you\'re looking for seems to have been washed out', 'wandering-gorilla'); ?></p>
        </div>

        <div class="section-break"></div>

        <div class="page-content" style="max-width: 800px; margin: 0 auto;">

            <div class="government-form">
                <h3><?php _e('Lost on the Trail?', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Don\'t worry, even experienced explorers take wrong turns. Here are some ways to get back on track:', 'wandering-gorilla'); ?></p>

                <div class="grid grid-2 mt-lg">
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Return to Base Camp', 'wandering-gorilla'); ?></div>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <?php _e('← Home', 'wandering-gorilla'); ?>
                        </a>
                    </div>

                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Browse Recent Routes', 'wandering-gorilla'); ?></div>
                        <a href="<?php echo esc_url(get_post_type_archive_link('route_report')); ?>" class="btn btn-secondary">
                            <?php _e('Route Reports', 'wandering-gorilla'); ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="section-break"></div>

            <!-- Search Form -->
            <div class="government-form">
                <h3><?php _e('Search for a Different Trail', 'wandering-gorilla'); ?></h3>
                <p class="vintage-label mb-md"><?php _e('Try searching for what you were looking for', 'wandering-gorilla'); ?></p>
                <?php get_search_form(); ?>
            </div>

            <div class="section-break"></div>

            <!-- Recent Posts -->
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status' => 'publish',
            ));

            if ($recent_posts->have_posts()) :
            ?>
                <div class="recent-routes">
                    <h3 class="text-center"><?php _e('Or Explore Recent Expeditions', 'wandering-gorilla'); ?></h3>

                    <div class="grid grid-3 mt-lg">
                        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <article class="post-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-card-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('card-thumbnail'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="post-card-content">
                                    <h4 class="post-card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>

                                    <div class="post-card-meta">
                                        <span><?php echo get_the_date(); ?></span>
                                        <a href="<?php the_permalink(); ?>" class="vintage-label">
                                            <?php _e('View →', 'wandering-gorilla'); ?>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php
                wp_reset_postdata();
            endif;
            ?>

            <div class="section-break"></div>

            <!-- Popular Categories -->
            <?php
            $categories = get_categories(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'number' => 6,
            ));

            if ($categories) :
            ?>
                <div class="popular-categories">
                    <h3 class="text-center"><?php _e('Browse by Destination', 'wandering-gorilla'); ?></h3>
                    <div class="grid grid-3 mt-lg">
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="btn btn-badge">
                                <?php echo esc_html($category->name); ?> (<?php echo $category->count; ?>)
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <div class="section-break"></div>

        <div class="text-center">
            <p class="vintage-stamp"><?php _e('Trail Marker: 404', 'wandering-gorilla'); ?></p>
        </div>

    </section><!-- .error-404 -->

</main><!-- #primary -->

<?php
get_footer();
