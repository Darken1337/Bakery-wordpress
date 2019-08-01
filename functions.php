<?php

/**
* Отключение доступа из вне по прямой ссылке
 */

if( ! defined('ABSPATH') ) {
	die();
}

 if ( ! current_user_can( 'manage_options' ) ) {
	show_admin_bar( false );
}

/**
 * Отключить ненужные размеры картинок
 */

function true_remove_default_image_sizes( $sizes ) {
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	return $sizes;
}
 
add_filter('intermediate_image_sizes_advanced', 'true_remove_default_image_sizes');

/**
 * Фильтры меню
*/
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);

    function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
    {
        if($args->theme_location === 'header_menu'){
            $atts['class'] = 'menu__item';
        }else if($args->theme_location === 'header_mobile'){
			$atts['class'] = 'menu-responsive__item';
		}else if(
			$args->theme_location === 'footer_menu_part_one' || 
			$args->theme_location === 'footer_menu_part_two')
		{
			$atts['class'] = 'footer-nav__item';
		}
        return $atts;
	}
	
add_filter('nav_menu_item_id', 'filter_nav_menu_item_id', 10, 4);

function filter_nav_menu_item_id($menu_id, $item, $args, $depth)
{
	return $args->theme_location === 'header_menu' || $args->theme_location === 'header_mobile' || $args->theme_location === 'footer_menu_part_one' || $args->theme_location === 'footer_menu_part_two' ? '' : $menu_id;
}


if ( ! function_exists( 'bakery_setup' ) ) :

	function bakery_setup() {

		load_theme_textdomain( 'bakery', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'menus' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_image_size('art_gallery_img', 295, 256, true );
		add_image_size( 'pancakes_slider_img', 746, 546, true );
		add_image_size( 'tasty_slider_img', 90, 90, true );
	}
endif;
add_action( 'after_setup_theme', 'bakery_setup' );


add_action( 'after_setup_theme', 'register_custom_menus');

function register_custom_menus()
		{
			register_nav_menus( [
				'header_menu' => 'Меню в шапке',
				'header_mobile' => 'Адаптивное меню',
				'footer_menu_part_one' => 'Меню в подвале слева',
				'footer_menu_part_two' => 'Меню в подвале справа'
			] );
		}

/**
 * Enqueue scripts and styles.
 */
function bakery_scripts() {
	
	/**
	 * Подключение стилей библиотек и шрифтов
	 */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/libs/css/font-awesome.min.css' );
	wp_enqueue_style( 'slick-slider-style-first', get_template_directory_uri() . '/assets/libs/css/slick.min.css' );
	wp_enqueue_style( 'slick-slider-style-second', get_template_directory_uri() . '/assets/libs/css/slick-theme.min.css' );

	/**
	 * Подключение главного файла CSS
	 */
	wp_enqueue_style( 'bakery-style', get_stylesheet_uri() );

	/**
	 * Подключение библиотеки jQuery
	*/
	wp_enqueue_script( 'jquery' );

	/**
	 * Подключение других библиотек
	 */
	wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/libs/js/slick.min.js', array('jquery'), '', true );
	
	/**
	 * Подключение основного файла скриптов 
	 */
	wp_enqueue_script( 'bakery-script', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '', true );


}
add_action( 'wp_enqueue_scripts', 'bakery_scripts' );

function my_custom_post_types( ){

	register_post_type( 'art_slider', array(
		'labels'             => array(
			'name'               => 'Высказывания поваров', // Основное название типа записи
			'singular_name'      => 'Высказывание повара', // отдельное название записи типа Book
			'add_new'            => 'Добавить новое',
			'add_new_item'       => 'Добавить новое высказывание',
			'edit_item'          => 'Редактировать высказывание',
			'new_item'           => 'Новое высказывание',
			'view_item'          => 'Посмотреть высказывание',
			'search_items'       => 'Найти высказывание',
			'not_found'          => 'Высказываний не найдено',
			'not_found_in_trash' => 'В корзине высказываний не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Высказывания'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	) );

	register_post_type( 'pancakes_slider_big', array(
		'labels'             => array(
			'name'               => 'Слайдер блинов большой', // Основное название типа записи
			'singular_name'      => 'Слайдер блинов большой', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый слайд',
			'edit_item'          => 'Редактировать слайд',
			'new_item'           => 'Новый слайд',
			'view_item'          => 'Посмотреть слайд',
			'search_items'       => 'Найти слайд',
			'not_found'          => 'Слайдов не найдено',
			'not_found_in_trash' => 'В корзине слайдов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Слайдер блинов большой'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	) );

	register_post_type( 'tasty_slider', array(
		'labels'             => array(
			'name'               => 'Слайдер блинов маленький', // Основное название типа записи
			'singular_name'      => 'Слайдер блинов маленький', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый слайд',
			'edit_item'          => 'Редактировать слайд',
			'new_item'           => 'Новый слайд',
			'view_item'          => 'Посмотреть слайд',
			'search_items'       => 'Найти слайд',
			'not_found'          => 'Слайдов не найдено',
			'not_found_in_trash' => 'В корзине слайдов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Слайдер блинов маленький'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	) );

	register_post_type( 'breakfast_morning', array(
		'labels'             => array(
			'name'               => 'Утреннее меню', // Основное название типа записи
			'singular_name'      => 'Утреннее меню', // отдельное название записи типа Book
			'add_new'            => 'Добавить новое',
			'add_new_item'       => 'Добавить новое меню',
			'edit_item'          => 'Редактировать меню',
			'new_item'           => 'Новое меню',
			'view_item'          => 'Посмотреть меню',
			'search_items'       => 'Найти меню',
			'not_found'          => 'Меню не найдено',
			'not_found_in_trash' => 'В корзине меню не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Превью меню завтрака'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	) );

}

add_action( 'init', 'my_custom_post_types' );
