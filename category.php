<?php
/*
Template Name: Category
*/
$category = get_category(get_query_var('cat'));
$categoryPosts = get_category_posts($category->slug);
?>
<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo $category->name ?></h1>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <?php get_banner_search(); ?>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php foreach($categoryPosts['col1'] as $col1): ?>
      <a href="<?php echo $col1->guid; ?>"><?php echo $col1->post_title; ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php get_footer();
