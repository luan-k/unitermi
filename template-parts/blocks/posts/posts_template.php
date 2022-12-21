<div class="products-banner-carousel__products">
				<?php

					wp_reset_postdata();
					$args = array(
						'post_type'      => 'product',
						'post_status'    => 'publish',
						'posts_per_page' => 5,
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
									Para melhorar a hora do cafézinho
								</h4>
								<svg class="products-banner-carousel__phrase--svg w-9 inline text-gray-300 fill-current pr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
							</a>
							<div class="grid grid-cols-5 col-span-4 gap-3"> <?php
								while ( $query->have_posts() ) {
									$query->the_post();

									$price = get_post_meta( get_the_ID(), '_price', true );
									$product = wc_get_product( get_the_ID() );
									?>

									<a href="<?php the_permalink(); ?>" class="products-banner-carousel-card underline-hover   relative">
										<div class="products-banner-carousel-card__img-wrapper">
											<img class="products-banner-carousel-card__img-wrapper--img" src="<?php the_post_thumbnail_url() ?>" alt="imagem produto">
										</div>
										<div class="products-banner-carousel-card__body pt-12 px-9 pb-9">
											<!-- <h4 class="products-banner-carousel-card__body--price text-3xl mb-3">
												<?php
													if($price){

														if ( ! $product->is_type('variable') ){
															$active_price  = $product->get_price();
															$regular_price = $product->get_regular_price();

															if ( $product->is_on_sale()) {
																echo wc_price($active_price ) . ' <del class="text-primary text-lg"> ' . wc_price($regular_price) . '</del>' . '<div class="products-banner-carousel-card__body--price-offer bg-primary rounded-full flex items-center justify-center"> OFERTA! </div>';
															} else {
																echo wc_price( $price );
															}
														}
													} else {
														echo "Consulte";
													}
												?>
											</h4 > -->
											<h3 class="products-banner-carousel-card__body--title title-bland text-gray-600 text-2xl mb-3">
												<?php echo wp_trim_words( get_the_title(), 5);  ?>
											</h3>

											<!-- <p class="products-banner-carousel-card__body--text text-lg"> <?php
												if (has_excerpt()) {
													echo wp_trim_words( get_the_excerpt(), 7);
												}else {
													echo wp_trim_words(get_the_content(), 7);
												}  ?>

											</p> -->
										</div>

									</a>
									<?php
								} ?>
							</div>
							<div class="ml-9 products-banner-carousel__btn inline relative">
								<a href class="btn-nav items-center justify-center py-6 px-6 w-full text-center border-2 border-unitermi-primary-redDark text-unitermi-primary-redDark font-josefin-sans font-bold text-lg">
									VER TODOS
								</a>
							</div>
						</div> <?
					}
				wp_reset_postdata(); ?>
			</div>
