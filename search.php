<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 */

get_header(); ?>

<div class="container">
  <?php
  if (have_posts()) :
    ?>
    <div class="row" style="margin-top: 5%">
      <div class="col-md-12">
        <h3 class="page-title"><?php printf(__('Search Results for: %s', 'monsoon-responsive'), get_search_query()); ?></h3>
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <?php
        // Start the loop.
        while (have_posts()) : the_post();
          ?>
          <div class="row">
            <div class="col-md-12">
              <a style="font-size: 18px;" class="large-text" href="<?php echo get_permalink() ?>"><?php the_title() ?></a><br>
              <?php the_excerpt(); ?>
            </div>
          </div>

        <?php endwhile; ?>
      </div>

      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
    <?php else : ?>
      <div class="row" style="margin-top: 5%">
        <div class="col-md-8">
          <h4><?php printf(__('Sorry, no results for for: %s', 'monsoon-responsive'), get_search_query()); ?></h4>
        </div>
        <div class="col-md-4">
          <?php get_sidebar(); ?>
          <p>&nbsp;</p>
        </div>
      </div>
  <?php endif; ?>
</div><!-- .content-area -->

<?php get_footer(); ?>
