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
  public static function setNavMenuArray($menuItemsArray) {
    $returnArray = [];
    foreach ($menuItemsArray as $menuItem) {
       self::setChildrenOf($menuItem, $menuItemsArray);
    }
    return $returnArray;
  }
  private static function setChildrenOf($parentMenuItem, $menuItemsArray) {
    foreach($menuItemsArray as $menuItem) {
      $childArray = self::getChildrenOf($menuItem, $menuItemsArray);
    }
  }
  private static function getChildrenOf($parentMenuItem, $menuItemsArray) {
    $childArray = [];
    foreach($menuItemsArray as $menuItem) {
      if ($menuItem->menu_item_parent == $parentMenuItem->ID) {  
        $childArray[] = $menuItem;
      }
    }
    return $childArray;
  }
}
