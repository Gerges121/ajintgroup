<?php
/**
 * Register Products Post Type
 * @package Didos
 * @version 0.0.1
 */

function register_product_post_type() {
  $labels = array(
    'name'               => __('Products', 'AJintergroup'),
    'singular_name'      => __('Product', 'AJintergroup'),
    'add_new'            => __('Add New Product', 'AJintergroup'),
    'add_new_item'       => __('Add New Product', 'AJintergroup'),
    'edit_item'          => __('Edit Product', 'AJintergroup'),
    'new_item'           => __('New Product', 'AJintergroup'),
    'all_items'          => __('All Products', 'AJintergroup'),
    'view_item'          => __('View Product', 'AJintergroup'),
    'search_items'       => __('Search for Product', 'AJintergroup'),
    'not_found'          => __('No Product found', 'AJintergroup'),
    'not_found_in_trash' => __('No Product found in trash', 'AJintergroup'),
    'menu_name'          => __('Products', 'AJintergroup'),
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'has_archive'       => true,
    'menu_icon'         => 'dashicons-admin-multisite',
    'rewrite'           => array('slug' => 'products'),
    'supports'          => array('title', 'editor', 'thumbnail', 'author'),
    'capability_type'   => 'post',
  );

  register_post_type('products', $args);
}
add_action('init', 'register_product_post_type');

/**
 * Customize the project permalink structure.
 */
function custom_project_permalink($permalink, $post_id) {
  if (get_post_type($post_id) === 'projects') {
    $permalink = trailingslashit(home_url('/projects/' . get_post_field('post_name', $post_id)));
  }
  return $permalink;
}
add_filter('post_type_link', 'custom_project_permalink', 10, 2);

/**
 * Register taxonomy for categories.
 */
function register_products_categories_taxonomy() {
  $labels = array(
    'name'              => _x('Products Categories', 'taxonomy general name', 'AJintergroup'),
    'singular_name'     => _x('Products Category', 'taxonomy singular name', 'AJintergroup'),
    'search_items'      => __('Search Products Categories', 'AJintergroup'),
    'all_items'         => __('All Products Categories', 'AJintergroup'),
    'edit_item'         => __('Edit Products Category', 'AJintergroup'),
    'update_item'       => __('Update Products Category', 'AJintergroup'),
    'add_new_item'      => __('Add New Products Category', 'AJintergroup'),
    'new_item_name'     => __('New Products Category Name', 'AJintergroup'),
    'menu_name'         => __('Products Categories', 'AJintergroup'),
  );

  $args = array(
    'labels'            => $labels,
    'hierarchical'      => true,
    'public'            => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'type'),
  );

  register_taxonomy('products category', 'products', $args);
}
add_action('init', 'register_products_categories_taxonomy');

?>
  <?php


/**
 * Save project meta data.
 */
function save_product_meta($post_id) {
  // Check for nonce security
  if (!isset($_POST['product_meta_box_nonce']) || !wp_verify_nonce($_POST['product_meta_box_nonce'], 'save_product_meta_data')) {
    return;
  }

  // Prevent auto-save from overwriting the data
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  // Ensure the user has permission to edit the post
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  // Check if the project_details array is set and is an array
  if (isset($_POST['product_details']) && is_array($_POST['product_details'])) {
    // Sanitize and save the meta data
    $sanitized_product_details = array_map('sanitize_text_field', $_POST['product_details']);
    update_post_meta($post_id, 'product_details', $sanitized_product_details);
  }


}
add_action('save_post', 'save_product_meta');


/**
 * Add FAQ meta box.
 */
function add_faq_meta_box() {
  add_meta_box('faq_meta_box', __('FAQs', 'AJintergroup'), 'faq_meta_box_callback', 'products', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_faq_meta_box');

/**
 * Render the FAQ meta box.
 */
function faq_meta_box_callback($post) {
  $faqs = get_post_meta($post->ID, '_faqs', true);
  ?>
  <table class="form-table">
    <thead>
    <tr>
      <th><?php _e('Question', 'AJintergroup');?></th>
      <th><?php _e('Answer', 'AJintergroup');?></th>
    </tr>
    </thead>
    <tbody>
    <?php if ($faqs) : ?>
      <?php foreach ($faqs as $index => $faq) : ?>
        <tr>
          <td><input type="text" name="faqs[<?php echo $index; ?>][question]" value="<?php echo esc_attr($faq['question']); ?>" /></td>
          <td><input type="text" name="faqs[<?php echo $index; ?>][answer]" value="<?php echo esc_attr($faq['answer']); ?>" /></td>
          <td><button class="button faq-delete-button"><?php _e('Delete', 'AJintergroup');?></button></td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td><input type="text" name="faqs[0][question]" /></td>
        <td><input type="text" name="faqs[0][answer]" /></td>
        <td><button class="button faq-delete-button"><?php _e('Delete', 'AJintergroup');?></button></td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
  <button class="button" id="add-faq-row"><?php _e('Add New Question', 'AJintergroup');?></button>
  <script>
    jQuery(document).ready(function ($) {
      $('#add-faq-row').on('click', function () {
        var index = $('.form-table tbody tr').length;
        var newRow = '<tr>' +
          '<td><input type="text" name="faqs[' + index + '][question]" /></td>' +
          '<td><input type="text" name="faqs[' + index + '][answer]" /></td>' +
          '<td><button class="button faq-delete-button"><?php _e('Delete', 'AJintergroup');?></button></td>' +
          '</tr>';
        $('.form-table tbody').append(newRow);
        return false;
      });

      $(document).on('click', '.faq-delete-button', function () {
        $(this).closest('tr').remove();
        return false;
      });
    });
  </script>
  <?php
}

/**
 * Save FAQ meta data.
 */
function save_faq_meta_data($post_id) {
  if (isset($_POST['faqs'])) {
    $faqs = array();
    foreach ($_POST['faqs'] as $faq) {
      $question = sanitize_text_field($faq['question']);
      $answer = sanitize_text_field($faq['answer']);
      $faqs[] = array('question' => $question, 'answer' => $answer);
    }
    update_post_meta($post_id, '_faqs', $faqs);
  } else {
    delete_post_meta($post_id, '_faqs');
  }
}
add_action('save_post_projects', 'save_faq_meta_data');

