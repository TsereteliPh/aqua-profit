<?php
	$text = get_field( 'review_text' );
	$title = get_the_title();
?>
<li class="review-card <?php echo $args['class']; ?>">
	<?php
		$post = get_field( 'review_project' );

		if ( $post ) :
		setup_postdata( $post );
	?>
		<div class="review-card__project">
			<?php
				if ( get_the_post_thumbnail() ) {
					echo the_post_thumbnail( 'medium', array(
						'class' => 'review-card__img'
					) );
				} else {
					echo wp_get_attachment_image( 107, 'medium', false, array(
						'class' => 'review-card__img'
					) );
				}
			?>

			<div class="review-card__info">
				<div class="review-card__name"><?php echo $title; ?></div>

				<a href="<?php the_permalink(); ?>" class="review-card__label"><?php the_title(); echo ' - ' . get_field( 'area' ) . ' м²'; ?></a>

				<div class="review-card__works">
					<span>Выполненные работы:</span>
					<?php
						$works = get_field( 'works_list' );
						$worksCount = count($works);

						foreach ( $works as $key => $work ) {
							echo $work['text']; echo ( ($key + 1) != $worksCount ) ? ', ' : '.';
						}
					?>
				</div>
			</div>
		</div>

		<div class="review-card__text"><?php echo $text; ?></div>
	<?php
		wp_reset_postdata();
		endif;
	?>
</li>
