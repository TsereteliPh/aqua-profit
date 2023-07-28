<section class="services">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'services__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$services = get_sub_field( 'services' );
			if ( $services ) :
		?>
			<ul class="reset-list services__list">
				<?php foreach ( $services as $key => $service ) : ?>
					<li class="services__item">
						<div class="side-line"></div>

						<?php
							if ( $service['img'] ) {
								echo wp_get_attachment_image( $service['img'], 'medium', false, array(
									'class' => 'services__img'
								) );
							} else {
								echo wp_get_attachment_image( 107, 'medium', false, array(
									'class' => 'services__img'
								) );
							}
						?>

						<h3 class="services__label"><?php echo $service['label']; ?></h3>

						<button class="services__accordion" type="button">Об услуге</button>

						<div class="services__desc"><?php echo $service['desc']; ?></div>

						<?php if ( $service['is_link'] ) : ?>
							<a href="<?php echo $service['link']; ?>" class="btn services__link" type="button">Подробнее</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
