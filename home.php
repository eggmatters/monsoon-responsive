<?php
/*
Template Name: Home Page Default
*/
?>

<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">
    <div class="jumbotron">
      <div class="container">
        <?php
          $query = new WP_Query( 'category_name=home_header');
          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
              the_content();
            }
          }
        ?>
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