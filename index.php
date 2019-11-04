<?php get_header(); ?>

<section div class="section">

    <?php if ( have_posts() ) : ?>

    <header>
        <h1><?php _e( 'Latest Posts', 'cassiopeia' ); ?></h1>
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
    get_sidebar();
    get_footer(); 
?>