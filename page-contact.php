<?php
/**
 * Template Name: Contact Page
 * Template for displaying contact form
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

            <header class="entry-header text-center">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <p class="lead-text"><?php _e('Send a message from the trail', 'wandering-gorilla'); ?></p>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile; ?>

    <div class="section-break"></div>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div style="max-width: 800px; margin: 0 auto;">

            <div class="government-form">
                <h2><?php _e('Field Notes Dispatch Form', 'wandering-gorilla'); ?></h2>
                <p class="vintage-label mb-lg"><?php _e('All fields marked with * are required for dispatch', 'wandering-gorilla'); ?></p>

                <?php
                // Simple contact form - you can replace this with Contact Form 7, WPForms, etc.
                if (isset($_POST['contact_submit'])) {
                    // Process form (basic example - should be enhanced with proper validation and sanitization)
                    $name = sanitize_text_field($_POST['contact_name']);
                    $email = sanitize_email($_POST['contact_email']);
                    $subject = sanitize_text_field($_POST['contact_subject']);
                    $message = sanitize_textarea_field($_POST['contact_message']);

                    $to = get_option('admin_email');
                    $email_subject = 'Contact Form: ' . $subject;
                    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
                    $headers = array('Content-Type: text/plain; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');

                    if (wp_mail($to, $email_subject, $email_body, $headers)) {
                        echo '<div class="form-notice form-notice-success">';
                        echo '<h3>✓ ' . __('Message Dispatched Successfully!', 'wandering-gorilla') . '</h3>';
                        echo '<p>' . __('Your message has been received. We\'ll respond as soon as we return to base camp.', 'wandering-gorilla') . '</p>';
                        echo '</div>';
                    } else {
                        echo '<div class="form-notice form-notice-error">';
                        echo '<h3>✗ ' . __('Dispatch Failed', 'wandering-gorilla') . '</h3>';
                        echo '<p>' . __('There was an error sending your message. Please try again or contact us directly via email.', 'wandering-gorilla') . '</p>';
                        echo '</div>';
                    }
                }
                ?>

                <form method="post" action="" class="contact-form">
                    <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>

                    <div class="form-group">
                        <label for="contact_name"><?php _e('Name *', 'wandering-gorilla'); ?></label>
                        <input type="text" id="contact_name" name="contact_name" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_email"><?php _e('Email Address *', 'wandering-gorilla'); ?></label>
                        <input type="email" id="contact_email" name="contact_email" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_subject"><?php _e('Subject *', 'wandering-gorilla'); ?></label>
                        <select id="contact_subject" name="contact_subject" required>
                            <option value=""><?php _e('Select a topic...', 'wandering-gorilla'); ?></option>
                            <option value="General Inquiry"><?php _e('General Inquiry', 'wandering-gorilla'); ?></option>
                            <option value="Sponsorship"><?php _e('Sponsorship / Partnership', 'wandering-gorilla'); ?></option>
                            <option value="Gear Review Request"><?php _e('Gear Review Request', 'wandering-gorilla'); ?></option>
                            <option value="Collaboration"><?php _e('Collaboration Opportunity', 'wandering-gorilla'); ?></option>
                            <option value="Media Request"><?php _e('Media / Press Request', 'wandering-gorilla'); ?></option>
                            <option value="Other"><?php _e('Other', 'wandering-gorilla'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contact_message"><?php _e('Message *', 'wandering-gorilla'); ?></label>
                        <textarea id="contact_message" name="contact_message" rows="8" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="contact_submit" class="submit-button">
                            <?php _e('Dispatch Message', 'wandering-gorilla'); ?>
                        </button>
                    </div>
                </form>

                <p class="vintage-label mt-lg text-center">
                    <?php _e('Response time: 2-5 business days from base camp', 'wandering-gorilla'); ?>
                </p>
            </div>

        </div>
    </section>

    <div class="section-break"></div>

    <!-- Contact Information -->
    <section class="contact-info">
        <h2 class="text-center"><?php _e('Other Ways to Connect', 'wandering-gorilla'); ?></h2>

        <div class="grid grid-3 mt-lg">
            <div class="route-report-header text-center">
                <h3><?php _e('📧 Direct Email', 'wandering-gorilla'); ?></h3>
                <p><?php _e('For urgent inquiries:', 'wandering-gorilla'); ?></p>
                <a href="mailto:<?php echo antispambot(get_option('admin_email')); ?>" class="route-detail-value">
                    <?php echo antispambot(get_option('admin_email')); ?>
                </a>
            </div>

            <div class="route-report-header text-center">
                <h3><?php _e('📱 Social Media', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Follow the journey:', 'wandering-gorilla'); ?></p>
                <div class="social-links" style="justify-content: center;">
                    <a href="#" class="social-link" aria-label="Instagram">IG</a>
                    <a href="#" class="social-link" aria-label="Twitter">TW</a>
                    <a href="#" class="social-link" aria-label="YouTube">YT</a>
                </div>
            </div>

            <div class="route-report-header text-center">
                <h3><?php _e('📰 Newsletter', 'wandering-gorilla'); ?></h3>
                <p><?php _e('Field reports delivered:', 'wandering-gorilla'); ?></p>
                <a href="#newsletter" class="btn btn-badge">
                    <?php _e('Subscribe', 'wandering-gorilla'); ?>
                </a>
            </div>
        </div>
    </section>

    <div class="section-break"></div>

    <!-- Sponsorship Information -->
    <section class="sponsorship-info">
        <div class="government-form" style="max-width: 800px; margin: 0 auto;">
            <h2 class="text-center"><?php _e('Partnership Opportunities', 'wandering-gorilla'); ?></h2>

            <div class="grid grid-2 mt-lg">
                <div>
                    <h4><?php _e('Sponsored Content', 'wandering-gorilla'); ?></h4>
                    <ul style="list-style: none; padding: 0;">
                        <li class="mb-sm">✓ <?php _e('Authentic gear reviews', 'wandering-gorilla'); ?></li>
                        <li class="mb-sm">✓ <?php _e('Sponsored expedition documentation', 'wandering-gorilla'); ?></li>
                        <li class="mb-sm">✓ <?php _e('Destination partnerships', 'wandering-gorilla'); ?></li>
                        <li class="mb-sm">✓ <?php _e('Social media integration', 'wandering-gorilla'); ?></li>
                    </ul>
                </div>

                <div>
                    <h4><?php _e('Brand Alignment', 'wandering-gorilla'); ?></h4>
                    <ul style="list-style: none; padding: 0;">
                        <li class="mb-sm">✓ <?php _e('Outdoor & adventure brands', 'wandering-gorilla'); ?></li>
                        <li class="mb-sm">✓ <?php _e('Sustainable travel companies', 'wandering-gorilla'); ?></li>
                        <li class="mb-sm">✓ <?php _e('Photography equipment', 'wandering-gorilla'); ?></li>
                        <li class="mb-sm">✓ <?php _e('Conservation organizations', 'wandering-gorilla'); ?></li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-lg">
                <a href="<?php echo esc_url(home_url('/support')); ?>" class="btn btn-primary">
                    <?php _e('View Rate Card & Media Kit', 'wandering-gorilla'); ?>
                </a>
            </div>
        </div>
    </section>

</main><!-- #primary -->

<?php
get_footer();
