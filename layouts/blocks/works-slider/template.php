<section class="works-slider">
	<div class="side-line"></div>

	<div class="container works-slider__container swiper">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'works-slider__title',
			'title' => get_sub_field('title')
		)); ?>

		<ul class="reset-list works-slider__list swiper-wrapper">
			<?php
				foreach ( get_sub_field( 'slider' ) as $post ) {
					setup_postdata( $post );

					get_template_part('layouts/partials/cards/project', null, array(
						'class' => 'works-slider__item swiper-slide',
						'iteration' => 1,
						'slider' => true
					));
				}

				wp_reset_postdata();
			?>
		</ul>

		<div class="works-slider__panel">
			<div class="btn-prev works-slider__prev">
				<svg width="20" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
			</div>

			<div class="btn-next works-slider__next">
				<svg width="20" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
			</div>

			<a href="<?php the_sub_field( 'link' ); ?>" class="btn-underline works-slider__link">Смотреть все проекты</a>
		</div>
	</div>
</section>
