<?php get_header();?>

<div class="wrapper">
	<!-- slider -->
    <section class="slider-custom mb-12 md:mb-24 pt-0 md:pt-40" id="slider-custom" data-anime="slow-slider">
        <?php echo do_shortcode('[ssslider id="5"]') ?>
    </section>
	<div class="px-12 grid grid-cols-1 md:grid-cols-6 gap-3 mb-20 md:mb-24 font-light font-montserrat">
		<div class="counter-card border-2 border-gray-100 py-4 px-5 rounded-xl">
			<h4 class="counter__main-title font-semibold font-montserrat text-center text-unitermi-primary-redDark ">Industria Brasileira</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div class="col-span-3">
					<img class="w-full h-auto counter__bandeira-img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-br.svg')?>"  alt="">
				</div>
				<!-- <div class=" col-span-2 counter">
					<h2 class="timer count-title inline count-number text-9xl text-unitermi-primary-redDark ml-2" data-to="9" data-speed="1000"></h2>
					<span class="text-3xl inline font-semibold font-montserrat text-center text-unitermi-primary-redDark">
						anos
					</span>
				</div> -->
			</div>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5 rounded-xl">
			<h4 class="counter__main-title font-semibold font-montserrat text-center text-unitermi-primary-redDark ">
				Somos especialistas em
			</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div class="col-span-3">
					<img class="w-full h-auto counter__temp-img" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-temp.svg')?>"  alt="">
				</div>
				<!-- <h2 class="timer count-title count-number counter col-span-2 text-7xl text-unitermi-primary-redDark ml-2" data-to="15000" data-speed="1500"></h2> -->
			</div>
			<h4 class="counter__subtitle font-semibold font-montserrat text-center text-unitermi-primary-redDark ">Produtos termicos</h4>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5 rounded-xl">
			<h4 class="counter__main-title font-semibold font-montserrat text-center text-unitermi-primary-redDark ">
				Mais de
			</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div>
					<img class="w-full h-auto" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-bottle.svg')?>"  alt="">
				</div>
				<h2 class="timer count-title count-number counter col-span-2 counter__number text-unitermi-primary-redDark ml-2" data-to="350" data-speed="1500"></h2>
			</div>
			<h4 class="counter__subtitle font-semibold font-montserrat text-center text-unitermi-primary-redDark ">Produtos diferentes,</h4>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5 rounded-xl">
			<h4 class="counter__main-title font-semibold font-montserrat text-center text-unitermi-primary-redDark ">
				Cerca de
			</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-4">
				<div class="col-span-2">
					<img class="w-full h-auto" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-users.svg')?>"  alt="">
				</div>
				<h2 class="timer count-title count-number counter col-span-2 counter__number text-unitermi-primary-redDark ml-2" data-to="170" data-speed="1500"></h2>
			</div>
			<h4 class="counter__subtitle font-semibold font-montserrat text-center text-unitermi-primary-redDark ">Colaboradores</h4>
		</div>
		<div class="counter-card border-2 border-gray-100 py-4 px-5 rounded-xl">
			<h4 class="counter__main-title font-semibold font-montserrat text-center text-unitermi-primary-redDark ">Com clientes</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3">
				<div>
					<img class="w-full h-auto" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-brazil.svg')?>"  alt="">
				</div>
				<h2 class="counter col-span-2 text-unitermi-primary-redDark ml-2 counter__brasil--titulo">
					<span class="text-2xl inline">em todo o</span>
					BRASIL
				</h2>
			</div>
			<h4 class="text-3xl font-semibold font-montserrat text-center text-unitermi-primary-redDark "></h4>
		</div>
		<div class="counter-card counter-card--rocket border-2 border-gray-100 py-4 px-5 rounded-xl">
			<h4 class="counter__main-title font-semibold font-montserrat text-center text-unitermi-primary-redDark ">Em apenas</h4>
			<div class="counter-inner-wraper grid grid-cols-1 md:grid-cols-3 m-auto">
				<div>
					<img class="w-full h-auto" src="<?php echo get_theme_file_uri('./assets/images/svg/counter-rocket.svg')?>"  alt="">
				</div>
				<div class=" col-span-2 counter">
					<h2 class="timer count-title inline count-number counter__number--rocket text-unitermi-primary-redDark ml-2" data-to="9" data-speed="1000"></h2>
					<span class="text-3xl inline font-semibold font-montserrat text-center text-unitermi-primary-redDark">
						anos
					</span>
				</div>
			</div>
		</div>
	</div>
    <?php echo the_content(); ?>
</div>

<?php get_footer(); ?>
