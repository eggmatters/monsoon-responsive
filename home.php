<?php
/*
Template Name: Home Page

5/26 - not being used
*/
?>

<?php get_header(); ?>
<div class="container-fluid">
  <div class="jumbotron">
    <div class="row">
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
</div>

<div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php parse_content(get_the_content()); ?>

    <?php endwhile;
  else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); 