<?php
/**
 * Template Name: Page Shop
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();

  get_template_part('template-parts/shop/product-search-bar');
  get_template_part('template-parts/shop/genderCategories');
  get_template_part('template-parts/shop/display-main-products');
  get_template_part('template-parts/shop/shop-products');


get_footer();

?>
