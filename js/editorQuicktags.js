/* initial commit
 * dfb252dd0d1b193584ec3d6a0b56f9e72021f216
 * 
 */

function generateBannerIcon(e, c, ed) {
  var t = this;
  var iconUrl = prompt("Enter Icon URL:", 'https://');
  if (iconUrl === null) {
    return;
  }
  var altText = prompt("Enter alt text:");
  if (altText === null) {
    return;
  }
  var leader = prompt("Enter Banner text");
  if (leader === null) {
    return;
  }
  t.tagStart = '<div class="row">\n' 
    +  '  <div class="col-md-2">\n'
    +  '    <img class="img-responsive" src="' + iconUrl + '" alt="' + altText +'" />\n'
    + '   </div>\n'
    + '   <div class="col-md-10">\n'
    + '     <div class="row"><p>&nbsp;</p></div>\n'
    + '     <div class="row"> <p class="lead">' + leader + '</p> </div>\n'
    + '     <div class="row"><p>&nbsp;</p></div>\n'
    + '  </div>\n'
    + '</div>\n'
    + '<p>&nbsp;</p>';
  t.tagEnd = '';
  
  // now we've defined all the tagStart, tagEnd and openTags we process it all to the active window
  QTags.TagButton.prototype.callback.call(t, e, c, ed);
}