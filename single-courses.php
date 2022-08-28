<?php get_header(); ?>

<section class="dynamic_banner">
  <div class="banner_bg_image">
    <img src="<?php $bimg = get_field('banner_image');
              echo esc_url($bimg['url']); ?>" alt="Course banner image">
  </div>
  <div class="main_title">
    <h1><?php the_title(); ?></h1><!-- <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo quod incidunt optio deserunt, at odio tempora laborum consequatur aperiam cumque?</h5> -->
  </div>
</section>
<section class="course_details_content_block">
  <div class="container">
    <div class="course_details_content_block_wrapper row">
      <div class="col-12 col-lg-9">
        <div class="course_overview_tab">
          <?php
          $courseCoach = get_field('coach');
          if ($courseCoach) : ?>
            <?php foreach ($courseCoach as $post) :

              // Setup this post for WP functions (variable must be named $post).
              setup_postdata($post); ?>

              <div class="coach_tab">
                <img src=" <?php $coachimg =  get_field('coach_image', $post);
                            echo esc_url($coachimg['url']); ?>" alt="<?php the_title(); ?>">
                <div class="body_copy">
                  <h5>Instructor</h5>
                  <h6><?php the_title(); ?></h6>
                </div>
              </div>
            <?php endforeach; ?>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>


          <?php endif; ?>

          <div class="reviews_tab">
            <div class="body_copy">
              <h5>Review</h5>
              <ul class="rating">
                <span><?php the_field('reviews'); ?></span>
                <?php
                $review = get_field('reviews');
                for ($x = 1; $x <= 5; $x++) {
                  if ($x <= $review) {
                    echo '<li class="rated">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                </li>';
                  } else {
                    echo '   <li>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                </li>';
                  }
                }

                ?>

              </ul>
            </div>
          </div>
          <a href="/contact-us" class="apply_now_button">Register Now!</a>
        </div>
        <div class="course_features max-570">
          <h3>Course features</h3>
          <div class="feature">Duration: <?php the_field('course_duration'); ?></div>
          <div class="feature">Sessions: <?php the_field('number_of_sessions'); ?></div>
          <div class="feature">Timings: <?php the_field('session_timings'); ?></div>
          <div class="feature">Maximum students: <?php the_field('max_students'); ?></div>
        </div>
        <div class="course_detail_body">
          <div class="course_feature_img">
            <img src="<?php $cfimg = get_field('course_thumbnail_image');
                      echo esc_url($cfimg['url']); ?>" alt="course featured image">
          </div>
          <div class="details_content">
            <?php the_field('course_description'); ?>
          </div>
        </div>
        <div class="article_comments_module pb-2 mb-5">
          <?php comments_template(); ?>

        </div>
      </div>
      <div class="col-12 col-lg-3">
        <div class="course_features">
          <h3>Course features</h3>
          <div class="feature">Duration: <?php the_field('course_duration'); ?></div>
          <div class="feature">Sessions: <?php the_field('number_of_sessions'); ?></div>
          <div class="feature">Timings: <?php the_field('session_timings'); ?></div>
          <div class="feature">Maximum students: <?php the_field('max_students'); ?></div>
        </div>


        <?php
        $similarCourses = get_field('similar_courses');
        if ($similarCourses) : ?>
          <div class="you_may_like_suggestion_list">
            <h5>Similar courses</h5>
            <ul>
              <?php foreach ($similarCourses as $post) :

                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post);
                $sidrev = get_field('reviews', $post);
                $siddur = get_field('course_duration', $post);
              ?>
                <li>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php $simCor = get_field('course_thumbnail_image');
                              echo esc_url($simCor['url']); ?>" alt="course image">
                    <div class="course_detail">
                      <h6><?php the_title(); ?></h6>
                      <span class="d-flex align-items-center justify-content-between"><?php echo $siddur; ?>
                        <span class="d-flex align-items-center">
                          <?php echo $sidrev; ?> <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#ea4a34" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                          </svg>
                        </span>
                      </span>
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