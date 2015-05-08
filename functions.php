<?php 
require_once 'helper_functions.php';
require_once 'classes/NavigationMenu.php';
//require_once 'classes/MR_Widgets.php';

function wpbootstrap_scripts_with_jquery()
{
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
      'sidebar-menu-1' => __( 'Sidebar Menu1' ),
      'sidebar-menu-2' => __( 'Sidebar Menu2' ),
		)
	);
}
add_action( 'init', 'register_theme_menus' );

function get_defined_menu($slug = 'header-menu') {
  if (( $locations = get_nav_menu_locations() ) && isset($locations[$slug])) {
    $menu = wp_get_nav_menu_object($locations[$slug]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $navigationItems = NavigationMenu::setNavMenuArray($menu_items);
    $menu_list = NavigationMenu::renderBootstrapNavMenu($navigationItems);
  } else {
    $menu_list = '<ul><li>Menu "' . $slug . '" not defined.</li></ul>';
  }
  echo $menu_list;
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
    'name' => 'Main Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

//function register_mr_search_widget() {
//  register_widget('MR_Widget_Search');
//}
//add_action( 'widgets_init', 'register_mr_search_widget');