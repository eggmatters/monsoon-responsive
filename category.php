<?php
/*
Template Name: Category

Used for: Training Courses page
*/
$category = get_category(get_query_var('cat'));
$categoryPosts = get_category_posts($category->slug);
?>
<?php get_header(); ?>
<div class="jumbotron dkpurplebg">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="text-center topMargin60 xlgText"><?php echo $category->name; ?></div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <?php get_banner_search(); ?>
  <p>&nbsp;</p>
</div>
<div class="container textGreen">
  <div class="row">
    <div class="col-md-12">
      <ul id="catPaginate" class="pagination">
      
      </ul>
    </div>
    <div class="col-md-6">
      <ul id="catColOne" class="nav nav-stacked">
      </ul>
    </div>
    <div class="col-md-6">
      <ul id="catColTwo" class="nav nav-stacked">
      </ul>
    </div>
  </div>
</div>
<p>&nbsp;</p>
<?php get_footer();
