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
                                    <h5 class="fa fa-cube col-sm-4 visible-xs light-text"> {{property.custom_fields.roomcount[0]}}br
                                    </h5>
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
                                    <i class="fa fa-dollar fa-2x col-xs-6 col-sm-12">{{property.custom_fields.reservations_groundprice[0]}}</i>
                                    <div class="small">
                                        <div class="col-xs-6  col-sm-12">
                                            <b>Per night. CAD</b>
                                            <div ng-if="property.custom_fields.term[0]==='short'">2 Night Min.</div>
                                        <div ng-if="property.custom_fields.term[0]==='long'">30 Night Min.</div></div>
                                    </div>
                                    <br/>
                                    <a ng-href="{{property.url}}" class="btn btn-default col-xs-12">Book</a>
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
                                    <h5 class="fa fa-cube col-sm-4 visible-xs light-text"> {{property.custom_fields.roomcount[0]}}br
                                    </h5>
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
                                    <i class="fa fa-dollar fa-2x col-xs-6 col-sm-12">{{property.custom_fields.reservations_groundprice[0]}}</i>
                                    <div class="small">
                                        <div class="col-xs-6  col-sm-12">
                                            <b>Per night. CAD</b>
                                            <div ng-if="property.custom_fields.term[0]==='short'">2 Night Min.</div>
                                            <div ng-if="property.custom_fields.term[0]==='long'">30 Night Min.</div></div>
                                    </div>
                                    <a ng-href="{{property.url}}" class="btn btn-default col-xs-12 nomar">Book</a>
                                </div>
                                <hr class="col-xs-12" style="opacity:.21"/>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </div>

</div>

<div class="clearfix"><?php get_footer(); ?>
</div>
