<?php
/*
Template Name: Post
*/
?>

<?php get_header(); 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); 
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
      <?php the_content(); ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
      <p>&nbsp;</p>
    </div>
  </div>
</div>

<?php endwhile; else: ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
    </div>
  </div>
</div>
<?php endif; ?>

<?php get_footer();
