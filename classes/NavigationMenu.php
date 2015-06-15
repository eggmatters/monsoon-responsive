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
    $rs = "";
    $request = preg_replace('/[\/\?]/', '', $_SERVER['REQUEST_URI']);
    if (strlen($request) == 0) {
      $request = "X";
    }
    foreach($navMenuItems as $menuItem) {
      $dbg = preg_replace('/\//', '@', $menuItem->url);
      $match = preg_match('/' . $request . '/', $dbg);
      $pmatch = ($match > 0) ? ' class="mr_active"' : '';
      $cmatch = ($match > 0) ? ' mr_active' : '';
      if (count($menuItem->children) > 0) {
        $rs .= '<li class="dropdown' . $cmatch . '">';
        $rs .= '<a href="' . $menuItem->url . 
               '" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . 
               $menuItem->title . ' <span class="caret"></span></a>' .
               '<ul class="dropdown-menu" role="menu">';
        $rs .= '<li><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li>';
        $rs .= self::renderChildrenOf($menuItem);
        $rs .= '</ul></li>';
               
        
      } else {
        $rs .= '<li' . $pmatch . '><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li>';
      }
    }
    if (is_user_logged_in()) {
      $rs .= '<li><a href="'. wp_logout_url() .'">Sign Out</a></li>';
    } else {
      $rs .= '<li><a href="'. wp_login_url(get_permalink()) .'">Sign In</a></li>';
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
    foreach ($parent->children as $child) {
      if (count($child->children) > 0 ) {
        $rs .= '<li class="divider"></li>';
        $rs .= '<li class="dropdown">';
        $rs .= '<a href="' . $child->url .'">' . $child->title . ' <i class="icon-arrow-right"></i></a>';
        $rs .= '<ul class="dropdown-menu sub-menu">';
        $rs .= self::renderChildrenOf($child);
        $rs .= '</ul></li>';
      } else {
        $rs .= '<li><a href="' . $child->url . '">' . $child->title . '</a></li>';
      }
    }
    return $rs;
  }
}
