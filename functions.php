<?php
/*
    * Author: Andy Field | @fieldoffice
    * URL: http://fieldoffice.co.uk
    
    * Cassiopeia theme functions and definitions
    * Sets up the theme and provides some helper functions, which are used in the
    * theme as custom template tags. Others are attached to action and filter
    * hooks in WordPress to change core functionality.
*/

// Remove actions

remove_action( 'wp_head', 'wlwmanifest_link' ); //  Remove link to Windows Live Writer manifest file <link rel="wlwmanifest" type="application/wlwmanifest+xml">
remove_action( 'wp_head', 'wp_generator' ); // Remove <meta name="generator" content="WordPress {version}">
remove_action( 'wp_head', 'rsd_link' ); // Remove the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // Remove the shortlink
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); // Remove api.w.org relation links
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 ); // Remove api.w.org relation links
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 ); // Remove api.w.org relation links
remove_action( 'wp_head', 'feed_links', 2 ); // Remove the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Remove the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'index_rel_link' ); // Remove the index post relational link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Remove the previous post relational link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Remove the start post relational link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Remove the adjacent post relational links
// remove_action('wp_head', 'rel_canonical'); // Remove the canonical link

// Disable emojis

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'emoji_svg_url', function(){ return false; } );

// Disable smilies

register_activation_hook( __FILE__, function(){ update_option( 'use_smilies', false ); } );
register_deactivation_hook( __FILE__, function(){ update_option( 'use_smilies', true ); } );

// Sidebars

add_filter( 'widget_text', 'do_shortcode' ); // Allow shortcodes in the sidebar
add_filter( 'widget_text', 'shortcode_unautop' ); // Remove <p> tags from sidebars

// Disable auto insertion of <p> tags

remove_filter( 'the_excerpt', 'wpautop' );
// remove_filter( 'the_content', 'wpautop' );

// Menus

register_nav_menus( array(
    'primary-menu' => __( 'Primary Menu', 'cassiopeia' ),
    'footer-menu' => __( 'Footer Menu', 'cassiopeia' ),
    'sidebar-menu' => __( 'Sidebar Menu', 'cassiopeia' )
));

// Thumbnails

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Sidebars

if (function_exists( 'cassiopeia_sidebar' )) {
    register_sidebar(array(
        'name' => __('Sidebar Widget 1', 'cassiopeia'),
        'description' => __('Description for this widget', 'cassiopeia'),
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'  =>  '</h3>'
    ));
}

// Remove Gutenberg block CSS

function disable_gutenberg_block_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'disable_gutenberg_block_css', 999 );

// Replace "Powered by Wordpress" H1 on login page

add_filter( 'login_headerurl', function(){ return home_url(); });
add_filter( 'login_headertext', function(){ return get_bloginfo( 'name', 'display' ); });

// Send system emails from admin email and blog name

add_filter( 'wp_mail_from', function($email){
    if( substr($email,0,10) === 'wordpress@')
        $email = get_option('admin_email');
    return $email;
});
add_filter( 'wp_mail_from_name', function($name){
    if($name === 'WordPress')
        $name = str_replace( '&#039;', "'", get_option('blogname') );
    return $name;
});

// Pagination for paged posts. Includes pages and next and previous links.

function cassiopeia_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom gravatar in settings > discussion

function cassiopeia_gravatar ($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/assets/icons/gravatar.png';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Custom Excerpts

// function cassiopeia_index($length) {
//     return 20;
// }

// function cassiopeia_custom_post($length) {
//     return 40;
// }

// function cassiopeia_excerpt($length_callback = '', $more_callback = '') {
//     global $post;
//     if (function_exists($length_callback)) {
//         add_filter('excerpt_length', $length_callback);
//     }
//     if (function_exists($more_callback)) {
//         add_filter('excerpt_more', $more_callback);
//     }
//     $output = get_the_excerpt();
//     $output = apply_filters('wptexturize', $output);
//     $output = apply_filters('convert_chars', $output);
//     $output = '<p>' . $output . '</p>';
//     echo $output;
// }

// Comments

function cassiopeia_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }