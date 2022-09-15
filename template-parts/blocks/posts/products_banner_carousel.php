<?php

namespace WL;

$block_id         = '';
$default_block_id = '';
if ( isset( $block ) ) {
	$block_id         = $block['id'];
	$default_block_id = $block['id'];
	if ( ! empty( $block['anchor'] ) ) {
		$block_id = $block['anchor'];
	}
}

$title        = get_field( 'products_banner_carousel_title' );
$font         = get_field( 'products_banner_carousel_font' );
$img          = get_field( 'products_banner_carousel_img' );
$link_text    = get_field( 'products_banner_carousel_link_text' );
$posts        = get_field( 'products_banner_carousel_posts' );
$posts_manual = get_field( 'products_banner_select_posts' );
$posts_select = get_field( 'products_banner_selection' );



/* if ( ! $primary || empty( $primary ) ) {
	$primary = get_posts(
		array(
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post',
			'numberposts' => 1,
		)
	);
};
if ( ! $secondary || empty( $secondary ) ) {
	$secondary = get_posts(
		array(
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post',
			'numberposts' => 1,
            'offset' => 1,
		)
	);
};
 */
if ( $title || $img || $posts) :
	?>
		<section class="products-banner-carousel mb-56" >
			<div class="products-banner-carousel__hero">
				<?php if($img){ ?>
					<a class="products-banner-carousel__img relative" href="<?php if($posts_select == 'relational'){ $terms = get_the_terms( $posts_manual[0]->ID, 'product_cat' ); foreach ($terms as $term) { $product_cat_id = $term->term_id; $link = get_term_link( (int)$product_cat_id, 'product_cat' ); echo $link; break; }} elseif ($posts_select == 'taxonomy'){ echo esc_url(site_url() . '/product-category/' . $posts[0]->slug); } ?>">
						<?php if($title){ ?>
							<h2 class="products-banner-carousel__title
								<?php
									if($font){
										if($font == 'josefin'){
											echo "font-josefin-sans uppercase";
										}
										if($font == 'montserrat'){
											echo "font-montserrat uppercase";
										}
										if($font == 'cursivo'){
											echo "font-dancing-script capitalize";
										}
									}
								?>
							">
								<?php echo esc_html($title) ?>
							</h2>
						<?php } ?>
						<img src="<?php echo $img['sizes']['heroBannerImage'] ?>" alt="" srcset="">
					</a>
				<?php }
				if($posts_select == 'relational'){ ?>
					<div class="products-banner-carousel__products">
						<div class="m-auto gap-3 mt-6 container grid grid-cols-6"> <?php
						?>
							<a href="<?php $terms = get_the_terms( $posts_manual[0]->ID, 'product_cat' ); foreach ($terms as $term) { $product_cat_id = $term->term_id; $link = get_term_link( (int)$product_cat_id, 'product_cat' ); echo $link; break; } ?>" class="products-banner-carousel__phrase inline relative underline-hover">
								<h4 class="products-banner-carousel__phrase--title pr-6">
									<?php
									if($link_text){
										echo $link_text;
									}else{
										echo "Para melhorar a hora do cafézinho";
									}
									?>
								</h4>
								<svg class="products-banner-carousel__phrase--svg w-9 inline text-gray-300 fill-current pr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
							</a>

							<div class="grid grid-cols-4 col-span-4 gap-3"> <?php
								for ($i = 0; $i < 4; $i++){ ?>

									<?php
									$post_id   	     = $posts_manual[$i]->ID;
									$post_category	 = get_the_category($post_id);
									$post_title 	 = $posts_manual[$i]->post_title;
									$post_subtitle   = get_field( 'subtitle', $post_id );
									$post_image 	 = get_the_post_thumbnail_url($posts_manual[$i]->ID, 'ImageCard');
									$link       	 = get_the_permalink( $posts_manual[$i] );
									$post_content    = $posts_manual[$i]->post_content;
									?>
									<a href="<?php echo $link; ?>" class="products-banner-carousel-card underline-hover rounded-md relative">
										<div class="products-banner-carousel-card__img-wrapper">
											<img class="products-banner-carousel-card__img-wrapper--img" src="<?php echo $post_image; ?>" alt="imagem produto">
										</div>
										<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
											<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
												<?php echo wp_trim_words( $post_title, 5);  ?>
											</h3>
										</div>
									</a>
									<?php
								} ?>
							</div>
							<div class="ml-9 products-banner-carousel__btn inline relative">
								<a href="<?php $terms = get_the_terms( $posts_manual[0]->ID, 'product_cat' ); foreach ($terms as $term) { $product_cat_id = $term->term_id; $link = get_term_link( (int)$product_cat_id, 'product_cat' ); echo $link; break; } ?>" class="btn-nav items-center justify-center rounded-2xl py-6 px-6 w-full text-center border-2 border-unitermi-primary-redDark text-unitermi-primary-redDark font-josefin-sans font-bold text-lg">
									VER TODOS
								</a>
							</div>
						</div>
					</div> <?
				 ?>
			 	<?php
				} elseif ($posts_select == 'taxonomy'){
					?>
					<div class="products-banner-carousel__products">
						<?php
						wp_reset_postdata();
						$args = array(
							'post_type'      => 'product',
							'post_status'    => 'publish',
							'posts_per_page' => 4,
							'tax_query'      => array( array(
								'taxonomy'   => 'product_cat',
								'field'      => 'term_id',
								'terms'      => $posts[0]->term_taxonomy_id,
							) )
							);
						$query = new \WP_Query( $args );

						if ( $query->have_posts() ) {?>
							<div class="m-auto gap-3 mt-6 container grid grid-cols-6">
								<a href="<?php echo esc_url(site_url() . '/product-category/' . $posts[0]->slug); ?>" class="products-banner-carousel__phrase inline relative underline-hover">
									<h4 class="products-banner-carousel__phrase--title pr-6">
										<?php
										if($link_text){
											echo $link_text;
										}else{
											echo "Para melhorar a hora do cafézinho";
										}
										?>
									</h4>
									<svg class="products-banner-carousel__phrase--svg w-9 inline text-gray-300 fill-current pr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
								</a>
								<div class="grid grid-cols-4 col-span-4 gap-3"> <?php
									while ( $query->have_posts() ) {
										$query->the_post();

										?>

										<a href="<?php the_permalink(); ?>" class="products-banner-carousel-card underline-hover rounded-md relative">
											<div class="products-banner-carousel-card__img-wrapper">
												<img class="products-banner-carousel-card__img-wrapper--img" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ImageCard') ?>" alt="imagem produto">
											</div>
											<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
												<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
													<?php echo wp_trim_words( get_the_title(), 5);  ?>
												</h3>
											</div>

										</a>
										<?php
									} ?>
								</div>
								<div class="ml-9 products-banner-carousel__btn inline relative">
									<a href="<?php echo esc_url(site_url() . '/product-category/' . $posts[0]->slug); ?>" class="btn-nav items-center justify-center rounded-2xl py-6 px-6 w-full text-center border-2 border-unitermi-primary-redDark text-unitermi-primary-redDark font-josefin-sans font-bold text-lg">
										VER TODOS
									</a>
								</div>
							</div> <?
						}
						wp_reset_postdata(); ?>
						</div>
					<?php
				} else {
					echo 'oops';
				}?>
			</div>
		</section>

	<?php
endif;

?>