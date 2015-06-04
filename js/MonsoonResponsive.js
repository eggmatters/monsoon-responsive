
jQuery(document).ready(function($) {
  dismissFeedbackForm($);
  //global event listeners
  $('#feedback-form').on("submit", function(e) {
    e.preventDefault();
    $('.feedback-modal-message').empty();
    feedbackAjaxRequest($);
  });
  $('#mr-feedback').on('hide.bs.modal', function(e) {
    dismissFeedbackForm($);
  });
  $('#ix-signup').on('click', function() {
    $('#ix-email').val($('#info-exchange-signup-email').val());
  });
  $('#ix-subscribe').on('click', function() {
    infoExchangeSignupAjaxRequest($);
  });
  $('#mr-ix-signup').on('hide.bs.modal', function(e) {
    dismissIXSignupForm($);
  });
  $('#cu-phone').inputmask('(999)-999-9999');
  
});


function feedbackAjaxRequest($) {
  $.ajax({
    timeout: 60000,
    type: "POST",
    url: $('#feedback-form').prop('action'),
    data: $('#feedback-form').serializeArray(),
  })
  .success(function (xhrResponse) {
    
  })
  .fail(function (jqXHR, status, errorThrown) {

  })
  .complete( function() { 
    $('.feedback-modal-message').append('<p style="color:blue">Thank you, your input is greatly appreciated!</p>');
    setTimeout( "jQuery('#mr-feedback').modal('hide')", 3000)
  });
}

function infoExchangeSignupAjaxRequest($) {
  var valid = true;
  if ($('#ix-firstname').val().length === 0) {
    $('#ix-firstname').before('<span class="ix-errors"><p class="text-danger">You must provide a First Name</p></span>');
    valid = false;
  }
  if ($('#ix-lastname').val().length === 0) {
    $('#ix-lastname').before('<span class="ix-errors"><p class="text-danger">You must provide a Last Name</p></span>');
    valid = false;
  }
  if ($('#ix-email').val().length === 0) {
    $('#ix-lastname').before('<span class="ix-errors"><p class="text-danger">You must provide an email</p></span>');
    valid = false;
  }
  if (!valid) { return; }
  
  $.ajax({
    timeout: 60000,
    type: "POST",
    url: $('#info-exchange-signup-form').prop('action'),
    data: $('#info-exchange-signup-form').serializeArray(),
  })
  .success(function (xhrResponse) {
    
  })
  .fail(function (jqXHR, status, errorThrown) {

  })
  .complete( function() { 
    $('#info-exchange-signup-email').val("");
    $('#info-exchange-signup-email').prop('placeholder', 'Thank you!');
    $('#ix-signup').addClass('disabled');
    $('.ix-signup-modal-message').append('<p style="color:blue">Thank you!</p>');
    setTimeout( "jQuery('#mr-ix-signup').modal('hide')", 3000);
  });
}

function dismissFeedbackForm($) {
  $('#helpful-options-yes').prop('checked', true);
  $('#feedback-content').val("");
  $('.feedback-modal-message').empty();
}

function dismissIXSignupForm($) {
  $('.ix-signup-modal-message').empty();
  $('.ix-errors').remove();
  $('#info-exchange-signup-form')[0].reset();
}