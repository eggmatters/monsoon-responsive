<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">
    <div class="jumbotron">
      <div class="container">
        <p class="lead">We have what you need to learn and grow and train and stay up-to-date and lorem ipsum.</p>
      </div>
    </div>
  </div>
  <?php get_banner_search(); ?>
</div>

<div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php the_content(); ?>

    <?php endwhile;
  else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); 
