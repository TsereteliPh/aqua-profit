<?php
	$is_project = get_field( 'is_project' );
	$text = get_field( 'review_text' );

	if ( $is_project ) {
		$post = get_field( 'review_project' );

		if ( $post ) {
			setup_postdata( $post );
				$img = get_post_thumbnail_id();
				$projectTitle = get_the_title();
				$projectLink = get_the_permalink();
				$works = get_field( 'works_list' );
			wp_reset_postdata();
		}
	} else {
		$img = get_field( 'review_img' );
		$works = get_field( 'review_works' );
	}
?>
<li class="review-card <?php echo $args['class']; ?>">
	<div class="review-card__project">
		<?php
			if ( $img ) {
				echo wp_get_attachment_image( $img, 'medium', false, array(
					'class' => 'review-card__img'
				) );
			} else {
				echo wp_get_attachment_image( 107, 'medium', false, array(
					'class' => 'review-card__img'
				) );
			}
		?>

		<div class="review-card__info">
			<div class="review-card__name"><?php the_title(); ?></div>

			<?php if ( $projectLink ) : ?>
				<a href="<?php echo $projectLink; ?>" class="review-card__label"><?php echo $projectTitle; ?></a>
			<?php endif; ?>

			<?php if ( $works ) : ?>
				<div class="review-card__works">
					<span>Выполненные работы:</span>
					<?php
						$worksCount = count($works);

						foreach ( $works as $key => $work ) {
							echo $work['text']; echo ( ($key + 1) != $worksCount ) ? ', ' : '.';
						}
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( $text ) : ?>
		<div class="review-card__text"><?php echo $text; ?></div>
	<?php endif; ?>
</li>
