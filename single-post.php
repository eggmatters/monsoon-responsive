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
        <div class="text-center topMargin90 xlgText rightMargin15"><?php the_title(); ?></div>
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
$shortcode = do_shortcode('[MC_SupportCreate]');
if ($shortcode != '[MC_SupportCreate]') {
  echo $shortcode;
}
get_footer();
