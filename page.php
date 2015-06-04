<div class="clearfix"><?php get_header(); ?></div>


<div class="clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article class="col-xs-12" id="content" role="main">
        <div class="panel panel-dark">
            <div class="panel-heading light-text">
                <h2><?php
                $post_id = url_to_postid($url);
                $page = get_post($post_id);
                echo $page->post_title;
                ?></h2>
            </div>
            <div class="panel-body">
                <div class="col-xs-6">
                    <?php echo get_the_post_thumbnail() ?>
                </div>
                <p><?php the_content(); ?></p>
            </div>
        </div>
    </article>
    </div>


<?php endwhile; endif; ?>
<div class="clearfix"><?php get_footer(); ?></div>