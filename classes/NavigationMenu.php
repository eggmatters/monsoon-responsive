<?php

/**
 * Description of NavigationMenu
 *
 * @author Your Name <your.name at your.org>
 */
class NavigationMenu {
  public $name;
  public $title;
  public $url;
  public $children;
  
  public function __construct($menuItem, $chilren = null) {
    $this->name = $menuItem->name;
    $this->title = $menuItem->title;
    $this->url = $menuItem->url;
    $this->children = (is_null($chilren)) ? array() : $chilren;
  }
  //Make recursive
  public static function setNavMenuArray($menuItemsArray, $returnArray = null) {
    if (is_null($returnArray)) {
      $returnArray = [];
    }
    foreach ($menuItemsArray as $menuItem) {
      $childArray = self::getChildrenOf($menuItem, $menuItemsArray);
      if (count($childArray) > 0) {
        $returnArray[] = new NavigationMenu($menuItem, self::setNavMenuArray($childArray, $returnArray));
      } else {
        $returnArray[] = new NavigationMenu($menuItem);
      }
    }
    return $returnArray;
  }
  private static function getChildrenOf($parentMenuItem, $menuItemsArray) {
    $childArray = [];
    foreach($menuItemsArray as $menuItem) {
      $mp = $menuItem->menu_item_parent;
      $mc = $parentMenuItem->ID;
      if ($menuItem->menu_item_parent == $parentMenuItem->ID) {  
        $childArray[] = $menuItem;
      }
    }
    return $childArray;
  }
}
