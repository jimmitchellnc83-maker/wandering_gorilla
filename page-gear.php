<?php
/**
 * Template Name: Gear Supply List
 * Template for displaying gear and equipment reviews
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main page-supply-list">

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

            <header class="entry-header text-center">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <p class="lead-text"><?php _e('Field-tested equipment and supply recommendations', 'wandering-gorilla'); ?></p>
            </header>

            <?php if (get_the_content()) : ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <div class="section-break"></div>
            <?php endif; ?>

        </article>

    <?php endwhile; ?>

    <!-- Display Gear Reviews -->
    <?php
    $gear_query = new WP_Query(array(
        'post_type' => 'gear_review',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
    ));

    if ($gear_query->have_posts()) :
    ?>
        <section class="gear-reviews-section">
            <h2 class="text-center"><?php _e('Field-Tested Gear Reviews', 'wandering-gorilla'); ?></h2>

            <div class="grid grid-3 mt-lg">
                <?php while ($gear_query->have_posts()) : $gear_query->the_post(); ?>
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

                        <div style="display: flex; gap: 12px; margin-top: 12px;">
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="flex: 1;">
                                <?php _e('Full Review', 'wandering-gorilla'); ?>
                            </a>

                            <?php
                            $affiliate_link = get_post_meta(get_the_ID(), '_gear_affiliate_link', true);
                            if ($affiliate_link) :
                            ?>
                                <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-badge" target="_blank" rel="nofollow noopener" style="flex: 1;">
                                    <?php _e('Get Gear', 'wandering-gorilla'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            if ($gear_query->max_num_pages > 1) :
                echo '<div class="pagination mt-xl">';
                echo paginate_links(array(
                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $gear_query->max_num_pages,
                    'prev_text' => '← ' . __('Previous', 'wandering-gorilla'),
                    'next_text' => __('Next', 'wandering-gorilla') . ' →',
                ));
                echo '</div>';
            endif;
            ?>
        </section>
    <?php
        wp_reset_postdata();
    else :
    ?>
        <div class="text-center" style="padding: 96px 0;">
            <h2><?php _e('No Gear Reviews Yet', 'wandering-gorilla'); ?></h2>
            <p><?php _e('Equipment reviews coming soon. Check back for field-tested gear recommendations!', 'wandering-gorilla'); ?></p>
        </div>
    <?php endif; ?>

    <div class="section-break"></div>

    <!-- Supply List Categories -->
    <?php
    $gear_categories = get_terms(array(
        'taxonomy' => 'gear_category',
        'hide_empty' => false,
    ));

    if (!empty($gear_categories) && !is_wp_error($gear_categories)) :
    ?>
        <section class="supply-categories">
            <h2 class="text-center"><?php _e('Browse by Category', 'wandering-gorilla'); ?></h2>
            <div class="grid grid-3 mt-lg">
                <?php foreach ($gear_categories as $category) : ?>
                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="btn btn-secondary">
                        <?php echo esc_html($category->name); ?> (<?php echo $category->count; ?>)
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

</main><!-- #primary -->

<?php
get_footer();
