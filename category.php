<?php
/*
Template Name: Category

Used for: Training Courses page
*/
$category = get_category(get_query_var('cat'));
$categoryPosts = get_category_posts($category->slug);
?>
<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">
    <div class="jumbotron dkpurplebg">
      <div class="container">
        <div class="text-center topMargin60 xlgText"><?php echo $category->name ?></div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <?php get_banner_search(); ?>
  <p>&nbsp;</p>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <ul class="nav nav-stacked">
      <?php foreach($categoryPosts['col1'] as $col1): ?>
        <li role="presentation"><a href="<?php echo $col1->guid; ?>"><?php echo $col1->post_title; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>
    <?php if(count($categoryPosts['col2']) > 0): ?>
    <div class="col-md-6">
      <ul class="nav nav-stacked">
      <?php foreach ($categoryPosts['col2'] as $col2): ?>
        <li role="presentation"><a href="<?php echo $col2->guid; ?>"><?php echo $col2->post_title; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</div>
<p>&nbsp;</p>
<?php get_footer();
