</main>
<?php
	$tel = get_field( 'tel', 'options' );
	$email = get_field( 'email', 'options' );
	$address = get_field( 'address', 'options' );
	$socials = get_field( 'socials', 'options' );
?>

<footer class="footer">
	<div class="container footer__wrapper">
		<?php wp_nav_menu(array(
			'theme_location' => 'menu_main',
			'container' => '',
			'menu_id' => 'menu-main',
			'menu_class' => 'reset-list footer__menu'
		)); ?>

		<div class="footer__info">
			<?php if ($address) : ?>
				<address class="footer__address"><?php echo $address; ?></address>
			<?php endif; ?>

			<div class="footer__contacts">
				<?php if ($tel) : ?>
					<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $tel); ?>" class="footer__tel"><?php echo $tel; ?></a>
				<?php endif; ?>

				<?php if ($email) : ?>
					<a href="mailto:<?php echo $email; ?>" class="footer__email"><?php echo $email; ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer__box">
			<div class="footer__brand">
				© ООО «Аква-Профит» — монтаж систем,<br>
				отопления, водоснабжения в Липецке
			</div>

			<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__link">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-main-white.svg" alt="Логотип компании Аква профит" width="90" height="auto">
			</a>

			<div class="footer__privacy-wrapper">
				<a href="<?php echo get_privacy_policy_url(); ?>" target="_blank" class="footer__privacy">Политика конфиденциальности</a>
			</div>

			<?php if ($socials) : ?>
				<div class="footer__socials socials">
					<?php foreach ($socials as $social) : ?>
						<a href="<?php echo $social['link']; ?>" class="socials__link">
							<svg width="25" height="25"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $social['social']; ?>"></use></svg>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php get_template_part('layouts/partials/modals'); ?>

<?php wp_footer(); ?>

</body>
</html>
