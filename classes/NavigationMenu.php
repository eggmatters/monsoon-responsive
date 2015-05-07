<?php

/**
 * Description of NavigationMenu
 *
 * @author Your Name <your.name at your.org>
 */
class NavigationMenu {
  public $id;
  public $title;
  public $url;
  public $parentId;
  public $children;
  
  public function __construct($menuItem, $chilren = null) {
    $this->id = $menuItem->ID;
    $this->title = $menuItem->title;
    $this->url = $menuItem->url;
    $this->parentId = $menuItem->menu_item_parent;
    $this->children = (is_null($chilren)) ? array() : $chilren;
  }

  public static function setNavMenuArray($menuItemsArray) {
    $baseArray = self::convertMenuItems($menuItemsArray);
    $returnArray = [];
    foreach ($baseArray as $menuItem) {
      self::setChildren($menuItem, $baseArray);
      if ($menuItem->parentId == 0) {
        $returnArray[] = $menuItem;
      }   
    }
    return $returnArray;
  }
  
  public static function renderBootstrapNavMenu($navMenuItems) {
    /**
     * <ul class="nav navbar-nav">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
     */
    $rs = "";
    foreach($navMenuItems as $menuItem) {
      if (count($menuItem->children) > 0) {
        $rs .= '<li class="dropdown">';
        $rs .= '<a href="' . $menuItem->url . 
               '" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . 
               $menuItem->title . ' <span class="caret"></span></a>' .
               '<ul class="dropdown-menu" role="menu">';
        $rs .= '<li><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li>';
        $rs .= self::renderChildrenOf($menuItem);
        $rs .= '</ul>';
               
        
      } else {
        $rs .= '<li><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li>';
      }
    }
    return $rs;
  }
  
  private static function convertMenuItems($menuItems) {
    $returnArray = [];
    foreach ($menuItems as $menuItem) {
      $returnArray[] = new NavigationMenu($menuItem);
    }
    return $returnArray;
  }
  
  private static function setChildren(NavigationMenu $parent, $baseArray) {
    $parent->children = self::getChildrenOf($parent, $baseArray);
    foreach ($parent->children as $child) {
      $child->children = self::setChildren($child, $baseArray);
    }
  }
  
  private static function getChildrenOf(NavigationMenu $parentMenuItem, $baseArray) {
    $childArray = [];
    foreach($baseArray as $menuItem) {
      if ($menuItem->parentId == $parentMenuItem->id) {  
        $childArray[] = $menuItem;
      }
    }
    return $childArray;
  }
  
  private static function renderChildrenOf($parent) {
    /**
     * 
     * 
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="dropdown">
          <a href="#">2-level Dropdown <i class="icon-arrow-right"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="nav-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        </li>
      </ul>
     */
    //$rs .= '<li class="divider"></li>';
    foreach ($parent->children as $child) {
      $rs .= '<li><a href="' . $child->url . '">' . $child->title . '</a></li>';
      if (count($child->children) > 0 ) {
        $rs .= '<li class="divider"></li>';
        $rs .= '<li class="dropdown">';
        $rs .= '<a href="' . $child->url .'">' . $child->title . ' <i class="icon-arrow-right"></i></a>';
        $rs .= '<ul class="dropdown-menu sub-menu">';
        $rs .= '<li><a href="' . $child->url . '">' . $child->title . '</a></li>';
        $rs .= self::renderChildrenOf($child);
        $rs .= '</ul></li>';
      }
    }
    return $rs;
  }
}
