<?php

/**
 * Description of ThemeControls
 *
 * @author Your Name <Matthew.Eggers at MonsoonCommerce>
 */
class ThemeControls {
  private $content;
  private $codeLib;
  
  public static function init() {
    $themeControls = new ThemeControls();
    return $themeControls;
  }
  
  public function __construct() {
    $ini_array = parse_ini_file('theme_controls.ini', true);
    $this->codeLib = $ini_array['theme_control_values'];
    foreach($this->codeLib as $codeTag => $codeMethod) {
      add_shortcode($codeTag, array(&$this, $codeMethod));
    }
  }
  
  
  public function bannerSearch() {
    $action = esc_url(home_url(' / '));
    return '<form role="search" method="get" id="searchform" action=" ' . $action . '"> ' .
            '  <div class="input-group"> ' .
            '    <input type="search" class="form-control input-lg" name="s" id="s" placeholder="Search" value=""> ' .
            '    <span class="input-group-btn">' .
            '      <button type="submit" id="searchsubmit" class="btn btn-lg btn-search">Go</button> ' .
            '    </span>' .
            '  </div> ' .
            '</form> ' .
            '<p>&nbsp;</p> ';
  }
  
  public function lastPosts() {
    $args = array( 'category_name' => 'info-exchange');
    $posts = get_posts($args);
    if (count($posts) <= 0) {
      return "";
    }
    $postsList = '<ul class="nav nav-stacked textGreen medlgText">';
    $idx = 0;
    while ($idx < 4) {
      if (isset($posts[$idx])) {
        $postsList .= '<li role="presentation"><a href="' . get_permalink($posts[$idx]->ID) . '">' . 
            date('F j, Y', strtotime($posts[$idx]->post_date)) . ': ' . $posts[$idx]->post_title . '</a></li>';
      }
      $idx++;
    }
    return $postsList . '</ul>';
  }
  
  public function postTagline() {
    $post = get_post();
    if (get_class($post) !== 'WP_Post') {
      return "";
    }
    $date = apply_filters('the_date', $post->post_date);
    $dateString = date('M j, Y', strtotime($date));
    $author = get_the_author();
    $tags = wp_get_post_tags($post->ID);
    $taglist = "";
    if (count($tags) > 0) {
      $taglist = "| ";
      foreach ($tags as $tag) {
        $tag = get_tag($tag->term_id);
        $l = get_tag_link($tag->term_id);
        $taglink = '<a href=" '. $l . '">' . $tag->name . '</a>';
        $taglist .= $taglink . " ";
      }
    }
    $val = "<h6>by $author | $dateString $taglist</h6>";
    return $val;
    }
}
/*
 * return '<form role="search" method="get" id="searchform" action=" ' . $action . '"> ' .
            '  <div class="input-group"> ' .
            '    <input type="search" class="form-control input-lg" name="s" id="s" placeholder="Search" value=""> ' .
            '    <span class="input-group-btn">' .
            '      <button type="submit" id="searchsubmit" class="btn btn-lg">Go</button> ' .
            '    </span>' .
            '  </div> ' .
            '</form> ' .
            '<p>&nbsp;</p> ';
 */