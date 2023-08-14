<?php

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('adem_setup')) {
	function adem_setup()
	{
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support('editor-styles');
		add_editor_style();

		register_nav_menus(
			array(
				'menu_main' => 'Основное меню',
				'menu_popup' => 'Меню попап'
			)
		);
	}

	//	register thumbnails
//	add_image_size('123x123', 123, 123, true);

	// register post types
	register_post_type('review', [
		'label' => null,
		'labels' => [
			'name' => 'Отзывы',
			'singular_name' => 'Отзыв',
			'add_new' => 'Добавить отзыв',
			'add_new_item' => 'Добавить отзыв',
			'edit_item' => 'Редактировать отзыв',
			'new_item' => 'Новый отзыв',
			'view_item' => 'Смотреть отзыв',
			'search_items' => 'Найти отзыв',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Отзывы',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-format-chat',
		'supports' => ['title'],
		'taxonomies' => ['review_type'],
		'has_archive' => true,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => false
	]);

	register_post_type('faq', [
		'label' => null,
		'labels' => [
			'name' => 'Вопрос - ответ',
			'singular_name' => 'Вопрос - ответ',
			'add_new' => 'Добавить вопрос',
			'add_new_item' => 'Добавить вопрос',
			'edit_item' => 'Редактировать вопрос',
			'new_item' => 'Новый вопрос',
			'view_item' => 'Смотреть вопрос',
			'search_items' => 'Найти вопрос',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Вопрос - ответ',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 23,
		'menu_icon' => 'dashicons-editor-help',
		'supports' => ['title'],
		'taxonomies' => ['faq_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => false
	]);

	register_post_type('project', [
		'label' => null,
		'labels' => [
			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new' => 'Добавить проект',
			'add_new_item' => 'Добавить проект',
			'edit_item' => 'Редактировать проект',
			'new_item' => 'Новый проект',
			'view_item' => 'Смотреть проект',
			'search_items' => 'Найти проект',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Портфолио',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => ['title', 'thumbnail'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => true
	]);
}

add_action('after_setup_theme', 'adem_setup');

// Return classic widgets
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');

add_action('wp_enqueue_scripts', 'adem_scripts');
function adem_scripts()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/vendor/css/fancybox.css', array(), '4.0.31');
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/vendor/js/fancybox.umd.js', array(), '4.0.31', true);
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/css/swiper-bundle.min.css', array(), '8.4.7');
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/js/swiper-bundle.min.js', array(), '8.4.7', true);
	wp_enqueue_style('adem', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_script('adem', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true);
	wp_localize_script('adem', 'adem_ajax', array('url' => admin_url('admin-ajax.php')));
}

// Ending on map objects function

function endingMap ($num) {
	$number = substr($num, -2);

	if ($number > 10 and $number < 20) {
		$ending = 'Выполненных проектов';
	} else {
		$number = substr($number, -1);

		if ($number == 1) $ending = 'Выполненный проект';
		if ($number > 1) $ending = 'Выполненных проекта';
		if ($number > 4 || $number == 0) $ending = 'Выполненных проектов';
	}

	echo $ending;
}

// Custom breadcrumbs yoast
add_filter( 'wpseo_breadcrumb_links', 'custom_breadcrumbs' );

function custom_breadcrumbs( $links ) {
	global $post;

	if( is_singular( 'project' ) ) {
		$breadcrumb[] = array(
			'url' => get_page_link( 26 ),
			'text' => 'Наши работы',
		);

		array_splice( $links, 1, -2, $breadcrumb );
	}

	return $links;
}

// disable scale images
add_filter('big_image_size_threshold', '__return_false');

// remove prefix in archive title
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

// excerpt
function adem_excerpt($limit, $ID = null)
{
	return mb_substr(get_the_excerpt($ID), 0, $limit) . '...';
}

require 'inc/acf.php';
// пригодится для аякс загрузки постов
require 'inc/load-more.php';
require 'inc/mail.php';
require 'inc/svg.php';
require 'inc/tiny-mce.php';
require 'inc/traffic.php';
