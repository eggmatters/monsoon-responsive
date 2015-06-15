
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
  if ($('#cu-phone').length > 0) {
    $('#cu-phone').inputmask('(999)-999-9999');
  }
  $('#cu-submit').on('click', function(e) {
    var contactUs = new ContactUs($);
    e.preventDefault();    
    if (contactUs.validateForm()) {
      contactUs.ajaxRequest($);
    }
  });
  if (typeof categoryPosts !== 'undefined') {
    var categoriesLayout = new PaginationLayout(categoryPosts, 1, 24, 'catPaginate');
    var fn = categoriesLayout.displayCategoriesByPage(categoriesLayout);
    fn();
    categoriesLayout.setPagination();
    setPaginationEvents(categoriesLayout.displayCategoriesByPage, categoriesLayout);
  }
  if (typeof searchPosts !== 'undefined') {
    var searchLayout = new PaginationLayout(searchPosts, 1, 10, 'searchPaginate');
    var fn = searchLayout.displaySearchResultsByPage(searchLayout);
    fn();
    searchLayout.setPagination();
    setPaginationEvents(searchLayout.displaySearchResultsByPage, searchLayout);
  }
  $('.support-create-request').on('click', function(e) {
    SupportTickets.openSubmitNewDialog(e);
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
function  renderSupportTicketForm($) {
  $.ajax({
    timeout: 60000,
    type: "POST",
    url: $('#cu-form').prop('action'),
    data: { post_method: "support-ticket-modal" }
  })
  .success(function (xhrResponse) {
    alert("got here");
  })
  .fail(function (jqXHR, status, errorThrown) {
    alert("fail");
  })
  .complete( function() {
  });
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
    });    
  }
};

function PaginationLayout(currentObject, page, resultsPerPage, elId) {
  this.currentObject = currentObject;
  if (typeof page !== 'undefined') {
    this.currentPage = 1;
  } else {
    this.currentPage = parseInt(page);
  }
  this.checkJQ = function() {
    if (typeof $ === 'undefined') {
      return jQuery;
    } else {
      return $;
    }
  }
  this.resultsPerPage = parseInt(resultsPerPage);
  this.elId = elId;
}

PaginationLayout.prototype = {
  setPagination: function() {
    $ = this.checkJQ();
    var pages = Math.ceil(parseInt(this.currentObject.length) / this.resultsPerPage);
    var startPage = (this.currentPage - 3 <= 0) ? 1 : this.currentPage - 3;
    var html = '';
    if (this.currentPage !== 1) {
    var html = '<li>' +
      '  <a href="" class="pagePrevious" aria-label="Previous">' +
      '    <span aria-hidden="true">&laquo;</span>' +
      '  </a>' +
      '</li>';
    }
    for (var i = startPage; i <= pages; i++) {
      if (i === this.currentPage) {
        html += '<li class="active"><a href="" class="pageSelect">' + i + '</a></li>';
      } else {
        html += '<li><a href="" class="pageSelect">' + i + '</a></li>';
      }
    }
    if (this.currentPage < pages ) {
      html +=  '<li>' +
        '  <a href="" class="pageNext" aria-label="Next">' +
        '    <span aria-hidden="true">&raquo;</span>' +
        '  </a>' +
        '</li>';
    }
    $('#' + this.elId).html(html);
  },
  displayCategoriesByPage: function(instance) {
    return function() {
      $ = instance.checkJQ();
      var startIndex = (instance.currentPage - 1) * instance.resultsPerPage;
      $('#catColOne').html(instance.getCategoryColumns(startIndex));
      $('#catColTwo').html(instance.getCategoryColumns(startIndex + 12));
    }
  },
  getCategoryColumns: function(startIndex) {
    var rowCount = 0;
    var current = startIndex;
    var html = '';
    while (rowCount < 12 && typeof this.currentObject[current] !== 'undefined') {
      html += '<li role="presentation"><a href="' + this.currentObject[current].href + '">' + this.currentObject[current].title + '</a></li>';
      current++;
      rowCount++;
    }
    return html;
  },
  displaySearchResultsByPage: function(instance) {
    return function() {
      $ = instance.checkJQ();
      var rowCount = 0;
      var startIndex = (instance.currentPage - 1) * instance.resultsPerPage;
      var current = startIndex;
      var html = '';
      while (rowCount < 10 && typeof instance.currentObject[current] !== 'undefined') {
        html += '<a style="font-size: 18px;" class="large-text" href="' + instance.currentObject[current].href +'">' + instance.currentObject[current].title + '</a><br>';
        html += '<p>' + instance.currentObject[current].excerpt + '</p>';
        current++;
        rowCount++;
      }
      $('#mrSearchResults').html(html);
    }
  },
  setActivePage: function(e, instance) {
    $ = instance.checkJQ();
    var className = e.delegateTarget.className;
    $('#' + this.elId + ' > li').removeClass('active');
    switch(className) {
      case "pageNext":
        instance.currentPage++;
        instance.setPagination();
        setPaginationEvents(this.getCallback(), instance);
        break;
      case "pagePrevious":
        instance.currentPage--;
        instance.setPagination();
        setPaginationEvents(this.getCallback(), instance);
        break;
      case "pageSelect":
        var pageSelected = parseInt(e.delegateTarget.innerHTML);
        if (pageSelected !== instance.currentPage) {
          instance.currentPage = pageSelected;
          instance.setPagination();
          setPaginationEvents(this.getCallback(), instance);
          break;
        } else {
          e.delegateTarget.parentNode.setAttribute('class', 'active')
        }
    }
  },
  getCallback: function() {
    switch (this.elId) {
      case "catPaginate":
        return this.displayCategoriesByPage;
        break;
      case "searchPaginate":
        return this.displaySearchResultsByPage;
        break;
    }
  }
};

function setPaginationEvents(renderCallback, instance) {
  $ = (typeof $ === 'undefined') ? jQuery : $;
  $('.pagePrevious').unbind('click');
  $('.pageNext').unbind('click');
  $('.pageSelect').unbind('click');
  $('.pagePrevious').on('click', function(e) {
    e.preventDefault();
    instance.setActivePage(e, instance);
    var fn = renderCallback(instance);
    fn();
  });
  $('.pageNext').on('click', function(e) {
    e.preventDefault();
    instance.setActivePage(e, instance);
    var fn = renderCallback(instance);
    fn();
  });
  $('.pageSelect').on('click', function(e) {
    e.preventDefault();
    instance.setActivePage(e, instance);
    var fn = renderCallback(instance);
    fn();
  })
}