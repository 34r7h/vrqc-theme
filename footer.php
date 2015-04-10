<footer>
        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div><!-- #primary-sidebar -->
        <?php endif; ?>
    <div></div>
    <br/>
</footer>

<?php wp_footer();?>


</body>
</html>