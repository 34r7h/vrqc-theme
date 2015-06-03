<div class="clearfix">
    <?php get_header(); ?>
</div>

<div class="clearfix">
    <article class="col-xs-12 col-sm-8 property nopad nomar">

        <div class="panel panel-default noborderrad">
            <div class="panel-heading">
                <h1 class="fa-home">
                    <i class="fa fa-bed"> </i>
                    <?php
                    $property_id = url_to_postid($url);
                    $property = get_post($property_id);
                    echo $property->post_title;
                    ?>
                </h1>
                <div class="table-responsive">
                    <table class="table nomar">
                        <tr>
                            <th class="text-center"><i class="fa fa-cube"></i> <?php $meta = get_post_meta( get_the_ID(), 'roomcount' ); echo $meta[0] ?> Bedrooms</th>
                            <th class="text-center"><i class="fa fa-bed"></i> Sleeps <?php $meta = get_post_meta( get_the_ID(), 'sleeps' ); echo $meta[0] ?></th>
                            <th class="text-center"><i class="fa fa-toggle-down"></i> <?php $meta = get_post_meta( get_the_ID(), 'bathrooms' ); echo $meta[0] ?> Bathrooms</th>
                        </tr>
                    </table>
                </div>
            </div>

            <div ng-init="sliderImage=imageList[0].url; sliderAlt = imageList[0].alt; sliderIndex = 0" class="property-featured">
                <!-- <?php echo get_the_post_thumbnail(); ?> -->
                <div class="pull-right" style="position:relative; height:0; top:40px; right:8px;">
                    <div class="btn-group btn-group-lg">
                    <a class="btn btn-default fa fa-2x fa-arrow-circle-o-left" ng-show="sliderIndex>0" ng-click="sliderIndex=sliderIndex-1; sliderImage=imageList[sliderIndex].url; sliderAlt = imageList[sliderIndex].alt; sliderIndex = sliderIndex"></a>
                    <a class="btn btn-default fa fa-2x fa-arrow-circle-o-right" ng-show="sliderIndex<imageList.length" ng-click="sliderIndex=sliderIndex+1; sliderImage=imageList[sliderIndex].url; sliderAlt = imageList[sliderIndex].alt; sliderIndex = sliderIndex"></a></div>
                </div>
                <div class="gallery" >
                    <img style="vertical-align: top; height: 100%" width="100%" ng-src="{{sliderImage || imageList[0].url}}" alt="{{sliderAlt || imageList[0].alt}}"/>
                </div>
                <div class="col-xs-12"><div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 nopad" ng-repeat="img in imageList track by $index">
                    <img style="max-height: 50px" ng-show="!$parent.gallery[$index]" ng-src="{{img.url}}" alt="{{img.alt}}" class="col-xs-2 smallpad" ng-click="$parent.sliderImage=img.url; $parent.sliderAlt=img.alt; $parent.sliderIndex=$index"/>
                </div></div>
            </div>


            <div ng-init="show.propertySection='Overview'" class="col-xs-12">
                <hr/>
                <div class="btn-group btn-group-justified"><a ng-repeat="(key, section) in nav.property" ng-click='$parent.show.propertySection={}; $parent.show.propertySection=section' type="button" class="menunav btn btn-success shadow">{{section}}</a></div>
                <br/>
            </div>


            <div class="panel-body">

                <div ng-show="show.propertySection ==='Overview'" class="col-xs-12 well">
                    <h2>Overview</h2>
                    <hr/>
                    <?php echo the_content(); ?>
                    <hr/>
                    <h4>Property Type</h4>hr
                    <?php $meta = get_post_meta( get_the_ID(), 'type' ); echo $meta[0] ?>
                    <hr/>
                    <h4>Meals</h4>
                    <?php $meta = get_post_meta( get_the_ID(), 'meals' ); echo $meta[0] ?>
                    <hr/>
                    <h4>Amenities</h4>
                    <?php $meta = get_post_meta( get_the_ID(), 'amenities' ); echo $meta[0] ?>
                    <hr/>
                    <h4>Suitability</h4>
                    <?php $meta = get_post_meta( get_the_ID(), 'suitability' ); echo $meta[0] ?>
                    <hr/>
                    <h4>Entertainment</h4>
                    <?php $meta = get_post_meta( get_the_ID(), 'entertainment' ); echo $meta[0] ?>
                    <hr/>
                    <h4>Kitchen</h4>
                    <?php $meta = get_post_meta( get_the_ID(), 'kitchen' ); echo $meta[0] ?>
                </div>
                <div ng-show="show.propertySection ==='Overview' || show.propertySection ==='Rates'" class="col-xs-12 well">
                    <h2>Rates</h2>
                    <hr/>
                    <p>Peak season runs Apr 1 - Nov 1</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td></td>
                                <th>Off Peak</th>
                                <th>Peak</th>
                            </tr>
                            <tr>
                                <th>Nightly</th>
                                <td>
                                    $<?php $meta = get_post_meta( get_the_ID(), 'off-peak-night' ); echo $meta[0] ?>
                                </td>
                                <td>
                                    $<?php $meta = get_post_meta( get_the_ID(), 'peak-night' ); echo $meta[0] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Weekly</th>
                                <td>
                                    $<?php $meta = get_post_meta( get_the_ID(), 'off-peak-week' ); echo $meta[0] ?>
                                </td>
                                <td>
                                    $<?php $meta = get_post_meta( get_the_ID(), 'peak-week' ); echo $meta[0] ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <p>
                        <?php $meta = get_post_meta( get_the_ID(), 'rate-info' ); echo $meta[0] ?>
                    </p>
                </div>
                <div ng-show="show.propertySection ==='Overview' || show.propertySection ==='Location'" ng-init="loc.address='779+Côte+de+la+Citadelle,+Quebec+City,+QC,+Canada'; loc.src = $sce.trustAsHtml('http://www.google.com/maps/embed/v1/place?q='+ loc.address +'&key=AIzaSyBOX888m2mY9tbI1PgtJcgGvb7KsjTxTzE')" class="col-xs-12 well ">
                    <h2>Location</h2>
                    <hr/>
                    <div ng-if="vrqc.postData.post.custom_fields.address[0]" ng-init="mapSrc = vrqc.trust('https://www.google.com/maps/embed/v1/place?q=' + vrqc.postData.post.custom_fields.address[0] + '&key=AIzaSyBOX888m2mY9tbI1PgtJcgGvb7KsjTxTzE')" class="google-maps">
                        <iframe width="600" height="450" frameborder="0" style="border:0" ng-src="{{mapSrc}}"></iframe>
                    </div>                      <!--<iframe
                            width="600"
                            height="450"
                            frameborder="0"
                            style="border:0"
                            ng-src="{{loc.src}}">

                    </iframe>-->
                </div>
                <div ng-show="show.propertySection ==='Overview' || show.propertySection ==='Photos'" class="col-xs-12 well">
                    <?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
                    <?php if( $attachments->exist() ) : ?>
                    <div ng-init="imageList = []">
                        <?php while( $attachment = $attachments->get() ) : ?>
                        <?php $alt = $attachments->field('title'); ?>
                        <div ng-init="vrqc.addToArray(imageList, {url:'<?php echo $attachments->url(); ?>', alt:'<?php echo $alt; ?>'});"></div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>

                </div>
                <div ng-show="show.propertySection ==='Overview' || show.propertySection ==='Reviews'" class="col-xs-12 well">
                    <h2>Reviews</h2>
                    <hr/>
                    <?php comments_template('/property-comments.php'); ?>

                </div>

            </div>
        </div>
    </article>
    <aside class="col-xs-12 col-sm-4 light-text">
        <?php get_sidebar('property'); ?>
    </aside>
</div>
<div class="clearfix">
    <?php get_footer(); ?>
</div>

