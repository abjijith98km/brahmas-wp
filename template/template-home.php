<?php
/* Template Name: Home page */
/* Template Post Type: page */
?>
<?php get_header(); ?>

<section class="homepage_banner">

  <?php if (have_rows('banner_slider')) : ?>

    <div class="homepage_banner_slider">
      <?php while (have_rows('banner_slider')) : the_row();
        $image = get_sub_field('slide_image');
        $title = get_sub_field('slide_title');
        $subtitle = get_sub_field('slide_subtitle');
      ?>

        <div class="banner_slide">
          <div class="bg_image">
            <img src="<?php echo esc_url($image['url']) ?>" alt="banner image">
          </div>
          <div class="slidecontent">
            <div class="container">
              <div class="banner_contnt">
                <h2><?php echo $title; ?></h2>
                <h6><?php echo $subtitle; ?></h6>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>


    </div>


  <?php endif; ?>


</section>

<?php if (have_rows('special_tactics_columns')) : ?>

  <section class="spl_tactics_grid">
    <div class="container">
      <div class="spl_tactics_grid_inner row">
        <?php while (have_rows('special_tactics_columns')) : the_row();
          $image = get_sub_field('tactic_image');
          $heading = get_sub_field('tactic_title');
          $description = get_sub_field('tactic_description');
        ?>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="spl_card-wrp">
              <div class="spl_logo">
                <img src="<?php echo esc_url($image['url']); ?>" alt="tactic icon">
              </div>
              <h4><?php echo $heading; ?></h4>
              <p><?php echo $description; ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>



<?php endif; ?>

<?php $aboutUsImage =  get_field('about_us_banner_image');
if ($aboutUsImage) :
  $badge = get_field('about_us_banner_badge');
  $title = get_field('about_us_baner_title');
  $desc = get_field('about_us_banner_short_description');
  $link = get_field('about_us_banner_link');
?>
  <section class="static_banner">
    <div class="banner-image">
      <img src="<?php echo esc_url($aboutUsImage['url']); ?>" alt="about us banner background image">
    </div>
    <div class="static_banner_content">
      <div class="container">
        <div class="content_inner_wrapper">
          <div class="content">
            <span><?php echo $badge; ?></span>
            <h1><?php echo $title; ?></h1>
            <h6><?php echo $desc; ?></h6>
            <?php
            if ($link) :
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
              <a class="explore_more" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                </svg></a>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php
$featured_courses = get_field('professional_courses');
if ($featured_courses) : ?>
  <section class="custom_our_programs_grid">
    <div class="container-fluid p-0">
      <div class="custom_title_wrapper">
        <h2><?php the_field('featured_courses_title'); ?></h2>
        <p><?php the_field('featured_courses_subtitle'); ?></p>
      </div>
      <div class="brahmas_prof_programs_grid">
        <?php foreach ($featured_courses as $post) :
          setup_postdata($post); ?>
          <div class="program_card row">
            <div class="col-12 col-md-6">
              <div class="image_wrap">
                <img src="<?php $fimage = get_field('course_thumbnail_image', $post);
                          echo esc_url($fimage['url']); ?>" alt="digital marketing">
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="program_desc">
                <h4><?php the_title(); ?></h4>
                <p><?php the_excerpt(); ?></p>
                <ul>
                  <li>
                    <span>Duration:</span><?php the_field('course_duration', $post); ?>
                  </li>
                  <li>
                    <span>Timings:</span><?php the_field('session_timings', $post); ?>
                  </li>
                </ul>
                <a href="<?php the_permalink(); ?>" class="see_more_details">Read More</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php
        wp_reset_postdata(); ?>
      </div>

      <?php
      $fcourseslink = get_field('featured_course_link');
      if ($fcourseslink) :
        $link_url = $fcourseslink['url'];
        $link_title = $fcourseslink['title'];
        $link_target = $fcourseslink['target'] ? $fcourseslink['target'] : '_self';
      ?>
        <a class="explore_more mx-auto mt-4" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
          </svg></a>
      <?php endif; ?>
    </div>
  </section>

<?php endif; ?>


