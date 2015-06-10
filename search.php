<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 */
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

query_posts('showposts=200');
$search = new WP_Query($search_query);
$searchPosts = $search->get_posts();

setSearchPostsJSON($searchPosts);
get_header(); ?>

<div class="container">
  <?php
  if (!empty($searchPosts)) :
    ?>
    <div class="row" style="margin-top: 5%">
      <div class="col-md-12">
        <h3 class="page-title"><?php printf(__('Search Results for: %s', 'monsoon-responsive'), $search_query['s']); ?></h3>
        <hr>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12">
      <ul id="searchPaginate" class="pagination textGreen">
        <!-- rendered by javascript-->
      </ul>
    </div>
  </div>
  
    <div class="row">      
      <div class="col-md-8">
          <div class="row">
            <div id="mrSearchResults" class="col-md-12 textGreen">              
              <!-- rendered by javascript-->
            </div>
          </div>
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
  <p>&nbsp;</p>
</div><!-- .content-area -->

<?php get_footer(); ?>
