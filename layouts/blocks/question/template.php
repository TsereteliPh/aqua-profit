<section class="question">
	<div class="side-line"></div>

	<div class="container question__container">

		<div class="question__info">
			<?php get_template_part( '/layouts/partials/title', null, array(
				'class' => 'question__title',
				'title' => get_sub_field( 'title' )
			) ); ?>

			<div class="question__text"><?php the_sub_field( 'text' ); ?></div>

			<form action="#" method="POST" class="question__form">
				<input type="text" name="client_name" class="input question__name" placeholder="Ваше имя" required>

				<input type="tel" name="client_tel" class="input question__tel" placeholder="+7 (999) 999-99-99" required>

				<input type="email" name="client_email" class="input question__mail" placeholder="E-mail" required>

				<div class="question__file js-file-input">
					<input type="file" id="question-file" name="client_file" accept="image/*, .pfd, .dwg">

					<span>Прикрепить файл</span>

					<label for="question-file">Обзор</label>
				</div>

				<textarea class="input question__textarea" name="client_message" placeholder="Текст сообщения"></textarea>

				<div class="question__policy">
					Отправляя данные я соглашаюсь с <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">политикой конфиденциальности</a>
				</div>

				<button class="btn question__submit" type="submit">Отправить</button>
			</form>
		</div>

		<div class="question__specialist">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/specialist-sergey.png" alt="Специалист Сергей Смирнов" width="445" height="auto">

			<div class="question__specialist-desc">
				<?php
					$tel = get_sub_field( 'tel' );
					$time = get_sub_field( 'time' );

					if ( $tel ) :
				?>
					<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $tel); ?>" class="question__specialist-tel"><?php echo $tel; ?></a>
				<?php endif; ?>

				<div class="question__specialist-time"><?php echo 'С ' . $time['from'] . ' до ' . $time['to']; ?></div>

				<div class="question__specialist-job"><?php the_sub_field( 'job' ); ?></div>

				<div class="question__specialist-name"><?php the_sub_field( 'name' ); ?></div>
			</div>
		</div>
	</div>
</section>
