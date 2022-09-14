<?php

if ( ! function_exists( 'unicef_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function unicef_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'custom-logo' );

		/**
		 * Specify Image Sizes
		 */
		update_option( 'thumbnail_size_w', 70 );
		update_option( 'thumbnail_size_h', 80 );
		update_option( 'thumbnail_crop', 1 );

		update_option( 'medium_size_w', 360 );
		update_option( 'medium_size_h', 300 );

		update_option( 'large_size_w', 750 );
		update_option( 'large_size_h', 540 );

		add_image_size( 'vertical_big', 360, 530, true );
		add_image_size( 'vertical_medium', 180, 265, true );
		// add_image_size('magazine_mini', 343, 441, true) is defined in extras.php
		// add_image_size('magazine_mega', 510, 666, true) is defined in extras.php


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'unicef_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Remove post format
		remove_theme_support( 'post-formats' );

		// declare support for woocommerce
		add_theme_support( 'woocommerce' );

	}
endif; // unicef_setup
add_action( 'after_setup_theme', 'unicef_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function unicef_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'unicef' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'unicef_widgets_init' );


function my_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'my_excerpt_length' );

if ( function_exists( 'acf_register_block_type' ) ) {

	add_action(
		'acf/init',
		function () {

			// Register new block category.
			add_filter( 'block_categories_all', 'register_block_categories', 10, 1 );

			/**
			 * Register category for blocks
			 *
			 * @param $categories
			 *
			 * @return array
			 */
			function register_block_categories( $categories ) {
				return array_merge(
					array(
						array(
							'slug'  => 'unitermi',
							'title' => __( 'Unitermi', 'unitermi' ),
						),
					),
					$categories
				);
			}

			acf_register_block_type(
				array(
					'name'            => 'post',
					'title'           => __( 'Post Destaque' ),
					'description'     => __( 'A custom phrase of the week block' ),
					'render_template' => 'template-parts/blocks/posts/content.php',
					'category'        => 'unitermi',
					'icon'            => 'format-status',
					'keywords'        => array( 'Post Destaque' ),
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							/* 'data' => array(
								'preview' => WL_URL . '/template-parts/blocks/preview/post.png',
							), */
						),
					),
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'utilitary_contact_bar',
					'title'           => __( 'Barra Utilitária de Contato' ),
					'description'     => __( 'A custom phrase of the week block' ),
					'render_template' => 'template-parts/blocks/posts/utilitary-bar.php',
					'category'        => 'unitermi',
					'icon'            => 'format-status',
					'keywords'        => array( 'barra utilitaria de contato' ),
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							/* 'data' => array(
								'preview' => WL_URL . '/template-parts/blocks/preview/post.png',
							), */
						),
					),
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'products_banner_carousel',
					'title'           => __( 'Banner de produtos carousel' ),
					'description'     => __( 'Um Banner com produtos em um carousel' ),
					'render_template' => 'template-parts/blocks/posts/products_banner_carousel.php',
					'category'        => 'unitermi',
					'icon'            => 'format-status',
					'keywords'        => array( 'slider' ),
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							/* 'data' => array(
								'preview' => WL_URL . '/template-parts/blocks/preview/post.png',
							), */
						),
					),
				)
			);
		}
	);
}
