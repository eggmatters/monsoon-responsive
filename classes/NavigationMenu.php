<?php

/**
 * Description of NavigationMenu
 *
 * @author Your Name <your.name at your.org>
 */
class NavigationMenu {
  public $menuItems;
  public $navMenuArray;
  public function __construct($menuItems) {
    $this->menuItems = $menuItems;
  }
  //Make recursive
  public function setNavMenuArray() {
    $returnArray = [];
    $parentArray = $this->getParents();
    foreach($parentArray as $parent) {
      $returnArray[] = $parent;
      $childArray = $this->getChildrenOf($parent);
      if (count($childArray > 0)) {

      }
    }
  }
  private function getParents() {
    $parentArray = [];
    foreach($this->menuItems as $menuItem) {
      if ($menuItem->menu_item_parent == "0") {
        $parentArray[] = $menuItem;
      }
    }
    return $parentArray;
  }
  private function getChildrenOf($menuItem, $menuItemsArray = null) {
    $menuItemsArray (is_null($menuItemsArray)) ? $this->menuItems : $menuItemsArray;
    $childArray = [];
    foreach($menuItemsArray as $menuItem) {
      if ($menuItem->menu_item_parent == $menuItem->ID) {  
        $childArray[] = $menuItem;
      }
    }
    return $childArray;
  }
  private function setNavMenuItem($name, $url) {
    
  }
}

