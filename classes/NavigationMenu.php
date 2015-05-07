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
     * <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Header</a></li>
                <li class="divider"></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                </li>
              </ul>
            </li>
     */
    $rs = "";
    foreach($navMenuItems as $menuItem) {
      $rs .= '<li><a href="' . $menuItem->url . '">' . $menuItem->title . '</a></li>';
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
}
