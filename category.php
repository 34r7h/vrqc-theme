<div class="clearfix"><?php get_header(); ?></div>
<h1><?php single_cat_title(); ?></h1>
<div class="clearfix">
    <section class="col-sm-8"><?php
while ( have_posts() ) : the_post();
    echo '<a class="col-xs-12 col-sm-6" href="'. get_permalink() .'"><div class="panel panel-default post-list"><h5 class="panel-heading"><i class="fa fa-thumb-tack"></i> ';
        echo the_title().'</h5>';
        echo '<div class="panel-body">'.get_the_post_thumbnail().'</div>';
        echo '</div></a>';
        endwhile;



        // Reset Query
        wp_reset_query();

        ?></section>
    <aside class="col-xs-12 col-sm-4">
        <?php get_search_form(); ?>
        <?php get_sidebar(); ?>
    </aside>
</div>
<div class="clearfix"><?php get_footer(); ?>
</div>