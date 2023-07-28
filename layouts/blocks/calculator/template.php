<?php
	$material = get_sub_field( 'material' );
	$heating = get_sub_field( 'heating' );
	$house = get_sub_field( 'house' );
	$batteries = get_sub_field( 'batteries' );
	$floor = get_sub_field( 'floor' );
?>

<section class="calculator">
	<div class="side-line"></div>

	<div class="container calculator__container">
		<div class="calculator__wrapper">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'calculator__title',
				'title' => get_sub_field( 'title' )
			) ); ?>

			<form action="#" method="POST" class="calculator__form">
				<div class="calculator__info">
					<?php if ($material) : ?>
						<div class="calculator__label">Материал дома:</div>

						<div class="select calculator__select">
							<select name="client_house_material_type" id="calculator-select">
								<?php foreach ( $material as $key => $option ) : ?>
									<option value="<?php echo $option['option']; ?>" <?php echo ( $key == 0 ) ? 'selected' : ''; ?>>
										<?php echo $option['option']; ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>
					<?php endif; ?>

					<?php if ( $heating ) : ?>
						<div class="calculator__label">Вид отопления:</div>

						<div class="calculator__radios">
							<?php foreach ( $heating as $key => $radio ) : ?>
								<label class="radio calculator__radio">
									<input type="radio" name="client_heating_type" value="<?php echo $radio['option']; ?>" <?php echo ($key == 0) ? 'checked' : ''; ?>>

									<span></span>

									<?php echo $radio['option']; ?>
								</label>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $house ) : ?>
                        <div class="calculator__label">Площадь дома, м&#178;:</div>

                        <div class="range calculator__range">
                            <span class="range-from"><?php echo $house['from']; ?></span>

                            <input class="range-slider" type="range" name="client_house_area" min="<?php echo $house['from']; ?>" max="<?php echo $house['to']; ?>" step="1" value="<?php echo round( ( $house['from'] + $house['to'] ) / 2 ); ?>">
                            <div class="range-select">
                                <div class="range-thumb"></div>
                                <div class="range-value"></div>
                            </div>
                            <div class="range-bar"></div>

                            <span class="range-to"><?php echo $house['to']; ?></span>
                        </div>
					<?php endif; ?>

					<?php if ( $batteries ) : ?>
						<div class="calculator__label">Количество батарей, шт:</div>

						<div class="range calculator__range">
							<span class="range-from"><?php echo $batteries['from']; ?></span>

							<input class="range-slider" type="range" name="client_number_of_batteries" min="<?php echo $batteries['from']; ?>" max="<?php echo $batteries['to']; ?>" step="1" value="<?php echo round( ( $batteries['from'] + $batteries['to'] ) / 2 ); ?>">
							<div class="range-select">
								<div class="range-thumb"></div>
								<div class="range-value"></div>
							</div>
							<div class="range-bar"></div>

							<span class="range-to"><?php echo $batteries['to']; ?></span>
						</div>
					<?php endif; ?>

					<?php if ( $floor ) : ?>
						<div class="calculator__label">Площадь теплых полов м&#178;:</div>

						<div class="range calculator__range">
							<span class="range-from"><?php echo $floor['from']; ?></span>

							<input class="range-slider" type="range" name="client_floor_area" min="<?php echo $floor['from']; ?>" max="<?php echo $floor['to']; ?>" step="1" value="<?php echo round( ( $floor['from'] + $floor['to'] ) / 2 ); ?>">
							<div class="range-select">
								<div class="range-thumb"></div>
								<div class="range-value"></div>
							</div>
							<div class="range-bar"></div>

							<span class="range-to"><?php echo $floor['to']; ?></span>
						</div>
					<?php endif; ?>
				</div>

				<div class="calculator__user-info">
					<input class="input calculator__input" type="text" name="client_name" placeholder="Ваше имя" required>

					<input class="input calculator__input" type="tel" name="client_tel" placeholder="+7 (999) 999-99-99" required>

					<div class="calculator__policy">
						Отправляя данные я соглашаюсь с <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">политикой конфиденциальности</a>
					</div>

					<button class="btn calculator__submit" type="submit">Составить смету</button>
				</div>
			</form>
		</div>

		<div class="calculator__tooltips">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator-img.jpg" alt="Схема водооснащения трехэтажного дома" class="calculator__img" width="455" height="765">

			<div class="calculator__message">
				<svg width="46" height="48"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-battery"></use></svg>

				<div class="calculator__text">Заполните форму и мы расчитаем для вас смету в ближайшее время</div>
			</div>
		</div>
	</div>
</section>
