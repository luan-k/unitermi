<a href="<?php the_permalink(); ?>" class="products-banner-carousel-card underline-hover rounded-md relative">
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
