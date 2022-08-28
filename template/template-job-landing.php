<?php
/* Template Name: Jobs landing page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
<section class="jobs_listing_banner bg_overlay">
  <div class="bg_image">
    <img src="<?php $bgImg = get_field('banner_background_image');
              echo esc_url($bgImg['url']); ?>" alt="Jobs banner background image">
  </div>
  <div class="body_coontents">
    <div class="container">
      <div class="content_wrapper">
        <h2><?php the_field('banner_title'); ?></span>
        </h2>
        <h4><?php the_field('banner_ssubtitle'); ?></h4>
        <!-- <div class="filter_through_listing">
            <div class="field_selectbox">
              <select name="" id="designation_selector">
                <option value="" disabled="disabled" selected="selected">Designation</option>
                <option value="JAVA developer">JAVA developer</option>
                <option value="Wordpress developer">Wordpress developer</option>
                <option value="Digital manager">Digital manager</option>
                <option value="Full stack Technical lead">Full stack Technical lead</option>
                <option value="Python developer">Python developer</option>
                <option value="UI/UX degigner">UI/UX degigner</option>
              </select>
              <div class="icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                  <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                  <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                </svg>
              </div>
            </div>
            <div class="field_selectbox">
              <select name="" id="location_selector">
                <option value="" disabled="disabled" selected="selected">Location</option>
                <option value="Kochi">Kochi</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Trivandrum">Trivandrum</option>
                <option value="Calicut">Calicut</option>
                <option value="Allappey">Allappey</option>
                <option value="Chennai">Chennai</option>
                <option value="Mangalore">Mangalore</option>
              </select>
              <div class="icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                </svg>
              </div>
            </div>
            <div id="experience_selector" class="field_selectbox mb-0">
              <select name="" id="select_experience">
                <option value="" disabled="disabled" selected="selected">Experience</option>
                <option value="0">Fresher</option>
                <option value="1">1 year</option>
                <option value="2">2 years</option>
                <option value="3">3 years</option>
                <option value="4">4 years</option>
                <option value="5">5 years</option>
                <option value="6">6 years</option>
                <option value="7">7 years</option>
                <option value="8">8 years</option>
                <option value="9">9 years</option>
                <option value="10">10 years</option>
                <option value=">10">Above 10 years</option>
              </select>
              <div class="icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg>
              </div>
            </div>
            <button class="search_filter">Search</button>
          </div> -->
      </div>
    </div>
  </div>
</section>

<section class="featured_jobs_listing bg_white">
  <div class="container">
    <div class="featured_job_listing_inner_wrap">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query(array(
              'post_type' => 'jobs',
              'posts_per_page' => 12,
              'paged' => $paged
            ));
            ?>
      <div class="title_main">
        <h3>All jobs</h3>
        <!-- <span>Page <?php echo  $paged?> of 24</span> -->
      </div>
      <div class="row">
        <div class="col-lg-9 col-12">
          <div class="row">

            <!-- query -->

            <?php if ($query->have_posts()) : ?>

              <!-- begin loop -->
              <?php while ($query->have_posts()) : $query->the_post(); ?>

                <div class="col-md-6 col-lg-6 col-xl-4 col-12">
                  <div class="jobs_listing_card_wrapper">
                    <div class="company_image">
                      <img src="<?php $companyimg = get_field('company_image');
                                echo esc_url($companyimg['url']); ?>" alt="company image">
                    </div>
                    <span class="posted_date"><?php echo get_the_date(); ?></span>
                    <h5><?php the_title(); ?></h5>
                    <div class="job_features">
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                          <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z" />
                        </svg><?php the_field('required_experience_iin_years'); ?> Years
                      </h6>
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                          <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                          <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                        </svg><?php the_field('pay_range_in_lpa'); ?>
                      </h6>
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg><?php the_field('location'); ?>
                      </h6>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="info">Read More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                      </svg>
                    </a>
                  </div>
                </div>

              <?php endwhile; ?>
              <!-- end loop -->


              <!-- WHAT GOES HERE?????? -->


              <?php wp_reset_postdata(); ?>

            <?php else : ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <!-- <div class="col-md-6 col-lg-6 col-xl-4 col-12">
                <div class="wrapper">
                  <div class="header">
                    <div class="image_wrap">
                      <img src="./images/about-img.jpg" alt="company image">
                    </div>
                    <div class="published_date">
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                          <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                          <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                          <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                        </svg>2 days ago
                      </h6>
                    </div>
                  </div>
                  <div class="body_content">
                    <h5>Opportunity For Python Developers in a Product based company</h5>
                    <div class="details">
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                          <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z" />
                        </svg> 4-9 Yrs
                      </h6>
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                          <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                          <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                        </svg> 16,00,000 - 27,50,000 PA.
                      </h6>
                      <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>Hyderabad/Secunderabad
                      </h6>
                    </div>
                    <div class="description">
                      <h6>Short Description:-</h6>
                      <p>A progressive technology company headquartered in North Carolina…</p>
                    </div>
                  </div>
                  <a href="/job-details.html" class="read_more_info">Read More</a>
                </div>
              </div> -->

          </div>
          <div class="custom_course_pagination wp_pagination">
            <?php
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
          <!-- <div class="pagination_nav">

            <ul>

              <li class="nav_btn">

                <a href="#">Prev</a>

              </li>

              <li class="active_page">

                <a href="#">1</a>

              </li>

              <li class="others">

                <a href="#">2</a>

              </li>

              <li class="others">

                <a href="#">3</a>

              </li>

              <li class="disabled">

                <a href="#">...</a>

              </li>

              <li class="others">

                <a href="#">23</a>

              </li>

              <li class="others">

                <a href="#">24</a>

              </li>

              <li class="nav_btn">

                <a href="#">Next</a>

              </li>

            </ul>

          </div> -->
        </div>
        <div class="col-lg-3 col-12">

          <div class="sticky_sidebar">

            <div class="cv_upload_block">
              <div class="image">
                <img src="<?php $bgSideImg = get_field('upload_cv_background_image');
                          echo esc_url($bgSideImg['url']); ?>" alt="job image">
              </div>
              <div class="content_block">
                <h3><?php the_field('upload_cv_title'); ?></h3>
                <p><?php the_field('upload_cv_description'); ?></p>
                <a href="/contact-job.html" class="drop_cv"><?php the_field('link_text'); ?></a>
              </div>
            </div>
            <!-- <div class="sidebar_filter">
              <h4>Filter by Category</h4>
              <ul>
                <li class="filter_active">
                  <a href="#">Architech</a>
                </li>
                <li>
                  <a href="#">Digital marketing</a>
                </li>
                <li>
                  <a href="#">Frontent development</a>
                </li>
                <li>
                  <a href="#">IT Consulting</a>
                </li>
                <li>
                  <a href="#">Backend Java</a>
                </li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>