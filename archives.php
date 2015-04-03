<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div class="col-xs-12 col-sm-8 panel panel-default">
    <div id="content" role="main" class="panel-body">

        <?php the_post(); ?>
        <h1 class="panel-heading"><?php the_title(); ?></h1>
        
        <div class="col-xs-12 panel-body">
            <ul>
                <b><?php wp_list_categories(array('exclude'=> '1,2,5,7', 'title_li'=> '')); ?></b>
            </ul>
        </div>

    </div><!-- #content -->
</div><!-- #container -->


<aside class="col-xs-12 col-sm-4">
    <?php get_sidebar(); ?>
</aside>

<hr class="col-xs-12"/>
<?php get_footer(); ?>