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
    header("HTTP/1.0 200 OK"); 
    break;
  default:
    header("HTTP/1.0 404 Not Found"); 
}

function feedbackForm() {
  $to = "meggers@monsooncommerce.com, clutz@monsooncommerce.com";
  $from = "From: noreply@monsoondev.io\r\n";
  $subject = "New Feedback Submited at Support Center";
  $message = "Feedback Submission:\n"
            . "Helpful? " . $_POST['helpful-options'] . "\n"
            . "Message: " . $_POST['feedback-content'];
  wp_mail($to, $subject, $message, $from);
  return;
}

function infoExchangeSignup() {
  $to = "meggers@monsooncommerce.com, clutz@monsooncommerce.com";
  $from = "From: noreply@monsoondev.io\r\n";
  $subject = "Signup Request for Info Exchange";
  $message = "New Signup Request for info exchange:\n"
            . "\tFirst Name: " . $_POST['ix-firstname'] . "\n"
            . "\tLast Name:  " . $_POST['ix-lastname'] . "\n"
            . "\tEmail:      " . $_POST['ix-email'];
  wp_mail($to, $subject, $message, $from);
  return;
}