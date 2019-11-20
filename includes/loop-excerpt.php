<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail()) : ?>
        <figure>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail(array(120,120)); ?>
            </a>
        </figure>
    <?php endif; ?>

    <header>

        <?php if ( is_archive() ) { ?>
        <h1><?php _e( 'Archives', 'cassiopeia' ); ?></h1>
        <?php } elseif ( is_category() ) { ?>
        <h1><?php _e( 'Category archives: ', 'cassiopeia' ); single_cat_title(); ?></h1>
        <?php } else { ?>
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <?php endif; ?>

        <div class="meta">
            <span class="meta__date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
            <span class="meta__author"><?php _e( 'Published by', 'cassiopeia' ); ?> <?php the_author_posts_link(); ?></span>
            <span class="meta__comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave a comment', 'cassiopeia' ), __( '1 Comment', 'cassiopeia' ), __( '% Comments', 'cassiopeia' )); ?></span>
            <?php edit_post_link(); ?>
        </div>

    </header>

</article>