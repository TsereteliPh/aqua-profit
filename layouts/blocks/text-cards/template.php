<section class="text-cards">
	<div class="container">
		<?php
			get_template_part( '/layouts/partials/title', null, array(
				'class' => 'text-cards__title',
				'title' => get_sub_field( 'title' )
			) );

			$textBefore = get_sub_field( 'text' );
			if ( $textBefore ) :
		?>
			<div class="text-cards__text-before"><?php echo $textBefore; ?></div>
		<?php endif; ?>

		<?php
			$cards = get_sub_field( 'cards' );
			if ( $cards ) :
		?>
			<ul class="reset-list text-cards__list">
				<?php foreach ( $cards as $card ) : ?>
					<li class="text-cards__item<?php echo ( !$card['img'] ) ? ' text-cards__item--no-img' : ''; ?>">
						<?php
							if ( $card['img'] ) {
								echo wp_get_attachment_image( $card['img'], 'medium', false, array(
									'class' => 'text-cards__img'
								) );
							}
						?>

						<?php if ( $card['title'] ) : ?>
							<div class="text-cards__label"><?php echo $card['title']; ?></div>
						<?php endif; ?>

						<?php if ( $card['desc'] ) : ?>
							<div class="text-cards__desc"><?php echo $card['desc']; ?></div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
