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
  private $controls = array();
  public function __construct($theContent) {
    $matchers = array();
    $this->content = $theContent;
    if(preg_match_all('/\{(.+?)\}/', $theContent, $matchers)) {
      $this->controls = $matchers[1];
    }
  }
  
  public function getControls() {
    return $this->controls;
  }
}
