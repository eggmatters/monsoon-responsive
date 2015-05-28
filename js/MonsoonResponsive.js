
jQuery(document).ready(function($) {
  //global event listeners
  $('#feedback-form').on("submit", function(e) {
    e.preventDefault();
    feedbackAjaxRequest(e);
  });
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
    alert("success");
  })
  .fail(function (jqXHR, status, errorThrown) {
    alert("failed");
  })
  .complete( function() { 
    alert("complete");
  });
}