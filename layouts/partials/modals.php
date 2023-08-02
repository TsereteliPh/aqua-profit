<?php
    if (is_archive()) {
        $pageTitle = get_the_archive_title();
    } else {
        $pageTitle = get_the_title();
    }
?>
<div class="modals application" id="application">
    <h2 class="modals__title">Заявка отправлена!</h2>

    <div class="modals__text">Наш менеджер свяжется с Вами в ближайшее время</div>
</div>

<div class="modals callback" id="callback">
	<h2 class="modals__title">Заказать звонок</h2>

	<form method="POST" class="modals__form" name="Звонок">
		<?php wp_nonce_field( 'Звонок', 'callback_input' ); ?>

		<input type="text" class="hidden" name="page_request" value="<?php echo $pageTitle; ?>">

		<input class="input modals__input" type="text" name="client_name" placeholder="Ваше имя" required>

		<input class="input modals__input" type="tel" name="client_tel" placeholder="+7 (999) 999-99-99" required>

		<div class="modals__policy">
			Отправляя данные я соглашаюсь с <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">политикой конфиденциальности</a>
		</div>

		<button class="btn modals__submit" type="submit">Отправить</button>
	</form>
</div>
