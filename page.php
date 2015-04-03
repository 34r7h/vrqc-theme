<div class="clearfix"><?php get_header(); ?></div>


<div class="clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article class="col-xs-12 col-sm-8" id="content" role="main">
        <div class="panel panel-default"><h2 class="panel-heading"><?php
                $post_id = url_to_postid($url);
                $page = get_post($post_id);
                echo $page->post_title;
        ?></h2><div class="panel-body">
<div class="col-xs-6">        <?php echo get_the_post_thumbnail() ?>
</div>        <p><?php the_content(); ?></p></div></div>
</article>
    <aside class="col-xs-12 col-sm-4">
        <?php get_sidebar(); ?>
    </aside></div>


<?php endwhile; endif; ?>
<hr/>
<?php get_footer(); ?>