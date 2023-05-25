<?php
/**
 * The footer template file
 */
?>

    </div><!-- #content -->

    <footer id="site-footer">
        <div class="footer-content">
            <div class="footer-widgets">
                <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-widget-area' ); ?>
                <?php endif; ?>
            </div><!-- .footer-widgets -->
            <div class="footer-info">
                <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'my-minimal-theme' ); ?></p>
            </div><!-- .footer-info -->
        </div><!-- .footer-content -->
    </footer><!-- #site-footer -->

    <?php wp_footer(); ?>

</body>
</html>
