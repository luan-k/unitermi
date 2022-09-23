<?php

/** Theme setup */
require_once( 'inc/theme-setup.php' );

require get_theme_file_path('/inc/search-route.php');
function wkode_files(){
    wp_enqueue_style('wkode_main_styles', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_theme_file_uri('/dist/main.js'), NULL, '1.0', true);
	wp_localize_script('main-js', 'WKodeData', array(
        'root_url' => get_site_url()
    ));
    wp_enqueue_style('main-css', get_template_directory_uri() . '/dist/main.css');
	wp_enqueue_script('wkode-font_awesome', '//kit.fontawesome.com/fde7c29e46.js', NULL, '1.0', true);

}

add_action('wp_enqueue_scripts', 'wkode_files');

/* activating template without blocks */
	function action_remove_block_templates()
	{
		remove_theme_support('block-templates');
	}
	add_action('after_setup_theme', 'action_remove_block_templates', 15);

	function filter_no_woocommerce_block_templates($has_template)
	{
		return false;
	}

	function filter_add_filter_no_woocommerce_block_templates($template)
	{
		add_filter('woocommerce_has_block_template', 'filter_no_woocommerce_block_templates', 10, 1);
		return $template;
	}
	add_filter('template_include', 'filter_add_filter_no_woocommerce_block_templates',10, 1);
/* activating template without blocks */

function wkode_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('ProductImageList', 500, 500, true);
    add_image_size('ProductImageSingle', 800, 1000, true);
    add_image_size('heroBannerImage', 1600, 546, true);
    add_image_size('ImageCard', 237, 260, true);
}
add_action('after_setup_theme', 'wkode_features');


function wkode_config(){
	register_nav_menus(
        array(
            'main_menu' 	=> 'Menu Principal',
        )
    );

    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 255,
        'single_image_width'	=> 255,
        'product_grid' 			=> array(
            'default_rows'    => 3, //how many product rows
            'min_rows'        => 5, // minimum rows duh
            'max_rows'        => 10, // maximum rows duh
            'default_columns' => 1, // columns lol
            'min_columns'     => 3, // self explanatory duh
            'max_columns'     => 3,	 // self explanatory duh
        )
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    /* removendo o botao de comprar */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    /* sku e categoria */
   /*  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 ); */
    /* addicional information */
    add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
    /* breadcrumb */
    add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
    function jk_woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => ' &#124; ',
                'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb"> <i class="fas fa-home"></i>  ',
                'wrap_after'  => '</nav>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            );
    }
    /* acf links mercado e magazine */
    /* add_action( 'woocommerce_share', 'woocommerce_template_top_category_desc', 1 ); */
	/* function woocommerce_template_top_category_desc (){

        if(get_field('link_mercado')){?>
            <a target="_blank" class='mercado-livre botoes ' href="<?php the_field('link_mercado')?>"> Comprar no Mercado Livre </a>
        <?php }
        if(get_field('link_submarino')){?>
            <a target="_blank" class='submarino botoes ' href="<?php the_field('link_submarino')?>"> Comprar no Submarino </a>
        <?php }
        if(get_field('link_amazon')){?>
            <a target="_blank" class='amazon botoes ' href="<?php the_field('link_amazon')?>"> Comprar no Amazon </a>
        <?php }
        if(get_field('link_americanas')){?>
            <a target="_blank" class='americanas botoes ' href="<?php the_field('link_americanas')?>"> Comprar no Americanas </a>
        <?php }

	} */

    function my_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'], $tabs['reviews'] ); // To remove the additional information tab
        return $tabs;
    }
    /* remove product tabs */
    add_filter( 'woocommerce_product_data_tabs', 'custom_product_data_tabs' );
    function custom_product_data_tabs( $tabs ) {
    // unset( $tabs['general'] );
    unset( $tabs['inventory'] );
    unset( $tabs['shipping'] );
/*     unset( $tabs['linked_product'] );
    unset( $tabs['attribute'] );
    unset( $tabs['variations'] );
    unset( $tabs['advanced'] ); */
    return $tabs;
    }

    add_filter( 'product_type_selector', 'remove_product_types' );

    function remove_product_types( $types ){
        unset( $types['grouped'] );
        unset( $types['external'] );

        return $types;
    }

    add_filter( 'product_type_options', function( $options ) {




            // remove "Virtual" checkbox

            if( isset( $options[ 'virtual' ] ) ) {

                        unset( $options[ 'virtual' ] );

            }




            // remove "Downloadable" checkbox

            if( isset( $options[ 'downloadable' ] ) ) {

                        unset( $options[ 'downloadable' ] );

            }




            return $options;




    } );
	add_filter( 'wpforms_mailcheck_enabled', '__return_false' );
    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }
}

add_action( 'after_setup_theme', 'wkode_config', 0 );

// Register Custom Cor
function custom_unitermi_taxonomy_cor()  {
	$labels = array(
		'name'                       => 'Cores',
		'singular_name'              => 'Cor',
		'menu_name'                  => 'Cores',
		'all_items'                  => 'All Cores',
		'parent_item'                => 'Parente Cor',
		'parent_item_colon'          => 'Parente Cor:',
		'new_item_name'              => 'nome da Cor nova',
		'add_new_item'               => 'adicionar nova Cor',
		'edit_item'                  => 'Editar Cor',
		'update_item'                => 'Update Cor',
		'separate_items_with_commas' => 'Separate Cor with commas',
		'search_items'               => 'Procurar Cores',
		'add_or_remove_items'        => 'Adicionar ou remover Cores',
		'choose_from_most_used'      => 'Choose from the most used Cores',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'cor', 'product', $args );
}
add_action( 'init', 'custom_unitermi_taxonomy_cor');
// Register Custom Taxonomy
function custom_unitermi_taxonomy_litragem()  {
	$labels = array(
		'name'                       => 'Litragens',
		'singular_name'              => 'Litragem',
		'menu_name'                  => 'Litragens',
		'all_items'                  => 'All Litragens',
		'parent_item'                => 'Parente Litragem',
		'parent_item_colon'          => 'Parente Litragem:',
		'new_item_name'              => 'nome da Litragem nova',
		'add_new_item'               => 'adicionar nova Litragem',
		'edit_item'                  => 'Editar Litragem',
		'update_item'                => 'Update Litragem',
		'separate_items_with_commas' => 'Separate Litragem with commas',
		'search_items'               => 'Procurar Litragens',
		'add_or_remove_items'        => 'Adicionar ou remover Litragens',
		'choose_from_most_used'      => 'Choose from the most used Litragens',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'litragem', 'product', $args );
}
add_action( 'init', 'custom_unitermi_taxonomy_litragem');


add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}

/**
 * Change number of related products output
 */
function woo_related_products_limit() {
	global $product;

	  $args['posts_per_page'] = 3;
	  return $args;
  }
  add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
	function jk_related_products_args( $args ) {
	  $args['posts_per_page'] = 4; // 4 related products
	  $args['columns'] = 6; // arranged in 2 columns
	  return $args;
  }


// Change the Number of WooCommerce Products Displayed Per Page
/* add_filter( 'loop_shop_per_page', 'lw_loop_shop_per_page', 30 );

function lw_loop_shop_per_page( $products ) {
 $products = 6;
 return $products;
} */


 // Options: menu_order, popularity, rating, date, price, price-desc

function my_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["price"]);
    unset($orderby["price-desc"]);
    unset($orderby["rating"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );
