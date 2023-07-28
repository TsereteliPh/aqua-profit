<section class="about">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'about__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<div class="about__info">
			<div class="about__text"><?php the_sub_field( 'text' ); ?></div>

			<?php echo wp_get_attachment_image( get_sub_field( 'img' ), 'large', false, array(
				'class' => 'about__img'
			) ); ?>
		</div>

		<div class="directions about__directions">
			<div class="directions__title">Основные направления работы</div>

			<ul class="reset-list directions__list">
				<li class="directions__item">
					<svg width="30" height="47"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-heating"></use></svg>
					Отопление
				</li>

				<li class="directions__item">
					<svg width="46" height="42"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-water-supply"></use></svg>
					Водоснабжение
				</li>

				<li class="directions__item">
					<svg width="46" height="46"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-water-treatment"></use></svg>
					Водоподготовка
				</li>

				<li class="directions__item">
					<svg width="46" height="42"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-sewerage"></use></svg>
					Канализация
				</li>

				<li class="directions__item">
					<svg width="60" height="36"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-water-well"></use></svg>
					Водяная скважина
				</li>
			</ul>
		</div>
	</div>
</section>
