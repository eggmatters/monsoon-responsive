<?php
/**
 * Category Icon administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */
require_once ABSPATH . '/wp-load.php';
require_once ABSPATH . 'wp-admin/admin-header.php';

global $wpdb;

if ( !current_user_can('edit_pages') ) {
	wp_die( __( 'You do not have sufficient permissions to access this page' ) );
}
$uploadUri = admin_url() . 'edit.php?page=category_icons_edit&mode=upload_icons';
$uploadFormUri = admin_url() . 'edit.php?page=category_icons_edit';
$themeIconsDir = get_theme_root() . '/monsoon-responsive/category_icons';
$imgPosts = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type like 'attachment'");

$mode = isset($_GET['mode'])  ? $_GET['mode'] : 'show';
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  $mode = 'save-file';
}
$title = __('Category Icons');
$form_class = 'media-upload-form type-form validate html-uploader';
?>

<?php if ($mode == 'show'): ?>
  <div class="wrap">
    <h2>
      <?php
      echo esc_html($title);
      if (current_user_can('upload_files')): ?>
        <a href="<?php echo $uploadUri ?>" class="add-new-h2"><?php echo esc_html_x('Add New Icon', 'file'); ?></a>
      <?php endif; ?>
    </h2>
  </div>
<?php elseif ($mode == 'upload_icons'): ?>
  <?php if (!current_user_can('upload_files')) {
    wp_die(__('You do not have permission to upload files.'));
  }
  ?>
  <div class="wrap">
    <h2> <?php echo esc_html($title); ?> </h2>
    <form enctype="multipart/form-data" 
          method="post" 
          action="<?php $uploadFormUri; ?>" 
          class="<?php echo esc_attr( $form_class ); ?>" 
          id="file-form">
      <input id="async-upload" type="file" name="icon-upload">
      <input id="html-upload" class="button" type="submit" value="Upload" name="html-upload">
    </form>
  </div>
<?php else: ?>
  <div class="wrap">
    <h2>
      <?php
      echo esc_html($title);
      if (current_user_can('upload_files')): ?>
        <a href="<?php echo $uploadUri ?>" class="add-new-h2"><?php echo esc_html_x('Add New Icon', 'file'); ?></a>
      <?php endif; ?>
    </h2>
    <p>Uploading file</p>
    <?php
      
      debug($_FILES);
    ?>
  </div>
<?php endif;
include( ABSPATH . 'wp-admin/admin-footer.php' );
