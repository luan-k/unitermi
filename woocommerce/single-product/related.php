<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) :

	$cores = get_the_terms( get_the_ID() , 'product_cat' );

	$categorias = get_the_terms( get_the_ID() , 'litragem' );

	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => 4,
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
	$query = new \WP_Query( $args );
/* 	var_dump($query); */

	?>

	<section class="related products">

		<section class="outras-cores">
			<div class=""> <?php
					if ( $query->have_posts() ) {?>
							<?php ?>
								<h3 class="text-3xl mb-6 mt-12">Outras cores</h3>
								<div class="grid grid-cols-1 md:grid-cols-4 md:col-span-4 gap-16" data-anime="bottom">
									 <?php
									while ( $query->have_posts() ) {
										$query->the_post();
										 wc_get_template_part('template-parts/blocks/content', 'card-products');
									} ?>
								</div>
							<?php  ?>
					<?php } ?>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>

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
