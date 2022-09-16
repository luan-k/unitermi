<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <? wp_head(); ?>
</head>

<body <?php body_class(); ?> >
			<div class="wraper" >
        <header >
            <nav>
                <div class="bg-unitermi-primary-redDark max-w-full logo-nav">
                    <div class="flex justify-center md:justify-between">

                        <!-- logo -->
                        <div class="logo-wraper">
                            <a class="" href="<?php echo esc_url(site_url()); ?>">
                                <img class="logo" src="<?php echo get_theme_file_uri('./assets/images/svg/unitermi_logo.svg')?>" alt="">
                            </a>
                        </div>

                        <!-- primary nav -->
                        <div class="icon-nav hidden md:flex items-center text-2xl space-x-4">
                            <a target="_blank" class="py-5 px-3 text-white" href=""><i class="text-white fab fa-whatsapp"></i> </a>
                            <a target="_blank" class="py-5 px-3 text-white" href="" ><i class="text-white fas fa-phone-alt"></i></a>
                            <a target="_blank" class="py-5 px-3 text-white" href=""><i class="text-white fab fa-facebook-f"></i></a>
                            <a target="_blank" class="py-5 px-3 text-white" href="<?php echo esc_url(site_url('/contato')); ?>"><i class="text-white far fa-envelope"></i></a>
                            <a target="_blank" href="https://www.instagram.com/unitermi/" class="py-5 px-3 text-white"><i class="text-white fab fa-instagram"></i></i></a>
                            <a target="_blank" href="#" class="py-5 px-3 text-white"><i class="text-white fab fa-twitter"></i></a>
                            <a target="_blank" href="#" class="py-5 px-3 text-white"><i class="text-white fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 text-gray-600 max-w-full text-3xl  space-x-12 font-medium menu-mob nav-menu-session" id="navbarNavAltMarkup">
                    <input class="side-menu" type="checkbox" id="side-menu"/>
                    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>    
                    <div class="nav-menu-list" >
                    <!-- <ul class="container relative flex items-center"> -->
                        <!-- <li  class="btn-nav mobile-nav-logic <?php if (is_page('inicio')) echo' current-menu-item' ?>"><a href="<?php echo esc_url(site_url('/inicio')); ?>" class=" py-5 px-6 text-white md:text-gray-600 hover:text-white transition duration-300">Home </a></li>
                        <li class="btn-nav mobile-nav-logic <?php if (is_page('produtos') OR get_post_type() == 'post') echo' current-menu-item' ?>"><a href="<?php echo esc_url(site_url('/produtos')); ?>" class=" py-5 px-6 text-white md:text-gray-600 hover:text-white transition duration-300">Produtos </a></li>
                        <li class="btn-nav mobile-nav-logic <?php if (is_page('quem-somos')) echo' current-menu-item' ?>"><a href="<?php echo esc_url(site_url('/quem-somos')); ?>" class=" py-5 px-6 text-white md:text-gray-600 hover:text-white transition duration-300">Quem Somos </a></li>
                        <li class="btn-nav mobile-nav-logic <?php if (is_page('servico') OR get_post_type() == 'servico') echo' current-menu-item' ?>"><a target="_blank" href="<?php echo esc_url(site_url('/wp-content/uploads/2022/09/Catalogo-reduzido.pdf')); ?>" class=" py-5 px-6 text-white md:text-gray-600 hover:text-white transition duration-300">Catalogo </a></li>
                        <li class="btn-nav mobile-nav-logic <?php if (is_page('contato')) echo' current-menu-item' ?>"><a href="<?php echo esc_url(site_url('/contato')); ?>" class=" py-5 px-6 text-white md:text-gray-600 hover:text-white transition duration-300">Contato </a></li>

                        <li class="wrapper  mobile-nav-logic-toogle block md:hidden">
                            <a >
                                <i class="fa fa-bars text-black"></i>
                            </a>
                        </li> -->
                        <?php

                            wp_nav_menu( array(
                                'theme_location'    => 'main_menu',
                                'container'         => 'div',
                                'container_class'   => 'menu-container',
                                /* 'container_id'      => 'bs-example-navbar-collapse-1', */
                                'menu_class'        => 'nav navbar-nav',

                            ) );
                        ?>
                </div>
                    <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger nav-item nav-link"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>

            </nav>
        </header>
