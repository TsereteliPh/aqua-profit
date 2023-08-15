<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
	$tel = get_field( 'tel', 'options' );
	$email = get_field( 'email', 'options' );
	$socials = get_field( 'socials', 'options' );
?>
<header class="header<?php echo (is_front_page()) ? ' header--front' : ''; ?>">
	<?php if ( !is_front_page(  ) ) : ?>
		<div class="side-line"></div>
	<?php endif; ?>
	<button class="header__burger header__burger--outside" type="button" aria-label="Открыть меню">
		<span></span>
	</button>

	<div class="container header__wrapper">
		<div class="header__panel">
			<?php wp_nav_menu(array(
				'theme_location' => 'menu_main',
				'container' => '',
				'menu_id' => 'menu-main',
				'menu_class' => 'reset-list header__menu'
			)); ?>

			<?php if (false) : ?>
				<button class="header__search-btn" type="button" aria-label="Открыть поисковую строку">
					<svg width="20" height="20"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-search"></use></svg>
				</button>
			<?php endif; ?>
		</div>

		<div class="header__info">
			<button class="header__burger" type="button" aria-label="Открыть меню">
				<span></span>
			</button>

			<a href="<?php echo bloginfo( 'url' ); ?>" class="header__link">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-main.svg" alt="Логотип компании Аква профит" width="140" height="auto">
			</a>

			<div class="header__desc">Монтаж систем отопления и водоснабжения в Липецке</div>

			<?php if ($tel) : ?>
				<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $tel); ?>" class="header__tel"><?php echo $tel; ?></a>
			<?php endif; ?>

			<button class="btn header__advice" type="button" data-fancybox data-src="#callback">
				<svg width="33" height="28"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-box"></use></svg>
				<span>Заказать консультацию</span>
			</button>
		</div>
	</div>
</header>

<div class="drop">
	<button class="drop__cross" type="button" aria-label="Закрыть меню">
		<span></span>
		<span></span>
	</button>

	<?php wp_nav_menu(array(
		'theme_location' => 'menu_popup',
		'container' => '',
		'menu_id' => 'menu-popup',
		'menu_class' => 'reset-list drop__menu'
	)); ?>

	<div class="drop__contacts">
		<?php if ($tel) : ?>
			<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $tel); ?>" class="drop__tel"><?php echo $tel; ?></a>
		<?php endif; ?>

		<?php if ($email) : ?>
			<a href="mailto:<?php echo $email; ?>" class="drop__email"><?php echo $email; ?></a>
		<?php endif; ?>

		<?php if ($socials) : ?>
			<div class="drop__socials socials">
				<?php foreach ($socials as $social) : ?>
					<a href="<?php echo $social['link']; ?>" class="socials__link">
						<svg width="40" height="40"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $social['social']; ?>"></use></svg>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php if( !is_front_page() && function_exists( 'yoast_breadcrumb' ) ) : ?>
	<div class="breadcrumb">
		<div class="container">
			<?php echo yoast_breadcrumb(); ?>
		</div>
	</div>
<?php endif ?>

<main class="main<?php echo (is_front_page()) ? ' main--no-indent' : ''; ?>">
	<?php if (is_front_page()) get_template_part('layouts/partials/welcome'); ?>
