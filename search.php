<?php
/**
 * The template for displaying search results pages.
 *
 * 
 */
//wp_dequeue_script('sfwd_template_js');

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach
$search_query['posts_per_page'] = -1;
$search_query['order_by'] = 'date';

$search = new WP_Query($search_query);
$searchPosts = $search->get_posts();


setSearchPostsJSON($searchPosts);
wp_dequeue_script('sfwd_template_js');
get_header(); ?>

<div class="container textGreen">
  <?php
  if (!empty($searchPosts)) :
    ?>
    <div class="row" style="margin-top: 10%">
      <div class="col-md-12">
        <h3 class="page-title"><?php printf(__('Search Results for: %s', 'monsoon-responsive'), $search_query['s']); ?></h3>
        <h4><?php echo $search->found_posts?> Results returned</h4>
        <hr>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12">
      <ul id="searchPaginate" class="pagination">
        <!-- rendered by javascript-->
      </ul>
    </div>
  </div>
  
    <div class="row">      
      <div class="col-md-8">
          <div class="row">
            <div id="mrSearchResults" class="col-md-12">              
              <!-- rendered by javascript-->
            </div>
          </div>
      </div>

      <div class="col-md-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
    
    <?php else : ?>
      <div class="row" style="margin-top: 10%">
        <div class="col-md-8">
          <h4><?php printf(__('Sorry, no results for for: %s', 'monsoon-responsive'), get_search_query()); ?></h4>
        </div>
        <div class="col-md-4">
          <?php get_sidebar(); ?>
          <p>&nbsp;</p>
        </div>
      </div>
  <?php endif; ?>
  <p>&nbsp;</p>
</div><!-- .content-area -->

<?php get_footer(); ?>
