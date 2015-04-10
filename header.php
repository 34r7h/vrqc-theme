<!DOCTYPE html>

<html <?php language_attributes(); ?> ng-app="vrqc" ng-init="$root.siteUrl = '<?php echo get_site_url(); ?>'">
<head>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vacation rental properties in Quebec City, Canada. On VRBO, Home Away, and AirBnB">
    <meta name="keywords" content="quebec city, vacation, vacation rentals, property rentals, holiday, canada, quebec">
    <meta name="author" content="Vacation Rentals Quebec City
    ">
    <?php wp_head(); ?>

</head>
<body ng-controller="vrqcPropCtrl">
<!--==============================header=================================-->
<header class="clearfix">
    <nav class="navbar navbar-default navbar-fixed-top top-nav">
        <div class="col-xs-12">
            <a class="navbar-left navbar-text" href="<?php echo get_site_url(); ?>">
                <img class="pull-left" style="width: 40px; height: auto;" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
                <span style="font-size: 1.3em" class="nav-brand">Vacation Rentals Quebec City</span>
            </a>
            <a class="navbar-left navbar-text" target="new" class="location" href="<?php echo get_site_url(); ?>">
            </a>
            <a href="tel:15817776339" class="navbar-right btn btn-default navbar-btn btn-lg phone" >
                <i class="fa fa-phone "> <span class="hidden-xs">+01-581-777-6339</span></i>&nbsp;
            </a>
        </div>

    </nav>
    <br/>
    <nav class="navbar navbar-default">
        <br/>

            <!-- Brand and toggle get grouped for better mobile display -->
            <ul class="navbar-header col-xs-12 col-sm-7">
                <h1 class="col-xs-12 tagline">We strive to provide a most uniquely Quebecois experience!</h1>
                <div class="col-xs-12 btn-group btn-group-justified" ng-init="nav.pages = ['Home','About','Properties','Contact','Blog']">
                    <a ng-repeat="(key,page) in nav.pages" ng-href="<?php echo get_site_url(); ?>/{{page}}" type="button" class="menunav btn btn-success shadow">{{page}}</a>
                </div>
<!--
                    <?php wp_nav_menu( array( 'items_wrap' => '<a id="%1$s" class="%2$s">%3$s</a>', 'depth' => 0) ); ?>
-->
            </ul>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="col-xs-12 col-sm-5 navbar-right">
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

    <nav class="navbar navbar-default navbar-fixed-bottom bottom-nav">
        <div class="col-xs-12">
            <span class="btn btn-group">
                <a class="btn btn-default navbar-btn navbar-left btn-lg" href="mailto:quebeccityreservations@gmail.com">
                    <i class="fa fa-envelope"> <span class="hidden-xs">Email</span></i>
            </a>
            <a class="btn btn-default navbar-btn navbar-left btn-lg" target="new" href="https://www.facebook.com/pages/Vacation-Rentals-Quebec-City/188400344615871">
                    <i class="fa fa-facebook-official"> <span class="hidden-xs">Facebook</span></i>
            </a></span>
            <span class="navbar-right">
                <p class="navbar-text" ng-if="getDate"> &copy; <span>{{getDate | date: 'yyyy'}}</span> <span class="hidden-xs hidden-sm">Vacation Rentals Quebec City</span> &nbsp; </p>

            <p ng-if="vrqc.weather.temperature_string" class="weather navbar-text" style="font-size: 120%" >
                <img style="height: 25px; width: auto" ng-src="{{vrqc.weather.icon_url}}" alt="quebec city weather from vacationrentalsquebeccity.com"/>
                <span>{{vrqc.weather.weather}}&nbsp;</span>
                <span>{{vrqc.weather.temperature_string}}&nbsp; </span>
            </p></span>

        </div>

    </nav>
</header>