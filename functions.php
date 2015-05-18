<?php 
require_once 'classes/NavigationMenu.php';
require_once 'classes/MR_Widgets.php';
require_once 'classes/ThemeControls.php';

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

function register_mr_nav_menu_widget() {
  register_widget('MR_Nav_Menu_Widget');
}
add_action( 'widgets_init', 'register_mr_nav_menu_widget');

function register_mr_nav_button_widget() {
  register_widget('MR_Nav_Button_Widget');
}
add_action( 'widgets_init', 'register_mr_nav_button_widget');

function get_banner_search() {
  require_once 'views/banner_search.php';
}

function parse_content($the_content) {
  $themeControls = new ThemeControls($the_content);
  $matches = $themeControls->getControls();
  $themeControls->setControlContent();
  echo $themeControls->renderControlContent();
}

function get_category_posts($cat_slug) {
  $args = array( 'category_name' => $cat_slug);
  $posts = get_posts($args);
  return split_posts_array($posts, 2);
}

function debug($args) {
  echo "<pre>"; print_r($args); echo "</pre>";
}

function split_posts_array($posts, $columns = 1) {
  $f = count($posts) / $columns;
  $splitIndex = ($f >= 1.0) ? (int) $f : 1;
  if ($splitIndex > 1) {
  $columnOne = array_slice($posts, 0, $splitIndex - 1);
  $columnTwo = array_slice($posts, $splitIndex);
  } else {
    $columnOne = $posts;
    $columnTwo = array();
  }
  return array('col1' => $columnOne, 'col2' => $columnTwo);
}

function get_info_exchange_posts($slug='info-exchange') {
  $args = array( 'category_name' => $slug,
    'posts_per_page' => 3,
    'order_by' => 'date',);
  $ixposts = get_posts($args);
  foreach ($ixposts as $post) {
    setup_postdata($post);
?>
  <a style="font-size: 18px;" class="large-text" href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a><br>
  <?php the_excerpt(); ?>
  <hr>
  <?php 
  }
}