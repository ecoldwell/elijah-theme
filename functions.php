<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

// /**
//  * Load Editor functions.
//  */
// require get_template_directory() . '/inc/editor.php';
// function revcon_change_post_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Locations';
//     $submenu['edit.php'][5][0] = 'Locations';
//     $submenu['edit.php'][10][0] = 'Add Location';
//     $submenu['edit.php'][16][0] = 'Locations Tags';
// }
// function revcon_change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'Locations';
//     $labels->singular_name = 'Locations';
//     $labels->add_new = 'Add Locations';
//     $labels->add_new_item = 'Add Locations';
//     $labels->edit_item = 'Edit Locations';
//     $labels->new_item = 'Locations';
//     $labels->view_item = 'View Locations';
//     $labels->search_items = 'Search Locations';
//     $labels->not_found = 'No Locations found';
//     $labels->not_found_in_trash = 'No Locations found in Trash';
//     $labels->all_items = 'All Locations';
//     $labels->menu_name = 'Locations';
//     $labels->name_admin_bar = 'News';
// }
 
// add_action( 'admin_menu', 'revcon_change_post_label' );
// add_action( 'init', 'revcon_change_post_object' );
// add_filter('show_admin_bar', '__return_false');
// add_filter( 'mce_buttons_3', 'add_more_buttons' );
// function add_more_buttons( $buttons ) {

//     $buttons[]='hr';
//     $buttons[]='del';
//     $buttons[]='sub';
//     $buttons[]='sup';
//     $buttons[]='fontselect';
//     $buttons[]='fontsizeselect';
//     $buttons[]='cleanup';
//     $buttons[]='styleselect';

// return $buttons;

// }