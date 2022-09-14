<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );?>
<div class="container">
	<div class="grid grid-cols-1 py-24 text-xl">
		<!-- <div class="col-span-4 lg:col-span-3 order-2 md:order-1">
			<?php
				/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			//do_action( 'woocommerce_sidebar' );?>
		</div> -->
		<div class="col-span-1 lg:col-span-9 order-1 md:order-2">
			<?php
			/**
			* Hook: woocommerce_before_main_content.
			*
			* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			* @hooked woocommerce_breadcrumb - 20
			* @hooked WC_Structured_Data::generate_website_data() - 30
			*/
			do_action( 'woocommerce_before_main_content' );

			?>

			<header class="woocommerce-products-header">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</header>
			<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();
				/* $tax_query = array();
				if( isset($_GET['categoria'] ) {
					$tax_query[] = array(
						...
						'terms' => $_GET['categoria']
					);
				} */

				/* if( isset($_GET['cores'] ) {
				$tax_query[] = array(
					...
					'terms' => $_GET['cores']
				);
				} */

				// wp query = ...
				/* 'tax_query' => $tax_query */
				/* wp_reset_postdata(); */

						/* var_dump(get_terms(array (
							'taxonomy' => 'product_cat',
							'hide_empty' => true,
						))); */
						$category = get_terms(array (
							'taxonomy' => 'product_cat',
							'hide_empty' => true,
						));
						$cor = get_terms(array (
							'taxonomy' => 'cor',
							'hide_empty' => true,
						));
						$litragem = get_terms(array (
							'taxonomy' => 'litragem',
							'hide_empty' => true,
						));
						$tax_query = array();
						if( isset($_GET['categoria'] )) {
							$tax_query[] = array(
								'taxonomy'  => 'product_cat',
	  							'field'    => 'term_id',
								'terms' => $_GET['categoria']
							);
						}
						if( isset($_GET['cor'] )) {
							$tax_query[] = array(
								'taxonomy'  => 'cor',
	  							'field'    => 'term_id',
								'terms' => $_GET['cor']
							);
						}
						if( isset($_GET['litragem'] )) {
							$tax_query[] = array(
								'taxonomy'  => 'litragem',
	  							'field'    => 'term_id',
								'terms' => $_GET['litragem']
							);
						}
						$args = array(
							'post_type'      => 'product',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
							'tax_query'      => $tax_query,
						);
						var_dump($tax_query);
						$query = new \WP_Query( $args );
						?>

						<form> <?php
							foreach ($category as $categories) {
								/* echo $categories->name . "<br>"; */ ?>
								<input type="checkbox" id="<?php echo $categories->name ?>" name="categoria[]" <?php echo in_array( $categories->term_id, $_GET['categoria']) ? 'checked' : ''; ?> value="<?php echo $categories->term_id ?>">
								<label for="<?php echo $categories->name ?>"> <?php echo $categories->name ?></label><br> <?php
							}
							foreach ($cor as $cores) {
								/* echo $categories->name . "<br>"; */ ?>
								<input type="checkbox" id="<?php echo $cores->name ?>" name="cor[]" <?php echo in_array( $cores->term_id, $_GET['cor']) ? 'checked' : ''; ?> value="<?php echo $cores->term_id ?>">
								<label for="<?php echo $cores->name ?>"> <?php echo $cores->name ?></label><br> <?php
							}
							foreach ($litragem as $litragens) {
								/* echo $categories->name . "<br>"; */ ?>
								<input type="checkbox" id="<?php echo $litragens->name ?>" name="litragem[]" <?php echo in_array( $litragens->term_id, $_GET['litragem']) ? 'checked' : ''; ?> value="<?php echo $litragens->term_id ?>">
								<label for="<?php echo $litragens->name ?>"> <?php echo $litragens->name ?></label><br> <?php
							}
							?>
							<input type="submit" value="Submit">
						</form> <?php



				?> <div id="Shop-id" class="grid grid-cols-1 md:grid-cols-6 gap-7" data-anime="bottom">
				<?php if ( wc_get_loop_prop( 'total' ) ) {
					while ( $query->have_posts() ) {
						$query->the_post();


						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part('template-parts/blocks/content', 'card-products');
					}
				}?>
				</div>

				<?php

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );

			?>
			<?php
	// Sidebar

 get_sidebar( 'primary' ); ?>
		</div>
	</div>
</div>
<?php
get_footer( 'shop' );
