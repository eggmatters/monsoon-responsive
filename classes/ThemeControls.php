<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThemeControls
 *
 * @author Your Name <your.name at your.org>
 */
class ThemeControls {
  private $content;
  private $requestedControls = array();
  private $renderedControls  = array();
  private $codeLib;
  public function __construct($theContent) {
    $matchers = array();
    $this->content = $theContent;
    if(preg_match_all('/\{(.+?)\}/', $theContent, $matchers)) {
      $this->requestedControls = $matchers[1];
    }
    $ini_array = parse_ini_file('theme_controls.ini', true);
    $this->codeLib = $ini_array['theme_control_values'];
  }
  
  public function setControlContent() {
    foreach($this->requestedControls as $controlRequest) {
      if (array_key_exists($controlRequest, $this->codeLib)) {
        $fn = $this->codeLib[$controlRequest];
        $this->renderedControls[$controlRequest] = $this->$fn();
      }
    }
  }
  
  public function renderControlContent() {
    foreach($this->renderedControls as $controlRequest => $output) {
      $this->content = str_replace("{" . $controlRequest . "}", $output, $this->content);
    }
    return $this->content;
  }
  
  public function getControls() {
    return $this->requestedControls;
  }
  
  private function bannerSearch() {
    $action = esc_url(home_url(' / '));
    return '<div class="row"> ' .
            '<form class="form-inline col-md-12" role="search" method="get" id="searchform" action=" ' . $action . '"> ' .
            '  <div class="form-group"> ' .
            '    <input type="search" class="form-control input-lg" name="s" id="s" placeholder="Search" value=""> ' .
            '  </div> ' .
            '  <button type="submit" id="searchsubmit" class="btn btn-lg">Go</button> ' .
            '</form> ' .
            '<p>&nbsp;</p> ' .
          '</div>';
  }
  
  private function lastPosts() {
    $args = array( 'category_name' => 'info_exchange');
    $posts = get_posts($args);
    if (count($posts) <= 0) {
      return "";
    }
    $postsList = '<ul class="nav nav-stacked">';
    $idx = 0;
    while ($idx < 3) {
      $postsList .= '<li role="presentation"><a href="' . $posts[$idx]->guid . '">' . 
          date('F j, Y') . ': ' . $posts[$idx]->post_title . '</a></li>';
      $idx++;
    }
    return $postsList;
  }
}