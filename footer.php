    </div><!-- .container -->
</div><!-- #content -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-content">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <div class="footer-logo"><?php bloginfo('name'); ?></div>
                    <p><?php bloginfo('description'); ?></p>
                    <p><?php _e('A field journal of the slow road, the small workshop, and the long view from a parked van.', 'wandering-gorilla'); ?></p>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <h4><?php _e('Departments', 'wandering-gorilla'); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-3')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <h4><?php _e('Write In', 'wandering-gorilla'); ?></h4>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Instagram" title="Follow on Instagram">
                            <span>IG</span>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter" title="Follow on Twitter">
                            <span>TW</span>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube" title="Subscribe on YouTube">
                            <span>YT</span>
                        </a>
                        <a href="<?php echo esc_url(get_feed_link()); ?>" class="social-link" aria-label="RSS Feed" title="Subscribe to RSS Feed">
                            <span>RSS</span>
                        </a>
                    </div>
                    <p class="mt-md">
                        <a href="<?php echo esc_url(home_url('/support')); ?>" class="btn btn-badge">
                            <?php _e('Support the Journal', 'wandering-gorilla'); ?>
                        </a>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p>
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                <?php _e('All rights, modestly, reserved.', 'wandering-gorilla'); ?>
                <?php
                printf(
                    __('Powered by <a href="%s" rel="nofollow">WordPress</a>', 'wandering-gorilla'),
                    'https://wordpress.org'
                );
                ?>
            </p>
            <p class="vintage-stamp"><?php _e('Set in Bodoni Moda &amp; Libre Caslon Text &middot; Department titles in Oswald', 'wandering-gorilla'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
