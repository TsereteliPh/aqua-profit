<section class="services-links">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'services-links__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<ul class="reset-list services-links__list">
			<?php foreach ( get_sub_field( 'services' ) as $service ) : ?>
				<li class="services-links__item">
					<?php ( $service['link'] ) ? $link = 'href="' . $service['link'] . '"' : $link = ''; ?>

					<a <?php echo $link; ?> class="services-links__link">
						<?php
							if ($service['img']) {
								echo wp_get_attachment_image( $service['img'], 'large', false );
							} else {
								echo wp_get_attachment_image( 107, 'large', false );
							}
						?>

						<div class="services-links__label"><?php echo $service['label']; ?></div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
