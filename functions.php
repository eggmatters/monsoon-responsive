<?php 
require_once 'helper_functions.php';
require_once 'classes/NavigationMenu.php';

function wpbootstrap_scripts_with_jquery()
{
		// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
      'extra-menu-1' => __( 'Extra Menu1' ),
      'extra-menu-2' => __( 'Extra Menu2' ),
		)
	);
}
add_action( 'init', 'register_theme_menus' );

function get_defined_menu($slug = 'header-menu') {
  if (( $locations = get_nav_menu_locations() ) && isset($locations[$slug])) {
    $menu = wp_get_nav_menu_object($locations[$slug]);

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list = '';

    foreach ((array) $menu_items as $key => $menu_item) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
    }
    $menu_list .= '</ul>';
  } else {
    $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
  }
  echo $menu_list;
}

function debug_nav_menu($slug = 'header-menu') {
  if (( $locations = get_nav_menu_locations() ) && isset($locations[$slug])) {
    $menu = wp_get_nav_menu_object($locations[$slug]);
    $menuItemsArray = wp_get_nav_menu_items($menu->term_id);
    $navdebug = NavigationMenu::setNavMenuArray($menuItemsArray);
    echo "<pre>";
    print_r($navdebug);
    echo "</pre>";
  }
}
