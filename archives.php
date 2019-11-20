<?php
/**
 * The template for displaying archive pages.
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
            get_template_part( 'includes/loop-excerpt' );
        endwhile;
            get_template_part('includes/pagination');
        endif;
    ?>

</section><!-- /.section -->

<?php
    get_footer(); 
?>