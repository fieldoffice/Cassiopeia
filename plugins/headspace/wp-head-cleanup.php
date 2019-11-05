<?php
/*
    Plugin Name: Headspace
    Plugin URI: https://fieldoffice.co.uk
    Description: Removes unwanted links output from wp-head
    Version: 1.0.0
    Author: Andy Field
    Author URI: https://fieldoffice.co.uk
*/

// Remove unwanted links

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

// Disable emojis

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Disable smilies

register_activation_hook( __FILE__, function(){ update_option( 'use_smilies', false ); } );
register_deactivation_hook( __FILE__, function(){ update_option( 'use_smilies', true ); } );