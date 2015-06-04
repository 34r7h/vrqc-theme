<?php
if(in_category(7) || get_post_type() == 'easy-rooms') {
get_header('property');
include 'single-property.php';
get_footer();
} else {
?>

<div class="clearfix"><?php

get_header();
?></div>
<div class="clearfix container-fluid"><article class="col-xs-12 " id="content" role="main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h2><i class="fa fa-thumb-tack"> <?php the_title(); ?></i></h2></div>
        <div class="panel-body"><?php echo get_the_post_thumbnail() ?></div>

        <div class="panel-footer">
            <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
            <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-xs-6 col-sm-6">
            <i class="fa fa-arrow-left"> Previous Entry</i>
            <p>
                <?php previous_post_link( '%link' ); ?>
            </p>
        </div>
        <div class="col-xs-6 col-sm-6 text-right">
            Next Entry <i class="fa fa-arrow-right"></i>
            <p>
                <?php next_post_link( '%link'); ?>
            </p>
        </div>
    </div>
</article>
    <aside class="col-xs-12 col-sm-4 col-sm-offset-1" style="padding-top: 1em;">
        <?php get_sidebar(); ?>
    </aside></div>


<?php endwhile; else: ?>
<?php endif; ?>
<div class="clearfix"><?php get_footer(); ?>
</div><?php } ?>