<?php
/* Template Name: Contact page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
<section class="dynamic_banner">
  <div class="banner_bg_image">
    <img src="https://images.pexels.com/photos/63572/pexels-photo-63572.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="@@title bg image">
  </div>
  <div class="main_title">
    <h1>Contact us</h1>
    <h5>Lorem ipsum dolor sit amet.</h5>
  </div>
</section>
<section class="contact_us_details">
  <div class="container">
    <div class="contact_us_details_wrp row">
      <div class="col-12 col-lg-6">
        <div class="contact_us_map">
          <div class="mapouter">
            <div class="gmap_canvas">
              <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Pk Nair Rd, Kaloor, Kochi, Kerala 682025&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
              <a href="https://123movies-to.org">123movies</a>
              <br>
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 500px;
                  width: 600px;
                }
              </style>
              <a href="https://www.embedgooglemap.net">embedding a google map</a>
              <style>
                .gmap_canvas {

                  overflow: hidden;

                  background: none !important;

                  height: 500px;

                  width: 600px;

                }
              </style>
            </div>
          </div>
          <!-- <div class="address_bar">

            <h4>Address:</h4>

            <p>

              2nd Floor, Westwood Center, St.Vincent Convent Road, Pallinada,

              Palarivattom, Cochin – 25

            </p>

          </div>

          <div class="address_bar">

            <h4>Contact:</h4>

            <p>Mobile : +91 93883 19200, +91 93873 19200</p>

            <p>Phone : 0484-4015932</p>

            <p>Email: brahmassitehrms@gmail.com</p>

          </div> -->
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="contact_us_form">
          <h5>We would love to hear from You.</h5>
          <p>What do you want our help with?</p>

          <?php echo do_shortcode('[contact-form-7 id="365" title="Contact form 1"]'); ?>

        </div>
      </div>
    </div>
  </div>
</section>
<section class="contact_address">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="address_bar">
          <h4>Address:</h4>
          <p>2nd Floor, Westwood Center, St.Vincent Convent Road, Pallinada, Palarivattom, Cochin – 25</p>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="address_bar">
          <h4>Contact:</h4>
          <p>Mobile : +91 93883 19200, +91 93873 19200</p>
          <p>Phone : 0484-4015932</p>
          <p>Email: brahmassitehrms@gmail.com</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="news_letter">
  <div class="container">
    <div class="news_letter_form_wrap">
      <?php echo do_shortcode('[contact-form-7 id="378" title="News article"]'); ?>
     
    </div>
  </div>
</section>
<?php get_footer(); ?>