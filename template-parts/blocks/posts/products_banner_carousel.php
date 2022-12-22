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
$img2         = get_field( 'products_banner_carousel_img_2' );
$img3         = get_field( 'products_banner_carousel_img_3' );
$img_mob      = get_field( 'products_banner_carousel_img_mob' );
$img_mob2     = get_field( 'products_banner_carousel_img_mob_2' );
$img_mob3     = get_field( 'products_banner_carousel_img_mob_3' );
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
	$img_array = array($img['sizes']['heroBannerImage'], $img2['sizes']['heroBannerImage'], $img3['sizes']['heroBannerImage']);
	$img_array_filter = array_filter($img_array);
	$array_counted = count($img_array_filter);
	while(!empty($img_array_filter)){
		$key = rand(0, $array_counted);
		if(key_exists($key, $img_array_filter)){
			$new_order[] = $img_array_filter[$key];
		}
		unset($img_array_filter[$key]);
	}
	$img_mob_array = array($img_mob['sizes']['heroBannerImageMob'], $img_mob2['sizes']['heroBannerImageMob'], $img_mob3['sizes']['heroBannerImageMob']);
	$img_mob_array_filter = array_filter($img_mob_array);
	$array_mob_counted = count($img_mob_array_filter);
	while(!empty($img_mob_array_filter)){
		$key = rand(0, $array_mob_counted);
		if(key_exists($key, $img_mob_array_filter)){
			$new_order_mob[] = $img_mob_array_filter[$key];
		}
		unset($img_mob_array_filter[$key]);
	}
	?>

		<section class="products-banner-carousel mb-12 md:mb-36 " >
			<div class="products-banner-carousel__hero">
				<?php if($img){ ?>
					<a class="products-banner-carousel__img relative" data-anime="slow-slider" href="<?php if($posts_select == 'relational'){ $terms = get_the_terms( $posts_manual[0]->ID, 'product_cat' ); foreach ($terms as $term) { $product_cat_id = $term->term_id; $link = get_term_link( (int)$product_cat_id, 'product_cat' ); echo $link; break; }} elseif ($posts_select == 'taxonomy'){ echo esc_url(site_url() . '/product-category/' . $posts[0]->slug); } ?>">
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
						<?php if( wp_is_mobile()){ ?>
							<img src="<?php echo $new_order_mob[0] ?>" class="mob" alt="" srcset="">
						<?php }else{ ?>
							<img src="<?php echo $new_order[0] ?>" alt="" srcset="">
						<?php } ?>
					</a>
				<?php }
				if($posts_select == 'relational'){ ?>
					<div class="products-banner-carousel__products">
						<div class="m-auto gap-3 mt-6 container grid grid-cols-1 md:grid-cols-6"> <?php
						?>
							<?php if( wp_is_mobile()){ ?>
								<div class="grid grid-cols-1 md:grid-cols-4 md:col-span-4 gap-3"  data-anime="bottom"> <?php
									for ($i = 0; $i < 4; $i++){ ?>

										<?php
										$post_id   	     = $posts_manual[$i]->ID;
										$post_category	 = get_the_category($post_id);
										$post_title 	 = $posts_manual[$i]->post_title;
										$post_subtitle   = get_field( 'subtitle', $post_id );
										$post_image 	 = get_the_post_thumbnail_url($posts_manual[$i]->ID);
										$link       	 = get_the_permalink( $posts_manual[$i] );
										$post_content    = $posts_manual[$i]->post_content;
										?>
										<a href="<?php echo $link; ?>" class="products-banner-carousel-card underline-hover   relative">
											<div class="products-banner-carousel-card__img-wrapper">
												<img class="products-banner-carousel-card__img-wrapper--img" src="<?php echo $post_image; ?>" alt="imagem produto">
											</div>
											<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
												<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
													<?php echo wp_trim_words( $post_title, 5);  ?>
												</h3>
												<div class="btn-input w-full items-center justify-center mt-3 py-3 px-6 text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg whitespace-nowrap">
													Saiba Mais
												</div>
											</div>
										</a>
										<?php
									} ?>
								</div>
							<?php } else { ?>
								<a  data-anime="left" href="<?php $terms = get_the_terms( $posts_manual[0]->ID, 'product_cat' ); foreach ($terms as $term) { $product_cat_id = $term->term_id; $link = get_term_link( (int)$product_cat_id, 'product_cat' ); echo $link; break; } ?>" class="products-banner-carousel__phrase inline relative underline-hover">
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
								<div class="grid grid-cols-4 col-span-4 gap-1"  data-anime="bottom"> <?php
									for ($i = 0; $i < 4; $i++){ ?>

										<?php
										$post_id   	     = $posts_manual[$i]->ID;
										$post_category	 = get_the_category($post_id);
										$post_title 	 = $posts_manual[$i]->post_title;
										$post_subtitle   = get_field( 'subtitle', $post_id );
										$post_image 	 = get_the_post_thumbnail_url($posts_manual[$i]->ID);
										$link       	 = get_the_permalink( $posts_manual[$i] );
										$post_content    = $posts_manual[$i]->post_content;
										?>
										<a href="<?php echo $link; ?>" class="products-banner-carousel-card underline-hover   relative">
											<div class="products-banner-carousel-card__img-wrapper">
												<img class="products-banner-carousel-card__img-wrapper--img" src="<?php echo $post_image; ?>" alt="imagem produto">
											</div>
											<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
												<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
													<?php echo wp_trim_words( $post_title, 5);  ?>
												</h3>
												<div class="btn-input w-full items-center justify-center mt-3 py-3 px-6 text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg whitespace-nowrap">
													Saiba Mais
												</div>
											</div>
										</a>
										<?php
									} ?>
								</div>
								<div class="ml-9 products-banner-carousel__btn relative hidden md:inline my-auto"  data-anime="right">
									<a href="<?php $terms = get_the_terms( $posts_manual[0]->ID, 'product_cat' ); foreach ($terms as $term) { $product_cat_id = $term->term_id; $link = get_term_link( (int)$product_cat_id, 'product_cat' ); echo $link; break; } ?>" class="btn-input items-center justify-center py-6 px-6 w-full text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg">
										VER TODOS
									</a>
								</div>
							<?php } ?>
						</div>
					</div> <?
				 ?>
			 	<?php
				} elseif ($posts_select == 'taxonomy'){
					?>
					<div class="products-banner-carousel__products">
						<?php

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
							<div class="m-auto gap-3 mt-6 container px-6 md:px-28 grid grid-cols-1 md:grid-cols-6">

								<?php if( wp_is_mobile()){ ?>
									<div class="grid grid-cols-1 md:grid-cols-4 md:col-span-4 gap-3" data-anime="bottom"> <?php
										while ( $query->have_posts() ) {
											$query->the_post();

											?>

											<a href="<?php the_permalink(); ?>" class="products-banner-carousel-card underline-hover   relative">
												<div class="products-banner-carousel-card__img-wrapper">
													<img class="products-banner-carousel-card__img-wrapper--img" src="<?php echo get_the_post_thumbnail_url( get_the_ID()) ?>" alt="imagem produto">
												</div>
												<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
													<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
														<?php echo wp_trim_words( get_the_title(), 5);  ?>
													</h3>
													<div class="btn-input w-full items-center justify-center mt-3 py-3 px-6 text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg whitespace-nowrap">
														Saiba Mais
													</div>
												</div>

											</a>
											<?php
										} ?>
									</div>
								<?php } else { ?>
									<a data-anime="left" href="<?php echo esc_url(site_url() . '/product-category/' . $posts[0]->slug); ?>" class="products-banner-carousel__phrase inline relative underline-hover">
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
									<div class="grid grid-cols-4 col-span-4 gap-1" data-anime="bottom"> <?php
										while ( $query->have_posts() ) {
											$query->the_post();

											?>

											<a href="<?php the_permalink(); ?>" class="products-banner-carousel-card underline-hover   relative">
												<div class="products-banner-carousel-card__img-wrapper">
													<img class="products-banner-carousel-card__img-wrapper--img" src="<?php echo get_the_post_thumbnail_url( get_the_ID()) ?>" alt="imagem produto">
												</div>
												<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
													<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
														<?php echo wp_trim_words( get_the_title(), 5);  ?>
													</h3>
													<div class="btn-input w-full items-center justify-center mt-3 py-3 px-6 text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg whitespace-nowrap">
														Saiba Mais
													</div>
												</div>

											</a>
											<?php
										} ?>
									</div>
									<div class="ml-9 products-banner-carousel__btn hidden md:inline relative my-auto" data-anime="right">
										<a href="<?php echo esc_url(site_url() . '/product-category/' . $posts[0]->slug); ?>" class="btn-input items-center justify-center py-6 px-6 w-full text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-lg">
											VER TODOS
										</a>
									</div>
								<?php } ?>
							</div> <?
						}
						wp_reset_postdata(); ?>
						</div>
					<?php
				} else {
					echo 'erro, notificar o administrador do site por favor';
				}?>
			</div>
		</section>

	<?php
endif;

?>
