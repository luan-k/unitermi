<?php get_header();?>

<div class="wrapper">
	<!-- slider -->
	<?php if( wp_is_mobile()){ ?>
    <section class="slider-custom mb-12 md:mb-24 pt-0 md:pt-40" id="slider-custom" data-anime="slow-slider">
        <?php echo do_shortcode('[ssslider id="1091"]') ?>
    </section>
	<?php }else{ ?>
    <section class="slider-custom mb-12 md:mb-24 pt-0 md:pt-40" id="slider-custom" data-anime="slow-slider">
        <?php echo do_shortcode('[ssslider id="5"]') ?>
    </section>
	<?php } ?>
	<div class="px-28 grid grid-cols-1 md:grid-cols-6 gap-3 mb-20 md:mb-24 font-bold font-montserrat">
		<div class="counter-card border-2 border-gray-100 py-4 px-5">
			<h4 class="counter__main-title font-bold font-montserrat text-center text-unitermi-primary-redDark ">Industria Brasileira</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div class="col-span-3">
					<img class="w-full h-auto counter__bandeira-img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-br.svg')?>"  alt="">
				</div>
			</div>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5">
			<h4 class="counter__main-title font-bold font-montserrat text-center text-unitermi-primary-redDark ">
				Somos especialistas
			</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div class="col-span-3">
					<img class="w-full h-auto counter__temp-img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-temp.svg')?>"  alt="">
				</div>
			</div>
			<h4 class="counter__subtitle font-bold font-montserrat text-center text-unitermi-primary-redDark ">em produtos termicos</h4>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5">
			<h4 class="counter__main-title font-bold font-montserrat text-center text-unitermi-primary-redDark ">
				com mais de
			</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div>
					<img class="w-full h-auto counter__img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-bottle.svg')?>"  alt="">
				</div>
				<h2 class="timer count-title count-number counter col-span-2 counter__number text-unitermi-primary-redDark ml-2 font-black" data-to="350" data-speed="1500"></h2>
			</div>
			<h4 class="counter__subtitle font-bold font-montserrat text-center text-unitermi-primary-redDark ">Produtos diferentes,</h4>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5">
			<h4 class="counter__main-title font-bold font-montserrat text-center text-unitermi-primary-redDark ">
				Cerca de
			</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-4">
				<div class="col-span-2">
					<img class="w-full h-auto counter__img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-users.svg')?>"  alt="">
				</div>
				<h2 class="timer count-title count-number counter col-span-2 counter__number text-unitermi-primary-redDark ml-2 font-black" data-to="170" data-speed="1500"></h2>
			</div>
			<h4 class="counter__subtitle font-bold font-montserrat text-center text-unitermi-primary-redDark ">Colaboradores</h4>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5">
			<h4 class="counter__main-title font-bold font-montserrat text-center text-unitermi-primary-redDark ">Com clientes</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div>
					<img class="w-full h-auto counter__img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-brazil.svg')?>"  alt="">
				</div>
				<h2 class="counter col-span-2 text-unitermi-primary-redDark ml-2 counter__brasil--titulo">
					<span class="text-4xl inline 2xl:-mb-3">em todo o</span>
					<span class="font-black 2xl:-mt-4">BRASIL</span>
				</h2>
			</div>
			<h4 class="text-3xl font-bold font-montserrat text-center text-unitermi-primary-redDark "></h4>
		</div>
		<div class="counter-card counter-card--rocket border-2 border-gray-100 py-4 px-5">
			<h4 class="counter__main-title font-bold font-montserrat text-center text-unitermi-primary-redDark ">Em apenas</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3 m-auto">
				<div>
					<img class="w-full h-auto counter__img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-rocket.svg')?>"  alt="">
				</div>
				<div class=" col-span-2 counter">
					<h2 class="timer count-title inline count-number counter__number--rocket text-unitermi-primary-redDark ml-2 font-black" data-to="9" data-speed="1000"></h2>
					<span class="text-3xl inline font-bold font-montserrat text-center text-unitermi-primary-redDark">
						anos
					</span>
				</div>
			</div>
		</div>
	</div>
    <?php echo the_content(); ?>
</div>

<?php get_footer(); ?>
