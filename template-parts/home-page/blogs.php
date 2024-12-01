
<div class="container">
  <div class="blogsContainer">
    <div class="heading">
      <h2>OUR BLOG!</h2>
      <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
        <path d="M23 9.99185C22.992 9.11438 22.6438 8.27544 22.0307 7.65684L14.9829 0.485004C14.675 0.174362 14.2587 0 13.8246 0C13.3906 0 12.9742 0.174362 12.6664 0.485004C12.5124 0.640054 12.3902 0.824522 12.3068 1.02777C12.2234 1.23101 12.1805 1.44901 12.1805 1.66919C12.1805 1.88937 12.2234 2.10737 12.3068 2.31061C12.3902 2.51386 12.5124 2.69833 12.6664 2.85338L18.0714 8.32398H1.64286C1.20714 8.32398 0.789278 8.49971 0.481182 8.81249C0.173087 9.12528 0 9.54951 0 9.99185C0 10.4342 0.173087 10.8584 0.481182 11.1712C0.789278 11.484 1.20714 11.6597 1.64286 11.6597H18.0714L12.6664 17.147C12.3571 17.4589 12.1824 17.8827 12.1809 18.3253C12.1793 18.7679 12.351 19.193 12.6582 19.507C12.9654 19.8211 13.3829 19.9984 13.8188 20C14.2548 20.0016 14.6735 19.8272 14.9829 19.5154L22.0307 12.3435C22.6478 11.7208 22.9963 10.8751 23 9.99185Z" fill="#023047"/>
      </svg>
    </div>
    <div class="all-cards">
      <div class="relatedBlogs">
        <?php
        // جلب التصنيفات المرتبطة بالمقالة الحالية
        $current_post_terms = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));

        if (!empty($current_post_terms) && !is_wp_error($current_post_terms)) {
          // استعلام عن المقالات من نفس التصنيف
          $args = array(
            'posts_per_page' => 4,
            'post_type'      => 'post',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post__not_in'   => array(get_the_ID()), // استثناء المقالة الحالية

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

        $related_posts = get_posts($args);

        if ($related_posts) :
          foreach ($related_posts as $post) :
            setup_postdata($post);
            ?>
            <div class="relatedPostCard">
              <a href="<?php echo get_permalink($post->ID); ?>">
                <img class="postImage" src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'full') ?: get_template_directory_uri() . '/src/img/placeholder-image.jpg'); ?>" alt="Post Image">
              </a>
              <div class="postInfo">
                <a class="postTitle" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
              </div>
            </div>
          <?php
          endforeach;

          // Reset post data
          wp_reset_postdata();
        else :
          echo '<p>' . __('No related posts found.', 'AJintergroup') . '</p>';
        endif;
        ?>
      </div>
    </div>
  </div>
</div>
