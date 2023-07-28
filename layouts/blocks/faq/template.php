<?php
	$faq = get_sub_field( 'faq' );
	if ($faq) :
?>
	<section class="faq">
		<div class="container">
			<div class="faq__wrapper">
				<?php get_template_part( '/layouts/partials/title', null, array(
					'class' => 'faq__title',
					'title' => get_sub_field( 'title' )
				) ); ?>

				<ul class="reset-list faq__list">
					<?php
						foreach ( $faq as $post ) :
						setup_postdata( $post );
					?>
						<li class="faq__item">
							<button class="faq__button js-faq-accordion" type="button">
								<span class="faq__mark">&#63;</span>
								<div class="faq__question"><?php the_title(); ?></div>
								<span class="faq__arrow"></span>
							</button>

							<div class="faq__answer">
								<?php the_field( 'faq_answer' ); ?>
							</div>
						</li>
					<?php
						endforeach;
						wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>
	</section>
<?php endif; ?>
