<?php
/**
 * The site's entry point.
 *
 * @package cassiopeia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>

    <?php if ( is_singular() ) {
        get_template_part( 'templates/single' );
        echo '<pre>SINGLE</pre>';
        } elseif ( is_archive() || is_category() || is_home() ) {
        get_template_part( 'templates/archive' );
        echo '<pre>ARCHIVE</pre>';
        } elseif ( is_search() ) {
        get_template_part( 'templates/search' );
        echo '<pre>SEARCH</pre>';
        } else {
        get_template_part( 'templates/404' );
        echo '<pre>404</pre>';
        }
    ?>

<?php 
    get_footer(); 
?>