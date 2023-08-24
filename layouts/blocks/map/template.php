<?php
	$map_arr = [];
	$args = [
		'post_type' => 'project',
		'meta_key' => 'location'
	];

	$query = new WP_Query($args);
	$posts = $query->posts;

	if ( $query->have_posts() ) {
		if (is_archive()) {
			foreach ($posts as $post) {
				$location = json_decode( get_field( 'location' ), true );
				$mark = $location['marks'][0];

				$coords = array(
					'latitude' => $mark['coords'][0],
					'longitude' => $mark['coords'][1],
					'content' => $mark['content']
				);

				array_push( $map_arr, $coords);
			}
		} else {
			while ( $query->have_posts() ) {
				$query->the_post();
				$location = json_decode( get_field( 'location' ), true );
				$mark = $location['marks'][0];

				$coords = array(
					'latitude' => $mark['coords'][0],
					'longitude' => $mark['coords'][1],
					'content' => $mark['content']
				);

				array_push( $map_arr, $coords);
			}

			wp_reset_postdata();
		}
	}
?>
<section class="map">
	<div class="container map__container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'map__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<div class="map__done">
			<?php $count = count($map_arr); ?>

			<div class="map__count"><?php echo $count; ?></div>

			<div class="map__text"><?php endingMap($count); ?> на карте</div>
		</div>
	</div>

	<div class="map__holder" id="map"></div>

	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function (e) {
			function init(){
				<?php if ($map_arr) : ?>
					const map = new ymaps.Map('map', {
						center: [52.606917388514404, 39.59868261630403],
						zoom: 8
					});

					<?php foreach ( $map_arr as $mark ) : ?>
						map.geoObjects.add(
							new ymaps.Placemark([<?php echo $mark['latitude']; ?>, <?php echo $mark['longitude']; ?>], {
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
