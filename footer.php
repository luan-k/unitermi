
            <footer class="page-footer bg-unitermi-primary-redDark text-white pb-20 pt-28 mt-24 single-bg <?php if(is_front_page()){ echo "mt-6"; } ?>">

                <!-- Footer Links -->
                <div class="container text-center md:text-left text-lg">

                    <div class="grid grid-cols-1 md:grid-cols-3 col-g gap-32">

                        <div class="col-12 col-sm-4">
                            <h4 class="title-3 font-josefin-sans text-2xl mb-6 ">
                                central de atendimento
                            </h4>
							<div class="icon-nav flex items-center justify-center md:justify-start text-2xl space-x-4">
                                <a target="_blank" class="py-5 px-3 text-white" href="tel:4832869093" ><i class="text-white fas fa-phone-alt"></i></a>
                                <a target="_blank" class="py-5 px-3 text-white" href="<?php echo esc_url(site_url('/contato')); ?>"><i class="text-white far fa-envelope"></i></a>
                                <a target="_blank" href="https://www.instagram.com/unitermi/" class="py-5 px-3 text-white"><i class="text-white fab fa-instagram"></i></i></a>
                            </div>
                            <h4 class="title-3 font-josefin-sans text-2xl mb-6 mt-5">
                                Onde Estamos:
                            </h4>
                            <p class="footer-text">
								<a style="line-height: 3.6rem;" href="https://goo.gl/maps/JexixNemLDwSYSTE8" target="_blank">
									<svg class="text-white fill-current mr-3 w-6 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
									Rua Juvêncio Rodrigues - Costa do Morro, - Paulo Lopes - SC - CEP <span class="whitespace-nowrap">88490-000</span>
								</a>
                            </p>
                        </div>

                        <div class="">
                            <h4 class="title-3 font-josefin-sans text-2xl mb-6">
                                a empresa
                            </h4>
                            <div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/inicio')); ?>"> Início </a>
                            </div>
                            <div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/produtos')); ?>">Produtos</a>
                            </div>
                            <div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/quem-somos')); ?>"> Quem Somos </a>
                            </div>
							<div class="footer-text">
                                <a class="footer-text" target="_blank" href="<?php echo esc_url(site_url('/wp-content/uploads/2022/09/Catalogo-reduzido.pdf')); ?>"> Catálogo </a>
                            </div>
                            <div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/contato')); ?>">Contato</a>
                            </div>
							<div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/contato')); ?>"> Fale com um representante </a>
                            </div>
                            <div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/contato')); ?>">Seja um representante</a>
                            </div>
                            <div class="footer-text">
                                <a class="footer-text" href="<?php echo esc_url(site_url('/contato')); ?>"> Trabalhe conosco </a>
                            </div>

                        </div>

						<div >
							<a class="w-full" href="<?php echo esc_url(site_url()); ?>">
								<img class="w-full p-9 pt-0" src="<?php echo get_theme_file_uri('assets/images/svg/logo-slogan-2.svg'); ?>" alt="">
                            </a>
						</div>

                    </div>

                    <a class="" target="_blank" href="<?php echo esc_url('https://wkode.com.br/'); ?>">
                        <img class="w-60 m-auto" src="<?php echo get_theme_file_uri('./assets/images/svg/logo-footer.svg')?>" alt="">
                    </a>


            </footer>
            <!-- Footer -->

            <?php wp_footer() ?>

        </div>
    </body>
</html>
