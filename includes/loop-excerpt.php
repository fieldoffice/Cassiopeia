<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail()) : ?>
        <figure>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail(array(120,120)); ?>
            </a>
        </figure>
    <?php endif; ?>

    <header>
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

        <div class="meta">
            <span class="meta__date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
            <span class="meta__author"><?php _e( 'Published by', 'cassiopeia' ); ?> <?php the_author_posts_link(); ?></span>
            <span class="meta__comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave a comment', 'cassiopeia' ), __( '1 Comment', 'cassiopeia' ), __( '% Comments', 'cassiopeia' )); ?></span>
            <span class="meta__tags"><?php the_tags( 'Post tags: ', ', ', '' ); ?></span>
            <span class="meta__categories"><?php _e( 'Categories: ', 'cassiopeia' ); ?>
            <?php
                $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                }
                echo trim( $output, $separator );
                }
            ?>
            </span>
            <?php edit_post_link(); ?>
        </div>

    </header>

    <?php the_excerpt(); ?>

</article>