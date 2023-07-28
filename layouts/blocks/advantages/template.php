<section class="advantages">
	<div class="container">
		<div class="advantages__head">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'advantages__title',
				'title' => get_sub_field( 'title' )
			) ); ?>

			<div class="advantages__guarantee">
				<div class="advantages__guarantee-years"><?php the_sub_field( 'years' ); ?></div>

				<div class="advantages__guarantee-text"><?php the_sub_field( 'guarantee' ); ?></div>
			</div>
		</div>

		<?php
			$advantages = get_sub_field( 'advantages' );
			if ($advantages) :
		?>
			<ul class="reset-list advantages__list">
				<?php foreach ( $advantages as $advantage ) : ?>
					<li class="advantages__item">
						<div class="arrow arrow--right advantages__arrow">
							<svg width="11" height="17"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-tooltip"></use></svg>
						</div>

						<div class="advantages__text"><?php echo $advantage['text']; ?></div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
