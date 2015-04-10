<footer>
        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div><!-- #primary-sidebar -->
        <?php endif; ?>
    <nav class="navbar navbar-default navbar-fixed-bottom bottom-nav">
        <div class="col-xs-12">
            <span class="btn btn-group navbar-left">
                <a class="btn btn-default navbar-btn btn-lg" href="mailto:quebeccityreservations@gmail.com">
                    <i class="fa fa-envelope"> <span class="hidden-xs">Email</span></i>
                </a>
            <a class="btn btn-default navbar-btn navbar-left btn-lg" target="new" href="https://www.facebook.com/pages/Vacation-Rentals-Quebec-City/188400344615871">
                <i class="fa fa-facebook-official"> <span class="hidden-xs">Facebook</span></i>
            </a></span>
            <span class="navbar-right">
            <p ng-if="vrqc.weather.temperature_string" class="weather navbar-text">
                <img style="height: 25px; width: auto" ng-src="{{vrqc.weather.icon_url}}" alt="quebec city weather from vacationrentalsquebeccity.com"/>
                <span>{{vrqc.weather.weather}}&nbsp;</span>
                <span>{{vrqc.weather.temperature_string}}&nbsp; </span>
            </p></span>

        </div>
        <p class="text-center" ng-if="getDate"> &copy; <span>{{getDate | date: 'yyyy'}}</span> <span class="hidden-xs hidden-sm">Vacation Rentals Quebec City</span> &nbsp; </p>


    </nav>
</footer>

<?php wp_footer();?>


</body>
</html>