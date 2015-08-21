<?php
/*
Template Name: Tag

*/
$tagPosts = get_tag_posts(get_query_var('tag'));
if (count($tagPosts) == 1) {
  header('Location: ' . get_permalink($tagPosts[0]->ID));
}

?>
<?php get_header(); ?>
<div class="jumbotron dkpurplebg">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="text-center topMargin90 xlgText">Post tagged by: <?php echo $tag; ?></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <?php get_banner_search(); ?>
  <p>&nbsp;</p>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul id="catPaginate" class="pagination">
      
      </ul>
    </div>
    <div class="col-md-6 textBlack">
      <ul id="catColOne" class="nav nav-stacked">
      </ul>
    </div>
    <div class="col-md-6 textBlack">
      <ul id="catColTwo" class="nav nav-stacked">
      </ul>
    </div>
  </div>
</div>
<p>&nbsp;</p>
<?php get_footer();
