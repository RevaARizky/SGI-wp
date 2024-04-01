<?php
/**
 * Add theme support
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats');
    add_theme_support('menus');
    add_theme_support('editor-styles');
    add_editor_style('dist/editor.css');

    register_nav_menus([
        'main_navigation' => __('Main Navigation'),
        'sub_navigation' => __('Sub Navigation'),
        'footer_navigation_1' => __('Footer Navigation 1'),
        'footer_navigation_2' => __('Footer Navigation 2'),
    ]);

    if(function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Header',
            'menu_slug' => 'header-options',
        ]);
        acf_add_options_page([
            'page_title' => 'CTA Global',
            'menu_slug' => 'general-global',
        ]);
        acf_add_options_page([
            'page_title' => 'Sub Business Global',
            'menu_slug' => 'general-sub-business',
        ]);
    }

});

/**
 * Enqueue script and styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('app', assets_url('/dist/app.css'), [], null);
    wp_enqueue_script('app', assets_url('/dist/app.js'), ['jquery'], null, true);

    // Register script for blocks
    // If needed, separate the script per block
});

add_filter('show_admin_bar', '__return_false');

function wp_get_menu_array($current_menu) {

    $array_menu = wp_get_nav_menu_items($current_menu);
	$menu = array();
	foreach ($array_menu as $m) {
		if (empty($m->menu_item_parent)) {
			$menu[$m->ID] = array();
			$menu[$m->ID]['ID'] 		= 	$m->ID;
			$menu[$m->ID]['title'] 		= 	$m->title;
			$menu[$m->ID]['url'] 		= 	$m->url;
			$menu[$m->ID]['children']	= 	array();
		}
	}
	$submenu = array();
	foreach ($array_menu as $m) {
		if ($m->menu_item_parent) {
			$submenu[$m->ID] = array();
			$submenu[$m->ID]['ID'] 		= 	$m->ID;
			$submenu[$m->ID]['title']	= 	$m->title;
			$submenu[$m->ID]['url'] 	= 	$m->url;
			$menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
		}
	}
    return $menu;
    
}


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
	   return $data;
	}
  
	$filetype = wp_check_filetype( $filename, $mimes );
  
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );

add_filter( 'acf/load_attachment', 'custom_load_attachment', 10, 3);
function custom_load_attachment ($response, $attachment, $meta){
  if ($response['type'] == 'image'){
    $response['icon'] = $response['sizes']['thumbnail'];
  }
  return $response;
}