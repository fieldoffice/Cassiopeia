<?php
/**
 * The template for displaying the site header.
 *
 * @package cassiopeia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <!-- META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="">
        <meta name="copyright" content="">
        <meta name="robots" content="index, follow">
        <meta name="HandheldFriendly" content="true">
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <link rel="author" type="text/plain" href="/humans.txt">
        <link rel="manifest" href="/manifest.json">

        <!-- FAVICONS -->
        <link href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/icons/touch.png" rel="apple-touch-icon-precomposed">

        <!-- PREFETCH -->
        <link href="//fonts.googleapis.com" rel="dns-prefetch">
        <link href="//www.google-analytics.com" rel="dns-prefetch">

        <!-- WEB FONTS -->

         <!-- CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.min.css" media="screen">
        
        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'cassiopeia' ); ?></a>

    <!-- HEADER START -->
    <header class="header" role="banner">

        <div class="logo">
            <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div><!-- /.logo -->

        <nav class="nav" role="navigation">
            <?php cassiopeia_nav(); ?>
        </nav><!-- /.nav -->

    </header><!-- /.header -->
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <main id="content" role="main">
