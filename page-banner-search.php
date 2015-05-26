<?php
/*
Template Name: Page with Banner Search

Used for Help/Support Resources page
*/
?>

<?php get_header(); 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
<div class="container-fluid">
  <div class="row">
    <div class="jumbotron dkpurplebg">
      <div class="container">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <?php get_banner_search(); ?>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php the_content(); ?>
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
