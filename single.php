<?php get_header(); ?>

<?php
	$address = get_field( 'address' );
	$area = get_field( 'area' );
	$works = get_field( 'works_list' );
	$worksText = get_field( 'works_text' );
	$videos = get_field( 'video' );
	$gallery = get_field( 'gallery' );
?>
<section class="project">
	<div class="container">
		<h1 class="title project__title"><?php the_title(); echo ' - ' . $area . ' м²'; ?></h1>
	</div>

	<?php
		if ( !empty( get_the_post_thumbnail_url() ) ) {
			$background = 'url(' . get_the_post_thumbnail_url() . ');';
		} else {
			$background = 'linear-gradient(to right, #dc183b 0%, #fb7205 100%)';
		}
	?>
	<div class="project__works" style="background-image: <?php echo $background; ?>">
		<div class="container">
			<div class="project__works-content">
				<address class="project__works-address"><?php echo $address; ?></address>

				<div class="project__works-label">Проделанные работы:</div>

				<ul class="reset-list project__works-list">
					<?php foreach ( $works as $work ) : ?>
						<li class="project__works-item"><?php echo $work['text']; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<?php if ( $gallery ) : ?>
			<div class="project__gallery-wrapper">
				<div class="project__gallery swiper">
					<div class="project__gallery-swiper swiper-wrapper">
						<?php foreach ( $gallery as $img ) : ?>
							<a href="<?php echo $img['url']; ?>" class="project__gallery-link swiper-slide" data-fancybox="gallery" data-caption="<?php echo $img['description']; ?>">
								<?php echo wp_get_attachment_image( $img['ID'], 'medium', false ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="project__gallery-prev">
					<svg width="20" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
				</div>

				<div class="project__gallery-next">
					<svg width="20" height="14"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $worksText ) : ?>
			<div class="project__info">
				<h2 class="project__label">Виды работ:</h2>

				<div class="project__text"><?php echo $worksText; ?></div>
			</div>
		<?php endif; ?>

		<?php if ( $videos ) : ?>
			<div class="project__info">
				<h2 class="project__label">Видео с объекта</h2>

				<div class="reset-list project__video-list">
					<?php
						foreach ( $videos as $video ) :
							$img = $video['preview'];
							$videoLink = $video[$video['type']];
					?>

							<a href="<?php echo $videoLink; ?>" class="project__video-link" data-fancybox="videos">
								<?php echo wp_get_attachment_image( $img, 'large', false ); ?>

								<button class="btn-play project__video-btn" type="button" aria-label="Воспроизвести"></button>
							</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part('layouts/partials/blocks'); ?>

<?php get_footer(); ?>
