<?php

/**
 * Functions and definitions
 *
 */

/*
 * Let WordPress manage the document title.
 */
add_theme_support('title-tag');

/*
 * Enable support for Post Thumbnails on posts and pages.
 */
add_theme_support('post-thumbnails');

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support('html5', array(
	'search-form',
	// 'comment-form',
	// 'comment-list',
	'gallery',
	'caption',
));

/** 
 * Include primary navigation menu
 */
function untheme_nav_init()
{
	register_nav_menus(array(
		'menu-1' => 'Primary Menu',
	));
}
add_action('init', 'untheme_nav_init');

/**
 * Register widget area.
 *
 */
function untheme_widgets_init()
{
	register_sidebar(array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'untheme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function untheme_scripts()
{
	wp_enqueue_style('untheme-style', get_stylesheet_uri());
	wp_enqueue_style('untheme-custom-style', get_template_directory_uri() . '/assets/css/app.css');
	wp_enqueue_script('untheme-scripts', get_template_directory_uri() . '/assets/js/scripts.js');
}
add_action('wp_enqueue_scripts', 'untheme_scripts');

function mazze_header_menu($menu_name = 'menu-1')
{
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);

		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_list = '';
		$count = 0;
		$submenu = false;
		$cai = null;
		$cpi = get_the_id();
		foreach ($menu_items as $current) {
			if ($cpi == $current->object_id) {
				if (!$current->menu_item_parent) {
					$cpi = $current->ID;
				} else {
					$cpi = $current->menu_item_parent;
				}
				$cai = $current->ID;
				break;
			}
		}
		foreach ($menu_items as $menu_item) {
			$link = $menu_item->url;
			$title = $menu_item->title;
			$menu_item->ID == $cai ? $ac2 = ' nav-link link_menu hover:bg-purple-mazze transform hover:-translate-y-2' : $ac2 = ' nav-link link_menu hover:bg-purple-mazze transform hover:-translate-y-2';
			if (!$menu_item->menu_item_parent) {
				$parent_id = $menu_item->ID;
				$parent_id == $cpi ? $ac = ' nav-item active' : $ac = ' nav-item';
				if (!empty($menu_items[$count + 1]) && $menu_items[$count + 1]->menu_item_parent == $parent_id) { //Checking has child
					$menu_list .= '<li class="dropdown has_child' . $ac . '"><a href="' . $link . '" class="dropdown-toggle' . $ac2 . '" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="nav-span"></span>' . $title . '<span class="caret"></span></a>';
				} else {
					$menu_list .= '<li class="' . $ac . '">' . "\n";
					$menu_list .= '<a href="' . $link . '" class="' . $ac2 . '">' . $title . '</a>' . "\n";
				}
			}

			if ($parent_id == $menu_item->menu_item_parent) {
				if (!$submenu) {
					$submenu = true;
					$menu_list .= '<div class="dropdown-menu">' . "\n";
				}
				$menu_list .= '<a href="' . $link . '" class="dropdown-item' . $ac2 . '">' . $title . '</a>' . "\n";
				if (empty($menu_items[$count + 1]) || $menu_items[$count + 1]->menu_item_parent != $parent_id && $submenu) {
					$menu_list .= '</div>' . "\n";
					$submenu = false;
				}
			}
			if (empty($menu_items[$count + 1]) || $menu_items[$count + 1]->menu_item_parent != $parent_id) {
				$submenu = false;
			}
			++$count;
		}
	} else {
		$menu_list = '<li>Menu "' . $menu_name . '" not defined.</li>';
	}

	echo $menu_list;
}

function untheme_create_post_custom_post()
{
	register_post_type(
		'custom_post',
		array(
			'labels' => array(
				'name' => __('Custom Post', 'untheme'),
			),
			'public'       => true,
			'hierarchical' => true,
			'supports'     => array(
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
			),
			'taxonomies'   => array(
				'post_tag',
				'category',
			)
		)
	);
}
add_action('init', 'untheme_create_post_custom_post'); // Add our work type