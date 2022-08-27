<?php
/* Template Name: About page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
<section class="dynamic_banner">
  <div class="banner_bg_image">
    <img src="<?php $aboutimg = get_field('banner_image');
              echo esc_url($aboutimg['url']); ?>" alt=" bg image">
  </div>
  <div class="main_title">
    <h1><?php the_field('banner_title'); ?></h1>
    <h5><?php the_field('banner_subtitle'); ?></h5>
  </div>
</section>
<section class="about_us_title">
  <div class="container">
    <h1><?php the_field('about_us_main_title'); ?></h1>
    <?php the_field('our_vision'); ?>
    <div class="featured_about_us_image_banner">
      <img src=" <?php $teamimg = get_field('team_image');
                  echo esc_url($teamimg['url']); ?>" alt="our team members">
    </div><!-- <h2>Brahmas is here to provide you with the coaching and access to knowledge of what it takes to build a profitable business agency.</h2> -->
  </div>
</section>
<section class="about_us_title">
  <div class="container">
    <div>
      <?php the_field('our_history'); ?>
    </div>
  </div>
</section>

<?php if (have_rows('benefits')) : ?>
    <section class="benefits_of_coaching">
      <div class="container">
        <div class="benefits_of_coaching_inner">
          <h3><?php the_field('benefits_title');?></h3>
          <div class="row">
            <?php while (have_rows('benefits')) : the_row();
              $num = get_sub_field('number');
              $title = get_sub_field('title');
              $desc = get_sub_field('description');
            ?>
              <div class="col-12 col-lg-4">
                <div class="benefit">
                  <span><?php echo $num;?></span>
                  <div class="body_content">
                    <h4><?php echo $title;?></h4>
                    <p><?php echo $desc;?></p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>

<section class="our_team">
  <div class="container">
    <div class="custom_title_wrapper">
      <h2>Our awesome team</h2><!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p> -->
    </div>
    <div class="our_team_grid row">
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://coachfocus.qodeinteractive.com/wp-content/uploads/2022/04/main-team-img-4.jpg" alt="Barney Stinson">
          </div>
          <h3>Barney Stinson</h3>
          <h6>CEO</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://coachfocus.qodeinteractive.com/wp-content/uploads/2022/04/main-team-img-5.jpg" alt="Lent Aldrin">
          </div>
          <h3>Lent Aldrin</h3>
          <h6>Human Resource</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://coachfocus.qodeinteractive.com/wp-content/uploads/2022/04/main-team-img-3.jpg" alt="Marsha Eriksen">
          </div>
          <h3>Marsha Eriksen</h3>
          <h6>Technical</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://coachfocus.qodeinteractive.com/wp-content/uploads/2022/04/main-team-img-1.jpg" alt="Teda Mosty">
          </div>
          <h3>Teda Mosty</h3>
          <h6>P.M.</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://coachfocus.qodeinteractive.com/wp-content/uploads/2022/04/main-team-img-8.jpg" alt="Maden Schmidt">
          </div>
          <h3>Maden Schmidt</h3>
          <h6>PRO</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://emeritus.qodeinteractive.com/wp-content/uploads/2020/11/course-single-instructor-03-big-1.jpg" alt="Loreta Smith">
          </div>
          <h3>Loreta Smith</h3>
          <h6>Teacher</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://emeritus.qodeinteractive.com/wp-content/uploads/2020/12/p2-instructor-03.jpg" alt="Leah Chatman">
          </div>
          <h3>Leah Chatman</h3>
          <h6>GM</h6>
        </div>
      </div>
      <div class="col-12 col-md-4 col-lg-3">
        <div class="member_detail_card">
          <div class="image">
            <img src="https://emeritus.qodeinteractive.com/wp-content/uploads/2020/12/course-single-instructor-01-big.jpg" alt="">
          </div>
          <h3>Brenda Harris</h3>
          <h6>Teacher</h6>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>