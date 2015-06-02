<div class="clearfix">
    <?php get_header(); ?>
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
