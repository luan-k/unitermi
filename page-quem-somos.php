<?php get_header();?>

<!-- <section class="bg-image container" style="background-image: url(<?php echo get_theme_file_uri('assets/images/unitermi-banner-quem-somos.jpg'); ?>); ">
	<h1 class="bg-image__title font-bold text-6xl text-white">
		Qualidade e design <br>
		desde 2013 <br>
		<span class=" text-3xl opacity-75">Saiba mais sobre nós</span>
	</h1>
</section> -->
<section class="container grid grid-cols-1 md:grid-cols-2 pt-72">
	<div class="bg-image container order-2 md:order-1" style="background-image: url(<?php echo get_theme_file_uri('assets/images/unitermi-quem-somos.jpg'); ?>); ">
	</div>
	<div class="px-9 md:pl-24 font-montserrat py-60 order-1 md:order-2">
		<h5 class=" text-3xl font-bold mb-20">Preserva o que é bom!</h5>
		<h3 class=" font-light text-5xl mb-20">
			Unitermi é uma empresa inovadora no ramo de garrafas térmicas. Atuando neste mercado desde 2013, possui uma experiência muito além desse tempo.
		</h3>
		<p class=" text-2xl mb-10">
			Experiência acumulada no conhecimento que a empresa adquiriu após fabricar componentes plásticos para indústrias do setor de eletrodomésticos.
		</p>
		<p class="text-2xl">
			Mantendo um passo à frente da evolução dos gostos dos consumidores, a Unitermi continua lançando produtos de preservação térmica com foco na alta qualidade e design atraente.
		</p>
		<a href="<?php echo esc_url(site_url('/produtos')); ?>" class="mt-20 capitalize btn-input items-center justify-center rounded-2xl py-6 px-12 text-center border-2 border-unitermi-primary-redDark text-white font-josefin-sans font-bold text-xl">
			conheça nossos produtos
		</a>
	</div>
</section>


<?php get_footer(); ?>
