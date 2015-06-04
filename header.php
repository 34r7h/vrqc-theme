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
    <nav class="navbar navbar-default top-nav nomar ">
        <a href="<?php echo get_site_url(); ?>" class="col-xs-12 col-sm-3">
            <img class="hidden-xs navbar-text" src="/wp-content/uploads/2015/05/logo-for-website-transparent.png" alt=""/>
            <img class="visible-xs navbar-btn" src="/wp-content/uploads/2015/05/logo-for-website-transparent.png" alt=""/>
        </a>
        <div class="col-xs-12 col-sm-9" ng-init="nav.pages = [['','home'],['Suites','bed'],['About','info'],['Explore QC','street-view'],['Contact','phone']]">
            <div class="navbar-text col-xs-12 text-center">
                <div class="col-xs-5 col-sm-5">
                    <h3 class="nomar light-text"><i class="fa fa-phone"></i>Booking</h3>
                    <div class="col-xs-12">
                        <div>Fr: <a href="tel:14506790674" class="light-text"><b>1 450 679 0674</b></a></div>
                        <div>En:  <a href="tel:15817773337" class="light-text"><b>1 581 777 3337</b></a> </div>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 nomar nopad">
                    <h3 class="nomar light-text">Concierge</h3>
                    <div class="col-xs-12"> <a href="tel:15817773339" class=" light-text"><b>1 581 777 3339</b></a></div>
                </div>
                <div class="col-xs-2 col-sm-2 nomar nopad"><span class="prisna pull-right"></span></div>
            </div>
            <div class="col-xs-12 col-sm-11 pull-right">
                <span class="nopad nomar noborderrad navbar-btn btn-group btn-group-justified">
                    <div ng-repeat="(key,page) in nav.pages" type="button" class="menunav btn btn-success shadow">
                        <a ng-mouseenter="$parent.suitesDropdown[page[0]] = !$parent.suitesDropdown[page[0]]" ng-c="$parent.suitesDropdown[page[0]] = !$parent.suitesDropdown[page[0]]" ng-href="<?php echo get_site_url(); ?>/{{page[0]}}" class="fa fa-{{page[1]}} col-xs-12 nopad nomar">
                            <b class="">{{page[0]}}</b>
                        </a>
                    </div>
                </span>
                <div ng-mouseleave="suitesDropdown['Suites']=false;" ng-if="suitesDropdown['Suites']" class="btn-group btn-group-vertical nopad" style="position: absolute; width: 75%; top: 1.6em; z-index: 99999; left:21%">
                    <a ng-href="{{property.url}}" class="text-left btn btn-default " ng-repeat="property in vrqc.propertyPosts.posts" style="height:37px">
                        <img class="col-xs-1 nopad nomar" width="100%" ng-src="{{property.thumbnail}}">
                        <div class="col-xs-9 text-left">{{property.title}}</div>
                        <div class="text-left pull-left">{{property.custom_fields.roomcount[0]}} br</div>


                    </a>
                </div>

            </div>
        </div>
    </nav>
</header>