<?php

/*
Template Name: single new
Template Post Type: news
*/

$new_id = get_the_ID();
get_header();
?>

<?php

if (have_posts()) :
  while (have_posts()) : the_post(); ?>


    <div class="container">

      <div class="blogPageContent">

        <h1> <?php the_title() ?>  </h1>
        <span><?php the_date() ?></span>
        <?php if (has_post_thumbnail()) : ?>
          <img class="postThumbnail" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>

        <?php the_content() ?>

      </div>
      <div class="relatedBlogsSection">
        <h2>Related News</h2>
        <div class="relatedBlogs">
          <?php
          // جلب التصنيفات المرتبطة بالمقالة الحالية
          $current_post_terms = wp_get_post_terms(get_the_ID(), 'news-category', array('fields' => 'ids'));

          if (!empty($current_post_terms) && !is_wp_error($current_post_terms)) {
            // استعلام عن المقالات من نفس التصنيف
            $args = array(
              'posts_per_page' => 4,
              'post_type'      => 'news',
              'orderby'        => 'date',
              'order'          => 'DESC',
              'post__not_in'   => array(get_the_ID()), // استثناء المقالة الحالية
              'tax_query'      => array(
                array(
                  'taxonomy' => 'news-category',
                  'field'    => 'term_id',
                  'terms'    => $current_post_terms,
                  'operator' => 'IN',
                ),
              ),
            );
          } else {
            // استعلام احتياطي إذا لم تكن المقالة مرتبطة بأي تصنيف
            $args = array(
              'posts_per_page' => 4,
              'post_type'      => 'post',
              'orderby'        => 'date',
              'order'          => 'DESC',
              'post__not_in'   => array(get_the_ID()), // استثناء المقالة الحالية
            );
          }

          $related_news = get_posts($args);

          if ($related_news) :
            foreach ($related_news as $new) :
              setup_postdata($new);
              ?>
              <div class="relatedPostCard">
                <a href="<?php echo get_permalink($new->ID); ?>">
                  <img class="postImage" src="<?php echo esc_url(get_the_post_thumbnail_url($new->ID, 'full') ?: get_template_directory_uri() . '/src/img/placeholder-image.jpg'); ?>" alt="Post Image">
                </a>
                <div class="postInfo">
                  <a class="postTitle" href="<?php echo get_permalink($new->ID); ?>"><?php echo get_the_title($new->ID); ?></a>
                </div>
              </div>
            <?php
            endforeach;

            // Reset post data
            wp_reset_postdata();
          else :
            echo '<p>' . __('No related news found.', 'AJintergroup') . '</p>';
          endif;
          ?>
        </div>
      </div>
    </div>



  <?php endwhile;
else :
  echo '<p>' . __('No posts found.', 'your-theme') . '</p>';
endif;

get_footer(); // استدعاء الفوتر
