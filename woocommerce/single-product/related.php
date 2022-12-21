<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}


if ( $related_products ) :

	?>
	<section class="related products mt-12">
		<div id="promotional_slider">
			<h3 class="text-4xl mb-12 md:mb-3 mt-12">Outras cores</h3>
			<div class="promotionalslider_wrapper" data-anime="bottom">
				<?php

				$cores = get_the_terms( get_the_ID() , 'product_cat' );

				$categorias = get_the_terms( get_the_ID() , 'litragem' );

				$args = array(
					'post_type'      => 'product',
					'post_status'    => 'publish',
					'posts_per_page' => 12,
					'post__not_in' => array(get_the_ID()),
					'tax_query'      => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'litragem',
							'field'    => 'slug',
							'terms'    => $categorias[0]->slug,
						),
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $cores[0]->slug,
						),
				));
				$homepagePosts = new \WP_Query( $args );

				while($homepagePosts->have_posts()){
					$homepagePosts->the_post();
					$price = get_post_meta( get_the_ID(), '_price', true );
					$product = wc_get_product( get_the_ID() ); ?>


					<div class="promotionalslider_single">
						<a href="<?php the_permalink(); ?>" class="products-banner-carousel-card underline-hover   relative">
							<div class="products-banner-carousel-card__img-wrapper product-page-img-wrapper">
								<img class="products-banner-carousel-card__img-wrapper--img"  src="<?php echo get_the_post_thumbnail_url( get_the_ID()) ?>" alt="imagem produto">
							</div>
							<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
								<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
									<?php echo wp_trim_words( get_the_title(), 5);  ?>
								</h3>
								<div class="btn-input w-full items-center justify-center mt-3 py-3 px-6 text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg">
									Onde Comprar
								</div>
							</div>

						</a>

					</div>
				<?php } wp_reset_postdata(); ?>
			</div>
		</div>

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php woocommerce_product_loop_start(); ?>

		<?php
		// Replace by Content Views Pro layout
		if ( defined( 'PT_CV_VERSION_PRO' ) ) {
			$pids = array();
			foreach ( $related_products as $related_product ) {
				$pids[] = $related_product->get_id();
			}
			// Replace VIEW_ID with the ID of the view
			echo do_shortcode( '[pt_view id="VIEW_ID" post_id="' . implode( ',', $pids ) . '"]' );
		} else {
			?>
			<div class="grid grid-cols-1 md:grid-cols-4  gap-16">
				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS[ 'post' ] = & $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>


						<?php wc_get_template_part('template-parts/blocks/content', 'card-products');?>



				<?php endforeach; ?>
			</div>
		<?php } ?>

		<?php woocommerce_product_loop_end(); ?>
	</section>
	<?php
endif;

wp_reset_postdata();
