<?php
/**
 * The template for displaying search results.
 *
 * @package cassiopeia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 

?>
    
<section class="section">

    <?php if ( have_posts() ) : ?>

    <header>
        <h1><?php _e( 'Search results for:', 'cassiopeia' ); ?> '<?php echo get_search_query(); ?>'</h1>
    </header>

    <?php
        while ( have_posts() ) : the_post();
            get_template_part( 'includes/loop-excerpt' );
        endwhile;
            get_template_part('includes/pagination');
        else :
            get_template_part( 'includes/loop-empty' );
        endif;
    ?>

</section><!-- /.section -->

<?php 
    get_footer(); 
?>