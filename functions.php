<?php
/**
 * Wandering Gorilla Theme Functions
 *
 * @package Wandering_Gorilla
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function wandering_gorilla_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 72,
        'width'       => 72,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');

    // Image sizes
    add_image_size('hero-large', 1400, 600, true);
    add_image_size('card-thumbnail', 800, 600, true);
    add_image_size('polaroid', 600, 600, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'wandering-gorilla'),
        'footer'  => __('Footer Menu', 'wandering-gorilla'),
        'social'  => __('Social Links', 'wandering-gorilla'),
    ));
}
add_action('after_setup_theme', 'wandering_gorilla_setup');

/**
 * Enqueue Scripts and Styles
 */
function wandering_gorilla_scripts() {
    // Main stylesheet
    wp_enqueue_style('wandering-gorilla-style', get_stylesheet_uri(), array(), '1.0.0');

    // Google Fonts
    wp_enqueue_style('wandering-gorilla-fonts', 'https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400&family=Oswald:wght@400;500;600;700&display=swap', array(), null);

    // Main JavaScript
    wp_enqueue_script('wandering-gorilla-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // Comments reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wandering_gorilla_scripts');

/**
 * Register Custom Post Types
 */
function wandering_gorilla_register_post_types() {

    // Route Reports
    register_post_type('route_report', array(
        'labels' => array(
            'name'               => __('Route Reports', 'wandering-gorilla'),
            'singular_name'      => __('Route Report', 'wandering-gorilla'),
            'add_new'            => __('Add New Route Report', 'wandering-gorilla'),
            'add_new_item'       => __('Add New Route Report', 'wandering-gorilla'),
            'edit_item'          => __('Edit Route Report', 'wandering-gorilla'),
            'new_item'           => __('New Route Report', 'wandering-gorilla'),
            'view_item'          => __('View Route Report', 'wandering-gorilla'),
            'search_items'       => __('Search Route Reports', 'wandering-gorilla'),
            'not_found'          => __('No route reports found', 'wandering-gorilla'),
            'not_found_in_trash' => __('No route reports found in trash', 'wandering-gorilla'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-location-alt',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
        'rewrite'      => array('slug' => 'routes'),
        'show_in_rest' => true,
    ));

    // Gear Reviews
    register_post_type('gear_review', array(
        'labels' => array(
            'name'               => __('Gear Reviews', 'wandering-gorilla'),
            'singular_name'      => __('Gear Review', 'wandering-gorilla'),
            'add_new'            => __('Add New Gear Review', 'wandering-gorilla'),
            'add_new_item'       => __('Add New Gear Review', 'wandering-gorilla'),
            'edit_item'          => __('Edit Gear Review', 'wandering-gorilla'),
            'new_item'           => __('New Gear Review', 'wandering-gorilla'),
            'view_item'          => __('View Gear Review', 'wandering-gorilla'),
            'search_items'       => __('Search Gear Reviews', 'wandering-gorilla'),
            'not_found'          => __('No gear reviews found', 'wandering-gorilla'),
            'not_found_in_trash' => __('No gear reviews found in trash', 'wandering-gorilla'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-palmtree',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'rewrite'      => array('slug' => 'gear'),
        'show_in_rest' => true,
    ));

    // Local Intel
    register_post_type('local_intel', array(
        'labels' => array(
            'name'               => __('Local Intel', 'wandering-gorilla'),
            'singular_name'      => __('Local Intel', 'wandering-gorilla'),
            'add_new'            => __('Add New Intel', 'wandering-gorilla'),
            'add_new_item'       => __('Add New Intel', 'wandering-gorilla'),
            'edit_item'          => __('Edit Intel', 'wandering-gorilla'),
            'new_item'           => __('New Intel', 'wandering-gorilla'),
            'view_item'          => __('View Intel', 'wandering-gorilla'),
            'search_items'       => __('Search Intel', 'wandering-gorilla'),
            'not_found'          => __('No intel found', 'wandering-gorilla'),
            'not_found_in_trash' => __('No intel found in trash', 'wandering-gorilla'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-info',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'rewrite'      => array('slug' => 'intel'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'wandering_gorilla_register_post_types');

/**
 * Register Taxonomies
 */
function wandering_gorilla_register_taxonomies() {

    // Destination taxonomy for route reports
    register_taxonomy('destination', array('route_report'), array(
        'labels' => array(
            'name'          => __('Destinations', 'wandering-gorilla'),
            'singular_name' => __('Destination', 'wandering-gorilla'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'destination'),
    ));

    // Gear category taxonomy
    register_taxonomy('gear_category', array('gear_review'), array(
        'labels' => array(
            'name'          => __('Gear Categories', 'wandering-gorilla'),
            'singular_name' => __('Gear Category', 'wandering-gorilla'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'gear-category'),
    ));
}
add_action('init', 'wandering_gorilla_register_taxonomies');

/**
 * Register Widget Areas
 */
function wandering_gorilla_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'wandering-gorilla'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'wandering-gorilla'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area 1', 'wandering-gorilla'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area.', 'wandering-gorilla'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area 2', 'wandering-gorilla'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area.', 'wandering-gorilla'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area 3', 'wandering-gorilla'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area.', 'wandering-gorilla'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'wandering_gorilla_widgets_init');

/**
 * Custom Meta Boxes for Route Reports
 */
function wandering_gorilla_add_route_meta_boxes() {
    add_meta_box(
        'route_details',
        __('Route Details', 'wandering-gorilla'),
        'wandering_gorilla_route_details_callback',
        'route_report',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'wandering_gorilla_add_route_meta_boxes');

function wandering_gorilla_route_details_callback($post) {
    wp_nonce_field('wandering_gorilla_save_route_details', 'wandering_gorilla_route_details_nonce');

    $location = get_post_meta($post->ID, '_route_location', true);
    $date = get_post_meta($post->ID, '_route_date', true);
    $weather = get_post_meta($post->ID, '_route_weather', true);
    $distance = get_post_meta($post->ID, '_route_distance', true);
    $duration = get_post_meta($post->ID, '_route_duration', true);
    $gear_used = get_post_meta($post->ID, '_route_gear_used', true);
    ?>
    <div class="route-meta-fields">
        <p>
            <label for="route_location"><?php _e('Location:', 'wandering-gorilla'); ?></label>
            <input type="text" id="route_location" name="route_location" value="<?php echo esc_attr($location); ?>" style="width: 100%;">
        </p>
        <p>
            <label for="route_date"><?php _e('Date:', 'wandering-gorilla'); ?></label>
            <input type="date" id="route_date" name="route_date" value="<?php echo esc_attr($date); ?>" style="width: 100%;">
        </p>
        <p>
            <label for="route_weather"><?php _e('Weather Conditions:', 'wandering-gorilla'); ?></label>
            <input type="text" id="route_weather" name="route_weather" value="<?php echo esc_attr($weather); ?>" style="width: 100%;">
        </p>
        <p>
            <label for="route_distance"><?php _e('Distance:', 'wandering-gorilla'); ?></label>
            <input type="text" id="route_distance" name="route_distance" value="<?php echo esc_attr($distance); ?>" placeholder="e.g., 15 miles" style="width: 100%;">
        </p>
        <p>
            <label for="route_duration"><?php _e('Duration:', 'wandering-gorilla'); ?></label>
            <input type="text" id="route_duration" name="route_duration" value="<?php echo esc_attr($duration); ?>" placeholder="e.g., 3 days" style="width: 100%;">
        </p>
        <p>
            <label for="route_gear_used"><?php _e('Gear Used:', 'wandering-gorilla'); ?></label>
            <textarea id="route_gear_used" name="route_gear_used" rows="3" style="width: 100%;"><?php echo esc_textarea($gear_used); ?></textarea>
        </p>
    </div>
    <?php
}

function wandering_gorilla_save_route_details($post_id) {
    if (!isset($_POST['wandering_gorilla_route_details_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['wandering_gorilla_route_details_nonce'], 'wandering_gorilla_save_route_details')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('route_location', 'route_date', 'route_weather', 'route_distance', 'route_duration', 'route_gear_used');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'wandering_gorilla_save_route_details');

/**
 * Custom Meta Boxes for Gear Reviews
 */
function wandering_gorilla_add_gear_meta_boxes() {
    add_meta_box(
        'gear_details',
        __('Gear Review Details', 'wandering-gorilla'),
        'wandering_gorilla_gear_details_callback',
        'gear_review',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'wandering_gorilla_add_gear_meta_boxes');

function wandering_gorilla_gear_details_callback($post) {
    wp_nonce_field('wandering_gorilla_save_gear_details', 'wandering_gorilla_gear_details_nonce');

    $rating = get_post_meta($post->ID, '_gear_rating', true);
    $affiliate_link = get_post_meta($post->ID, '_gear_affiliate_link', true);
    $price = get_post_meta($post->ID, '_gear_price', true);
    $brand = get_post_meta($post->ID, '_gear_brand', true);
    ?>
    <div class="gear-meta-fields">
        <p>
            <label for="gear_rating"><?php _e('Star Rating (1-5):', 'wandering-gorilla'); ?></label>
            <select id="gear_rating" name="gear_rating" style="width: 100%;">
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> Star<?php echo $i > 1 ? 's' : ''; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <p>
            <label for="gear_brand"><?php _e('Brand:', 'wandering-gorilla'); ?></label>
            <input type="text" id="gear_brand" name="gear_brand" value="<?php echo esc_attr($brand); ?>" style="width: 100%;">
        </p>
        <p>
            <label for="gear_price"><?php _e('Price:', 'wandering-gorilla'); ?></label>
            <input type="text" id="gear_price" name="gear_price" value="<?php echo esc_attr($price); ?>" placeholder="e.g., $149.99" style="width: 100%;">
        </p>
        <p>
            <label for="gear_affiliate_link"><?php _e('Affiliate Link:', 'wandering-gorilla'); ?></label>
            <input type="url" id="gear_affiliate_link" name="gear_affiliate_link" value="<?php echo esc_url($affiliate_link); ?>" style="width: 100%;">
        </p>
    </div>
    <?php
}

function wandering_gorilla_save_gear_details($post_id) {
    if (!isset($_POST['wandering_gorilla_gear_details_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['wandering_gorilla_gear_details_nonce'], 'wandering_gorilla_save_gear_details')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['gear_rating'])) {
        update_post_meta($post_id, '_gear_rating', intval($_POST['gear_rating']));
    }
    if (isset($_POST['gear_brand'])) {
        update_post_meta($post_id, '_gear_brand', sanitize_text_field($_POST['gear_brand']));
    }
    if (isset($_POST['gear_price'])) {
        update_post_meta($post_id, '_gear_price', sanitize_text_field($_POST['gear_price']));
    }
    if (isset($_POST['gear_affiliate_link'])) {
        update_post_meta($post_id, '_gear_affiliate_link', esc_url_raw($_POST['gear_affiliate_link']));
    }
}
add_action('save_post', 'wandering_gorilla_save_gear_details');

/**
 * Custom Excerpt Length
 */
function wandering_gorilla_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'wandering_gorilla_excerpt_length');

/**
 * Custom Excerpt More
 */
function wandering_gorilla_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wandering_gorilla_excerpt_more');

/**
 * Add Kodachrome Photo Class to Images
 */
function wandering_gorilla_add_image_class($class) {
    $class .= ' kodachrome-photo';
    return $class;
}
add_filter('get_image_tag_class', 'wandering_gorilla_add_image_class');

/**
 * Gallery Shortcode with Kodachrome Treatment
 */
function wandering_gorilla_gallery_shortcode($output, $attr) {
    global $post;

    if (!empty($attr['ids'])) {
        $attr['include'] = $attr['ids'];
    }

    $output = '<div class="kodachrome-gallery grid-masonry">';

    if (!empty($attr['include'])) {
        $attachments = get_posts(array(
            'include' => $attr['include'],
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'orderby' => 'post__in'
        ));

        foreach ($attachments as $attachment) {
            $image = wp_get_attachment_image($attachment->ID, 'large', false, array('class' => 'kodachrome-photo'));
            $caption = wp_get_attachment_caption($attachment->ID);

            $output .= '<div class="gallery-item polaroid-photo">';
            $output .= $image;
            if ($caption) {
                $output .= '<p class="photo-caption">' . esc_html($caption) . '</p>';
            }
            $output .= '</div>';
        }
    }

    $output .= '</div>';

    return $output;
}
add_filter('post_gallery', 'wandering_gorilla_gallery_shortcode', 10, 2);

/**
 * Star Rating Display Function
 */
function wandering_gorilla_display_star_rating($rating) {
    if (!$rating) {
        return '';
    }

    $output = '<div class="star-rating" aria-label="' . sprintf(__('%d out of 5 stars', 'wandering-gorilla'), $rating) . '">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<span class="star filled">★</span>';
        } else {
            $output .= '<span class="star empty">☆</span>';
        }
    }
    $output .= '</div>';

    return $output;
}

/**
 * Related Posts Function
 */
function wandering_gorilla_related_posts($post_id, $limit = 3) {
    $post = get_post($post_id);
    $categories = wp_get_post_categories($post_id);

    if (!$categories) {
        return;
    }

    $args = array(
        'category__in' => $categories,
        'post__not_in' => array($post_id),
        'posts_per_page' => $limit,
        'post_type' => $post->post_type,
        'orderby' => 'rand'
    );

    $related_query = new WP_Query($args);

    if ($related_query->have_posts()) {
        echo '<div class="related-expeditions">';
        echo '<h3>' . __('Also Worth Seeing', 'wandering-gorilla') . '</h3>';
        echo '<div class="grid grid-3">';

        while ($related_query->have_posts()) {
            $related_query->the_post();
            get_template_part('template-parts/content', 'card');
        }

        echo '</div>';
        echo '</div>';
    }

    wp_reset_postdata();
}

/**
 * Breadcrumbs Function
 */
function wandering_gorilla_breadcrumbs() {
    if (is_front_page()) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<a href="' . home_url('/') . '">' . __('Base Camp', 'wandering-gorilla') . '</a>';

    if (is_category() || is_single()) {
        echo ' → ';
        the_category(', ');
        if (is_single()) {
            echo ' → ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' → ';
        the_title();
    } elseif (is_search()) {
        echo ' → ';
        printf(__('Search Results for: %s', 'wandering-gorilla'), get_search_query());
    } elseif (is_404()) {
        echo ' → ';
        _e('Trail Not Found', 'wandering-gorilla');
    }

    echo '</nav>';
}

/**
 * Custom Comment Display
 */
function wandering_gorilla_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class('guest-book-entry'); ?> id="comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, 60, '', '', array('class' => 'avatar')); ?>
                <cite class="fn"><?php comment_author_link(); ?></cite>
                <span class="vintage-label"><?php printf(__('%1$s at %2$s', 'wandering-gorilla'), get_comment_date(), get_comment_time()); ?></span>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            <div class="comment-reply">
                <?php comment_reply_link(array_merge($args, array(
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => __('Reply to this entry', 'wandering-gorilla')
                ))); ?>
            </div>
        </article>
    <?php
}

/**
 * Pagination
 */
function wandering_gorilla_pagination() {
    global $wp_query;

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $big = 999999999;

    echo '<nav class="pagination" aria-label="Pagination">';
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '← ' . __('Previous', 'wandering-gorilla'),
        'next_text' => __('Next', 'wandering-gorilla') . ' →',
        'type' => 'list',
    ));
    echo '</nav>';
}

/**
 * Body Class Filter
 */
function wandering_gorilla_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (is_page_template('page-gear.php')) {
        $classes[] = 'page-supply-list';
    }

    if (is_page_template('page-support.php')) {
        $classes[] = 'page-field-support';
    }

    return $classes;
}
add_filter('body_class', 'wandering_gorilla_body_classes');

/**
 * Custom Logo Output
 */
function wandering_gorilla_custom_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo" rel="home">';
        bloginfo('name');
        echo '</a>';
    }
}

/**
 * Performance Optimization - Lazy Loading
 */
function wandering_gorilla_add_lazy_loading($content) {
    if (is_feed() || is_admin()) {
        return $content;
    }

    $content = str_replace('<img ', '<img loading="lazy" ', $content);
    return $content;
}
add_filter('the_content', 'wandering_gorilla_add_lazy_loading');

/**
 * SEO Meta Tags
 */
function wandering_gorilla_meta_tags() {
    if (is_singular()) {
        global $post;
        $description = wp_trim_words($post->post_content, 30, '...');
        $image = get_the_post_thumbnail_url($post->ID, 'large');

        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";

        if ($image) {
            echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
            echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
        }

        echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
        echo '<meta property="og:type" content="article">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">' . "\n";

        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr(get_the_title()) . '">' . "\n";
        echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    }
}
add_action('wp_head', 'wandering_gorilla_meta_tags');

/**
 * Schema.org Markup
 */
function wandering_gorilla_schema_markup() {
    if (is_singular('route_report')) {
        global $post;
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'description' => get_the_excerpt(),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author()
            )
        );

        if (has_post_thumbnail()) {
            $schema['image'] = get_the_post_thumbnail_url($post->ID, 'large');
        }

        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'wandering_gorilla_schema_markup');

/**
 * Custom Search Form
 */
function wandering_gorilla_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url('/') . '">
        <label>
            <span class="screen-reader-text">' . __('Search for:', 'wandering-gorilla') . '</span>
            <input type="search" class="search-field" placeholder="' . esc_attr__('Search expeditions...', 'wandering-gorilla') . '" value="' . get_search_query() . '" name="s" />
        </label>
        <button type="submit" class="btn btn-secondary">' . __('Search', 'wandering-gorilla') . '</button>
    </form>';

    return $form;
}
add_filter('get_search_form', 'wandering_gorilla_search_form');

/**
 * Default Menu Fallback
 */
function wandering_gorilla_default_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'wandering-gorilla') . '</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('route_report')) . '">' . __('Routes', 'wandering-gorilla') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gear')) . '">' . __('Gear', 'wandering-gorilla') . '</a></li>';
    echo '<li><a href="' . esc_url(get_post_type_archive_link('local_intel')) . '">' . __('Intel', 'wandering-gorilla') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/support')) . '">' . __('Support', 'wandering-gorilla') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . __('Contact', 'wandering-gorilla') . '</a></li>';
    echo '</ul>';
}
