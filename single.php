<?php
/**
 * The template for displaying singular post-types.
 *
 * @package cassiopeia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 

?>
    
    <section class="section">

        <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'includes/loop-single' );

                // Load comment template if open or has comments.
                if ( comments_open() || get_comments_number() ) {
                        comments_template();
                }
            endwhile;
        ?>
        
    </section><!-- /.section -->

<?php 
    get_footer(); 
?>