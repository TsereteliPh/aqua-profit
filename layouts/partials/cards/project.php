<?php
	$works = get_field( 'works_list' );
	$size = ($args['iteration'] == 0) ? 'full' : 'large';
?>
<li class="project-card <?php echo $args['class']; echo ( $args['iteration'] == 0 ) ? ' works__item--new' : ''; ?>">
	<?php
		if ( get_the_post_thumbnail() ) {
			echo the_post_thumbnail( $size, array(
				'class' => 'project-card__img'
			) );
		} else {
			echo wp_get_attachment_image( 107, $size, false, array(
				'class' => 'project-card__img'
			) );
		}
	?>

	<div class="project-card__info">
		<div class="project-card__label"><?php the_title(); ?></div>

		<div class="project-card__works">
			<?php
				$worksCount = count($works);

				foreach ( $works as $key => $work ) {
					echo $work['text']; echo ( ($key + 1) != $worksCount ) ? ', ' : '.';
				}
			?>
		</div>

		<?php if ( !$args['slider'] ) : ?>
			<a href="<?php the_permalink(); ?>" class="btn-underline project-card__link">
				Смотреть полностью
				<svg width="8" height="8"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
			</a>
		<?php endif; ?>
	</div>
</li>
