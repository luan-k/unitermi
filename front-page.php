<?php get_header();?>

<div class="wrapper">
	<!-- slider -->
    <section class="slider-custom mb-52" id="slider-custom" data-anime="slow-slider">
        <?php echo do_shortcode('[ssslider id="5"]') ?>
    </section>
    <?php echo the_content(); ?>
	<div class="my-96"></div>
</div>

<?php get_footer(); ?>
