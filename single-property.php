<div class="clearfix">
    <?php get_header(); ?>
</div>
<div class="clearfix">
    <article class="col-xs-6 col-sm-7 col-sm-offset-1 property">
        <div class="panel panel-default">
            <h1 class="panel-heading">
                <i class="fa fa-home">
                    <?php
                    $property_id = url_to_postid($url);
                    $property = get_post($property_id);
                    echo $property->post_title;
                    ?>
                </i>
            </h1>
            <div ng-init="sliderImage=imageList[0].url; sliderAlt = imageList[0].alt; sliderIndex = 0" class="property-featured">
                <!-- <?php echo get_the_post_thumbnail(); ?> -->
                <img style="height: 400px" width="auto" ng-src="{{sliderImage || imageList[0].url}}" alt="{{sliderAlt || imageList[0].alt}}"/>
                <button ng-show="sliderIndex>0" ng-click="sliderIndex=sliderIndex-1; sliderImage=imageList[sliderIndex].url; sliderAlt = imageList[sliderIndex].alt; sliderIndex = sliderIndex"> < </button>
                <button ng-show="sliderIndex<imageList.length" ng-click="sliderIndex=sliderIndex+1; sliderImage=imageList[sliderIndex].url; sliderAlt = imageList[sliderIndex].alt; sliderIndex = sliderIndex"> > </button>
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 nopad" ng-repeat="img in imageList track by $index">
                    <img ng-show="!$parent.gallery[$index]" ng-src="{{img.url}}" alt="{{img.alt}}" class="col-xs-2 smallpad" ng-click="$parent.sliderImage=img.url; $parent.sliderAlt=img.alt; $parent.sliderIndex=$index"/>
                    <hr ng-if="($index+1) % 4 === 0" class="col-xs-12"/>
                </div>
                <hr/>
            </div>
            <br/>
            <div ng-init="show.propertySection='Overview'" class="col-xs-12 btn-group btn-group-justified">
                <a ng-repeat="(key, section) in nav.property" ng-click='$parent.show.propertySection={}; $parent.show.propertySection=section' type="button" class="btn btn-success shadow">{{section}}</a>
            </div>
            <hr/>


            <div class="panel-body">
                <div class="col-xs-12 well">
                    <div class="table-responsive"><table class="table">
                        <tr><th>Rooms</th><th>Sleeps</th><th>Bathrooms</th></tr>
                        <tr>
                            <td>
                                <?php $meta = get_post_meta( get_the_ID(), 'roomcount' ); echo $meta[0] ?>
                            </td>

                            <td>
                                <?php $meta = get_post_meta( get_the_ID(), 'sleeps' ); echo $meta[0] ?>
                            </td>
                            <td>
                                <?php $meta = get_post_meta( get_the_ID(), 'bathrooms' ); echo $meta[0] ?>
                            </td>
                        </tr>

                    </table></div>
                </div>
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
                    <h2>Photos</h2>
                    <hr/>
                    <div ng-repeat="img in imageList track by $index">
                        <img ng-show="$parent.gallery[$index]" ng-src="{{img.url}}" alt="{{img.alt}}" ng-style="fullSize={width:'100%',padding:'.5em 0'}" ng-click="$parent.gallery[$index]=!$parent.gallery[$index];"/>
                        <img ng-show="!$parent.gallery[$index]" ng-src="{{img.url}}" alt="{{img.alt}}" class="col-xs-3 smallpad" ng-click="$parent.gallery = {}; $parent.gallery[$index]=!$parent.gallery[$index];"/>
                        <hr ng-if="($index+1) % 4 === 0" class="col-xs-12"/>
                    </div>

                </div>
                <div ng-show="show.propertySection ==='Overview' || show.propertySection ==='Reviews'" class="col-xs-12 well">
                    <h2>Reviews</h2>
                    <hr/>
                    <?php comments_template('/property-comments.php'); ?>

                </div>

            </div>
        </div>
    </article>
    <aside class="col-xs-6 col-sm-4" style="padding-top: 1em;">
        <?php get_sidebar('property'); ?>
    </aside>
</div>
<hr/>
<div class="clearfix">
    <?php get_footer(); ?>
</div>

