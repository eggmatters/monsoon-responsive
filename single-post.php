<?php
/*
Template Name: Post
*/

?>

<?php get_header(); 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
<div class="jumbotron dkpurplebg">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="text-center topMargin90 xlgText col-md-11"><?php the_title(); ?></div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </div>
</div>

<div class="container textGreen">
  <div class="row">
    <div class="col-md-8">
      <?php 
      the_content(); ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
      <p>&nbsp;</p>
    </div>
  </div>
  <p>&nbsp;</p>
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

<?php 
add_filter( 'the_content', 'do_shortcode', 11 );
echo do_shortcode('[MC_SupportCreate]');
get_footer();
