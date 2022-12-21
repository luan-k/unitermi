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
		<div class="col-span-1 lg:col-span-9 order-1 md:order-2 mt-6">
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

				woocommerce_product_loop_start(); ?>
				<div class="grid grid-cols-1 md:grid-cols-4"> <?php
						$categories = get_terms(array (
							'taxonomy' => 'product_cat',
							'hide_empty' => true,
						));
						$cores = get_terms(array (
							'taxonomy' => 'cor',
							'hide_empty' => true,
						));
						$litragens = get_terms(array (
							'taxonomy' => 'litragem',
							'hide_empty' => true,
						));
						$tax_query = array();
						if( isset($_GET['categoria'] )) {
							$tax_query[] = array(
								'taxonomy'  => 'product_cat',
	  							'field'    => 'term_id',
								'terms' => $_GET['categoria'],
							);
						}
						if( isset($_GET['cores'] )) {
							$tax_query[] = array(
								'taxonomy'  => 'cor',
	  							'field'    => 'term_id',
								'terms' => $_GET['cores'],
							);
						}
						if( isset($_GET['litr'] )) {
							$tax_query[] = array(
								'taxonomy'  => 'litragem',
	  							'field'    => 'term_id',
								'terms' => $_GET['litr'],
							);
						}
						$paged = get_query_var('paged', 1);
						$args = array(
							'post_type'      => 'product',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
							'tax_query'      => $tax_query,
							'paged' => get_query_var( 'paged' ),
						);
						$query = new \WP_Query( $args );
						?> <div class=""> <?php echo do_shortcode('[yith_wcan_filters slug="default-preset"]') ?>
						<form class="text-xl text-black mb-2 font-josefin-sans font-light pr-0 md:pr-12 flex flex-col content-center md:items-start items-center">
							<div id="px-acc001" class="px-app px-acc m-auto md:m-0">


								<?php
							if(!is_wp_error($categories) && !empty($categories)){ ?>
								<div class=" border-t border-gray-400"></div>
								<div class="px-acc-item active">
									<div class="px-acc-head">
									<span class="px-acc-title"><i class='bx bx-phone'></i><h4 class="text-2xl mb-2 mt-3 font-josefin-sans font-semibold">Modelo</h4></span>
									<span class="px-acc-icon">
										<svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
									</span>
									</div>
									<div class="px-acc-body" style="height: auto;">
									<div class="px-acc-content">
										<?php foreach ($categories as $category) {
									/* echo $category->name . "<br>"; */ ?>
									<input type="checkbox"
										id="<?php echo $category->name ?>"
										name="categoria[]"
										<?php echo in_array( $category->term_id, (isset($_GET['categoria']) ? $_GET['categoria'] : array() )) ? 'checked' : ''; ?>
										value="<?php echo $category->term_id ?>">
									<label class="text-xl text-black mb-2 font-medium" for="<?php echo $category->name ?>"> <?php echo $category->name ?></label><br> <?php
								} ?>
									</div>
									</div>
								</div>
								 <?php

							}
							if(!is_wp_error($cores) && !empty($cores)){ ?>
								<div class=" border-t mt-3 border-gray-400"></div>
								<div class="px-acc-item active">
									<div class="px-acc-head">
										<span class="px-acc-title"><i class='bx bx-cog'></i><h4 class="text-2xl mb-2 mt-3 font-josefin-sans font-semibold">Cor</h4></span>
										<span class="px-acc-icon">
											<svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
										</span>
									</div>
									<div class="px-acc-body" style="height: auto;">
										<div class="px-acc-content">
											<?php
											foreach ($cores as $cor) {
												/* echo $cor->name . "<br>"; */ ?>
												<input type="checkbox"
													id="<?php echo $cor->name ?>"
													name="cores[]"
													<?php echo in_array( $cor->term_id, (isset($_GET['cores']) ? $_GET['cores'] : array() )) ? 'checked' : ''; ?>
													value="<?php echo $cor->term_id ?>">
												<label class="text-xl text-black mb-2 font-medium" for="<?php echo $cor->name ?>"> <?php echo $cor->name ?></label><br> <?php
											}
											?>
										</div>
									</div>
								</div>
								 <?php

							}
							if(!is_wp_error($litragens) && !empty($litragens)){ ?>
								<div class=" border-t mt-3 border-gray-400"></div>
								<div class="px-acc-item active">
									<div class="px-acc-head">
										<span class="px-acc-title"><i class='bx bx-cog'></i><h4 class="text-2xl mb-2 mt-3 font-josefin-sans font-semibold">Litragem</h4> </span>
										<span class="px-acc-icon">
											<svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
										</span>
									</div>
									<div class="px-acc-body" style="height: auto;">
										<div class="px-acc-content">
											<?php
											foreach ($litragens as $litragem) {
												/* echo $litragem->name . "<br>"; */ ?>
												<input type="checkbox"
													id="<?php echo $litragem->name ?>"
													name="litr[]"
													<?php echo in_array( $litragem->term_id, (isset($_GET['litr']) ? $_GET['litr'] : array() )) ? 'checked' : ''; ?>
													value="<?php echo $litragem->term_id ?>">
												<label class="text-xl text-black mb-2 font-medium" for="<?php echo $litragem->name ?>"> <?php echo $litragem->name ?></label><br> <?php
											}
											?>
										</div>
									</div>
								</div>
								<?php
							}
							?>
							</div>
							<input type="submit" value="Filtrar" class="btn-input items-center justify-center rounded-2xl mt-12 py-6 px-12 text-center border-2 border-unitermi-primary-redDark text-unitermi-primary-redDark font-josefin-sans font-bold text-xl">
						</form> </div><?php



				?> <div id="Shop-id" class="shop-loop-custom grid grid-cols-1 md:grid-cols-4 gap-7 col-span-3 mt-20 pb-64 items-start content-start " data-anime="bottom">
				<?php if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );


						wc_get_template_part('template-parts/blocks/content', 'card-products-no-btn');
					}
				}?>
				</div>
				</div>
				<?php

				woocommerce_product_loop_end();
				wp_reset_query();

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
		</div>
	</div>
</div>
<?php
get_footer( 'shop' );
