<?php
	$address = get_field( 'address', 'options' );
	$tel = get_field( 'tel', 'options' );
	$email = get_field( 'email', 'options' );
	$photo = get_field( 'photo', 'options' );
	$map = get_field( 'map', 'options' );
?>
<section class="contacts">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'contacts__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<div class="contacts__content">
			<div class="contacts__info">
				<div class="contacts__data">
					<?php if ( $address ) : ?>
						<address class="contacts__address"><?php echo $address ?></address>
					<?php endif; ?>

					<div class="contacts__links">
						<?php if ( $tel ) : ?>
							<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $tel); ?>" class="contacts__tel"><?php echo $tel; ?></a>
						<?php endif; ?>

						<?php if ( $email ) : ?>
							<a href="mailto:<?php echo $email; ?>" class="contacts__email"><?php echo $email; ?></a>
						<?php endif; ?>
					</div>
				</div>

				<?php
					if ( $photo ) {
						echo wp_get_attachment_image( $photo, 'large', false, array(
							'class' => 'contacts__img'
						) );
					} else {
						echo wp_get_attachment_image( 107, 'large', false, array(
							'class' => 'contacts__img'
						) );
					}
				?>
			</div>

			<div id="contacts_map" class="contacts__map"></div>
		</div>
	</div>

	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function (e) {
			function init(){
				<?php if ($map) : ?>
					<?php $map = json_decode( $map, true ); ?>
					const map = new ymaps.Map('contacts_map', {
						center: [<?php echo $map['center_lat'] ?>,<?php echo $map['center_lng'] ?>],
						zoom: <?php echo $map['zoom']; ?>
					});

					<?php foreach ( $map['marks'] as $mark ) : ?>
						map.geoObjects.add(
							new ymaps.Placemark([<?php echo $mark['coords'][0]; ?>, <?php echo $mark['coords'][1]; ?>], {
									balloonContent: '<?php echo $mark['content'] ?>'
								},
								{
									iconLayout: 'default#image',
									iconImageHref: '<?php echo get_template_directory_uri(); ?>/assets/images/icon-marker.svg',
									iconImageSize: [24, 35],
									iconImageOffset: [-12, -35]
								})
						);
					<?php endforeach; ?>

					map.controls.remove('geolocationControl'); // удаляем геолокацию
					map.controls.remove('searchControl'); // удаляем поиск
					map.controls.remove('trafficControl'); // удаляем контроль трафика
					map.controls.remove('typeSelector'); // удаляем тип
					map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
					// map.controls.remove('zoomControl'); // удаляем контрол зуммирования
					map.controls.remove('rulerControl'); // удаляем контрол правил
					map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
				<?php endif; ?>
			}

			ymaps.ready(init);
		});
	</script>
</section>
