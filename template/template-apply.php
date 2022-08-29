<?php
/* Template Name: Apply page */
/* Template Post Type: page */
?>
<?php get_header(); ?>
<section class="contact_us_form_pixel">
    <div class="container">
      <div class="contact_us_form_pixel_wrap">
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="side_image">
              <div class="why_join_us">
                <h5>How it works</h5>
                <ul class="row">
                  <li class="col-4 col-md-12">
                    <div class="img">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                      </svg>
                    </div>
                    <h6>Search your job.</h6>
                  </li>
                  <li class="col-4 col-md-12">
                    <div class="img">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                      </svg>
                    </div>
                    <h6>Apply For the position.</h6>
                  </li>
                  <li class="col-4 col-md-12">
                    <div class="img">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                      </svg>
                    </div>
                    <h6>Upload your cv and details.</h6>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <form id="submit_cv" autocomplete="off">
              <h3>Apply for the position.</h3><!-- <h4>Please fill your details and we will get back to you.</h4> -->
              <div class="row">
                <div class="col-md-6 col-12">
                  <fieldset>
                    <input type="text" name="userName" placeholder="Name" required>
                    <label for="userName">Name</label>
                  </fieldset>
                </div>
                <div class="col-md-6 col-12">
                  <fieldset>
                    <input type="email" name="userMail" placeholder="Email" required>
                    <label for="userMail">Email</label>
                  </fieldset>
                </div>
                <div class="col-md-6 col-12">
                  <fieldset>
                    <input type="tel" name="userMobile" placeholder="Mobile" required>
                    <label for="userMobile">Mobile</label>
                  </fieldset>
                </div>
                <div class="col-md-6 col-12">
                  <fieldset>
                    <div id="experience_in_yrs" class="field_selectbox">
                      <!-- <div id="experience_selector" class="field_selectbox"> -->
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
                    </div>
                  </fieldset>
                </div>
                <div class="col-md-6 col-12">
                  <fieldset>
                    <input type="text" name="current_ctc" placeholder="Current CTC" required>
                    <label for="current_ctc">Current CTC</label>
                  </fieldset>
                </div>
                <div class="col-md-6 col-12">
                  <fieldset>
                    <input type="text" name="expected_ctc" placeholder="Expected CTC" required>
                    <label for="expected_ctc">Expected CTC</label>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset>
                    <input type="text" name="currrent_profession" placeholder="Current Profession" required>
                    <label for="currrent_profession">Current Profession</label>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset>
                    <input type="text" name="currrent_employer" placeholder="Current Employer" required>
                    <label for="currrent_employer">Current Employer</label>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset>
                    <input type="text" name="notice_period" placeholder="Notice Period" required>
                    <label for="notice_period">Notice Period</label>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset>
                    <textarea name="address" id="" cols="30" rows="10" placeholder="Skill sets" required></textarea>
                    <label for="address">Skill Sets</label>
                  </fieldset>
                </div>
                <div class="col-12">
                  <fieldset class="applying_for">
                    <label for="applying_for">Applying for</label>
                    <input type="text" name="applying_for" placeholder="Opportunity For Java Developers in a Product based company" readonly="readonly">
                  </fieldset>
                </div>
                <div class="col-md-6 col-12">
                  <fieldset>
                    <div class="file_uploader">
                      <input type="file" id="cv_uploader">
                      <label for="cv_uploader">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
                          <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z" />
                        </svg>
                      </label>
                      <span>Choose File</span>
                    </div>
                  </fieldset>
                </div>
                <div class="col-md-6 col-12 terms_nd_privacy">
                  <fieldset>
                    <input type="checkbox" name="privacy_policy" id="privacy_policy">
                    <label for="privacy_policy">Accept privacy policy</label>
                  </fieldset>
                  <fieldset>
                    <input type="checkbox" name="terms_conditions" id="terms_conditions">
                    <label for="terms_conditions">Accept Terms and conditions</label>
                  </fieldset>
                </div>
              </div>
              <input type="submit" placeholder="Sumbit" class="submit_form_btn">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>