<?php
/*
Template Name: Info Exchange
*/

get_header(); 
$args = array( 'category_name' => 'info-exchange');
$ixposts = get_posts($args);
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
  <?php 
    $idx = 0;
    while ($idx < 3): ?>
    <div class="col-md-8">
      <a href="<?php $posts[$idx]->guid; ?>"><?php $posts[$idx]->post_title?></a>
      <?php $posts[$idx]->post_exerpt ?>
    </div>
    <?php $idx++; ?>
  <?php endwhile; ?>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
 <?php get_footer(); ?>