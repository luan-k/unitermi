<?php get_header();
?>
<div class="page-wraper contact relative">
    <div class="container contato-text mt-24 pt-5">
        <div class="row grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-sm-6 mr-12">
				<h1 class=" text-7xl font-montserrat">
					Fale conosco.
					A sua opinião é muito
					importante para nós!
				</h1>
                <h3 data-anime="left" class="mt-12 text-5xl font-bold">Horário de atendimento:</h3>
                <ul data-anime="left" class=" text-4xl mt-9">
                    <li> Segunda à sexta das: 08h00 às 18h00 </li>
                </ul>

                <ul data-anime="left" class=" text-4xl mt-12">
                    <li>
						<a href="https://goo.gl/maps/JexixNemLDwSYSTE8" target="_blank">
							<svg class=" w-6 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
						  	Rua Juvêncio Rodrigues - Costa do Morro, - Paulo Lopes - SC - CEP 88490-000
						</a>
					</li>
                </ul>
                <ul data-anime="left" class=" text-4xl mt-12">
                    <li> <a target="_blank" href="tel:4832869093"> <i class="text-black fas fa-phone-alt mr-3" aria-hidden="true"></i> (48) 3286-9093 </a> </li>
                </ul>

				<ul data-anime="left" class=" text-4xl mt-12"><!-- instagram-logo.png -->
                    <li>
						Siga-nos: <a target="_blank" href="https://www.instagram.com/unitermi/" class="py-5 px-3 text-black"> <img class="inline w-12" src="<?php echo get_theme_file_uri('./assets/images/instagram.png')?>" alt=""></a>
					</li>
                </ul>
            </div>
            <div class="col-sm-6 mt-9 md:mt-0" data-anime="right">
                <?php echo do_shortcode('[wpforms id="222" title="false" description="false"]') ?>
            </div>
        </div>
    </div>
    <br><br>
    <br><br>
</div>
<?php
    get_footer();
?>
