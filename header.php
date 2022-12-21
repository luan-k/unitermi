<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <? wp_head(); ?>
</head>

<body <?php body_class(); ?> >
			<div class="wraper" >
        <header class="header">
            <nav class="header-nav">
                <div class="bg-unitermi-primary-redDark max-w-full logo-nav">
                    <div class="flex justify-center md:justify-between logo-nav-inner">

                        <!-- logo -->
						<?php if( wp_is_mobile()){ ?>
							<div class="logo-wraper-mob">
								<a class="" href="<?php echo esc_url(site_url()); ?>">
									<img class="logo" src="<?php echo get_theme_file_uri('./assets/images/svg/unitermi_logo.svg')?>" alt="">
								</a>
							</div>
						<?php }else{ ?>
							<div class="logo-wraper">
								<a class="" href="<?php echo esc_url(site_url()); ?>">
									<img class="logo" src="<?php echo get_theme_file_uri('./assets/images/svg/logo-slogan-1.svg')?>" alt="">
								</a>
							</div>
						<?php } ?>

                        <!-- primary nav -->
                        <div class="icon-nav hidden md:flex items-center text-2xl space-x-4">
                            <a target="_blank" class="py-5 px-3 text-white" href="tel:4832869093" ><i class="text-white fas fa-phone-alt"></i></a>
                            <a target="_blank" class="py-5 px-3 text-white" href="<?php echo esc_url(site_url('/contato')); ?>"><i class="text-white far fa-envelope"></i></a>
                            <a target="_blank" href="https://www.instagram.com/unitermi/" class="py-5 px-3 text-white"><i class="text-white fab fa-instagram"></i></i></a>
                        </div>
                    </div>
                </div>
                <div class="links-nav bg-gray-100 text-gray-600 max-w-full text-3xl  space-x-12 font-medium menu-mob nav-menu-session" id="navbarNavAltMarkup">
                    <input class="side-menu" type="checkbox" id="side-menu"/>
                    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
                    <div class="nav-menu-list" >
							<?php

								wp_nav_menu( array(
									'theme_location'    => 'main_menu',
									'container'         => 'div',
									'container_class'   => 'menu-container',
									'menu_class'        => 'nav navbar-nav',

								) );
                        ?>
                	</div>
                    <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger nav-item nav-link"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>

            </nav>
        </header>
