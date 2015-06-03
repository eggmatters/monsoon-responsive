<?php
/*
Template Name: Contact Us

Used for: Contacting Us
*/
get_header();
?>
<style>
  .contact {
    margin-top: 5%;
  }
  h1 {
    font-size: 52px;
  }
  .contact-paragraph {
    font-size: 22px;
  }
  h3 {
    font-weight: bold;
  }
  address {
    padding-top: 2%;
    line-height: 1.9;
    font-size: 18px;
  }
  .map-container-6 {
    margin-top: 4%;
  }
  .map-size-6 {
    width: 100%;
    height: 200px;
  }
  .map-container-3 {
    margin-top: 8%;
  }
  .jumbofont {
    color: #000;
  }
  .jumbofont > .container > lead {
    font-size: 21px;
    font-weight: 700;
  }
  .contact-form > input, select {
    width: 47.5%;
    color: #011924;
    background-color: #fff;
    font-size: 16px;
    padding: 10px;
    letter-spacing: normal;
    outline-style: none;
    border: medium none;
  }
  .contact-form > p {
    margin-top: 4%;
  }
  .required {
    color: red;
  }
  /* Smartphones (portrait and landscape) ----------- */
  @media only screen 
  and (min-device-width : 320px) 
  and (max-device-width : 480px) {
    .contact-form > input, select {
      width: 100%;
    }
  }

  /* Smartphones (landscape) ----------- */
  @media only screen 
  and (min-width : 321px) {
    .contact-form > input, select {
      width: 100%;
    }
  }

  /* Smartphones (portrait) ----------- */
  @media only screen 
  and (max-width : 320px) {
    .contact-form > input, select {
      width: 100%;
    }
  }

  /* iPads (portrait and landscape) ----------- */
  @media only screen 
  and (min-device-width : 768px) 
  and (max-device-width : 1024px) {
    .contact-form > input, select {
      width: 100%;
    }
  }

  /* iPads (landscape) ----------- */
  @media only screen 
  and (min-device-width : 768px) 
  and (max-device-width : 1024px) 
  and (orientation : landscape) {
    .contact-form > input, select {
      width: 100%;
    }
  }

  /* iPads (portrait) ----------- */
  @media only screen 
  and (min-device-width : 768px) 
  and (max-device-width : 1024px) 
  and (orientation : portrait) {
   .contact-form > input, select {
      width: 100%;
    }
  }

  /* iPhone 4 ----------- */
  @media
  only screen and (-webkit-min-device-pixel-ratio : 1.5),
  only screen and (min-device-pixel-ratio : 1.5) {
    .contact-form > input, select {
      width: 100%;
    }
  }
  @media only screen and (min-device-width: 981px) {
    .contact-form > input, select {
      width: 47.5%;
    }
  }

  
  
</style>
<div class="container-fluid contact">
  <div class="row">
    <p>&nbsp;</p> 
 </div>
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1>Contact Us</h1>
      <p class="contact-paragraph">Reach out for sales, support, and more</p>
    </div>
  </div>
  <p>&nbsp;</p>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h3>GLOBAL CORPORATE HEADQUARTERS</h3>
        <address>
          520 NW Davis Street<br>
          Suite 300<br>
          Portland, OR 97209<br>
          Phone: 503-239-1055<br>
        </address>
      </div>
      <div class="col-lg-6">
        <div class="map-container-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.2925766967446!2d-122.6758525!3d45.524317599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54950a00e1c15323%3A0x7819ed5f19534639!2s520+NW+Davis+St!5e0!3m2!1sen!2sus!4v1433364831304" class="map-size-6" frameborder="0" style="border:0"></iframe>
        </div>
      </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
      <div class="col-lg-3">
        <h3>EMERYVILLE OFFICE</h3>
        <address>
          1250 45th Street<br>
          Suite 100<br>
          Emeryville, CA 94608<br>
          Phone: 510-594-4500
        </address>
      </div>
      <div class="col-lg-3">
        <div class="map-container-3">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.135200869485!2d-122.2844197!3d37.8337206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80857e6b010aec6f%3A0x335fb9073851af70!2s1250+45th+St%2C+Emeryville%2C+CA+94608!5e0!3m2!1sen!2sus!4v1433365536785" class="map-size-6" frameborder="0" style="border:0"></iframe>
        </div>
      </div>
      <div class="col-lg-3">
        <h3>PHILADELPHIA OFFICE</h3>
        <address>
          399 Arcola Road<br>
          Suite 200<br>
          Collegeville, PA 19426<br>
          Phone: 484-927-4804<br>
        </address>
      </div>
      <div class="col-lg-3">
        <div class="map-container-3">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6098.77755047681!2d-75.46397124391754!3d40.15589691542109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6911dbaef4761%3A0x2bb3c33faa1160c6!2s399+Arcola+Rd%2C+Collegeville%2C+PA+19426!5e0!3m2!1sen!2sus!4v1433365701692" class="map-size-6"frameborder="0" style="border:0"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jumbotron noBottomMargin topMargin60 jumbofont">
  <div class="container">
    <lead>Please tell us a it about yourself so we can connect you with the right person</lead>
    <form class="contact-form">
      <p>First Name <span class="required">*</span></p>
      <input id="cu-first-name" name="cu_first_name">
      <p>Last Name <span class="required">*</span></p>
      <input id="cu-last-name" name="cu_last_name">
      <p>Company <span class="required">*</span></p>
      <input id="cu-company" name="cu_company">
      <p>Email <span class="required">*</span></p>
      <input id="cu-email" name="cu_email">
      <p>Phone <span class="required">*</span></p>
      <input id="cu-phone" name="cu-phone">
      <p>Country <span class="required">*</span></p>
      <select id="cu-country" name="cu-country">
        <option value="0">Select One</option>
        <option value="United States">United States</option>
        <option value="Canada">Canada</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="France">France</option>
        <option value="Germany">Germany</option>
        <option value="Australia">Australia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="">Other</option>
      </select>
    </form>
  </div>
</div>

<?php get_footer();
