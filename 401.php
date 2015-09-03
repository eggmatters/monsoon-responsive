<?php
get_header();
?>
<style>
  .spacer-404 {
    margin-bottom: 7.2%;
  }
</style>
<div class="jumbotron dkpurplebg">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="text-center topMargin60 xlgText"><?php _e( 'Oops! There was a problem loggin you in', 'monsoon-responsive' ); ?></div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <?php get_banner_search(); ?>
</div>
<p>&nbsp;</p>
<div class="container textGreen">
  <div class="row">
    <div class="col-md-12">
      <p>It is with great sadness that we now inform you that this page no longer exists.</p>
      <p>There are plenty of great pages to choose from however. I'm sure you'll find just what you're looking for.</p>
      <p>Please feel free to <a href="<?php echo get_site_url() . '/contact'; ?>">Contact Us</a> if you still can't find what you're looking for.</p>
    </div>
  </div>
</div>
<div class="spacer-404"></div>
<?php get_footer();
