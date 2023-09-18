<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'class-name' ); ?>>
	<header class="container">
		<a class="logo" href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/favicon/favicon-32x32.png" alt="Logo du site"><?php bloginfo() ?></a>
		<?php wp_nav_menu( 
			array(
				'theme_location'  => 'main_menu',
				'menu' => 'main-navigation',
				'deepth' => 0,
				'menu_class' => 'menu',
				'container' => 'nav',
				'container_class' => 'main-menu',
				'menu_id' => 'navigation',
				// 'walker' => new Menu_Walker() 
			) 
		); ?>
	</header>
