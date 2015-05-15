<?php
/*
Template Name: Home Page
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
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php parse_content(get_the_content()); ?>

  <?php endwhile;
else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php get_footer(); 
