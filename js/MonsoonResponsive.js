
jQuery(document).ready(function($) {
  dismissFeedbackForm($);
  //global event listeners
  $('#feedback-form').on("submit", function(e) {
    e.preventDefault();
    $('.feedback-modal-message').empty();
    feedbackAjaxRequest(e);
  });
  $('#mr-feedback').on('hide.bs.modal', function(e) {
    dismissFeedbackForm($);
  })
});


function feedbackAjaxRequest(e) {
  if (typeof $ === 'undefined') {
    $ = jQuery;
  }
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
    setTimeout( "$('#mr-feedback').modal('hide')", 3000)
  });
}

function dismissFeedbackForm($) {
  $('#helpful-options-yes').prop('checked', true);
  $('#feedback-content').val("");
  $('.feedback-modal-message').empty();
}