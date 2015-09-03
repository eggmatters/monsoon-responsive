<?php
$message = isset($message) ? $message : "";
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
      <p>Looks like we're having trouble you logging in:</p>
      <p><?php echo $message; ?></p>
      <p>Please feel free to <a href="<?php echo get_site_url() . '/contact'; ?>">Contact Us</a> if you need urgent help.</p>
    </div>
  </div>
</div>
<div class="spacer-404"></div>
<?php get_footer();
