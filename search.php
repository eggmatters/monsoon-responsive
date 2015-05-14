<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 */

get_header(); ?>

	<div class="container">
		<div class="row">
		<?php 
      if ( have_posts() ) : 
        ?>

			<header class="page-header">
				<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'monsoon-responsive' ), get_search_query() ); ?></h3>
			</header><!-- .page-header -->
      <div class="col-md-8">
      <?php
			  // Start the loop.
			  while ( have_posts() ) : the_post(); ?>
        <div class="row">
          <div class="col-md-12">
            <a style="font-size: 18px;" class="large-text" href="<?php echo get_permalink() ?>"><?php the_title()?></a><br>
            <?php the_excerpt(); ?>
          </div>
        </div>
        
			<?php endwhile; ?>
      </div>
      
      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
      
		<?php else :?>
      <div class="row">
        <?php get_template_part( 'content', 'none' ); ?>
      </div>

		<?php endif; ?>
    </div>
	</div><!-- .content-area -->

<?php get_footer(); ?>
