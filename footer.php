</div><!-- #content -->

<footer id="site-footer">
    <div class="footer-content">
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer-widget-area')) : ?>
                <?php dynamic_sidebar('footer-widget-area'); ?>
            <?php endif; ?>
        </div><!-- .footer-widgets -->
        <div class="footer-info">
            <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'my-minimal-theme'); ?></p>
        </div><!-- .footer-info -->
    </div><!-- .footer-content -->
</footer><!-- #site-footer -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?php wp_footer(); ?>

</body>

</html>