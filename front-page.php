<div class="clearfix">
    <?php get_header(); ?>
</div>

<div>
    <div class="visible-xs">
        <div class="featured-offer">
            <?php
                $cat_id = 5; //the certain category ID
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) :
            $latest_cat_post->the_post(); ?>
            <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
    <div class="hidden-xs homepage-splash ">
        <div class="featured-offer pull-right col-xs-12 col-sm-6"
             style="position: relative; top:1em; right:0; height:0">
            <?php
                $cat_id = 5; //the certain category ID
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) :
            $latest_cat_post->the_post(); ?>
            <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>
        <?php
            $post = get_post();
            $title = $post->ID;
        echo get_the_post_thumbnail($title, 'full');
        wp_reset_query();
        ?>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="col-xs-12 col-sm-6 light-text">
        <div class="panel panel-dark">
            <div class="panel-heading"><h3 class="light-text">Latest Reviews</h3></div>
            <div class="panel-body">
                <?php
        // Posts per page setting
        $ppp = 2; // either use the WordPress global Posts per page setting or set a custom one like $ppp = 10;
        $custom_offset = 0; // If you are dealing with your custom pagination, then you can calculate the value of this offset using a formula
        // category (can be a parent category)
        $category_parent = 7;
        // lets fetch sub categories of this category and build an array
        $categories = get_terms( 'category', array( 'child_of' => $category_parent, 'hide_empty' => false ) );
                $category_list = array( $category_parent );
                foreach( $categories as $term ) {
                $category_list[] = (int) $term->term_id;
                }
                // fetch posts in all those categories
                $posts = get_objects_in_term( $category_list, 'category' );
                $sql = "SELECT comment_ID, comment_date, comment_content, comment_post_ID
                FROM {$wpdb->comments} WHERE
                comment_post_ID in (".implode(',', $posts).") AND comment_approved = 1
                ORDER by comment_date DESC LIMIT $ppp OFFSET $custom_offset";
                $comments_list = $wpdb->get_results( $sql );
                if ( count( $comments_list ) > 0 ) {
                $date_format = get_option( 'date_format' );
                foreach ( $comments_list as $comment ) {
                echo '<i disabled class="col-xs-6 light-text">
                <div><span class="fa fa-quote-left"> '.substr( $comment->comment_content, 0, 250 ).'</span>&nbsp;<span
                        class="fa fa-quote-right"></span></div>
            </i>
                ';
                }
                } else {
                echo '<p>No comments</p>';
                }
                ?>
            </div>
        </div>
    </div>
    <span ng-if="vrqc.weather.temperature_string" class="weather col-xs-12 col-sm-3">
        <div class="panel panel-dark">
            <div class="panel-heading"><h3 class="light-text fa fa-umbrella"> Current Weather</h3></div>
            <div class="panel-body">
                <div>
                    <h4><img style="height: 25px; width: auto" ng-src="{{vrqc.weather.icon_url}}"
                             alt="quebec city weather from vacationrentalsquebeccity.com"/>

                        {{vrqc.weather.weather}}</h4>&nbsp;</div>
                <div>{{vrqc.weather.temperature_string}}&nbsp; </div>
            </div>
        </div>
    </span>

    <div class="col-xs-12 col-sm-3">
        <div class="panel panel-dark">
            <div class="panel-heading"><h3 class="light-text fa fa-calendar"> Featured Event</h3></div>
            <div class="panel-body"><?php
                $cat_id = 22; //the certain category ID
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
                if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) :
                $latest_cat_post->the_post();
                ?>
                <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?></div>
        </div>
    </div>
