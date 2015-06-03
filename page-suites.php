<div class="clearfix">
    <?php get_header(); ?>
</div>
<div>
    <div class="">
        <section class="noborderrad">
            <h3 class="col-xs-12 light-text">
                Short Term Rentals <em class="small"></em>
            </h3>
            <div class="container-fluid">
                <div ng-repeat="(key,roomCount) in index.propertyPostsByRoomcount" ng-show="roomCount.length > 0"
                     class="">
                    <div class="panel panel-dark">

                        <div class="panel-body">
                            <div class="col-xs-12" ng-repeat="property in roomCount"
                                 ng-if="property.custom_fields.term[0] === 'short'">
                                <div class="col-xs-4 col-sm-2">
                                    <img ng-src="{{property.thumbnail}}">
                                </div>
                                <div class="hidden-xs col-sm-7">
                                    <a class="red-text" ng-href="{{property.url}}">
                                        <h2>{{property.title}}</h2>
                                    </a>
                                    <i class="fa fa-lg fa-cube col-sm-4"> Bedrooms: <b>{{property.custom_fields.roomcount[0]}}</b>
                                    </i>
                                    <i class="fa  fa-lg fa-toggle-down col-sm-4"> Bathrooms: <b>{{property.custom_fields.bathrooms[0]}}</b>
                                    </i>
                                    <i class="fa fa-lg fa-bed col-sm-4"> Sleeps: <b>{{property.custom_fields.sleeps[0]}}</b>
                                    </i>

                                </div>
                                <div class="col-xs-8 col-sm-3 text-center">
                                    <a class="red-text visible-xs" ng-href="{{property.url}}">
                                        <h2>{{property.title}}</h2>
                                    </a>
                                    <i class="fa fa-dollar fa-2x"> {{property.custom_fields.reservations_groundprice[0]}} </i>
                                    <div class="small">
                                        <b>Per night. CAD</b>
                                        <div ng-if="property.custom_fields.term[0]==='short'">2 Night Min.</div>
                                        <div ng-if="property.custom_fields.term[0]==='long'">30 Night Min.</div>
                                    </div>
                                    <a href="" class="btn btn-default col-xs-12 nomar">Book</a>
                                </div>
                                <hr class="col-xs-12" style="opacity:.21"/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <h3 class="col-xs-12 light-text">
                Long Term Rentals <em class="small"></em>
            </h3>
            <div class="container-fluid">
                <div ng-repeat="(key,roomCount) in index.propertyPostsByRoomcount" ng-show="roomCount.length > 0"
                     class="">
                    <div class="panel panel-dark">

                        <div class="panel-body">
                            <div class="col-xs-12" ng-repeat="property in roomCount"
                                 ng-if="property.custom_fields.term[0] === 'long'">
                                <div class="col-xs-4 col-sm-2">
                                    <img ng-src="{{property.thumbnail}}">
                                </div>
                                <div class="hidden-xs col-sm-7">
                                    <a class="red-text" ng-href="{{property.url}}">
                                        <h2>{{property.title}}</h2>
                                    </a>
                                    <i class="fa fa-lg fa-cube col-sm-4"> Bedrooms: <b>{{property.custom_fields.roomcount[0]}}</b>
                                    </i>
                                    <i class="fa  fa-lg fa-toggle-down col-sm-4"> Bathrooms: <b>{{property.custom_fields.bathrooms[0]}}</b>
                                    </i>
                                    <i class="fa fa-lg fa-bed col-sm-4"> Sleeps: <b>{{property.custom_fields.sleeps[0]}}</b>
                                    </i>

                                </div>
                                <div class="col-xs-8 col-sm-3 text-center">
                                    <a class="red-text visible-xs" ng-href="{{property.url}}">
                                        <h2>{{property.title}}</h2>
                                    </a>
                                    <i class="fa fa-dollar fa-2x"> {{property.custom_fields.reservations_groundprice[0]}} </i>
                                    <div class="small">
                                        <b>Per night. CAD</b>
                                        <div ng-if="property.custom_fields.term[0]==='short'">2 Night Min.</div>
                                        <div ng-if="property.custom_fields.term[0]==='long'">30 Night Min.</div>
                                    </div>
                                    <a href="" class="btn btn-default col-xs-12 nomar">Book</a>
                                </div>
                            </div>
                            <hr class="col-xs-12" style="opacity:.21"/>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </div>

</div>

<div class="clearfix col-xs-12 blurry-bg"><article>
    <div class="clearfix navbar"><span class="col-sm-12 col-md-6"><h3 class="light-text">Vacation Rentals</h3></span><span class="col-xs-12 col-md-6"><div class="btn-group btn-group-justified navbar-btn">
        <a ng-repeat="(key,section) in nav.properties" ng-click="$parent.show.rooms={}; $parent.show.rooms=key" type="button" class="btn btn-default ">{{section}}</a>
    </div></span></div>

    <section class="clearfix row">

        <?php
        // get all the properties category
        $args = array('include'=> '7');
        $cats = get_categories($args);

        foreach ($cats as $cat) {
        $cat_id= $cat->term_id;
        query_posts("cat=$cat_id&posts_per_page=5");

        if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article ng-show='(show.rooms == 0 || show.rooms == vrqc.propertiesObject[index.propertyPostsById[id[<?php echo the_ID(); ?>]]].custom_fields.roomcount[0])' ng-init="id[<?php echo the_ID(); ?>] = '<?php echo the_ID(); ?>';" class="clearfix property-listcol-xs-12 bottommar">
            <div class="col-xs-12">
                <a href="<?php the_permalink();?>">
                    <div class="frontpage-post">
                        <div class="col-xs-6 col-sm-3"><?php echo get_the_post_thumbnail() ?></div>
                        <div class="col-xs-6 col-sm-6">
                            <h4><?php the_title(); ?></h4>
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
                        <p><?php the_content('More'); ?></p>
                    </div>
                    <hr class="dark-bg"/>
                </a>
            </div>
        </article>

        <?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
        <?php } // done the foreach statement ?>
    </section>
</article>
</div>

<div class="clearfix"><?php get_footer(); ?>
</div>
