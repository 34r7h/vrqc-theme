<footer>
        

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
                <span class="navbar-text" ng-if="getDate"> &copy; <span>{{getDate | date: 'yyyy'}}</span> <span class="hidden-xs hidden-sm">Vacation Rentals Quebec City</span> &nbsp; </span>

            </span>

        </div>

    </nav>
</footer>

<?php wp_footer();?>


</body>
</html>