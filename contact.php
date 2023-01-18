<?php include 'include/header.php'; ?>
<?php include 'include/navbar.php'; 
      
      $obj = new blogProject();
      if(isset($_POST['submit_data'])){

          $msg = $obj -> contact_form_data($_POST);       
      }

?>

<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>contact us</h4>
            <h2>let’s stay in touch!</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Banner Ends Here -->

<!-- Contact section start here -->
<section class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="down-contact">
          <div class="row">
            <div class="col-lg-8">
              <div class="sidebar-item contact-form">
                <div class="sidebar-heading">
                  <h2>Send us a message</h2>
                </div>
                <div class="content">
                  <?php if(isset($msg)) { echo $msg; } ?>
                  <form id="contact" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name" type="text" id="name" placeholder="Your name" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="email" type="text" id="email" placeholder="Your email" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-12 col-sm-12">
                        <fieldset>
                          <input name="subject" type="text" id="subject" placeholder="Subject">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" rows="6" id="message" placeholder="Your Message" required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" name="submit_data" id="form-submit" class="main-button">Send Message</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="sidebar-item contact-information">
                <div class="sidebar-heading">
                  <h2>contact information</h2>
                </div>
                <div class="content">
                  <ul>
                    <li>
                      <span>Phone Number</span>
                      <h5 style="color:#F48840">090-484-8080</h5>
                    </li>
                    <li>
                      <span>Email Address</span>
                      <h5 style="color:#F48840">info@aamarpay.com</h5>
                    </li>
                    <li>
                      <span>Street Address</span>
                      <h5 style="color:#F48840">Plot 11, Road 2
                        <br>Jashimuddin Ave, Dhaka 1230
                      </h5>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Contact section end here -->

<!-- Google map start here -->
      <div class="col-lg-12">
        <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14594.722409761822!2d90.38461278039718!3d23.865472952522733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssoft%20tech%20innovation%20ltd%20location!5e0!3m2!1sen!2sbd!4v1673248766289!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
<!-- Google map end here -->

    </div>
  </div>
</section>

<?php include 'include/footer.php'; ?>