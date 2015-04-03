<?php


function vrqc_enqueue_header() {

	wp_enqueue_style( 'style', get_template_directory_uri(). '/style.css');
	wp_enqueue_script( 'vrqc-jquery', 'https://code.jquery.com/jquery-1.11.2.min.js' );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri(). '/js/jquery.easing.1.3.js', array( 'vrqc-jquery' ) );
	wp_enqueue_script( 'jquery-mobile', get_template_directory_uri(). '/js/jquery.mobile.customized.min.js', array( 'vrqc-jquery' ) );
	wp_enqueue_script( 'html5', 'http://html5shim.googlecode.com/svn/trunk/html5.js' );
	wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array( 'vrqc-jquery' ) );
	wp_enqueue_script( 'superfish', get_template_directory_uri(). '/js/superfish.js', array( 'vrqc-jquery' ) );
	wp_enqueue_script( 'jquery-ui-to-top', get_template_directory_uri(). '/js/jquery.ui.totop.js', array( 'vrqc-jquery' ) );



}

function vrqc_enqueue_angular() {
    wp_enqueue_script( 'angularjs', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.10/angular.js', array(), null, false );
    wp_enqueue_script( 'vrqc-script', get_template_directory_uri(). '/script.js', array('angularjs'), null, false );
    wp_enqueue_script( 'angular-core' );

    wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/?json=1') );
wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo('template_directory').'/?json=1', 'site' => get_bloginfo('wpurl')) );
}
add_action('wp_head', 'vrqc_enqueue_angular');
add_action('wp_head', 'vrqc_enqueue_header');


register_nav_menus( array(
'main_menu' => 'Main Menu',
'footer_menu' => 'Footer Menu',
));

function my_wp_nav_menu_args( $args = '' ) {
$args['container'] = false;
return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
add_filter('widget_text', 'do_shortcode');



function featuredSupport() {
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );


}
add_action( 'after_setup_theme', 'featuredSupport' );


// Register Sidebars
function main_sidebar() {

$args = array(
'id'            => 'sidebar-aside',
'name'          => __( 'Primary Widget Area', 'text_domain' ),
'description'   => __( 'Aside Widgets.', 'text_domain' ),
'before_title'  => '<h3>',
    'after_title'   => '</h3>',
'before_widget' => '<aside id="%1$s" class="col-xs-12 widget %2$s">',
    'after_widget'  => '</aside>',
);
register_sidebar( $args );

}
function property_sidebar() {

$args = array(
'id'            => 'sidebar-property',
'name'          => __( 'Property Widget Area', 'text_domain' ),
'description'   => __( 'Property Widgets.', 'text_domain' ),
'before_title'  => '<h3>',
    'after_title'   => '</h3>',
'before_widget' => '<aside id="%1$s" class="col-xs-12 widget %2$s">',
    'after_widget'  => '</aside>',
);
register_sidebar( $args );

}

function footer_sidebar() {

$args = array(
'id'            => 'sidebar-footer',
'name'          => __( 'Footer Widget Area', 'text_domain' ),
'description'   => __( 'Footer Widgets.', 'text_domain' ),
'before_title'  => '<h3>',
    'after_title'   => '</h3>',
'before_widget' => '<aside id="%1$s" class="col-xs-6 widget %2$s">',
    'after_widget'  => '<hr></aside>',
);
register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'main_sidebar' );
add_action( 'widgets_init', 'property_sidebar' );
add_action( 'widgets_init', 'footer_sidebar' );


// TODO what's this?
add_action('generate_rewrite_rules', 'attachment_rewrite_rule_14924');
function attachment_rewrite_rule_14924($wp_rewrite){
$new_rules = array();
$new_rules['attachment/(\d*)$'] = 'index.php?attachment_id=$matches[1]';
$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

// Shortcode in sidebar
add_filter('widget_text', 'do_shortcode');

// Get id from post title
function get_post_id( $slug, $post_type ) {
$query = new WP_Query(
array(
'name' => $slug,
'post_type' => $post_type
)
);
$query->the_post();
return get_the_ID();
}

global $post;

