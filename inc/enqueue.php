<?php
/**
 * Enqueue styles & scripts
 *
 * @package Didos
 * @version 5.3.4
 */
function theme_enqueue_assets() {
  // تحميل الجافاسكربت
  wp_enqueue_script('app', get_template_directory_uri() . '/src/js/app.js', array('jquery'), null, true);

  // تحميل الـ CSS
  wp_enqueue_style('main-style', get_template_directory_uri() . '/src/css/main-style.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
