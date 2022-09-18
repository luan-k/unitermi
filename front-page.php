<?php get_header();?>

<div class="wrapper">
	<!-- slider -->
    <section class="slider-custom mb-36" id="slider-custom" data-anime="slow-slider">
        <?php echo do_shortcode('[ssslider id="5"]') ?>
    </section>
    <?php echo the_content(); ?>
</div>

<?php get_footer(); ?>
