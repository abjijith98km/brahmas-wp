<?php
/* Template Name: Blogs and events page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
<section class="dynamic_banner">
  <div class="banner_bg_image">
    <img src="<?php $bImg = get_field('banner_image');
              echo esc_url($bImg['url']); ?>" alt="Blogs and events banner image">
  </div>
  <div class="main_title">
    <h1><?php the_field('banner_title'); ?></h1>
    <h5><?php the_field('banner_subtitle'); ?></h5>
  </div>
</section>
<section class="blogs_n_events_listing">
  <div class="container">
    <div class="blogs_n_events_listing_inner row">
      <div class="col-12 col-lg-9">
        <ul class="blogs_event_list_wrp">
          <!-- query -->
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $query = new WP_Query(array(
            'post_type' => 'blogs',
            'posts_per_page' => 4,
            'paged' => $paged
          ));
          ?>

          <?php if ($query->have_posts()) : ?>

            <!-- begin loop -->
            <?php while ($query->have_posts()) : $query->the_post(); ?>


              <li class="blog_box">
                <div class="bllog_image">
                  <div class="posted_on">
                    <?php
                    $postDate = get_field('blog_date');

                    ?>
                    <span><?php echo date('d', strtotime($postDate)); ?></span> <?php echo date('F', strtotime($postDate)); ?>,<?php echo date('Y', strtotime($postDate)); ?>
                  </div>
                  <img src="<?php $blogImg = get_field('blog_thumbnail_image');
                            echo esc_url($blogImg['url']); ?>" alt="article thumbnail image image">
                </div>
                <div class="blog_detail_body">
                  <div class="excerpt_wrap"><?php the_field('blog_category'); ?></div>
                  <h2><?php the_title(); ?></h2>
                  <a href="<?php the_permalink(); ?>" class="read_more">Read More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                  </a>
                </div>
              </li>

            <?php endwhile; ?>
            <!-- end loop -->


            <!-- WHAT GOES HERE?????? -->


            <?php wp_reset_postdata(); ?>

          <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
          <?php endif; ?>


        </ul>
        <div class="custom_course_pagination wp_pagination">
          <?php

        //   previous_posts_link('  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
        //     <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        //   </svg> Prev');
        //   next_posts_link('Next <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
        //   <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
        // </svg>');
          echo paginate_links(array(
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'total'        => $query->max_num_pages,
            'current'      => max(1, get_query_var('paged')),
            'format'       => '?paged=%#%',
            'show_all'     => true,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf('  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>Prev %1$s', __('', 'text-domain')),
            'next_text'    => sprintf('%1$s Next <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>', __('', 'text-domain')),
            'add_args'     => false,
            'add_fragment' => '',
          ));

          ?>
        </div>
      </div>
      <div class="col-12 col-lg-3">

        <?php
        $featured_blogsnevents = get_field('featured_blogs');
        if ($featured_blogsnevents) : ?>
          <div class="you_may_like_suggestion_list">
            <h5>Featured posts</h5>
            <ul>
              <?php foreach ($featured_blogsnevents as $post) :

                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post); ?>

                <li>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php $bnimg = get_field('blog_thumbnail_image', $post);
                              echo esc_url($bnimg['url']); ?>" alt="course thumbnail image">
                    <div class="course_detail">
                      <span><?php the_field('blog_category', $post); ?></span>
                      <h6><?php the_title(); ?></h6>
                    </div>
                  </a>
                </li>
              <?php endforeach; ?>
              <?php
              // Reset the global post object so that the rest of the page works correctly.
              wp_reset_postdata(); ?>


            </ul>
          </div>

        <?php endif; ?>


        <?php
        $featuredCourse = get_field('featured_course');
        if ($featuredCourse) : ?>

          <?php foreach ($featuredCourse as $post) :
            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>

            <div class="learm_more_about_courses_contact_box">
              <img src="<?php $CImg = get_field('course_thumbnail_image', $post);
                        echo esc_url($CImg['url']); ?>" alt="Course thumbbnail image">
              <div class="content_details_wrap">
                <h4><?php the_title(); ?></h4>
                <a href="<?php the_permalink(); ?>" class="explore_more">Read more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                  </svg>
                </a>
              </div>
            <?php endforeach; ?>

            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>

            </div>

          <?php endif; ?>


          <div class="share_to_platform">
            <h5>Share to:</h5>
            <ul>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z" />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>