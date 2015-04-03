<!DOCTYPE html>


<html <?php language_attributes(); ?> ng-app="vrqc" ng-init="$root.siteUrl = '<?php echo get_site_url(); ?>'">
<head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <?php wp_head(); ?>

</head>
<body ng-controller="vrqcPropCtrl">
<!--==============================header=================================-->
<header class="clearfix">
    <nav class="navbar navbar-default navbar-fixed-top top-nav">
        <div class="col-xs-12">
            <a class="pull-left navbar-text" href="<?php echo get_site_url(); ?>">
                <img class="pull-left" style="width: 40px; height: auto;" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
                <span style="font-size: 1.3em" class="nav-brand">Vacation Rentals Quebec City</span>
            </a>
            <a class="pull-left navbar-text" target="new"  href="<?php echo get_site_url(); ?>">
            </a>
            <div class="pull-right" >
                <a href="tel:15817776339" class="fa fa-phone phone btn btn-default navbar-btn"> <span style="font-size: 120%" class="hidden-xs">+01-581-777-6339</span></a>
            </div>
        </div>

    </nav>
    <hr/>
    <nav class="navbar navbar-default">
        <br/>

            <!-- Brand and toggle get grouped for better mobile display -->
            <ul class="navbar-header col-xs-12 col-sm-7">
                <h1 class="col-xs-12 text-center tagline">We strive to provide a most uniquely Quebecois experience!</h1>
                <div class="col-xs-12 btn-group btn-group-justified" ng-init="nav.pages = ['Home','About','Properties','Contact','Blog']">
                    <a ng-repeat="(key,page) in nav.pages" ng-href="<?php echo get_site_url(); ?>/{{page}}" type="button" class="btn btn-default">{{page}}</a>
                </div>
<!--
                    <?php wp_nav_menu( array( 'items_wrap' => '<a id="%1$s" class="%2$s">%3$s</a>', 'depth' => 0) ); ?>
-->
            </ul>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="col-xs-12 col-sm-5 pull-right">
                <div class="featured-offer">
                    <?php
                $cat_id = 5; //the certain category ID
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
                    if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
                    <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
                    <?php endwhile; endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
    </nav>
    <br/>

    <nav class="navbar navbar-default navbar-fixed-bottom bottom-nav">
        <div class="col-xs-12">
            <a class="pull-left navbar-text" href="mailto:quebeccityreservations@gmail.com">
                <button class="btn btn-default">
                    <i style="font-size: 120%" class="fa fa-envelope"> <span class="hidden-xs">Email</span></i>
                </button>
            </a>
            <a class="pull-left navbar-text" target="new" href="https://www.facebook.com/pages/Vacation-Rentals-Quebec-City/188400344615871">
                <button class="btn btn-default">
                    <i style="font-size: 120%" class="fa fa-facebook-official"> <span class="hidden-xs">Facebook</span></i>
                </button>
            </a>
            <div class="weather pull-right navbar-text" style="font-size: 120%" >
                <img style="height: 25px; width: auto" ng-src="{{vrqc.weather.icon_url}}" alt=""/>
                <b> {{vrqc.weather.weather}}</b>
                <span>{{vrqc.weather.temperature_string}}</span>
            </div>
        </div>

    </nav>
</header>