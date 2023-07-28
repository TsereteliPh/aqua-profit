<?php $welcome = get_field('welcome'); ?>
<section class="welcome">
	<div class="side-line"></div>

    <div class="container">
		<div class="welcome__wrapper">
			<div class="welcome__tooltips">

			</div>

			<div class="welcome__content">
				<h1 class="welcome__title"><?php echo $welcome['title']; ?></h1>

				<div class="welcome__text"><?php echo $welcome['text']; ?></div>

				<div class="welcome__clip">АКВА</div>
			</div>
		</div>

		<div class="directions welcome__directions">
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
