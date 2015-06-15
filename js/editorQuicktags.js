/* initial commit
 * dfb252dd0d1b193584ec3d6a0b56f9e72021f216
 * 
 */
var gridLayout, bannerIcon;
var argsContainer = {};

function generateBannerIcon(e, c, ed) {
  argsContainer = {
    e: e,
    c: c,
    ed: ed,
    t: this
  };
  bannerIcon.dialog("open");
}

function generateGridRow(e, c, ed) {
  argsContainer = {
    e: e,
    c: c,
    ed: ed,
    t: this
  };
  gridLayout.dialog("open");
}

function stripShortCodes(e, c, ed) {
  var t = this;
  theContent = c.value;
  newContent = theContent.replace(/\[(.*?)\]/g, '');
  c.value = newContent;
  t.tagStart = '';
  t.tagEnd = '';
  QTags.TagButton.prototype.callback.call(t, e, c, ed);
}

function supportRequest(e, c, ed) {
  var t = this;
  t.tagStart = '';
  if (c.value.indexOf('[MC_SupportCreate]') === -1) {
    t.tagStart += '[MC_SupportCreate]';
  } 
  t.tagStart += '<a href="#" class="support-create-request">[LINK TEXT]</a>';
  t.tagEnd = '';
  QTags.TagButton.prototype.callback.call(t, e, c, ed)
}

function renderBannerIcon() {
  if (typeof $ === 'undefined') {
    $ = jQuery;
  }
  var t = argsContainer.t
  t.tagStart = '\n<div class="row">\n' 
    + '  <div class="col-md-2">\n'
    + '   <img class="img-responsive" src="' + $('#icon-url').val() + '" alt="' + $('#icon-alt-text').val() +'" />\n'
    + '  </div>\n'
    + '  <div class="col-md-10">\n'
    + '    <div class="row"><p>&nbsp;</p></div>\n'
    + '    <div class="row"> <p class="lead">' + $('#icon-banner-text').val() + '</p> </div>\n'
    + '    <div class="row"><p>&nbsp;</p></div>\n'
    + '  </div>\n'
    + '</div>\n'
    + '<p>&nbsp;</p>';
  t.tagEnd = '';
  
  // now we've defined all the tagStart, tagEnd and openTags we process it all to the active window
  QTags.TagButton.prototype.callback.call(t, argsContainer.e, argsContainer.c, argsContainer.ed);
}

function renderGridRow() {
  if (typeof $ === 'undefined') {
    $ = jQuery;
  }
  var t = argsContainer.t;
  var numcols = parseInt($('#num-cols').val());
  var colWidthsElements = $('.col-widths');
  var colWidthsArray = []
  $.each(colWidthsElements, function(idx, value) {
    colWidthsArray.push(value.value);
  });
  t.tagStart = '\n<div class="row">\n';
  for (var i = 0; i < numcols; i++) {
    var colnum = i + 1;
    t.tagStart += '  <div class="col-md-' + colWidthsArray[i] + '">\n';
    t.tagStart += '    <!-- Place the contents for column ' + colnum + ' here -->\n';
    t.tagStart += '  </div>\n'
  }
  t.tagStart += '</div>';
  t.tagEnd = '';
  QTags.TagButton.prototype.callback.call(t, argsContainer.e, argsContainer.c, argsContainer.ed);
}

jQuery(document).ready(function($) {
  
  bannerIcon = $("#banner-icon-dialog").dialog({
    dialogClass   : 'wp-dialog',
    autoOpen: false,
    resizable: true,
    height: 600,
    width: 400,
    modal: true,
    buttons: {
      "Render": function () {
        renderBannerIcon()
        $(this).dialog("close");
      },
      Cancel: function () {
        $(this).dialog("close");
        return false;
      }
    }
  });
  
  gridLayout = $("#grid-row-dialog").dialog({
    dialogClass   : 'wp-dialog',
    autoOpen: false,
    resizable: true,
    height: 600,
    width: 400,
    modal: true,
    buttons: {
      "Render": function () {
        renderGridRow();
        clearGridLayout();
        $(this).dialog("close");
      },
      Cancel: function () {
        clearGridLayout();
        $(this).dialog("close");
        return false;
      }
    }
  });
  
  $('#set-cols').on("click", function(e) {
    e.preventDefault();
    $('#grid-row-errors').empty();
    setGridLayoutColumns()
  });
  
  function setGridLayoutColumns() {
    var numcols = parseInt($('#num-cols').val());
    if (!numcols || numcols > 12) {
      $('#grid-row-errors').html('<p style="color: red;">Invalid entry</p>');
      return false;
    }
    var suggestedWidth = parseInt(12 / numcols);
    for(var i = 1; i <= numcols; i++) {
      var col_id = 'col-width-' + i;
      var html='<p class="col-widths-inputs"><label for="' + col_id + '">Width for column ' + i + ':&nbsp;&nbsp;</label>'
      html += '<input id="' + col_id + '" class="col-widths" value="' + suggestedWidth + '"></p>'
      $('#layout-form').append(html);
    }
    return true;
  }
  
  function clearGridLayout() {
    $('#num-cols').val("");
    $('.col-widths-inputs').remove();
  }
});