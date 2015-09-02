<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('&raquo;', 1, 'right'); ?> <?php bloginfo('name'); ?></title>

    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_enqueue_script("jquery"); ?>
    <script>
      var mr_theme_root = '<?php echo get_mr_theme_root_uri(); ?>';
      var mr_base_root  = '<?php echo get_bloginfo('url'); ?>'
    </script>
    <?php wp_head(); ?>
  </head>
  <body>
    <?php require_once 'views/feedbackModal.php'; ?>
    <?php require_once 'views/infoExchangeSignupModal.php'; ?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <?php 
        // Fix menu overlap bug..
        if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;"></div>'; 
      ?>
    <?php $mcsc = get_mr_theme_root_uri() . '/images/monsoon-logo-pos2.png'; ?>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand-oxcom" href="<?php echo site_url(); ?>" title="Monsoon Commerce Support Center">
            <img src="<?php echo $mcsc; ?>" style="max-width:140px; margin-top: 0px;">
<!--            <span style="color: black; font-size:96%;">SUPPORT CENTER</span>-->
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" style="margin-top: 12px;">
          <ul class="nav navbar-nav">
            	<?php get_defined_menu(); ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
