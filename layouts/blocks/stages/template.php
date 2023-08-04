<section class="stages">
	<div class="container stages__container">
		<div class="stages__info">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'stages__title',
				'title' => get_sub_field( 'title' )
			) ); ?>

			<div class="stages__desc"><?php the_sub_field( 'desc' ); ?></div>

			<button class="btn stages__button" type="button" data-fancybox data-src="#callback">Рассчитать стоимость работ</button>
		</div>

		<?php
			$stages = get_sub_field( 'stages' );
			if ( $stages ) :
		?>
			<ul class="reset-list stages__list">
				<?php foreach ( $stages as $key => $stage ) : ?>
					<li class="stages__item">
						<div class="arrow stages__arrow">
							<span><?php echo $key + 1; ?></span>
						</div>

						<?php echo $stage['text']; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
