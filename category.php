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
      <ul id="catColOne" class="nav nav-stacked textGreen">
      </ul>
    </div>
    <div class="col-md-6 textGreen">
      <ul id="catColTwo" class="nav nav-stacked">
      </ul>
    </div>
  </div>
  <nav>
    <ul id="catPaginate" class="pagination textGreen">
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
<p>&nbsp;</p>
<?php get_footer();
