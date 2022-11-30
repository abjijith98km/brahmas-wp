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

              <!-- <div class="coach_tab">
                <img src=" <?php
                //  $coachimg =  get_field('coach_image', $post);
                //             echo esc_url($coachimg['url']);
                             ?>" alt="<?php
                              // the_title();
                               ?>">
                <div class="body_copy">
                  <h5>Instructor</h5>
                  <h6><?php
                  //  the_title();
                    ?></h6>
                </div>
              </div> -->
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
          <?php 
$redirectLink = get_field('course_detail_page_apply_redirect','options');
if( $redirectLink ): 
    $link_url = $redirectLink['url'];
    $link_title = $redirectLink['title'];
    $link_target = $redirectLink['target'] ? $redirectLink['target'] : '_self';
    ?>
    <a class="apply_now_button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>

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
          <?php
             /**
           * Filter to move comment field to the last
           */
          add_filter('comment_form_fields', 'wtitheme_comment_form_fields', 10, 1);

          /**
           * Move comment field to the last
           * @param $comment_fields
           * @return mixed
           */
          function wtitheme_comment_form_fields($comment_fields)
          {
            if (isset($comment_fields['comment'])) {
              $comment_field = $comment_fields['comment'];
              unset($comment_fields['comment']);
              $comment_fields['comment'] = $comment_field;
            }
            if (isset($comment_fields['url'])) {
              $comment_field = $comment_fields['url'];
              unset($comment_fields['url']);
            }

            return $comment_fields;
          }
          comments_template();

          ?>

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
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://www.twitter.com/share?url=<?php echo get_permalink() ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink() ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                </svg>
              </a>
            </li>
            <!-- <li>
              <a href="https://www.instagram.com/create/story?url=<?php echo get_permalink() ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>