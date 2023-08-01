<section class="reviews-slider">
	<div class="side-line"></div>

	<div class="container reviews-slider__container swiper">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'reviews-slider__title',
			'title' => get_sub_field('title')
		)); ?>

		<ul class="reset-list reviews-slider__list swiper-wrapper">
			<?php
				foreach ( get_sub_field( 'slider' ) as $post ) {
					setup_postdata( $post );

					get_template_part('layouts/partials/cards/review', null, array(
						'class' => 'reviews-slider__item swiper-slide'
					));
				}

				wp_reset_postdata();
			?>
		</ul>

		<div class="reviews-slider__panel">
			<div class="btn-prev reviews-slider__prev">
				<svg width="20" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
			</div>

			<div class="btn-next reviews-slider__next">
				<svg width="20" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
			</div>

			<?php if ( get_sub_field( 'link' ) ) : ?>
				<a href="<?php the_sub_field( 'link' ); ?>" class="btn-underline reviews-slider__link">Смотреть все отзывы</a>
			<?php endif; ?>
		</div>
	</div>
</section>
