<?php
/**
 * The template for displaying the site footer.
 *
 * @package cassiopeia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
        </main>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
        <footer class="footer" role="contentinfo">

            <p class="copyright">
                &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
            </p>

        </footer>
        <!-- FOOTER END -->

        <?php wp_footer(); ?>

    </body>
</html>
