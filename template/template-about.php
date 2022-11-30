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
        <h3><?php the_field('benefits_title'); ?></h3>
        <div class="row">
          <?php while (have_rows('benefits')) : the_row();
            $num = get_sub_field('number');
            $title = get_sub_field('title');
            $desc = get_sub_field('description');
          ?>
            <div class="col-12 col-lg-4">
              <div class="benefit">
                <span><?php echo $num; ?></span>
                <div class="body_content">
                  <h4><?php echo $title; ?></h4>
                  <p><?php echo $desc; ?></p>
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
      <h2><?php the_field('our_team_title'); ?></h2><!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p> -->
    </div>


    <?php if (have_rows('team_members')) : ?>
      <div class="our_team_grid row">
        <?php while (have_rows('team_members')) : the_row();
          $image = get_sub_field('image');
        ?>
      
          <div class="col-12 col-md-4 col-lg-3">
            <div class="member_detail_card">
              <div class="image">
                <img src="<?php echo $image; ?>" alt="Barney Stinson">
              </div>
              <h3><?php the_sub_field('name'); ?></h3>
              <h6><?php the_sub_field('designation'); ?></h6>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
    <?php endif; ?>


  </div>
</section>
<?php get_footer(); ?>