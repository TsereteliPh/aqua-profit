<?php
	$title = get_the_title();
	$is_project = get_field( 'is_project' );
	$text = get_field( 'review_text' );
	$img = get_field( 'review_img' );
	if ( $img ) $imgLink = 'href="' . $img['url'] . '" data-fancybox';

	if ( $is_project ) {
		$post = get_field( 'review_project' );

		if ( $post ) {
			setup_postdata( $post );
				if ( !$img && has_post_thumbnail() ) {
					$img = get_post_thumbnail_id();
					$imgLink = 'href="' . get_the_post_thumbnail_url() . '" data-fancybox';
				}
				$projectTitle = get_the_title();
				$projectLink = get_the_permalink();
				$works = get_field( 'works_list' );
			wp_reset_postdata();
		}
	} else {
		$works = get_field( 'review_works' );
	}
?>
<li class="review-card <?php echo $args['class']; ?>">
	<div class="review-card__project">
		<a <?php echo $imgLink; ?> class="review-card__link">
			<?php
				if ( $img ) {
					echo wp_get_attachment_image( ( $img['ID'] ) ? $img['ID'] : $img, 'medium', false, array(
						'class' => 'review-card__img'
					) );
				} else {
					echo wp_get_attachment_image( 107, 'medium', false, array(
						'class' => 'review-card__img'
					) );
				}
			?>
		</a>

		<div class="review-card__info">
			<div class="review-card__name"><?php echo $title; ?></div>

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
