<section class="tabs">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'tabs__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<?php
			$textBefore = get_sub_field( 'text' );
			if ( $textBefore ) :
		?>
			<div class="tabs__text-before"><?php echo $textBefore; ?></div>
		<?php endif; ?>

		<?php
			$tabs = get_sub_field( 'tabs' );
			if ( $tabs ) :
		?>
			<ul class="reset-list tabs__list js-tabs">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<li class="tabs__item<?php echo ( $key == 0 ) ? ' active' : ''; ?>" data-tab="tab-<?php echo $key + 1; ?>">
						<?php
							if ( $tab['label'] ) {
								echo $tab['label'];
							} else {
								echo $key + 1;
							}
						?>
					</li>
				<?php endforeach; ?>
			</ul>

			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="tabs__wrapper<?php echo ( $key == 0 ) ? ' active' : ''; ?>" id="tab-<?php echo $key + 1; ?>"><?php echo $tab['text']; ?></div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
