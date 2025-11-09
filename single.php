<?php
/**
 * The template for displaying single posts
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
                <div class="hero-section" style="height: 500px;">
                    <?php the_post_thumbnail('hero-large', array('class' => 'hero-image')); ?>
                </div>
            <?php endif; ?>

            <div class="section-break"></div>

            <!-- Route Report Header (for route_report post type) -->
            <?php if (get_post_type() === 'route_report') : ?>
                <div class="route-report-header">
                    <h2><?php _e('Field Report Details', 'wandering-gorilla'); ?></h2>

                    <div class="route-details">
                        <?php
                        $location = get_post_meta(get_the_ID(), '_route_location', true);
                        $date = get_post_meta(get_the_ID(), '_route_date', true);
                        $weather = get_post_meta(get_the_ID(), '_route_weather', true);
                        $distance = get_post_meta(get_the_ID(), '_route_distance', true);
                        $duration = get_post_meta(get_the_ID(), '_route_duration', true);

                        if ($location) :
                        ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Location', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value">📍 <?php echo esc_html($location); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($date) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Date', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value">📅 <?php echo esc_html(date('F j, Y', strtotime($date))); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($weather) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Weather', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value">🌤️ <?php echo esc_html($weather); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($distance) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Distance', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value">🥾 <?php echo esc_html($distance); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($duration) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Duration', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value">⏱️ <?php echo esc_html($duration); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Gear Review Header (for gear_review post type) -->
            <?php if (get_post_type() === 'gear_review') : ?>
                <div class="route-report-header">
                    <h2><?php _e('Gear Specifications', 'wandering-gorilla'); ?></h2>

                    <div class="route-details">
                        <?php
                        $rating = get_post_meta(get_the_ID(), '_gear_rating', true);
                        $brand = get_post_meta(get_the_ID(), '_gear_brand', true);
                        $price = get_post_meta(get_the_ID(), '_gear_price', true);
                        $affiliate_link = get_post_meta(get_the_ID(), '_gear_affiliate_link', true);

                        if ($rating) :
                        ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Field Test Rating', 'wandering-gorilla'); ?></div>
                                <?php echo wandering_gorilla_display_star_rating($rating); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($brand) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Manufacturer', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value"><?php echo esc_html($brand); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($price) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Price', 'wandering-gorilla'); ?></div>
                                <div class="route-detail-value"><?php echo esc_html($price); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if ($affiliate_link) : ?>
                            <div class="route-detail-item">
                                <div class="route-detail-label"><?php _e('Get This Gear', 'wandering-gorilla'); ?></div>
                                <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-badge" target="_blank" rel="nofollow noopener">
                                    <?php _e('View Product', 'wandering-gorilla'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <div class="entry-meta">
                    <?php
                    $categories = get_the_category();
                    if ($categories) :
                        foreach ($categories as $category) :
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-badge">' . esc_html($category->name) . '</a>';
                        endforeach;
                    endif;
                    ?>

                    <p class="vintage-label mt-md">
                        <?php
                        printf(
                            __('Documented by %s on %s', 'wandering-gorilla'),
                            '<span class="author vcard">' . get_the_author() . '</span>',
                            '<time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'
                        );
                        ?>
                    </p>
                </div>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php if (get_post_type() === 'route_report') : ?>
                <?php
                $gear_used = get_post_meta(get_the_ID(), '_route_gear_used', true);
                if ($gear_used) :
                ?>
                    <div class="route-report-header mt-xl">
                        <h2><?php _e('Supply List', 'wandering-gorilla'); ?></h2>
                        <div class="route-detail-value">
                            <?php echo wp_kses_post(wpautop($gear_used)); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <footer class="entry-footer">
                <?php
                $tags = get_the_tags();
                if ($tags) :
                    echo '<div class="tags-list mt-lg">';
                    echo '<span class="vintage-label">' . __('Filed Under:', 'wandering-gorilla') . '</span> ';
                    foreach ($tags as $tag) :
                        echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="category-badge">' . esc_html($tag->name) . '</a> ';
                    endforeach;
                    echo '</div>';
                endif;
                ?>
            </footer>

        </article>

        <div class="section-break"></div>

        <!-- Related Posts -->
        <?php wandering_gorilla_related_posts(get_the_ID()); ?>

        <div class="section-break"></div>

        <!-- Guest Book Style Comments -->
        <?php
        if (comments_open() || get_comments_number()) :
        ?>
            <div class="comments-section government-form">
                <h3><?php _e('Guest Book', 'wandering-gorilla'); ?></h3>
                <p class="vintage-label"><?php _e('Sign the guest book and share your thoughts', 'wandering-gorilla'); ?></p>

                <?php comments_template(); ?>
            </div>
        <?php endif; ?>

        <!-- Post Navigation -->
        <nav class="post-navigation mt-xl" aria-label="<?php esc_attr_e('Post navigation', 'wandering-gorilla'); ?>">
            <div class="grid grid-2">
                <div class="nav-previous">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                    ?>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="btn btn-secondary">
                            ← <?php _e('Previous Expedition', 'wandering-gorilla'); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="nav-next text-right">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="btn btn-secondary">
                            <?php _e('Next Expedition', 'wandering-gorilla'); ?> →
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

    <?php endwhile; ?>

</main><!-- #primary -->

<?php
get_footer();
