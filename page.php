<?php
/*
Template Name: Page Layout

Used for Help Library page
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

<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="container textGreen">
  <?php the_content(); ?>
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
