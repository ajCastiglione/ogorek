<?php
// LOAD BONES CORE (if you remove this, the theme will break)
require_once('library/bones.php');

/*********************
LAUNCH BONES
Let's get everything up and running.
 *********************/

function bones_ahoy()
{

  //Allow editor style.
  add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once('library/custom-post-type.php');

  // launching operation cleanup
  add_action('init', 'bones_head_cleanup');
  // A better title
  add_filter('wp_title', 'rw_title', 10, 3);
  // remove WP version from RSS
  add_filter('the_generator', 'bones_rss_version');
  // remove pesky injected css for recent comments widget
  add_filter('wp_head', 'bones_remove_wp_widget_recent_comments_style', 1);
  // clean up comment styles in the head
  add_action('wp_head', 'bones_remove_recent_comments_style', 1);
  // clean up gallery output in wp
  add_filter('gallery_style', 'bones_gallery_style');

  // enqueue base scripts and styles
  add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action('widgets_init', 'bones_register_sidebars');

  // cleaning up random code around images
  add_filter('the_content', 'bones_filter_ptags_on_images');
  // cleaning up excerpt
  add_filter('excerpt_more', 'bones_excerpt_more');
  // Get rid of the abomination know as "Gutenberg"
  add_filter('use_block_editor_for_post', '__return_false');
  // Removing bloat for emojis and such
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
} /* end bones ahoy */

// let's get this party started
add_action('after_setup_theme', 'bones_ahoy');

/************* LOGIN PAGE STYLES  *************/

function my_admin_theme_style()
{
  wp_enqueue_style('my-admin-theme', get_stylesheet_directory_uri() . '/library/css/login.css');
}
add_action('login_enqueue_scripts', 'my_admin_theme_style');


function minerva_url($url)
{
  return 'https://minervawebdevelopment.com';
}
add_filter('login_headerurl', 'minerva_url');

/************* OPTION PAGES (ACF) *************/
if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_page(array(
    'page_title'   => 'Popup Settings',
    'menu_title'  => 'Popup settings',
    'menu_slug'   => 'popup-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

/************* OEMBED SIZE OPTIONS *************/

if (!isset($content_width)) {
  $content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size('bones-thumb-600', 600, 150, true);
add_image_size('bones-thumb-300', 300, 100, true);

/************* REMOVE UPDATE NOTICE FOR IMPORT/EXPORT PLUGIN *************/
function filter_plugin_updates($value)
{
  unset($value->response['all-in-one-wp-migration/all-in-one-wp-migration.php']);
  return $value;
}
// add_filter('site_transient_update_plugins', 'filter_plugin_updates');


add_filter('image_size_names_choose', 'bones_custom_image_sizes');

function bones_custom_image_sizes($sizes)
{
  return array_merge($sizes, array(
    'bones-thumb-600' => __('600px by 150px'),
    'bones-thumb-300' => __('300px by 100px'),
  ));
}

/************* THEME CUSTOMIZE *********************/

function bones_theme_customizer($wp_customize)
{
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}


add_action('customize_register', 'bones_theme_customizer');

//sepreated customizer options by panels into thier own files
require('library/customizer/panels/external-libraries.php');


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars()
{
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __('Sidebar 1', 'bonestheme'),
    'description' => __('The first (primary) sidebar.', 'bonestheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/
require "theme/comments.php";

function bones_fonts()
{
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

/*Adds gravity forms field title visibilty: hidden for use of placeholders only. */
add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/************* PROTECTED PAGES *********************/
add_filter('protected_title_format', 'remove_protected_text');
function remove_protected_text()
{
  return __('%s');
}

/************* ACF SAVES *********************/
require 'theme/acf-json.php';

/************* ADD ROLES *********************/
require 'theme/add-roles.php';

/************* FAILED LOGIN REDIRECT FOR LAW FIRM ADMINS *********************/
require 'theme/law-firm-login-redirect.php';

/************* ADDING DEFAULT ROWS FOR TRUSTS *********************/
require 'theme/acf-default-rows.php';

/************* Utils *********************/
require 'theme/utils/byline.php';
require 'theme/utils/get-author.php';
require 'theme/utils/get-related-posts.php';
require 'theme/utils/detect-IE.php';


/************* CAT Exclusion for jobs *********************/

function exclude_category_jobs($query)
{
  if ($query->is_home) {
    $query->set('cat', '-23, -18, -17, -16');
  }
  return $query;
}

add_filter('pre_get_posts', 'exclude_category_jobs');

/**
 * Sort general queries by post type
 */
function order_search_by_posttype($orderby, $wp_query)
{
  if (!$wp_query->is_admin && $wp_query->is_search) :
    global $wpdb;
    $orderby = "CASE WHEN {$wpdb->prefix}posts.post_type = 'page' THEN '1' 
                 WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '2' 
            ELSE {$wpdb->prefix}posts.post_type END ASC, 
            {$wpdb->prefix}posts.post_title ASC";
  endif;
  return $orderby;
}
add_filter('posts_orderby', 'order_search_by_posttype', 10, 2);

/************* Cron Jobs Include *********************/
require "theme/cron-jobs.php";

// Fix ACF not showing update in previews
add_filter('_wp_post_revision_fields', 'add_field_debug_preview');
function add_field_debug_preview($fields)
{
  $fields["debug_preview"] = "debug_preview";
  return $fields;
}
add_action('edit_form_after_title', 'add_input_debug_preview');
function add_input_debug_preview()
{
  echo '<input type="hidden" name="debug_preview" value="debug_preview">';
}

/* DON'T DELETE THIS CLOSING TAG */
