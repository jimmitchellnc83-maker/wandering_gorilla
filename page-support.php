<?php
/**
 * Template Name: Support Page
 * Template for displaying support and donation options
 *
 * @package Wandering_Gorilla
 */

get_header();
?>

<main id="primary" class="site-main page-field-support">

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
                <p class="lead-text"><?php _e('Help support independent field documentation', 'wandering-gorilla'); ?></p>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile; ?>

    <div class="section-break"></div>

    <!-- Support Options -->
    <section class="support-options">
        <div class="grid grid-3">

            <!-- One-Time Support -->
            <div class="gear-card text-center">
                <div class="vintage-stamp mb-md"><?php _e('One-Time Support', 'wandering-gorilla'); ?></div>
                <h3><?php _e('Buy Me a Coffee', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Support a single expedition with a one-time contribution. Every coffee helps fuel the next adventure.', 'wandering-gorilla'); ?></p>

                <div class="route-detail-value mb-md">$5+</div>

                <a href="#" class="btn btn-primary" target="_blank" rel="noopener">
                    <?php _e('Send a Coffee ☕', 'wandering-gorilla'); ?>
                </a>

                <p class="vintage-label mt-md">
                    <?php _e('Or use Venmo: @YourHandle', 'wandering-gorilla'); ?>
                </p>
            </div>

            <!-- Monthly Support -->
            <div class="gear-card text-center">
                <div class="vintage-stamp mb-md"><?php _e('Field Partner', 'wandering-gorilla'); ?></div>
                <h3><?php _e('Monthly Support', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Become a recurring supporter and get exclusive field reports, early access to content, and behind-the-scenes updates.', 'wandering-gorilla'); ?></p>

                <div class="route-detail-value mb-md">$5-50/month</div>

                <a href="#" class="btn btn-accent" target="_blank" rel="noopener">
                    <?php _e('Become a Partner', 'wandering-gorilla'); ?>
                </a>

                <p class="vintage-label mt-md">
                    <?php _e('Via Patreon or Ko-fi', 'wandering-gorilla'); ?>
                </p>
            </div>

            <!-- Sponsorship -->
            <div class="gear-card text-center">
                <div class="vintage-stamp mb-md"><?php _e('Expedition Sponsor', 'wandering-gorilla'); ?></div>
                <h3><?php _e('Brand Partnership', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Interested in sponsoring content, gear reviews, or specific expeditions? Let\'s create authentic partnerships.', 'wandering-gorilla'); ?></p>

                <div class="route-detail-value mb-md"><?php _e('Custom', 'wandering-gorilla'); ?></div>

                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">
                    <?php _e('View Rate Card', 'wandering-gorilla'); ?>
                </a>

                <p class="vintage-label mt-md">
                    <?php _e('Professional partnerships available', 'wandering-gorilla'); ?>
                </p>
            </div>

        </div>
    </section>

    <div class="section-break"></div>

    <!-- What Support Provides -->
    <section class="support-breakdown">
        <h2 class="text-center"><?php _e('Where Your Support Goes', 'wandering-gorilla'); ?></h2>
        <p class="lead-text text-center"><?php _e('Funding independent documentation and authentic adventure storytelling', 'wandering-gorilla'); ?></p>

        <div class="grid grid-2 mt-lg">
            <div class="route-report-header">
                <h2><?php _e('Equipment & Gear', 'wandering-gorilla'); ?></h2>
                <div class="route-details">
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Camera Equipment', 'wandering-gorilla'); ?></div>
                        <div class="route-detail-value"><?php _e('Documenting in authentic Kodachrome style', 'wandering-gorilla'); ?></div>
                    </div>
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Field Gear', 'wandering-gorilla'); ?></div>
                        <div class="route-detail-value"><?php _e('Quality equipment for safe expeditions', 'wandering-gorilla'); ?></div>
                    </div>
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Maintenance & Repairs', 'wandering-gorilla'); ?></div>
                        <div class="route-detail-value"><?php _e('Keeping gear field-ready', 'wandering-gorilla'); ?></div>
                    </div>
                </div>
            </div>

            <div class="route-report-header">
                <h2><?php _e('Expeditions & Travel', 'wandering-gorilla'); ?></h2>
                <div class="route-details">
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Transportation', 'wandering-gorilla'); ?></div>
                        <div class="route-detail-value"><?php _e('Getting to remote locations', 'wandering-gorilla'); ?></div>
                    </div>
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Permits & Fees', 'wandering-gorilla'); ?></div>
                        <div class="route-detail-value"><?php _e('National Park and wilderness access', 'wandering-gorilla'); ?></div>
                    </div>
                    <div class="route-detail-item">
                        <div class="route-detail-label"><?php _e('Research & Scouting', 'wandering-gorilla'); ?></div>
                        <div class="route-detail-value"><?php _e('Finding undocumented trails', 'wandering-gorilla'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-break"></div>

    <!-- Other Ways to Support -->
    <section class="alternative-support">
        <h2 class="text-center"><?php _e('Other Ways to Help', 'wandering-gorilla'); ?></h2>

        <div class="grid grid-3 mt-lg">
            <div class="text-center">
                <h3><?php _e('📢 Share Content', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Share field reports with fellow adventurers and help grow the community.', 'wandering-gorilla'); ?></p>
            </div>

            <div class="text-center">
                <h3><?php _e('🔗 Use Affiliate Links', 'wandering-gorilla'); ?></h3>
                <p><?php _e('When you purchase gear through our supply list links, we earn a small commission at no cost to you.', 'wandering-gorilla'); ?></p>
            </div>

            <div class="text-center">
                <h3><?php _e('✍️ Guest Book Entries', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Leave comments, share your own experiences, and engage with the community.', 'wandering-gorilla'); ?></p>
            </div>
        </div>
    </section>

    <div class="section-break"></div>

    <!-- Thank You Message -->
    <div class="government-form text-center" style="max-width: 800px; margin: 0 auto;">
        <h2><?php _e('Thank You for Your Support', 'wandering-gorilla'); ?></h2>
        <p><?php _e('Every contribution—whether financial, sharing content, or engaging with the community—helps keep independent adventure documentation alive. Your support makes it possible to continue exploring, documenting, and sharing the American landscape.', 'wandering-gorilla'); ?></p>
        <p class="vintage-label mt-md"><?php _e('— From the field, with gratitude', 'wandering-gorilla'); ?></p>
    </div>

</main><!-- #primary -->

<?php
get_footer();
