<?php
/**
 * Register News Post Type
 * @package Didos
 * @version 0.0.1
 */

function register_news_post_type() {
  $labels = array(
    'name'               => __('News', 'AJintergroup'),
    'singular_name'      => __('New', 'AJintergroup'),
    'add_new'            => __('Add New New', 'AJintergroup'),
    'add_new_item'       => __('Add New New', 'AJintergroup'),
    'edit_item'          => __('Edit New', 'AJintergroup'),
    'new_item'           => __('New New', 'AJintergroup'),
    'all_items'          => __('All News', 'AJintergroup'),
    'view_item'          => __('View New', 'AJintergroup'),
    'search_items'       => __('Search for New', 'AJintergroup'),
    'not_found'          => __('No New found', 'AJintergroup'),
    'not_found_in_trash' => __('No New found in trash', 'AJintergroup'),
    'menu_name'          => __('News', 'AJintergroup'),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'has_archive'       => true,
    'menu_icon'         => 'dashicons-admin-multisite',
    'rewrite'           => array('slug' => 'news'),
    'supports'          => array('title', 'editor', 'thumbnail', 'author'),
    'capability_type'   => 'post',
  );

  register_post_type('news', $args);
}
add_action('init', 'register_news_post_type');

function register_news_categories_taxonomy() {
  $labels = array(
    'name'              => _x('News Categories', 'taxonomy general name', 'AJintergroup'),
    'singular_name'     => _x('News Category', 'taxonomy singular name', 'AJintergroup'),
    'search_items'      => __('Search news Categories', 'AJintergroup'),
    'all_items'         => __('All news Categories', 'AJintergroup'),
    'edit_item'         => __('Edit news Category', 'AJintergroup'),
    'update_item'       => __('Update news Category', 'AJintergroup'),
    'add_new_item'      => __('Add New news Category', 'AJintergroup'),
    'new_item_name'     => __('New news Category Name', 'AJintergroup'),
    'menu_name'         => __('news Categories', 'AJintergroup'),
  );

  $args = array(
    'labels'            => $labels,
    'hierarchical'      => true,
    'public'            => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'type'),
  );

  register_taxonomy('news-category', 'news', $args);
}
add_action('init', 'register_news_categories_taxonomy');

?>
<?php