<?php if (have_rows('why_choose_us_features')) : ?>
  <section class="what_we_offer">
    <div class="container">
      <div class="what_we_offer_wrapper row">
        <div class="col-12 col-lg-4">
          <div class="custom_title_wrapper">
            <h2><?php the_field('why_choose_us_title'); ?></h2>
            <p><?php the_field('why_choose_us_subtitle'); ?></p>
          </div>
          <ul class="our_specialities_listings">
            <?php while (have_rows('why_choose_us_features')) : the_row();
              $title = get_sub_field('title');
              $desc = get_sub_field('description');
            ?>
              <li>
                <div class="tick_mark_icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                  </svg>
                </div>
                <div class="spl_content_wrap">
                  <h5><?php echo $title; ?></h5>
                  <p><?php echo $desc; ?></p>
                </div>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
        <div class="col-12 col-lg-8">
          <div class="featured_spl_banner_image">
            <img src="<?php $fchooseimg = get_field('why_choose_us_side_iimage');
                      echo esc_url($fchooseimg['url']);   ?>" alt="specialities image">
          </div>
        </div>
      </div>
    </div>
  </section>


<?php endif; ?>


<?php
$certified_teachers = get_field('certified_teachers_list');
if ($certified_teachers) : ?>

  <section class="our_coaches">
    <div class="container">
      <div class="custom_title_wrapper">
        <h2><?php the_field('our_certified_teachers_title'); ?></h2>
        <p><?php the_field('our_certified_teachers_subtitle'); ?></p>
      </div>
      <div class="our_coaches_slider">
        <?php foreach ($certified_teachers as $post) :
          setup_postdata($post); ?>
          <div class="coach_slide">
            <div class="image_wrapper">
              <img src="<?php $timage = get_field('coach_image', $post);
                        echo esc_url($timage['url']); ?>" alt="<?php the_title(); ?>">
            </div>
            <div class="coach_details">
              <h5><?php the_title(); ?></h5>
              <span><?php the_field('coach_subject', $post); ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php
  // Reset the global post object so that the rest of the page works correctly.
  wp_reset_postdata(); ?>
<?php endif; ?>

<?php $trustedBannerTitle = get_field('trusted_students_title');
if ($trustedBannerTitle) :
?>
  <section class="trusted_students_banner">
    <div class="trusted_students_banner-content">
      <h2><?php echo $trustedBannerTitle; ?></h2>
      <p><?php the_field('trusted_students_short_descriptions'); ?></p>
      <?php
      $trustedLink = get_field('trusted_students_link');
      if ($trustedLink) :
        $link_url = $trustedLink['url'];
        $link_title = $trustedLink['title'];
        $link_target = $trustedLink['target'] ? $trustedLink['target'] : '_self';
      ?>
        <a class="explore_more" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
          </svg></a>
      <?php endif; ?>

    </div>
  </section>
<?php endif; ?>


<?php
$featured_blogs_events = get_field('homepage_blogs_and_events_list');
if ($featured_blogs_events) : ?>

  <section class="blogs_and_events">
    <div class="container">
      <div class="custom_title_wrapper">
        <h2><?php the_field('hommepage_blogs_and_events_title'); ?></h2>
        <p><?php the_field('hommepage_blogs_and_events_subtitle'); ?></p>
      </div>
      <div class="blogs_and_events_grid">
        <?php foreach ($featured_blogs_events as $post) :
          setup_postdata($post); ?>

          <a href="<?php the_permalink(); ?>" class=" blog">
            <div class="blog_img">
              <img src="<?php $bimg = get_field('blog_thumbnail_image', $post);
                        echo esc_url($bimg['url']); ?>" alt="blog image">
            </div>
            <div class="blog_content">
              <span class="posted_on"><?php the_field('blog_date', $post); ?></span>
              <div class="main_title">
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
              </div>
            </div>
          </a>
        <?php endforeach; ?>

        <?php
        wp_reset_postdata(); ?>
      </div>
      <?php
      $blogslink = get_field('hommepage_blogs_and_events_link');
      if ($blogslink) :
        $link_url = $blogslink['url'];
        $link_title = $blogslink['title'];
        $link_target = $blogslink['target'] ? $blogslink['target'] : '_self';
      ?>
        <a class="explore_more" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
          </svg></a>
      <?php endif; ?>

    </div>
  </section>

<?php endif; ?>

<?php if (have_rows('partner_images_slider')) : ?>
  <section class="partners_and_clients">
    <div class="custom_title_wrapper">
      <h2><?php the_field('titleClients_and_partners_title');?></h2>
      <p><?php the_field('subtitletitleClients_and_partners_subtitle');?></p>
    </div>
    <div class="partners_and_clients_innerwrap" id="partners_slider">
      <?php while (have_rows('partner_images_slider')) : the_row();
        $Partnerimage = get_sub_field('slide_image');
      ?>
        <div class="partner_logo">
          <img src="<?php echo esc_url($Partnerimage['url']); ?>" alt="partner logo">
        </div>
      <?php endwhile; ?>


    </div>
  </section>

<?php endif; ?>

<?php get_footer(); ?>