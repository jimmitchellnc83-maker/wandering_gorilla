<?php
/**
 * The main template file
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if (is_home() && !is_paged()) : ?>
        <?php
        // Featured Hero Section - Latest Route Report
        $latest_route = new WP_Query(array(
            'post_type' => 'route_report',
            'posts_per_page' => 1,
        ));

        if ($latest_route->have_posts()) :
            while ($latest_route->have_posts()) : $latest_route->the_post();
        ?>
            <section class="hero-section">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('hero-large', array('class' => 'hero-image')); ?>
                <?php endif; ?>
                <div class="hero-content">
                    <h1><?php the_title(); ?></h1>
                    <div class="hero-meta">
                        <?php
                        $location = get_post_meta(get_the_ID(), '_route_location', true);
                        $date = get_post_meta(get_the_ID(), '_route_date', true);
                        $distance = get_post_meta(get_the_ID(), '_route_distance', true);

                        if ($location) :
                            echo '<span class="vintage-label">📍 ' . esc_html($location) . '</span>';
                        endif;

                        if ($date) :
                            echo '<span class="vintage-label">📅 ' . esc_html(date('F j, Y', strtotime($date))) . '</span>';
                        endif;

                        if ($distance) :
                            echo '<span class="vintage-label">🥾 ' . esc_html($distance) . '</span>';
                        endif;
                        ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                        <?php _e('View Full Report', 'wandering-gorilla'); ?>
                    </a>
                </div>
            </section>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

        <div class="section-break"></div>

        <!-- Recent Expeditions Section -->
        <section class="recent-expeditions">
            <h2 class="text-center"><?php _e('Recent Expeditions', 'wandering-gorilla'); ?></h2>
            <p class="lead-text text-center"><?php _e('Field reports from the American landscape', 'wandering-gorilla'); ?></p>

            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 6,
                'post__not_in' => $latest_route->posts ? array($latest_route->posts[0]->ID) : array(),
            ));

            if ($recent_posts->have_posts()) :
            ?>
                <div class="grid grid-3 mt-lg">
                    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
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
            <?php
                wp_reset_postdata();
            else :
                echo '<p class="text-center">' . __('No expeditions found. Start documenting your adventures!', 'wandering-gorilla') . '</p>';
            endif;
            ?>
        </section>

        <div class="section-break"></div>

        <!-- Field Tested Gear Section -->
        <?php
        $gear_reviews = new WP_Query(array(
            'post_type' => 'gear_review',
            'posts_per_page' => 3,
        ));

        if ($gear_reviews->have_posts()) :
        ?>
            <section class="gear-section">
                <h2 class="text-center"><?php _e('Field Tested Gear', 'wandering-gorilla'); ?></h2>
                <p class="lead-text text-center"><?php _e('Equipment reviews from actual expeditions', 'wandering-gorilla'); ?></p>

                <div class="grid grid-3 mt-lg">
                    <?php while ($gear_reviews->have_posts()) : $gear_reviews->the_post(); ?>
                        <article class="gear-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="polaroid-photo mb-md">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('card-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php
                            $rating = get_post_meta(get_the_ID(), '_gear_rating', true);
                            if ($rating) :
                                echo wandering_gorilla_display_star_rating($rating);
                            endif;
                            ?>

                            <h3 class="post-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <?php
                            $brand = get_post_meta(get_the_ID(), '_gear_brand', true);
                            $price = get_post_meta(get_the_ID(), '_gear_price', true);

                            if ($brand || $price) :
                                echo '<p class="vintage-label">';
                                if ($brand) echo esc_html($brand);
                                if ($brand && $price) echo ' • ';
                                if ($price) echo esc_html($price);
                                echo '</p>';
                            endif;
                            ?>

                            <div class="post-card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-badge">
                                <?php _e('Full Review', 'wandering-gorilla'); ?>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="text-center mt-lg">
                    <a href="<?php echo get_post_type_archive_link('gear_review'); ?>" class="btn btn-secondary">
                        <?php _e('View All Gear Reviews', 'wandering-gorilla'); ?>
                    </a>
                </div>
            </section>
        <?php
            wp_reset_postdata();
        endif;
        ?>

    <?php else : ?>
        <!-- Standard Blog Loop for Archive Pages -->
        <?php if (have_posts()) : ?>
            <div class="grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
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
                                    <?php _e('Read More →', 'wandering-gorilla'); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php wandering_gorilla_pagination(); ?>

        <?php else : ?>
            <div class="text-center" style="padding: 96px 0;">
                <h2><?php _e('No Expeditions Found', 'wandering-gorilla'); ?></h2>
                <p><?php _e('It looks like there are no field reports yet. Time to start documenting!', 'wandering-gorilla'); ?></p>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</main><!-- #primary -->

<?php
get_footer();
