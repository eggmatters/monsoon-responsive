<?php
/*
Template Name: Contact Us

Used for: Contacting Us
*/
get_header();

?>

<div class="container-fluid contact">
  <div class="row">
    <p>&nbsp;</p> 
 </div>
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="contact-h1">Contact Us</h1>
    </div>
  </div>
  <p>&nbsp;</p>
</div>
<div class="jumbotron noBottomMargin topMargin60 jumbofont">
  <div class="container" id="cu-form-container">
    <p class="lead">Please tell us a bit about yourself so we can connect you with the right person</p>
    <form class="contact-form" id="cu-form" name="cu_form" action="<?php echo get_mr_theme_root_uri() . '/ajax.php'; ?>">
      <input type="hidden" name="post_method" value="contact-us-form">
      <p>First Name <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-first-name-error"></div>
      <input class="cu-controls" id="cu-first-name" name="cu_first_name">
      <p>Last Name <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-last-name-error"></div>
      <input class="cu-controls" id="cu-last-name" name="cu_last_name">
      <p>Company <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-company-error"></div>
      <input class="cu-controls" id="cu-company" name="cu_company">
      <p>Email <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-email-error"></div>
      <input class="cu-controls" id="cu-email" name="cu_email">
      <p>Phone <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-phone-error"></div>
      <input class="cu-controls"  id="cu-phone" name="cu_phone">
      <p>Country <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-country-error"></div>
      <select class="cu-controls" id="cu-country" name="cu_country">
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
      <p>Reason you are contacting us today  <span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-reason-error"></div>
      <select class="cu-controls" id="cu-reason" name="cu_reason">
        <option value="0">Select One</option>
        <option value="Sales">Sales</option>
        <option value="Employment Opportunity">Employment Opportunity</option>
        <option value="Press, Media, and Marketing">Press, Media, and Marketing</option>
        <option value="Partner Integrations">Partner Inquiries</option>
        <option value="Support Request">Support Request</option>
        <option value="Professional Services">Professional Services</option>
        <option value="Other">Other</option>
      </select>      
      <p>How can we help?<span class="required">*</span></p>
      <div class="cu-form-errors" id="cu-response-error"></div>
      <textarea class="text-area cu-controls" id="cu-response" name="cu_response" class="text-area" cols="12" rows="10"></textarea><br>
      <button class="btn btn-contact" id="cu-submit">SUBMIT</button>
    </form>
  </div>
</div>
<div class="container-fluid contact">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="contact-h1">Sales, Support and General Inquiries</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-uppercase contact-h3">Contact a sales representative for ecommerce solutions</h3>
      <address class="contact-address">
        U.S toll-free: 1-800-520-2294<br>
        U.K toll-free: 0-800-014-8424
      </address>
      <h3 class="text-uppercase contact-h3">Support for monsoon marketplace and monsoon oms</h3>
      <address class="contact-address">Our support hours are from 6:00am to 6:00pm PST</address>
   </div>
  </div>
</div>
<?php get_footer();
