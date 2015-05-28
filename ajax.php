<?php
require_once '../../../wp-load.php';

$postMethod = isset($_POST['post_method']) ? $_POST['post_method'] : false;

switch($postMethod) {
  case "feedback-form":
    feedbackForm();
    break;
  default:
    header("HTTP/1.0 404 Not Found"); 
}

function feedbackForm() {
  $to = "clutz@monsooncommerce.com";
  $from = "From: noreply@monsoondev.io\r\n";
  $subject = "New Feedback Submited at Support Center";
  $message = "Feedback Submission:\n"
            . "Helpful? " . $_POST['helpful-options'] . "\n"
            . "Message: " . $_POST['feedback-content'];
  wp_mail($to, $subject, $message, $from);
  return;
}