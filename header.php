<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monsoon Support Center</title>

    <!-- Le styles -->
		<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }
    </style>
	  <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
  </head>

  <body>
  <nav class="navbar navbar-inverse navbar-relative-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <?php wp_list_pages(array('title_li' => '')); ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
