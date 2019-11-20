<?php
/**
 * The template for displaying all pages.
 *
 * @package cassiopeia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 

?>

<section class="section">

    <header>
        <h1><?php the_title(); ?></h1>
    </header>

    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'includes/loop-content' );

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