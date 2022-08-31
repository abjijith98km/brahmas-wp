<?php
/* Template Name: Course page */
/* Template Post Type: page */
?>
<?php get_header(); ?>





<section class="dynamic_banner">
  <div class="banner_bg_image">
    <img src="<?php $bImg = get_field('banner_image'); echo esc_url($bImg['url']);?>" alt="@@title bg image">
  </div>
  <div class="main_title">
  <h1><?php the_field('banner_title');?></h1>
    <h5><?php the_field('banner_subtitle');?></h5>
  </div>
</section>
<section class="all_courses_listing_section">
  <div class="container">
    <div class="all_courses_listing_section_inner">
      <!-- <h2>Courses</h2> -->
      <div class="row">
        <div class="col-12 col-lg-9">
          <div class="courses_list row">

            <!-- query -->
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query(array(
              // 'category_name' => 'investor-news',
              'post_type' => 'courses',
              'posts_per_page' => 9,
              'paged' => $paged
            ));
            ?>

            <?php if ($query->have_posts()) : ?>

              <!-- begin loop -->
              <?php while ($query->have_posts()) : $query->the_post();
                $thereviews = get_field('reviews');
              ?>

                <div class="col-12 col-md-6 col-lg-4">
                  <a href="<?php the_permalink(); ?>" class="course_card">
                    <div class="course_img">
                      <img src="<?php $cimg = get_field('course_thumbnail_image');
                                echo esc_url($cimg['url']); ?>" alt="course image">
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_field('course_duration'); ?></p>

                    <?php
                    $courseCoach = get_field('coach');
                    if ($courseCoach) : ?>
                      <?php foreach ($courseCoach as $post) :
                        // Setup this post for WP functions (variable must be named $post).

                        setup_postdata($post);
                      ?>
                        <span><?php the_title() ?></span>

                      <?php endforeach; ?>
                      <?php
                      // Reset the global post object so that the rest of the page works correctly.
                      wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <h5 class="course_rating"><?php echo $thereviews; ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                      </svg>
                    </h5>
                  </a>
                </div>
              <?php endwhile; ?>
              <!-- end loop -->


              <!-- WHAT GOES HERE?????? -->


              <?php wp_reset_postdata(); ?>

            <?php else : ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>



          </div>
          <div class="custom_course_pagination wp_pagination">
            <?php
            echo paginate_links(array(
              'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
              'total'        => $query->max_num_pages,
              'current'      => max(1, get_query_var('paged')),
              'format'       => '?paged=%#%',
              'show_all'     => false,
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
          $sidebar_courses = get_field('featured_courses');
          if ($sidebar_courses) : ?>
            <div class="you_may_like_suggestion_list">
              <h5>Featured courses</h5>
              <ul>
                <?php foreach ($sidebar_courses as $post) :

                  // Setup this post for WP functions (variable must be named $post).
                  setup_postdata($post);
                  $sidrev = get_field('reviews', $post);
                  $siddur = get_field('course_duration', $post);

                ?>
                  <li>
                    <a href="<?php the_permalink(); ?>">
                      <img src=" <?php $fimg = get_field('course_thumbnail_image', $post);
                                  echo esc_url($fimg['url']); ?>" alt="course image">
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

          <div class="learm_more_about_courses_contact_box">
            <img src="<?php $cimg =  get_field('contact_image');
                      echo esc_url($cimg['url']); ?>" alt="contact banner image">
            <div class="content_details_wrap">
              <h4><?php the_field('contact_title'); ?></h4>

              <?php
              $contact = get_field('contact_link');
              if ($contact) :
                $link_url = $contact['url'];
                $link_title = $contact['title'];
                $link_target = $contact['target'] ? $contact['target'] : '_self';
              ?>
                <a class="explore_more" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                  </svg></a>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>