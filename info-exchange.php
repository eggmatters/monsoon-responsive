<?php
/*
Template Name: Info Exchange
*/

get_header(); 

?>
<div class="jumbotron dkpurplebg">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="text-center topMargin90 xlgText"><?php the_title(); ?></div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8 textGreen">
      <?php get_info_exchange_posts(); 
            get_page_categories();
      ?>      
    </div>
    <div class="col-md-4">
      <?php dynamic_sidebar('Secondary Sidebar'); ?>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
 <?php get_footer(); 