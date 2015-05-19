<?php
/*
Template Name: Info Exchange
*/

get_header(); 

?>
<div class="container-fluid">
  <div class="row">
    <div class="jumbotron">
      <div class="container">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php get_info_exchange_posts(); 
            get_page_categories();
      ?>      
    </div>
    <div class="col-md-4">
      <?php dynamic_sidebar('Secondary Sidebar'); ?>
    </div>
  </div>
</div>
 <?php get_footer(); 