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
  
  private static function getChildrenOf(NavigationMenu $parentMenuItem, $baseArray) {
    $childArray = [];
    foreach($baseArray as $menuItem) {
      if ($menuItem->parentId == $parentMenuItem->id) {  
        $childArray[] = $menuItem;
      }
    }
    return $childArray;
  }
  
  private static function setChildren(NavigationMenu $parent, $baseArray) {
    $parent->children = self::getChildrenOf($parent, $baseArray);
    foreach ($parent->children as $child) {
      $child->children = self::setChildren($child, self::getChildrenOf($child, $baseArray), $baseArray);
    }
  }
  
  private static function convertMenuItems($menuItems) {
    $returnArray = [];
    foreach ($menuItems as $menuItem) {
      $returnArray[] = new NavigationMenu($menuItem);
    }
    return $returnArray;
  }
}
