<?php
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();

  get_template_part('template-parts/home-page/home-page-hero');
  get_template_part('template-parts/home-page/mission-section');
  get_template_part('template-parts/home-page/vision');
  get_template_part('template-parts/home-page/accordion-slide');
  get_template_part('template-parts/home-page/innovation-section');
  get_template_part('template-parts/home-page/news');
  get_template_part('template-parts/home-page/blogs');

get_footer();

?>
