<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

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

			<button class="header__search-btn" type="button" aria-label="Открыть поисковую строку">
				<svg width="20" height="20"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-search"></use></svg>
			</button>
		</div>

		<div class="header__info">
			<button class="header__burger" type="button" aria-label="Открыть меню">
				<span></span>
			</button>

			<a href="<?php echo bloginfo( 'url' ); ?>" class="header__link">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-main.svg" alt="Логотип компании Аква профит" width="140" height="auto">
			</a>

			<div class="header__desc">Монтаж систем отопления и водоснабжения в Липецке</div>

			<?php
				$tel = get_field( 'tel', 'options' );
				if ($tel) :
			?>
				<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $tel); ?>" class="header__tel"><?php echo $tel; ?></a>
			<?php endif; ?>

			<button class="btn header__advice" type="button">
				<svg width="33" height="28"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-box"></use></svg>
				<span>Заказать консультацию</span>
			</button>
		</div>
	</div>
</header>

<?php if( !is_front_page() && function_exists( 'yoast_breadcrumb' ) ) : ?>
	<div class="breadcrumb">
		<div class="container">
			<?php echo yoast_breadcrumb(); ?>
		</div>
	</div>
<?php endif ?>

<main class="main<?php echo (is_front_page()) ? ' main--no-indent' : ''; ?>">
	<?php if (is_front_page()) get_template_part('layouts/partials/welcome'); ?>
