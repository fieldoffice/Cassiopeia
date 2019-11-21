<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( has_post_thumbnail()) : ?>
        <figure>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail(array(120,120)); ?>
            </a>
        </figure>
    <?php endif; ?>
    
    <header>
        <h1><?php the_title(); ?></h1>
    </header>

    <?php
        if ( ! has_excerpt() ) {
        echo '';
        } else { 
        the_excerpt();
        }
    ?>

    <?php the_content(); ?>
    
</article>
