
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
  $('#cu-submit').on('click', function(e) {
    var contactUs = new ContactUs($);
    e.preventDefault();    
    if (contactUs.validateForm()) {
      contactUs.ajaxRequest($);
    }
  });
  
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
    data: $('#info-exchange-signup-form').serializeArray()
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

function ContactUs($) {
  this.fname   = $('#cu-first-name');
  this.lname   = $('#cu-last-name');
  this.company = $('#cu-company');
  this.email   = $('#cu-email');
  this.phone   = $('#cu-phone');
  this.country = $('#cu-country');
  this.reason  = $('#cu-reason');
  this.response = $('#cu-response');
  this.form    = $('#cu-form');
  this.sentForm;
  this.setSelectListeners();
  this.checkJQ = function() {
    if (typeof $ === 'undefined') {
      return jQuery;
    } else {
      return $;
    }
  }
}

ContactUs.prototype = {
  validateForm: function() {
    $ = this.checkJQ();
    var self = this;
    var isValid = true;
    $.each(this.form[0], function(idx, formObject) {
      switch(formObject.type) {
        case "text":
        case "select-one":
        case "textarea":
          if (self.falsey(formObject.value)) {
            $('#' + formObject.id + "-error").html("<p class=required>You must enter a value</p>");
            isValid = false;
          }
          break;
      }
    });
    return isValid;
  },
  ajaxRequest: function($) {
    var self = this;
    $.ajax({
      timeout: 60000,
      type: "POST",
      url: $('#cu-form').prop('action'),
      data: $('#cu-form').serializeArray()
    })
    .success(function (xhrResponse) {})
    .fail(function (jqXHR, status, errorThrown) {})
    .complete( function() {
      self.removeForm(self);
    });
  },
  removeForm: function(self) {
    var $ = self.checkJQ();
    this.form[0].reset();
    this.sentForm = $('#cu-form-container').html();
    $('#cu-form-container').html('<a id="cu-form-restore"><p class="lead">Thank you! Your response is appreciated.<br>Click to restore this form</p></a>');
    $('#cu-form-restore').on('click', function(e) {
      e.preventDefault();
      self.resetForm(self);
    })
    
  },
  resetForm: function(self) {
    $('#cu-form-container').html(self.sentForm);
    $('#cu-submit').on('click', function(e) {
      if (self.validateForm()) {
        $ = self.checkJQ();
        self.ajaxRequest($);
      }
      e.preventDefault();
    });
  },
  falsey: function(val, acceptZeroes) {
    if (typeof acceptZeroes === 'undefined') {
      acceptZeroes = false;
    }
    if (typeof val === 'undefined') {
      return true;
    }
    if (val === null) {
      return true;
    }
    if (val === false) {
      return true;
    }
    if (val === 0 && !acceptZeroes) {
      return true;
    }
    if (val === "0" && !acceptZeroes) {
      return true;
    }
    if (val === "") {
      return true;
    }
    if (val === " ") {
      return true;
    }
  },
  setSelectListeners: function() {
    this.fname.unbind("focus");
    this.lname.unbind("focus");
    this.email.unbind("focus");
    this.company.unbind("focus");
    this.phone.unbind("focus");
    this.country.unbind("focus");
    this.reason.unbind("focus");
    this.response.unbind("focus");
    this.fname.on("focus", function(e) {
      jQuery('#cu-first-name-error').empty();
    });
    this.lname.on("focus", function(e) {
      jQuery('#cu-last-name-error').empty();      
    });
    this.company.on("focus", function(e) {
      jQuery('#cu-company-error').empty();
    });
    this.email.on("focus", function(e) {
      jQuery('#cu-email-error').empty();
    });
    this.phone.on("focus", function(e) {
      jQuery('#cu-phone-error').empty();
    });
    this.country.on("focus", function(e) {
      jQuery('#cu-country-error').empty();
    });
    this.reason.on("focus", function(e) {
      jQuery('#cu-reason-error').empty();
    });
    this.response.on("focus", function(e) {
      jQuery('#cu-response-error').empty();
    })
  }
  
};