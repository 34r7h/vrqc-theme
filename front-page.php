<div class="clearfix">
    <?php get_header(); ?>
</div>

<div>
    <div class="visible-xs">
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
    <div class="hidden-xs homepage-splash ">
        <?php
            $post = get_post();
            $title = $post->ID;
            echo get_the_post_thumbnail($title, 'full');
            wp_reset_query();
        ?>
        <div class="featured-offer pull-right col-xs-12 col-sm-5" style="position: absolute; top:200px; right:0">
            <?php
                $cat_id = 5; //the certain category ID
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
            <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="col-xs-12 col-sm-6 light-text">
        <div class=" panel panel-info"><div class="panel-heading"><h3 class="light-text">Latest Reviews</h3></div>
    <?php
        // Posts per page setting
        $ppp = 2; // either use the WordPress global Posts per page setting or set a custom one like $ppp = 10;
        $custom_offset = 0; // If you are dealing with your custom pagination, then you can calculate the value of this offset using a formula
        // category (can be a parent category)
        $category_parent = 7;
        // lets fetch sub categories of this category and build an array
        $categories = get_terms( 'category', array( 'child_of' => $category_parent, 'hide_empty' => false ) );
    $category_list =  array( $category_parent );
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
    echo '<i disabled class="col-xs-6 light-text panel-body">
        <div><span class="fa fa-quote-left"> '.substr( $comment->comment_content, 0, 250 ).'</span>&nbsp;<span class="fa fa-quote-right"></span></div>
</i>
    ';
    }
    } else {
    echo '<p>No comments</p>';
    }
    ?></div>
    </div>
    <span ng-if="vrqc.weather.temperature_string" class="panel panel-info weather col-xs-12 col-sm-3">
        <div class="panel-heading"><h3 class="light-text">Current Weather</h3></div>
        <div class="panel-body"><img style="height: 50px; width: auto" ng-src="{{vrqc.weather.icon_url}}" alt="quebec city weather from vacationrentalsquebeccity.com"/>
        <div>{{vrqc.weather.weather}}&nbsp;</div>
        <div>{{vrqc.weather.temperature_string}}&nbsp; </div></div>
    </span>
    <div class="col-xs-12 col-sm-3 panel panel-info">
        <div class="panel-heading"><h3 class="light-text">Featured Event</h3></div>
        <?php
                $cat_id = 22; //the certain category ID
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
        if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
        <a class="panel-body" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
        <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>
<br class="">
<div>
    <div class="">

        <section class="noborderrad panel panel-default blurry-bg">

            <!--<div
                    href
                    class="panel-heading">

                <h2><a
                        href="<?php $propertyLink=get_site_url().'/properties'; echo $propertyLink ?>">
                    Our Vacation Suites
                </a></h2>
            </div>-->
            <div class="container-fluid">
                <h3 class="col-xs-12">
                    Short Term Rentals <em class="small">( Less than 30 days )</em>
                </h3>
                <div ng-repeat="(key,roomCount) in index.propertyPostsByRoomcount" ng-show="roomCount.length > 0" class="col-xs-12 col-sm-4">
                        <div class="panel panel-default"><div class="panel-heading dark-bg light-text"><b class="fa fa-home"> {{key | uppercase}} BEDROOMS</b></div>
                        <div class="panel-body">
                            <div class="col-xs-6" ng-repeat="property in roomCount" ng-if="property.custom_fields.term[0] === 'short'" >
                                <a class="red-text"  ng-href="{{property.url}}">
                                    <b>{{property.title}}</b>
                                    <img ng-src="{{property.thumbnail}}">
                                </a>
                            </div>
                        </div></div>
                </div>

            </div>
            <div class="container-fluid">
                <h3 class="col-xs-12">
                    Long Term Rentals <em class="small">( Minimum 30 days )</em>
                </h3>
                <div ng-repeat="(key,roomCount) in index.propertyPostsByRoomcount" ng-show="roomCount.length > 0" class="col-xs-12 col-sm-4">
                    <div class="panel panel-default"><div class="panel-heading dark-bg light-text"><b class="fa fa-home"> {{key | uppercase}} BEDROOMS</b></div>
                        <div class="panel-body">
                            <div class="col-xs-6" ng-repeat="property in roomCount" ng-if="property.custom_fields.term[0] === 'long'" >
                                <a class="red-text"  ng-href="{{property.url}}">
                                    <b>{{property.title}}</b>
                                    <img ng-src="{{property.thumbnail}}">
                                </a>
                            </div>
                        </div></div>
                </div>

            </div>
            <hr/>

        </section>

    </div>

</div>
<div class="clearfix">
    <?php get_footer(); ?>
</div>