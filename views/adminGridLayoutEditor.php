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