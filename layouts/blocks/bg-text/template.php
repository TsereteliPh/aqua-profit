<?php $background = get_sub_field ( 'background' ); ?>
<section class="bg-text" <?php echo ( $background ) ? 'style="background-image: url(' . $background . ');"' : ''; ?>>
	<div class="container">
		<div class="bg-text__wrapper">
			<?php if ( get_sub_field( 'title' ) ) : ?>
				<h2 class="bg-text__title"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="bg-text__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</section>
