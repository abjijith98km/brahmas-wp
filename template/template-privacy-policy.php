<?php
/* Template Name: Privacy policy page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
<section class="content_pages_section bg-light py-5 my-5">
  <div class="container">
    <div class="content_pages_section_innerwrap">
      <h1><?php the_title();?></h1>
      <div class="body_copy">
      <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>