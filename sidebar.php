<!-- SIDEBAR START -->
<aside class="sidebar" role="complementary">

    <?php get_template_part( 'includes/search' ); ?>

    <div class="sidebar__widget">
        <?php if(!function_exists('cassiopeia_sidebar') || !dynamic_sidebar('sidebar-widget-1')) ?>
    </div>

</aside><!-- /.seidebar -->
<!-- SIDEBAR END -->
