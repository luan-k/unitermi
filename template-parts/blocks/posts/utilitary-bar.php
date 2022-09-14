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
// Block Content.
$facebook       = get_field( 'facebook' );
$twitter        = get_field( 'twitter' );
$linkedin       = get_field( 'linkedin' );
$youtube        = get_field( 'youtube' );
$instagram      = get_field( 'instagram' );

?>

<div class="grid grid-cols-2 py-20">
    <div class="b">
        <h2 class="text-gray-dark font-bold text-2xl mb-6">Utilitários</h2>
        <nav class="a">
            <?php
				wp_nav_menu(
					array(
						'theme_location'  => 'main-menu',
						'container'       => 'nav',
						'menu_class'      => 'useful-links-bar-nav',
						'depth'           => 1,
					)
				);
			?>
            <!-- <ul class="text-lg flex flex-row content-center justify-start items-center text-left">
                <li class="mr-3 py-3 px-6 rounded-full bg-gray-light "> <a class="w-full" href="">Legislação</a> </li>
                <li class="mr-3 py-3 px-6"> <a class="w-full" href="">Ajuda Online</a> </li>
                <li class="mr-3 py-3 px-6"> <a class="w-full" href="">Pedir Ajuda a Parceiro</a> </li>
                <li class="mr-3 py-3 px-6"> <a class="w-full" href="">Fale Conosco</a> </li>
                <li class="mr-3 py-3 px-6"> <a class="w-full" href="">Testar novas soluções</a> </li>
            </ul> -->
        </nav>
    </div>
    <div class="grid grid-cols-9 gap-3 ">
        <div class="bg-gray-light flex flex-row align-middle items-center justify-evenly col-span-5">
            <i class="fas fa-envelope text-2xl"></i>
            <div class="w-9/12" >
                <input class="pl-3 py-3 pr-9 w-9/12" type="email" name="email" placeholder="Receber as novidades por mail" id="">
                <button class="text-white bg-purple-dark p-3" >Sign up</button>
            </div>
        </div>
        <div class="links flex flex-row align-middle items-center justify-evenly col-span-4 text-3xl"> <?php
            if ( $facebook ) { ?>
                <a href="<?php echo $facebook ?>" class="rounded-full bg-gray-dark w-16 h-16 transition-all duration-300 hover:bg-purple-dark text-center text-white flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </a>
            <?php } if ( $twitter ) {  ?>
                <a href="<?php echo $twitter ?>" class="rounded-full bg-gray-dark w-16 h-16 transition-all duration-300 hover:bg-purple-dark text-center text-white flex items-center justify-center">
                    <i class="fab fa-twitter"></i>
                </a>
            <?php } if ( $linkedin ) {  ?>
                <a href="<?php echo $linkedin ?>" class="rounded-full bg-gray-dark w-16 h-16 transition-all duration-300 hover:bg-purple-dark text-center text-white flex items-center justify-center">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            <?php } if ( $youtube ) {  ?>
                <a href="<?php echo $youtube ?>" class="rounded-full bg-gray-dark w-16 h-16 transition-all duration-300 hover:bg-purple-dark text-center text-white flex items-center justify-center">
                    <i class="fab fa-youtube"></i>
                </a>
            <?php } if ( $instagram ) {  ?>
                <a href="<?php echo $instagram ?>" class="rounded-full bg-gray-dark w-16 h-16 transition-all duration-300 hover:bg-purple-dark text-center text-white flex items-center justify-center">
                    <i class="fab fa-instagram"></i>
                </a>
            <?php } ?>
        </div>
    </div>
</div>