</div>
<br class="">
<div>
    <div class="">
        <section class="noborderrad panel panel-default blurry-bg">
            <div class="container-fluid" ng-init="ourProperties[0]=index.propertyPostsByTermAndRoomcount['short'];ourProperties[1]=index.propertyPostsByTermAndRoomcount['long'];">

                <div ng-repeat="(termKey, propertyList) in ourProperties" ng-if="termKey==='0'">
                    <h3 class="col-xs-12 dark-text" ng-if="termKey==='0'">Short Term Rentals</h3>

                    <!-- short term 2 bedroom-->
                    <div
                            ng-repeat="(propertyListKey, propertyIds) in propertyList"
                            ng-show="propertyIds.length > 0"
                            class="col-xs-12"
                            ng-if="propertyIds.length === 4">
                        <div class="panel panel-dark">
                            <div class="panel-heading dark-bg light-text">
                                <span ng-if="propertyListKey==='1'">STUDIO -</span>
                                <b class="fa fa-home"> {{propertyListKey | uppercase}}
                                BEDROOM<span ng-if="propertyListKey!=='1'">S</span>
                                </b>
                            </div>
                            <div class="panel-body smallmar">
                                <div class="col-xs-12 col-sm-6 col-md-3 smallpad" ng-repeat="(propertyKey, property) in propertyIds">

                                    <a class="light-text" ng-href="{{vrqc.propertiesObjectById[property].url}}">
                                        <b class="img-title">{{vrqc.propertiesObjectById[property].title}}
                                        </b>
                                        <img style="width:100%; min-height:auto;" ng-src="{{vrqc.propertiesObjectById[property].thumbnail_images.large.url}}" alt=""/>
                                        <!--<div style="width:100%; min-height:300px; background-size: cover; background:url('{{vrqc.propertiesObjectById[property].thumbnail_images.medium.url}}') top left no-repeat">
                                        </div>-->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- short term 3 bedroom-->
                    <div class="col-xs-12">
                        <div
                            ng-repeat="(propertyListKey, propertyIds) in propertyList"
                            ng-show="propertyIds.length > 0"
                            class="col-xs-12 col-sm-4 nomar nopad"
                            ng-if="propertyIds.length === 1">
                            <div class="panel panel-dark">
                                <div class="panel-heading dark-bg light-text">
                                    <span ng-if="propertyListKey==='1'">STUDIO -</span>
                                    <b class="fa fa-home"> {{propertyListKey | uppercase}}
                                        BEDROOM<span ng-if="propertyListKey!=='1'">S</span>
                                    </b>
                                </div>
                                <div class="panel-body smallmar">
                                    <div class="col-xs-12 smallpad" ng-repeat="(propertyKey, property) in propertyIds">

                                        <a class="light-text" ng-href="{{vrqc.propertiesObjectById[property].url}}">
                                            <b class="img-title">{{vrqc.propertiesObjectById[property].title}}
                                            </b>
                                            <img style="width:100%; min-height:auto;" ng-src="{{vrqc.propertiesObjectById[property].thumbnail_images.large.url}}" alt=""/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- short term 4 bedroom-->
                        <div
                                ng-repeat="(propertyListKey, propertyIds) in propertyList"
                                ng-show="propertyIds.length > 0"
                                class="col-xs-12 col-sm-8"
                                ng-if="propertyIds.length === 2">
                            <div class="panel panel-dark">
                                <div class="panel-heading dark-bg light-text">
                                    <b class="fa fa-home"> {{propertyListKey | uppercase}}
                                        BEDROOM
                                    </b>
                                </div>
                                <div class="panel-body smallmar">
                                    <div class="col-xs-12 col-sm-6 smallpad" ng-repeat="(propertyKey, property) in propertyIds">

                                        <a class="light-text" ng-href="{{vrqc.propertiesObjectById[property].url}}">
                                            <b class="img-title">{{vrqc.propertiesObjectById[property].title}}
                                            </b>
                                            <img style="width:100%; min-height:auto;" ng-src="{{vrqc.propertiesObjectById[property].thumbnail_images.large.url}}" alt=""/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div ng-repeat="(termKey, propertyList) in ourProperties" ng-if="termKey==='1'">
                    <h3 class="col-xs-12 dark-text">Long Term Rentals</h3>

                    <!-- long term studio - 1 bedroom-->
                    <div
                            ng-repeat="(propertyListKey, propertyIds) in propertyList"
                            ng-show="propertyIds.length > 0"
                            class="col-xs-12"
                            ng-if="propertyListKey==='1'">
                        <div class="panel panel-dark">
                            <div class="panel-heading dark-bg light-text">

                                <b class="fa fa-home">
                                     <span ng-if="propertyListKey==='1'">STUDIO -</span> {{propertyListKey | uppercase}}
                                    BEDROOM
                                </b>
                            </div>
                            <div class="panel-body smallmar">
                                <div class="col-xs-12 col-sm-4 smallpad" ng-repeat="(propertyKey, property) in propertyIds">

                                    <a class="light-text" ng-href="{{vrqc.propertiesObjectById[property].url}}">
                                        <b class="img-title">{{vrqc.propertiesObjectById[property].title}}
                                        </b>
                                        <img style="width:100%; min-height:auto;" ng-src="{{vrqc.propertiesObjectById[property].thumbnail_images.large.url}}" alt=""/>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- long term 2-3-4 bedroom-->
                    <!--<div class="col-xs-12 col-sm-4">
                        <div class="panel panel-dark">
                            <div class="panel-heading dark-bg light-text">
                                <b class="fa fa-home"> 2 - 3 - 4
                                    BEDROOMS
                                </b>
                            </div>
                            <div class="panel-body smallmar">
                                <div ng-repeat="(propertyListKey, propertyIds) in propertyList"
                                     ng-show="propertyIds.length > 0"
                                     class="col-xs-12 nomar nopad"
                                     ng-if="propertyListKey !== '1'">
                                    <div class="col-xs-12 smallpad" ng-repeat="(propertyKey, property) in propertyIds">

                                        <a class="light-text" ng-href="{{vrqc.propertiesObjectById[property].url}}">
                                            <b class="img-title">{{vrqc.propertiesObjectById[property].title}}
                                            </b>
                                            <img ng-src="{{vrqc.propertiesObjectById[property].thumbnail}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->


                </div>
            </div>
            <hr/>

        </section>

    </div>

</div>
<div class="clearfix">
    <?php get_footer(); ?>
</div>