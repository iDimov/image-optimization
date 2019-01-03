<?php
/**
 * LogicieleSpionTelephone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LogicieleSpionTelephone
 */

if ( ! function_exists( 'logicielespiontelephone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function logicielespiontelephone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on LogicieleSpionTelephone, use a find and replace
		 * to change 'logicielespiontelephone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'logicielespiontelephone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// remove_filter( 'the_content', 'wpautop' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'logicielespiontelephone' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'logicielespiontelephone_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'logicielespiontelephone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function logicielespiontelephone_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'logicielespiontelephone_content_width', 640 );
}
add_action( 'after_setup_theme', 'logicielespiontelephone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function logicielespiontelephone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'logicielespiontelephone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'logicielespiontelephone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'logicielespiontelephone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function logicielespiontelephone_scripts() {
	wp_enqueue_style( 'logicielespiontelephone-style', get_stylesheet_uri() );

	wp_enqueue_script( 'logicielespiontelephone-jquery', get_template_directory_uri() . '/js/jquery.js' );
	wp_enqueue_script( 'logicielespiontelephone-main', get_template_directory_uri() . '/js/all.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'logicielespiontelephone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



function crunchify_disable_comment_url($fields) { 
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');


function my_update_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'logicielespiontelephone' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<label for="author">' . __( "Name", "logicielespiontelephone" ) . $label . '</label>
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Votre nom", "logicielespiontelephone" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<label for="email">' . __( "Email", "logicielespiontelephone" ) . $label . '</label>
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Votre e-mail", "logicielespiontelephone" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'my_update_comment_fields' );


function my_update_comment_field( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <label for="comment">' . __( "Comment", "logicielespiontelephone" ) . '</label>
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Entrer un commentaire ici", "logicielespiontelephone" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'my_update_comment_field' );



function table_shortcode( $atts, $content = null ) {
	ob_start();
	$a = shortcode_atts( array(
		'url1' => 'http',
		'url2' => 'http',
		'url3' => 'http',
	), $atts );
	include(locate_template('parts/table.php'));
	// echo locate_template('parts/table.php'); // debug
	// get_template_part( 'parts/table', $atts );
	$output = ob_get_clean();
	// echo $atts; // debug
	// print $output; // debug
	return $output;
}

if (!is_admin()) {
	add_shortcode('table', 'table_shortcode' );
}

function products_shortcode( $atts, $content = null ) {
	ob_start();
	get_template_part( 'parts/products' );
	$output = ob_get_clean();
	//print $output; // debug
	return $output;
}

if (!is_admin()) {
	add_shortcode('products', 'products_shortcode' );
}

function systems_shortcode( $atts, $content = null ) {
	ob_start();
	get_template_part( 'parts/systems' );
	$output = ob_get_clean();
	//print $output; // debug
	return $output;
}

if (!is_admin()) {
	add_shortcode('systems', 'systems_shortcode' );
}


global $sitepress;
remove_action( 'wp_head', array( $sitepress, 'meta_generator_tag' ) );
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

remove_action( 'wp_head', 'wp_resource_hints', 2);
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('wp_head', 'rsd_link');

// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
remove_action( 'wp_head',                'wp_oembed_add_host_js'                 );

function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

