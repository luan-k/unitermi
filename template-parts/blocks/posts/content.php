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
$primary      = get_field( 'highligh_primary' );
$secondary    = get_field( 'highligh_secondary' );



if ( ! $primary || empty( $primary ) ) {
	$primary = get_posts(
		array(
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post',
			'numberposts' => 1,
		)
	);
};
if ( ! $secondary || empty( $secondary ) ) {
	$secondary = get_posts(
		array(
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post',
			'numberposts' => 1,
            'offset' => 1,
		)
	);
};

if ( $primary || $secondary ) :
	?>
		<?php

				$primary_post_id   	     = $primary[0]->ID;
				$primary_post_category	 = get_the_category($primary_post_id);
				$primary_post_title 	 = $primary[0]->post_title;
                $primary_post_subtitle   = get_field( 'subtitle', $primary_post_id );
				$primary_post_image 	 = get_the_post_thumbnail_url($primary[0]->ID); 
				$primary_link       	 = get_the_permalink( $primary[0] );
                $primary_post_content    = $primary[0]->post_content;
				?>
                <a href="" class="font-bold text-2xl">Em Destaque</a>
                <span class="a">|</span>
                <a href="" class="font-bold text-2xl">Bibilioteca</a>
                <span class="a">|</span>
                <a href="" class="font-bold text-2xl">Mais Noticias</a>
                <div class="grid grid-cols-2 min-h-screen gap-9 mt-6">
                    <div class="bg-purple-light py-16 px-28">
                        <h4 class="text text-green-600 inline">Publicado Hoje | <span>informação desaparece em 2 dias</span></h4>
                        <h1 class="uppercase text-5xl font-black">
                            <?php if(wp_is_mobile()){echo wp_trim_words( $primary_post_title, 15);}else{echo wp_trim_words( $primary_post_title, 12);} ?>
                        </h1>
                        <h2 class="text-purple-dark text-3xl mt-20">
                            <?php if(wp_is_mobile()){echo wp_trim_words( $primary_post_subtitle, 37);}else{echo wp_trim_words( $primary_post_subtitle, 37);} ?>
                        </h2>
                        <div class="text-2xl mt-28 h-56">
                            <?php if(wp_is_mobile()){echo wp_trim_words( $primary_post_content, 45);}else{echo wp_trim_words( $primary_post_content, 45);} ?>
                        </div>
                        <div class="flex flex-row content-center justify-evenly items-center mt-20">
                            <a href="" class="flex flex-col">
                                <i class="fas fa-plus-circle text-6xl"></i>
                                saber mais
                            </a>
                            <a href="" class="flex flex-col">
                                <i class="fas fa-search text-6xl"></i>
                                saber mais
                            </a>
                            <a href="" class="flex flex-col">
                                <i class="fas fa-paper-plane text-6xl"></i>
                                saber mais
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-rows-5 gap-9">
                        <div class=" grid grid-rows-2 gap-6">
                            <div class="bg-gray-light border-l-8 border-purple-dark flex flex-row justify-evenly items-center">
                                <h3 class="text-purple-dark uppercase inline ml-9 text-3xl font-extrabold">Artsoft 21</h3>
                                <p class="inline text-2xl ml-6">Salami beef bacon porchetta pork belly</p>
                                <i class="fas fa-arrow-circle-right text-purple-dark ml-auto text-5xl mr-9"></i>
                            </div>
                            <div class="bg-gray-light border-l-8 border-orange-dark flex flex-row justify-evenly items-center">
                                <h3 class="text-orange-dark uppercase inline ml-9 text-3xl font-extrabold">Artsoft 21</h3>
                                <p class="inline text-2xl ml-6">Salami beef bacon porchetta pork belly</p>
                                <i class="fas fa-arrow-circle-right text-orange-dark ml-auto text-5xl mr-9"></i>
                            </div>
                        </div>
                        <?php

                        $secondary_post_id   	     = $secondary[0]->ID;
                        $secondary_post_category	 = get_the_category($secondary_post_id);
                        $secondary_post_title 	 = $secondary[0]->post_title;
                        $secondary_post_subtitle   = get_field( 'subtitle', $secondary_post_id );
                        $secondary_post_image 	 = get_the_post_thumbnail_url($secondary[0]->ID); 
                        $secondary_link       	 = get_the_permalink( $secondary[0] );
                        $secondary_post_content    = $secondary[0]->post_content;
                        ?>
                        <div class="row-span-5 bg-gray-light py-16 px-24"> 
                            <h4 class="text text-green-600 inline">Publicado Hoje | <span>informação desaparece em 2 dias</span></h4>
                            <h1 class="uppercase text-5xl font-black">
                                <?php if(wp_is_mobile()){echo wp_trim_words( $secondary_post_title, 15);}else{echo wp_trim_words( $secondary_post_title, 12);} ?>
                            </h1>
                            <h2 class="text-purple-dark text-3xl mt-20">
                                <?php if(wp_is_mobile()){echo wp_trim_words( $secondary_post_subtitle, 37);}else{echo wp_trim_words( $secondary_post_subtitle, 37);} ?>
                            </h2>
                            <p class="text-2xl mt-28 h-24">
                                <?php if(wp_is_mobile()){echo wp_trim_words( $secondary_post_content, 45);}else{echo wp_trim_words( $secondary_post_content, 27);} ?>
                            </p>
                            <div class="flex flex-row content-center justify-evenly items-center mt-20">
                                <a href="" class="flex flex-col">
                                    <i class="fas fa-plus-circle text-6xl"></i>
                                    saber mais
                                </a>
                                <a href="" class="flex flex-col">
                                    <i class="fas fa-search text-6xl"></i>
                                    saber mais
                                </a>
                                <a href="" class="flex flex-col">
                                    <i class="fas fa-paper-plane text-6xl"></i>
                                    saber mais
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

			<?php
endif;

?>




