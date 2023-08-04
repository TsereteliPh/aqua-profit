<section class="text">
	<div class="container">
		<?php
			get_template_part( '/layouts/partials/title', null, array(
				'class' => 'text__title',
				'title' => get_sub_field( 'title' )
			) );
		?>

		<div class="text__wrapper"><?php the_sub_field( 'text' ); ?></div>
	</div>
</section>
