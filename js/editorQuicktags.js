/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function generateBannerIcon(e, c, ed) {
  var prmt, t = this;
  if (ed.canvas.selectionStart !== ed.canvas.selectionEnd) {
    // if we have a selection in the editor define out tagStart and tagEnd to wrap around the text
    // prompt the user for the abbreviation and return gracefully on a null input
    prmt = prompt('Enter Abbreviation');
    if (prmt === null)
      return;
    t.tagStart = '<abbr title="' + prmt + '">';
    t.tagEnd = '</abbr>';
  } else if (ed.openTags) {
    // if we have an open tag, see if it's ours
    var ret = false, i = 0, t = this;
    while (i < ed.openTags.length) {
      ret = ed.openTags[i] == t.id ? i : false;
      i++;
    }
    if (ret === false) {
      // if the open tags don't include 'abbr' prompt for input
      prmt = prompt('Enter Abbreviation');
      if (prmt === null)
        return;
      t.tagStart = '<abbr title="' + prmt + '">';
      t.tagEnd = false;
      if (!ed.openTags) {
        ed.openTags = [];
      }
      ed.openTags.push(t.id);
      e.value = '/' + e.value;
    } else {
      // otherwise close the 'abbr' tag
      ed.openTags.splice(ret, 1);
      t.tagStart = '</abbr>';
      e.value = t.display;
    }
  } else {
    // last resort, no selection and no open tags
    // so prompt for input and just open the tag
    prmt = prompt('Enter Abbreviation');
    if (prmt === null)
      return;
    t.tagStart = '<abbr title="' + prmt + '">';
    t.tagEnd = false;
    if (!ed.openTags) {
      ed.openTags = [];
    }
    ed.openTags.push(t.id);
    e.value = '/' + e.value;
  }
  // now we've defined all the tagStart, tagEnd and openTags we process it all to the active window
  QTags.TagButton.prototype.callback.call(t, e, c, ed);
}