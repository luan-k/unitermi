<div id="primary" class="sidebar">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-primary' ) ) : ?>
			<?php dynamic_sidebar( 'primary' );
			echo do_shortcode('[wpf-filters id="1"]' )?>
   <?php endif; ?>
</div>
