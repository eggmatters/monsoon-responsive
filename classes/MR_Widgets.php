<?php


/**
 * Description of MR_Widget_Search
 *
 * @author matthewe
 */
/**
 * Navigation Menu widget class
 *
 * @since 3.0.0
 */
 class MR_Nav_Menu_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'description' => __('Add a custom menu to your sidebar.') );
		parent::__construct( 'nav_menu', __('MR Custom Menu'), $widget_ops );
	}

	public function widget($args, $instance) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu ) {
			return;
    }

		/** This filter is documented in wp-includes/default-widgets.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
    }

		$nav_menu_args = array(
			'fallback_cb' => '',
			'menu'        => $nav_menu,
      'container-class' => 'container-fluid',
      'items_wrap' => '<ul id="%1$s" class="nav nav-sidebar">%3$s</ul>',
      'depth' => 1
		);

		/**
		 * Filter the arguments for the Custom Menu widget.
		 *
		 * @since 4.2.0
		 *
		 * @param array    $nav_menu_args {
		 *     An array of arguments passed to wp_nav_menu() to retrieve a custom menu.
		 *
		 *     @type callback|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
		 *     @type mixed         $menu        Menu ID, slug, or name.
		 * }
		 * @param stdClass $nav_menu      Nav menu object for the current menu.
		 * @param array    $args          Display arguments for the current widget.
		 */
		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args ) );

		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus();

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
		</p>
		<?php
	}
}

/**
 * Navigation Button widget class
 *
 * @since 3.0.0
 */
 class MR_Nav_Button_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'description' => __('Add a custom navigation button to your sidebar.') );
		parent::__construct( 'nav_button', __('MR Custom Menu Button'), $widget_ops );
	}

	public function widget($args, $instance) {
		// Get menu
		$nav_button_text = ! empty( $instance['nav_button_text'] ) ? $instance['nav_button_text'] : '';

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
    
    $permalink = ($instance['page_id'] != 0) ? get_permalink($instance['page_id']) : '#';

		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
    }
    ?>
    <a href="<?php echo $permalink; ?>"><button class='btn btn-default btn-lg'><?php echo $nav_button_text; ?></button></a>
    <?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		}
		if ( ! empty( $new_instance['nav_button_text'] ) ) {
			$instance['nav_button_text'] = $new_instance['nav_button_text'];
		}
    if (! empty( $new_instance['page_id'] ) ) {
      $instance['page_id'] = $new_instance['page_id'];
    }
		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$text = isset( $instance['nav_button_text'] ) ? $instance['nav_button_text'] : '';
    $pageId = isset( $instance['page_id']) ? $instance['page_id'] : 0;
    $pages = get_pages();
    ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('nav_button_text'); ?>"><?php _e('Enter Button Text:'); ?></label>
      <input type='text' id="<?php echo $this->get_field_id('nav_button_text'); ?>" name="<?php echo $this->get_field_name('nav_button_text'); ?>" 
             value='<?php echo $text ?>'>
		</p>
    <p>
      <label for="<?php echo $this->get_field_id('page_id') ?>"><?php _e('Page Link'); ?></label>
      <select id="<?php echo $this->get_field_id('page_id'); ?>" name="<?php echo $this->get_field_name('page_id'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $pages as $page ) {
				echo '<option value="' . $page->ID . '"'
					. selected( $pageId, $page->ID, false )
					. '>'. esc_html( $page->post_title ) . '</option>';
			}
		?>
      </select>
    </p>
		<?php
	}
}

/**
 * Category Filter Widget class
 *
 * @since 3.0.0
 */
 class MR_Category_Filter_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array( 'description' => __('Add a categories dropdown filter.') );
		parent::__construct( 'category_filter', __('MR Posts Category Filter'), $widget_ops );
	}

	public function widget($args, $instance) {
		$categories = get_page_categories();
    $categorySelects = array();
    $idx = 0;
    foreach ($categories as $categorySelection) {
      $categorySelects[$idx]['value'] = $categorySelection->slug;
      $categorySelects[$idx]['option'] = $categorySelection->name;
      $idx++;
    }
    
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
    
    $this->echoJs();
    ?>
    <p></p>
    <div class="form-group">
      <h3><?php echo $instance['title']; ?></h3>
      <select id="mr-cat-filter" name="mr-cat-filter">
        <option value="0" selected="true"><?php _e( '&mdash; Select Product Category&mdash;' ) ?></option>
        <?php
          foreach($categorySelects as $filterCategory) {
            echo '<option value="' . $filterCategory['value'] .'">' . $filterCategory['option'] . '</option>';
          }
        ?>
      </select>
    </div>
    <?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		}
		return $instance;
	}

	public function form( $instanclabele ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
    ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<?php
	}
  
  private function echoJs() {
    $urlBase = get_site_url();
    ?>
    <script type="text/javascript">
      var urlBase = "<?php echo $urlBase; ?>";
      if (typeof $ === 'undefined') {
        $ = jQuery;
      } 
      $(document).ready(function() {
        $('#mr-cat-filter').on( "change", function(e) {
          var url = urlBase + "/category/" + $('#' + e.target.id).val();
          window.location = url;
        })
      });
    </script>
    
    <?php
  }
}