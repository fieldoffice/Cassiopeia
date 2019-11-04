<article>

    <?php if ( is_search() ) : ?>

    <h2><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cassiopeia' ); ?></h2>

    <?php else : ?>

        <h2><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cassiopeia' ); ?></h2>

    <?php endif; ?>

</article>