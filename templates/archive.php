<?php
/**
 * The template for displaying archive pages.
 *
 * @package cassiopeia
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="section">

    <?php if ( is_category() ) { ?>
    <h1><?php _e( 'Category: ', 'cassiopeia' ); single_cat_title(); ?></h1>
    <?php } elseif ( is_archive() ) { ?>
    <h1><?php _e( 'Archives', 'cassiopeia' ); ?></h1>
    <?php } elseif ( is_home() ) { ?>
    <h1><?php _e( 'Blog', 'cassiopeia' ); ?></h1>
    <?php } else { ?>
    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <?php } ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            get_template_part( 'includes/loop-excerpt' );
        endwhile;
            get_template_part('includes/pagination');
        else :
            get_template_part( 'includes/loop-empty' );
        endif;
    ?>

</section><!-- /.section -->