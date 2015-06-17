<?php
require_once '../../../wp-load.php';

$postMethod = isset($_POST['post_method']) ? $_POST['post_method'] : false;

switch($postMethod) {
  case "feedback-form":
    feedbackForm();
    break;
  case "info-exchange-signup-form":
    infoExchangeSignup();
    break;
  case "contact-us-form":
    contactUsSubmit();
    break;
  case "support-ticket-modal":
    showSupportTicketModal();
    break;
  default:
    header("HTTP/1.0 422 Unprocessable Entity"); 
}

function feedbackForm() {
  $to = "meggers@monsooncommerce.com, clutz@monsooncommerce.com";
  $from = "From: noreply@monsoondev.io\r\n";
  $subject = "New Feedback Submited at Support Center";
  $message = "Feedback Submission:\n"
            . "Message: " . getField('feedback-content');
  wp_mail($to, $subject, $message, $from);
  return;
}

function infoExchangeSignup() {
  $to = "meggers@monsooncommerce.com, clutz@monsooncommerce.com";
  $from = "From: noreply@monsoondev.io\r\n";
  $subject = "Signup Request for Info Exchange";
  $message = "New Signup Request for info exchange:\n"
            . "\tFirst Name: " . getField('ix-firstname') . "\n"
            . "\tLast Name:  " . getField('ix-lastname') . "\n"
            . "\tEmail:      " . getField('ix-email');
  wp_mail($to, $subject, $message, $from);
  return;
}

function contactUsSubmit() {
  $contactUsContacts = array(
    "Sales" => "ldunn@monsooncommerce.com",
    "Employment Opportunity" => "kbeggs@monsooncommerce.com",
    "Press, Media, and Marketing" => "professionalservices@monsooncommerce.com",
    "Partner Integrations" => "professionalservices@monsooncommerce.com",
    "Support Request" => "support@monsooncommerce.com", 
    "Professional Services" => "professionalservices@monsooncommerce.com",
    "Other" => "professionalservices@monsooncommerce.com"
  );
  $name       = getField('cu_first_name') . " " . getField('cu_last_name');
  $company    = getField('cu_company');
  $email      = getField('cu_email');
  $phone      = getField('cu_phone');
  $country    = getField('cu_country');
  $department = getField('cu_reason');
  $to         = array_key_exists($department, $contactUsContacts) ? $contactUsContacts[$department] : "professionalservices@monsooncommerce.com";
  $body       = getField('cu_response');
  $from       = "From: noreply@monsoondev.io\r\n";
  $subject    = "Contact Us Request for $department from support.monsooncommerce.com";
  $message    = "Web Request from support.monsooncommerce.com:\n"
              . "\tName: $name\n"
              . "\tCompany: $company\n"
              . "\tEmail: $email\n"
              . "\tPhone: $phone\n"
              . "\tCountry: $country\n\n"
              . getField('cu_response');
  wp_mail($to, $subject, $message, $from);
}

function showSupportTicketModal() {
  echo do_shortcode('[MC_SupportCreate]');
}

function getField($fieldname) {
  return isset($_POST[$fieldname]) ? $_POST[$fieldname] : "";
}

