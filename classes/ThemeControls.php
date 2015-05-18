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
    return '<form role="search" method="get" id="searchform" action=" ' . $action . '"> ' .
            '  <div class="input-group"> ' .
            '    <input type="search" class="form-control input-lg" name="s" id="s" placeholder="Search" value=""> ' .
            '    <span class="input-group-btn">' .
            '      <button type="submit" id="searchsubmit" class="btn btn-lg">Go</button> ' .
            '    </span>' .
            '  </div> ' .
            '</form> ' .
            '<p>&nbsp;</p> ';
  }
  
  private function lastPosts() {
    $args = array( 'category_name' => 'info-exchange');
    $posts = get_posts($args);
    if (count($posts) <= 0) {
      return "";
    }
    $postsList = '<ul class="nav nav-stacked">';
    $idx = 0;
    while ($idx < 4) {
      if (isset($posts[$idx])) {
        $postsList .= '<li role="presentation"><a href="' . $posts[$idx]->guid . '">' . 
            date('F j, Y', strtotime($posts[$idx]->post_date)) . ': ' . $posts[$idx]->post_title . '</a></li>';
      }
      $idx++;
    }
    return $postsList;
  }
  
  private function infoExchangePosts() {
    $args = array( 'category_name' => 'info-exchange');
    $posts = get_posts($args);
    if (count($posts) <= 0) {
      return "";
    }
    $postsList = '';
    $idx = 0;
    while ($idx < 4) {
      
    }
  }
}