<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>

</style>
<div id="grid-row-dialog" title="Add Grid Row">
  <p>
    Use this tool to set a grid layout for your content. 
  </p>
  <p>
    A grid row consists of up to 12 columns. While not necessary, 
    you will want to compartmentalize your grid so that the column 
    counts add up to 12. 
  </p>
  <hr>
  <div id="grid-row-errors"></div>
  <form id="layout-form">
    <label for="num-cols">Number of columns</label>      
    <input id="num-cols" class="" value="">
    <button id="set-cols" class="button button-primary">Set</button>
  </form>
</div>
<div id="banner-icon-dialog" title="Add Banner Icon">
  <p>
    Use this tool to set a banner icon for your post. 
  </p>
  <p>
    A banner icon is an icon with lead text (slightly larger, bolder)
    That can be placed on your page.
  </p>
  <ul>
    <li>Icon url: The "src" attribute of your icon.</li>
    <li>Alt Text: Text to display if icon isn't rendered</li>
    <li>Banner Text: The text to display next to the icon</li>
  </ul>
  <hr>
  <div id="grid-row-errors"></div>
  <form id="banner-icon-form">
    <p>
      <label for="icon-url">Enter Icon URL:</label>      
      <input id="icon-url" class="" value="https://">
    </p>
    <p>
      <label for="icon-alt-text">Enter alt text:</label>      
      <input id="icon-alt-text" class="" value="">
    </p>
    <p>
      <label for="icon-banner-text">Enter banner text:</label>      
      <input id="icon-banner-text" class="" value="">
    </p>
  </form>
</div>