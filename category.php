<div class="clearfix"><?php get_header(); ?></div>
<h1><?php single_cat_title(); ?></h1>
<div class="clearfix">
    <section class="col-xs-12"><?php
while ( have_posts() ) : the_post();
    echo '<a class="col-xs-6 col-sm-4 col-md-3" href="'. get_permalink() .'"><div class="panel panel-dark post-list"><div class="panel-heading"><i class="fa fa-thumb-tack fa-2x"></i> ';
        echo the_title().'</div>';
        echo '<div class="panel-body">'.get_the_post_thumbnail().'</div>';
        echo '</div></a>';
        endwhile;



        // Reset Query
        wp_reset_query();

        ?></section>

</div>
<div class="clearfix"><?php get_footer(); ?>
</div>